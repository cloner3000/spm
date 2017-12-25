<div class="row">
	<h1>Penilaian Borang</h1>
</div>
	<?php
		if ($this->session->flashdata('message')) {
	?>
		<div class="<?=$this->session->flashdata('bgcolor')?>" style="padding:10px"><?=$this->session->flashdata('message')?></div>
	<?php
		}
	?>
<form action="" method="POST">
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-4">
			Kategori
			<select name="idKategori" id="idKategori" class="form-control" onchange="getStandar()">
				<option value=""></option>
				<?php
					foreach ($kategori as $rowKategori) {
				?>
					<option value="<?=$rowKategori['idKategori']?>"><?=$rowKategori['kategori']?></option>
				<?php
					}
				?>
			</select>
		</div>
		<div class="col-lg-4">
			Total Skor BPS
			<input type="text" id="totalScore" class="form-control" value="" disabled>
		</div>
		<div class="col-lg-4">
			&nbsp;
			<input type="text" id="" class="form-control" value="" disabled>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-4">
			<div id="standarCbo">
				Standar
				<select name="standar" class="form-control" onclick="alert('Kategori harus dipilih')">
					<option value=""></option>
				</select>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-4">
			<div id="elemen">
				Elemen Penilaian
				<select name="idElemen" class="form-control" onclick="alert('Kategori dan Standar harus dipilih')">
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="col-lg-4">
			Bobot Relatif
			<input type="text" id="bobotRelatif" class="form-control" value="" disabled>
		</div>
		<div class="col-lg-4">
			Bobot Absolut
			<input type="text" id="bobotAbsolut" class="form-control" value="" disabled>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="portlet box red">
		    <div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list"></i> Matriks Penilaian
				</div>
			</div>
			<div class="portlet-body" id="porletPenilaian">
				Deskriptor
				<div id="panelDescDeskriptor" class="panel panel-danger" style="padding:10px">
					&nbsp;
				</div>
				Harkat dan Peringkat
				<table class="table-bordered">
					<tr>
						<th>0&nbsp;</th>
						<th id="nol"></th>
					</tr>
					<tr>
						<th>1&nbsp;</th>
						<th id="satu"></th>
					</tr>
					<tr>
						<th>2&nbsp;</th>
						<th id="dua"></th>
					</tr>
					<tr>
						<th>3&nbsp;</th>
						<th id="tiga"></th>
					</tr>
					<tr>
						<th>4&nbsp;</th>
						<th id="empat"></th>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="portlet box green">
		    <div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list"></i> Borang Akreditasi
				</div>
			</div>
			<div class="portlet-body" id="porletAkreditasi">
				<div class="row">
					<div class="col-lg-12">
						Deskripsi Elemen
						<div id="panelDescElemen" class="panel panel-success" style="padding:10px">
							&nbsp;
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						Isian SPMI / Entri Borang
						<textarea name="response" id="response" class="form-control"></textarea><br>
						<div id="btnGambar">
							<a class="btn btn-success" onclick="viewGambar()"><i class="fa fa-search"></i> Daftar Gambar</a><br><br>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						Skor
						<input type="text" name="skor" id="skor" class="form-control">
					</div>
					<div class="col-lg-4">
						<br>
						<input type="submit" name="submit" class="btn btn-primary" value="Kirim Borang">
					</div>
			</div>
		</div>
	</div>
</div>
</form>
<div class="modal fade" id="gambar" tabindex="-1" role="gambar" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Daftar Gambar</h4>
			</div>
			<div class="modal-body">
				<div id="msgUplErr" class="panel panel-danger"></div>
     			<div id="fileUploadedPage"></div>
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
	function getStandar() {
		var idKategori 	= $('#idKategori').val();
		$.post("<?=base_url()?>Master/getStandar",{kategori:idKategori},function(result){
			$('#standarCbo').html(result);
			$.post("<?=base_url()?>Content/getTotalSkor",{kategori:idKategori},function(result2){
				$('#totalScore').val(result2);
			});
		});
	}
	function getElemen() {
		var idKategori 	= $('#idKategori').val();
		var standar 	= $('#standar').val();
		$.post("<?=base_url()?>Master/getElemen",{standar:standar,kategori:idKategori},function(result){
			$('#elemen').html(result);
		});
	}
	function getElemenContent() {
		var idDeskriptor	= $('#idDeskriptor').val();
		$.post("<?=base_url()?>Master/getElemenContent",{idDeskriptor:idDeskriptor},function(result){
			var parsed = JSON.parse(result);
			$('#panelDescDeskriptor').html(parsed[0]['deskriptor']);
			$('#bobotAbsolut').val(parsed[0]['bobot']);
			$('#nol').html(parsed[0]['nol']);
			$('#satu').html(parsed[0]['satu']);
			$('#dua').html(parsed[0]['dua']);
			$('#tiga').html(parsed[0]['tiga']);
			$('#empat').html(parsed[0]['empat']);
			$('#response').val(parsed[0]['response']);
			$('#skor').val(parsed[0]['skor']);
			$('#bobotRelatif').val((parsed[0]['skor'] / 4) * parsed[0]['bobot']);
			$('#panelDescElemen').html(parsed[0]['butir']+' '+parsed[0]['elemen']);
			$('#btnGambar').html('<a data-toggle="modal" href="#gambar" class="btn btn-success" onclick="viewGambar()"><i class="fa fa-search"></i> Daftar Gambar</a><br><br>');
		});
	}
	function viewGambar() {
		var idDeskriptor	= $('#idDeskriptor').val();
		if (idDeskriptor) {
			$.post("<?=base_url()?>Config/getGambarByIdDeskriptor/"+idDeskriptor,{},function(result){
				// $('#portletGambar').html(result);
				$("#fileUploadedPage").load("<?=base_url()?>Content/viewUploadedGambar/"+idDeskriptor);
			});
		}else{
			alert('Elemen belum dipilih');
		}
	}
	function uploadGambar() {
		var file	= $('#file').val();
		$.post("<?=base_url()?>Content/uploadGambar",{file:file},function(result){
			if (result != '') {
				$('#msgUplErr').html(result);
			}else{
				viewGambar();
			}
		});
	}
</script>