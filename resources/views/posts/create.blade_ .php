<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - BKK   </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA PERUSAAAN</label>
                                <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" name="nama_perusahaan" value="{{ old('judul') }}" placeholder="Masukkan nama perusahaan Post">
                            
                                <!-- error message untuk judul -->
                                @error('nama_perusahaan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">BIDANG USAHA</label>
                                <textarea class="form-control @error('bidang_usaha') is-invalid @enderror" name="bidang_usaha" rows="5" placeholder="Masukkan bidang usaha Post">{{ old('bidang_usaha') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('bidang_usaha')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">PERSYARATAN</label>
                                <textarea class="form-control @error('persyaratan') is-invalid @enderror" name="persyaratan" rows="5" placeholder="Masukkan persyaratan Post">{{ old('persyaratan') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('persyaratan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">LOWONGAN PEKERJAAN</label>
                                <textarea class="form-control @error('lowongan_pekerjaan') is-invalid @enderror" name="lowongan_pekerjaan" rows="5" placeholder="Masukkan lowongan Pekerjaan Post">{{ old('lowongan_pekerjaan') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('lowongan_pekerjaan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal posting</label>
                                <input type="date" class="form-control @error('tanggal_posting') is-invalid @enderror" name="tanggal_posting" rows="5" placeholder="Masukkan TANGGAL POSTING Post">{{ old('tanggal_posting') }} >
                                <!-- <textarea class="form-control @error('bidang_usaha') is-invalid @enderror" name="bidang_usaha" rows="5" placeholder="Masukkan bidang usaha Post">{{ old('bidang_usaha') }}</textarea> -->
                            
                                <!-- error message untuk deskripsi -->
                                @error('tanggal_posting')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL DEADLINE</label>
                                <input type="date" class="form-control @error('tanggal_deadline') is-invalid @enderror" name="tanggal_deadline" rows="5" placeholder="Masukkan tanggal deadline Post">{{ old('tanggal_deadline') }}>
                            
                                <!-- error message untuk deskripsi -->
                                @error('tanggal_deadline')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold"> DESKRIPSI</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan deskripsi Post">{{ old('deskripsi') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">LOKASI</label>
                                <textarea class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" rows="5" placeholder="Masukkan lokasi Post">{{ old('lokasi') }}</textarea>
                            
                                <!-- error message untuk deskripsi -->
                                @error('lokasi')
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