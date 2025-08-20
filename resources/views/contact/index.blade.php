@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="contact-section">
    <div class="contact-wrapper">
        <!-- Peta -->
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3640.4906005341363!2d110.4206692!3d-7.077405!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70893590f8415b%3A0xe576f55c68c1c5a0!2sSMK%20Negeri%2011%20Semarang!5e1!3m2!1sid!2sid!4v1755054832023!5m2!1sid!2sid"
                allowfullscreen loading="lazy"></iframe>
        </div>

        <!-- Form -->
        <div class="form-container">
            <h2>Get in Touch</h2>
            <p>Have questions or feedback? Fill out the form below.</p>

            <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                </div>

                <div class="input-group">
                    <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                </div>

                <div class="input-group">
                    <textarea name="message" placeholder="Your Message" rows="5" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn-send">Send Message</button>
            </form>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: "{{ session('success') }}",
        color: ' #fff',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#b2d134ff',
        background: '#1a1a1a',
    })
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        title: 'Validation Error',
        html: `
            <ul style="text-align:left;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
        icon: 'error',
        confirmButtonText: 'OK',
        confirmButtonColor: '#d33',
    })
</script>
@endif

@endsection
