<link rel="stylesheet" type="text/css" href="<?=base_url()?>muha-assets/easyui/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>muha-assets/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>muha-assets//easyui/demo/demo.css">
<script type="text/javascript">
	function regist() {
		identityNo = $('#identityNo').val();
		email = $('#email').val();
		$.post("<?=base_url()?>Master/validate",{table:'master_user',field:'identityNo',value:identityNo},function(result) {
			if (result != 1) {
				$.post("<?=base_url()?>Master/validate",{table:'master_user',field:'email',value:email},function(result) {
					if (result != 1) {
						$('#fm').submit();
					}else{
						$('#errMsg').html('Alamat E-Mail Telah Terdaftar');
					}
				});
			}else{
				$('#errMsg').html('Nomor Identitas Telah Terdaftar');
			}
		});
		// $('#fm').form('submit',{
	 //        url: "<?=base_url()?>Master/register",
	 //        onSubmit: function(){
	 //            return $(this).form('validate');
	 //        },
	 //        success: function(result){
	 //            var result = eval('('+result+')');
	 //            if (result.success){
	 //                $('#dg').datagrid('reload');
	 //            } else {
	 //            	$.messager.alert('Error Message',result.msg,'error');
	 //            }
	 //        }
	 //    });
	}
	function cekData() {
		row = $('dg').datagrid('getSelected');
		if (row) {
			alert(row.itemid);
		}else{
			$('#dlg').modal('hide');
		}
	}
	function action(val) {
		var edit = '<a data-toggle="modal" href="#dlg" class="btn btn-warning btn-xs" onclick="cekData()"><i class="fa fa-edit"></i> Ubah</a>';
		var hapus = '<a href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Nonaktifkan</a>';
		return edit+' '+hapus;
	}
	function status(val) {
		if (val == 1) {
			var q = "<span style='padding:10px; color:green;'><i class='fa fa-check'></i></span>" 
		}else{
			var q = "<span style='padding:10px; color:red;'><i class='fa fa-remove'></i></span>" 
		}
		return q;
	}
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
	function function_name(argument) {
		// body...
	}
</script>
<h1>Deskriptor</h1>
<p>Data dalam menu Deskriptor pada sistem ini adalah sebagai <em>sub</em> atau turunan dari induk utama (Elemen) dalam struktur pohon Elemen Penilaian</p>
	
<table id="dg" class="easyui-datagrid" title="Data Elemen"
	url= "<?=base_url()?>Master/getDataDeskriptor"
    iconCls="fa fa-sitemap"
    rownumbers="true"
    pagination="true"
    fitColumns="true"
    nowrap="false"
    pageList= [10,20,30]
    toolbar="#tb-datagrid"
	data-options="">
	<!-- singleSelect:true,
	fitColumns:false,
	toolbar:'#tb-datagrid',
	url:'<?=base_url()?>muha-assets/easyui/datagrid_data1.json',
	method:'post' -->
<thead>
	<tr>
		<th field="butir" width="5" rowspan="3">No. Butir</th>
		<th field="bobot" width="5" rowspan="3">Bobot Butir</th>
		<th field="elemen" width="15" rowspan="3">Elemen</th>
		<th field="deskriptor" width="15" rowspan="3">Deskriptor</th>
		<th width="10" colspan="5">Harkat dan Peringkat</th>
	</tr>
	<tr>
		<th width="10">Sangat Baik</th>
		<th width="10">Baik</th>
		<th width="10">Cukup</th>
		<th width="10">Kurang</th>
		<th width="10">Sangat Kurang</th>
	</tr>
	<tr>
		<th field="empat" width="5">4</th>
		<th field="tiga" width="5">3</th>
		<th field="dua" width="5">2</th>
		<th field="satu" width="5">1</th>
		<th field="nol" width="5">0</th>
	</tr>
</thead>
<div id="tb-datagrid">
	<a data-toggle="modal" href="#dlg" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
</div>
<div class="modal fade" id="dlg" tabindex="-1" role="dlg" aria-hidden="true">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h1 class="modal-title">Tambah Deskriptor</h1>
			</div>
			<div class="modal-body">
				<!-- <div id="errMsg" class="bg-danger" style="padding:10px;color:red;display:none;"></div>
		        <div class="content-form-page">
		          <div class="row">
		          	<div class="col-lg-3"></div>
		            <div class="col-md-6 col-sm-6">
		              <form class="form-horizontal" role="form" action="<?=base_url()?>Master/tambahElemen" method="POST" id="fm">
		                  <div class="form-group">
		                    <label for="idKategori" class="col-lg-4 control-label">Kategori</label>
		                    <div class="col-lg-8">
		                    	<select name="idKategori" class="form-control">
		                    	<?php
		                    		$q = $this->db->get('master_kategori')->result_array();
		                    		foreach ($q as $rowKategori) {
		                    	?>
		                    		<option value="<?=$rowKategori['idKategori']?>"><?=$rowKategori['kategori']?></option>
		                    	<?php
		                    		}
		                    	?>
		                    	</select>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="standar" class="col-lg-4 control-label">Standar</label>
		                    <div class="col-lg-8">
		                    	<input type="text" class="form-control" id="standar" name="standar" autocomplete="off" placeholder="Isi Kolom Ini Dengan Angka">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="noUrut" class="col-lg-4 control-label">No Urut</label>
		                    <div class="col-lg-8">
		                    	<input type="text" class="form-control" id="noUrut" name="noUrut" autocomplete="off" placeholder="Isi Kolom Ini Dengan Angka">
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label for="elemen" class="col-lg-4 control-label">Elemen</label>
		                    <div class="col-lg-8">
		                    	<textarea name="elemen" class="form-control"></textarea>
		                    </div>
		                  </div> -->
		                  <h1>Penambahan deskriptor sedang dalam proses.</h1>
		                   Sementara tidak semua user dapat melakukan penambahan deskriptor demi meminimalisir kegagalan sistem.
		                <div class="row">
		                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
		                    <!-- <input type="submit" name="submit" class="btn btn-primary" value="Buat akun"> -->
		                    <!-- <a href="javascript:void(0)" class="btn btn-primary" onclick="regist()" style="color:white;">Kirim</a> -->
		                    <!-- <button type="button" class="btn btn-default">Cancel</button> -->
		                    <!-- <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="$('#dlg').hide()"><i class="fa fa-trash"></i> Hide Modal</a> -->
		                  </div>
		                </div>
		              </form>
		            </div>
		          </div>
		        </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="<?=base_url()?>muha-assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>muha-assets/easyui/jquery.easyui.min.js"></script>