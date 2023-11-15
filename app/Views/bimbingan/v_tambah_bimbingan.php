<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<link href="<?= base_url()?>template/src/css/select2.min.css" rel="stylesheet" />
<script src="<?= base_url()?>template/src/js/select2.min.js"></script>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>+ Bimbingan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?= validation_list_errors(); ?>
                        <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('bimbingan/simpan_bimbingan'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="birthday">Waktu <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-4">
                                    <input id="birthday" name="bb_waktu" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
							</div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="bb_subjek">Subjek <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control <?= validation_show_error('bb_subjek') ? 'is-invalid' : null; ?>" rows="3" name="bb_subjek" id="bb_subjek" placeholder="Isikan subjek perbaikan"></textarea>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('bb_subjek'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="bb_isi">Keterangan<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control <?= validation_show_error('bb_isi') ? 'is-invalid' : null;; ?>" rows="3" name="bb_isi" placeholder="Jelaskan singkat mengenai perbaikan yang dilakukan"></textarea>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('bb_isi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3" for="formFile">Data Dukung</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="form-control <?= validation_show_error('bb_data_dukung') ? 'is-invalid' : null; ?>" type="file" id="formFile" name="bb_data_dukung">
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= validation_show_error('bb_data_dukung'); ?>
                                    </div>
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
<script>
   $(document).ready(function() {
    $('#nama_pembimbing').select2();
});
$(document).ready(function() {
    $('#nama_dosen_pa').select2();
});
</script>
<?= $this->endSection(); ?>
