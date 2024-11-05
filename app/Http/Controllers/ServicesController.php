<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
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

    public function store(ServicesRequest $request)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        Service::create($request->all());
        // dd($request->all());

        // Create a new service instance
        // $service = new Service();
        // $service->service_title = $request->service_title;
        // $service->service_description = $request->service_description; // Save the Quill content
        // $service->save();
        // dd($service);

        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    public function update(ServicesRequest $request, Service $service)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        $service->update($request->all());

        return redirect()->route('service.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
