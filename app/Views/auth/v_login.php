<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPS | Login</title>

    <!-- Bootstrap -->
    <link href="<?= base_url()?>template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()?>template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()?>template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url()?>template/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url()?>template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php if(session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Gagal!</strong> <?= session()->getFlashdata('gagal'); ?>.
            </div>
        <?php endif; ?>
            <form method="POST" action="<?= base_url('/auth/loginProcess'); ?>">
            <?= csrf_field(); ?>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control <?= validation_show_error('username') ?  'is-invalid' : null; ?>"  <?= validation_show_error("username") ? "style=border-color:red;margin-bottom:0;" : null; ?>  placeholder="Username/ NIM"  name="username"/>
                <div class="invalid-feedback" style="text-align: left;">
                  <?= validation_show_error('username'); ?>
                </div>
              </div>
              <div>
                <input type="password" class="form-control <?= validation_show_error('password') ?  'is-invalid' : null; ?>" <?= validation_show_error("password") ? "style=border-color:red;margin-bottom:0;" : null; ?> name="password" placeholder="Password" />
                <div class="invalid-feedback" style="text-align: left;">
                  <?= validation_show_error('password'); ?>
                </div>
              </div>
              <div>
                <select class="form-control" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset; border: 1px solid #c8c8c8; color: #777;">
                    <option>Pilih level</option>
                    <option>Dosen</option>
                    <option>Mahasiswa</option>
                </select>
            </div>
              
              <div style="margin-top: 10px;">
                <button class="btn btn-primary" type="submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                  <a href="#signup" class="to_register"> Lupa Password ? </a>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?=base_url('template/');?>src/img/unpkopsuratm.jpg" alt="logo" width="50" class="shadow-light rounded-circle mb-1 mt-2" >
                  <h1>Sistem Informasi Pendaftaran Skripsi</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
