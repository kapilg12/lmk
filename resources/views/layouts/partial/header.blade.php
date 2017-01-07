<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to Bhujalsanrakshan</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
    <link href="{!! asset('bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{!! asset('plugins/datatables/dataTables.bootstrap.css') !!}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{!! asset('dist/css/AdminLTE.min.css') !!}" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{!! asset('dist/css/skins/_all-skins.min.css') !!}" rel="stylesheet" type="text/css" />

    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{!! asset('plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script type="text/javascript" src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        label{text-transform:capitalize;}
        .numberCircle {
            border-radius: 50%;
            behavior: url(PIE.htc); /* remove if you don't care about IE8 */

            width: 36px;
            height: 36px;
            padding: 8px;

            background: #fff;
            border: 2px solid #666;
            color: #666;
            text-align: center;

            font: 32px Arial, sans-serif;
        }
        .top-buffer { margin-top:20px; }
    </style>

</head>
<body id="app-layout" class="hold-transition skin-blue layout-top-nav">
