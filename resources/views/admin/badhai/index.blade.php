<!-- resources/views/admin/badhai/index.blade.php -->
@extends('admin.layout')
@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Badhai Entries</h4>
    <a href="{{ route('admin.badhai.create') }}" class="btn btn-success">+ Add New</a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
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
            @if($entry->photo_path)
              <img src="{{ asset('storage/' . $entry->photo_path) }}" width="60" class="img-thumbnail">
            @else
              <img src="{{ asset('images/placeholder.png') }}" width="60" class="img-thumbnail">
            @endif
          </td>
          <td>{{ $entry->name }}</td>
          <td>{{ $entry->reason }}</td>
          <td>{{ \Carbon\Carbon::parse($entry->date)->format('d M Y') }}</td>
          <td>{{ $entry->city }}</td>
          <td>
            <a href="{{ route('admin.badhai.edit', $entry) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('admin.badhai.destroy', $entry) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Delete this entry?')" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3">{{ $entries->links() }}</div>
</div>
@endsection
