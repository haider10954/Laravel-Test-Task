@extends('layout')

@section('title', 'Edit Company | Test Task')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Edit Company</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Test Task</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Company</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Company</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="list-style: none;">
                                @foreach ($errors->all() as $error)
                                    <li class="mb-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Specify the HTTP method -->

                        <div class="form-group mb-3">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @if ($company->logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="50">
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website" name="website"
                                   value="{{ $company->website }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
