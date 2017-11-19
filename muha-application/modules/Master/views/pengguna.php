<link rel="stylesheet" type="text/css" href="<?=base_url()?>muha-assets/easyui/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>muha-assets/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>muha-assets//easyui/demo/demo.css">
<script type="text/javascript">
	function cekData() {
		row = $('dg').datagrid('getSelected');
		if (row) {
			alert(row.itemid);
		}else{
			$('#dlg').modal('hide');
		}
	}
</script>
<h1>Data Pengguna</h1>
<p>Data pengguna hanya Administrator yang dapat mengubah atau menambah data</p>
	
<table id="dg" class="easyui-datagrid" title="Data Pengguna" style="width:100%;height:350px;"
	data-options="
	singleSelect:true,
	fitColumns:true,
	toolbar:'#tb-datagrid',
	url:'<?=base_url()?>muha-assets/easyui/datagrid_data1.json',
	method:'post'
	">
<thead>
	<tr>
		<th data-options="field:'itemid',width:80">Item ID</th>
		<th data-options="field:'productid',width:100">Product</th>
		<th data-options="field:'listprice',width:80,align:'right'">List Price</th>
		<th data-options="field:'unitcost',width:80,align:'right'">Unit Cost</th>
		<th data-options="field:'attr1',width:250">Attribute</th>
		<th data-options="field:'status',width:60,align:'center'">Status</th>
	</tr>
</thead>
<div id="tb-datagrid">
	<a data-toggle="modal" href="#dlg" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
	<a data-toggle="modal" href="#dlg" class="btn btn-success" onclick="cekData()"><i class="fa fa-edit"></i> Ubah</a>
	<a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
</div>
<div class="modal fade" id="dlg" tabindex="-1" role="dlg" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Daftar Template</h4>
			</div>
			<div class="modal-body">
				
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