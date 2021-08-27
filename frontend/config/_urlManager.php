<?php
return [
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'baseUrl' => getenv('FRONTEND_HOST_URL'),
    'rules' => [
        ['class' => 'yii\rest\UrlRule', 'controller' => 'peoples', 'pluralize' => false],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'phone-numbers', 'pluralize' => false],
        ['pattern' => '/', 'route' => 'site/index'],
        ['pattern' => '/<action>', 'route' => 'site/<action>'],
    ],
];
