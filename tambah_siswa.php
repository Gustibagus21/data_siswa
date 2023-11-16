<?php
if (isset($_POST['nisn'])) {
	$nisn = $_POST['nisn'];
	$nis = $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$id_kelas = $_POST['id_kelas'];


	$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
	$cek1 = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
	$cek2 = mysqli_num_rows($cek);
	$cek3 = mysqli_num_rows($cek1);

	if ($cek2 == 0 && $cek3 == 0) {
		$query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama_siswa,id_kelas,jenis_kelamin,tanggal_lahir,alamat) VALUES ('$nisn','$nis','$nama_siswa','$id_kelas','$jenis_kelamin','$tanggal_lahir','$alamat')");
		if ($query) {
			echo '<script>alert("Tambah Data Berhasil");location.href="?page=siswa";</script>';
		}
	} else {
		echo '<script>alert("NISN Atau NIS Sudah Digunakan");</script>';
	}
}
?>

<h1 class="h3 mb-3" align="center"><strong> Tambah siswa </strong></h1>

<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="POST">
					<div class="mb-3">
						<label class="form-label">NISN</label>
						<input type="text" name="nisn" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">NIS</label>
						<input type="text" name="nis" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">NAMA SISWA</label>
						<input type="text" name="nama_siswa" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">TANGGAL LAHIR</label>
						<input type="date" name="tanggal_lahir" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">JENIS KELAMIN</label>
						<select name="jenis_kelamin" class="form-select">
							<option value="L">L</option>
							<option value="P">P</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">KELAS&JURUSAN</label>
						<select name="id_kelas" class="form-select">
							<?php
							$query = mysqli_query($koneksi, "SELECT * FROM kelas  INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
							while ($data = mysqli_fetch_array($query)) {
							?>
								<option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['nama_kelas'] ?> - <?php echo $data['nama_jurusan']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="mb-3" style="float: right;">
						<button tipe="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>