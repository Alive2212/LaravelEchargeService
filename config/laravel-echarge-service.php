<?php

return [
    'username' => '',
    'password' => '',
    'merchant_id' => 0,
//    'url' => 'https://api.echargeservices.com/Services/Strict/Version4/EchargeServiceV4.svc?wsdl',
    'url' => 'https://api.echargeservice.ir/services/Strict/Version3/EchargeService.svc?wsdl',
    'ns' => 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
    'soap' => [
        'stream_context' => [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ],
        'options' => [
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => 0,
        ],
    ],
];