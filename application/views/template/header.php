<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-grid.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-reboot.min.css'); ?>">
    <link rel="icon" href="<?= base_url('assets/icon/favicon.ico'); ?>" type="image/icon type">

    <!-- datatables : online -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

	<!-- notify.js : offline -->
	<script src="<?= base_url('assets/js/notify.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/notify.js'); ?>"></script>

    <!-- online source -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- datetimepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/1.0.0/js/bootstrap-datetimepicker.min.js" integrity="sha512-o+m5PeuFJr2KPZC7HYZgIQ89z9upmH+eyb2s24DWXvqfjV1emwIjrr2GxJRQ3HglSEp2TJtp18mGZRf7uZMYhg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/1.0.0/css/bootstrap-datetimepicker.min.css" integrity="sha512-yhWjVjH1yCkclDS7v5gpZuJueQkijw0nXLe9+H6ZkLyedIXJCI18yFN/YDQLwMlT9qWi0OWQtjJUdMw+freKRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js.chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.esm.js" integrity="sha512-YM18yiANXJFpbiOZjLzUrK/lNfTiBcwtTLeAntG4B8dJY+NdUDjxfPNGPEMuOdXlT7U/uT+zbIvbQYAEFog+MA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.esm.min.js" integrity="sha512-yPOQ2pPoQ9JtP0/jDKpXiKyWNCJWT5OI+6r1EqZmTg+afKQOBpy08VYboeq+Tt9kl9/FOCueEhH6cmHN3nAdJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.js" integrity="sha512-5m2r+g00HDHnhXQDbRLAfZBwPpPCaK+wPLV6lm8VQ+09ilGdHfXV7IVyKPkLOTfi4vTTUVJnz7ELs7cA87/GMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/helpers.esm.js" integrity="sha512-dSutS1n8KEMUnQMa9YGa6CxAmoUfaZdxL2+s2xBgEq7WHaWdtjna/rzGsjqkT27GxKBDLT0Fr3C/TzzHvBRaAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/helpers.esm.min.js" integrity="sha512-vxCPccgWacJoW2HlxhlKKtczdzvcg0r1UuB9LfNGt6vsDbgLfSFxKlolUS2mqKNXrOK5b93S45309T+V5BhueA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 	<style type="text/css">
 		@media print{
	 		header{
	 			padding-top: -200px;
	 	   }
		   
		   body{
		       	font-family:"Times New Roman";
		       	<?php
		       		if($page=='print_with_border'){
		       	?>
		       	border: 5px double;
		       	padding: 20px;
		       	<?php
		       		}else{
		       	?>

		       	<?php
		       		}
		       	?>		       	
		   }

		    @page {
			   	size: 216mm 356mm;
			   	margin: 2cm;
			}

		}

		.watermark{
			position: absolute;
			background-position: center; background-repeat: no-repeat;
			background-size: 90%;
			top: 50%;
  			left: 50%;
  			transform: translate(-50%, -50%);
			width: 100%;
			opacity: 10%;
		}

		#canvas {
			font-family:"Times New Roman";
            border: thin inset #aaaaaa;
            width: 36cm;
            height: 20cm;
        }

        #canvas_portrait {
			font-family:"Times New Roman";
            border: thin inset #aaaaaa;
            width: 20cm;
            height: 36cm;
        }

        #loading{
        	background: rgba(0, 0, 0, .1);
		  	position: absolute;
		  	left: 0px;
		  	top: 0%;
		  	width: 100%;
		  	height: 100%;
		  	z-index: 9999;
		}

		#loading-image{
		  	position: absolute;
		  	top: 30%;
		  	left: 40%;
		  	z-index: 9999;
		}
 	</style>
</head>
<body style="background-color: whitesmoke;">

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black;">
    <!-- Brand -->
    <img src="<?= base_url('assets/img/pupr.jpg'); ?>" style="width:30px;" class="navbar-brand">
    <a class="navbar-brand" href="<?= base_url('home'); ?>"> Laporan Inti | Admin PUPR </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- give active effect at menu navbar -->
    <?php
    	$home="";
    	$master_data="";
    	if(isset($status_nav)){
    		if($status_nav=="home"){
	    		$home = "active";
	    	}else if($status_nav=="master data"){
	    		$master_data = "active";
	    	}
    	}
    ?>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= $home; ?>" href="<?= base_url('home'); ?>">Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $master_data; ?>" href="<?= base_url('Master_data'); ?>">Master Data</a>
            </li>
        </ul>
    </div>
</nav>


<script type="text/javascript">
	var timestamp = '<?=date('d/m/Y h:m:s');?>';
	function updateTime(){
	  $('#time').html(Date(timestamp));
	  timestamp++;
	}
	$(function(){
	  setInterval(updateTime, 1000);
	});
</script>
