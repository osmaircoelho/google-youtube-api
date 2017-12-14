<!doctype html>
<html>
<head>
    <title>Aphix Software</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    @yield("assets_header")

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">

    </div>
</nav>

    @yield("content")
    @yield('post-script')
    @yield("assets_footer")
</body>
</html>