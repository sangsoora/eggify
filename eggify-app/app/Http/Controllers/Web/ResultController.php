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

        $cities = City::whereHas('postal_code', function ($query) {
            $query->whereHas('provider', function ($query) {
                $query->visible();
            });
        })->get();
        $states = State::all();
        $city_selected = null;
        $categories = ProviderCategory::all();
        $providers = Provider::with('provider_category', 'postal_code')->visible();
        $ratings_criteria = RatingCriteria::all();

        $category_selected = null;
        if ($category && $category != 0) {
            $category_selected = ProviderCategory::where('id', $category)->firstOrFail();
            $providers = $providers->where('provider_category_id', $category);
        }

        $city_selected = null;
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

    public function search(Request $request, $query)
    {
        $bodyClass = 'page-sub';

        $cities = City::whereHas('postal_code', function ($query) {
            $query->whereHas('provider', function ($query) {
                $query->visible();
            });
        })->get();
        $city_selected = null;
        $category_selected = null;
        $states = State::all();
        $ratings_criteria = RatingCriteria::all();
        $categories = ProviderCategory::all();

        $providers = Provider::with('provider_category', 'provider_subcategory', 'postal_code');

        // Name provider
        $providers->orWhere('name', 'like', '%' . $query . '%');

        // Category
        $providers->orWhereHas('provider_category', function($q) use($query){
            $q->where('providers_category.name', 'like', '%' . $query . '%');
        });

        // Subcategory
        $providers->orWhereHas('provider_subcategory', function($q) use($query){
            $q->where('providers_subcategory.name', 'like', '%' . $query . '%');
        });

        // TODO [jojacafe]: order by rating category
        if ($request->input('order')) {

        }

        $providers = $providers->visible()->get();

        return view('web.result', compact('bodyClass', 'cities', 'states', 'city_selected', 'categories', 'category_selected', 'providers', 'ratings_criteria'));
    }
}
