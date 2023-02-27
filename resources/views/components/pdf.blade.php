<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <div class="kop-surat">
        <img class="pemkab" src="{{ public_path('img/pemkab.png') }}" style="width: 10em; height: 10em">
        <div>
            <h3>PEMERINTAH KABUPATEN CIREBON</h3>
            <h3>DINAS KESEHATAN KABUPATEN CIREBON</h3>
            <h1>UPTD PUSKESMAS PANGURAGAN</h1>
            <p>Jln. Nyimas Gandasari No 85 Panguragan Kulon</p>
            <p>Kec. Panguragan Kab. Cirebon Telp. (0231) 88350109 Email : pkm.panguragancirebonkab.go.id 45163</p>
        </div>
        <img class="puskesmas" src="{{ public_path('img/puskesmas.png') }}" style="width: 10em; height: 10em">
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    @yield('body')

</body>

</html>
