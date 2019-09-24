<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,800,900|Material+Icons' rel="stylesheet">

    <style> /*Loader styles*/
        #preloader{
            font-family: Roboto, sans-serif;
            background-color: white;
            z-index: 999999;
            transition: all 0.5s ease;
            opacity: 1;
            visibility: visible;
        }

        #preloader.hidden{
            opacity: 0;
        }

        #preloader.none{
            visibility: hidden;
        }

        .material-loader{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            min-height: 200px;
        }

        .spinner {
            -webkit-animation: rotation 1.35s linear infinite;
            animation: rotation 1.35s linear infinite;
            stroke: #1565c0;
        }

        .circle {
            stroke-dasharray: 180;
            stroke-dashoffset: 0;
            -webkit-transform-origin: center;
            -ms-transform-origin: center;
            transform-origin: center;
            -webkit-animation: turn 1.35s ease-in-out infinite;
            animation: turn 1.35s ease-in-out infinite;
        }

        p{
            margin-top: 20px;
            font-weight: bold;
        }

        @keyframes rotation {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(270deg);
                transform: rotate(270deg);
            }
        }

        @keyframes turn
        {
            0% {
                stroke-dashoffset: 180;
            }

            50% {
                stroke-dashoffset: 45;
                -webkit-transform: rotate(135deg);
                transform: rotate(135deg);
            }

            100% {
                stroke-dashoffset: 180;
                -webkit-transform: rotate(450deg);
                transform: rotate(450deg);
            }
        }

        .fab-container {
            position: fixed;
            bottom: 0;
            right: 0;
        }
    </style>

</head>
<body>
{{--Under Maintenance--}}

<script>
    var Localize = {
        isAdmin: {{$user->isAdmin() ? 'true' : 'false'}},
        user: {!! json_encode($user) !!},
        orderPrice: {!! $user->getPrice() !!},
        stripePublicKey: "{{ $stripePublicKey }}",
        greeting: "@php echo preg_replace('/"/', '\"', $greeting->content) @endphp",
        hidePreloader: function(){
            var preloader = document.getElementById('preloader');
            preloader.classList.add('hidden');
            setTimeout(function(){
                preloader.classList.add('none');
            }, 600);
        }
    };
</script>

<div id="preloader" class="material-loader">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="circle" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
    <p>Page is loading, please wait...</p>
</div>

<div id="app"></div>

{{-- TODO Uncomment --}}
<script src="https://js.stripe.com/v3/"></script>

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="{{ mix('/js/dashboard/dashboard.js') }}"></script>
</body>
</html>