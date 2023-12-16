<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data pengajuan - BKK   </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA lengkappenngaju</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama nama_lengkap">
                            
                                <!-- error message untuk judul -->
                                @error('nama_lengkap')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">tangggal halir</label>
                                <input type="date" class="form-control @error('TTL') is-invalid @enderror" name="TTL" value="{{ old('TTL') }}" placeholder="Masukkan tanggallahir">

                                {{-- <textarea class="form-control @error('bidang_usaha') is-invalid @enderror" name="bidang_usaha" rows="5" placeholder="Masukkan bidang usaha Post">{{ old('bidang_usaha') }}</textarea> --}}
                            
                                <!-- error message untuk deskripsi -->
                                @error('TTL')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">tempatlahir</label>
                                <textarea class="form-control @error('tempat') is-invalid @enderror" name="tempat" rows="5" placeholder="Masukkan tempat">{{ old('tempat') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('tempat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">no_telp</label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" rows="5" placeholder="Masukkan " {{ old('no_telp') }} >

                                
                                <!-- error message untuk deskripsi -->
                                @error('no_telp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" rows="5" placeholder="Masukkan email" {{ old('email') }}>
                                
                                <!-- error message untuk deskripsi -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                           <div class="form-group">
                                <label class="font-weight-bold">image</label>
                                @if (file_exists("storage/".$pengajuan->image))
                                <img src="/storage/{{ $pengajuan->image }}" alt="" style="width: 50%; margin-top:2%">                                    
                                @endif
                               <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                            
                              <!-- error message untuk title -->
                                     @error('image')
                                      <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                       </div>
                                     @enderror
                           </div>
                                
                            <div class="form-group">
                                <label class="font-weight-bold"> dokumen</label>
                                <textarea class="form-control @error('dokumen') is-invalid @enderror" name="dokumen" rows="5" placeholder="Masukkan dokumen ">{{ old('dokumen') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('dokumen')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">tanggal posting</label>
                                <input type="date" class="form-control @error('tanggal_posting') is-invalid @enderror" name="tanggal_posting" value="{{ old('tanggal_posting') }}" placeholder="Masukkan tanggal_posting">
                               
                                {{-- <textarea class="form-control @error('tanggal_posting') is-invalid @enderror" name="tanggal_posting" rows="5" placeholder="Masukkan tanggal posting">{{ old('tanggal_posting') }}</textarea> --}}
                            
                                <!-- error message untuk deskripsi -->
                                @error('tanggal_posting')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>