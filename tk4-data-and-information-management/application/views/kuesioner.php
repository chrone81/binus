<?php
ob_start();
include ('session.php');

include('config.php'); 
$conn = mysqli_connect('localhost','tibsc','123456','db_tibsc')
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
				<li><a href="#">Kuesioner</a></li>
				</ul>

						<?php
							$hasil=mysqli_query($conn,"select * from tbkuesioner order by id_kuesioner");
							$jumlah=mysqli_num_rows($hasil);
							$urut=0;
							while($row =mysqli_fetch_array($hasil))
							{
								$urut=$urut+1;
								$id_kuesioner=$row["id_kuesioner"];
								$pertanyaan=$row["pertanyaan"];
								$pila=$row["pila"];
								$pilb=$row["pilb"];
								$pilc=$row["pilc"];
								$pild=$row["pild"];
								$pile=$row["pile"];		
						?>
						<form name="form1" method="post">
						<input type="hidden" name="id[]" value=<?php echo $id_kuesioner; ?>>
						<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
						 <div class="control-group">
								<label class="control-label"><?php echo $urut; ?>. <?php echo " $pertanyaan"; ?>
						  	<td></label>
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="pilihan[<?php echo $id_kuesioner; ?>]" 
			  							value="A" >A. <?php echo "$pila";?>
			  							<br>
			  						</label>
			  						<div style="clear:both"></div>
			  						<label class="radio">
			  						<input type="radio" name="pilihan[<?php echo $id_kuesioner; ?>]" 
									 value="B">B. <?php echo "$pilb";?>
									</label>
									<div style="clear:both"></div>
									
									<label class="radio">
									 <input type="radio" name="pilihan[<?php echo $id_kuesioner; ?>]" 
									 value="C">C. <?php echo "$pilc";?>
									 </label>
									 <div style="clear:both"></div>
									 
									 <label class="radio">
									 <input type="radio" name="pilihan[<?php echo $id_kuesioner; ?>]" 
									 value="D">D. <?php echo "$pild";?>
									 </label>
									 <div style="clear:both"></div>
									 
									 <label class="radio">
									 <input type="radio" name="pilihan[<?php echo $id_kuesioner; ?>]" 
									 value="E">E. <?php echo "$pile";?>
								  	</label>
								  
								  
								</div>
							  </div>

						
						<?php
							}
						?>
			        	<tr>
							<td>&nbsp;</td>
						  	<td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
			            </tr>
						</form>
						</table>
						</div>
					</div><!--/span-->
				</div>
			</div><!--/row-->
		</div><!--/span-->
	</div><!--/row-->	
<?php 
               if (isset($_POST['submit'])) {
                	mysqli_query($conn,"DELETE FROM jawaban where username='$session_id'");
						$pilihan=$_POST["pilihan"];
						$id_kuesioner=$_POST["id"];
						$jumlah=$_POST['jumlah'];
			
						$jum=count($pilihan);
						if ($jum<$jumlah) {
						?>
						<script type="text/javascript">
						    alert("Maaf anda belum mengisi secara lengkap, mohon diisi secara lengkap");
						    history.back();
						  	</script>
						<?php
						} else {
						for ($i=0;$i<$jum;$i++){
							//id nomor soal
							$nomor=$id_kuesioner[$i];
				
						//jika user tidak memilih jawaban
						if (empty($pilihan[$nomor])){
							$jawaban='';
						}else{
							//jawaban dari user
							$jawaban=$pilihan[$nomor];
							
							}
						mysqli_query($conn,"insert into jawaban (id_kuesioner,jawaban,username)
								values ('$nomor','$jawaban','$session_id')                                    
								") or die(mysqli_error());   
					}

					              
              } 
			}
		?>				
			
			
			
				
			
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	
	
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
