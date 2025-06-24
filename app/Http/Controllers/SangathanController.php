<?php

namespace App\Http\Controllers;
use App\Models\District;
use Illuminate\Http\Request;

class SangathanController extends Controller
{

    //
    public function index()
    {
        $districts = District::withCount('cities')->get();
        return view('sangathan.index', compact('districts'));
    }
    // public function show($id)
    // {
    //     $district = District::with('cities')->findOrFail($id);
    //     return view('sangathan.show', compact('district'));
    // }
}
