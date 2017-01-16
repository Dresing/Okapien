<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="okapien-theme sidebar-mini">
<div id="app" class="wrapper">

@include('layouts.partials.navbar-top')


<!-- Content Wrapper. Contains page content. Remove margin if student is viewing. -->
    <div class="content-wrapper" style="padding-bottom: 50px; margin-left: 0;">

    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    @include('layouts.partials.navbar-bottom')

</div><!-- ./wrapper -->


<!-- Scripts -->
<script src="/js/teacher.js"></script>

</body>
</html>
