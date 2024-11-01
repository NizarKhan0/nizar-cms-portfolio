@extends('backend.app')

@section('title', 'Education')

@section('content')

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <!-- Trigger Add Modal -->
                    <button class="m-2 btn btn-light-success" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Education</th>
                                <th>Institute Name</th>
                                <th>Address</th>
                                <th>Start Date & End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $education)
                                <tr>
                                    <td>{{ $education->education_name }}</td>
                                    @if ($education->institution_name == null)
                                        <td>No Institute</td>
                                    @else
                                        <td>{{ $education->institution_name }}</td>
                                    @endif
                                    <td>{{ $education->location }}</td>
                                    <td>
                                        @if ($education->end_date)
                                            {{ $education->start_date }} - {{ $education->end_date }}
                                        @else
                                            {{ $education->start_date }} - Present
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Trigger Edit Modal -->
                                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $education->id }}">Edit</button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $education->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('education.update', $education->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Education</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Edit form fields -->
                                                            <input type="text" name="education_name" class="mb-2 form-control"
                                                                value="{{ $education->education_name }}" required>
                                                            <input type="text" name="institution_name"
                                                                class="mb-2 form-control"
                                                                value="{{ $education->institution_name }}">
                                                            <input type="text" name="location" class="mb-2 form-control"
                                                                value="{{ $education->location }}" required>
                                                            <input type="date" name="start_date"
                                                                class="mb-3 form-control" value="{{ $education->start_date }}"
                                                                required>
                                                            <input type="date" name="end_date" class="mb-3 form-control"
                                                                value="{{ $education->end_date }}">
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
                                            data-bs-target="#deleteModal-{{ $education->id }}">Delete</button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $education->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('education.destroy', $education->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Education</h5>
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
                <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Education</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add form fields -->
                        <input type="text" name="education_name" class="mb-2 form-control" placeholder="Education" required>
                        <input type="text" name="institution_name" class="mb-2 form-control" placeholder="Institution Name">
                        <input type="text" name="location" class="mb-2 form-control" placeholder="Address" required>
                        <input type="date" name="start_date" class="mb-3 form-control" placeholder="Select date.."
                            required>
                        <input type="date" name="end_date" class="mb-3 form-control" placeholder="Select date..">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Education</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
