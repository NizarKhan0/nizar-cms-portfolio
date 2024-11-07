<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesRequest;

class ServicesController extends Controller
{
    public function index()
    {
        $title = 'Services';
        $service = Service::with('features')->get();
        $feature = Feature::all();

        //Untuk proses update/edit
        $serviceFeatures = $service->map(function ($service) {
            return [
                'service_id' => $service->id,
                'selectedFeatures' => $service->features->pluck('id')->toArray(), // Fetch selected feature IDs for this service
            ];
        });

        return view('backend.services.index', [
            'title' => $title,
            'services' => $service,
            'features' => $feature,
            'serviceFeatures' => $serviceFeatures, // Pass the selected features to the view
        ]);
    }

    public function store(ServicesRequest $request)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        // Service::create($request->all());
        // dd($request->all());

        // Create a new service instance
        $service = new Service();
        $service->service_package = $request->service_package;
        $service->service_description = $request->service_description;
        $service->service_price = $request->service_price;

        $service->save();
        // dd($service);

        // Attach the selected unique features to the service
        //untuk dapatkan data bila store klau xde, relationship dia pun xde

        // if ($request->has('features')) {
        //     $uniqueFeatures = array_unique($request->features); // Remove duplicate feature IDs
        //     $service->features()->attach($uniqueFeatures);
        // }
        if ($request->has('features')) {
            $uniqueFeatures = array_unique($request->features); // Remove duplicate feature IDs

            // Prepare the pivot data with timestamps
            $pivotData = [];
            foreach ($uniqueFeatures as $featureId) {
                $pivotData[$featureId] = [
                    'created_at' => now(),  // Set created_at timestamp
                    'updated_at' => now(),  // Set updated_at timestamp
                ];
            }

            // Attach the features with timestamps to the service
            $service->features()->attach($pivotData);
        }


        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    public function update(ServicesRequest $request, Service $service)
    {
        $request->validated();

        // Update service fields
        $service->service_package = $request->service_package;
        $service->service_description = $request->service_description;
        $service->service_price = $request->service_price;

        $service->save();

        // Check if features are provided and sync them
        if ($request->has('features') && is_array($request->features)) {
            // Remove duplicates from the features array
            $uniqueFeatures = array_unique($request->features);

            // If the features array is empty, it will remove all associated features from the service
            $service->features()->sync($uniqueFeatures);
        } else {
            // If no features are selected, remove all features associated with the service (empty the array)
            $service->features()->sync([]);
        }

        return redirect()->route('service.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
