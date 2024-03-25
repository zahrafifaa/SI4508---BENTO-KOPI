<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Beranda | Kopi Bento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
    .ikon{
        margin-left: 45px ;

    }

    #Logo {
        color: #007200;
        font-family: "Poppins", sans-serif;
        font-weight: 100px;
        font-style: bold;
        float: left;
    }
    
    .navbar{
        margin-left:250px;
        float: left;
    }
    
    li {
        float: left;
        list-style-type: none;
    }
    
    a {
        display: block;
        text-align: center;
        padding: 20px 25px;
        text-decoration: none;
        color: #007200;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-style: normal;
    }
    
    svg{
        margin-top:7px;
        margin-left: 50px;
        width: 25px;
        height: 50px;
        
    }
    .line{
        float:right;
        margin-top:5px;
        width: 100%;
        height: 1px;
        background-color: #007200;
    }

    .user{
        text-align: center;
        padding: 20px 5px 20px 15px;
        color: #007200;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-style: normal; 
    }

    .profile{
        float:right;
        margin-right: 45px;
        font-size: 16px;
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


    </style>
</head>
<body>
    <div class="ikon">
        <h1 id="Logo">BentoKopi</h1>
        <ul class="navbar">
            <li> <a href="http://127.0.0.1:8000/">Beranda</a></li>
            <li> <a href="menu.blade.php">Menu</a></li>
            <li> <a href="reservasi.blade.php">Reservasi</a></li>
            <li> <a href="kolaborasi.blade.php">Kolaborasi</a></li>
            <li> <a href="artikel.blade.php">Artikel</a></li>
            <li> <a href="location.blade.php">Location</a></li>
            <li> <a href="apply.blade.php">Apply</a></li>
            <li> <a class="active" href="http://127.0.0.1:8000/about">About us</a></li>
        </ul>
        <ul class="profile">
            <li> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </li>
            <li class="user"> Reyhan Faqih Ashuri</li>
        </ul>
    </div>

    <div class="line">
    </div>
</body>
</html>