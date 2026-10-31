<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 30px auto; padding: 0 15px; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; padding: 6px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 8px 16px; cursor: pointer; }
        .error { background: #f8d7da; padding: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" rows="3">{{ old('alamat', $mahasiswa->alamat) }}</textarea>

        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}">

        <button type="submit">Update</button>
        <a href="{{ route('mahasiswa.index') }}">Batal</a>
    </form>
</body>
</html>