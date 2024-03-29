<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title }} | Kopi Bento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

    .ikon {
        color: #007200;
        margin-top: 0.1rem;
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
    
    svg{
        margin-top:7px;
        margin-left: 5%;
        width: 25px;
        height: 50px;
        
    }
    .line{
        float:right;
        margin-top:5px;
        width: 100%;
        height: 0.1rem;
        background-color: #007200;
    }

    .user{
        padding: 20px 5px 20px 10px;
        color: #007200;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-style: normal; 
    }


    .cart{
        padding: 0px 1rem 0px 3rem;
        margin-right: 1rem;
    }

    li a:hover{
        background-color: #67BC67;
        color: white;
        border-radius: 10px;

    }
    .active{
        background-color: #007200;
        color: white;
        border-radius: 10px;
    }

    
    .preAbout{
        display: grid;
        gap: 2rem;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        color: black ;
    }
    
    .descAbout{
        margin-top: 3rem;
    }
    
    .italic{
        font-style: italic;
        margin-bottom: 2rem;
    }

    .judul{
        font-family: "Poppins", sans-serif;
        font-size: 68px;
        line-height: 1.1;
    }

    .isi{
        margin-top: 2rem;
    }




    </style>
</head>
<body>
    <div class="container">
        
        @include('partials.navbar')

        <!--Isi Page-->
        <div>
            @yield('isiPage')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>