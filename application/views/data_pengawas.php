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
				    <a class="nav-link active" href="#">Data Petugas Lab</a>
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
				<a href="<?= base_url('Master_data/tambah_pengawas'); ?>" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> ADD Petugas Lab</a>
				<br>
				<div class="table-responsive">
					<table class="table-sm table-bordered" id="data_pengawas">
						<thead>
							<th>ID</th>
							<th  style="width: 40%;">NIP</th>
							<th  style="width: 50%;">NAMA PETUGAS LAB</th>
							<th>WILAYAH</th>
							<th style="width: 10%;"></th>
						</thead>
						<tbody>
							<?php
								foreach ($list_pengawas as $row) {
									echo "
									<tr>
										<td>".$row->id_petugasLab."</td>
										<td>".$row->nip."</td>
										<td>".strtoupper($row->nama)."</td>
										<td>".$row->wilayah."</td>
										<td>
											<a href=".base_url('Master_data/edit_pengawas?id=').$row->id_petugasLab." class='btn btn-primary btn-sm'><span class='fa fa-edit'></span></a>
											<a href='javascript:void(0);' data=". $row->id_petugasLab ." class='btn btn-danger btn-sm item-delete'><i class='fa fa-trash'></i> </a>
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

<script>

    //menampilkan data ketabel dengan plugin datatables
    $('#data_pengawas').DataTable();

    //menampilkan modal dialog saat tombol hapus ditekan
    $('#data_pengawas').on('click', '.item-delete', function() {
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
                url: '<?php echo base_url() ?>Master_data/delete_pengawas',
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