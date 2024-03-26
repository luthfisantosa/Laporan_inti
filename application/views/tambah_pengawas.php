<div class="container p-5">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('Master_data/'); ?>">Data Petugas Lab</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah Petugas Lab</li>
		</ol>
	</nav>
	<div class="card">
		<div class="card card-header">
			<a href="<?= base_url('Master_data/data_pengawas'); ?>">
				<span class="fa fa-chevron-left"></span> Back
			</a>
			
			<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
            <?php if ($this->session->flashdata('message')) :
                echo $this->session->flashdata('message');
            endif; ?>
		</div>
		<div class="card card-body">
			<form action="<?= base_url('Master_data/save_pengawas'); ?>" method="POST" name="tambah_pengawas" onsubmit="return checkInp()">
				<input type="hidden" name="date_created" value="<?= date('d/m/Y g:i a'); ?>" class="form-control form-control-sm">
				<div class="form-group row">
					<label for="id" class="col-sm-2 col-form-label">ID JENIS LAPORAN</label>
					<div class="col-sm-3">
						<input type="text" name="id" value="<?= $last_id+1; ?>" class="form-control form-control-sm" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="jenis" class="col-sm-2 col-form-label">NIP</label>
					<div class="col-sm-8">
						<input type="text" name="nip" value="" class="form-control form-control-sm" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nomor" class="col-sm-2 col-form-label">NAMA</label>
					<div class="col-sm-8">
						<input type="text" name="nama" value="" class="form-control form-control-sm" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nomor" class="col-sm-2 col-form-label">Wilayah</label>
					<div class="col-sm-8">
						<input type="text" name="wilayah" value="" class="form-control form-control-sm" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="submit" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-2">
						<input type="submit" name="submit" value="ADD" class="form-control form-control-sm btn-sm btn-primary" required>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>