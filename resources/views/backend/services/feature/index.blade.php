@extends('backend.app')

@section('title', 'Features')

@section('content')

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="mb-3 d-flex">
                    <div class="p-2 class">
                        <!-- Add Feature Button -->
                        <button class="m-2 btn btn-light-success" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
                            Add Feature
                        </button>
                    </div>
                    <div class="p-2 ms-auto">
                        <a href="{{ route('service.index') }}" class="btn btn-light-danger">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Feature Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($features as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feature->feature_name }}</td>
                                    <td>
                                        <button class="m-2 btn btn-light-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $feature->id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $feature->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $feature->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $feature->id }}">
                                                            Delete Feature</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this feature?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('feature.destroy', $feature->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
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

    <!-- Modal for Adding Feature -->
    <div class="modal fade" id="addFeatureModal" tabindex="-1" aria-labelledby="addFeatureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFeatureModalLabel">Add Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('feature.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="feature_name" class="form-label">Feature Name</label>
                            <input type="text" class="form-control" id="feature_name" name="feature_name" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Feature</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
