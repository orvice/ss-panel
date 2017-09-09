<?php

namespace App\Controllers;

use App\Models\CheckInLog;
use App\Models\InviteCode;
use App\Models\TrafficLog;
use App\Models\User;
use App\Models\Node;
use App\Models\NodeInfoLog;
use App\Models\NodeOnlineLog;
use App\Services\Analytics;
use App\Services\Config;
use App\Utils\Tools;
use App\Services\Mail;
use App\Services\Auth;
use App\Services\Factory;

/**
 *  Ping Controller
 */
class PaymentController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::getUser();
    }

    public function paypal()
    {
        $pp_hostname = "www.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
// read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-synch';

        $tx_token = $_GET['tx'];
        $auth_token = Config::get('paypalPdtAT');
        $req .= "&tx=$tx_token&at=$auth_token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
        $res = curl_exec($ch);
        curl_close($ch);
        if (!$res) {
            //HTTP ERROR
        } else {
            return var_dump($res);
            // parse the data
            $lines = explode("\n", trim($res));
            $keyarray = array();
            if (strcmp($lines[0], "SUCCESS") == 0) {
                for ($i = 1; $i < count($lines); $i++) {
                    $temp = explode("=", $lines[$i], 2);
                    $keyarray[urldecode($temp[0])] = urldecode($temp[1]);
                }
                // check the payment_status is Completed
                // check that txn_id has not been previously processed
                // check that receiver_email is your Primary PayPal email
                // check that payment_amount/payment_currency are correct
                // process payment
                $firstname = $keyarray['first_name'];
                $lastname = $keyarray['last_name'];
                $itemname = $keyarray['item_name'];
                $amount = $keyarray['payment_gross'];

                echo("<p><h3>Thank you for your purchase!</h3></p>");

                echo("<b>Payment Details</b><br>\n");
                echo("<li>Name: $firstname $lastname</li>\n");
                echo("<li>Item: $itemname</li>\n");
                echo("<li>Amount: $amount</li>\n");
                echo("");
            } else if (strcmp($lines[0], "FAIL") == 0) {
                // log for manual investigation
            }
        }

    }

}
