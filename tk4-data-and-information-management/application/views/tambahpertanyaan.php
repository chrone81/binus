<?php
ob_start();
include ('session.php');

include('config.php'); 
$conn = mysqli_connect('localhost','tibsc','123456','db_tibsc');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>TATA KELOLA KINERJA TEKNOLOGI INFORMASI MENGGUNAKAN
IT BALANCED SCORECARD</title>
	<meta name="description" content="TATA KELOLA KINERJA TEKNOLOGI INFORMASI MENGGUNAKAN
IT BALANCED SCORECARD">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="template.php"><span>IT-BSC</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $session_id; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
			<?php include "sidebar.php"; ?>
			
			
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tambah Data Pertanyaan</a></li>
			</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tambah Data Pertanyaan</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Pertanyaan : </label>
							  <div class="controls">
								<textarea class="input-xlarge" id="textarea2" cols="90" rows="3" name="pertanyaan"></textarea>
							  </div>
								
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Dimensi : </label>
								<div class="controls">
								  <select id="iddimensi" data-rel="chosen" name="iddimensi">
									<option></option>
									<?php 
                                        $query=mysqli_query($conn,"select * from tbdimensi");
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $row['id_dimensi'];?>"><?php echo $row['dimensi']; ?></option>
                                    <?php
                                    	}
                                    ?>
								  </select>
								</div>

							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Variabel : </label>
								<div class="controls">
								  <select id="variabel" data-rel="chosen" name="variabel">
								  	<option></option>
									<option value='komitmen pimpinan'>Komitmen pimpinan</option>
									<option value='alokasi sumber daya'>Alokasi sumber daya</option>
									<option value='unit pengelola teknologi'>Unit pengelola teknologi</option>
									<option value='kebijakan dan sistem insentif'>Kebijakan dan sistem insentif</option>
									<option value='Renstra dan peta jalan'>Renstra dan peta jalan</option>
									<option value='Perencanaan dan pengorganisasian'>Perencanaan dan pengorganisasian</option>
									<option value='Pengadaan dan penerapan'>Pengadaan dan penerapan</option>
									<option value='Pengelolaan dan pengembangan'>Pengelolaan dan pengembangan</option>
									<option value='Pemantauan dan penilaian'>Pemantauan dan penilaian</option>
									<option value='Dosen dan peneliti'>Dosen dan peneliti</option>
									<option value='Mahasiswa, unsur pemilik dan pimpinan'>Mahasiswa, unsur pemilik dan pimpinan</option>
									<option value='Manajemen, staf dan karyawan'>Manajemen, staf dan karyawan</option>
									<option value='Peningkatan kualitas'>Peningkatan kualitas</option>
									<option value='Efektivitas dan efisiensi'>Efektivitas dan efisiensi</option>
									<option value='Transparansi manajemen'>Transparansi manajemen</option>
									<option value='Utilitas sumber daya'>Utilitas sumber daya</option>
									<option value='Transformasi organisasi'>Transformasi organisasi</option>
									<option value='Implementasi e-learning '>Implementasi e-learning </option>
									<option value='Berbagai sumber daya'>Berbagai sumber daya</option>
									<option value='Pendidikan terbuka'>Pendidikan terbuka </option>
									<option value='Pangkalan data terpadu'>Pangkalan data terpadu</option>
									<option value='Jejaring internasiona'>Jejaring internasiona</option>

								  </select>
								</div>

							  </div>

								<div class="control-group">
								<label class="control-label" for="focusedInput">Jawaban A : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="pila" type="text" value="" name="pila">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jawaban B : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="pilb" type="text" value="" name="pilb">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jawaban C : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="pilc" type="text" value="" name="pilc">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jawaban D : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="pild" type="text" value="" name="pild">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jawaban E : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="pile" type="text" value="" name="pile">
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					<?php
                            if (isset($_POST['simpan'])) {
                                $pertanyaan = $_POST['pertanyaan'];
                                $iddimensi = $_POST['iddimensi'];
                                $variabel = $_POST['variabel'];
								$pila = $_POST['pila'];
								$pilb = $_POST['pilb'];
								$pilc = $_POST['pilc'];
								$pild = $_POST['pild'];
								$pile = $_POST['pile'];


                                mysqli_query($conn,"insert into tbkuesioner (pertanyaan,id_dimensi,variabel,pila,pilb,pilc,pild,pile) 
                                	values ('$pertanyaan',$iddimensi,'$variabel','$pila','$pilb','$pilc','$pild','$pile')") or die(mysqli_error());
                                header('location:tambahpertanyaan.php');
                            }
                            ?>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
				</div><!--/span-->
			
			</div><!--/row-->	

			
						
			
			
			
				
			
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
