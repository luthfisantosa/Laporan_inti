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
					    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Silinder</a>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item" href="<?= base_url('Home/silinder'); ?>">Kuat Tekan Beton</a>
					      	<a class="dropdown-item" href="<?= base_url('Home/silinderBasecourse'); ?>">Base Course</a>
					      	<a class="dropdown-item" href="<?= base_url('Home/hotmix'); ?>">Hotmix</a>
					    </div>
					</li>
				  	<li class="nav-item">
					    <a class="nav-link active" href="<?= base_url('Home/tes_kubus'); ?>">Tes Kubus</a>
				  	</li>
				  	<li class="nav-item">
					    <a class="nav-link" href="<?= base_url('Home/database'); ?>">Database</a>
				  </li>
				</ul>
				<br><br>
				<div class="container">

				</div>
			</div>
		</div>
	</div>
</div>