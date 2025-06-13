@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
  /* Highlight table rows on hover */
  .table-hover tbody tr:hover {
    background-color: #f1f5f9;
  }

  /* Collapse less-critical columns on small screens */
  @media (max-width: 768px) {
    .table td:nth-child(4), /* Gender */
    .table td:nth-child(5), /* Blood */
    .table td:nth-child(6), /* Job / Business */
    .table td:nth-child(7)  /* Work City */
    { display: none; }

    .table th:nth-child(4),
    .table th:nth-child(5),
    .table th:nth-child(6),
    .table th:nth-child(7)
    { display: none; }
  }
</style>

<div class="container-fluid px-4 py-3">
  <h3 class="mb-4">Members Dashboard</h3>

  <!-- Responsive Search & Add -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3 gap-2">
    <form method="GET" class="d-flex flex-grow-1 flex-md-auto">
      <input type="search" name="search" value="{{ $search }}"
        class="form-control me-sm-2 mb-2 mb-md-0" placeholder="Search by name, gotra, mobile">
      <button class="btn btn-secondary w-100 w-md-auto">Search</button>
    </form>
    <a href="{{ route('admin.members.create') }}" class="btn btn-lg btn-success shadow-sm">
      <i class="bi bi-person-plus-fill me-2"></i>Add Member
    </a>
  </div>

  <!-- Data Table Card -->
  <div class="card shadow-sm">
  
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Gotra</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Blood</th>
            <th>Job / Business</th>
            <th>Work City</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td><strong>{{ $member->name }}</strong></td>
            <td>{{ $member->gotra }}</td>
            <td>{{ $member->mobile }}</td>
            <td>{{ $member->gender }}</td>
            <td>{{ $member->blood_group }}</td>
            <td>{{ $member->job_or_business }}</td>
            <td>{{ $member->work_city }}</td>
            <td class="text-center">
              <a href="{{ route('admin.members.edit', $member) }}"
                class="btn btn-sm btn-outline-warning me-1" title="Edit">
                <i class="bi bi-pencil-square"></i>
              </a>
              <form action="{{ route('admin.members.destroy', $member) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Delete this member?')"
                  class="btn btn-sm btn-outline-danger" title="Delete">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer bg-white">
      {{ $members->links() }}
    </div>
  </div>
</div>
@endsection
