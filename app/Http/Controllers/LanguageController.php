<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function get()
    {
        $languages = Language::query();
        $languages = $languages->where('delete_status', 0)->get();
        return response()->json([
            'data' => $languages,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $language = new Language();
        $language->name = $request->name;
        $language->save();
        return response()->json(['message' => 'Language added successfully'], 200);
    }

    public function edit($id)
    {
        return response()->json(['data' => Language::find($id)], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $language = Language::find($id);
        $language->name = $request->name;
        $language->save();
        return response()->json(['message' => 'Language updated successfully'], 200);
    }

    public function changeStatus($id)
    {
        $languages = Language::find($id);
        $languages->active_status =  $languages->active_status == 1 ? 0 : 1;
        $languages->save();
        return response()->json(['message' => 'Status changed successfully'], 200);
    }

    public function destroy($id)
    {
        // Language::find($id)->delete();
        $language = Language::find($id);
        $language->delete_status = 1;
        $language->save();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
