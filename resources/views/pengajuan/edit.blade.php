<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data pengajuann - BKK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label class="font-weight-bold">nama lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', $pengajuan->nama_lengkap) }}" placeholder="Masukkan nama_lengkap pengaju">
                                
                                <!-- error message untuk title -->
                                @error('nama_lengkap')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal lahir</label>
                                <textarea class="form-control @error('TTL') is-invalid @enderror" name="TTL" rows="5" placeholder="Masukkan tanggal lahir pengaju">{{ old('TTL', $pengajuan->TTL) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('TTL')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tempat lahir</label>
                                <textarea class="form-control @error('tempat') is-invalid @enderror" name="tempat" rows="5" placeholder="Masukkan tempat lahir pengaju">{{ old('tempat', $pengajuan->tempat) }}</textarea>
                                
                                <!-- error message untuk content -->
                                @error('tempat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan alamat">{{ old('alamat', $pengajuan->alamat) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">no_telp</label>
                                <textarea class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" rows="5" placeholder="Masukkan no_telp">{{ old('no_telp', $pengajuan->no_telp) }}</textarea>
                                
                                <!-- error message untuk content -->
                                @error('no_telp')
                                <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">email</label>
                                <textarea class="form-control @error('email') is-invalid @enderror" name="email" rows="5" placeholder="Masukkan email Post">{{ old('email', $pengajuan->email) }}</textarea>
                                
                                <!-- error message untuk content -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                           <div class="form-group">
                              <label class="font-weight-bold">image</label>
                              @if (file_exists("storage/pengajuans/".$pengajuan->images))
                              <img src="/storage/pengajuans/{{ $pengajuan->images }}" alt="" style="width: 50%; margin-top:2%">                                    
                              @endif
                                <input type="file" class="form-control" name="image">
                           </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">dokumen</label>
                                <textarea class="form-control @error('dokumen') is-invalid @enderror" name="dokumen" rows="5" placeholder="Masukkan dokumen">{{ old('dokumen', $pengajuan->dokumen ) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('dokumen')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">tanggal_posting</label>
                                <textarea class="form-control @error('tanggal_posting') is-invalid @enderror" name="tanggal_posting" rows="5" placeholder="Masukkan tanggal_posting">{{ old('tanggal_posting', $pengajuan->tanggal_posting) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('tanggal_posting')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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