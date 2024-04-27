@extends('layout')

@section('title', 'Companies | Test Task')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Companies</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Test Task</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Companies</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">All Companies</h4>
                <a href="{{ route('companies.create') }}" class="btn btn-outline-success">Add Company</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($companies->count() > 0)
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    @if($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="50">
                                    @else
                                        No logo available
                                    @endif
                                </td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $companies->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
