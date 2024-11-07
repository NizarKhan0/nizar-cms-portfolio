@extends('backend.app')

@section('title', 'Services')

@section('content')

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex mb-3">
                    <div class="p-2"><button class="m-2 btn btn-light-success" data-bs-toggle="modal"
                            data-bs-target="#addModal"><i class="bi bi-pencil"></i></button></div>
                    <div class="ms-auto p-2"> <a href="{{ route('feature.index') }}" class="btn btn-light-primary"
                            target="_blank">Features Section</a>
                    </div>
                </div>
                {{-- <h5>Main Title : {{ $serviceMainTitle }}</h5> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Main Title</th> --}}
                                <th>Services Package</th>
                                <th>Services Description</th>
                                <th>Services Price</th>
                                <th>Services Featured</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->service_package }}</td>
                                    <td>{{ $service->service_description }}</td>
                                    <td>${{ $service->service_price }}</td>
                                    <td>
                                        @foreach ($service->features as $feature)
                                            <span class="badge bg-light-primary">{{ $feature->feature_name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Trigger Edit Modal -->
                                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $service->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $service->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('service.update', $service->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Edit form fields -->
                                                            <input type="text" name="service_package"
                                                                class="mb-2 form-control" placeholder="Service Title"
                                                                value="{{ $service->service_package }}" required>

                                                            <textarea name="service_description" class="mb-2 form-control" placeholder="Service Description" required>{{ $service->service_description }}</textarea>

                                                            <input type="number" name="service_price"
                                                                class="mb-2 form-control" placeholder="Service Price"
                                                                value="{{ $service->service_price }}" required>

                                                            <h4>Select Features</h4>
                                                            <select class="choices form-select multiple-remove"
                                                                multiple="multiple" name="features[]">
                                                                <optgroup label="Features">
                                                                    @foreach ($features as $feature)
                                                                        <option value="{{ $feature->id }}"
                                                                            {{ $service->features->contains($feature->id) ? 'selected' : '' }}>
                                                                            {{ $feature->feature_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Trigger Delete Modal -->
                                        <button class="m-2 btn btn-light-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $service->id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $service->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('service.destroy', $service->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Service
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add form fields -->
                        <input type="text" name="service_package" class="mb-2 form-control"
                            placeholder="Service Package" required>

                        <textarea name="service_description" class="mb-2 form-control" placeholder="Service Description" required></textarea>

                        <input type="number" name="service_price" class="mb-2 form-control" placeholder="Service Price"
                            required>

                        <h4>Select Features</h4>
                        <select class="choices form-select multiple-remove" multiple="multiple" name="features[]">
                            <optgroup label="Features">
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->feature_name }}</option>
                                @endforeach
                            </optgroup>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
