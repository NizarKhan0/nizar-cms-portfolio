@extends('backend.app')

@section('title', 'Home')

@section('content')

    <!-- Trigger Add Modal -->
    <button class="m-2 btn btn-light-success" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>

    <section class="section">
        <div class="mx-auto col-xl-8 col-md-6 col-sm-12">
            @foreach ($homes as $home)
                <div class="mb-4 card">
                    <div class="p-4 d-flex align-items-center justify-content-center">
                        <!-- Display the uploaded image -->

                        <div class="m-3">
                            <img src="{{ asset('storage/' . $home->image_path) }}" alt="Uploaded Image"
                                style="max-width: 300px;">
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <h1 class="card-title">{{ $home->job_title }}</h1>
                                <p class="card-text">{{ $home->intro }}</p>
                                <p class="card-text">{{ $home->description }}</p>
                                <p class="card-text">{{ $home->cta_link }}</p>
                                <p class="card-text">{{ $home->cta_text }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="m-3 card-footer d-flex justify-content-center">

                        <!-- Trigger Edit Modal -->
                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                            data-bs-target="#editModal-{{ $home->id }}">Edit</button>
                        <!-- Trigger Delete Modal -->
                        <button class="m-2 btn btn-light-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal-{{ $home->id }}">Delete</button>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal-{{ $home->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('home.update', $home->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Home</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('img/' . $home->image_path) }}" alt="Current Image"
                                            class="rounded-circle" style="width: 100px; height: 100px;">
                                    </div>
                                    <!-- Edit form fields -->
                                    <input type="text" name="job_title" class="form-control"
                                        value="{{ $home->job_title }}" required>
                                    <textarea name="intro" class="form-control" required>{{ $home->intro }}</textarea>
                                    <textarea name="description" class="form-control" required>{{ $home->description }}</textarea>
                                    <input type="text" name="cta_link" class="form-control"
                                        value="{{ $home->cta_link }}">
                                    <input type="text" name="cta_text" class="form-control"
                                        value="{{ $home->cta_text }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal-{{ $home->id }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('home.destroy', $home->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Home</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Add New Home</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add form fields -->
                                <input type="text" name="job_title" class="form-control" placeholder="Job Title"
                                    required>
                                <textarea name="intro" class="form-control" placeholder="Introduction" required></textarea>
                                <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                                <input type="text" name="cta_link" class="form-control" placeholder="CTA Link">
                                <input type="text" name="cta_text" class="form-control" placeholder="CTA Text">
                                <!-- New input for image upload -->
                                <input type="file" name="image_path" class="form-control" placeholder="Upload Image"
                                    accept="image/*" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Home</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>

@endsection
