<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Cute Helper')</title>
    <!-- makes the layout responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Crafty+Girls' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container">
<header class="row">
	<h1>Cute Helper</h1>
</header>
@yield('content')
</div>
</body>
</html>