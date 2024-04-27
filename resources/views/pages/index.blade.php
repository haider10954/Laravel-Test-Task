@extends('layout')

@section('title', 'Dashboard | Test Task')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Dashboard</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Test Task</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card mini-stats">
                <div class="p-3 mini-stats-content">
                    <div class="mb-4">
                        <div class="float-end text-end">
                        </div>
                        <span class="peity-pie" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"]}' data-width="54" data-height="54">5/8</span>
                    </div>
                </div>
                <div class="mx-3">
                    <div class="card mb-0 border p-3 mini-stats-desc">
                        <div class="d-flex">
                            <h6 class="mt-0 mb-3">Companies</h6>
                            <h5 class="ms-auto mt-0">{{ $companies }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div class="card mini-stats">
                <div class="p-3 mini-stats-content">
                    <div class="mb-4">
                        <div class="float-end text-end">
                        </div>
                        <span class="peity-donut" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }' data-width="54" data-height="54">2/5</span>
                    </div>
                </div>
                <div class="mx-3">
                    <div class="card mb-0 border p-3 mini-stats-desc">
                        <div class="d-flex">
                            <h6 class="mt-0 mb-3">Employees</h6>
                            <h5 class="ms-auto mt-0">{{ $employees }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
