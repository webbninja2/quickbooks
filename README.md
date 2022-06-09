## Create Invoice using Quickbook

- [Quickbook SDK](https://github.com/intuit/QuickBooks-V3-PHP-SDK)
- [Quickbook API Docs](https://developer.intuit.com/app/developer/qbo/docs/api/accounting/all-entities/account)
- [Grab Client ID & Secret](https://developer.intuit.com/app/developer/qbo/docs/get-started/start-developing-your-app)

## Composer Compatible

```bash
composer install
```

## Configuration
```php
$config = [
    'authorizationRequestUrl'   => 'https://appcenter.intuit.com/connect/oauth2',
    'tokenEndPointUrl'          => 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer',
    'client_id'                 => '{ClientID}',
    'client_secret'             => '{ClientSecret}',
    'oauth_scope'               => 'com.intuit.quickbooks.accounting openid profile email phone',
    'oauth_redirect_uri'        => 'http://localhost//quickbooks-callback.php' // Redirection URL
];
```

## Example Usage
```php

require_once(__DIR__ . '/vendor/autoload.php');

use QuickBooksOnline\API\DataService\DataService;
.
.
.
.
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

```
