<?php
// Set the printer name (replace 'Your_Printer_Name' with the actual printer name)
$printerName = 'Your_Printer_Name';

// Function to send the PDF to the printer
function printToSpecificPrinter($printerName, $pdfContent) {
    $tempFile = tempnam(sys_get_temp_dir(), 'pdf');
    file_put_contents($tempFile, $pdfContent);

    // Use the appropriate command for your OS and printer setup
    $command = "lp -d " . escapeshellarg($printerName) . " " . escapeshellarg($tempFile);
    exec($command, $output, $returnVar);

    unlink($tempFile);

    if ($returnVar !== 0) {
        die("Failed to print to printer '$printerName'.");
    }
}

// Print the PDF
try {
    printToSpecificPrinter($printerName, $pdfOutput);
} catch (Exception $e) {
    die("An error occurred while printing: " . $e->getMessage());
}

require '../vendor/autoload.php';

use Dompdf\Dompdf;

// Initialize Dompdf
$dompdf = new Dompdf();

// Load HTML content
$html = '<h1>Hello, Dompdf!</h1>';
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();

// Output the PDF as a base64-encoded string
$pdfOutput = $dompdf->output();
$base64Pdf = base64_encode($pdfOutput);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print PDF</title>
</head>
<body>
    <h1>PDF will print automatically</h1>
    <script>
        // Create a Blob from the base64 PDF
        const base64Pdf = "<?php echo $base64Pdf; ?>";
        const binaryPdf = atob(base64Pdf);
        const arrayBuffer = new Uint8Array(binaryPdf.length);
        for (let i = 0; i < binaryPdf.length; i++) {
            arrayBuffer[i] = binaryPdf.charCodeAt(i);
        }
        const blob = new Blob([arrayBuffer], { type: 'application/pdf' });

        // Create an iframe to load the PDF
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = URL.createObjectURL(blob);
        document.body.appendChild(iframe);

        // Wait for the iframe to load and trigger print
        iframe.onload = () => {
            iframe.contentWindow.print();
        };
    </script>
</body>
</html>