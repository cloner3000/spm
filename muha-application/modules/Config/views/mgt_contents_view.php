<script src="<?=base_url()?>muha-assets/ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>muha-assets/ckeditor/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>muha-assets/ckeditor/css/samples.css">
<link rel="stylesheet" href="<?=base_url()?>muha-assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
<h1>Manajemen Konten</h1>
<?php
	$q = $this->db->get('front_contents');
?>
<select id="shortcutURL" name="shortcutURL" class="form-control" onchange="window.location.href = '<?=base_url()?>Config/contents/'+$('#shortcutURL').val()">
	<option value="">-- Pilih --</option>
<?php
	foreach ($q->result_array() as $rowContents) {
		if ($shortcutURL == $rowContents['shortcutURL']) {
			$select = "selected";
		}else{
			$select = "";
		}
?>
		<option value="<?=$rowContents['shortcutURL']?>" <?=$select?>><?=$rowContents['title']?></option>
<?php
	}
?>
</select>
<br>
<form action="" method="POST" enctype="multipart/form-data">
	<?php
		if ($this->session->flashdata('message')) {
	?>
		<div class="<?=$this->session->flashdata('bgcolor')?>" style="padding:10px"><?=$this->session->flashdata('message')?></div><br>
	<?php
		}
	?>
	<div class="col-lg-8">
		<table class="table">
			<tr>
				<td>Judul</td>
				<td><input type="text" name="title" value="<?=$title?>" class="form-control col-lg-12"></td>
			</tr>
			<tr>
				<td>Alamat Konten</td>
				<td><input type="text" name="shortcutURL" value="<?=$shortcutURL?>" class="form-control col-lg-12"></td>
			</tr>
			<?php
				$a = $this->db->get('template');
			?>
			<tr>
				<td>Template</td>
				<td>
					<select id="template" name="template" class="form-control" onchange="">
						<option value="">-- Pilih --</option>
					<?php
						foreach ($a->result_array() as $rowTemplate) {
							if ($template == $rowTemplate['idTemplate']) {
								$select = "selected";
							}else{
								$select = "";
							}
					?>
							<option value="<?=$rowTemplate['idTemplate']?>" <?=$select?>><?=$rowTemplate['title']?></option>
					<?php
						}
					?>
					</select>
					<a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-search"></i> Lihat daftar template</a>
				</td>
			</tr>
			<tr>
				<td>Konten</td>
				<td>
					<textarea id="editor" class="form-control">
					</textarea>
				</td>
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
					<div class="portlet box red">
					    <div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list"></i> Daftar Gambar
							</div>
					    </div>
						<div class="portlet-body" id="portletGambar">
							<?=$imgs?>
						</div>
					</div>
					<a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Gambar</a>
				</td>
			</tr>
		</table>
	</div>
</form>