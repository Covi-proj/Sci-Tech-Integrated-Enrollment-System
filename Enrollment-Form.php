<?php

include('config.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['Pre_Num'];

$sql = mysqli_query($con, "SELECT * FROM tbl_registration WHERE Pre_Num = '$id'");

$user = mysqli_fetch_assoc($sql);

$dompdf = new Dompdf();
ob_start();
require('register_submit.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('Registration-Form.pdf', ['Attachment' => false]);

?>
