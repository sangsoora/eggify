<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Eggify</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Avenir.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/assets/css/Section.css">
    <link rel="stylesheet" href="/assets/css/styles.compiled.css">
    <link rel="stylesheet" href="/assets/css/jquery.fancybox.min.css" />
    @stack('plugin-styles')
    @stack('style')
</head>

<body class="{{ $provider_not_visible ? sprintf('footer-message %s', $bodyClass) : $bodyClass }}">
@yield('content')
@include('web.layout.footer')

<div id="overlay"></div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/custom.js"></script>
<script src="/assets/js/events.js"></script>
<script src="/assets/js/functions.js"></script>
<script src="/assets/js/side.js"></script>
<script src="/assets/js/jquery.fancybox.min.js"></script>
@stack('plugin-scripts')
@stack('custom-scripts')
</body>
</html>
