<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
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

        return view('admin.pages.faq.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Faq::query();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.faq.partials.actions')
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.faq.create');
    }

    public function store(Request $request)
    {
        $faq = Faq::create($request->all());

        return redirect()->route('admin.faqs');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.pages.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = faq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('admin.faqs');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        try {
            $faq->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.faqs');
    }
}
