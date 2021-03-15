<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Provider;
use App\Models\Rating;
use App\Models\RatingCriteria;
use App\Models\RatingProvider;
use App\Models\RatingRatingCriteria;
use App\Models\User;
use Database\Seeders\RatingsProvidersTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OpinionsController extends Controller
{
    //

    public function index(Request $request, $id)
    {
        $bodyClass = 'page-provider opinions';

        $provider = Provider::findOrFail($id);

        // Ratings
        $ratingsCriteria = RatingCriteria::all();
        $ratingsCriteria->map(function ($criteria) use ($provider) {
            $ratingCount = 0;
            $ratingSum = 0;

            foreach ($provider->rating as $rating) {
                foreach ($rating->rating_criteria as $ratingCriteria) {
                    if ($ratingCriteria->rating_criteria_id == $criteria->id) {
                        $ratingCount++;
                        $ratingSum += $ratingCriteria->rating;
                    }
                }
            }

            $criteria['rating'] = 0;

            if ($ratingSum != 0 && $ratingCount != 0) {
                $criteria['rating'] = $ratingSum / $ratingCount;
            }

            return $criteria;
        });

        $ratingsProvider = RatingProvider::where('provider_id', $provider->id)->get();

        return view('web.opinions', compact('bodyClass', 'provider', 'ratingsCriteria', 'ratingsProvider'));
    }

    public function add(Request $request, $id)
    {
        $bodyClass = 'page-provider opinions';

        $provider = Provider::findOrFail($id);

        // Ratings
        $ratingsCriteria = RatingCriteria::all();
        $ratingsCriteria->map(function ($criteria) use ($provider) {
            $ratingCount = 0;
            $ratingSum = 0;

            foreach ($provider->rating as $rating) {
                foreach ($rating->rating_criteria as $ratingCriteria) {
                    if ($ratingCriteria->rating_criteria_id == $criteria->id) {
                        $ratingCount++;
                        $ratingSum += $ratingCriteria->rating;
                    }
                }
            }

            $criteria['rating'] = 0;

            if ($ratingSum != 0 && $ratingCount != 0) {
                $criteria['rating'] = $ratingSum / $ratingCount;
            }

            return $criteria;
        });

        $ratingsProvider = RatingProvider::where('provider_id', $provider->id)->get();

        return view('web.opinions-add', compact('bodyClass', 'id', 'provider', 'ratingsCriteria', 'ratingsProvider'));
    }

    public function addStore(Request $request, $id)
    {

        $user = User::findOrFail(auth()->user()->id);

        // Rating AVG
        $ratingAvg = 0;

        foreach ($request->ratings_criteria as $i => $el) {
            $criteriaId = explode(",", $el)[0];
            $criteriaRating = explode(",", $el)[1];

            $ratingAvg += $criteriaRating;
        }

        $ratingAvg = $ratingAvg / count($request->ratings_criteria);


        // Rating create

        $arrRating = [
            'rating' => $ratingAvg,
            'recommended' => $request->recommended,
            'title' => $request->title,
            'comment' => $request->comment,
            'photo' => '',
            'user_id' => auth()->user()->id,

        ];

        $rating = Rating::create($arrRating);

        // Criteria create

        foreach ($request->ratings_criteria as $i => $el) {
            $criteriaId = explode(",", $el)[0];
            $criteriaRating = explode(",", $el)[1];

            $arrCriteria = [
                'rating' => $criteriaRating,
                'rating_id' => $rating->id,
                'rating_criteria_id' => $criteriaId,
            ];

            RatingRatingCriteria::create($arrCriteria);
        }


        // Rating provider

        $arrRatingProvider = [
            'provider_id' => $id,
            'rating_id' => $rating->id,
        ];

        RatingProvider::create($arrRatingProvider);

        return response()->json(array(
            'status' => 200,
            'message' => ''
        ));
    }
}
