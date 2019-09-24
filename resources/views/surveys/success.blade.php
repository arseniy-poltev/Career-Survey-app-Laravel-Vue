<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>HR COACH</title>

    <style>
        body {
            padding-top: 3.75em;
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
        .orange,
        .orange:hover,
        .orange:focus,
        .orange:active
        {
            color: rgb(247, 143, 30);
        }
        .when {
            background-color: rgb(0, 85, 165);
            color: white;
            font-size: 24px;
        }
        footer {
            text-align: center;
            position: absolute;
            bottom: 0;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container-fluid mx-0 px-0">
    <main>
        <h1 class="text-center">
            My <span class="orange">BUSINESS</span> Health Check
        </h1>
        <div class="row when">
            <div class="col-9 px-5 pt-5">
                <p>
                    Thank you for completing the My Business Health Check for your business.
                </p>
                <p>
                    A summarised copy of your report will be sent to your email address.
                    A member of the HR Coach Network will contact you shortly to organise for you to receive a full copy of your report.
                </p>
                <p>
                    In the meantime, if you they survey has raised any questions, please visit
                    <a href="http://hrcoach.com.au" class="orange">www.hrcoach.com.au</a> or call <span class="orange">1300 550 674</span>
                </p>
            </div>
            <div class="col-3">
                <img src="/img/note.jpg" alt="NOTE" class="img-fluid float-left">
            </div>
        </div>


    </main>
    <footer class="px-3 mt-4">
        © HR Coach Australasia 2018. This website and content is the intellectual property of HR Coach Australasia. Licensed to authorised members of the HR Coach Australasia Network. Any disclosure, copying, display, distribution or misuse of this information is prohibited without the written consent of HR Coach Australasia.
    </footer>
</div>
</body>
</html>