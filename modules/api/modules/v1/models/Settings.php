<?php

namespace app\modules\api\modules\v1\models;

use yii\helpers\Url;

class Settings extends \app\models\Settings
{
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['id']);

        return $fields;
    }
}
