<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Career Monitor</title>

    <style>
        body {
            background-color: white;
            font-family: "Lucida Console", sans-serif;
            /*overflow: hidden;*/
        }
        h1 {
            color: rgb(0, 85, 165);
            font-weight: bold;
            font-size: 300%;
            word-spacing: .5rem;
        }
        .blue {
            color: rgb(0, 85, 164);
        }
        .green {
            color: rgb(0, 176, 80);
        }
        .orange {
            color: rgb(247, 143, 30);
        }
        .orange-bc {
            background-color: rgb(247, 143, 30);
        }
        .when {
            background-color: rgb(0, 85, 165);
            color: white;
            font-size: 24px;
        }
        .contact {
            color: white;
            font-size: 24px;
        }
        #map {
            height: 300px;
            width: 100%;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid mx-0 px-0">
    <header class="row mx-0 align-items-center justify-content-end px-4 py-1">
        <button class="btn btn-outline-primary btn-lg px-5" onclick="location.href = '{{ route('login') }}'">Login</button>
    </header>
    <main>
        <h1 class="text-center">
            <span class="blue">Online</span> <span class="green">CAREER</span> <span class="orange">MONITOR</span>
        </h1>
        <div class="row mx-0 when">
            <div class="col-9 px-4">
                <p>
                    &nbsp;
                </p>
                <p>
                    We always do job interviews before hiring someone.
                </p>
                <p>
                    Sometimes we conduct exit interviews when an employee decides to leave.
                </p>
                <p>
                    But rarely do we interview employees when they stay.
                </p>
                <p>
                    The Online Career Monitor takes the time to ask your employees “Why do you stay” – before it’s too late!
                </p>
                <p>
                    &nbsp;
                </p>
            </div>
            <div class="col-3">
                <img src="/img/note.jpg" alt="NOTE" class="img-fluid float-left">
            </div>
        </div>

        <h1 class="text-center mt-5">
            Contact <span class="orange">US</span>
        </h1>
        <div class="row mx-0 orange-bc contact">
            <div class="col-12 px-4">
                <p>
                    &nbsp;
                </p>
                <p>
                    The Online Career Monitor is a proprietary diagnostic tool of HR Coach Australasia and is licenced to some members of the HR Coach Australasia Network.
                </p>
                <p>
                    To get in touch with your local HR Coach or to find out about becoming a HR Coach, please use the details below:
                </p>
            </div>
            <div class="col-6 col-lg-4 px-4">
                <a href="http://hrcoach.com.au" target="_blank">www.hrcoach.com.au</a><br>
                <a href="mailto:business@hrcoach.com.au">business@hrcoach.com.au</a>
                <br>
                1300 550 674
                <br>
                <br/>
                4/236 Arthur Street<br>
                Newstead<br>
                QLD, Australia 4350
            </div>
            <div class="col-6 col-lg-8 px-4 pb-4">
                <div id="map"></div>
            </div>
        </div>

    </main>
    <footer class="px-3 mt-4 text-center">
        © HR Coach Australasia 2019. This website and content is the intellectual property of HR Coach Australasia. Licensed to authorised members of the HR Coach Australasia Network. Any disclosure, copying, display, distribution or misuse of this information is prohibited without the written consent of HR Coach Australasia.
    </footer>
    <script>
        function initMap() {
            var hr = {lat: -27.454394, lng: 153.043739};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: hr});
            var marker = new google.maps.Marker({position: hr, map: map});
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOkPnovT873WftKFkcbZgwjc-HQlgzTEY&callback=initMap">
    </script>
</div>
</body>
</html>