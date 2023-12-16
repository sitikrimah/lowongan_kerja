<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data testimoni - BKK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data testimoni </h3>       
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('testimoni.create') }}" class="btn btn-md btn-success mb-3">TAMBAH testimoni</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">NAMA PERUSAHAAN</th>
                                <th scope="col">TENTANG PERUSAHAAN</th>
                                <th scope="col" style="text-align: center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($testimoni as $testimoni)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>

                                    <td class="text-center">
                                        <img src="/storage/{{$testimoni->image}}" width="150" >  {{-- <img src="{{ asset('/storage/perusahaans/'.$perusahaan->image) }}" class="rounded" style="width: 150px"> --}}
                                        {{-- <img src="{{ asset('/storage/) }}" class="rounded" style="width: 150px"> --}}
                                    </td>
                                    <td>{{ $testimoni->nama }}</td>
                                    <td>{!! $testimoni->deskripsi !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('testimoni.destroy', $testimoni->id) }}" method="POST">
                                            <a href="{{ route('testimoni.show', $testimoni->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('testimoni.edit', $testimoni->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data testimoni belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{-- {{ $perusahaan->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>                                     