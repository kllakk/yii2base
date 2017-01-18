<?php

namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\v1\models\Settings;

class SettingsController extends \app\modules\api\controllers\base\BaseApiController
{
    public $modelClass = '\app\modules\api\modules\v1\models\Settings';

//    public function actions()
//    {
//        $actions = parent::actions();
//        $actions['index']['prepareDataProvider'] = function($action)
//        {
//            return new \yii\data\ActiveDataProvider([
//                'query' => Settings::find()->orderBy(['id' => SORT_DESC]),
//            ]);
//        };
//
//        return $actions;
//    }
}