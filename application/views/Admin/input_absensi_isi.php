    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mengisi Nilai Absensi Siswa</h1>
        </div>
        <!-- Content Row -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Nilai Siswa</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="<?php echo base_url('admin/input_absensi_isi_aksi') ?>">
                            <div class="form-group">
                                <label" class="help-block text-success">Data Siswa</label>
                            </div>
                            <input type="hidden" name="nisn" value="<?php echo $nisn ?>">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" class="form-control" value="<?php echo $nisn ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" value="<?php echo $nama->nama_siswa ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label" class="help-block text-success">Nilai Absensi Siswa</label>
                            </div>
                            <div class="form-group">
                                <label>Nilai Absensi</label>
                                <input type="number" class="form-control" name="nilai_absensi" required>
                                <p class="help-block text-danger">Masukkan nilai dari rentang 1 - 5!</p>
                            </div>
                            <button type="submit" class="btn btn-default bg-gradient-success text-gray-100">Submit</button>
                            <button type="reset" class="btn btn-default bg-gradient-warning text-gray-100">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->