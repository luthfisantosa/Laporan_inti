<div class="pt-5 pb-5 p-5">
	<div class="col col-sm-12">
		<div class="card">
			<div class="card card-header">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Data</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title; ?> </li>
					</ol>
				</nav>
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
					    <a class="nav-link active" href="<?= base_url('Home/tes_bahan'); ?>">Tes Bahan</a>
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
						foreach ($lastRow as $row) :
					?>
					<div class="d-inline-block">
						<small>NO REG</small>
						 <input type="text" name="no_reg" readonly="" value="<?= $row->no; ?>" class="form-control form-control-sm">
					</div>
					<div class="d-inline-block">
						<button id="doPrint" class="btn btn-primary btn-sm">
								<span class="fa fa-print"></span> Cetak
							</button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-9">
						<div id="printDiv" class="card card-body " style="width: 216mm;height: 356mm;font-family: 'Times New Roman', Times, serif; font-size: 14px; border-style: double;">
							<!-- header -->
							<div class="row" style="font-weight: bolder; font-size: 30px;">
								<div class="col-sm-12 text-center" style="line-height: 100%;">
									HASIL PENGUJIAN BAHAN BASE COURSE (LPA)	
									<span>KEGIATAN <?= strtoupper($row->kegiatan); ?></span><br>
									<span>"LOKASI <?= strtoupper($row->nama_lokasi); ?> "</span><br>
									<span>KABUPATEN KARAWANG TAHUN ANGGARAN <?= substr($row->tanggal, -4); ?>	</span><br>
									<span style="font-size: 25px;font-weight: lighter;">Jalan Raya Kosambi KM. 14 Karawang</span>	
								</div>
							</div>
							<hr style="border-top: 10px double #8c8b8b;">
							<br>
							<strong>I. PENDAHULUAN</strong>
							<br>
							<p style="text-indent: 30px;">
									Hasil Pengujian ini dibuat berdasarkan atas contoh bahan Base Course yang akan dipergunakan	untuk Lapisan Pondasi Atas (LPA) Kegiatan <?= $row->kegiatan; ?> Lokasi <?= $row->nama_lokasi; ?>  Kabupaten Karawang Tahun Anggaran <?= substr($row->tanggal, -4); ?> yang dilaksanakan oleh :
							</p>
							<br><br><br>
							<span style="text-indent: 25px;">Jenis pengujian yang dilaksanakan di Laboratorium adalah :</span>
							<ol type="a">
								<li> Analisa Saringan</li>
								<li> Atterberg limit</li>
								<li> Berat Jenis</li>
								<li> Abrasi</li>
								<li> Pemadatan Modified</li>
								<li> CBR rendaman</li>
							</ol>

							<br><br>
							<strong>II. HASIL PENGUJIAN</strong>
							<br>
							<p style="text-indent: 30px;">
									Dan hasil pengujian di Laboratorium terhadap contoh bahan tersebut, didapat hasil sebagai berikut :
							</p>
							<br><br>
							<p style="text-indent: 30px;">
									Rekapitulasi ......................................................
							</p>
							<!-- footer -->
							<div style="padding-bottom: 50%;">
								
							</div>
							<?php
								endforeach; 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.getElementById("doPrint").addEventListener("click", function() {
	     var printContents = document.getElementById('printDiv').innerHTML;
	     var originalContents = document.body.innerHTML;
	     document.body.innerHTML = printContents;
	     window.print();
	     document.body.innerHTML = originalContents;
	});
</script>