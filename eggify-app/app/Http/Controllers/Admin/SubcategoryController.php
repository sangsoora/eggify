<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProviderSubcategory;
use App\Models\User;
use Yajra\DataTables\DataTables;

class SubcategoryController extends Controller
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

        return view('admin.pages.subcategory.index');
    }

    public function data(Datatables $datatables)
    {
        $query = ProviderSubcategory::query();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.subcategory.partials.actions')
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.subcategory.create');
    }

    public function store(Request $request)
    {
        $subcategory = ProviderSubcategory::create($request->all());

        return redirect()->route('admin.subcategory');
    }

    public function edit($id)
    {
        $subcategory = ProviderSubcategory::findOrFail($id);

        return view('admin.pages.subcategory.edit', compact('subcategory'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = ProviderSubcategory::findOrFail($id);
        $subcategory->update($request->all());

        return redirect()->route('admin.subcategory');
    }

    public function destroy($id)
    {
        $subcategory = ProviderSubcategory::findOrFail($id);

        try {
            $subcategory->provider_category()->detach();
            $subcategory->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.subcategory');
    }
}
