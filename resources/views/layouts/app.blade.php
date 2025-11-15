<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? 'Encontre as melhores vagas de emprego. Cadastre seu currículo e encontre oportunidades.' }}">
    <meta name="keywords" content="{{ $keywords ?? 'vagas, emprego, currículo, oportunidades' }}">
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $title ?? 'Oferta CE - Vagas de Emprego' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Encontre as melhores vagas de emprego' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <title>@yield('title', 'Oferta CE - Vagas Freelancer')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="canonical" href="{{ url()->current() }}">
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('partials.header')
    <main>
        @yield('content')
    </main>

    @php
        $footer_categories = App\Models\Category::active()->orderBy('name')->take(6)->get();
    @endphp
    
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js'])

</body>
</html>