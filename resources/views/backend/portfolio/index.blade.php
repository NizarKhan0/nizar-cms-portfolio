@extends('backend.app')

@section('title', 'Portfolio')

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
                                <th>Project Title</th>
                                <th>Desciption</th>
                                <th>Porject Link</th>
                                <th>Technology Used</th>
                                <th>Project Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td>{{ $portfolio->project_title }}</td>
                                    <td>{{ $portfolio->project_description }}</td>
                                    <td>{{ $portfolio->project_link }}</td>
                                    {{-- $portfolio->skills accesses the related Skill models.
                                     use methods like pluck() and implode() to extract and manipulate the data. --}}
                                    <td>{{ $portfolio->skills->pluck('skill_name')->implode(', ') }}</td>
                                    {{-- cara guna ni sebab pivot table jadi kena iterate --}}
                                    {{-- <td>
                                        @foreach ($portfolio->skills as $skill)
                                            {{ $skill->skill_name }}<br>
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        <img src="{{ asset('storage/uploads/projects/' . $portfolio->project_image) }}"
                                            alt="" width="100" height="100">
                                    </td>
                                    <td>
                                        <!-- Trigger Edit Modal -->
                                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $portfolio->id }}">Edit</button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $portfolio->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('portfolio.update', $portfolio->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Portfolio</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="m-3 text-center">
                                                                @if ($portfolio->project_image)
                                                                    {{-- wajib letak / tu kalau nak ke access dalam storage --}}
                                                                    <img src="{{ asset('storage/uploads/projects/' . $portfolio->project_image) }}"
                                                                        alt="Current Image" class="rounded-circle"
                                                                        style="width: 100px; height: 100px;">
                                                                @else
                                                                    <p>No Image Uploaded</p>
                                                                @endif
                                                            </div>
                                                            <!-- File Upload Input -->
                                                            <div class="m-3">
                                                                <label for="project_image">Upload New Project
                                                                    Image:</label>
                                                                <input type="file" name="project_image"
                                                                    class="mb-2 form-control"
                                                                    placeholder="Upload Project Image" accept="image/*">
                                                            </div>
                                                            <!-- Edit form fields -->
                                                            <input type="text" name="project_title"
                                                                class="mb-2 form-control" placeholder="Project Title"
                                                                value="{{ $portfolio->project_title }}" required>
                                                            <input type="text" name="project_description"
                                                                class="mb-2 form-control" placeholder="Project Description"
                                                                value="{{ $portfolio->project_description }}" required>
                                                            <input type="text" name="project_link"
                                                                class="mb-2 form-control" placeholder="Project Link"
                                                                value="{{ $portfolio->project_link }}">

                                                            <h4>Select Skills</h4>
                                                            <select class="choices form-select multiple-remove"
                                                                id="skills" multiple="multiple" name="skills[]">
                                                                <optgroup label="Skills">
                                                                    @foreach ($skills as $skill)
                                                                        <option value="{{ $skill->id }}"
                                                                            @if (in_array($skill->id, $portfolioSkills->firstWhere('portfolio_id', $portfolio->id)['selectedSkills'])) selected @endif>
                                                                            {{ $skill->skill_name }}
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
                                            data-bs-target="#deleteModal-{{ $portfolio->id }}">Delete</button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $portfolio->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Portfolio
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
                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add form fields -->
                        <input type="text" name="project_title" class="mb-2 form-control" placeholder="Project Title"
                            required>
                        <input type="text" name="project_description" class="mb-2 form-control"
                            placeholder="Project Description" required>
                        <input type="text" name="project_link" class="mb-2 form-control" placeholder="Project Link">

                        <h4>Select Skills</h4>
                        <select class="choices form-select multiple-remove" multiple="multiple" name="skills[]">
                            <optgroup label="Skills">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                @endforeach
                            </optgroup>
                        </select>

                        <div class="m-3">
                            <label for="project_image">Upload New Project Image:</label>
                            <input type="file" name="project_image" class="mb-2 form-control"
                                placeholder="Upload Image" accept="image/*" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
