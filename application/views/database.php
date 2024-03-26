<div class="pt-5 pb-5 p-5">
	<div class="col col-sm-12 ">
		<div class="card" >
			<div class="card card-header">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Data</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title; ?> </li>
					</ol>
				</nav>
				<script type="text/javascript">
					$.notify("Alert!", {animationType:"drop"});
				</script>
				<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
			</div>
			<div class="card card-body">
				<ul class="nav nav-tabs">
				  	<li class="nav-item">
				    	<a class="nav-link" aria-current="page" href="<?= base_url('Home/'); ?>">Pengantar</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="<?= base_url('Home/cover'); ?>">Cover</a>
				  	</li>
				  	<li class="nav-item">
					    <a class="nav-link" href="<?= base_url('Home/tes_bahan'); ?>">Tes Bahan</a>
				  	</li>
				  	<li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Silinder</a>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item" href="<?= base_url('Home/silinder'); ?>">Kuat Tekan Beton</a>
					      	<a class="dropdown-item" href="<?= base_url('Home/silinderBasecourse'); ?>">Base Course</a>
					      	<a class="dropdown-item" href="<?= base_url('Home/hotmix'); ?>">Hotmix</a>
					    </div>
					</li>
					<li class="nav-item">
					    <a class="nav-link active" href="<?= base_url('Home/tes_kubus'); ?>">Tes Kubus</a>
				  	</li>
				  	<li class="nav-item">
					    <a class="nav-link active" href="<?= base_url('Home/database'); ?>">Database</a>
				  	</li>
				</ul>
				<br>
				<div class="row">
					<div class="col col-12">
						<div class="table-responsive">
							<table id="table1" datatable="" class="table-sm table-striped table-bordered" style="width:100%; font-size: medium;">
								<thead>
									<tr>
										<th>ACTION</th>
										<th>PRINT</th>
										<th>NO</th>
										<th>TANGGAL</th>
										<th>KODE REKENING</th>
										<th>KODE LAPORAN</th>
										<th>KEGIATAN</th>
										<th>NAMA LOKASI</th>
										<th>PELAKSANA</th>
										<th>AKRONIM</th>
										<th>JENIS PEKERJAAN</th>
										<th>PEMBORONG</th>
										<th>WILAYAH</th>
										<th>ABT</th>
										<th>KEPALA UPTD</th>
										<th>DIAMBIL</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_all as $row) : ?>
										<tr>
											<td>
												<a href='<?= base_url('Home/database_edit?id=').$row->no; ?>' class='btn btn-primary btn-sm'>
													<span class="fa fa-edit"></span>
												</a>
												<a href='<?= base_url('Home/database_delete?id=').$row->no; ?>' data='<?= $row->no; ?>' class='btn btn-danger btn-sm item-delete'>
													<span class="fa fa-trash"></span>
												</a>
											</td>
											<td>
												<!-- COLLAPSE MENU -->
												<button class="btn btn-primary btn-sm form-control" type="button" data-toggle="collapse" data-target="#collapseExample<?= $row->no; ?>" aria-expanded="false" aria-controls="collapseExample">
												    <span class="fa fa-cog"></span>
												    <span class="fa fa-angle-down"></span>
												</button>
												<div class="collapse" id="collapseExample<?= $row->no; ?>">
													<a href='<?= base_url('Home/cover?id=').$row->no; ?>' class='btn btn-outline-info  btn-sm form-control'>
														<span class="fa fa-print"></span> Cover
													</a>
													<a href='<?= base_url('Home/tes_bahan?id=').$row->no; ?>' class='btn btn-outline-info btn-sm form-control'>
														<span class="fa fa-print"></span> Tes Bahan
													</a>
													<a href='<?= base_url('Home/database_edit?id=').$row->no; ?>' class='btn btn-outline-info btn-sm form-control'>
														<span class="fa fa-print"></span> Pengantar
													</a>
												</div>
												<!-- //COLLAPSE MENU -->
											</td>
											<td><?= $row->no; ?></td>
											<td><?= $row->tanggal; ?></td>
											<td><?= $row->kode_rekening; ?></td>
											<td><?= $row->nomor; ?></td>
											<td>
												<!-- COLLAPSE MENU -->
												<p class="text-center">
												  <button class="btn btn-outline-info btn-sm " type="button" data-toggle="collapse" data-target="#collapseKegiatan<?= $row->no; ?>" aria-expanded="false" aria-controls="collapseExample">
												    <span class="fa fa-eye"></span>
												  </button>
												</p>
												<div class="collapse" id="collapseKegiatan<?= $row->no; ?>">
													<?= $row->kegiatan; ?>
												</div>
												<!-- //COLLAPSE MENU -->
											</td>
											<td>
												<!-- COLLAPSE MENU -->
												<p class="text-center">
												  <button class="btn btn-sm btn-outline-info " type="button" data-toggle="collapse" data-target="#collapseAddress<?= $row->no; ?>" aria-expanded="false" aria-controls="collapseExample">
												    <span class="fa fa-eye"></span>
												  </button>
												</p>
												<div class="collapse" id="collapseAddress<?= $row->no; ?>">
													<?= $row->nama_lokasi; ?>
												</div>
												<!-- //COLLAPSE MENU -->
											</td>
											<td><?= $row->pelaksana; ?></td>
											<td><?= $row->singkatan_pelaksana; ?></td>
											<td><?= $row->jenis_pekerjaan; ?></td>
											<td><?= $row->pemborong; ?></td>
											<td><?= $row->wilayah; ?></td>
											<td><?= $row->abt; ?></td>
											<td><?= $row->kepala_uptd; ?></td>
											<td><?= $row->diambil; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
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

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#table1').DataTable({
			
		});
	});
</script>
<script type="text/javascript">
	//menampilkan modal dialog saat tombol hapus ditekan
    $('#table1').on('click', '.item-delete', function() {
    	if (confirm('Apakah anda ingin menghapus data ini?')) {
		  // Save it!
		} else {
		  // Do nothing!
		}
    });
</script>