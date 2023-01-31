<?php

namespace tree\models;

use Yii;

/**
 * This is the model class for table "tree".
 *
 * @property int $id
 * @property string $name Полное имя человека
 * @property int|null $birthday День рождения человека
 * @property int|null $death_date День рождения человека
 * @property string|null $spouse_name Полное имя супруг(а)
 * @property int|null $spouse_birthday День рождения супруг(а)
 * @property int|null $spouse_death_date День рождения человека
 * @property int|null $parent_id Родительский идентификатор
 * @property int $created_at
 * @property int|null $updated_at
 *
 * @property Tree $parent
 * @property Tree[] $trees
 */
class Tree extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tree';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['birthday', 'death_date', 'spouse_birthday', 'spouse_death_date', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'spouse_name'], 'string', 'max' => 255],
            [['created_at'], 'default', 'value' => time()],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tree::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        if (!$insert) {
            $this->updated_at = time();
        }
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'birthday' => 'Birthday',
            'death_date' => 'Death Date',
            'spouse_name' => 'Spouse Name',
            'spouse_birthday' => 'Spouse Birthday',
            'spouse_death_date' => 'Spouse Death Date',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Tree::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Trees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrees()
    {
        return $this->hasMany(Tree::class, ['parent_id' => 'id']);
    }
}
