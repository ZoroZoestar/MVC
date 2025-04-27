<?php
class MahasiswaView {

    public function tampilkanMahasiswa($mahasiswaList) {
        echo "<h2>Data Mahasiswa</h2>";
        echo "<a href='?action=tambah'>Tambah Mahasiswa</a><br><br>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>NIM</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr>";

        foreach ($mahasiswaList as $m) {
            echo "<tr>";
            echo "<td>{$m->nim}</td>";
            echo "<td>{$m->nama}</td>";
            echo "<td>{$m->jurusan}</td>";
            echo "<td>
                    <a href='?action=edit&id={$m->id}'>Edit</a> |
                    <a href='?action=hapus&id={$m->id}'>Hapus</a>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    public function formMahasiswa($action, $mahasiswa = null) {
        $nim = $mahasiswa ? $mahasiswa->nim : '';
        $nama = $mahasiswa ? $mahasiswa->nama : '';
        $jurusan = $mahasiswa ? $mahasiswa->jurusan : '';
        $id = $mahasiswa ? $mahasiswa->id : '';

        echo "<h2>" . ($mahasiswa ? "Edit" : "Tambah") . " Mahasiswa</h2>";
        echo "<form method='post' action='?action={$action}" . ($id ? "&id={$id}" : "") . "'>";
        echo "NIM: <input type='text' name='nim' value='{$nim}' required><br><br>";
        echo "Nama: <input type='text' name='nama' value='{$nama}' required><br><br>";
        echo "Jurusan: <input type='text' name='jurusan' value='{$jurusan}' required><br><br>";
        echo "<input type='submit' value='Simpan'>";
        echo "</form>";
    }
}
?>
