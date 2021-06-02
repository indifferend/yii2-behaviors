<?php

namespace indifferentmoviegoer\behaviors\tests\data;

use yii\db\ActiveRecord;
use indifferentmoviegoer\behaviors\CarbonBehavior;
use indifferentmoviegoer\behaviors\PurifyBehavior;

/**
 * Class PostModel
 *
 * @package indifferentmoviegoer\settings\tests\data
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
