<?php

if ($_SERVER['REQUEST_URI'] == '/') {
    echo 'For 
            </br> - add a car in list "/car/add" 
            </br> - delete a car from list "/car/delete"
            </br> - update a car information "/car/update"
            </br> - get car list "/car/list"
            </br>       options:
            </br>           ?limit=number
            </br>           ?limit=number&offset=number
            </br>           ?order=columnname
        ';
    die();
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/config/web.php';

(new yii\web\Application($config))->run();

?>