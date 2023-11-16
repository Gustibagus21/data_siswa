<?php
    include 'koneksi.php';
?>

<script>
    window.print();
</script>
                     
                     <table border="1" width="100%" cellpading="5" cellspacing="0">
                                    <tr>
                                        <th colspan="9">Data Siswa</th>
                                    </tr>
											<tr>
												<th>Nomor</th>
												<th>NISN</th>
												<th>NIS</th>
												<th>Nama Siswa</th>
												<th>Kelas</th>
												<th>Jurusan</th>
												<th>Tgl Lahir</th>
												<th>Jenis Kelamin</th>
												<th>Alamat</th>
                                            </tr>
										<tbody>
										<?php 
                                            $no = 1;
											if (isset($_GET['kelas'])) {
												$kelas = $_GET['kelas'];
												$query = mysqli_query($koneksi, "SELECT*FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama_kelas='$kelas'");
											}else{
												$query = mysqli_query($koneksi, "SELECT*FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
											}

                                            while ($data = mysqli_fetch_array($query)) {
                                        ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $data['nisn']; ?></td>
												<td><?php echo $data['nis']; ?></td>
												<td><?php echo $data['nama_siswa']; ?></td>
												<td><?php echo $data['nama_kelas']; ?></td>
												<td><?php echo $data['nama_jurusan']; ?></td>
												<td><?php echo $data['tanggal_lahir']; ?></td>
												<td><?php echo $data['jenis_kelamin']; ?></td>
												<td><?php echo $data['alamat']; ?></td>
											</tr>
											<?php
                                            }
                                        ?>
										</tbody>
									</table>