<?php

require_once(__DIR__ . '/vendor/autoload.php');

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Facades\Invoice;

session_start();


// Create SDK instance
include 'config.php';
/*
    * Retrieve the accessToken value from session variable
    */
$accessToken = $_SESSION['sessionAccessToken'];

$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => $config['client_id'],
    'ClientSecret' =>  $config['client_secret'],
    'accessTokenKey' => $accessToken->getAccessToken(),
    'refreshTokenKey' => $accessToken->getRefreshToken(),
    'QBORealmID' => "4620816365213660910",
    'baseUrl' => "development"
));


//Add a new Invoice
$theResourceObj = Invoice::create([
    "Line" => [
        [
            "Amount" => 100.00,
            "DetailType" => "SalesItemLineDetail",
            "SalesItemLineDetail" => [
                "ItemRef" => [
                    "value" => 1,
                    "name" => "Services"
                ]
            ]
        ]
    ],
    "CustomerRef" => [
        "value" => 1
    ],
    "BillEmail" => [
        "Address" => "Familiystore@intuit.com"
    ],
    "BillEmailCc" => [
        "Address" => "a@intuit.com"
    ],
    "BillEmailBcc" => [
        "Address" => "v@intuit.com"
    ]
]);
$resultingObj = $dataService->Add($theResourceObj);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
} else {
    echo "<pre>";
    print_r($resultingObj);
    echo "</pre>";
}
