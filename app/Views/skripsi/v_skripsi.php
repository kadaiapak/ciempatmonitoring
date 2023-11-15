<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
 <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
        </div>
        <div class="clearfix"></div>
        <?php if(session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Sukses!</strong> <?= session()->getFlashdata('sukses'); ?>.
            </div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Gagal!</strong> <?= session()->getFlashdata('gagal'); ?>.
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Deni Suardi</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    <!-- Smart Wizard -->
                    <!-- <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p> -->
                        <div id="wizard" class="form_wizard wizard_horizontal">   
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">Step 1<br /><small>Judul Skripsi</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">Step 2<br /><small>Bimbingan Skripsi</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">Step 3<br /><small>Seminar Proposal</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">Step 4<br /><small>Ujian Skripsi</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-5">
                                        <span class="step_no">5</span>
                                        <span class="step_descr">Step 5<br /><small>Finish</small></span>
                                    </a>
                                </li>
                            </ul>
                            <!-- <div id="step-1">
                                
                            </div> -->
                        </div>
                    <!-- End SmartWizard Content -->
                        <div class="x_panel">
                            <div class="x_content">
                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">Pengajuan Judul</a>
                                    </li>
                                    <?php if($cekBisaBimbingan > 0  ) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bimbingan Skripsi</a>
                                    </li>   
                                    <?php } ?>
                                    <?php if($cekBisaTambahSkripsi == 0  ) { ?>

                                    <li class="nav-item">
                                        <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="#skripsi" role="tab" aria-controls="skripsi" aria-selected="false">Seminar Proposal</a>
                                    </li>
                                    <?php } ?>
                                    <?php if($cekBisaTambahSkripsi == 0  ) { ?>

                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ujian Skripsi</a>
                                    </li>
                                    <?php } ?>
                                    <?php if($cekBisaTambahSkripsi == 0  ) { ?>

                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Finalisasi</a>
                                    </li>
                                    <?php } ?>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <?php if($cekBisaTambahSkripsi == 0) { ?>
                                                            <a href="<?= base_url('skripsi/ajukan-judul'); ?>" class="btn btn-success">Ajukan judul <i class="fa fa-plus" style="font-size: 13px;margin-left: 2px;"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box table-responsive">
                                                                    <table class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Judul Skripsi</th>
                                                                                <th>Dosen Pembimbing</th>
                                                                                <th>Dosen PA</th>
                                                                                <th>Catatan</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($semua_skripsi as $ss): ?>
                                                                            <tr>
                                                                                <td><?= date('d-m-Y', strtotime($ss['created_at'])) ; ?></td>
                                                                                <td><?= $ss['judul_skripsi'] ?></td>
                                                                                <td><?= $ss['d_pembimbing_peg_gel_dep']; ?> <?= $ss['d_pembimbing_peg_nama']; ?> <?= $ss['d_pembimbing_peg_gel_bel']; ?></td>
                                                                                <td><?= $ss['d_pa_peg_gel_dep']; ?> <?= $ss['d_pa_peg_nama']; ?> <?= $ss['d_pa_peg_gel_bel']; ?></td>
                                                                                <td>Ini catatan dibuat sendiri</td>
                                                                                <td><?= ($ss['status_pengajuan_skripsi'] == 1 ? "<span class='badge badge-warning'>Menunggu diproses</span>" : ($ss['status_pengajuan_skripsi'] == 2 ? "<span class='badge badge-danger'>Judul ditolak</span>" : ($ss['status_pengajuan_skripsi'] == 3 ? "<span class='badge badge-success'>Judul diterima</span>" : null))); ?></td>
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
                                    <!-- tab untuk tambah bimbingan -->
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                    <?php if($cekBisaBimbingan > 0  ) { ?>
                                                        <a href="<?= base_url("skripsi/".$idBimbingan."/tambah-bimbingan"); ?>" class="btn btn-success">Bimbingan <i class="fa fa-plus" style="font-size: 13px;margin-left: 2px;"></i></a>
                                                    <?php } ?>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box table-responsive">
                                                                    <table class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Subjek</th>
                                                                                <th>Isi</th>
                                                                                <th>Data Dukung</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($semua_bimbingan as $sb): ?>
                                                                            <tr>
                                                                                <td><?= date('d-m-Y', strtotime($sb['created_at'])) ; ?></td>
                                                                                <td><?= $sb['bb_subjek'] ?></td>
                                                                                <td><?= $sb['bb_isi']; ?></td>
                                                                                <td><?= $sb['data_dukung']; ?></td>
                                                                                <td><?= ($sb['is_verifikasi'] == 1 ? "<span class='badge badge-warning'>Sudah diverifikasi</span>" : ($ss['status_pengajuan_skripsi'] == 0 ? "<span class='badge badge-danger'>Belum diverifikasi</span>" : null)); ?></td>
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
                                    <!-- akhir dari tab untuk tambah bimbingan -->
                                    <div class="tab-pane fade" id="skripsi" role="tabpanel" aria-labelledby="skripsi-tab">
                                        
                                        <?php if($cekBisaTambahSkripsi == 0) { ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <a href="<?= base_url('skripsi/upload-skripsi'); ?>" class="btn btn-success">Upload Skripsi <i class="fa fa-plus" style="font-size: 13px;margin-left: 2px;"></i></a>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box table-responsive">
                                                                    <table class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Judul Skripsi</th>
                                                                                <th>Dosen Pembimbing</th>
                                                                                <th>Dosen PA</th>
                                                                                <th>Catatan</th>
                                                                                <th>Status</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($judul_diterima as $jd): ?>
                                                                            <tr>
                                                                                <td><?= date('d-m-Y', strtotime($jd['created_at'])) ; ?></td>
                                                                                <td><?= $jd['judul_skripsi'] ?></td>
                                                                                <td><?= $jd['d_pembimbing_peg_gel_dep']; ?> <?= $jd['d_pembimbing_peg_nama']; ?> <?= $jd['d_pembimbing_peg_gel_bel']; ?></td>
                                                                                <td><?= $jd['d_pa_peg_gel_dep']; ?> <?= $jd['d_pa_peg_nama']; ?> <?= $jd['d_pa_peg_gel_bel']; ?></td>
                                                                                <td>Ini catatan dibuat sendiri</td>
                                                                                <td><?= ($jd['status_pengajuan_skripsi'] == 1 ? "<span class='badge badge-warning'>Menunggu diproses</span>" : ($jd['status_pengajuan_skripsi'] == 2 ? "<span class='badge badge-danger'>Judul ditolak</span>" : ($jd['status_pengajuan_skripsi'] == 3 ? "<span class='badge badge-success'>Judul diterima</span>" : null))); ?></td>
                                                                               
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
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Tabs -->
                    <!-- End SmartWizard Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /page content -->
<?= $this->endSection(); ?>