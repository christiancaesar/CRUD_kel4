<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap.css') }}">
    <title>Edit Mahasiswa</title>
</head>
<body>

<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6">
            <h1>Edit Mahasiswa</h1>
            <hr>

            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror"
                           id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
                    @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                           id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Jenis Kelamin</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                               id="laki-laki" value="L" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                               id="perempuan" value="P" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    @error('jenis_kelamin') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan">
                        @foreach (['Teknik Informatika', 'Sistem Informasi', 'Ilmu Komputer', 'Teknik Komputer', 'Teknik Telekomunikasi'] as $j)
                            <option value="{{ $j }}" {{ old('jurusan', $mahasiswa->jurusan) == $j ? 'selected' : '' }}>{{ $j }}</option>
                        @endforeach
                    </select>
                    @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                              id="alamat" rows="3" name="alamat">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>