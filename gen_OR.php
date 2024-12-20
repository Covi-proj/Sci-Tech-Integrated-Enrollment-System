<?php
session_start();

// Inisialize variables with default values to avoid errors
$user_id = $_SESSION['Stud_number'];
$Tran_num= $_SESSION['Tran_num'];
$payment_id = $_SESSION['OR_Num'];
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname'];
$grade_level = $_SESSION['grade_level'];
$Current_balance = $_SESSION['Current_balance'];
$paid_amount = $_SESSION['paid_amount'];
$date = $_SESSION['date'];

$remaining = $Current_balance - $paid_amount;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Receipt</title>
    <link rel="icon" type="image/png" href="favicon_scitech.png">
    <style>
     body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        margin-top: 20px;
    }

    h3 {
        color: #1e4d6d;
        font-size: 36px;
        margin-bottom: 20px;
        text-align:left;
    }

    img {
        width: 100px;
        height: 100px;
        margin-right: 20px; /* Adjust the margin as needed */
    }

    

    @media print {
        .example-screen {
            display: none;
        }
        .example-print {
            
            margin-top:0px
        }
    }

    .example-screen {
        margin-top: 20px;
        text-align: center;
    }

    button {
        background-color: #1e4d6d;
        color: #ffffff;
        padding: 15px 30px;
        font-size: 18px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #15374f;
    }
    .address{
        
        font-size: 15px;
        margin-left: 125px;


    }
    .OR{

        text-align:center;

    }
    .fform {
    
    border: 2px solid #000;
    padding: 10px;
    
    border-radius: 10px;
  }
  .eme{
    
    margin-left: 40px;


  }
  .or{

    text-align: right;


  }

  .title {
				text-align: center;
			}

			.logo, .title2, .title3 {
            display: inline-block;
            vertical-align: middle;
            font-family: "Arial", Times, serif;
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

    </style>
</style>

</head>
<body>


    <div class="example-print">
      
    
        <img src="favicon_scitech.png" alt="Logo" width="100px" height="100px" class="logo">
		<p class = "title2"><b class = "school">Science Technology Institute of Rosario, Cavite Inc.</b> 
        <br>STI Bldg. Gen. Trias Drive, Tejero, Rosario, Cavite 4106<br>971-1672/ 438-5227 Email add: stihs.rosario@yahoo.com</p><br>




    </h2>

<h3 class = "OR">Official Receipt</h3>
<div class = "fform">

<div>
    <p><strong>Student Number:</strong> <?php echo $user_id ?></p>
    <p><strong>Last Name:</strong> <?php echo $lname ?></p>
  </div>
  <div>
    <p><strong>First Name:</strong> <?php echo $fname ?></p>
    <p><strong>Grade Level:</strong> <?php echo $grade_level ?></p>
  </div>




</div class = "fform">

<div>
<p><strong>Date:</strong> <?php echo $date ?></p>   
<p><strong>Total:</strong> <?php echo number_format($Current_balance, 2)  ?></p>
<p><strong>Amount Paid:</strong> <?php echo number_format($paid_amount, 2);  ?></p>
<p><strong>Remaining Balance</strong> <?php echo number_format($remaining, 2);  ?></p><br>

</div>
<p>________________________________</p>
<p class = "eme">AUTHORIZED SIGNATURE</p>
<p class = "or"><strong>No:</strong> <?php echo $payment_id ?></p>
    </div>
    <div class="example-screen">
        <button onclick="window.print();">Print</button>
    </div>
</body>
</html>
