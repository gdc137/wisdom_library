<?php

namespace App\Http\Controllers;

use App\Models\Scripture;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ScriptureController extends Controller
{
    public function index()
    {
        $books = Scripture::query();
        $books = $books->latest()->get();

        return response()->json([
            'books' => $books
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $scripture = new Scripture();
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


    public function edit(Request $request, $id)
    {
        return response()->json([
            'books' => Scripture::find($id),
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
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

    public function destroy(Request $request, $id) {

        Scripture::findOrFail($id)->delete();
    }
}
