<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Role;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserAdminController extends Controller
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

        return view('admin.pages.users-admin.index');
    }

    public function data(Datatables $datatables)
    {
        $query = User::getAdmins()->get();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.users-admin.partials.actions')
            ->editColumn('user_type', function ($q) {
                return $q->user_type != null ? $q->user_type->name : '';
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $usertype = UserType::all();

        return view('admin.pages.users-admin.create', compact('usertype'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => Role::getAdmin()->firstOrFail()->id
        ]);

        $user = User::create($request->all());

        return redirect()->route('admin.usersadmin');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $usertype = UserType::all();

        return view('admin.pages.users-admin.edit', compact('user', 'usertype'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password)
            ]);
        }

        $user->update($request->all());

        return redirect()->route('admin.usersadmin');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.usersadmin');
    }
}
