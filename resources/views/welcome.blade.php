<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Snazzy URL shortening | lech.ing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Lech" />
    <link rel="manifest" href="/site.webmanifest" />

    <meta property="og:title" content="Snazzy URL shortening | lech.ing">
    <meta property="og:site_name" content="lech.ing">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:description" content="The best URL shortening service in the world. Go from short to long as quick as
        a flash">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content="https://lech.fancyog.com/og.jpg?title=Fancy+URL+Shortening&subtitle=Oh%20the%20places%20you%20will%20go%F0%9F%94%A5">
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    Howdy, welcome to lech.ing.
</body>

</html>
