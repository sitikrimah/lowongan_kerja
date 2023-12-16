<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post - BKK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/posts/'.$post->image) }}" class="w-100 rounded">
                        <hr>
                        <h4>{{ $post->judul }}</h4>
                        <p class="tmt-3">
                            {!! $post->bidang_usaha !!}
                        </p>
                        <p class="tmt-3">
                            {!! $post->persyaratan !!}
                        </p>
                        <p class="tmt-3">
                          <td>{!! $post->lowongan_pekerjaan !!}</td>
                        </p>
                        <p class="tmt-3">
                            {!! $post->tanggal_posting !!}
                        </p>
                        <p class="tmt-3">
                            {!! $post->tanggal_deadline !!}
                        </p>
                        <p class="tmt-3">
                            {!! $post->deskripsi !!}
                        </p>
                        <p class="tmt-3">
                            {!! $post->lokasi !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


