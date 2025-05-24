<?php
    require '../../config/functions.php';
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    use Dompdf\Dompdf;

    //Load Composer's autoloader
    require '../../vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $message="";
    $message_array = [
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email Sent:</strong> Please check email in your account.<a href="../../home.php"> Home</a>.
            </div',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email Invalid:</strong> Message could not be sent.
            </div'
    ];
    try {
        
        $email = validate(base64_decode(urldecode($_GET['email'])));

        $stmt=$conn->prepare("SELECT * FROM users WHERE email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result=$stmt->get_result();
        if(mysqli_num_rows($result) > 0){

            // Generate PDF attachment

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
        

            // Output the generated PDF to a string
            $pdfOutput = $dompdf->output();

            // Save the PDF to a temporary file
            $tempPdfPath = sys_get_temp_dir() . '/total-sales-report.pdf';
            file_put_contents($tempPdfPath, $pdfOutput);
            
            // mail($email, $subject, $message);

            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();  
            $mail->isHTML(false);                                          //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'noobcoder1997@gmail.com';                     //SMTP username
            $mail->Password   = 'cuqedjkfxqwhljfd';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email, '');
            $mail->addAddress($email, '');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
            // Attach the PDF to the email
            $mail->addAttachment($tempPdfPath, 'my-pos-total-stock-report-'.time().'.pdf');
            
            //Content
            $mail->Subject = 'My POS Total Stocks Report';
            $mail->Body = "Hi $email,
                            <br>
                            <br>
                            We are pleased to provide you with the Total Stock Report for your records. The attached PDF contains a comprehensive summary of stock transactions, including product details, quantities, statuses, and other relevant information. Please review the report at your convenience.<br><br>
                            If you have any questions or require further assistance, do not hesitate to contact us.<br><br>
                            Best regards,
                            <br>
                            <br>
                            My-POS Team
                            <br>
                            noobcoder1997@gmail.com";
            
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            $message = $message_array[0];
        }       
    } catch (Exception $e) {
        $message = $message_array[1]; //Message could not be sent. Mailer Error: '.$mail->ErrorInfo.
    }
    echo $message;
    //  echo json_encode($message); this technique is use for passing php array to jqajax, make sure to have sa dataType: 'json' in your ajax structure
?>