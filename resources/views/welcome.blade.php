@extends('layout/main')

@section('isiPage')

    <div class="preAbout mt-3">
        <div class="kotak1">
            <div class="kotak">
            </div>
            <img class="gambar1" src="images/gambar1.png" alt="makanan">
        </div>
        <div class="descAbout">
            <h4 class="italic">Modern Asian & Specialty Coffe</h4>
            <div class="tes">
                <b class = "judul">Temukan Insiprasi Baru di Setiap Sudut Bento Kopi</b>
                <p class= "isi">Nikmati pengalaman unik kami dalam menyajikan kopi berkualitas dan hidangan lezat. Temukan berbagai menu istimewa dan nikmati suasana yang menyenangkan bersama kami. Terima kasih telah berkunjung</p>
                <a class="btn btn-success" href="about" role="button">Read More ></a>
            </div>
        </div>
    </div>

    <div>
        <b class="judul">Menu Fav Bento</b>
    </div>

    <div class="card1">
        <!-- Card details here -->
    </div>

    <div class="preBook">
        <div class="kotak1">
            <img class="gambar2" src="images/gambar2.png" alt="Booking">
            <img class="rectangle" src="images/Rectangle2.png" alt="Booking">
        </div>
        <div class="descAbout">
            <div class="tes">
                <b class = "judul">"Having an afternoon tea with best friend is all therapy you need” - anonymous</b>
                <p class= "isi">Bayangkan memiliki waktu berkualitas dengan keluarga dan teman di tempat yang nyaman dan sepenuhnya estetis di mana Anda dapat menikmati berbagai makanan fusi Asia dan kopi biji pilihan terbaik.</p>
                <a class="btn btn-success" href="reservasi" role="button">Booking Now ></a>
            </div>
        </div>
    </div>

@endsection

@php
    // Define the title variable here
    $title = "Your Page Title";
@endphp
