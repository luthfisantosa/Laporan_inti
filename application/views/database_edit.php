<div class="pt-5 pb-5 p-5">
	<div class="col col-sm-12">
		<div class="card">
			<div class="card card-header">
				<p class="card-title">
					Edit Database 
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
	                <?php if ($this->session->flashdata('message')) :
	                    echo $this->session->flashdata('message');
	                endif; ?>
	                <?php foreach($data_row as $row) : ?>

                </p>
			</div>


			<div class="card card-body">
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" aria-current="page" href="#">Edit Data</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="<?= base_url('Home/cover'); ?>">Cover</a>
				  </li>
				  <li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Silinder</a>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item" href="<?= base_url('Home/silinder'); ?>">Kuat Tekan Beton</a>
					      	<a class="dropdown-item" href="#">Link 2</a>
					      	<a class="dropdown-item" href="#">Link 3</a>
					    </div>
					</li>
				  <li class="nav-item">
					    <a class="nav-link" href="<?= base_url('Home/tes_bahan'); ?>">Tes Bahan</a>
				  </li>
				  <li class="nav-item">
					    <a class="nav-link" href="<?= base_url('Home/database'); ?>">Database</a>
				  </li>
				</ul>
				<br>

				<form action="<?= base_url('Home/printPreview'); ?>" method="POST">
					<input type="hidden" name="edit" value="edit">
					<div class="form-group row">
					   	<label for="no_reg" class="col-sm-2 col-form-label">No. REG</label>
					   	<div class="col-sm-1">
					     	<input type="text" class="form-control form-control-sm disable" id="no_reg" name="no_reg" value="<?= $row->no; ?>" readonly>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="tanggal" class="col-sm-2 col-form-label">TANGGAL</label>
					   	<div class="col-sm-3">
					     	<div class="input-group date" data-provide="datepicker" required pattern="\d{4}-\d{2}-\d{2}">
							    <input type="text" class="form-control" name="tanggal" value="<?= $row->tanggal; ?>" readonly>
							</div>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="kegiatan" class="col-sm-2 col-form-label">KEGIATAN</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="kegiatan" name="kegiatan" value="<?= $row->kegiatan; ?>">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="no_laporan" class="col-sm-2 col-form-label">NO. LAPORAN</label>
					   	<div class="col-sm-3">
					     	<select name="nomor" id="nomor" class="form-control form-control-sm">
								<option value="<?= $row->nomor; ?>"><?= $row->nomor; ?></option>
								<?php
									foreach ($data_all as $sub_row) {
										echo "<option value='".$sub_row->nomor."'>".$sub_row->nomor." ( ".$sub_row->jenis." )</option>";
									}
								?>
							</select>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="kode_rekening" class="col-sm-2 col-form-label">KODE REKENING</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="rekening" name="kode_rekening" value="<?= $row->kode_rekening; ?>">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="lokasi" class="col-sm-2 col-form-label">LOKASI</label>
					   	<div class="col-sm-3">
					     	<textarea class="form-control form-control-sm" id="lokasi" name="lokasi" value="" rows="4"><?= $row->nama_lokasi; ?></textarea>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="pelaksana" class="col-sm-2 col-form-label">PELAKSANA</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="pelaksana" name="pelaksana" value="<?= $row->pelaksana; ?>">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="singkatan" class="col-sm-2 col-form-label">SINGKATAN</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="singkatan" name="singkatan" value="<?= $row->singkatan_pelaksana; ?>" readonly>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="jenis_pekerjaan" class="col-sm-2 col-form-label">JENIS PEKERJAAN</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="jenis_pekerjaan" name="jenis_pekerjaan" value="<?= $row->jenis_pekerjaan; ?>">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="pemborong" class="col-sm-2 col-form-label">PEMBORONG</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="pemborong" name="pemborong" value="<?= $row->pemborong; ?>">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="wilayah" class="col-sm-2 col-form-label">WILAYAH</label>
					   	<div class="col-sm-3">
					     	<input type="text" class="form-control form-control-sm" id="wilayah" name="wilayah" value="<?= $row->wilayah; ?>">
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="abt" class="col-sm-2 col-form-label">ABT</label>
					   	<div class="col-sm-3">
					     	<select name="abt" id="abt" class="form-control form-control-sm">
					     		<option value="<?= $row->abt; ?>"><?= $row->abt; ?></option>
					     		<option value=""> </option>
								<option value="(abt)">(abt)</option>
							</select>
					   	</div>
					</div>
					<div class="form-group row">
					   	<label for="kepala" class="col-sm-2 col-form-label">KEPALA UPTD</label>
					   	<div class="col-sm-3">
					     	<select name="kepala" id="kepala" class="form-control form-control-sm">
					     		<option value="<?= $row->kepala_uptd; ?>"><?= $row->kepala_uptd; ?></option>
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
					   	<div class="col-sm-10">
					     	<input type="submit" class="btn btn-primary btn-sm" id="submit" name="submit" value="PRINT/SAVE">
					     	<!-- <a href="" class="btn btn-primary btn-sm"><span class="fa fa-print"></span> PRINT</a> -->
					   	</div>
					</div>								
				</form>
				<?php endforeach; ?>
			</div>
			<div class="card card-footer">
				<div class="alert alert-info">
				  <strong>Note</strong> : 
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.getElementById("doPrint").addEventListener("click", function() {
		$('.datepicker').datepicker({
		    startDate: '-3d'
		});
	});
	
</script>

