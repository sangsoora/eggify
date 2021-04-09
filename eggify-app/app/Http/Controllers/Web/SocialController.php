<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\Operator;
use App\Models\OperatorCompany;

class SocialController extends Controller
{
    public function redirect() {
        return Socialite::driver('linkedin')->redirect();
    }
    public function Callback() {
        $userSocial = Socialite::driver('linkedin')->stateless()->user();
        if (User::where('email', $userSocial->getEmail())->exists()) {
            $user = User::where(['email' => $userSocial->getEmail()])->first();
            Auth::login($user);
            return redirect()->route('web.index');
        } else {
            $name = $userSocial->getName();
            $firstName = $userSocial->user['firstName']['localized']['en_US'];
            $lastName = $userSocial->user['lastName']['localized']['en_US'];
            $email = $userSocial->getEmail();
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => '$2y$10$oLMKDeu7VewEDZ/pQ.t.4enKKW2I0OCcTwhbcJPq/PGLzsa.imS5O',
                'role_id' => 2,
                'user_type_id' => 5
            ]);
            $operator = Operator::create([
                'name' => $firstName,
                'surname' => $lastName,
                'user_id' => $user->id,
                'phone' => '',
                'address' => '',
            ]);
            $operator_company = OperatorCompany::create([
                'name' => '',
                'web' => '',
                'years' => 1,
                'linkedin' => '',
                'operator_id' => $operator->id,
                'operator_company_employees_id' => 1,
            ]);
            Auth::login($user);
            return redirect()->route('web.user.profile.edit');
        }
    }
}
