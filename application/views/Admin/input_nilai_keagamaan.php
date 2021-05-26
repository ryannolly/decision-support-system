    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Nilai (Keagamaan)</h1>
        </div>

        <?php
            echo $this->session->flashdata('message');
        ?>
        <!-- Content Row -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Induk</th>
                                            <th>Nama Siswa</th>
                                            <th>Status Pengisian Nilai</th>
                                            <th>Rata-Rata Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor Induk</th>
                                            <th>Nama Siswa</th>
                                            <th>Status Pengisian Nilai</th>
                                            <th>Rata-Rata Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach($data_siswa as $ds) : ?>
                                        <tr> 
                                            <td><?php echo $ds->induk ?></td>
                                            <td><?php echo $ds->nama_siswa ?></td>
                                            <td>
                                                <?php if($ds->is_terisi == 0){ ?>
                                                    <a href="#" class="btn btn-warning btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="text">Nilai Belum Diisi</span>
                                                    </a>
                                                <?php }else{ ?>
                                                    <a href="#" class="btn btn-success btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Nilai Sudah Diisi</span>
                                                    </a>
                                                <?php }; ?>
                                            </td>
                                            <td><?php echo $ds->rerata ?></td>
                                            <td>
                                                <?php if($ds->is_terisi == 0){ ?>
                                                    <a href="<?php echo base_url('admin/input_nilai_keagamaan_isi/').$ds->nisn ?>"><button class="btn btn-default bg-gradient-success text-gray-100">Isi Nilai</button></a>
                                                <?php }else{ ?>
                                                    <button class="btn btn-default bg-gradient-info text-gray-100" data-toggle="modal" data-target="#exampleModalLong<?php echo $ds->nisn ?>">Lihat Nilai</button>
                                                    <a onclick="javascript: return confirm('Anda yakin ingin menghapus ini?')" href="<?php echo base_url('admin/hapus_nilai_keagamaan/').$ds->nisn ?>" ><button class="btn btn-default bg-gradient-warning text-gray-100">Reset Nilai</button></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<?php foreach($data_siswa as $ds) : ?>
    <div class="modal fade" id="exampleModalLong<?php echo $ds->nisn ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Nilai Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <?php
                    $no = 0;
                    foreach($ds->mapel as $mapel){
                        echo "<tr>";
                        echo "<th>".$mapel."</th>";
                        echo "<td>".$ds->nilai[$no++]."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>