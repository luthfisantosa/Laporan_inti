<div class="container pt-5 pb-5 p-5">
	<div class="col-sm-4">
		<div class="row">
			<div class="col-sm-12">
				<?php 
					$mode = $this->input->post('edit');
					echo $page;
					if (isset($mode)) {
					$mode = 'Update';
				?>
					<!-- for Form Edit -->
					<form action="<?= base_url('Home/update'); ?>" method="POST" name="formhidden">	
				<?php
					}else{
					$mode = 'Simpan';
				?>
					<!-- for Form input -->
					<form action="<?= base_url('Home/save'); ?>" method="POST" name="formhidden">

				<?php
					}
				?>
					<input type="hidden" name="no_reg" value="<?= $no_reg; ?>">
					<input type="hidden" name="tanggal" value="<?= $tanggal; ?>">
					<input type="hidden" name="kegiatan" value="<?= $kegiatan; ?>">
					<input type="hidden" name="nomor" value="<?= $nomor; ?>">
					<input type="hidden" name="kode_rekening" value="<?= $kode_rekening; ?>">
					<input type="hidden" name="lokasi" value="<?= $lokasi; ?>">
					<input type="hidden" name="pelaksana" value="<?= $pelaksana; ?>">
					<input type="hidden" name="singkatan" value="<?= $singkatan; ?>">
					<input type="hidden" name="jenis_pekerjaan" value="<?= $jenis_pekerjaan; ?>">
					<input type="hidden" name="pemborong" value="<?= $pemborong; ?>">
					<input type="hidden" name="wilayah" value="<?= $wilayah; ?>">
					<input type="hidden" name="abt" value="<?= $abt; ?>">
					<input type="hidden" name="kepala" value="<?= $kepala; ?>">
					<div class="form-group">
						<a href="<?= base_url('Home'); ?>">
							<span class="fa fa-chevron-left"></span> Back
						</a>
					</div>
					<div class="form-group">
						<button id="doPrint" class="btn btn-primary btn-sm">
							<span class="fa fa-print"></span> Cetak
						</button>
						<input type="submit" name="submit" value="<?= $mode; ?>" class="btn btn-primary btn-sm">
					</div>
				</form>
			</div>
		</div>
		<br>
		<?= $tanggal_for_view; ?>
		<div id="printDiv" class="card card-body border" style="width: 22cm;height: 36cm;font-family: 'Times New Roman', Times, serif">
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

			<!-- body -->
			<div class="row" style="font-size: 18px;">
				<div class="col-8"></div>
				<div class="col-4">
					<p class="text-right">Karawang, <?= $tanggal_for_view; ?></p>
				</div>
			</div>

			<div class="row" style="font-size: 18px;">
				<div class="col-8">
					<table>
						<tr>
							<?php $no_reg = str_pad($no_reg, 4, '0', STR_PAD_LEFT); ?>
							<td>Nomor</td><td> :</td><td><?= $nomor; ?>/<?= $no_reg; ?>/UPTD LBK - PUPR/<?= substr($tanggal_for_view, -4); ?></td>
						</tr>
						<tr>
							<td>Lampiran</td><td> :</td><td>Terlampir</td>
						</tr>
						<tr>
							<td>Perihal</td><td> :</td><td>Laporan Hasil Pengujian Laboratorium</td>
						</tr>
					</table>
				</div>
				<div class="col-4">
					<br>
					<br>Kepada :
					<br>Yth. Direktur <?= $pelaksana; ?>
					<br><p class="text-center">Di <br><strong>K A R A W A N G</strong></p>
				</div>
			</div>
			<br><br>
			<div class="row" style="font-size: 18px;">
				<div class="col-12">
					<p style="text-indent: 50px;text-align: justify;">Dasar, Surat dari Direktur <?= $pelaksana; ?> Nomor .... /CV/<?= substr($tanggal, -4); ?>, Tanggal .............. Perihal permohonan pengujian laboratorium</p> 
				</div>
			</div>
			<div class="row" style="font-size: 18px;">
				<div class="col-12">
					<p style="text-indent: 50px;text-align: justify;">
						Sehubungan hal tersebut di atas, kami sampaikan Laporan Pengujian Bahan dan Lapangan. Pengujian ini dilaksanakan pada UPTD Laboratorium Bahan Konstruksi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Karawang, sebagaimana terlampir.
					</p> 
				</div>
			</div>
			<div class="row" style="font-size: 18px;">
				<div class="col-12">
					<p style="text-indent: 50px;text-align: justify;">
						Demikian,  untuk  dipergunakan  sebagaimana  mestinya.
					</p> 
				</div>
			</div>
			<br><br><br><br><br>
			<div class="row" style="font-size: 18px;">
				<div class="col-6"></div>
				<div class="col-6">
					<p style="text-align: center;">
						Kepala UPTD Laboratorium Bahan Konstruksi		
						Dinas Pekerjaan Umum dan Penataan Ruang		
						Kabupaten Karawang	
					</p> 
				</div>
			</div>
			<br><br><br>
			<div class="row" style="font-size: 18px;">
				<div class="col-6"></div>
				<div class="col-6">
					<p style="text-align: center;">
						<strong><u><?= $kepala; ?></u></strong>	
						<br>NIP. <?= $nip; ?>
					</p> 
				</div>
			</div>
			<br><br><br><br><br><br>
			<div class="row" style="font-size: 18px;">
				<div class="col-6">
					Tembusan :<br>
					<ol>
						<li>Kepala Dinas PUPR</li>
						<li>Pejabat Pembuat Komitmen</li>
						<li>Pengawas Lapangan </li>
						<li>Arsip</li>
					</ol>  
				</div>
			</div>
			<!-- watermark -->
			<img src="<?= base_url('assets/img/watermark-pupr.png'); ?>" class="watermark">
			<!-- footer -->
			<div style="padding-bottom: 40%;">
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