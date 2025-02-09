<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{\Illuminate\Support\Facades\Storage::disk('public')->exists('favicon.ico') ? \Illuminate\Support\Facades\Storage::disk('public')->url('favicon.ico') : asset('favicon.ico')}}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="preload" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"></noscript>
    {!! htmlScriptTagJsApi() !!}
</head>
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.all.min.js"></script>
<script>
    @if(Session::has('error'))
    Swal.fire({
        icon: 'error',
        title: "{{ __('Oops...') }}",
        html: '{{Session::get('error')}}',
    })
    @endif

    @if(Session::has('success'))
    Swal.fire({
        icon: 'success',
        title: '{{Session::get('success')}}',
        position: 'top-end',
        showConfirmButton: false,
        background : '#343a40',
        toast: true,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @endif
</script>
</html>
