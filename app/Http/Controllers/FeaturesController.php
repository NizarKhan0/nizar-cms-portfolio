<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        $title = 'Features';
        $feature = Feature::all();

         return view('backend.services.feature.index',[
             'title' => $title,
             'features' => $feature
         ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'feature_name' => 'required',
        ]);

        Feature::create($request->all());

        // dd($request->all());

        return redirect()->route('feature.index')->with('success', 'Feature created successfully');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('feature.index')->with('success', 'Feature deleted successfully');
    }
}
