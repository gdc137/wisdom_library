<?php

namespace App\Http\Controllers;

use App\Models\Scripture;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ScriptureController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function get()
    {
        $scriptures = Scripture::query();
        $scriptures = $scriptures->where('delete_status', 0)->get();

        return response()->json([
            'data' => $scriptures
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'visible_at' => ['required', 'date']
        ]);

        $scripture = new Scripture();
        $scripture->land_id = 1;
        $scripture->title = $request->title;
        $scripture->description = $request->description;

        $file_name = 'image';
        $files_path = 'scriptures/';
        $new_name = 'scripture-image-' . time() . '-' . uniqid();
        $image_file = storeFile($request, $file_name, $files_path, $new_name);

        $scripture->image = $image_file;
        $scripture->author = $request->author;
        $scripture->publish_detail = $request->publish_detail;
        $scripture->root_language = $request->root_language;
        $scripture->visible_at = date("Y-m-d 07:00:00", strtotime($request->visible_at));
        $scripture->meta_slug = $request->meta_slug;
        $scripture->meta_title = $request->meta_title;
        $scripture->meta_desc = $request->meta_desc;
        $scripture->meta_keywords = $request->meta_keywords;
        $scripture->save();

        return response()->json(['message' => 'Scripture added successfully'], 200);
    }

    public function edit($id)
    {
        return response()->json([
            'data' => Scripture::find($id),
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'visible_at' => ['required', 'date']
        ]);

        $scripture = Scripture::find($id);
        $scripture->land_id = 1;
        $scripture->title = $request->title;
        $scripture->description = $request->desc;
        $scripture->auther = $request->auther;
        $scripture->visible_at = date("Y-m-d H:i:s");

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = 'newfile' . time() . '.' . $image->getClientOriginalExtension();
            $image = Image::read($image);
            // Resize image
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/' . $filename));
            $scripture->image = $filename;
        } else {
            $scripture->image = "no-image.jpeg";;
        }
        $scripture->save();
    }

    public function changeStatus($id)
    {
        $scripture = Scripture::find($id);
        $scripture->active_status =  $scripture->active_status == 1 ? 0 : 1;
        $scripture->save();
        return response()->json(['message' => 'Status changed successfully'], 200);
    }

    public function destroy($id)
    {

        // Scripture::findOrFail($id)->delete();
        $scripture = Scripture::find($id);
        $scripture->delete_status = 1;
        $scripture->save();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
