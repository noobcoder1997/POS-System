

<?php
    require '../../config/functions.php';
    require_once '../../vendor/autoload.php'; // Adjust the path to your Dompdf autoload file

    use Dompdf\Dompdf;

    // Generate HTML content     
    $html = '<h1 style="text-align: center">My POS Total Stock Report</h1>';
    $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">';
    $html .= '<thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
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
    $type = null; $status = null; $return = null;

    $sql = "SELECT *, SUM(quantity) AS qty, COUNT(id) AS ids FROM transactions GROUP BY product_id, date, status, type, product_return";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while($row=$result->fetch_assoc()){

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
            $html .= '<td>' . htmlspecialchars($status) . '</td>';
            $html .= '<td>' . htmlspecialchars($type) . '</td>';
            $html .= '<td>' . htmlspecialchars($return) . '</td>';
            $html .= '</tr>';

            $total_qty += $row['qty'];
            $total_pdcts += str_word_count($rowProduct['product_name']);
            $total_sts += str_word_count($status);
            $total_type += str_word_count($type);
            $total_rtn += str_word_count($return);
            
        }

    }
    $html .= '<tr>
                <td style="font-weight:bolder">Total</td>
                <td style="font-weight:bolder">'. $total_pdcts .'</td>
                <td style="font-weight:bolder">'. $total_qty .'</td>
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
    header('Content-Disposition: attachment; filename="my-pos-total-stock-report-'.time().'.pdf"');
    echo $dompdf->output(); 
    //   $dompdf->stream('total-sales-report.pdf', ['Attachment' => 0]);
?>