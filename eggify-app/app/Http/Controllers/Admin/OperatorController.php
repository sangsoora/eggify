<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Operator;
use App\Models\OperatorCompany;
use App\Models\OperatorEmployee;
use App\Models\OperatorJob;
use App\Models\OperatorJobTag;
use App\Models\OperatorPosition;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\ProviderSubcategory;
use App\Models\ProviderType;
use App\Models\Role;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OperatorController extends Controller
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

        return view('admin.pages.operator.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Operator::all();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.operator.partials.actions')
            ->editColumn('business', function ($q) {
                return $q->operator_company != null ? $q->operator_company->name : '';
            })
            ->editColumn('orders', function ($q) {
                return count($q->user->budget_sended->all());
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $operatorjob = OperatorJob::all();
        $operatorjobtag = OperatorJobTag::all();
        $operatoremployees = OperatorEmployee::all();
        $operatorposition = OperatorPosition::all();

        return view('admin.pages.operator.create', compact('operatorjob', 'operatorjobtag', 'operatoremployees', 'operatorposition'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => Role::getUser()->firstOrFail()->id,
            'user_type_id' => UserType::typeOperator()->firstOrFail()->id
        ]);

        $user = User::create($request->all());

        $request->merge([
            'user_id' => $user->id,
        ]);

        $operator = Operator::create($request->all());

        $request->merge([
            'user_id' => $user->id,
        ]);

        $arrCompany = [
            'name' => $request->companyname,
            'web' => $request->companyweb,
            'years' => $request->companyyears,
            'linkedin' => $request->companylinkedin,
            'logo' => '',
            'operator_id' => $operator->id,
            'operator_company_employees_id' => $request->operator_employees_id
        ];

        $company = OperatorCompany::create($arrCompany);

        return redirect()->route('admin.operator');
    }

    public function edit($id)
    {
        $operator = Operator::findOrFail($id);
        $user = User::findOrFail($operator->user->id);

        $operatorjob = OperatorJob::all();
        $operatorjobtag = OperatorJobTag::all();
        $operatoremployees = OperatorEmployee::all();
        $operatorposition = OperatorPosition::all();

        return view('admin.pages.operator.edit', compact('user', 'operator', 'operatorjob', 'operatorjobtag', 'operatoremployees', 'operatorposition'));
    }

    public function update(Request $request, $id)
    {
        $operator = Operator::findOrFail($id);
        $user = User::findOrFail($operator->user->id);

        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password)
            ]);
        }

        $user->update($request->all());
        $operator->update($request->all());

        return redirect()->route('admin.operator');
    }

    public function destroy($id)
    {
        $operator = Operator::findOrFail($id);
        $user = User::findOrFail($operator->user->id);

        try {
            if ($operator->operator_company != null) {
                $operatorCompany = OperatorCompany::findOrFail($operator->operator_company->id);
                $operatorCompany->delete();
            }

            $operator->delete();
            $user->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.operator');
    }
}
