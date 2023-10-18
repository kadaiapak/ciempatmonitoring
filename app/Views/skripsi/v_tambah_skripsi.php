<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ajukan skripsi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('skripsi/simpan_skripsi'); ?>">
                        <?= csrf_field(); ?>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nim_mahasiswa">NIM</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="nim_mahasiswa" class="form-control" id="nim_mahasiswa" placeholder="Tuliskan NIM">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_mahasiswa">Nama Mahasiswa</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Tuliskan Nama">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">NIM</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Nama</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="periode_pengajuan">Periode Pengajuan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control" name="periode_pengajuan">
                                        <option>Pilih Periode</option>
                                        <option value="1">Januari - Juni</option>
                                        <option value="2">Juli - Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="tahun_pengajuan">Tahun Pengajuan</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="number" class="form-control" id="tahun_pengajuan" name="tahun_pengajuan" placeholder="Masukkan tahun">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="judul_skripsi">Judul Skripsi <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" rows="3" name="judul_skripsi" id="judul_skripsi" placeholder="Isikan judul skripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="deskripsi_skripsi">Deskripsi skripsi<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" rows="3" name="deskripsi_skripsi" placeholder="Jelaskan singkat mengenai skripsi skripsi yang dipilih"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="konsentrasi_bidang">Konsentrasi Bidang <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" rows="3" placeholder="Isikan konsentrasi bidang" name="konsentrasi_bidang" id="konsentrasi_bidang"></textarea>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_pembimbing">Nama Pembimbing</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Isikan nama pembimbing" id="nama_pembimbing" name="nama_pembimbing">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3" for="nama_dosen_pa">Nama Dosen PA</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Isikan nama dosen PA" id="nama_dosen_pa" name="nama_dosen_pa">
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
                                    <a href="<?= base_url('/skripsi'); ?>" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
