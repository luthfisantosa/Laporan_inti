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
					      	<a class="dropdown-item active" href="<?= base_url('Home/silinder'); ?>">Kuat Tekan Beton</a>
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
				<div class="container">
					<div class="form-group-sm">
						<?php
							foreach ($lastRow as $row) :
						?>
						<div class="form-group-sm">
							<div class="col-sm-10">
								<div class="d-inline-block float-right p-2">
									<button id="doPrint" class="btn btn-primary btn-sm">
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
								<div class="d-inline-block float-right p-2">
									<select name="pengawas" id="opsi_petugas" class="form-control form-control-sm" onchange="select_petugas()">
								     	<option value="">--- PETUGAS LAB ---</option>
								     	<?php foreach($petugas as $p): ?>
								     		<option value="<?= $p->nama; ?>"><?= $p->nama; ?></option>
								     	<?php endforeach; ?>
									</select><br>
								</div>
							</div>
						</div>

						<br><br><br><br>
						<div class="row">
							<div class="col-sm-9">
								<div class='canvas' id="printDiv" style="width:975px;height:563px  ;border:3px solid">
								   	<div class="row">
									  	<div class="col-sm-5">
									  		<p class="text-center font-weight-bold" style="font-size:14px;">PEMERINTAH KABUPATEN KARAWANG <br>
											DINAS PEKERJAAN UMUM DAN PENATAAN RUANG <br>
											UPTD LABORATORIUM BAHAN KONSTRUKSI</p>
									  	</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<u><p class="text-center font-weight-bold" style="font-size:14px;">PEMERIKSAAN KUAT TEKAN BETON</p></u>
										</div>
									</div>
									<div class="row" style="font-size:12px;">
									  	<div class="col-sm-9">
											<table cellpadding="2">
												<tr>
													<th>Kegiatan </th>
													<td> :</td>
													<td><?= $row->kegiatan; ?> </td>
												</tr>
												<tr>
													<th>Lokasi </th>
													<td> :</td>
													<td><?= $row->nama_lokasi; ?> </td>
												</tr>
												<tr>
													<th>Jenis Contoh </th>
													<td> :</td>
													<td>Silinder 15 x 30 cm</td>
												</tr>
											</table>					
									  	</div>
									  	<div class="col-sm-3">
									  		<table cellpadding="1">
												<tr>
													<th>No. Contoh </th>
													<td> :</td>
													<td> ... </td>
												</tr>
												<tr>
													<th>Komposisi </th>
													<td> :</td>
													<td> ... </td>
												</tr>
												<tr>
													<th>Diterima </th>
													<td> :</td>
													<td> ... </td>
												</tr>
												<tr>
													<th>Pelaksana </th>
													<td> :</td>
													<td> <?= $row->pelaksana; ?> </td>
												</tr>
											</table>
									  	</div>
									</div>
									<br>
									<div class="row" style="font-size:12px;">
										<div class="col-sm-12">
											<table cellpadding="3" border="1" cellspacing="0" class="text-center">
												<tr>
													<th rowspan="2">No</th>
													<th rowspan="2" style="width:150px;">Benda Uji</th>
													<th rowspan="2">Tanggal Cor</th>
													<th rowspan="2">Tanggal Test</th>
													<th rowspan="2" style="width:100px;">Umur Hari</th>
													<th rowspan="2">Slump Test</th>
													<th rowspan="2">Berat gr</th>
													<th rowspan="2">Berat/isi</th>
													<th rowspan="2">Luas Bidang</th>
													<th rowspan="2">Tekanan Maksimum kg</th>
													<th colspan="3">Kuat Tekan Beton</th>
													<th rowspan="2">Keterangan</th>
												</tr>
												<tr>
													<th>Silinder kg/cm2</th>
													<th>Estimate TK 28 Hari</th>
													<th>Konversi FC Mpa</th>
												</tr>
												<tr>
													<td>1</td>
													<td>Silinder 15 x 30 cm</td>
													<td>22/06/2022</td>
													<td>27/06/2022</td>
													<td>5</td>
													<td>10</td>
													<td>12087</td>
													<td>2,28</td>
													<td>176,71</td>
													<td>41.907,25</td>
													<td>237,15</td>
													<td>439,17</td>
													<td>36,5</td>
													<td></td>
												</tr>
												<tr>
													<td>2</td>
													<td>Silinder 15 x 30 cm</td>
													<td>22/06/2022</td>
													<td>27/06/2022</td>
													<td>5</td>
													<td>10</td>
													<td>11958</td>
													<td>2,25</td>
													<td>176,71</td>
													<td>41.677,69</td>
													<td>235,85 </td>
													<td>436,77</td>
													<td>36,3</td>
													<td></td>
												</tr>
												<tr>
													<td>3</td>
													<td>Silinder 15 x 30 cm</td>
													<td>22/06/2022</td>
													<td>27/06/2022</td>
													<td>5</td>
													<td>10</td>
													<td>11899</td>
													<td>2,24</td>
													<td>176,71</td>
													<td>41.875,85</td>
													<td>236,97 </td>
													<td>438,84</td>
													<td>36,4</td>
													<td></td>
												</tr>
											</table>
										</div>
									</div>
									<br><br>
									<div class="row" style="font-size:12px;">
										<div class="col-sm-3 text-center">
											Kepala UPTD Laboratorium Bahan Konstruksi <br> 
											Dinas Pekerjaan Umum dan Penataan Ruang <br>
											Kabupaten Karawang
											<br><br><br>
											<u><b><?= $row->kepala_uptd; ?></b></u>
											<br>
											<?php echo $kepala->nip; ?>
										</div>
										<div class="col-sm-3 text-center">
												Mengetahui : 
												Pejabat Pembuat Komitmen 			
												<br><br><br><br><br>
												___________________________
												<br>NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</div>
										<div class="col-sm-3 text-center"> 
												Pengawas Lapangan
												<br><br><br><br><br>
												___________________________
												<br>NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</div>
										<div class="col-sm-3 text-center"> 
												karawang,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
												<?= substr($row->tanggal, -4); ?><br>
												Petugas Laboratorium
												<br><br><br><br>
												<b><u><span id="_petugas"></span></u></b>
												<br>NIP.<span id="_nip">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</div>
									</div>
								</div>
							</div>
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


<script type="text/javascript">
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
</script>

<script>
	function select_petugas() {
	  var x = document.getElementById("opsi_petugas").value;
	  document.getElementById("_petugas").innerHTML = x;
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		  $('#opsi_petugas').change(function(){
		  	var nama = $(this).val();
		  	if(nama ==''){
		  		$('#_nip').text('');
		  	}
		  	// alert(nama);
			  $.ajax({
			     url:"<?= base_url('Home/silinderDetail'); ?>",
			     method: 'post',
			     data: {nama: nama},
			     dataType: 'json',
			     async:true,
			     success: function(response){
			     	var len = response.length;
			       		if(len > 0){
			         		$('#_nip').text(response);
			     		}
			       }
			   });
		  });


		  $('#opsi_data').change(function(){
		  	var val = $('#opsi_data').val();
		  	if (val == '') {
		  		location.replace("<?= base_url('Home/silinder'); ?>");
		  	}else{
		  		location.replace("<?= base_url('Home/silinder?id='); ?>"+val);
		  	}
		  	
		  });

	});
</script>

