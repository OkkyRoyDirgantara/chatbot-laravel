<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mitigasi Banjir | @yield('title')</title>

    <meta name="description" content="Pembuatan Chatbot untuk Mitigasi dan Evakuasi Banjir di Lamongan">
    <meta name="author" content="Okky Roy Dirgantara">
    <meta name="keywords" content="chatbot, telegram, mitigasi, evakuasi, banjir, lamongan">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <style>
        .container {
            margin-bottom: 100px;
        }
        .navbar-nav .nav-item .nav-link:hover {
            background-color: #eee;
            color: #333;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 70px;
        }
        @media (max-width: 576px) {
            main {
                margin-bottom: 150px;
            }
        }
        @media (max-width: 576px) {
            footer {
                width: 100%;
                height: 130px;
            }
        }
    </style>
</head>
<body>
    @include('admin.layout.navbar')
<main>
    @yield('content')
</main>
    <footer class="bg-light py-3 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-muted">&copy; {{ date('Y') }} Mitigasi Banjir Lamongan. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-md-end">
                        <li class="list-inline-item"><a href="https://t.me/banjir_lamongan_bot" target="_blank">Bot Banjir</a></li>
                        @guest
                            <li class="list-inline-item"><a href="mailto:okkyroydirgantara@gmail.com">Contact Us</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</body>
</html>
