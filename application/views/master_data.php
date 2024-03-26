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
				    <a class="nav-link active" aria-current="page" href="<?= base_url('Master_data'); ?>">Jenis Laporan</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="<?= base_url('Master_data/data_pengawas'); ?>">Data Petugas Lab</a>
				  </li>
				  <li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Hotmix</a>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item" href="<?= base_url('Master_data/master_dataDetailHotmix'); ?>">Detail hotmix</a>
					      	<a class="dropdown-item" href="<?= base_url(''); ?>">Analisa Butir</a>
					    </div>
					</li>
				</ul>
				<br>
				<a href="<?= base_url('Master_data/tambah_jenisLaporan'); ?>" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> ADD JENIS LAPORAN</a>
				<br>
				<div class="table-responsive">
					<table class="table-sm table-bordered" id="jenis_laporan">
						<thead>
							<th style="width: 5%;">ID</th><th style="width: 80%;">JENIS LAPORAN</th><th>NOMOR</th><th style="width: 10%;"></th>
						</thead>
						<tbody>
							<?php
								foreach ($list_laporan as $row) {
									echo "
									<tr>
										<td>".$row->id."</td>
										<td>".strtoupper($row->jenis)."</td>
										<td>".$row->nomor."</td>
										<td>
											<a href=".base_url('Master_data/edit_jenisLaporan?id=').$row->id." class='btn btn-primary btn-sm'><span class='fa fa-edit'></span></a>
											<a href='javascript:void(0);' data=". $row->id ." class='btn btn-danger btn-sm item-delete'><i class='fa fa-trash'></i> </a>
										</td>
									</tr>
									";
								}
							?>
						</tbody>
					</table>
					
				</div>
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

<div onload="loadingAjax('myDiv');" class="loader">
    <div id="myDiv">
        <img id="loading-image" src="<?= base_url('assets/gif/loading.gif'); ?>" style="display:none;"/>
    </div>
</div>

<script>

    //menampilkan data ketabel dengan plugin datatables
    $('#jenis_laporan').DataTable();

    //menampilkan modal dialog saat tombol hapus ditekan
    $('#jenis_laporan').on('click', '.item-delete', function() {
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
                url: '<?php echo base_url() ?>Master_data/delete_jenis',
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {
	              	$("#loading-image").show();
	           	},
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                },
			   	complete:function(data){
			  	  	/* Hide image container */
			  	  	$("#loading-image").hide();
			  	}
            });
        });
    });
</script>

<script type="text/javascript">
	var timestamp = '<?=date('d/m/Y h:m:s');?>';
	function updateTime(){
	  $('#time').html(Date(timestamp));
	  timestamp++;
	}
	$(function(){
	  setInterval(updateTime, 1000);
	});
</script>