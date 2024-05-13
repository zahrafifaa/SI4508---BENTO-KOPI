<!-- resources/views/articles/create.blade.php -->

<h1>Tambah Artikel</h1>

<form method="POST" action="/articles">
    @csrf
    <input type="text" name="title" placeholder="Judul Artikel">
    <textarea name="content" placeholder="Konten Artikel"></textarea>
    <button type="submit">Simpan</button>
</form>
