<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 15px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; padding: 6px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 8px 16px; cursor: pointer; }
        .sukses { background: #d4edda; padding: 10px; margin-bottom: 15px; }
        .error { background: #f8d7da; padding: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    @if (session('success'))
        <div class="sukses">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->jenis_kelamin }}</td>
                    <td>{{ $m->alamat }}</td>
                    <td>{{ $m->no_hp }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $m->id) }}">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Tambah Mahasiswa</h2>
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}">

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" rows="3">{{ old('alamat') }}</textarea>

        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp') }}">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>