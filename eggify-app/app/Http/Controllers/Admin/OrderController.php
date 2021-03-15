<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\BudgetMessage;
use App\Models\ProviderCategorySubcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProviderCategory;
use App\Models\ProviderSubcategory;
use App\Models\User;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!(auth()->check() && User::findOrFail(auth()->user()->id)->isAdmin())) {
            return abort(401);
        }

        return view('admin.pages.category - copia.index');
    }

    public function data(Datatables $datatables)
    {
        $query = BudgetMessage::query();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.category - copia.partials.actions')
            ->editColumn('date', function ($q) {
                return $q->created_at;
            })
            ->editColumn('userfrom', function ($q) {
                return $q->user_from->name;
            })
            ->editColumn('userto', function ($q) {
                return $q->user_to->name;
            })
            ->editColumn('message', function ($q) {
                return sprintf('%s%s', substr($q->message, 0, 80), strlen($q->message) > 80 ? '...' : '');
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $subcategories = ProviderSubcategory::all();

        return view('admin.pages.category.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $category = ProviderCategory::create($request->all());

        if ($request->subcategory && count($request->subcategory)) {
            $category->provider_subcategory()->sync($request->subcategory);
        }

        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $category = ProviderCategory::findOrFail($id);

        $subcategory = ProviderSubcategory::all();
       /* $subcategory->map(function ($el) use ($category) {
            if (in_array($el->id, $category->provider_subcategory->pluck('id'))) {
                $el['selected'] = true;
            }

            return $el;
        });*/

        return view('admin.pages.category.edit', compact('category', 'subcategory'));
    }

    public function update(Request $request, $id)
    {
        $category = ProviderCategory::findOrFail($id);
        $category->update($request->all());
        $category->provider_subcategory()->sync($request->subcategory);

        return redirect()->route('admin.category');
    }

    public function destroy($id)
    {
        $category = ProviderCategory::findOrFail($id);

        try {
            $category->provider_subcategory()->detach();
            $category->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.category');
    }
}
