<?php

namespace app\modules\api\controllers\base;

use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class BaseApiController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ]
            ],
        ]);
    }
}