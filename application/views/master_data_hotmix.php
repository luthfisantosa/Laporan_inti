<div class="container pt-5 pb-5">
	<div class="col col-sm-12">
		<div class="card">
			<div class="card card-header">
				<?= $title; ?> <small id="time"><?= date('d/m/Y h:m:s'); ?></small>
				<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
	            <?php if ($this->session->flashdata('message')) :
	                echo $this->session->flashdata('message');
	            endif; ?>
			</div>
			<div class="card card-body">
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link" aria-current="page" href="<?= base_url('Master_data'); ?>">Jenis Laporan</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="<?= base_url('Master_data/data_pengawas'); ?>">Data Petugas Lab</a>
				  </li>
				  <li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Hotmix</a>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item active" href="<?= base_url('Master_data/master_dataDetailHotmix'); ?>">Detail hotmix</a>
					      	<a class="dropdown-item" href="<?= base_url('Master_data/master_dataAnalisaButiran'); ?>">Analisa Butir</a>
					    </div>
					</li>
				</ul>
				<br>
				<a data-target="#add" data-toggle="modal" href="#add" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> ADD DETAIL</a>
				<br>
				<div class="table-responsive">
					<table class="table-sm table-bordered" id="data_detail">
						<thead style="font-size:12px;">
							<th>ID</th>
							<th>JENIS</th>
							<th>BERAT CONTOH SEBELUM EXTRAKSI</th>
							<th>BERAT FILTER SEBELUM EXTRAKSI</th>
							<th>BERAT CONTOH SESUDAH EXTRAKSI</th>
							<th>BERAT FILTER SESUDAH EXTRAKSI</th>
							<th>BERAT TOTAL AGREGAT</th>
							<th>BERAT ASPAL</th>
							<th>BERAT KADAR ASPAL</th>
							<th style="width: 10%;"></th>
						</thead>
						<tbody id="tbl_body">
						</tbody>
					</table>
					<p id="test"></p>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- modal -->
<div id="add" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">DETAIL ASPAL</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="#" method="POST" class="">
	      		<input type="hidden" class="form-control" name="mode" id="_mode" placeholder="">
	      		<input type="hidden" class="form-control" name="id" id="_id" placeholder="">
	      		<div class="form-group-sm">
	      			<label for="jenis">JENIS</label>
	      			<input type="text" class="form-control" name="jenis" id="_jenis" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="contoh_before">BERAT CONTOH SEBELUM EXTRAKSI</label>
	      			<input type="text" class="form-control" name="contoh_before" id="_contoh_before" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="filter_before">BERAT FILTER SEBELUM EXTRAKSI</label>
	      			<input type="text" class="form-control" name="filter_before" id="_filter_before" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="contoh_after">BERAT CONTOH SESUDAH EXTRAKSI</label>
	      			<input type="text" class="form-control" name="contoh_after" id="_contoh_after" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="filter_after">BERAT FILTER SESUDAH EXTRAKSI</label>
	      			<input type="text" class="form-control" name="filter_after" id="_filter_after" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="agregat">BERAT TOTAL AGREGAT</label>
	      			<input type="text" class="form-control" name="agregat" id="_agregat" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="berat_aspal">BERAT ASPAL</label>
	      			<input type="text" class="form-control" name="berat_aspal" id="_berat_aspal" placeholder="">
	      		</div>
	      		<br>
	      		<div class="form-group-sm">
	      			<label for="kadar_aspal">BERAT KADAR ASPAL</label>
	      			<input type="text" class="form-control" name="kadar_aspal" id="_kadar_aspal" placeholder="">
	      		</div>
	      	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="_save" >Save changes</button>
	        <button type="button" class="btn btn-primary" id="_edit" hidden>Edit</button>
	      </div>
	    </div>
	</div>
</div>

<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>


<!-- loading -->
<div id="loading" onload="loadingAjax('myDiv');" style="display:none;">
	<center>
		<img id="loading-image" src="<?= base_url('assets/gif/loading.gif'); ?>" width="50px" />
	</center>
</div>


<script type="text/javascript">
	//menampilkan data ketabel dengan plugin datatables
    $('#data_detail').DataTable();

    $.ajax({
    	url: '<?= base_url("Master_data/ajax_dataDetailHotmix"); ?>',
    	type:'ajax',
    	cache:false,
    	method:'GET',
    	async:true,
    	success:function(data) {
    		$('#tbl_body').html(data);
    	}
    });

    $('#_save').click(function(){
    	var mode = 'save';
    	var jenis = $('#_jenis').val();
    	var contoh_before = $('#_contoh_before').val();
    	var filter_before = $('#_filter_before').val();
    	var contoh_after = $('#_contoh_after').val();
    	var filter_after = $('#_filter_after').val();
    	var agregat = $('#_agregat').val();
    	var berat_aspal = $('#_berat_aspal').val();
    	var kadar_aspal = $('#_kadar_aspal').val();
    	// alert(jenis+contoh_before+filter_before+contoh_after+filter_after+agregat+berat_aspal+kadar_aspal);

    	$.ajax({
    		url: '<?= base_url("Master_data/save_detailHotmix"); ?>',
    		type:'ajax',
    		method: 'POST',
    		async: false,
    		data: {
    			mode: 'save',
    			jenis:jenis,
    			contoh_before:contoh_before,
    			filter_before:filter_before,
    			contoh_after:contoh_after,
    			filter_after:filter_after,
    			agregat:agregat,
    			berat_aspal:berat_aspal,
    			kadar_aspal:kadar_aspal
    		},
    		beforeSend: function() {
	            $("#loading").show();
	        },
    		success: function(data){
    			setTimeout(function () {
	    			$("#loading").hide();
	    			$("#add").modal('hide');
	    			location.reload();
	    			$('#test').html(data);
    			}, 1000);
    		}
    	});
    });

    // edit
    $('#data_detail').on('click', '.item-edit', function() {
    	var id = $(this).attr('data');
    	$.ajax({
    		type: 'ajax',
    		method: 'get',
    		async: false,
    		url: '<?php echo base_url() ?>Master_data/edit_detailHotmix?mode=getdata',
    		data: {
    			mode : 'edit',
    			id: id
    		},
    		success: function(data){
    			_data = data.split(';');
    			$('#add').modal('show');
    			$('#_id').val(_data[0]);
    			$('#_jenis').val(_data[1]);
    			$('#_contoh_before').val(_data[2]);
    			$('#_filter_before').val(_data[3]);
    			$('#_contoh_after').val(_data[4]);
				$('#_filter_after').val(_data[5]);
				$('#_agregat').val(_data[6]);
				$('#_berat_aspal').val(_data[7]);
				$('#_kadar_aspal').val(_data[8]);

				$("#_edit").prop("hidden", false);
				$("#_save").prop("hidden", true);
				$('#_edit').click(function(){
					$.ajax({
						type: 'ajax',
						method: 'post',
						async: false,
						url: '<?= base_url("Master_data/edit_detailHotmix?mode=save_edit"); ?>',
						data: {
							mode : 'edit',
							id : $('#_id').val(),
							data1 : $('#_jenis').val(),
							data2 : $('#_contoh_before').val(),
							data3 : $('#_filter_before').val(),
							data4 : $('#_contoh_after').val(),
							data5 : $('#_filter_after').val(),
							data6 : $('#_agregat').val(),
							data7 : $('#_berat_aspal').val(),
							data8 : $('#_kadar_aspal').val()
						},
						success: function (data) {
							setTimeout(function () {
				    			$("#loading").hide();
				    			$("#add").modal('hide');
				    			location.reload();
				    			$('#test').html(data);
			    			}, 1000);
						}
					});
				});
    		}
    	});
    })

    //menampilkan modal dialog saat tombol hapus ditekan
    $('#data_detail').on('click', '.item-delete', function() {
        //ambil data dari atribute data 
        var id = $(this).attr('data');
        $('#myModalDelete').modal('show');

        //ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete 
        //pada controller mahasiswa
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>Master_data/delete_detailHotmix',
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {
	              	$("#loading").show();
	           	},
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                },
			   	complete:function(data){
			  	  	/* Hide image container */
			  	  	setTimeout(function () {
		    			$("#loading").hide();
		    			$("#add").modal('hide');
		    			location.reload();
		    			$('#test').html(data);
	    			}, 1000);
			  	}
            });
        });
    });
</script>