@extends('front.layouts.master') {{-- Adjust if using a different layout --}}

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="mb-3 text-success">Thank You for Registering!</h1>
    <p class="mb-4">We’ve received your submission successfully. Our team will contact you shortly if needed.</p>

    <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
        <h5 class="mb-3">Join Our WhatsApp Community</h5>

        {{-- WhatsApp Join Button --}}
        <a href="https://chat.whatsapp.com/LCpInQ2ql7217Hu5B5cZF3" target="_blank" class="btn btn-success w-100 mb-3">
            Join WhatsApp Group
        </a>

        {{-- QR Code --}}
        <img src="{{ asset('images/whatsapp_qr.png') }}" alt="WhatsApp Group QR" class="img-fluid" style="max-height: 200px; margin: 0 auto;">

        <p class="mt-3 text-muted" style="font-size: 0.9rem;">Scan the QR code above to join directly from your mobile device.</p>
    </div>

    {{-- Back to Home --}}
    <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-4">← Back to Home</a>
</div>
@endsection
