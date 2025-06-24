<!-- resources/views/admin/badhai/index.blade.php -->
@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
  .badhai-table th, .badhai-table td {
    vertical-align: middle !important;
    text-align: center;
  }

  .badhai-table tbody tr:hover {
    background-color: #fffdf3;
    transition: background-color 0.3s ease;
  }

  .img-thumb {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #ffc107;
    box-shadow: 0 0 4px rgba(0,0,0,0.1);
  }

  .table-wrapper {
    background-color: #fffef8;
    border-radius: 10px;
    padding: 1rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    overflow-x: auto;
  }

  .action-btns .btn {
    margin: 0 2px;
  }

  .heading-bar {
    background: linear-gradient(to right, #ffe082, #ffcc80);
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  }

  .heading-bar h4 {
    margin: 0;
    font-weight: bold;
    color: #8a5800;
  }

  @media (max-width: 768px) {
    .table-responsive {
      overflow-x: auto;
    }

    .badhai-table th,
    .badhai-table td {
      font-size: 14px;
      padding: 0.5rem;
      white-space: nowrap;
    }

    .action-btns {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .action-btns .btn {
      width: 100%;
    }
  }
</style>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center heading-bar">
    <h4>Badhai Entries 🎉</h4>
    <a href="{{ route('admin.badhai.create') }}" class="btn btn-success shadow-sm">
      <i class="bi bi-plus-circle me-1"></i> Add New
    </a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="table-responsive table-wrapper">
    <table class="table table-bordered badhai-table w-100">
      <thead class="table-warning">
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Occasion</th>
          <th>Date</th>
          <th>City</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($entries as $entry)
        <tr>
          <td>
            <img src="{{ $entry->photo_path ? asset('storage/' . $entry->photo_path) : asset('images/placeholder.png') }}"
                 alt="Photo" class="img-thumb">
          </td>
          <td>{{ $entry->name }}</td>
          <td><span class="badge bg-info text-dark">{{ $entry->reason }}</span></td>
          <td>{{ \Carbon\Carbon::parse($entry->date)->format('d M Y') }}</td>
          <td>{{ $entry->city }}</td>
          <td class="action-btns">
            <a href="{{ route('admin.badhai.edit', $entry) }}" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('admin.badhai.destroy', $entry) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Delete this entry?')" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 d-flex justify-content-center">
    {{ $entries->links() }}
  </div>
</div>
@endsection
