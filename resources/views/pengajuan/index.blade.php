<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data PENGAJUAN - BKK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pengajuan lowongan kerja</h3>       
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pengajuan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DAAAATA</a>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">nama_lengkap</th>
                                <th scope="col">TTL</th>
                                <th scope="col">tempat</th>
                                <th scope="col">alamat</th>
                                <th scope="col">no_telp</th>
                                <th scope="col">email</th>
                                <th scope="col">image</th>
                                <th scope="col">dokkumen</th>
                                <th scope="col">tanggal_posting</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($pengajuan as $pengajuan)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/pengajuans/'.$pengajuan->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $pengajuan->nama_lengkap }}</td>
                                    <td>{!! $pengajuan->TTL !!}</td>
                                    <td>{!! $pengajuan->tempat !!}</td>
                                    <td>{!! $pengajuan->alamat !!}</td>
                                    <td>{!! $pengajuan->no_telp !!}</td>
                                    <td>{!! $pengajuan->email !!}</td>
                                    <td>{!! $pengajuan->image !!}</td>
                                    <td>{!! $pengajuan->dokumen !!}</td>
                                    <td>{!! $pengajuan->tanggal_posting !!}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST">
                                            <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data pengajuan belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{-- {{ $posts->links() }} --}}
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