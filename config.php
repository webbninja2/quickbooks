<?php
$config = [
    'authorizationRequestUrl' => 'https://appcenter.intuit.com/connect/oauth2',
    'tokenEndPointUrl' => 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer',
    'client_id' => '{ClientID}',
    'client_secret' => '{ClientSecret}',
    'oauth_scope' => 'com.intuit.quickbooks.accounting openid profile email phone address',
    'oauth_redirect_uri' => 'http://localhost//quickbooks-callback.php' // Redirection URL
];
