<h1>Manajemen Konten</h1>
<?php
	if ($disabled) {
?>
	<a href="javascript:void(0)" class="btn btn-danger" onclick="newContent()"><i class="fa fa-plus"></i> Konten Baru</a><br><br>
<?php
	}
	$q = $this->db->get('front_contents');
?>
<form action="" method="POST" enctype="multipart/form-data" id="fm-content">
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
				<td>Konten</td>
				<td>
					<select class="form-control" onchange="window.location.href = '<?=base_url()?>Config/contents/'+$(this).val()">
						<option value="">Pilih untuk mengubah data</option>
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
				</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" id="title" name="title" value="<?=$title?>" class="form-control col-lg-12" onkeyup="getShortcutURL()"></td>
			</tr>
			<tr>
				<td>Alamat Konten</td>
				<!-- <td><input type="text" name="shortcutURL" value="<?=base_url()?>Config/contents/<?=$shortcutURL?>" class="form-control col-lg-12"></td> -->
				<td>
                    <div class="bg-danger" style="padding:10px;display: none; color: red;" id="urlMsg"></div>
					<div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <?=base_url()?>Config/contents/
                            </span>
                            <input type="text" id="shortcutURL" name="shortcutURL" value="<?=$shortcutURL?>" class="form-control" readonly>
                        </div>
                    </div>
				</td>
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
					<a data-toggle="modal" href="#prevTemplateBtn" class="btn btn-success"><i class="fa fa-search"></i> Lihat Semua Template</a><br><br>
				</td>
			</tr>
			<tr>
				<td>Konten</td>
				<td>
					<textarea id="contents" name="contents" class="form-control"></textarea>
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
					<a data-toggle="modal" href="#gambar" class="btn btn-success"><i class="fa fa-search"></i> Daftar Gambar</a>
				</td>
			</tr>
		</table>
	</div>
</form>
<div class="modal fade" id="prevTemplateBtn" tabindex="-1" role="prevTemplateBtn" aria-hidden="true">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Daftar Template</h4>
			</div>
			<div class="modal-body">
				<?php
					foreach ($getAllTemplate as $rowPrevTemplate) {
				?>
					<div class="col-lg-6">
						<h3><?=$rowPrevTemplate['title']?></h3>
						<br>
						<img src="<?=base_url().$rowPrevTemplate['thumbnail']?>" style="width:100%;border:3px solid gray;">
					</div>
				<?php
					}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script type="text/javascript">
	function newContent() {
		window.location.href = "<?=base_url()?>Config/contents";
	}
	function getShortcutURL() {
		var judul = $('#title').val().replace(/\s+/g, '-').toLowerCase();
		if (/[^a-zA-Z0-9\-\/]/.test( judul )) {
			$('#urlMsg').html("Alamat tidak dapat menggunakan karakter simbol");
			$('#urlMsg').show();
		}else{
			$('#urlMsg').hide();
		}
		$('#shortcutURL').val(judul);
	}
</script>