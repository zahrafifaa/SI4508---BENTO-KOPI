<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title }} | Kopi Bento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .ikon {
            color: #007200;
            margin-top: 0.1rem;
            font-family: "Poppins", sans-serif;
            font-size: 2rem;
            float: left;
        }

        .subIkon {
            color: #007200;
            font-family: "Poppins", sans-serif;
            font-size: 2rem;
            float: left;
        }


        li {
            float: left;
            list-style-type: none;
        }

        a {
            display: inline;
            text-align: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #007200;
            font-family: "Poppins", sans-serif;
            font-size: 16px;
            font-style: normal;
        }

        svg {
            margin-top: 7px;
            margin-left: 5%;
            width: 25px;
            height: 50px;

        }

        .line {
            float: right;
            margin-top: 5px;
            width: 100%;
            height: 0.1rem;
            background-color: #007200;
        }

        .user {
            padding: 20px 5px 20px 10px;
            color: #007200;
            font-family: "Poppins", sans-serif;
            font-size: 16px;
            font-style: normal;
        }


        .cart {
            padding: 0px 1rem 0px 3rem;
            margin-right: 1rem;
        }

        .hoverG>a:hover {
            background-color: #67BC67;
            color: white;
            border-radius: 10px;

        }

        .hoverU>a:hover {
            text-decoration: underline;

        }

        .active {
            background-color: #007200;
            color: white;
            border-radius: 10px;
        }


        .preAbout {
            display: grid;
            gap: 2rem;
            grid-template-columns: 1fr 1fr;
            color: black;
            margin-bottom: 5rem;
        }

        .preBook {
            display: grid;
            gap: 3rem;
            grid-template-columns: 1fr 2fr;
            margin-top: 5rem;
        }

        .descAbout {
            margin-top: 3rem;
        }

        .italic {
            font-family: "Lato", sans-serif;
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #456658;
        }

        .judul {
            font-family: "Poppins", sans-serif;
            font-size: 68px;
            line-height: 1.1;
        }

        .isi {
            margin-top: 2rem;
            font-family: "Poppins", sans-serif;
            font-style: normal;
            word-spacing: 5px;
        }

        .kotak {
            position: static;
            width: 25rem;
            height: 25rem;
            background-color: #007200;
            margin-top: 10rem;
        }

        .gambar1 {
            position: absolute;
            top: 0rem;
            left: 10rem;
        }

        .gambar2 {
            position: relative;
        }

        .rectangle {
            position: absolute;
            top: 22rem;
            left: 2rem;
        }

        .kotak1 {
            position: relative;
        }

        .btn {
            background-color: #007200;
            color: white;
        }

        .card1 {
            display: flex;
            padding: 2rem;
            gap: 10px;
            margin-top: 2rem;
            background-color: #3C5049;
            justify-content: center;
            align-content: center;
            border-radius: 10px;
        }

        .bold {
            font-weight: bold;
        }

        .harga {
            color: #6c757d;
        }

        footer {
            margin-top: 8rem;
            display: grid;
            grid-template-columns: 1.5fr 0.5fr 1fr 1fr;
            gap: 10px;
            background-color: #efefef;
        }

        .ml-15 {
            margin-left: 15px;
            font-family: "Poppins", sans-serif;
            font-style: normal;
            word-spacing: 5px;
            text-align: justify;
            line-height: 2.4;
        }

        .logo {
            padding: 0px;
            margin-right: 10px;
        }

        .hoverU {
            font-family: "Poppins", sans-serif;
        }
    </style>
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">

        @include('partials.navbar')

        <!--Isi Page-->
        <div>
            @yield('isiPage')
        </div>

        @include('partials.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @stack('scripts')
</body>

</html>
