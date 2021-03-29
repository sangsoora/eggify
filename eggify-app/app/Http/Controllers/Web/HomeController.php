<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\ProviderCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //

    public function index(Request $request) {
        $bodyClass = '';

        $providers = Provider::visible()->inRandomOrder()->limit(6)->get();
        $categories = ProviderCategory::all();
        $categories_featured = ProviderCategory::inRandomOrder()->limit(6)->get();

        return view('web.index', compact('bodyClass', 'providers', 'categories', 'categories_featured'));
    }
}
