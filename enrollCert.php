
<?php
	session_start();
	
	$studnumber = $_SESSION['studNum'];
	$lastname = $_SESSION['studLast'];
	$firstname = $_SESSION['studFirst'];
	$gradelevel = $_SESSION['studGrade'];
	$regdate =  date("F d, Y", strtotime($_SESSION['studDate']));	

	$studLRN = $_SESSION['studLRN'];
	$studSY = $_SESSION['studSY'];
?>

<!DOCTYPE html>
<html>
	<body>
	<style>
			body {
				text-align: justify;
				font-family: Arial, sans-serif;
			    margin: 30px;
				line-height: 1.1;
			}

			.title {
				text-align: center;
			}

			.logo, .title2, .title3 {
            display: inline-block;
            vertical-align: middle;
            font-family: "Times New Roman", Times, serif;
			margin-left:75px;
      	  }

        	.title2, .title3 {
            margin-left: 10px;
            line-height: 1.0; 
        	}

       		 .logo img {
            width: 60px;
            height: 60px;
        	}
			.school{

			font-size:20px;

			}
			.date{
				
				text-align: right;

			}

			@media print {
				.print-btn {
					display: none;
				}
				.content-prt {
					display: block;
				}
			}
			
	</style>
	<div class="content-prt">
		<img src="favicon_scitech.png" alt="Logo" width="100px" height="100px" class="logo">
		<p class = "title2"><b class = "school">Science Technology Institute of Rosario Cavite , Inc.</b> <br>STI Bldg. Gen. Trias Drive, Tejero, Rosario, Cavite<br>971-1672/ 438-5227 Email add: stihs.rosario@yahoo.com</p><br>

		<br>
		<br>
		<h1 class = "title">CERTIFICATION OF ENROLLMENT</h1><br><br>
		<p class = "date"><?php 
		
		echo $regdate?></p><br><br>
		<h3>TO WHOM IT MAY CONCERN</h3>
		<p>&nbsp;&nbsp;&nbsp;This is to certify that <b><?php echo $lastname?> <?php echo $firstname?></b> is a <?php echo $gradelevel?> Junior High School student with <b>LRN <?php echo $studLRN?></b> is currently enrolled in <b>Science Technology Institute of Rosario, Cavite Inc.</b> S.Y. <?php echo $studSY?>.</p><br>
		<p>&nbsp;&nbsp;&nbsp;This certificate is issued this <?php echo $regdate?> upon request of the given name above  for whatever purpose it may serve.</p><br><br><br>
		<p>Very truly yours,</p><br><br><br>
		<p>MS. LOVELY SHAINE H. OCAMPO</p>
		<p>School Registrar</p>
	</div>

	<div class="print-btn">
		<button onclick="window.print();">Print</button>
	</div>
	
	</body>
</html>