<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\ProviderCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SearcherController extends Controller
{
    //

    public function provider(Request $request) {
        $bodyClass = '';

        $categories = ProviderCategory::all();

        return view('web.search-provider', compact('bodyClass', 'categories'));
    }
}
