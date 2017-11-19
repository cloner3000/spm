<!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                Tentang SPM
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url()?>Content?page=visi-dan-misi-spm">Visi & Misi SPM</a></li>
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Fungsi & Tugas SPM</a></li>
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Struktur Organisasi SPM</a></li>
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Layanan Penjaminan Mutu</a></li>                
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                SPMI
              </a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Elemen Sistem Penjaminan Mutu Internal</a></li>
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Dokumen Prosedur dan Standar Mutu Akademik</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                SPME
              </a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Akreditasi BAN PT</a></li>
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Instrumen Akreditasi BAN PT</a></li>
                <?php
                  if (!$this->session->userdata('logged')) {
                ?>
                  <li><a href="javascript:void(0)" onclick="alert('Harap login untuk melakukan akses ke halaman tersebut')">Penilaian Borang</a></li> 
                <?php
                  }else{
                ?>
                  <li><a href="<?=base_url()?>Content/penilaian">Penilaian Borang</a></li> 
                <?php
                  }
                ?>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                Dasar Hukum
              </a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Status Kampus</a></li>
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Peraturan Turunan Status Kampus</a></li>
              </ul>
            </li>
            <?php
              if ($this->session->userdata('logged')) {
                if ($this->session->userdata('idLevel') < 3) {
            ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                Master Data
              </a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Elemen Penilaian</a></li>
              </ul>
            </li>
            <?php
              }
            ?>
            <li class="menu-search">
              <span class="sep"></span>
              <li style="background-color:#f7f7f7;"class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                  <small><small><?=explode(" ", $this->session->userdata('fullname'))[0]?></small></small>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Profil <?=$this->session->userdata('fullname')?></a></li>
                  <li><a href="<?=base_url()?>Home/logout">Logout</a></li>
                </ul>
              </li>
              <li style="background-color:#f7f7f7;"class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                  <small><i class="fa fa-gear fa-sm"></i></small>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?=base_url()?>Config">Konfigurasi Sistem</a></li>
                  <li><a href="<?=base_url()?>Config/contents">Manajemen Konten</a></li>
                  <li><a href="javascript:void(0)" onclick="alert('Konten tidak tersedia, Halaman tersebut tidak dapat diakses untuk sementara')">Manajemen Pengguna</a></li>
                </ul>
              </li>
            </li>
            <?php
              }else{
            ?>
            <li class="menu-search">
              <span class="sep"></span>
              <li><a href="<?=base_url()?>Home/login">Login</a></li>
            </li>
            <?php
              }
            ?>
          </ul>
        </div>
        <!-- END NAVIGATION -->