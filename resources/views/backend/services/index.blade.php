@extends('backend.app')

@section('title', 'Services')

@section('content')


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <!-- Trigger Add Modal -->
                    <button class="m-2 btn btn-light-success" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
                </h5>
                {{-- <h5>Main Title : {{ $serviceMainTitle }}</h5> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Main Title</th> --}}
                                <th>Services</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    {{-- <td>{{ $service->main_title }}</td> --}}
                                    <td>{{ $service->service_title }}</td>
                                    <td>{{ $service->service_description }}</td>
                                    <td>
                                        <!-- Trigger Edit Modal -->
                                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $service->id }}">Edit</button>

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
                                                            <input type="text" name="service_title"
                                                                class="mb-2 form-control" placeholder="Service Title"
                                                                value="{{ $service->service_title }}" required>
                                                            <textarea name="service_description" class="mb-2 form-control" placeholder="Service Description" required>{{ $service->service_description }}</textarea>
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
                                            data-bs-target="#deleteModal-{{ $service->id }}">Delete</button>

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
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add form fields -->
                        <input type="text" name="service_title" class="mb-2 form-control" placeholder="Service Title"
                            required>
                        <textarea name="service_description" class="mb-2 form-control" required></textarea>
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
