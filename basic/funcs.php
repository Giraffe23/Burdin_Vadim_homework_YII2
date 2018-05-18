<?php
function _log($data) {
    \Yii::info(\yii\helpers\VarDumper::dumpAsString($data, 5, $highlight = true), '_');
}

function _end($data) {
    echo \yii\helpers\VarDumper::dumpAsString($data, 5, $highlight = true);
    exit();
}

function app() {
    return \Yii::$app;
}