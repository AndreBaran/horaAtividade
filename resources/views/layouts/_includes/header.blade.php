<!DOCTYPE html>
<html>

<head>
  <title>@yield('site_title')</title>
  <!--Import Google Icon Font-->
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="/css/app.css">


  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
@include('layouts._includes.navbar')
</body>
