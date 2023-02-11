<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

function vdd($data = null) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

function vd($data = null) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function pre($data = null) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 * @param string|array $permissionNames
 * @return bool
 */
function can($permissionNames, $all = false): bool
{
    if (is_array($permissionNames)) {
        $result = $all;
        if ($all) {
            foreach ($permissionNames as $permissionName) {
                $result &= Yii::$app->user->can($permissionName);
            }
        } else {
            foreach ($permissionNames as $permissionName) {
                $result |= Yii::$app->user->can($permissionName);
            }
        }
        return $result;
    }
    return Yii::$app->user->can($permissionNames);
}