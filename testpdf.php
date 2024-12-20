<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('dompdf/autoload.inc.php'); // Adjust the path based on your project structure
use Dompdf\Dompdf;

// Create a new Dompdf instance
$pdf = new Dompdf();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sci_tech";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the database
$sql = "SELECT * FROM tbl_registration_new";
$result = $conn->query($sql);

// Check for query errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// HTML content to be included in the PDF
$html = '<table border="1">
            <tr>
                <th>Last Name</th>
            </tr>';

// Add data from the database to the HTML content
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>' . $row['last_name'] . '</td>
                  </tr>';
    }
}

$html .= '</table>';

// Echo HTML for debugging
echo $html;

// Load HTML content
$pdf->loadHtml($html);

// Set paper size
$pdf->setPaper('A4', 'portrait');

// Render PDF
$pdf->render();

// Save or output the PDF
$pdf->stream('example.pdf', array('Attachment' => 0));

// Close the database connection
$conn->close();

?>
