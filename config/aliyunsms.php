<?php
return [
    'region_id'         => env('ALIYUN_SMS_REGION_ID', 'cn-hangzhou'), // regionid
    'access_key'        => env('ALIYUN_SMS_AK','LTAIVDUnGRFU7t3w'), // accessKey
    'access_secret'     => env('ALIYUN_SMS_AS','YVxKB35h7LW8dfQlYFCUPcFIejFyzG'), // accessSecret
    'sign_name'         => env('ALIYUN_SMS_SIGN_NAME','肖weichatapp'), // 签名
    'template_code'         => env('ALIYUN_SMS_TEMPLATE_CODE','SMS_98930018'), // 签名
];