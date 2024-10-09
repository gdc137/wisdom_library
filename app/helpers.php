<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


if (!function_exists('getFile')) {
    function getFile($url)
    {
        if ($url) {
            return Storage::disk('public')->get($url);
        } else {
            return null;
        }
    }
}


if (!function_exists('getFileUrl')) {
    function getFileUrl($url)
    {
        if ($url) {
            return Storage::disk('public')->url($url);
        } else {
            return Storage::disk('public')->url('/uploads/no-image.jpeg');
        }
    }
}

if (!function_exists('storeFileDirect')) {
    function storeFileDirect($file_path, $file)
    {
        Storage::disk('public')->put($file_path, $file);
    }
}

if (!function_exists('storeFile')) {
    function storeFile(Request $request, $file_name, $path, $new_filename, $height = null, $width = null)
    {
        $file_full_path = "";
        if ($request->has($file_name) && !empty($request->$file_name)) {

            $new_filename = $new_filename  . '.' . $request->$file_name->getClientOriginalExtension();

            $file_full_path = $path . $new_filename;
            if ($height || $width) {
                $height = $height ? $height : 320;
                $width = $width ? $width : 320;

                Image::make($request->$file_name)->resize($height, $width)->save(public_path('/storage/' . $new_filename));
            } else {
                Storage::disk('public')->putFileAs($path, $request->file($file_name), $new_filename);
            }
            return $file_full_path;
        }
    }
}

if (!function_exists('updateStoredFile')) {
    function updateStoredFile(Request $request, $old_file, $file_name, $path, $new_filename, $height = null, $width = null)
    {
        $file_full_path = "";
        if ($request->has($file_name) && !empty($request->$file_name)) {
            $old_file ? Storage::disk('public')->delete($old_file) : "";

            $new_filename = $new_filename  . '.' . $request->$file_name->getClientOriginalExtension();

            $file_full_path = $path . $new_filename;
            if ($height || $width) {
                $height = $height ? $height : 320;
                $width = $width ? $width : 320;

                Image::make($request->$file_name)->resize($height, $width)->save(public_path('/storage/' . $new_filename));
            } else {
                Storage::disk('public')->putFileAs($path, $request->file($file_name), $new_filename);
            }
        }

        return $file_full_path;
    }
}

if (!function_exists('deleteStoredFile')) {
    function deleteStoredFile($file_path)
    {
        if ($file_path) {
            Storage::disk('public')->delete($file_path);
        }
    }
}

if (!function_exists('replaceStoredFile')) {
    function replaceStoredFile($file_path, $file)
    {
        Storage::disk('public')->delete($file_path);
        Storage::disk('public')->put($file_path, $file);
    }
}
