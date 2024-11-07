@extends('backend.app')

@section('title', 'Contact')

@section('content')


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <!-- Trigger Add Modal -->
                    <button class="m-2 btn btn-light-success" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="bi bi-pencil"></i>
                    </button>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->number_phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>
                                        <img src="{{ asset('storage/uploads/contacts/' . $contact->contact_logo) }}"
                                            alt="" width="100" height="100">
                                    </td>
                                    <td>
                                        <!-- Trigger Edit Modal -->
                                        <button class="m-2 btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $contact->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $contact->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('contact.update', $contact->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Contact</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="m-3 text-center">
                                                                @if ($contact->contact_logo)
                                                                    {{-- wajib letak / tu kalau nak ke access dalam storage --}}
                                                                    <img src="{{ asset('storage/uploads/contacts/' . $contact->contact_logo) }}"
                                                                        alt="Current Image" class="rounded-circle"
                                                                        style="width: 100px; height: 100px;">
                                                                @else
                                                                    <p>No Image Uploaded</p>
                                                                @endif
                                                            </div>
                                                            <!-- File Upload Input -->
                                                            <div class="m-3">
                                                                <label for="contact_logo">Upload New Contact
                                                                    Image:</label>
                                                                <input type="file" name="contact_logo"
                                                                    class="mb-2 form-control"
                                                                    placeholder="Upload Project Image" accept="image/*">
                                                            </div>
                                                            <!-- Edit form fields -->
                                                            <input type="number" name="number_phone"
                                                                class="mb-2 form-control"
                                                                value="{{ $contact->number_phone }}"
                                                                placeholder="Number Phone" required>
                                                            <input type="email" name="email" class="mb-2 form-control"
                                                                value="{{ $contact->email }}" placeholder="Email" required>
                                                            <input type="text" name="address" class="mb-2 form-control"
                                                                value="{{ $contact->address }}" placeholder="Address"
                                                                required>

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
                                            data-bs-target="#deleteModal-{{ $contact->id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $contact->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('contact.destroy', $contact->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Contact
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
                <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add form fields -->
                        <input type="number" name="number_phone" class="mb-2 form-control" placeholder="Number Phone"
                            required>
                        <input type="email" name="email" class="mb-2 form-control" placeholder="Email" required>
                        <input type="text" name="address" class="mb-2 form-control" placeholder="Address" required>
                        <input type="file" name="contact_logo" class="mb-2 form-control" placeholder="Upload Image"
                            accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
