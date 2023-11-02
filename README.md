# PDF-Stamper Script in PHP

This script adds a watermark image to each page of an existing PDF file using TCPDF and FPDI libraries.

## Requirements

- PHP 5.3.0 or later
- TCPDF library
- FPDI library

## Installation

First, ensure you have the required libraries. You can download them from the following links:

- TCPDF: [URL_TO_TCPDF](#)
- FPDI: [URL_TO_FPDI](#)

Install the libraries by including them in your project or using a package manager like Composer.

## Usage

1. Replace the `$existingPdf` variable with the path to the PDF file you want to watermark.
2. Replace the `$bannerImage` variable with the path to your watermark image.

Run the script on a server with PHP support. The script outputs a watermarked PDF file named `output.pdf`.

## Configuration

You can adjust the placement and size of the watermark by modifying the `$x`, `$y`, `scaledWidth`, and `scaledHeight` variables.

## Output

The script sends the watermarked PDF file inline to the browser. To save the PDF to a file, change the second parameter of `$pdf->Output()` from `'I'` to `'F'` and specify a path.
