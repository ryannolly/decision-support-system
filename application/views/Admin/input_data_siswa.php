    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Siswa Baru</h1>
        </div>
        <!-- Content Row -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Data Siswa Baru</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="<?php echo base_url('admin/input_data_siswa_aksi') ?>">
                            <div class="form-group">
                                <label>Nomor Induk</label>
                                <input type="text" class="form-control" name="nomor_induk" required>
                                <p class="help-block text-danger">Wajib Diisi!</p>
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" class="form-control" name="nisn" required>
                                <p class="help-block text-danger">Wajib Diisi!</p>
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" required>
                                <p class="help-block text-danger">Wajib Diisi!</p>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required>
                                <p class="help-block text-danger">Wajib Diisi!</p>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="radio">
                                    <div class="row">
                                    <div class="col-6">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki-laki" checked="">Laki-laki
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="Perempuan">Perempuan
                                        </label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                <p class="help-block text-danger">Wajib Diisi!</p>
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