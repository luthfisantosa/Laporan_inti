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
					      	<a class="dropdown-item" href="<?= base_url('Home/silinderBasecourse'); ?>">Base Course</a>
					      	<a class="dropdown-item active" href="<?= base_url('Home/hotmix'); ?>">Hotmix</a>
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
								<select name="data_petugas" id="opsi_petugas" class="form-control form-control-sm" >
							     	<option value="">---Petugas Lab---</option>
							     	<?php foreach($petugas as $r_petugas): ?>
							     		<option value="<?= $r_petugas->id_petugasLab; ?>"><?= $r_petugas->nama; ?></option>
							     	<?php endforeach; ?>
								</select>
							</div>
							<div class="d-inline-block float-right p-2">
								<select name="data_laporan" id="opsi_analisa" class="form-control form-control-sm" >
							     	<option value="">---JENIS ANALISA BUTIRAN---</option>
							     	<?php foreach($data_analisa as $r_analisa): ?>
							     		<option value="<?= $r_analisa->jenis; ?>"><?= $r_analisa->jenis; ?></option>
							     	<?php endforeach; ?>
								</select>
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
					<div class="row">
						<div class="col-sm-9">
							<div class='canvas' id="printDiv" style="width:975px;height:700px  ;border:3px solid">
								<div class="row">
									<div class="col-sm-6">
										<table cellpadding="2" style="vertical-align:center;">
									  		<tr>
									  			<td>
									  				<img src="<?= base_url('assets/img/logo-krw.png'); ?>" style="width: 50px;">
									  			</td>
									  			<td>
									  				<p class="text-center font-weight-bold" style="font-size:12px;">PEMERINTAH KABUPATEN KARAWANG <br>
													DINAS PEKERJAAN UMUM DAN PENATAAN RUANG <br>
													UPTD LABORATORIUM BAHAN KONSTRUKSI</p>
									  			</td>
									  		</tr>
									  	</table>
									</div>						  	
								</div>
								<div class="row" style="font-size:11px;">
									<div class="col-sm-12">
										<table cellpadding="0">
											<tr>
												<td style="width: 100px;">Kegiatan</td><td style="border-bottom:1px solid;width: 300px;"><?= $row->kegiatan; ?></td>
											</tr>
											<tr>
												<td style="width: 100px;vertical-align: top;text-align: left;">Lokasi</td><td style="border-bottom:1px solid;width: 300px;"><?= $row->nama_lokasi; ?></td>
											</tr>
											<tr>
												<td style="width: 100px;">Contoh</td><td style="border-bottom:1px solid;width: 300px;">Hotmix AC. WC AMP PT. SUMBER BATU </td>
											</tr>
											<tr>
												<td style="width: 100px;">Tanggal</td><td style="border-bottom:1px solid;width: 300px;"> </td>
											</tr>
											<tr>
												<td style="width: 100px;">Pelaksana</td><td style="border-bottom:1px solid;width: 300px;"><?= $row->pelaksana; ?></td>
											</tr>
										</table>
									</div>
								</div>
								<br>
								<div class="row" style="font-size:10px;">
									<div class="col-sm-5">
										<table rowpadding="0">
											<tbody id="tbl_detail">
												
											</tbody>
										</table>
									</div>
									<div class="col-sm-7">
										<p style="font-size:12px;font-weight: bold; text-align:center;"><u>PEMERIKSAAN EXTRAKSI ASPAL</u></p>
									</div>
								</div>
								<div class="row" style="font-size:11px;">
									<div class="col-sm-5">
										<table border="0px" style="text-align: center;" cellpadding="1">
											<thead>
												<tr>
													<td colspan="6" style="border-top:none;"><b>ANALISA BUTIRAN</b></td>
												</tr>
												<tr>
													<td style="border:1px solid;">Ukuran Saringan</td>
													<td style="border:1px solid;">Tertahan Saringan</td>
													<td style="border:1px solid;">Jumlah Tertahan</td>
													<td style="border:1px solid;">% Tertahan</td>
													<td style="border:1px solid;">% Lolos</td>
													<td style="border:1px solid;">Spec</td>
												</tr>
											</thead>
											<tbody id="tbl_analisa">
												
											</tbody>
										</table>
									</div>
									<div class="col-sm-7">
										<div class="row">
											<div class="col-12">
												<!-- CHART AREA -->
												<center><b>GRAFIK ANALISIS BUTIRAN</b></center>
												<img id="url" / width="100%" height="160">
												<br>
												<p id="test1"></p>
												<p id="test2"></p>
												<p id="test3"></p>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<center>
													<table>
														<tr>
															<td style="text-align:center;width: 300px;">
																Mengetahui :<br>
																Kepala UPTD Laboratorium Bahan Kontruksi<br>
																Dinas Pekerjaan Umum Dan Penataan Ruang<br>	
																Kabupaten Karawang<br><br><br><br>
																<b><?= $row->kepala_uptd; ?></b><br>
																<?= $kepala->nip; ?>
															</td>
															<td style="text-align:center;vertical-align: top;">
																Karawang, <?= $row->tanggal; ?> <br>
																Petugas Laboratorium <br><br><br><br><br><br>
																<span id="_petugas"></span>
															</td>
														</tr>
													</table>
												</center>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<canvas id="analisaButiranChart" width="400" height="160"></canvas>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="card card-footer">
				<center>NOTE : Jika tombol cetak tidak berfungsi, silahkan refresh browser/ tekan F5</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// IMPORTANT!!! CHART NEED TO CHANGE TO IMAGE TO BE VISIBLE AT PRINTING!! <<
	function done(){
	  var url=myChart.toBase64Image();
	  document.getElementById("url").src=url;
	  // document.getElementById('analisaButiranChart').remove();
	}

	var options = {
		family : "Times New Roman",
		plugins: {
            title: {
                display: true,
                text: ''
            }
        },
	  	bezierCurve : false,
		animation: {
		  onComplete: done
		}
	};

	let label = [];
	let data1 = [];
	let data2 = [];
	let data3 = [];

	// Any of the following formats may be used
	const ctx = document.getElementById('analisaButiranChart').getContext('2d');
	const myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	    	responsive:true,
	        labels: label,
	        // ['200', '100', '50', '30', '16', '8','4','3/8','1/2','3/4','1','1 1/2'],
	        datasets: [
	        {
	            label: 'Spesifikasi',
	            data:data1,
	            // [0,4,6,9,14,21,33,53,77,90,100,null,null],
	            borderColor: 'rgb(255,0,0)',
	            borderWidth: 1
	        },
	        {
	            label: 'data 2',
	            data: data2,
	            // [0,9,15,22,30,40,53,69,90,100,100,null,null],
	            borderColor: 'rgb(0,255,0)',
	            borderWidth: 1
	        },
	        {
	            label: 'data 3',
	            data: data3,
	            // [0,6.99,13.21,18.64,21.35,26.7,44.41,58.36,80.63,94.01,100,null,null],
	            borderColor: 'rgb(0,0,255)',
	            borderDash: [2]
	        }],
	        fill: false,
	        borderColor: 'rgb(75, 192, 192)',
	        tension: 0.1
	    },
	    options: options
	});


	document.getElementById("doPrint").addEventListener("click", function() {

		var css = '@page { size: landscape; }',
		head = document.head || document.getElementsByTagName('head')[0],
		style = document.createElement('style');

		style.type = 'text/css';
		style.media = 'print';

		if (style.styleSheet){
		  style.styleSheet.cssText = css;
		} else {
		  style.appendChild(document.createTextNode(css));
		}
		head.appendChild(style);

	    var printContents = document.getElementById('printDiv').innerHTML;
	    var originalContents = document.body.innerHTML;
	    document.body.innerHTML = printContents;

	    window.print();
	    document.body.innerHTML = originalContents;
	});

	$('#opsi_data').change(function(){
			var val = $('#opsi_data').val();
			if (val == '') {
				location.replace("<?= base_url('Home/hotmix'); ?>");
			}else{
				location.replace("<?= base_url('Home/hotmix?id='); ?>"+val);
			}
		});

	$('#opsi_analisa').change(function(){
			var val = $('#opsi_analisa').val();
			$.ajax({
				url: "<?php echo base_url('Home/view_hotmix_detail?id=');?>"+val,
				type: "POST",
				cache: false,
				success: function(data){
					//alert(data);
					$('#tbl_detail').html(data); 
				}
			});
			$.ajax({
				url: "<?php echo base_url('Home/view_analisaButiran?id=');?>"+val,
				type: "POST",
				cache: false,
				success: function(data){
					//alert(data);
					$('#tbl_analisa').html(data); 
				}
			});
			$.ajax({
				url: "<?php echo base_url('Home/view_hotmix_detailForChart?id=');?>"+val,
				type: "POST",
				cache: false,
				success: function(data){
					//alert(data);
					var data = data.split('|');
					data1 = data[0].split(',');
					data2 = data[1].split(',');
					data3 = data[2].split(',');
					label1 = data[3].split(',');
					myChart.data.datasets[0].data = data1;
					myChart.data.datasets[1].data = data2;
					myChart.data.datasets[2].data = data3;
					myChart.data.labels = label1;
					myChart.update();
				}
			});
		});

	$('#opsi_petugas').change(function(){
			var val = $('#opsi_petugas').val();
			$.ajax({
				url: "<?php echo base_url('Home/ajax_getPetugas?id=');?>"+val,
				type: "POST",
				cache: false,
				success: function(data){
					//alert(data);
					$('#_petugas').html(data); 
				}
			});
		});
</script>

