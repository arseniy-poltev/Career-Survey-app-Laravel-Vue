<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Career Monitor Dashboard</title>

    <style>
        body {
            background-color: white;
            font-family: "Lucida Console", sans-serif;
            overflow: hidden;
        }

        h1 {
            color: rgb(0, 85, 165);
            font-weight: bold;
            font-size: 300%;
            word-spacing: .5rem;
        }

        h3 {
            color: rgb(0, 85, 165);
        }

        .orange {
            color: rgb(247, 143, 30);
        }
        .img-fluid {
            width: 15rem;
        }
        main {
            height: 75vh;
        }
        header {
            height: 15vh;
        }
        footer {
            height: 10vh;
        }
    </style>
</head>
<body>
<div class="container-fluid mx-0 px-0">
    <header class="row flex-row-reverse align-items-end justify-content-between">
        <div class="d-flex flex-column align-items-end justify-content-end mt-2 mr-3">
            <button class="btn btn-outline-primary btn-lg px-5" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                Log out
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
            <button class="btn btn-outline-primary btn-lg px-5 my-1" onclick="location.href = '{{ route('login') }}'">
                Profile
            </button>
        </div>
        <h1 class="mx-auto text-center">
            My <span class="orange">BUSINESS</span> Health Check
        </h1>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <h3>Welcome to the Coach Dashboard</h3>
                </div>

                <figure class="figure mx-auto pointer">
                    <a href="{{ route('order.create') }}">
                        <img src="/img/cart.png" alt="CART" class="figure-img img-fluid mx-auto">
                        <figcaption class="figure-caption text-center"><h2>Order My <br><span class="orange">Business</span> Health <br>Check</h2></figcaption>
                    </a>
                </figure>

                <figure class="figure mx-auto pointer">
                    <img src="/img/manage.png" alt="MANAGE" class="figure-img img-fluid mx-auto">
                    <figcaption class="figure-caption text-center"><h2>Manage Existing <br><span class="orange">Business</span> Health <br>Check</h2></figcaption>
                </figure>

            </div>
        </div>
    </main>
    <footer class="px-3 mt-4">
        © HR Coach Australasia 2018. This website and content is the intellectual property of HR Coach Australasia. Any
        disclosure, copying, display or misuse of this information is strictly prohibited without the written consent of
        HR Coach Australasia.
    </footer>
</div>
</body>
</html>