@extends('backend.app')

@section('title', 'Work Experience')

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
                                <th>Position</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Start Date & End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($works as $work)
                                <tr>
                                    <td>{{ $work->position }}</td>
                                    @if ($work->company_name == null)
                                        <td>No Company</td>
                                    @else
                                        <td>{{ $work->company_name }}</td>
                                    @endif
                                    <td>{{ $work->location }}</td>
                                    <td>
                                        @if ($work->end_date)
                                            {{ $work->start_date }} - {{ $work->end_date }}
                                        @else
                                            {{ $work->start_date }} - Present
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Trigger Edit Modal -->
                                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $work->id }}">Edit</button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $work->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('work.update', $work->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Work</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Edit form fields -->
                                                            <input type="text" name="position" class="mb-2 form-control"
                                                                value="{{ $work->position }}" required>
                                                            <input type="text" name="company_name"
                                                                class="mb-2 form-control"
                                                                value="{{ $work->company_name }}">
                                                            <input type="text" name="location" class="mb-2 form-control"
                                                                value="{{ $work->location }}" required>
                                                            <input type="date" name="start_date"
                                                                class="mb-3 form-control" value="{{ $work->start_date }}"
                                                                required>
                                                            <input type="date" name="end_date" class="mb-3 form-control"
                                                                value="{{ $work->end_date }}">
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
                                            data-bs-target="#deleteModal-{{ $work->id }}">Delete</button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $work->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('work.destroy', $work->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Skill</h5>
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
                <form action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Work</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add form fields -->
                        <input type="text" name="position" class="mb-2 form-control" placeholder="Position" required>
                        <input type="text" name="company_name" class="mb-2 form-control" placeholder="Company Name">
                        <input type="text" name="location" class="mb-2 form-control" placeholder="Address" required>
                        <input type="date" name="start_date" class="mb-3 form-control" placeholder="Select date.."
                            required>
                        <input type="date" name="end_date" class="mb-3 form-control" placeholder="Select date..">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Work</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
