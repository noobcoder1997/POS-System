<?php
    require '../../config/functions.php';
    require_once '../../vendor/autoload.php'; // Adjust the path to your Dompdf autoload file
    use Dompdf\Dompdf; 
    
    // Generate HTML content     
    $html = '<h1 style="text-align: center">My POS INS inventory Report</h1>';
    $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">';
    $html .= '<thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Product Return</th>
                    </tr>
                </thead>';
    $html .= '<tbody>';

    $total_qty=0;
    $total_pdcts=0;
    $total_sts=0;
    $total_rtn=0;
    $total_type=0;
    $total_price=0;
    $type = null; $status = null; $return = null;
    $sales_qry="";

    if($_POST['out-inputPDFFrom'] == "" || $_POST['out-inputPDFTo'] == ""){

        $sales_qry = "SELECT *, SUM(quantity) AS qty FROM transactions WHERE status <> '' AND type = 1 GROUP BY product_id";

        $stmt = $conn->prepare($sales_qry);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    else{
        
        $sales_qry = "SELECT *, SUM(quantity) AS qty  FROM transactions WHERE (MONTH(date) BETWEEN ? AND ?) AND status <> '' AND type = 1 GROUP BY product_id";
    
        $stmt = $conn->prepare($sales_qry);
        $stmt->bind_param('ss',$_POST['out-inputPDFFrom'], $_POST['out-inputPDFTo']);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    while($row=$result->fetch_assoc()){

        $item_qry = "SELECT * FROM product_batches WHERE product_id = ?";
        $_stmt0 = $conn->prepare($item_qry);
        $_stmt0->bind_param('s', $row['product_id']);
        $_stmt0->execute();
        $_result0 = $_stmt0->get_result();
        $_row0 = $_result0->fetch_assoc();

        $product_qry = "SELECT * FROM products WHERE id = ?";
        $_stmt = $conn->prepare($product_qry);
        $_stmt->bind_param('s', $row['product_id']);
        $_stmt->execute();
        $_result = $_stmt->get_result();
        if($rowProduct = $_result->fetch_assoc()){ 
            
            $type = ($row['type'] == 0)? "IN": "OUT";

            $return = ($row['product_return'] == 1)? "YES": "NO";

            if($row['status'] == 0){ $status="SOLD"; }
            elseif($row['status'] == 1){ $status="DEFECTIVE"; }
            elseif($row['status'] == 2){ $status="EXPIRE"; }
            elseif($row['status'] == 3){ $status="DAMAGED"; }
            else{ $status="IN-STOCK"; }

            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['date']) . '</td>';
            $html .= '<td>' . htmlspecialchars($rowProduct['product_name']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['qty']) . '</td>';
            $html .= '<td>' . htmlspecialchars(number_format($_row0['price'],2)) . '</td>';
            $html .= '<td>' . htmlspecialchars($status) . '</td>';
            $html .= '<td>' . htmlspecialchars($type) . '</td>';
            $html .= '<td>' . htmlspecialchars($return) . '</td>';
            $html .= '</tr>';

            $total_qty += $row['qty'];
            $total_pdcts++; 
            $total_sts += str_word_count($status);
            $total_type += str_word_count($type);
            $total_rtn += str_word_count($return);
            $total_price += $_row0['price'];

        }

    }
    $html .= '<tr>
                <td style="font-weight:bolder">Total</td>
                <td style="font-weight:bolder">'. $total_pdcts .'</td>
                <td style="font-weight:bolder">'. $total_qty .'</td>
                <td style="font-weight:bolder">'. number_format($total_price, 2) .'</td>
                <td style="font-weight:bolder">'. $total_sts .'</td>
                <td style="font-weight:bolder">'. $total_type .'</td>
                <td style="font-weight:bolder">'. $total_rtn .'</td>
            </tr>';
                        
    $html .= '</tbody>';
    $html .= '</table>';

    // Initialize Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF
    $dompdf->render();

    // Output the generated PDF to the browser
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="my-pos-out-inventory-report-'.time().'.pdf"');
    echo $dompdf->output(); 
    //   $dompdf->stream('total-sales-report.pdf', ['Attachment' => 0]);

    // echo json_encode([$_POST['isSelected'], "asdf"]);
?>