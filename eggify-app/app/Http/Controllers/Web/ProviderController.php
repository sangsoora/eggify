<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Note;
use App\Models\OperatorCompany;
use App\Models\Provider;
use App\Models\ProviderImages;
use App\Models\Rating;
use App\Models\RatingCriteria;
use App\Models\RatingProvider;
use App\Models\RatingRatingCriteria;
use App\Models\User;
use Database\Seeders\RatingsProvidersTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    //

    public function index(Request $request, $id)
    {
        $bodyClass = 'page-provider';

        $provider = Provider::findOrFail($id);

        if (!$provider->visible) {
            return redirect()->route('web.index');
        }

        $note = null;
        if (auth()->check()) {
            $note = Note::where('user_from_id', auth()->user()->id)->where('user_to_id', $provider->user->id)->get();
        }

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

        $ratingsProvider = RatingProvider::where('provider_id', $provider->id)->inRandomOrder()->limit(2)->get();

        $providerImages = ProviderImages::where('provider_id', $provider->id)->get();

        return view('web.provider', compact('bodyClass', 'provider', 'note', 'ratingsCriteria', 'ratingsProvider', 'providerImages'));
    }

    public function dashboard(Request $request)
    {
        $bodyClass = 'page-dashboard loged-provider';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);

        // Ratings
        $ratingsCriteria = RatingCriteria::all();
        $ratingsCriteria->map(function ($criteria) use ($user) {
            $ratingCount = 0;
            $ratingSum = 0;

            foreach ($user->provider->rating as $rating) {
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

        $ratingsProvider = RatingProvider::inRandomOrder()->limit(2)->get();

        return view('web.provider-dashboard', compact('bodyClass', 'user', 'ratingsCriteria', 'ratingsProvider'));
    }

    public function showcase(Request $request)
    {
        $bodyClass = 'page-showcase';

        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $user = User::findOrFail(auth()->user()->id);

        // Ratings
        $ratingsCriteria = RatingCriteria::all();
        $ratingsCriteria->map(function ($criteria) use ($user) {
            $ratingCount = 0;
            $ratingSum = 0;

            foreach ($user->provider->rating as $rating) {
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

        $ratingsProvider = RatingProvider::inRandomOrder()->limit(2)->get();

        // Images
        $providerImages = ProviderImages::where('provider_id', $user->provider->id)->get()->toArray();

        return view('web.provider-showcase', compact('bodyClass', 'user', 'ratingsCriteria', 'ratingsProvider', 'providerImages'));
    }

    public function showcaseUpdate(Request $request)
    {
        if (!(auth()->check())) {
            return redirect()->route('web.index');
        }

        $this->validate($request, [
            'about' => 'profane',
            'description' => 'profane',
            'usp' => 'profane'
        ]);

        $user = User::findOrFail(auth()->user()->id);

        // Images

        // - Delete images
        $providerImages = ProviderImages::where('provider_id', $user->provider->id)->get();

        foreach ($providerImages as $i => $image) {

            if ($request->logoremoved[$i] == 1) {
                $image->deleteImage();
                $image->delete();
            }

        }

        // - Save images
        if ($request->hasFile('logo')) {

            foreach ($request->logo as $image) {

                // File
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                // Upload image
                $image = Helper::saveImage($image, $user->provider->getFolder(), $filename);

                // Db
                ProviderImages::create([
                    'name' => $filename,
                    'provider_id' => $user->provider->id,
                ]);

            }

        }

        $request->merge([
            'visible' => 0
        ]);

        $user->provider->update($request->all());

        return response()->json(array(
            'status' => 200,
            'message' => ''
        ));
    }


}
