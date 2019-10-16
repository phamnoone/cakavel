<?php
require __DIR__ . '/core/app.php';
$app = new App();

$app->autoload();
$app->config();
$app->start();
$con = $app->controller();
if (!empty($con)) {
    $con->router();
} else {
    $app->require('/app/views/errors/404.php');
}
