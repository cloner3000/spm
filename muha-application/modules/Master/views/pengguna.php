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
<h1>Data Pengguna</h1>
<p>Data pengguna hanya Administrator yang dapat mengubah atau menambah data</p>
	
<table id="dg" class="easyui-datagrid" title="Data Pengguna"
	url= "<?=base_url()?>Master/getDataPengguna"
    iconCls="fa fa-user"
    rownumbers="true"
    pagination="true"
    fitColumns="true"
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
		<th field="identityNo" width="10">No. Identitas</th>
		<th field="fullname" width="20">Nama Lengkap</th>
		<th field="email" width="20">Email</th>
		<th field="address" width="10">Alamat</th>
		<th field="occupation" width="10">Pekerjaan</th>
		<th field="gender" width="10">Jenis Kelamin</th>
		<th field="regdate" width="10">Tanggal Registrasi</th>
		<th field="status" align="center" width="5" formatter="status">Status</th>
		<!-- <th data-options="field:'aksi',align:'center'" formatter="action"></th> -->
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
				<h1 class="modal-title">Tambah Akun Baru</h1>
			</div>
			<div class="modal-body">
				<!-- <h1>Buat akun baru </h1> -->
				<div id="errMsg" class="bg-danger" style="padding:10px;color:red;display:none;"></div>
		        <div class="content-form-page">
		          <div class="row">
		            <div class="col-md-6 col-sm-6">
		              <form class="form-horizontal" role="form" action="<?=base_url()?>Master/register" method="POST" id="fm">
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
		                    <!-- <input type="submit" name="submit" class="btn btn-primary" value="Buat akun"> -->
		                    <a href="javascript:void(0)" class="btn btn-primary" onclick="regist()" style="color:white;">Kirim</a>
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