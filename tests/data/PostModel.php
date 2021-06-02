<?php

namespace indifferend\behaviors\tests\data;

use yii\db\ActiveRecord;
use indifferend\behaviors\CarbonBehavior;
use indifferend\behaviors\PurifyBehavior;

/**
 * Class PostModel
 *
 * @package indifferend\settings\tests\data
 */
class PostModel extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'Post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'carbon' => [
                'class' => CarbonBehavior::class,
                'attributes' => [
                    'createdAt',
                ],
            ],
            'purify' => [
                'class' => PurifyBehavior::class,
                'attributes' => ['title'],
                'config' => [
                    'AutoFormat.Linkify' => true,
                    'HTML.TargetBlank' => true,
                    'HTML.Nofollow' => true,
                    'HTML.TidyLevel' => 'heavy',
                ],
            ],
        ];
    }
}
