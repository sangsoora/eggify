<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Budget;
use App\Models\BudgetMessage;
use App\Models\BudgetStatus;
use App\Models\Note;
use App\Models\Operator;
use App\Models\OperatorCompany;
use App\Models\OperatorEmployee;
use App\Models\OperatorJob;
use App\Models\OperatorJobTag;
use App\Models\OperatorPosition;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\ProviderCompany;
use App\Models\ProviderEmployee;
use App\Models\ProviderType;
use App\Models\Role;
use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Database\Seeders\BudgetsUsersTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //

    public function signUpOperator(Request $request)
    {
        $bodyClass = 'page-provider';

        $jobs = OperatorJob::all();
        $jobs_tag = OperatorJobTag::all();
        $positions = OperatorPosition::all();

        return view('web.signup-client', compact('bodyClass', 'jobs', 'jobs_tag', 'positions'));
    }

    public function signUpOperatorStore(Request $request)
    {
        // Check
        if (User::where('email', $request->email)->exists()) {
            return response()->json(array(
                'status' => 500,
                'message' => 'El email ya existe en el sistema'
            ));
        }

        // Login
        $credentials = $request->only('email', 'password');

        // Registro
        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => Role::getUser()->firstOrFail()->id,
            'user_type_id' => UserType::typeOperator()->firstOrFail()->id
        ]);

        $user = User::create($request->all());

        $request->merge([
            'user_id' => $user->id,
            'policy_consent' => $request->policy_consent != null && $request->policy_consent == 'on' ? 1 : 0,
        ]);

        $operator = Operator::create($request->all());

        // Login
        Auth::attempt($credentials);

        return response()->json(array(
            'status' => 200,
            'message' => ''
        ));
    }

    public function signUpProvider(Request $request)
    {
        $bodyClass = 'page-signup';

        $providerTypes = ProviderType::all();
        $categories = ProviderCategory::all();

        return view('web.signup-provider', compact('bodyClass', 'categories', 'providerTypes'));
    }

    public function signUpProviderStore(Request $request)
    {
        // Check
        if (User::where('email', $request->email)->exists()) {
            return response()->json(array(
                'status' => 500,
                'message' => 'El email ya existe en el sistema'
            ));
        }

        // Login
        $credentials = $request->only('email', 'password');

        // Registro
        $request->merge([
            'password' => bcrypt($request->password),
            'role_id' => Role::getUser()->firstOrFail()->id,
            'user_type_id' => UserType::typeProvider()->firstOrFail()->id
        ]);

        $user = User::create($request->all());

        $request->merge([
            'user_id' => $user->id,
            'policy_consent' => $request->policy_consent != null && $request->policy_consent == 'on' ? 1 : 0,
            'provider_plan_id' => 1,
            'postal_code_id' => 1
        ]);

        $provider = Provider::create($request->all());

        // Login
        Auth::attempt($credentials);

        return response()->json(array(
            'status' => 200,
            'message' => ''
        ));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = User::findOrFail(auth()->user()->id);
            if ($user->isProvider()) {
                return redirect()->route('web.provider-dashboard');
            } else {
                return redirect()->route('web.index');
            }
            // return redirect()->route('web.index');
        }

        return redirect()->route('web.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('web.index');
    }

    public function profile()
    {

        $bodyClass = 'page-profile loged-provider';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);

        if ($user->isOperator()) {

            return view('web.profile-operator', compact('bodyClass', 'user'));

        } else if ($user->isProvider()) {

            return view('web.profile-provider', compact('bodyClass', 'user'));

        }

    }

    public function profileEdit()
    {

        $bodyClass = 'page-profile loged-provider';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);

        if ($user->isOperator()) {

            $operatorCompanies = OperatorCompany::all();
            $companyEmployees = OperatorEmployee::all();

            return view('web.profile-operator-edit', compact('bodyClass', 'user', 'operatorCompanies', 'companyEmployees'));

        } else if ($user->isProvider()) {

            $providerCategories = ProviderCategory::all();
            $companyEmployees = ProviderEmployee::all();

            return view('web.profile-provider-edit', compact('bodyClass', 'user', 'providerCategories', 'companyEmployees'));
        }

    }

    public function profileUpdate(Request $request)
    {

        $bodyClass = 'page-profile loged-provider';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);

        if ($user->isOperator()) {

            if ($request->hasFile('logo')) {
                // File
                $filename = str_slug($user->operator->name) . '-' . str_slug($user->operator->surname) . '.' . $request->logo->getClientOriginalExtension();
            }

            // Company
            $arrCompany = [
                'name' => $request->companyname,
                'web' => $request->web,
                'years' => $request->years,
                'linkedin' => $request->linkedin,
                'operator_id' => $user->operator->id,
                'operator_company_employees_id' => $request->operator_employees_id,
            ];

            if ($request->hasFile('logo')) {
                $arrCompany['logo'] = $filename;
            }

            if ($user->operator->operator_company != null) {
                // Update
                $user->operator->operator_company->update($arrCompany);
            } else {
                // Create
                OperatorCompany::create($arrCompany);
            }

            // Operator
            $user->operator->update($request->all());

            // User
            if ($request->password) {
                $request->merge([
                    'password' => bcrypt($request->password)
                ]);
            } else {
                $request->merge([
                    'password' => $user->password
                ]);
            }

            $user->update($request->all());


            if ($request->hasFile('logo')) {
                // Upload image
                $image = Helper::saveImage($request->logo, $user->operator->operator_company->getFolder(), $filename);
            }

            return response()->json(array(
                'status' => 200,
                'message' => ''
            ));

        } else {
            if ($user->isProvider()) {

                if ($request->hasFile('logo')) {
                    // File
                    $filename = str_slug($user->provider->name) . '.' . $request->logo->getClientOriginalExtension();
                }

                // Company
                $arrCompany = [
                    'name' => $request->companyname,
                    'web' => $request->web,
                    'years' => $request->years,
                    'linkedin' => $request->linkedin,
                    'provider_id' => $user->provider->id,
                    'provider_company_employees_id' => $request->provider_employees_id,
                ];

                if ($request->hasFile('logo')) {
                    $arrCompany['logo'] = $filename;
                }

                if ($user->provider->provider_company != null) {
                    // Update
                    $user->provider->provider_company->update($arrCompany);
                } else {
                    // Create
                    ProviderCompany::create($arrCompany);
                }

                // Provider
                $user->provider->update($request->all());

                // User
                if ($request->password) {
                    $request->merge([
                        'password' => bcrypt($request->password)
                    ]);
                } else {
                    $request->merge([
                        'password' => $user->password
                    ]);
                }

                $user->update($request->all());

                if ($request->hasFile('logo')) {
                    // Upload image
                    // TODO: [jojacafe] eliminar imagenes anteriores
                    $image = Helper::saveImage($request->logo, $user->provider->provider_company->getFolder(), $filename);
                }

                return response()->json(array(
                    'status' => 200,
                    'message' => ''
                ));

            }
        }

    }

    public function noteGet(Request $request)
    {
        $note = Note::where('user_from_id', auth()->user()->id)->where('user_to_id', $request->user_to_id);

        return response()->json(array(
            'success' => true,
            'message' => ($note->count() ? $note->first()->message : '')
        ));
    }

    public function noteStore(Request $request)
    {
        $arrNote = [
            'message' => $request->note,
            'user_from_id' => auth()->user()->id,
            'user_to_id' => $request->user_to_id
        ];

        $note = Note::where('user_from_id', auth()->user()->id)->where('user_to_id', $request->user_to_id);

        if ($note->count()) {
            $note->first()->update($arrNote);
        } else {
            $note = Note::create($arrNote);
        }

        return response()->json(array(
            'status' => 200,
            'message' => $note->first()->message
        ));
    }

    public function messageStore(Request $request)
    {
        $arrMessage = [
            'message' => $request->message,
            'user_from_id' => auth()->user()->id,
            'user_to_id' => $request->user_to_id
        ];

        $message = BudgetMessage::where('user_from_id', auth()->user()->id)->where('user_to_id', $request->user_to_id);

        if ($message->count()) {
            $arrMessage['budget_id'] = $message->first()->budget->id;
            $message = BudgetMessage::create($arrMessage);
        } else {
            $dt = Carbon::now();

            $arrBudget = [
                'data' => $dt->toDateString(),
                'time' => $dt->toTimeString(),
                'budget_status_id' => 1
            ];

            $budget = Budget::create($arrBudget);

            $arrMessage['budget_id'] = $budget->id;
            $message = BudgetMessage::create($arrMessage);
        }

        return response()->json(array(
            'status' => 200,
            'message' => ''
        ));
    }
}
