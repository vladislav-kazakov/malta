<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\db\ActiveRecord;

/**
 * Type model
 *
 * @property integer $id
 * @property string $name
 * @property string $name_en
 * @property string $annotation
 * @property string $annotation_en
 * @property string $publication
 * @property string $publication_en
 * @property integer $created_at
 * @property integer $updated_at
 * @property [Category] $categories
 */
class Type extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'ru' => 'Russian',
                    'en' => 'English',
                ],
                'languageField' => 'locale',
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'type_id',
                'tableName' => "{{%type_language}}",
                'attributes' => [
                    'name',
                    'annotation',
                    'publication',
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_en'], 'required'],
            [['name', 'annotation', 'publication'], 'string'],
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * label attr
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'name_en' => 'Название на английском',
            'annotation' => 'Аннотация',
            'annotation_en' => 'Аннотация на английском',
            'publication' => 'Публикации',
            'publication_en' => 'Публикации на английском',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['type_id' => 'id']);
    }
}
