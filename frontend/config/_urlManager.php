<?php
return [
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'baseUrl' => getenv('FRONTEND_HOST_URL'),
    'rules' => [
//        ['pattern' => '/', 'route' => 'site/index'],
//        ['pattern' => '/<action>', 'route' => 'site/<action>'],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'user', 'pluralize' => false],
    ],
];
