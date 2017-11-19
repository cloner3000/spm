<ul class="breadcrumb">
    <li><a href="index.html">Home</a></li>
    <li class="active"><?=$title?></li>
</ul>
<div class="row">
	<!-- BEGIN CAROUSEL -->
    <div class="col-md-12 front-carousel">
      <div id="myCarousel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
        <?php
          $no = 0;
          foreach ($images as $rowImages) {
            $no++;
            if ($no == 1) {
              $active = 'active';
            }else{
              $active = '';
            }
        ?>
            <div class="item <?=$active?>">
              <center>
                <img src="<?=base_url().$rowImages['imageURL']?>" alt="" style="max-height:500px;">
              </center>
              <div class="carousel-caption">
                <p><?=$rowImages['description']?></p>
              </div>
            </div>
        <?php
          }
        ?>
          <!-- <div class="item">
            <img src="<?=base_url()?>muha-assets/frontend/pages/img/pics/img2-medium.jpg" alt="">
            <div class="carousel-caption">
              <p>Terlaksananya siklus penjaminan mutu internal secara periodik dan berkelanjutan;</p>
            </div>
          </div>
          <div class="item">
            <img src="<?=base_url()?>muha-assets/frontend/pages/img/pics/img2-medium.jpg" alt="">
            <div class="carousel-caption">
              <p>Terlaksananya sistim monitoring, evaluasi dan audit internal dan eksternal</p>
            </div>
          </div>
          <div class="item">
            <img src="<?=base_url()?>muha-assets/frontend/pages/img/pics/img2-medium.jpg" alt="">
            <div class="carousel-caption">
              <p>Meningkatnya kinerja unit pelaksana akademik dalam pelaksanaan Tridarma</p>
            </div>
          </div>
          <div class="item">
            <img src="<?=base_url()?>muha-assets/frontend/pages/img/pics/img2-medium.jpg" alt="">
            <div class="carousel-caption">
              <p>Meningkatnya kinerja unit kerja non akademik dalam mendukung pelaksanaan Tridarma</p>
            </div>
          </div>
          <div class="item">
            <img src="<?=base_url()?>muha-assets/frontend/pages/img/pics/img2-medium.jpg" alt="">
            <div class="carousel-caption">
              <p>Terwujudnya kesadaran dan tanggungjawab stakeholders dalam berperilaku organisasi untuk menuju budaya mutu</p>
            </div>
          </div> -->
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
    <!-- END CAROUSEL -->
</div>
<br>
<div>
  <h1><?=$title?></h1>
  <?=$contents?>
</div>
<br>
<br>