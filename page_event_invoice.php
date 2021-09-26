<?php
session_start();
error_reporting(0);
// if ($_SESSION['user_level'] == "") {
//   header("location:page_login.php");
// }

// $_SESSION['pay'] = true;
include "koneksi/koneksi.php";

$id = $_GET['id'];

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

            <?php
                        $queryinvoice = mysqli_query($konek, "SELECT
                        tbl_transaction.trans_id,
                        tbl_transaction.cst_id,
                        tbl_transaction.cart_id,
                        tbl_transaction.trans_total,
                        tbl_transaction.trans_date,
                        
                        tbl_cart.cart_id,
                        tbl_cart.event_id,
                        tbl_cart.tkt_id,
                        tbl_cart.cart_qty,
                        
                        tbl_customer.cst_id,
                        tbl_customer.cst_name,
                        tbl_customer.cst_identity,
                        tbl_customer.cst_no_id,
                        tbl_customer.cst_email,
                        tbl_customer.cst_notelp,
                        tbl_ticket.tkt_id,
                        tbl_ticket.tkt_category,
                        tbl_ticket.tkt_price,
                        tbl_ticket.tkt_date_start,
                        tbl_ticket.event_id,
                        
                        tbl_event.event_id,
                        tbl_event.event_name,
                        tbl_event.event_category,
                        tbl_event.event_description,
                        tbl_event.event_location,
                        tbl_event.event_date_start,
                        tbl_event.event_date_finish,
                        tbl_event.event_time_start,
                        tbl_event.event_time_finish
                        
                    FROM
                        tbl_transaction
                        INNER JOIN tbl_cart ON tbl_transaction.cart_id = tbl_cart.cart_id
                    INNER JOIN tbl_event ON tbl_cart.event_id = tbl_event.event_id
                    INNER JOIN tbl_ticket ON tbl_cart.tkt_id = tbl_ticket.tkt_id
                    INNER JOIN tbl_customer ON tbl_transaction.cst_id = tbl_customer.cst_id
                    
                    WHERE tbl_transaction.trans_id='$id' ");
                        if ($queryinvoice == false) {
                            die("Terjadi Kesalahan : " . mysqli_error($konek));
                        }
                        while ($invoice = mysqli_fetch_array($queryinvoice)) {
                            
                            $event_id = $invoice['event_id'];
                            ?>
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
                                Hello,<b><?= $invoice['cst_name'] ?></b>.
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
                                <small>ORDER</small> #<?= $invoice['trans_id'] ?><br />

                                <small><?= date('d-M-Y', strtotime($invoice['trans_date'])); ?></small>

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
                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                      <tbody>
                        <tr>
                          <th style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1f1f95; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
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
                            <?= $invoice['event_name'] ?>
                          </td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>  <?= $invoice['cart_qty'] ?></small></td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center"><small><?= date('d M y', strtotime($invoice['event_date_start'])); ?> </small></td>
                          <!-- <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small> <?= date('H:i', strtotime($invoice['event_time_start'])); ?>></small></td> -->
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right"><small><?= $hasil_rupiah = "Rp " . number_format($invoice['tkt_price'], 0, ',', '.'); ?></small></td>
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
                            <strong><?= $hasil_rupiah = "Rp " . number_format($invoice['tkt_price']*$invoice['cart_qty'], 0, ',', '.'); ?></strong>
                          </td>
                        </tr>
                        <!-- <tr>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                            Tax &amp; 
                          </td>
                          <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                          <?= $hasil_rupiah = "Rp " . number_format($invoice['tkt_ppn'], 0, ',', '.'); ?>
                          
                          </td>
                          
                        </tr> -->

                        <tr>
                          <!-- <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                            <strong>Grand Total</strong>

                          </td> -->

                          <!-- <td style="font-size: 12px; font-family: 'poppins', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                            <?php $total = $invoice['tkt_price']  ?>
                            <strong> <?= $hasil_rupiah = "Rp " . number_format($total, 0, ',', '.'); ?></strong>
                          </td> -->
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

<?PHP } ?>


</html>