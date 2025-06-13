@extends('admin.layout')
@section('content')
<div class="container-fluid px-4 mt-4">
  <!-- Welcome Card -->
  <div class="card mb-4 shadow-sm border-0 rounded">
    <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
      <div>
        <h2 class="card-title mb-1">Welcome, Admin 👋</h2>
        <p class="text-muted mb-0">Manage your community easily from this dashboard.</p>
      </div>
      <a href="{{ route('admin.members.index') }}" class="btn btn-success btn-lg mt-3 mt-md-0">
        <i class="bi bi-people-fill"></i> Manage Members
      </a>
    </div>
  </div>

  <!-- Stat Cards -->
  <div class="row gx-4">
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card text-white bg-primary h-100 shadow-sm">
        <div class="card-body">
          <div class="card-title fs-5">Total Members</div>
          <h3>{{ \App\Models\Member::count() }}</h3>
        </div>
      </div>
    </div>
    <!-- <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card text-white bg-secondary h-100 shadow-sm">
        <div class="card-body">
          <div class="card-title fs-5">Today’s New</div>
          <h3>{{ \App\Models\Member::whereDate('created_at', now())->count() }}</h3>
        </div>
      </div>
    </div> -->
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card text-white bg-secondary h-100 shadow-sm">
        <div class="card-body">
          <div class="card-title fs-5">Male Members</div>
          <h3>{{ \App\Models\Member::where('gender','Male')->count() }}</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card text-white bg-info h-100 shadow-sm">
        <div class="card-body">
          <div class="card-title fs-5">Female Members</div>
          <h3>{{ \App\Models\Member::where('gender','Female')->count() }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
