<?php
$id = $_GET['id'];
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];

    $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama_siswa='$nama',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',id_kelas='$id_kelas' WHERE nisn='$id'");

    if ($query) {
        echo '<script>alert("Data berhasil di Update");location.href="?page=siswa";</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$id'");
$data = mysqli_fetch_array($query);

?>


<h1 class="h3 mb-3">Tambah Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="<?php echo $data['nisn'] ?>">
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" name="nis" class="form-control" required value="<?php echo $data['nis'] ?>">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" required value="<?php echo $data['nama_siswa'] ?>">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required value="<?php echo $data['tanggal_lahir'] ?>">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="Laki-Laki" <?php if ($data['jenis_kelamin'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                </select>
                                <div class="mb-3">
                                    <label class="form-label">Kelas dan Jurusan</label>
                                    <select name="id_kelas" class="form-select">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.Id_jurusan=jurusan.Id_jurusan");
                                        while ($kelas = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $kelas['id_kelas'] ?>" <?php if ($data['id_kelas'] == $kelas['id_kelas']) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $kelas['nama_kelas'] ?> - <?php echo $kelas['nama_jurusan'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3" style="float: right" ;>
                                <button class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="?page=siswa" class="btn btn-warning">kembali</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>