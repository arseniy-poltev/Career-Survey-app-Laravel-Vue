<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Business Health Check</title>
    <link rel="stylesheet" href="{{ asset('/css/surveys/done.css') }}" type="text/css" media="all"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}"/>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo"></div>
    </div>
    <div id="main">
        @yield('content')
    </div>
    <div id="footer"></div>
</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<link type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/start/jquery-ui.css" rel="stylesheet" media="all"/>
</body>
</html>
