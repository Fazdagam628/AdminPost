@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section id="contact" class="contact-section">
    <div class="contact-wrapper">

        <!-- Map -->
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2776.118907557827!2d110.42119262781603!3d-7.077834447960542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70893590f8415b%3A0xe576f55c68c1c5a0!2sSMK%20Negeri%2011%20Semarang!5e1!3m2!1sid!2sid!4v1755058877268!5m2!1sid!2sid"
                allowfullscreen loading="lazy">
            </iframe>
        </div>

        <!-- Form -->
        <div class="form-container">
            <h2>Hubungi Kami</h2>
            <p>Silakan isi form berikut untuk mengirim pesan kepada kami.</p>

            <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="input-group">
                    <input type="text" name="phone" placeholder="No HP" value="{{ old('phone') }}" required>
                </div>

                <div class="input-group">
                    <textarea name="message" placeholder="Pesan Anda" rows="5" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn-send">Kirim Pesan</button>
            </form>
        </div>

    </div>
</section>

@endsection