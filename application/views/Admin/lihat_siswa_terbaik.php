    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lihat Siswa Terbaik</h1>
        </div>

        <?php
            echo $this->session->flashdata('message');
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Siswa Terbaik</h6>
                    </div>
                    <div class="card-body">
                        <?php if($is_bisa): ?>
                            <p>Berdasarkan perhitungan Nilai, Absensi, dan perilaku didapatlah hasil siswa terbaik yaitu : </p>
                            <center><h3 class="text-success"><?php echo $nama_terbesar ?></h3></center>
                            <center><h6 class="text-success">dengan nilai = <?php echo $nilai_terbesar ?></h6></center>
                        <?php else: ?>
                            <center><h1 class="text-danger">Anda belum mengisi semua nilai dari siswa yang ada!</h1></center>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->