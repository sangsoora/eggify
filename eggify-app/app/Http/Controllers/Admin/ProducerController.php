<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Helper;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\ProviderSubcategory;
use App\Models\ProviderType;
use App\Models\Role;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class ProducerController extends Controller
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

        return view('admin.pages.producer.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Provider::producer()->get();

        return $datatables->of($query)
            ->addColumn('action', 'admin.pages.producer.partials.actions')
            ->editColumn('services', function ($q) {
                return sprintf('%s / %s', $q->provider_category->name, $q->provider_subcategory->name);
            })
            ->editColumn('orders', function ($q) {
                return count($q->user->budget_received->all());
            })
            ->editColumn('plan', function ($q) {
                return $q->provider_plan->name;
            })
            ->rawColumns([0])
            ->make(true);
    }

    public function create()
    {
        $providertype = ProviderType::all();
        $providercategory = ProviderCategory::all();
        $providersubcategory = ProviderSubcategory::all();

        return view('admin.pages.producer.create', compact('providertype', 'providercategory', 'providersubcategory'));
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
            'provider_type_id' => 2,
        ]);

        $provider = Provider::create($request->all());

        return redirect()->route('admin.producer');
    }

    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $user = User::findOrFail($provider->user->id);
        $providertype = ProviderType::all();
        $providercategory = ProviderCategory::all();
        $providersubcategory = ProviderSubcategory::all();

        return view('admin.pages.producer.edit', compact('user', 'provider', 'providertype', 'providercategory', 'providersubcategory'));
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $user = User::findOrFail($provider->user->id);

        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password)
            ]);
        }

        $user->update($request->all());
        $provider->update($request->all());

        return redirect()->route('admin.producer');
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $user = User::findOrFail($provider->user->id);

        try {
            $provider->delete();
            $user->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }

        return redirect()->route('admin.producer');
    }
}
