@extends('front.layouts.master') {{-- Adjust if using a different layout --}}

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center flex-column text-center">
    <div class="mb-4">
        <h1 class="fw-bold text-success display-5">Thank You for Registering!</h1>
        <p class="lead text-muted">We've received your submission. Our team will reach out shortly if needed.</p>
    </div>

    {{-- Card Section --}}
    <div class="card p-4 shadow-lg rounded-4 w-100" style="max-width: 420px;">
        <h5 class="fw-semibold mb-3">📱 Join Our WhatsApp Community</h5>

        {{-- QR Code --}}
        <img src="{{ asset('/whatsapp_qr_code.jpg') }}" alt="WhatsApp QR Code" class="img-fluid mx-auto d-block mb-3" style="max-height: 200px;">

        {{-- Join Button --}}
        <a href="https://chat.whatsapp.com/LCpInQ2ql7217Hu5B5cZF3" target="_blank" class="btn btn-success btn-lg w-100" style="border-radius: 50px;">
            ✅ Join WhatsApp Group
        </a>

        {{-- Note --}}
        <p class="text-muted mt-3 small">Scan the QR code above to join directly from your mobile device.</p>
    </div>

    {{-- Back to Home --}}
    <a href="{{ url('/') }}" class="btn btn-outline-danger mt-4 px-4 py-2" style="border-radius: 30px;">
        ← Back to Home
    </a>
</div>
@endsection
