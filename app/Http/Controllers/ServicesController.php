<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $title = 'Services';
        $service = Service::all();
        // $serviceMainTitle = 'Our Services';

        return view('backend.services.index', [
            'title' => $title,
            'services' => $service,
            // 'serviceMainTitle' => $serviceMainTitle
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'main_title' => 'nullable',
            'service_title' => 'required',
            'service_description' => 'required',
        ]);


        Service::create($request->all());
        // dd($request->all());

        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    public function update(Request $request, Service $service)
    {
        $validate = $request->validate([
            'main_title' => 'nullable',
            'service_title' => 'required',
            'service_description' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('service.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
