<div class="pt-5 pb-5 p-5">
	<div class="col col-sm-12">
		<div class="card">
			<div class="card card-header">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Data</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?=$title; ?></li>
					</ol>
				</nav>
				<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
			</div>
			<div class="card card-body">
				<ul class="nav nav-tabs">
				  	<li class="nav-item">
				    	<a class="nav-link active" aria-current="page" href="<?= base_url('Home/'); ?>">Pengantar</a>
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
					    <a class="nav-link" href="<?= base_url('Home/tes_kubus'); ?>">Tes Kubus</a>
				  	</li>
				  	<li class="nav-item">
					    <a class="nav-link" href="<?= base_url('Home/database'); ?>">Database</a>
				  	</li>
				</ul>
				<br>
				<form action="<?= base_url('Home/printPreview'); ?>" method="POST">
					<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
					<div class="form-group row">
					   	<label for="no_reg" class="col-sm-2 col-form-label">No. REG</label>
					   	<div class="col-sm-1">
					     	<input type="text" class="form-control form-control-sm disable" id="no_reg" name="no_reg" value="<?= $data_no; ?>" readonly>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="kegiatan" class="col-sm-2 col-form-label">KEGIATAN</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="kegiatan" name="kegiatan">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="no_laporan" class="col-sm-2 col-form-label">NO. LAPORAN</label>
					   	<div class="col-sm-3">
					     	<select name="nomor" id="nomor" class="form-control form-control-sm">
								<option value="">--- Pilih Nomor Laporan ---</option>
								<?php
									foreach ($data_all as $row) {
										echo "<option value='".$row->nomor."'>".$row->nomor." ( ".$row->jenis." )</option>";
									}
								?>
							</select>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="kode_rekening" class="col-sm-2 col-form-label">KODE REKENING</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="rekening" name="kode_rekening">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="lokasi" class="col-sm-2 col-form-label">LOKASI</label>
					   	<div class="col-sm-3">
					     	<textarea class="form-control form-control-sm text-area" id="lokasi" name="lokasi" rows="4"></textarea>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="pelaksana" class="col-sm-2 col-form-label">PELAKSANA</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="pelaksana" name="pelaksana">
					   	</div>
					</div>
					<!-- <div class="form-group row">
					   	<label for="singkatan" class="col-sm-2 col-form-label">SINGKATAN</label>
					   	<div class="col-sm-10">
					     	<input type="text" class="form-control form-control-sm" id="singkatan" name="singkatan">
					   	</div>
					</div> -->
					<div class="form-group row">
					   	<label for="jenis_pekerjaan" class="col-sm-2 col-form-label">JENIS PEKERJAAN</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="jenis_pekerjaan" name="jenis_pekerjaan">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="pemborong" class="col-sm-2 col-form-label">PEMBORONG</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="pemborong" name="pemborong">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="wilayah" class="col-sm-2 col-form-label">WILAYAH</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="wilayah" name="wilayah">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="abt" class="col-sm-2 col-form-label">ABT</label>
					   	<div class="col-sm-3">
					     	<select name="abt" id="abt" class="form-control form-control-sm">
					     		<option value=""> </option>
								<option value="(abt)">(abt)</option>
							</select>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="kepala" class="col-sm-2 col-form-label">KEPALA UPTD</label>
					   	<div class="col-sm-3">
					     	<select name="kepala" id="kepala" class="form-control form-control-sm">
								<?php
									foreach ($data_kepala as $row) {
										echo "<option value='".$row->nama."'>".$row->nama."</option>";
									}
								?>
							</select>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="" class="col-sm-2 col-form-label"></label>
					   	<div class="col-sm-3">
					     	<input type="submit" class="btn btn-success btn-sm" id="submit" name="submit" value="PRINT">
					     	<!-- <a href="" class="btn btn-primary btn-sm"><span class="fa fa-print"></span> PRINT</a> -->
					   	</div>
					</div>								
				</form>
				
			</div>
			<div class="card card-footer">
				<div class="alert alert-info">
				  <strong>Note</strong> : 
				</div>
			</div>
		</div>
	</div>
</div>

