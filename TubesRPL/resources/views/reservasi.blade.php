<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservasi | Bento Kopi</title>
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
    <h1>Reservasi</h1>
        <label for="nama">Nama : </label><br>
        <input type="text" id="nama" name="nama" value=""><br>
        <label for="no_telp">Nomor Telepon : </label><br>
        <input type="text" id="no_telp" name="no_telp" value=""><br>
        <label for="tgl_reservasi">Tanggal Reservasi : </label><br>
        <input type="date" id="tgl_reservasi" name="tgl_reservasi" value=""><br>
        <label for="wkt_reservasi">Waktu Reservasi</label><br>
        <input type="time" id="wkt_reservasi" name="wkt_reservasi" value=""><br>
        <label for="jml_pengunjung">Jumlah Pengunjung : </label><br>
        <input type="integer" id="jml_pengunjung" name="jml_pengunjung" value=""><br>
        <button type="submit">Reservasi Sekarang</button>
</body>
</html>
