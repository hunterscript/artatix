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
  'price' => 1,//$invoice_tr['tkt_price'],
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

  <form method="post" id="hdnForm">
    <input type="hidden" name="result_data" id="result-json">
    <button type="button" id="pay-button">pay</button>
  </form>
  
  <!-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>  -->

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

            $(document).ready(function(){
              $('#hdnForm').submit(function(e){
                e.preventDefault();
                $("#pay-button").on('click', function(e){
                  e.preventDefault();
                  
                });
              });
            });
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
      echo $_POST['result_data'];
    ?>
  </body>
</html>