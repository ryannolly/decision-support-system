    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lihat Detail Siswa Terbaik</h1>
        </div>

        <?php
            echo $this->session->flashdata('message');
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Status Pengisian Nilai</h6>
                    </div>
                    <div class="card-body">
                        <?php if($is_bisa): ?>
                            <center><h1 class="text-success">Anda telah mengisi semua nilai dari siswa yang ada!</h1></center>
                        <?php else: ?>
                            <center><h1 class="text-danger">Anda belum mengisi semua nilai dari siswa yang ada!</h1></center>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if($is_bisa): ?>
            <!-- Bobot per kriteria -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kode dan Ketentuan Kriteria</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Kriteria</th>
                                        <th>Ketentuan Kriteria</th>
                                        <th>Nilai Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>C1</td>
                                        <td>Nilai Rata-Rata Non Keagamaan</td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>C2</td>
                                        <td>Absensi</td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>C3</td>
                                        <td>Perilaku</td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>C4</td>
                                        <td>Nilai Rata-Rata Keagamaan</td>
                                        <td>10%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bobot Yang Didapat tiap Siswa -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bobot yang didapat tiap siswa</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align:middle;"><center>Nama Siswa</center></th>
                                        <th colspan="4"><center>Kriteria</center></th>
                                    </tr>
                                    <tr>
                                        <th><center>C1</center></th>
                                        <th><center>C2</center></th>
                                        <th><center>C3</center></th>
                                        <th><center>C4</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data_siswa as $ds) : ?>
                                        <tr>
                                            <td><?php echo $ds->nama_siswa ?></td>
                                            <td><center><?php echo $ds->C1 ?></center></td>
                                            <td><center><?php echo $ds->C2 ?></center></td>
                                            <td><center><?php echo $ds->C3 ?></center></td>
                                            <td><center><?php echo $ds->C4 ?></center></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menentukan Nilai Vektor S -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menentukan Nilai Vektor S</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><center>Nama Siswa</center></th>
                                        <th><center>Vektor S</center></th>
                                        <th><center>Hasil</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($data_siswa as $ds) : ?>
                                        <tr>
                                            <td><?php echo $ds->nama_siswa ?></td>
                                            <td><center><?php echo "S".$no++; ?></center></td>
                                            <td><center><?php echo $ds->vektorS ?></center></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menentukan Nilai Vektor V -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menentukan Nilai Vektor S</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><center>Nama Siswa</center></th>
                                        <th><center>Vektor V</center></th>
                                        <th><center>Nilai Si</center></th>
                                        <th><center>Sigma Sn</center></th>
                                        <th><center>Hasil</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($data_siswa as $ds) : ?>
                                        <tr>
                                            <td><?php echo $ds->nama_siswa ?></td>
                                            <td><center><?php echo "V".$no++; ?></center></td>
                                            <td><center><?php echo $ds->vektorS ?></center></td>
                                            <td><center><?php echo $sigmasn ?></center></td>
                                            <td><center><?php echo $ds->vektorV ?></center></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menentukan Siapa Terbesar -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Vektor V Terbesar</h6>
                        </div>
                        <div class="card-body">
                            <p>Berdasarkan perhitungan diatas didapatlah hasil siswa terbaik yaitu : </p>
                            <h5><?php echo $nama_terbesar ?></h5>
                            <h6>dengan nilai = <?php echo $nilai_terbesar ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->