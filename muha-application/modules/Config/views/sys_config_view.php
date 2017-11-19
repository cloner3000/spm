<h1>Konfigurasi Sistem</h1>
<form action="" method="POST" enctype="multipart/form-data">
	<?php
		if ($this->session->flashdata('message')) {
	?>
		<div class="<?=$this->session->flashdata('bgcolor')?>" style="padding:10px"><?=$this->session->flashdata('message')?></div>
	<?php
		}
	?>
	<div class="col-lg-8">
		<table class="table">
			<tr>
				<td>Nama Instansi</td>
				<td><input type="text" name="company" value="<?=$company?>" class="form-control col-lg-12"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="address" class="form-control col-lg-12"><?=$address?></textarea></td>
			</tr>
			<tr>
				<td>Telpon</td>
				<td><input type="text" name="phone" value="<?=$phone?>" class="form-control col-lg-12"></td>
			</tr>
			<tr>
				<td>E-Mail</td>
				<td><input type="text" name="email" value="<?=$email?>" class="form-control col-lg-12"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
			</tr>
		</table>
	</div>
	<div class="col-lg-4">
		<table class="table">
			<tr>
				<td>
					<img src="<?=base_url().$logo?>" width="100%">
					<input type="file" name="file" class="form-control">
				</td>
			</tr>
		</table>
	</div>
</form>