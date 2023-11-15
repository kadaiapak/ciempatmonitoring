<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Proses Judul Skripsi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('skripsi/'.$single_skripsi['skripsi_id'].'/proses'); ?>">
                        <?= csrf_field(); ?>
                            <input type="hidden" value="<?= $single_skripsi['skripsi_id']; ?>"> 
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nim_mahasiswa">NIM</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" readonly name="nim_mahasiswa" class="form-control" id="nim_mahasiswa" placeholder="Tuliskan NIM" value="<?= $single_skripsi['nim_mahasiswa']; ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_mahasiswa">Nama Mahasiswa</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" readonly class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Tuliskan Nama" value="<?= $single_skripsi['nama_mahasiswa']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="periode_pengajuan">Periode Pengajuan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control" name="periode_pengajuan" style="pointer-events: none; background-color: #e9ecef;" onclick="return false;" onkeydown="return false;">
                                        <option>Pilih Periode</option>
                                        <option value="1" <?= ($single_skripsi['periode_pengajuan'] == '1' ? 'selected' : 'disabled'); ?>>Januari - Juni</option>
                                        <option value="2" <?= ($single_skripsi['periode_pengajuan'] == '2' ? 'selected' : 'disabled'); ?>>Juli - Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="tahun_pengajuan">Tahun Pengajuan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input readonly type="number" class="form-control" id="tahun_pengajuan" name="tahun_pengajuan" placeholder="Masukkan tahun" value="<?= $single_skripsi['tahun_pengajuan']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="judul_skripsi">Judul Skripsi <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea readonly class="form-control" rows="3" name="judul_skripsi" id="judul_skripsi" placeholder="Isikan judul skripsi"><?= $single_skripsi['judul_skripsi']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="deskripsi_skripsi">Deskripsi skripsi<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea readonly class="form-control" rows="3" name="deskripsi_skripsi" placeholder="Jelaskan singkat mengenai skripsi skripsi yang dipilih"><?= $single_skripsi['deskripsi_skripsi']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="konsentrasi_bidang">Konsentrasi Bidang <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea readonly class="form-control" rows="3" placeholder="Isikan konsentrasi bidang" name="konsentrasi_bidang" id="konsentrasi_bidang"><?= $single_skripsi['konsentrasi_bidang']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Dosen Pembimbing</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="select2_single form-control" tabindex="-1" name="dosen_pembimbing">
                                        <option>--Pilih Dosen Pembimbing--</option>
                                        <?php foreach($dosen as $d): ?>
                                        <option value="<?=$d->nidn;?>" <?= ($d->nidn == $single_skripsi['dosen_pembimbing'] ? 'selected' : null) ?> ><?= $d->peg_gel_dep; ?> <?= $d->peg_nama; ?>, <?= $d->peg_gel_bel; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Dosen PA</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="select2_single form-control" tabindex="-1" name="dosen_pa">
                                        <option>--Pilih Dosen PA--</option>
                                        <?php foreach($dosen as $d): ?>
                                        <option value="<?=$d->nidn;?>" <?= ($d->nidn == $single_skripsi['dosen_pa'] ? 'selected' : null) ?> ><?= $d->peg_gel_dep; ?> <?= $d->peg_nama; ?>, <?= $d->peg_gel_bel; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Dosen Penguji 1</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="select2_single form-control" tabindex="-1" name="penguji_satu">
                                        <option>--Pilih Dosen Penguji 1--</option>
                                        <?php foreach($dosen as $d): ?>
                                        <option value="<?=$d->nidn;?>" <?= ($d->nidn == $single_skripsi['penguji_satu'] ? 'selected' : null) ?> ><?= $d->peg_gel_dep; ?> <?= $d->peg_nama; ?>, <?= $d->peg_gel_bel; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Dosen Penguji 2</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="select2_single form-control" tabindex="-1" name="penguji_dua">
                                        <option>--Pilih Dosen Penguji 2--</option>
                                        <?php foreach($dosen as $d): ?>
                                        <option value="<?=$d->nidn;?>" <?= ($d->nidn == $single_skripsi['penguji_dua'] ? 'selected' : null) ?> ><?= $d->peg_gel_dep; ?> <?= $d->peg_nama; ?>, <?= $d->peg_gel_bel; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="formFile">Data Dukung</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="form-control" type="file" id="formFile" name="data_dukung">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="<?= base_url('/skripsi/semua_skripsi'); ?>" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Setujui</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>