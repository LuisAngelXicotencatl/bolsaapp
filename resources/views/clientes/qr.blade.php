@extends('layouts.cliente')
@section('title', 'Cursos')
@section("content")
<body>
    <main>
        <h1>Viajes</h1>
    <div id="qrcode"></div>

    <script>
        /*var urlDinamica = "https://aftermatch.website/";*/
        var urlDinamica = "https://open.spotify.com/intl-es/album/3MKvhQoFSrR2PrxXXBHe9B";
        
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: urlDinamica,
            width: 128,
            height: 128
        });
    </script>
    </main>
</body>
@endsection