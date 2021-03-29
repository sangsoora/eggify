<?php

namespace App\Http\Traits;

use App\Models\City;
use App\Models\Country;
use App\Models\PostalCode;
use App\Models\State;

trait Geo
{
    /**
     *
     * @param $request
     * @return array
     * @internal param postal_code $request
     */
    public static function postal_code($address)
    {
        try {

            if (isset($address->postal_code)) {
                $cp = PostalCode::with('city.state.country')->where('postal_codes.code', $address->postal_code)->first();

                if ($cp) {
                    $data = [
                        'postal_code_id' => $cp->id,
                        'city_id' => $cp->city->id,
                        'state_id' => $cp->city->state->id,
                        'country_id' => $cp->city->state->country->id,
                    ];
                } else {
                    // Insert required fields in db
                    $data = Geo::store_address($address);
                }
                return $data;

            } else {
                return $data = null;
            }

        } catch (QueryException $ex) {

            return $data = null;
        }
    }

    /**
     *
     * @param $request
     * @return array
     * @internal param postal_code $request
     */
    public static function store_address($address)
    {
        try {

            $country = Country::firstOrCreate(
                ['code' => $address->country_code],
                ['name' => $address->country]
            );

            $state = State::firstOrCreate(
                ['code' => $address->state_code],
                ['name' => $address->state, 'country_id' => $country->id]
            );

            $city = City::firstOrCreate(
                ['name' => $address->city],
                ['state_id' => $state->id]
            );

            $cp = PostalCode::firstOrCreate(
                ['code' => $address->postal_code],
                ['city_id' => $city->id]
            );

            $data = [
                'postal_code_id' => $cp->id,
                'city_id' => $city->id,
                'state_id' => $state->id,
                'country_id' => $country->id,
            ];

            return ($data);

        } catch (QueryException $ex) {
            return $data = null;
        }
    }

}
