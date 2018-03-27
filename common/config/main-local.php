<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=painting_tool', //rajencba_paintings
            'username' => 'root', //rajencba_paint
            'password' => '', //uC}},n)Ke2wc
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
               'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'sumanasdev@gmail.com',
                'password' => 'sum@n@stech',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
