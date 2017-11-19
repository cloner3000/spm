<script type="text/javascript">
  function copyEmail() {
    var email = $('#email').val();
    var splited = email.split("@");
    $('#secMail').val(splited[0]);
  }
  function validateEmail() {
    $.post("<?=base_url('Home/validate')?>",{table:'master_user',field:'email',value:email},function(result){
      if (result == 1) {
        $('#registeredEmail').show();
      }else{
        $('#registeredEmail').hide();
      }
    });
  }
</script>
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Registrasi</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <div class="col-md-12 col-sm-12">
      <?php
        if ($message) {
      ?>
        <div class="bg-danger col-md-12 col-sm-12" style="padding:20px">
          <?=$message?>
        </div>
      <?php
        }else{
      ?>
        <h1>Buat akun baru </h1>
        <div class="content-form-page">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <form class="form-horizontal" role="form" action="" method="POST">
                <fieldset>
                  <legend>Data Diri</legend>
                  <div class="form-group">
                    <label for="identityNo" class="col-lg-4 control-label">Nomor KTP/SIM/Passport</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="identityNo" name="identityNo" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="fullname" class="col-lg-4 control-label">Nama Lengkap</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="fullname" name="fullname" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="occupation" class="col-lg-4 control-label">Pekerjaan</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="occupation" name="occupation" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-lg-4 control-label">Email</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="email" name="email" onkeyup="copyEmail()" onchange="validateEmail()" autocomplete="off">
                      <small id="registeredEmail" class="require" style="display:none;">Email telah terdaftar. Silahkan <a href="<?=base_url()?>Home/login">masuk</a> jika telah memiliki akun</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-lg-4 control-label">Alamat</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="gender" class="col-lg-4 control-label">Jenis Kelamin</label>
                    <div class="col-lg-8">
                      <select name="gender" class="form-control" autocomplete="off">
                        <option value="">- Pilih Jenis Kelamin -</option>
                        <?php
                          $gender = $this->db->get('master_gender')->result_array();
                          foreach ($gender as $rowGender) {
                        ?>
                          <option value="<?=$rowGender['idGender']?>"><?=$rowGender['gender']?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </fieldset>
            </div>
            <div class="col-md-6 col-sm-6">
                <fieldset>
                  <legend>Data Akun</legend>
                  <div class="form-group">
                    <label for="secMail" class="col-lg-4 control-label">Username</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="secMail" name="username" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-lg-4 control-label">Password</label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm-password" class="col-lg-4 control-label">Konfirmasi Password</label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" id="confirm-password" name="confirm-password" autocomplete="off">
                    </div>
                  </div>
                </fieldset>
                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                    <input type="submit" name="submit" class="btn btn-primary" value="Buat akun">
                    <button type="button" class="btn btn-default">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>