<?php
/**
 * Created by PhpStorm.
 * User: xiaoht
 * Date: 2018/6/3
 * Time: 17:10
 */

namespace common\services;

use Yii;
use yii\log\FileTarget;

class Tools
{
    public static function addLog($mes , $file)
    {
        $time = microtime(true);
        $log = new FileTarget();
        $log->logFile = Yii::$app->getRuntimePath() . $file;
        $log->messages[] = [
            $mes,
            1,
            'application',
            $time
        ];
        $log->export();
    }
}