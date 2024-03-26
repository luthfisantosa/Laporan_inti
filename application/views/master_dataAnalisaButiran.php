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
					      	<a class="dropdown-item" href="<?= base_url('Master_data/master_dataDetailHotmix'); ?>">Detail hotmix</a>
					      	<a class="dropdown-item active" href="<?= base_url('Master_data/master_dataAnalisaButiran'); ?>">Analisa Butir</a>
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
							<th>UKURAN SARINGAN</th>
							<th>TERTAHAN SARINGAN</th>
							<th>JUMLAH TERTAHAN</th>
							<th>TERTAHAN</th>
							<th>LOLOS</th>
							<th>SPEC</th>
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

<script type="text/javascript">
	$(document).ready(function () {	
		$('#data_detail').DataTable({
			ajax: {
				url: '<?= base_url('Master_data/ajax_AnalisaButiran'); ?>',
				dataSrc: '',
			},
			columns: [
				{ data: 'id'},
				{ data: 'jenis', width: '200px'},
				{ data: 'ukuran_saringan' },
				{ data: 'tertahan_saringan' },
				{ data: 'jumlah_tertahan' },
				{ data: 'tertahan' },
				{ data: 'lolos' },
				{ data: 'spec', width: '100px' }
			]
		});
	});
</script>