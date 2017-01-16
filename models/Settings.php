<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class Settings extends \app\models\base\Settings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge (parent::rules(), []);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge (parent::attributeLabels(), []);
    }

    /**
     * @inheritdoc
     * @return SettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SettingsQuery(get_called_class());
    }
}
