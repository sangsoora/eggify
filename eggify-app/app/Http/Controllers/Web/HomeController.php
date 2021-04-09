<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //

    public function index(Request $request) {
        $bodyClass = '';

        if ((auth()->check()) && (User::findOrFail(auth()->user()->id)->isProvider())) {
            return redirect()->route('web.provider-dashboard');
        }

        $providers = Provider::visible()->inRandomOrder()->limit(6)->get();
        $categories = ProviderCategory::all();
        $categories_featured = ProviderCategory::inRandomOrder()->limit(6)->get();

        return view('web.index', compact('bodyClass', 'providers', 'categories', 'categories_featured'));
    }
}
