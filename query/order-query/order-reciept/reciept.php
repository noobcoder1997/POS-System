<?php
    // INCLUDE DB
    include '../../../config/functions.php';

    // reference the Dompdf namespace
    // 
    require_once '../../../vendor/autoload.php';

    $change = base64_decode(urldecode(validate($_GET['c1'])));
    $cash = base64_decode(urldecode(validate($_GET['c0'])));
    // $total = base64_decode(urldecode(validate($_GET['total'])));

    use Dompdf\Dompdf;
    use Dompdf\Options;
  
    $options =new Options();
    $options->set('isJavascriptEnabled', true);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf($options);

    $dompdf->set_option('isRemoteEnabled', true);  
    $dompdf->set_option('isHtml5ParserEnabled', true);   
    $dompdf->set_option('isFontSubsettingEnabled', true);
    $dompdf->set_option('isCssFloatEnabled', true);

    // HTML content
    $html = '<html>
                <head>
                    <style>
                        .text-header {
                            text-align: center;
                            margin: 0;
                            align-items: center;
                            justify-content: center;
                            padding:0
                        }
                        .text-footer {
                            text-align: center;
                            margin: 0;
                            align-items: center;
                            justify-content: center;
                            padding:0
                        }
                        body {
                            font-family: Tahoma, sans-serif;
                            font-size: 8px;
                            margin: 0;
                            padding: 0;
                        }
                         @page {
                            margin: 30px 0 0 0;
                            padding: 0;
                        }
                        h6,h5,i {
                            margin: 0;
                            padding: 0;
                            font-size: 8px;
                        } 
                        i{
                            font-size:8px;
                            margin:0;
                            padding:0;
                        }  
                        table{
                            width: 100%;
                            // margin:20px 0 0 0;
                            padding:0;
                        } 
                        text-body{
                            margin: 0;
                            padding: 0;
                        } 
                        td{
                            padding: 2px 12px 0 12px;
                            margin:0;
                        }
                        tr{
                            margin:0
                            padding:0;
                            height:0;
                        }
                    </style>
                </head>
                <body>'; 
    
    $html .= '      <div class="text-header">
                        <h5>'.$_SESSION['store_name'].'</h5>
                        <h6>'.$_SESSION['street'].'</h6>
                        <h6>'.$_SESSION['company'].'</h6>
                        <h6>'.$_SESSION['contact'].'</h6>
                        <br>
                        <i>********************************************************</i>
                                <h5 style="margin-bottom:5px">Order Reciept</h5>
                        <i>********************************************************</i>
                    </div>';       
    $html .= '      <div class="text-body">
                        <table>
                            <tr>
                                <td colspan="2">Date:'.date('m/d/Y h:i:s A').'</td>
                            </tr>
                            <tr>
                                <td colspan="2">Customer: Walk-in</td>
                            </tr>
                            <tr style="margin-bottom:0;height:2px">
                                <td colspan="2">
                                    <i>********************************************************</i>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td style="text-align:right"><strong>Price</strong></td>
                            </tr>';
                            //product information
                            $productInfo = $_SESSION['product'];
                            $total_payment = 0;
                            $total_amount = 0;
                            $discount = 0;
                            foreach($productInfo as $product):
                                $total_amount = ($product['price']*$product['quantity']);
                        
    $html .= '              <tr>
                                <td>'.$product['product_name']."*".$product['quantity'].'</td>
                                <td style="text-align:right">'.number_format($total_amount,2).'</td>
                            </tr>';
                            $total_payment+=$total_amount;
                            endforeach;
    $html .= '              <tr style="margin-bottom:0;height:2px">
                                <td colspan="2">
                                    <i>********************************************************</i>
                                </td>
                            </tr>';
                            
    $html .= '              <tr>
                                <td>Total</td>
                                <td style="text-align:right">'.number_format( $total_payment,2).'</td>
                            </tr>';

    $html .= '              <tr>
                                <td>Cash</td>
                                <td style="text-align:right">'.number_format( $cash,2).'</td>
                            </tr>';

    $html .= '              <tr>
                                <td>Discount</td>
                                <td style="text-align:right">0.00</td>
                            </tr>';
                            
    $html .= '              <tr>
                                <td><strong>NET</strong></td>
                                <td style="text-align:right"><strong>'.number_format( $total_payment,2).'</strong></td>
                            </tr>';

    $html .= '              <tr>
                                <td>Change</td>
                                <td style="text-align:right">'.number_format(($change),2).'</td>
                            </tr>';
    $html .= '          </table>

                    </div> ';

    $html .= '   <div class="text-footer">
                    <i>********************************************************</i>
                                        <!-- Barcode section-->
                                                  
                        <h5 style="margin-bottom:5px">Thank you! Come again!</h5>                                
                    <i>********************************************************</i>
                </div>';

    $html .= '  <script type="text/javascript">
                    try {
                        this.print();
                    }
                    catch(e) {
                        window.onload = window.print;
                    }
                </script>';

    $html .= '  </body>
            </html>';

    // Load HTML content
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper(array(0,0,204,650));

    // (Optional) Setup the paper size and orientation
    $dompdf->set_option('dpi', 72);
    // $dompdf->set_option('isPhpEnabled', true); 

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
    // $dompdf->stream('file.pdf', array( 'Attachment'=>0 ) );

    unset($_SESSION['product']);
    unset($_SESSION['ids']);
// ?>