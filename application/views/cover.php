<div class=" pt-5 pb-5 p-5">
	<div class="col col-sm-12">
		<div class="card">
			<div class="card card-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Data</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $title; ?> </li>
				</ol>
			</div>
			<div class="card card-body">
				<ul class="nav nav-tabs">
				  	<li class="nav-item">
				    	<a class="nav-link" aria-current="page" href="<?= base_url('Home/'); ?>">Pengantar</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link active" href="<?= base_url('Home/cover'); ?>">Cover</a>
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
				<br><br>
				<div class="form-group-sm">
					<?php
						foreach ($lastRow as $row) {
					?>
					<div class="d-inline-block">
						<small>NO REG</small>
						<input type="text" name="no_reg" readonly="" value="<?= $row->no; ?>" class="form-control form-control-sm">
					</div>
					<div class="d-inline-block">
						<button id="doPrint" class="btn btn-primary btn-sm ">
							<span class="fa fa-print"></span> Cetak
						</button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-9">
						<div id="printDiv" class="card card-body border" style="width: 216mm;height: 356mm;font-family: 'Times New Roman', Times, serif" class="printArea">
							<!-- header -->
							<div class="row" style="font-weight: bolder; font-size: 30px;">
								<div class="col-sm-2">
									&nbsp;&nbsp;&nbsp;
									<img src="<?= base_url('assets/img/logo-krw.png'); ?>" style="width: 95px;position: absolute;">
								</div>
								<div class="col-sm-10 text-center" style="line-height: 100%;">
									<span>PEMERINTAH KABUPATEN KARAWANG</span>	<br>							
									<span>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</span><br>
									<span>UPTD LABORATORIUM BAHAN KONSTRUKSI</span>	<br>							
									<span style="font-size: 25px;font-weight: lighter;">Jalan Raya Kosambi KM. 14 Karawang</span>	
								</div>
							</div>
							<hr style="border-top: 10px double #8c8b8b;">
							<!-- watermark -->
							<img src="<?= base_url('assets/img/watermark-pupr.png'); ?>" class="watermark">
							<?php 
								for($i=0;$i<42;$i++){
									echo "<br>";
								}
							?>
							<!-- footer -->
							<div class="row">
								<div class="col-sm-12">
									<div class="text-center font-weight-bold">
										<strong style="line-height: 90%;font-size: 25px;">
											LAPORAN HASIL PENGUJIAN TEST LAPANGAN<br>								
											KEGIATAN <?= strtoupper($row->kegiatan); ?><br>
											LOKASI <?= strtoupper($row->wilayah); ?><br>
											KABUPATEN KARAWANG TAHUN ANGGARAN <?= substr($row->tanggal, -4); ?>
											<hr>
											PELAKSANA : <?= strtoupper($row->pelaksana); ?> </span><br>
											<?= strtoupper($row->kode_rekening); ?>
										</strong>
									</div>
								</div>
							<?php
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script>
	function displayResult() {
		var select = document.getElementById('kegiatan');
		var value = select.options[select.selectedIndex].value;
		var select2 = document.getElementById('nama_lokasi');
		var value2 = select2.options[select.selectedIndex].value;
		var select3 = document.getElementById('pelaksana');
		var value3 = select3.options[select.selectedIndex].value;
		var select4 = document.getElementById('rekening');
		var value4 = select4.options[select.selectedIndex].value;

	  	document.getElementById("_kegiatan").innerHTML = value.toUpperCase();
	  	document.getElementById("_lokasi").innerHTML = value2.toUpperCase();
	  	document.getElementById("_pelaksana").innerHTML = value3.toUpperCase();
	  	document.getElementById("_rekening").innerHTML = value4.toUpperCase();
	}
</script>


<script type="text/javascript">
	document.getElementById("doPrint").addEventListener("click", function(e) {
		e.preventDefault(); // Prevent the default behavior
	    var printContents = document.getElementById('printDiv').innerHTML;
	    var originalContents = document.body.innerHTML;
	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
	});
</script>