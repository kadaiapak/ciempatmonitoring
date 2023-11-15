<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Default Example <small>Users</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengusul</th>
                                                <th>NIM</th>
                                                <th>Judul Skripsi</th>
                                                <th>Nama Pembimbing</th>
                                                <th>Nama PA</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1 ?>
                                        <?php foreach($semua_skripsi as $ss): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $ss['nama_mahasiswa'] ?></td>
                                                <td><?= $ss['nim_mahasiswa'] ?></td>
                                                <td><?= $ss['judul_skripsi']; ?></td>
                                                <td><?= $ss['d_pembimbing_peg_gel_dep']; ?> <?= $ss['d_pembimbing_peg_nama']; ?> <?= $ss['d_pembimbing_peg_gel_bel']; ?></td>
                                                <td><?= $ss['d_pa_peg_gel_dep']; ?> <?= $ss['d_pa_peg_nama']; ?> <?= $ss['d_pa_peg_gel_bel']; ?></td>
                                                <td><?= ($ss['status_pengajuan_skripsi'] == 1 ? "<span class='badge badge-primary'>Menunggu diproses</span>" : ($ss['status_pengajuan_skripsi'] == 2 ? "<span class='badge badge-danger'>Judul ditolak</span>" : ($ss['status_pengajuan_skripsi'] == 3 ? "<span class='badge badge-success'>Judul diterima</span>" : null))); ?></td>
                                                <td>
                                                    <a href="<?= base_url('skripsi/'.$ss['skripsi_id'].'/detail'); ?>" class="btn btn-primary">Detail</a>
                                                </td>
                                            <?php $no++ ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>



        


        </div>
    </div>
</div>
        <!-- /page content -->


<?= $this->endSection(); ?>
