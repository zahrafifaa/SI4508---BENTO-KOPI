@extends('layout/main')


@section('isiPage')

    <div class="preAbout mt-3">
        <div class="kotak1">
            <div class="kotak">
            </div>
            <img class="gambar1" src="images/gambar1.png" alt="makanan">
        </div>
        <div class="descAbout">
            <h4 class="italic">Modern Asian & Specialty Coffe.</h4>
            <div>
                <b class = "judul">Temukan Insiprasi Baru di Setiap Sudut Bento Kopi</b>
                <p class= "isi">Nikmati pengalaman unik kami dalam menyajikan kopi berkualitas dan hidangan lezat. Temukan berbagia menu istimewa dan nikmati suasana yang menyenangkan bersama kami. Terima kasih telah berkunjung</p>
                <a class="btn btn-success" href="about" role="button">Read More ></a>
            </div>
        </div>
    </div>

    <div>
        <b class="judul">Menu Fav Bento</b>
    </div>

    <div class="card1">
        <div class="card" style="width: 18rem;">
            <img src="images/RiceBowl.png" class="card-img-top" alt="Rice Bowl">
            <div class="card-body">
                <h5 class="card-title bold">Rice Bowl Teriyaki</h5>
                <p class="harga">Rp. 15.000</p>
                <p class="card-text">Menu nasi yang disajikan dengan topping teriyaki.  Teriyaki sendiri biasanya berupa daging ayam, sapi, atau salmon. </p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="images/AyamPenyet.png" class="card-img-top" alt="Ayam Penyet">
            <div class="card-body">
                <h5 class="card-title bold">Nasi Ayam Penyet </h5>
                <p class="harga">Rp. 22.000</p>
                <p class="card-text">Hidangan khas Indonesia yang terdiri dari nasi putih, ayam goreng yang dipenyet, sambal pedas, dan berbagai lauk pauk.</p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="images/AyamGeprek.png" class="card-img-top" alt="Ayam Geprek">
            <div class="card-body">
                <h5 class="card-title bold">Ayam Geprek Bento</h5>
                <p class="harga">Rp. 20.000</p>
                <p class="card-text">Menu yang berisi sepotong ayam goreng tepung yang dipenyet dengan ulekan atau cobek hingga pipih dan memiliki rasa yang pedas.</p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="images/SambalMatah.png" class="card-img-top" alt="Sambal Matah">
            <div class="card-body">
                <h5 class="card-title bold">Rice Bowl Sambal Matah</h5>
                <p class="harga">Rp. 15.000</p>
                <p class="card-text">hidangan nasi yang disajikan dalam mangkuk dengan topping ayam suwir, sambal matah, dan berbagai pelengkap.</p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
    </div>

    <div class="preBook">
        <div class="kotak1">
            <img class="gambar2" src="images/gambar2.png" alt="Booking">
            <img class="rectangle" src="images/Rectangle2.png" alt="Booking">
        </div>
        <div class="descAbout">
            <div class="tes">
                <b class = "judul">"Having an afternoon tea with best friend is all theraphy you need” - anonymous</b>
                <p class= "isi">Bayangkan memiliki waktu berkualitas dengan keluarga dan teman di tempat yang nyaman dan sepenuhnya estetis di mana Anda dapat menikmati berbagai makanan fusi Asia dan kopi biji pilihan terbaik.</p>
                <a class="btn btn-success" href="reservasi" role="button">Booking Now ></a>
            </div>
        </div>
    </div>

@endsection