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
        Storage::disk(getDisk())->put($path . $filename, (string) $image->encode());

        return $image;
    }
    public static function saveIcon($file, $path, $filename, $width = 36, $height = 36, $option = 'resize')
    {
        $image = Image::make($file)->widen($width);

        switch ($option) {
            default:
                $image->resize($width, $height, function ($constraint) use ($height, $width) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                break;
        }
        Storage::disk(getDisk())->put($path . $filename, (string) $image->encode());

        return $image;
    }

}
