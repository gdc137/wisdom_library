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
}
