        <ul class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li class="active">Masuk</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <!-- <div class="row margin-bottom-40"> -->
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <!-- <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Login/Register</a></li>
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Restore Password</a></li>
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> My account</a></li>
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Address book</a></li>
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Wish list</a></li>
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Returns</a></li>
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Newsletter</a></li>
            </ul> -->
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Masuk</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal form-without-legend" role="form" action="" method="POST">
                    <div class="form-group">
                      <label for="message" class="col-lg-3 control-label"></label>
                      <div class="require col-lg-9"><?=$message?></div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-lg-4 control-label">Username <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="text" name="username" class="form-control" id="username" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" name="password" class="form-control" id="password" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <input type="submit" name="submit" class="btn btn-primary" value="Masuk">
                        <button class="btn btn-success">Lupa Password</button>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p class="text-muted">or login using:</p>
                            <ul class="social-icons">
                                <li><a href="#" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                <li><a href="#" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                <li><a href="#" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                                <li><a href="#" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                            </ul>
                        </div>
                      </div>
                    </div> -->
                  </form>
                </div>
<!--                 <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Informasi</em> Penting</h2>
                    <p>Pastikan anda dapat melakukan pembayaran dan konfirmasi pembayaran dalam waktu kurang dari 5 (Lima) jam agar tidak menghambat proses sertifikasi.</p>

                    <a href="javascript:void(0)" class="btn btn-default">Pelajari</a>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        <!-- </div> -->
        <!-- END SIDEBAR & CONTENT -->