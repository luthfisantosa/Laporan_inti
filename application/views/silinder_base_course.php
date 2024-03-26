<?php
	// master data static
	$botol[0] = array(
		'berat_pasir' => 1675,
		'berat_isiPasir' => 1.560,
		'berat_tanahBasah' => 2430,
		'd_maksimum' => 2.160,
		'kadar_air' => 4.18,
		'kadar_airOptimum' => 5.90
	);
	$botol[1] = array(
		'berat_pasir' => 1650,
		'berat_isiPasir' => 1.593,
		'berat_tanahBasah' => 2501,
		'd_maksimum' => 2.160,
		'kadar_air' => 4.13,
		'kadar_airOptimum' => 5.90
	);
	// Berat Pasir + Gelas + Corong
	$bpgc[0] = array(
		'titik1' => 7950,
		'titik2' => 7982
	);
	// Berat Sisa Pasir + Gelas + Corong
	$bspgc[0] =  array(
		'titik1' => 4546,
		'titik2' => 4516
	);
	// Berat Pasir di dalam + Corong + Lubang 
	$bpdcl[0] = array(
		'titik1' => $bpgc[0]['titik1']-$bspgc[0]['titik1'],
		'titik2' => $bpgc[0]['titik2']-$bspgc[0]['titik2'] 
	);
	// Berat Pasir di dalam Lubang
	$bpdl[0] = array(
		'titik1' => $bpdcl[0]['titik1']-$botol[0]['berat_pasir'],
		'titik2' => $bpdcl[0]['titik2']-$botol[1]['berat_pasir']
	);
	// Volume Tanah / Pasir dalam Lubang(cm³)
	$vtdl[0] = array(
		'titik1' => $bpdl[0]['titik1']/$botol[0]['berat_isiPasir'],
		'titik2' => $bpdl[0]['titik2']/$botol[1]['berat_isiPasir']
	);
	// Berat isi basah
	$bib[0] = array(
		'titik1' => $botol[0]['berat_tanahBasah']/$vtdl[0]['titik1'],
		'titik2' => $botol[1]['berat_tanahBasah']/$vtdl[0]['titik2']
	);
	// Berat Isi Kering ( ∂ d )
	$bik[0] = array(
		'titik1' => $bib[0]['titik1']/(100+$botol[0]['kadar_air'])*100,
		'titik2' => $bib[0]['titik2']/(100+$botol[1]['kadar_air'])*100
	);
	// Derajat Kepadatan dilapangan ( d )
	$dkd[0] = array(
		'titik1' => ($bik[0]['titik1']/$botol[0]['d_maksimum'])*100,
		'titik2' => ($bik[0]['titik2']/$botol[1]['d_maksimum'])*100
	);


?>
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
					    <a class="nav-link" href="<?= base_url('Home/tes_bahan'); ?>">Tes Bahan</a>
				  	</li>
				  	<li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Silinder</a>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item" href="<?= base_url('Home/silinder'); ?>">Kuat Tekan Beton</a>
					      	<a class="dropdown-item active" href="<?= base_url('Home/silinderBasecourse'); ?>">Base Course</a>
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
				<?php foreach($lastRow as $row): ?>
				<div class="container">
					<div class="form-group-sm">
						<div class="col-sm-9">
							<div class="d-inline-block float-right p-2">
								<button id="doPrint" class="btn btn-primary btn-sm cetak">
									<span class="fa fa-print"></span> Cetak
								</button>
							</div>
							<div class="d-inline-block float-right p-2">
								<input type="hidden" name="no_reg" readonly="" value="<?= $row->no; ?>" class="form-control form-control-sm">
								<select name="data_laporan" id="opsi_data" class="form-control form-control-sm" onchange="select_petugas()">
							     	<option value="<?= $row->no; ?>"><?= $row->no; ?></option>
							     	<option value="">---DATA---</option>
							     	<?php foreach($data_laporan as $x): ?>
							     		<option value="<?= $x->no; ?>"><?= $x->no; ?></option>
							     	<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<br><br><br><br>
					<div class="col-sm-9">
						<div class='canvas' id="printDiv" style="width:863px; border:3px solid; padding: 20px;">
							<!-- header -->
							<div class="row" style="font-weight: bolder; font-size: 30px;">
								<div class="col-sm-3">
									<img src="<?= base_url('assets/img/logo-krw.png'); ?>" style="width: 95px;position: absolute;">
								</div>
								<div class="col-sm-9 text-center" style="line-height: 100%;">
									<span>PEMERINTAH KABUPATEN KARAWANG</span>	<br>							
									<span>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</span><br>
									<span>UPTD LABORATORIUM BAHAN KONSTRUKSI</span>	<br>							
									<span style="font-size: 25px;font-weight: lighter;">Jalan Raya Kosambi KM. 14 Karawang</span>	
								</div>
							</div>
							<hr style="border-top: 10px double #8c8b8b;">
							<div class="row" style="font-weight: bolder; font-size: 25px;">
								<div class="col-sm-4"></div>
								<div class="col-sm-4 text-center">
									<u>PEMERIKSAAN KEPADATAN DI LAPANGAN DENGAN SAND CONE</u>
								</div>
								<div class="col-sm-4"></div>
							</div><br>
							<div class="row" style="font-size: 18px;">
								<div class="col-sm-12">
									<table cellpadding="2" >
										<tr style="vertical-align: top;text-align: left;">
											<td style="width:14%;">Kegiatan</td><td>:</td><td style="width: 50%;border-bottom: ;"><?= $row->kegiatan; ?></td>
											<td>Dikerjakan</td><td>:</td><td style="width: 20%;border-bottom: ;"></td><td> (.........)</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td>Lokasi</td><td>:</td><td style="border-bottom: ;" colspan="1"><?= $row->nama_lokasi; ?></td>
											<td>Dihitung</td><td>:</td><td style="border-bottom: ;"></td><td> (.........)</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td></td><td></td><td style="border-bottom: ;"></td>
											<td>Diperiksa</td><td>:</td><td style="border-bottom: ;"></td><td> (.........)</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;"> 
											<td>Jenis Contoh</td><td>:</td><td style="border-bottom: ;">Base Course</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td>Tanggal</td><td>:</td><td style="border-bottom: ;"><?= $row->tanggal; ?></td>
										</tr>										
									</table>
								</div>
							</div><br>
							<div class="row" style="font-size: 14px;">
								<div class="col-sm-12">
									<b>Botol 1</b>
									<table cellpadding="5" border="1">
										<tr>
											<td>No</td><td style="width:400px;">Nomor Test/STA</td>
											<td style="width:200px;">TITIK 1</td>
											<td style="width:200px;">TITIK 2</td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>1</td><td>Berat Pasir + Gelas + Corong <span class=''>(gr)</span></td>
											<td><?= $bpgc[0]['titik1']; ?></td>
											<td><?= $bpgc[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>2</td><td>Berat Sisa Pasir + Gelas + Corong <span class="pull-right">(gr)</span></td>
											<td><?= $bspgc[0]['titik1']; ?></td>
											<td><?= $bspgc[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>3</td><td>Berat Pasir di dalam + Corong + Lubang <span class="pull-right">(gr)</span></td>
											<td><?= $bpdcl[0]['titik1']; ?></td>
											<td><?= $bpdcl[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>4</td><td>Berat Pasir di dalam Corong <span class="pull-right">(gr)</span></td>
											<td><?= $botol[0]['berat_pasir']; ?></td>
											<td><?= $botol[0]['berat_pasir']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>5</td><td>Berat Pasir di dalam Lubang <span class="pull-right">(gr)</span></td>
											<td><?= $bpdl[0]['titik1']; ?></td>
											<td><?= $bpdl[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>6</td><td>Berat isi pasir (P) <span class="pull-right">(gr/cm2)</span></td>
											<td><?= $botol[0]['berat_isiPasir']; ?></td>
											<td><?= $botol[1]['berat_isiPasir']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>7</td><td>Volume Tanah / Pasir dalam Lubang <span class="pull-right">(cm³)</span></td>
											<td><?= $vtdl[0]['titik1']; ?></td>
											<td><?= $vtdl[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>8</td><td>Berat Tanah Basah <span class="pull-right">(cm³)</span></td>
											<td><?= $botol[0]['berat_tanahBasah']; ?></td>
											<td><?= $botol[1]['berat_tanahBasah']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>9</td><td>Berat isi Basah(t) <span class="pull-right">(gr/cm³)</span></td>
											<td><?= $bib[0]['titik1']; ?></td>
											<td><?= $bib[0]['titik1']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>10</td><td>Kadar Air ( W ) <span class="pull-right">(%)</span></td>
											<td><?= $botol[0]['kadar_air']; ?></td>
											<td><?= $botol[1]['kadar_air']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>11</td><td>Berat Isi Kering ( ∂ d ) <span class="pull-right">(gr/cm³)</span></td>
											<td><?= $bik[0]['titik1']; ?></td>
											<td><?= $bik[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>12</td><td>∂ d Maximum <span class="pull-right">(gr/cm³)</span></td>
											<td><?= $botol[0]['d_maksimum']; ?></td>
											<td><?= $botol[1]['d_maksimum']?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>13</td><td>Kadar Air ( W ) Optimum <span class="pull-right">(%)</span></td>
											<td><?= $botol[0]['kadar_airOptimum']; ?></td>
											<td><?= $botol[1]['kadar_airOptimum']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>14</td><td>Derajat Kepadatan dilapangan ( d ) <span class="pull-right">(%)</span></td>
											<td><?= $dkd[0]['titik1']; ?></td>
											<td><?= $dkd[0]['titik2']; ?></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
									</table>
									<br><br><br>
									<table cellpadding="5" border="1">
										<tr>
											<td>No</td><td style="width:400px;">Nomor Test/STA</td>
											<td style="width: 200px;"></td>
											<td style="width: 200px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>1</td><td>Berat Pasir + Gelas + Corong <span class="pull-right">(gr)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>2</td><td>Berat Sisa Pasir + Gelas + Corong <span class="pull-right">(gr)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>3</td><td>Berat Pasir di dalam + Corong + Lubang <span class="pull-right">(gr)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>4</td><td>Berat Pasir di dalam Corong <span class="pull-right">(gr)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>5</td><td>Berat Pasir di dalam Lubang <span class="pull-right">(gr)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>6</td><td>Berat Isi Pasir ( P ) <span class="pull-right">(gr/cm³)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>7</td><td>Volume Tanah / Pasir dalam Lubang <span class="pull-right">(cm³)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>8</td><td>Berat Tanah Basah <span class="pull-right">(gr)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>9</td><td>Berat Isi Basah ( t ) <span class="pull-right">(gr/cm³)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>10</td><td>Kadar Air ( W ) <span class="pull-right">(%)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>11</td><td>Berat Isi Kering ( ∂ d ) <span class="pull-right">(gr/cm³)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>12</td><td>∂ d Maximum <span class="pull-right">(gr/cm³)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>13</td><td>Kadar Air ( W ) Optimum <span class="pull-right">(%)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
										<tr>
											<td>14</td><td>Derajat Kepadatan dilapangan ( d ) <span class="pull-right">(%)</span></td>
											<td></td>
											<td></td>
											<td style="width: 50px;"></td><td style="width: 50px;"></td><td style="width: 50px;"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br> <!-- page 2 -->
				<div class="container">
					<div class="col-sm-9">
						<div class='canvas' id="printDiv2" style="width:863px; border:3px solid; padding: 20px;">
							<!-- header -->
							<div class="row" style="font-weight: bolder; font-size: 30px;">
								<div class="col-sm-3">
									<img src="<?= base_url('assets/img/logo-krw.png'); ?>" style="width: 95px;position: absolute;">
								</div>
								<div class="col-sm-9 text-center" style="line-height: 100%;">
									<span>PEMERINTAH KABUPATEN KARAWANG</span>	<br>							
									<span>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</span><br>
									<span>UPTD LABORATORIUM BAHAN KONSTRUKSI</span>	<br>							
									<span style="font-size: 25px;font-weight: lighter;">Jalan Raya Kosambi KM. 14 Karawang</span>	
								</div>
							</div>
							<hr style="border-top: 10px double #8c8b8b;">
							<div class="row" style="font-weight: bolder; font-size: 25px;">
								<div class="col-sm-4"></div>
								<div class="col-sm-4 text-center">
									<u>REKAPITULASI TEST KEPADATAN LAPANGAN</u>
								</div>
								<div class="col-sm-4"></div>
							</div><br>
							<div class="row" style="font-size: 18px;">
								<div class="col-sm-12">
									<table cellpadding="2">
										<tr style="vertical-align: top;text-align: left;">
											<td style="width:14%;">Kegiatan</td><td>:</td><td style="width: 50%;border-bottom: ;"><?= $row->kegiatan; ?></td>
											<td>Dikerjakan</td><td>:</td><td style="width: 20%;border-bottom: ;"></td><td> (.........)</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td>Lokasi</td><td>:</td><td style="border-bottom: ;" colspan="1"><?= $row->nama_lokasi; ?></td>
											<td>Dihitung</td><td>:</td><td style="border-bottom:;"></td><td> (.........)</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td></td><td></td><td style="border-bottom: ;"></td>
											<td>Diperiksa</td><td>:</td><td style="border-bottom: ;"></td><td> (.........)</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td>Jenis Contoh</td><td>:</td><td style="border-bottom: ;">Base Course</td>
										</tr>
										<tr style="vertical-align: top;text-align: left;">
											<td>Tanggal</td><td>:</td><td style="border-bottom: ;"><?= $row->tanggal; ?></td>
										</tr>										
									</table>
								</div>
							</div><br>
							<div class="row" style="font-size: 14px;">
								<div class="col-sm-12">
									<table cellpadding="5" border="1" class="text-center">
										<thead>
											<tr>
												<td rowspan="2">No</td>
												<td style="width:200px;" rowspan="2">STA</td>
												<td style="width:200px;" rowspan="2">Berat Isi Basah (gr/cm³)</td>
												<td style="width:100px;" rowspan="2">Kadar Air %</td>
												<td style="width:100px;" rowspan="2">Berat Isi Kering (gr/cm³)</td>
												<td colspan="2">Test Laboratorium</td>
												<td style="width:100px;" rowspan="2">Kepadatan %</td>
											</tr>
											<tr>
												<td style="width:100px;" >d Max (gr/cm³)</td>
												<td style="width:100px;" >Kadar Air %</td>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;?>
											<?php foreach ($botol as $row2): ?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= 'TITIK'.$i; ?></td>
													<td><?= $bib[0]['titik'.$i];?></td>
													<td><?= $botol[$i-1]['kadar_air'];?></td>
													<td><?= $bik[0]['titik'.$i];?></td>
													<td><?= $botol[$i-1]['d_maksimum'];?></td>
													<td><?= $botol[$i-1]['kadar_airOptimum'];?></td>
													<td><?= $dkd[0]['titik'.$i];?></td>
												</tr>
												<?php $i++;?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="col-sm-12">
									<p class="text-right">Karawang, <?= $row->tanggal; ?></p>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="col-sm-12">
									<table>
										<tr>
											<td>1.</td>
											<td>Pelaksana Lapangan</td>
											<td>(.............................)</td>
										</tr>
										<tr>
											<td>2.</td>
											<td>Pengawas Lapangan</td>
											<td>(.............................)</td>
										</tr>
										<tr>
											<td>3.</td>
											<td>Petugas Laboratorium</td>
											<td>(.............................)</td>
										</tr>
									</table>
								</div>
							</div>
							<br><br><br><br>
							<div class="row">
								<div class="col-sm-12 text-center">
									<b>Mengetahui :</b>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="col-sm-12 text-center">
									<table>
										<tr>
											<td style="width:50%;">
												<span>Pejabat Pembuat Komitmen</span>
												<br><br><br><br><br><br>
												___________________
											</td>
											<td></td>
											<td style="width:50%;">
												<span>Kepala UPTD Laboratorium Bahan Konstruksi<br>
												Dinas Pekerjaan Umum dan Penataan Ruang<br>
												Kabupaten Karawang</span>
												<br><br><br><br>
												<b><u><?= $row->kepala_uptd; ?></u>
												<br><?= $kepala->nip; ?></b>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById("doPrint").addEventListener("click", function() {
		     var printContents = document.getElementById('printDiv').innerHTML;
		     var printContents2 = document.getElementById('printDiv2').innerHTML;
		     var originalContents = document.body.innerHTML;
		     document.body.innerHTML = printContents+'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>'+printContents2;
		     window.print();
		     document.body.innerHTML = originalContents;
		});

		$('#opsi_data').change(function(){
			var val = $('#opsi_data').val();
			if (val == '') {
				location.replace("<?= base_url('Home/silinderBaseCourse'); ?>");
			}else{
				location.replace("<?= base_url('Home/silinderBaseCourse?id='); ?>"+val);
			}
		});
	});
</script>
