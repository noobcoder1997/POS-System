<?php
    include '../../config/functions.php';

    require '../../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Style\Font;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Borders;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Merge cells (A1 to B1)
    $sheet->mergeCells('A1:G1');

    // Set value in merged cell
    $sheet->setCellValue('A1', 'MY POS Overall Stock Report');

    // Set font size and bold
    $sheet->getStyle('A1')->getFont()->setSize(24)->setBold(true); // Set font size to 14

    // Make text bold
    $sheet->getStyle('A1')->getFont()->setBold(true);

    // Center horizontally and vertically
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $sql = "SELECT *, SUM(quantity) AS qty, COUNT(id) AS ids FROM transactions GROUP BY product_id, date, status, type, product_return";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    $rowIndex = 3; // Start from the second row (first row is the header)
    
    $l = "A";
    $l1 = "A";
    $p_name = "";
    $i = 1;
    $total_qty=0;
    $total_pdcts=0;
    $total_sts=0;
    $total_rtn=0;
    $total_type=0;
    $type = null; $status = null; $return = null;
    while ($row = $result->fetch_assoc()) { 

        $p_qry = "SELECT product_name FROM products WHERE id = ?";
        $p_stmt = $conn->prepare($p_qry);
        $p_stmt->bind_param('s', $row['product_id']);
        $p_stmt->execute();

        $p_result = $p_stmt->get_result();
        if($prow = $p_result->fetch_assoc())
            
            $p_name = $prow['product_name'];
       
        
        $type = ($row['type'] == 0)? "IN": "OUT";

        $return = ($row['product_return'] == 1)? "YES": "NO";

        if($row['status'] == 0){ $status="SOLD"; }
        elseif($row['status'] == 1){ $status="DEFECTIVE"; }
        elseif($row['status'] == 2){ $status="EXPIRE"; }
        elseif($row['status'] == 3){ $status="DAMAGED"; }
        else{ $status="IN-STOCK"; }

        while($l < "H"){
        
            // Set font size and bold
            $sheet->getStyle($l. 2)->getFont()->setSize(12)->setBold(true); // Set font size to 14
                
            // Auto-size columns A and B
            $sheet->getColumnDimension($l)->setAutoSize(true);
            
            $l++;
        }

        $sheet->setCellValue("A" . 2, "#"); // Set product_id in column A
        $sheet->setCellValue("B" . 2, "Product Name"); // Set product_name in column B
        $sheet->setCellValue("C" . 2, "Quantity"); // Set quantity in column C
        $sheet->setCellValue("D" . 2, "Type"); // Set price in column D
        $sheet->setCellValue("E" . 2, "Product Return"); // Set price in column E
        $sheet->setCellValue("F" . 2, "Status"); // Set date in column F
        $sheet->setCellValue("G" . 2, "Date"); // Set date in column G

        $sheet->setCellValue("A" . $rowIndex, $i++); // Set product_id in column A
        $sheet->setCellValue("B" . $rowIndex, $p_name); // Set product_name in column B
        $sheet->setCellValue("C" . $rowIndex, $row['qty']); // Set quantity in column C
        $sheet->setCellValue("D" . $rowIndex, $type); // Set price in column D
        $sheet->setCellValue("E" . $rowIndex, $return); // Set date in column E
        $sheet->setCellValue("F" . $rowIndex, $status); // Set date in column E
        $sheet->setCellValue("G" . $rowIndex, $row['date']); // Set date in column E
        
        $rowIndex++;

        $total_qty += $row['qty'];
        $total_pdcts += str_word_count($p_name);
        $total_sts += str_word_count($status);
        $total_type += str_word_count($type);
        $total_rtn += str_word_count($return);
    }
    // set bold
    while($l1<"H"){
        $sheet->getStyle($l1 . $rowIndex)->getFont()->setBold(true);
        $l1++;
    }

    $sheet->setCellValue("A" . $rowIndex, "TOTAL");
    $sheet->setCellValue("B" . $rowIndex, $total_pdcts);
    $sheet->setCellValue("C" . $rowIndex, $total_qty);
    $sheet->setCellValue("D" . $rowIndex, $total_type);
    $sheet->setCellValue("E" . $rowIndex, $total_rtn);
    $sheet->setCellValue("F" . $rowIndex, $total_sts);

    // Set headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="my-pos-stock-report-'.time().'.xlsx"');
    header('Cache-Control: max-age=0');

    // Write the spreadsheet to output
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;

?>