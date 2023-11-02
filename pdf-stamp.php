<?php
// Using tcpdf & fpdi
require_once('tcpdf/TCPDF-main/tcpdf.php');
require_once('tcpdf/TCPDF-main/tcpdi.php');
require_once('fpdi/src/autoload.php');

// Path to the existing PDF file - URL or filepath
$existingPdf = 'https://filename.pdf'; // Replace

// Path to the banner image - URL or filepath
$bannerImage = 'image.jpg'; // Replace

// Create instance of TCPDI
$pdf = new TCPDI();

// Iterate through each page of the existing PDF
$pageCount = $pdf->setSourceFile($existingPdf);
for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
    // Import the page content from the existing PDF
    $tplId = $pdf->importPage($pageNumber);

    // Add a new page to the output PDF
    $pdf->AddPage();

    // Get the dimensions of the imported page
    $size = $pdf->getTemplateSize($tplId);

    // Calculate the scaled width and height (80%)
    $scaledWidth = $size['w'] * 0.9;
    $scaledHeight = $size['h'] * 0.9;

    // Calculate the position to center the scaled content at the bottom
    $x = (210 - $scaledWidth) / 2; // Center horizontally (A4 page is 210 wide)
    $y = 27; // Place at the top of the page (with a small margin)

    // Use the imported page as a template, scaled and positioned
    $pdf->useTemplate($tplId, $x, $y, $scaledWidth, $scaledHeight);

    // Add the banner image to the top of the page
    $pdf->Image($bannerImage, 0, 0, 210, 25); // Adjust the width and height as needed
}

// Output the modified PDF to the browser or save it to a file
$pdf->Output('output.pdf', 'I'); // 'I' sends the file inline to the browser
// You can also use 'F' to save the file to a specified path (shown below)
// $pdf->Output('path/to/output.pdf', 'F');
?>
