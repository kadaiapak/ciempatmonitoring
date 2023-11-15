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
                                        <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">Progress</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="#skripsi" role="tab" aria-controls="skripsi" aria-selected="false">Data Skripsi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Seminar Proposal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ujian Skripsi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Finalisasi</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                            synth. Cosby sweater eu banh mi, qui irure terr.
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk aliquip
                                    </div>
                                    <div class="tab-pane fade" id="skripsi" role="tabpanel" aria-labelledby="skripsi-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <a href="<?= base_url('skripsi/tambah_skripsi'); ?>" class="btn btn-success">Ajukan judul <i class="fa fa-plus" style="font-size: 13px;margin-left: 2px;"></i></a>
                                                        <!-- <h2>Default Example <small>Users</small></h2> -->
                                                        <ul class="nav navbar-right panel_toolbox">
                                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box table-responsive">
                                                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Judul Skripsi</th>
                                                                                <th>Dosen Pembimbing</th>
                                                                                <th>Dosen PA</th>
                                                                                <th>Catatan</th>
                                                                                <th>Status</th>
                                                                                <th>Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($semua_skripsi as $ss): ?>
                                                                            <tr>
                                                                                <td><?= $ss['created_at']; ?></td>
                                                                                <td><?= $ss['judul_skripsi'] ?></td>
                                                                                <td><?= $ss['d_pembimbing_peg_gel_dep']; ?> <?= $ss['d_pembimbing_peg_nama']; ?> <?= $ss['d_pembimbing_peg_gel_bel']; ?></td>
                                                                                <td><?= $ss['d_pa_peg_gel_dep']; ?> <?= $ss['d_pa_peg_nama']; ?> <?= $ss['d_pa_peg_gel_bel']; ?></td>
                                                                                <td>Ini catatan dibuat sendiri</td>
                                                                                <td><?= ($ss['status_pengajuan_skripsi'] == 1 ? "<span class='badge badge-warning'>Menunggu diproses</span>" : ($ss['status_pengajuan_skripsi'] == 2 ? "<span class='badge badge-danger'>Judul ditolak</span>" : ($ss['status_pengajuan_skripsi'] == 3 ? "<span class='badge badge-success'>Judul diterima</span>" : null))); ?></td>
                                                                                <td>
                                                                                    <!-- <form action="< ?= base_url('skripsi/delete_skripsi/'.$ss['skripsi_id']); ?>"></form> -->
                                                                                    <!-- <button type="button" class="btn btn-success">Proses</button> -->
                                                                                    <a href="<?= base_url('skripsi/edit_skripsi/'.$ss['skripsi_id']); ?>" class="btn btn-warning">Edit</a>
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
                                            </div>
                                        </div>
                                        <?php if($cekSkripsiDiterima > 0) { ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <a href="<?= base_url('skripsi/upload-skripsi'); ?>" class="btn btn-success">Upload Skripsi <i class="fa fa-plus" style="font-size: 13px;margin-left: 2px;"></i></a>
                                                        <!-- <h2>Default Example <small>Users</small></h2> -->
                                                        <ul class="nav navbar-right panel_toolbox">
                                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box table-responsive">
                                                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Judul Skripsi</th>
                                                                                <th>Dosen Pembimbing</th>
                                                                                <th>Dosen PA</th>
                                                                                <th>Catatan</th>
                                                                                <th>Status</th>
                                                                                <th>Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($semua_skripsi as $ss): ?>
                                                                            <tr>
                                                                                <td><?= $ss['created_at']; ?></td>
                                                                                <td><?= $ss['judul_skripsi'] ?></td>
                                                                                <td><?= $ss['d_pembimbing_peg_gel_dep']; ?> <?= $ss['d_pembimbing_peg_nama']; ?> <?= $ss['d_pembimbing_peg_gel_bel']; ?></td>
                                                                                <td><?= $ss['d_pa_peg_gel_dep']; ?> <?= $ss['d_pa_peg_nama']; ?> <?= $ss['d_pa_peg_gel_bel']; ?></td>
                                                                                <td>Ini catatan dibuat sendiri</td>
                                                                                <td><?= ($ss['status_pengajuan_skripsi'] == 1 ? "<span class='badge badge-warning'>Menunggu diproses</span>" : ($ss['status_pengajuan_skripsi'] == 2 ? "<span class='badge badge-danger'>Judul ditolak</span>" : ($ss['status_pengajuan_skripsi'] == 3 ? "<span class='badge badge-success'>Judul diterima</span>" : null))); ?></td>
                                                                                <td>
                                                                                    <!-- <form action="< ?= base_url('skripsi/delete_skripsi/'.$ss['skripsi_id']); ?>"></form> -->
                                                                                    <!-- <button type="button" class="btn btn-success">Proses</button> -->
                                                                                    <a href="<?= base_url('skripsi/edit_skripsi/'.$ss['skripsi_id']); ?>" class="btn btn-warning">Edit</a>
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