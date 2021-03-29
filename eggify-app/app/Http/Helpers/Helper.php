<?php

namespace App\Http\Helpers;

use File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Helper
{

    public static function saveImage($file, $path, $filename, $width = 1024, $height = null, $option = 'resize')
    {
        $image = Image::make($file)->widen($width);

        switch ($option) {
            case 'rezise':
                $image->resize($width, $height, function ($constraint) use ($height, $width) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                break;
            case 'crop':
                $image = $image->crop($width, $height);
                break;
            case 'heighten':
                $image->heighten($height, function ($constraint) use ($height, $width) {
                    $constraint->upsize();
                });
                break;
            case 'widen':
                $image->heighten($width, function ($constraint) use ($height, $width) {
                    $constraint->upsize();
                });
                break;
            default:
                $image->resize($width, $height, function ($constraint) use ($height, $width) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                break;
        }
        Storage::disk(getDisk())->put($path . $filename, (string)$image->encode());

        return $image;
    }

    public static function saveIcon($file, $path, $filename)
    {
        $image = Image::make($file);

        Storage::disk(getDisk())->put($path . $filename, (string)$image->encode());

        return $image;
    }

    public static function getAddressData($address)
    {
        $api = env('GOOGLE_API_KEY');

        $address = urlencode($address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=" . $api . "&language=" . app()->getLocale();
        $resp_json = file_get_contents($url);
        $resp = json_decode($resp_json, true);
        $data = collect();

        //Validates
        if ($resp['status'] == 'ZERO_RESULTS') {
            return null;
        }
        if ($resp['status'] != 'REQUEST_DENIED') {
            $address_components = $resp['results'][0]['address_components'];
            foreach ($address_components as $component) {

                if ($component['types'][0] == 'postal_code') {
                    $data->postal_code = $component['long_name'];
                }
                if ($component['types'][0] == 'locality') {
                    $data->city = $component['long_name'];
                }
                if ($component['types'][0] == 'administrative_area_level_1') {
                    $data->state = $component['long_name'];
                    $data->state_code = $component['short_name'];
                }
                if ($component['types'][0] == 'country') {
                    $data->country = $component['long_name'];
                    $data->country_code = $component['short_name'];
                }

            }
            $data->latitud = strval($resp['results'][0]['geometry']['location']['lat']);
            $data->longitud = strval($resp['results'][0]['geometry']['location']['lng']);

            return $data;
        } else {
            return null;
        }
    }

}
