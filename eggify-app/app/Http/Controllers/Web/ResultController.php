<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\RatingCriteria;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResultController extends Controller
{
    //

    public function index(Request $request, $category = null, $city = null)
    {
        $bodyClass = 'page-sub';

        $cities = City::all();
        $states = State::all();
        $city_selected = null;
        $categories = ProviderCategory::all();
        $providers = Provider::with('provider_category', 'postal_code');
        $ratings_criteria = RatingCriteria::all();

        if ($category) {
            $category_selected = ProviderCategory::where('id', $category)->firstOrFail();
            $providers = $providers->where('provider_category_id', $category);
        }

        if ($city) {
            $city_selected = City::where('id', $city)->firstOrFail();
            $providers = $providers->whereHas('postal_code', function ($query) use ($city) {
                $query->where('city_id', $city);
            });
        }

        // TODO [jojacafe]: order by rating category
        if ($request->input('order')) {

        }

        $providers = $providers->get();

        return view('web.result', compact('bodyClass', 'cities', 'states', 'city_selected', 'categories', 'category_selected', 'providers', 'ratings_criteria'));
    }
}
