<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-gray-100">
    <div class="p-0 bg-white max-w-md mx-auto">
        <div id="header-homepage" data-locationCustomer="Bandung, Indah permai"></div>
        <div id="carousel"></div>
        <div id="card-information"></div>
        <div class="p-4">
            <p class="text-2xl">Product Tersedia</p>
            <div id="packet-list"></div>
        </div>
        <div id="footer-homepage" class="sticky left-0 bottom-0"></div>
    </div>
</body>
<script src='/js/app.js'></script>

</html>