<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\ProviderCompany;
use App\Models\ProviderSubcategory;
use App\Models\ProviderType;
use App\Models\Role;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProviderController extends Controller
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

        return view('admin.pages.provider.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Provider::distributor()->get();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.provider.partials.actions')
            ->editColumn('category', function ($q) {
                return $q->provider_category != null ? $q->provider_category->name : '';
            })
            ->editColumn('subcategory', function ($q) {
                return $q->provider_subcategory != null ? $q->provider_subcategory->name : '';
            })
            ->editColumn('orders', function ($q) {
                return count($q->user->budget_received->all());
            })
            ->editColumn('plan', function ($q) {
                return $q->provider_plan->name;
            })
            ->editColumn('visible', function ($q) {
                $html = $q->visible ? '<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="Validado!"><i data-feather="eye"></i></button>' : '<button type="button" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Pendiente de valicación!"><i data-feather="eye-off"></i></button>';
                return $html;
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $providertype = ProviderType::all();
        $providercategory = ProviderCategory::all();
        $providersubcategory = ProviderSubcategory::all();

        return view('admin.pages.provider.create', compact('providertype', 'providercategory', 'providersubcategory'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => Role::getUser()->firstOrFail()->id,
            'user_type_id' => UserType::typeProvider()->firstOrFail()->id
        ]);

        $user = User::create($request->all());

        $request->merge([
            'user_id' => $user->id,
            'provider_plan_id' => 1,
            'provider_type_id' => 1,
        ]);

        $provider = Provider::create($request->all());

        return redirect()->route('admin.provider');
    }

    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $user = User::findOrFail($provider->user->id);
        $providertype = ProviderType::all();
        $providercategory = ProviderCategory::all();
        $providersubcategory = ProviderSubcategory::all();

        return view('admin.pages.provider.edit', compact('user', 'provider', 'providertype', 'providercategory', 'providersubcategory'));
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $user = User::findOrFail($provider->user->id);

        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password)
            ]);
        } else {
            $request->merge([
                'password' => $user->password
            ]);
        }

        if (isset($request->visible)) {
            if ($request->visible == 'on') {
                $request->merge(['visible' => 1]);
            }
        } else {
            $request->merge(['visible' => 0]);
        }

        $user->update($request->all());
        $provider->update($request->all());

        return redirect()->route('admin.provider');
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $user = User::findOrFail($provider->user->id);

        try {
            if ($provider->provider_company != null) {
                $providerCompany = ProviderCompany::findOrFail($provider->provider_company->id);
                $providerCompany->delete();
            }

            $provider->delete();
            $user->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.provider');
    }
}
