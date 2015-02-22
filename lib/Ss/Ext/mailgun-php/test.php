<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;


# First, instantiate the SDK with your API credentials and define your domain.
$mg = new Mailgun("key-6b443650120ceae9c7f2dafe9cb905a0");
$domain = "mail.cattt.com";

$from    = "no-reply@mail.cattt.com";
$to      = "web-rI569U@mail-tester.com";
$subject = "Hello World";
$text    = "This is a test from mailgun";

# Now, compose and send your message.
$mg->sendMessage($domain, array('from'    => $from,
                                'to'      => $to,
                                'subject' => $subject,
                                'text'    => $text));