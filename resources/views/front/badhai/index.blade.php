<!-- resources/views/front/badhai/index.blade.php -->
@extends('front.layouts.master')
@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4">बधाई (Congratulations)</h2>

  @if ($badhaiEntries->isEmpty())
    <p class="text-center">No entries available yet.</p>
  @else
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($badhaiEntries as $entry)
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="{{ $entry->photo_path ? asset('storage/' . $entry->photo_path) : asset('assets/default-placeholder.jpg') }}" class="card-img-top" style="min-height: 250px; object-fit: contain;width:100%;" alt="Badhai Photo">
          <div class="card-body">
            <h5 class="card-title"> {{ $entry->name }}</h5>
            <p class="mb-1">🪔 On the occasion of: <strong>{{ $entry->reason }}</strong></p>
            <p class="text-muted mb-1">📅 {{ \Carbon\Carbon::parse($entry->date)->format('d M Y') }}</p>
            @if($entry->description)
            <p class="card-text">{{ $entry->description }}</p>
            @endif
            @if($entry->city)
            <p class="text-muted small">🏙️ {{ $entry->city }}</p>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $badhaiEntries->links() }}
    </div>
  @endif
</div>
@endsection
