<?php
require_once(dirname(__FILE__) . '/veritrans-php-snap/Veritrans.php');
include 'koneksi/koneksi.php';

$id = $_GET['id'];

//Set Your server key
Veritrans_Config::$serverKey = "SB-Mid-server-XINyP-WmlcjKPaN1IuLBEMA5";

// Uncomment for production environment
// Veritrans_Config::$isProduction = true;

// Enable sanitization
Veritrans_Config::$isSanitized = true;

// Enable 3D-Secure
Veritrans_Config::$is3ds = true;

// query sql untuk melihat detail costumer & jumlah pesanan tiket
$queryinvoice_transaction = mysqli_query($konek, "SELECT
                        tbl_cart.cart_qty,
                        
                        tbl_customer.cst_id,
                        tbl_customer.cst_name,
                        tbl_customer.cst_email,
                        tbl_customer.cst_notelp,

                        tbl_ticket.tkt_id,
                        tbl_ticket.tkt_price,
                        tbl_ticket.tkt_fee,
                        
                        tbl_transaction.trans_id,
                        tbl_transaction.trans_date,

                        tbl_event.event_id,
                        tbl_event.event_name,
                        tbl_event.event_time_start,
                        tbl_event.event_date_start
                        
                        FROM
                        tbl_transaction
                        INNER JOIN tbl_cart ON tbl_transaction.cart_id = tbl_cart.cart_id
                        INNER JOIN tbl_event ON tbl_cart.event_id = tbl_event.event_id
                        INNER JOIN tbl_ticket ON tbl_cart.tkt_id = tbl_ticket.tkt_id
                        INNER JOIN tbl_customer ON tbl_transaction.cst_id = tbl_customer.cst_id
                    
                        WHERE tbl_transaction.trans_id='$id'");
                    $invoice_tr = mysqli_fetch_assoc($queryinvoice_transaction);
// Required
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => 100, //$invoice_tr['tkt_price'] * $invoice_tr['cart_qty'], // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
  'id' => 'a1',
  'price' => $invoice_tr['tkt_price'] + $invoice_tr['tkt_fee'],
  'quantity' => $invoice_tr['cart_qty'],
  'name' => $invoice_tr['event_name']
);

// Optional
$item_details = array ($item1_details);

// Optional
$billing_address = array(
  'first_name'    => $invoice_tr['cst_name'],
  'last_name'     => "",
  'address'       => "Mangga 20",
  'city'          => "Jakarta",
  'postal_code'   => "16602",
  'phone'         => $invoice_tr['cst_notelp'],
  'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
  'first_name'    => $invoice_tr['cst_name'],
  'last_name'     => "",
  'address'       => "Manggis 90",
  'city'          => "Jakarta",
  'postal_code'   => "16601",
  'phone'         => $invoice_tr['cst_notelp'],
  'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
  'first_name'    => $invoice_tr['cst_name'],
  'last_name'     => "",
  'email'         => $invoice_tr['cst_email'],
  'phone'         => $invoice_tr['cst_notelp'],
  'billing_address'  => $billing_address,
  'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
$enable_payments = array(
  "credit_card",
  "gopay",
  "shopeepay",
  "permata_va",
  "bca_va",
  "bni_va",
  "bri_va",
  "echannel",
  "other_va",
  "danamon_online",
  "mandiri_clickpay",
  "cimb_clicks",
  "bca_klikbca",
  "bca_klikpay",
  "bri_epay",
  "xl_tunai",
  "indosat_dompetku",
  "kioson",
  "Indomaret",
  "alfamart",
  "akulaku"
);

// Fill transaction details
$transaction = array(
  'enabled_payments' => $enable_payments,
  'transaction_details' => $transaction_details,
  'customer_details' => $customer_details,
  'item_details' => $item_details,
);

// if(isset($_POST['btn-pay'])){
//   echo $_POST['pay_id'];
//   echo $_POST['pay_date'];
// }

// $AddPay = mysqli_query($konek, "INSERT INTO tbl_pay VALUES ("");

$snapToken = Veritrans_Snap::getSnapToken($transaction);
// echo "snapToken = ".$snapToken;
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <title>Artatix - Event Invoice</title>
  <!-- Library CSS -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Order confirmation </title>
  <meta name="robots" content="noindex,nofollow" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

    body {
      margin: 0;
      padding: 0;
      background: #e1e1e1;
    }

    div,
    p,
    a,
    li,
    td {
      -webkit-text-size-adjust: none;
    }

    .ReadMsgBody {
      width: 100%;
      background-color: #ffffff;
    }

    .ExternalClass {
      width: 100%;
      background-color: #ffffff;
    }

    body {
      width: 100%;
      height: 100%;
      background-color: #e1e1e1;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
    }

    html {
      width: 100%;
    }

    p {
      padding: 0 !important;
      margin-top: 0 !important;
      margin-right: 0 !important;
      margin-bottom: 0 !important;
      margin-left: 0 !important;
    }

    .visibleMobile {
      display: none;
    }

    .hiddenMobile {
      display: block;
    }

    @media only screen and (max-width: 600px) {
      body {
        width: auto !important;
      }

      table[class=fullTable] {
        width: 96% !important;
        clear: both;
      }

      table[class=fullPadding] {
        width: 85% !important;
        clear: both;
      }

      table[class=col] {
        width: 45% !important;
      }

      .erase {
        display: none;
      }
    }

    @media only screen and (max-width: 420px) {
      table[class=fullTable] {
        width: 100% !important;
        clear: both;
      }

      table[class=fullPadding] {
        width: 85% !important;
        clear: both;
      }

      table[class=col] {
        width: 100% !important;
        clear: both;
      }

      table[class=col] td {
        text-align: left !important;
      }

      .erase {
        display: none;
        font-size: 0;
        max-height: 0;
        line-height: 0;
        padding: 0;
      }

      .visibleMobile {
        display: block !important;
      }

      .hiddenMobile {
        display: none !important;
      }
    }
  </style>

    <!-- Header -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
      <tr>
        <td height="20"></td>
      </tr>
      <tr>
        <td>
          <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
            <tr class="hiddenMobile">
              <td height="40"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="30"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td>
                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                          <tbody>
                            <tr>
                              <td align="left"> <img src="img/logo/Artatix3.png" width="32" height="32" alt="logo" border="0" /></td>
                            </tr>
                            <tr class="hiddenMobile">
                              <td height="40"></td>
                            </tr>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; color: #1f1f95; font-family: 'poppins', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                Hello,<b><?= $invoice_tr['cst_name'] ?></b>.
                                <br> Thank you for use Artatix and for your order.
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                          <tbody>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td height="5"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 21px; color: #1e1f95; letter-spacing: -1px; font-family: ' Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                Invoice
                              </td>
                            </tr>
                            <tr>
                            <tr class="hiddenMobile">
                              <td height="50"></td>
                            </tr>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; color: #1f1f95; font-family: 'poppins', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                <small>ORDER</small> #<?= $invoice_tr['trans_id'] ?><br />

                                <small><?= date('d-M-Y', strtotime($invoice_tr['trans_date'])); ?></small>

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!-- /Header -->
    <!-- Order Details -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
      <tbody>
        <tr>
          <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
              <tbody>
                <tr>
                <tr class="hiddenMobile">
                  <td height="60"></td>
                </tr>
                <tr class="visibleMobile">
                  <td height="40"></td>
                </tr>
                <tr>
                  <td>
                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding" style="margin-bottom: 50px">
                      <tbody>
                        <tr>
                          <th style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1f1f95; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" align="left">
                            Event
                          </th>
                          <th style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1f1f95; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                          Quantity
                          </th>
                          <th style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1f1f95; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                          Date Time Event
                          </th>
                          <th style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                            Harga
                          </th>
                        </tr>
                        <tr>
                          <td height="1" style="background: #bebebe;" colspan="4">
                        </td>
                        </tr>
                        <tr>
                          <td height="10" colspan="4"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e;   line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                            <?= $invoice_tr['event_name'] ?>
                          </td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>  <?= $invoice_tr['cart_qty'] ?></small></td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center"><small><?= date('d M y', strtotime($invoice_tr['event_date_start'])); ?> </small></td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right"><small><?= $hasil_rupiah = "Rp " . number_format($invoice_tr['tkt_price'] + $invoice_tr['tkt_fee'], 0, ',', '.'); ?></small></td>
                        </tr>

                        <tr>
                          <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td height="20"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- /Order Details -->
    <!-- Total -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
      <tbody>
        <tr>
          <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
              <tbody>
                <tr>
                  <td>

                    <!-- Table Total -->
                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                      <tbody>
                        <tr>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            Total
                          </td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                            <strong><?= $hasil_rupiah = "Rp " . number_format($invoice_tr['tkt_price'] * $invoice_tr['cart_qty'] + $invoice_tr['tkt_fee'], 0, ',', '.'); ?></strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- /Table Total -->

                  </td>
                </tr>
                <tr>
                  <td>

                    <!-- Table Total -->
                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                      <tbody>
                        <tr>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            <form action="payment.php" method="post" id="hdnForm">
                              <input type="hidden" name="result_data">
                              <input type="hidden" name="pay_id" id="orId" value="">
                              <input type="hidden" name="pay_date" id="dateTrans" value="">
                              <input type="hidden" name="pay_status" id="status" value="">
                              <input type="hidden" name="cst_id" value="<?= $invoice_tr['cst_id'] ?>">
                              <button type="button" name="btn-pay" id="pay-button">Pay</button>
                            </form>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- /Table Total -->

                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- /Total -->
    <!-- Information -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
      <tbody>
        <tr>
          <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
              <tbody>
                <tr>
                <tr class="hiddenMobile">
                  <td height="60"></td>
                </tr>
                <tr class="visibleMobile">
                  <td height="40"></td>
                </tr>

                <tr class="hiddenMobile">
                  <td height="60"></td>
                </tr>
                <tr class="visibleMobile">
                  <td height="30"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- /Information -->


  

  <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-a1yx-g_oysovDpm_"></script>
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    <script type="text/javascript">

      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {

          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);

            // $(document).ready(function (){
              let orderId = $('#orId').val(result.order_id);
              let status = $('#status').val(result.transaction_status);
              let dateTrans = $('#dateTrans').val(result.transaction_time);
            //   // let payment = $('#payment').val(result.payment_type);

            //   // let cstId = $('#cst_id').val();

              $('#hdnForm').on('submit', function(e){
                return false;
              });

              $('#pay-button').click(function(e){
                e.preventDefault();
                // console.log($("#hdnForm").serialize());
                // $.ajax({
                //   type: $('#hdnForm').attr('method'),
                //   url: $('#hdnForm').attr('action'),
                //   data: $('#hdnForm').serialize(),
                //   success: function (response) {
                //     console.log('berhasil');
                //   }
                // });
              });

            //   if(orderId != "" && status != "" && dateTrans != ""){
            //     let res_id = $('#orId').val();
            //     let res_status = $('#status').val();
            //     let res_date = $('#dateTrans').val();

            //     $.ajax({
            //       type: "POST",
            //       url: "payment.php",
            //       data: [res_id, res_status, res_date],
            //       success: function (response) {
            //         console.log('berhasil');
            //         console.log(this.data);
            //       }
            //     });
            //   } else {
            //     console.log('tidak ada isi nya.');
            //   }

            // });
            
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            // let ress = JSON.parse(JSON.stringify(result));

            // document.getElementById('orId').innerText = ress.order_id;
            // document.getElementById('status').innerText = ress.status_message;
            // document.getElementById('payment').innerText= ress.payment_type;
            // document.getElementById('dateTrans').innerText = ress.transaction_time;
          }
        });
      };
    </script>
    <?php
      echo '<script>$("#orId").val()</script>';
    ?>
  </body>
</html>