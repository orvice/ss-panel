<?php


namespace App\Controllers\Api;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use App\Services\Factories\Pay;

class UserPayController extends BaseController
{
    public function paypal(Request $req, Response $res, $args)
    {
        $fee = $req->getParam('fee');

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item = new Item();
        $item->setName(db_config('appName') . "  Payment")
            ->setCurrency(config('paypal.currency'))
            ->setQuantity(1)
            ->setPrice($fee);
        $itemList = new ItemList();
        $itemList->setItems([$item]);

        $amount = new Amount();
        $amount->setCurrency(config('paypal.currency'))
            ->setTotal($fee);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $baseUrl = db_config('appUri');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/pay/paypal")
            ->setCancelUrl("$baseUrl/pay");

        $payment = new Payment();
        $payment->setIntent("order")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create(Pay::newPaypalClient());
        } catch (\Exception $ex) {
            return $this->echoJson($res, [], 500);
        }

        $approvalUrl = $payment->getApprovalLink();

        return $this->echoJson($res, [
            'url' => $approvalUrl,
        ]);
    }

    public function alipay(Request $req, Response $res, $args)
    {

    }
}