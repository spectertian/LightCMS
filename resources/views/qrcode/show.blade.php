<div>
    <h1>{{ $qrcode->title }}</h1>
    <img src="{{ route('web::qrcode.image', $qrcode->id) }}"
         alt="QR Code"
         loading="lazy">
</div>