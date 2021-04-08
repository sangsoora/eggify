<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Budget;
use App\Models\BudgetMessage;
use App\Models\ProviderCategorySubcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProviderCategory;
use App\Models\ProviderSubcategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->check() || (auth()->check() && !User::findOrFail(auth()->user()->id)->isAdmin())) {
            Auth::logout();
            return redirect('/admin/login');
        }

        return view('admin.pages.order.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Budget::orderByDesc('created_at')->get();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.order.partials.actions')
            ->editColumn('budget_id', function ($q) {
                return $q->id;
            })
            ->editColumn('date', function ($q) {
                return $q->created_at;
            })
            ->editColumn('userfrom', function ($q) {
                return $q->messages->count() ? $q->messages->first()->user_from->name : '';
            })
            ->editColumn('userto', function ($q) {
                return $q->messages->count() ? $q->messages->first()->user_to->name : '';
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $subcategories = ProviderSubcategory::all();

        return view('admin.pages.order.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $category = ProviderCategory::create($request->all());

        if ($request->subcategory && count($request->subcategory)) {
            $category->provider_subcategory()->sync($request->subcategory);
        }

        return redirect()->route('admin.order');
    }

    public function show($id)
    {
        $budget = Budget::findOrFail($id);

        return view('admin.pages.order.show', compact('budget'));
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

        return view('admin.pages.order.edit', compact('category', 'subcategory'));
    }

    public function update(Request $request, $id)
    {
        $category = ProviderCategory::findOrFail($id);
        $category->update($request->all());
        $category->provider_subcategory()->sync($request->subcategory);

        return redirect()->route('admin.order');
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

        return redirect()->route('admin.order');
    }
}
