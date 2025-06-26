<!-- resources/views/front/badhai/index.blade.php -->
@extends('front.layouts.master')
@section('content')

<style>
  .badhai-heading {
    font-size: 2.2rem;
    font-weight: bold;
    color: #C06C00;
    background: linear-gradient(to right, #FFE49C, #FFF5D0);
    padding: 1rem;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    margin-bottom: 2rem;
  }

  .badhai-card {
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07);
    display: flex;
    flex-direction: column;
    background-color: #fff;
    transition: all 0.3s ease;
  }

  .badhai-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }

  .badhai-card-img-container {
    width: 100%;
    height: 250px;
    background-color: #f9f1dd;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    
  }

  /* .badhai-card-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-bottom: 4px solid #FFD700;
  } */
.badhai-card-img-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top center; /* 👈 This focuses on the top (face area) */
  border-bottom: 4px solid #FFD700;
}

  .badhai-card-body {
    flex: 1;
    background: #fffdf4;
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .badhai-card-title {
    font-size: 1.25rem;
    color: #333;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .badhai-meta {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.5;
  }

  .badhai-meta strong {
    color: #c96f00;
  }

  .badhai-description {
    font-size: 0.9rem;
    margin-top: 0.5rem;
    color: #333;
  }

  .badhai-city {
    font-size: 0.85rem;
    color: #777;
    margin-top: 0.25rem;
  }
</style>

<div class="container py-5">
  <div class="text-center badhai-heading">
    🎉 बधाई (Congratulations) 🎊
  </div>

  @if ($badhaiEntries->isEmpty())
    <p class="text-center">No entries available yet.</p>
  @else
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($badhaiEntries as $entry)
      <div class="col">
        <div class="badhai-card">
          <div class="badhai-card-img-container">
            <img src="{{ $entry->photo_path ? asset('storage/' . $entry->photo_path) : asset('assets/default-placeholder.jpg') }}"
                 alt="Badhai Photo">
          </div>

          <div class="badhai-card-body">
            <div>
              <div class="badhai-card-title">{{ $entry->name }}</div>
              <div class="badhai-meta">
                🪔 Occasion: <strong>{{ $entry->reason }}</strong><br>
                📅 {{ \Carbon\Carbon::parse($entry->date)->format('d M Y') }}
              </div>
              @if($entry->description)
                <div class="badhai-description">{{ $entry->description }}</div>
              @endif
              @if($entry->city)
                <div class="badhai-city">🏙️ {{ $entry->city }}</div>
              @endif
            </div>
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
