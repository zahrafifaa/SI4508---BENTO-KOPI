<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Information</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .branch-box {
            width: 45%;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: 20px;
        }
        h2 {
            color: #007200;
            font-size: 20px;
            font-family: "Poppins";
            font-style: bold;

        }
        p {
            font-size: 16px;
            margin-bottom: 10px;
            font-family: "Poppins";
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .btn {
            padding: 5px 10px;
            font-size: 18px;
            text-decoration: none;
            color: #fff;
            background-color: #007200;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: "Poppins";
        }
        .btn:hover {
            background-color: #007200;
        }
        nav {
            background-color: white;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        nav a {
            font-weight: 700;
            font-family: "Poppins";
            color: #007200;
            text-decoration: none;
            font-size: 18px;
        }
        .profile {
            font-weight: normal;
            font-family: "Poppins";
            color: #007200;
            font-size: 14px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            text-decoration: underline; /* Add underline */
        }
        .profile img {
            width: 30px; /* Adjust size as needed */
            height: 30px; /* Adjust size as needed */
            border-radius: 50%;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<header>
        <nav class="navbar">
            <a class="">BentoKopi</a>
            <div>
                <a class="profile" href="#">
                    <img src="profile_image.jpg" alt="Profile Image">
                    Nicholas Saputra
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="branch-box">
            <h2>Bento Kopi Telkom Bandung</h2>
            <p>Jam Operasional: 9.00 am – 1.00 am</p>
            <img src="gambar_bento_kopi_telkom_bandung.jpg" alt="Bento Kopi Telkom Bandung">
            <br><br>
            <a href="halaman_cabang_telkom_bandung.html" class="btn">Explore More</a>
        </div>
        <div class="branch-box">
            <h2>Bento Kopi Jatinangor</h2>
            <p>Jam Operasional: 9.00 am – 2.30 am</p>
            <img src="gambar_bento_kopi_jatinangor.jpg" alt="Bento Kopi Jatinangor">
            <br><br>
            <a href="halaman_cabang_jatinangor.html" class="btn">Explore More</a>
        </div>
        <div class="branch-box">
            <h2>Bento Kopi Cibiru</h2>
            <p>Jam Operasional: 9.00 am – 12.30 am</p>
            <img src="gambar_bento_kopi_cibiru.jpg" alt="Bento Kopi Cibiru">
            <br><br>
            <a href="halaman_cabang_cibiru.html" class="btn">Explore More</a>
        </div>
        <div class="branch-box">
            <h2>Bento Kopi Cimahi</h2>
            <p>Jam Operasional: 9.00 am – 12.30 am</p>
            <img src="gambar_bento_kopi_cimahi.jpg" alt="Bento Kopi Cimahi">
            <br><br>
            <a href="halaman_cabang_cimahi.html" class="btn">Explore More</a>
        </div>
    </div>
</body>
</html>
