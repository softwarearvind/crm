<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{
            overflow-x:hidden;
            background:#f5f6fa;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#212529;
            color:white;
        }

        .sidebar a{
            color:#c2c7d0;
            padding:12px 20px;
            display:block;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#343a40;
            color:white;
        }

        .content{
            margin-left:250px;
            padding:20px;
        }

        .topbar{
            background:white;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        }

    </style>
</head>

<body>

    @include('layouts.sidebar')

    <div class="content">

        @include('layouts.navbar')

        @yield('content')

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>