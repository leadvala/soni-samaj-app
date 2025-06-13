@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
  .table-hover tbody tr:hover {
    background-color: #f1f5f9;
  }
  .member-card {
    margin-bottom: 1rem;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    padding: 1rem;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .member-card .row + .row {
    margin-top: .5rem;
  }
</style>

<div class="container-fluid px-4 py-3">
  <h3 class="mb-4">Members Dashboard</h3>

  <!-- Search & Add -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3 gap-2">
    <form method="GET" class="d-flex flex-grow-1 flex-md-auto">
      <input type="search" name="search" value="{{ $search }}"
             class="form-control me-sm-2 mb-2 mb-md-0"
             placeholder="Search by name, gotra, mobile">
      <button class="btn btn-secondary w-100 w-md-auto">Search</button>
    </form>
    <a href="{{ route('admin.members.create') }}" class="btn btn-lg btn-success shadow-sm">
      <i class="bi bi-person-plus-fill me-2"></i>Add Member
    </a>
  </div>

  {{-- Table view for md+ --}}
  <div class="card shadow-sm d-none d-md-block">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th><th>Self Gotra</th><th>Mother’s Gotra</th>
            <th>Nani’s Gotra</th><th>Dadi’s Gotra</th><th>Mobile</th>
            <th>Gender</th><th>Blood Group</th><th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td><strong>{{ $member->name }}</strong></td>
            <td>{{ $member->gotra_self }}</td>
            <td>{{ $member->gotra_mother }}</td>
            <td>{{ $member->gotra_nani }}</td>
            <td>{{ $member->gotra_dadi }}</td>
            <td>{{ $member->mobile }}</td>
            <td>{{ $member->gender }}</td>
            <td>{{ $member->blood_group }}</td>
            <td class="text-center">
              <a href="{{ route('admin.members.edit', $member) }}"
                 class="btn btn-sm btn-outline-warning me-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <form action="{{ route('admin.members.destroy', $member) }}"
                    method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Delete this member?')"
                        class="btn btn-sm btn-outline-danger">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer bg-white">{{ $members->links() }}</div>
  </div>

  {{-- Card view for mobile --}}
  <div class="d-block d-md-none">
    @foreach($members as $member)
    <div class="member-card">
      <div class="row">
        <div class="col-7"><strong>{{ $member->name }}</strong></div>
        <div class="col-5 text-end">
          <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-sm btn-outline-warning me-1">
            <i class="bi bi-pencil-square"></i>
          </a>
          <form action="{{ route('admin.members.destroy', $member) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete this member?')" class="btn btn-sm btn-outline-danger">
              <i class="bi bi-trash"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-12"><small><strong>Gotra (Self/M/M/N/D):</strong>
          {{ $member->gotra_self }} / {{ $member->gotra_mother }} /
          {{ $member->gotra_nani }} / {{ $member->gotra_dadi }}</small></div>
      </div>
      <div class="row"><div class="col-6"><small><strong>Mobile:</strong> {{ $member->mobile }}</small></div>
        <div class="col-6"><small><strong>WhatsApp:</strong> {{ $member->whatsapp }}</small></div>
      </div>
      <div class="row"><div class="col-6"><small><strong>Gender:</strong> {{ $member->gender }}</small></div>
        <div class="col-6"><small><strong>Blood:</strong> {{ $member->blood_group }}</small></div>
      </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">{{ $members->links() }}</div>
  </div>
</div>
@endsection
