<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property integer $id
 * @property string $hp
 * @property string $type
 * @property double $bal
 * @property string $created
 * @property string $mark
 * @property string $pair_id
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hp', 'type', 'bal'], 'required'],
            [['bal'], 'number'],
            [['created'], 'safe'],
            [['type'], 'string', 'max' => 8],
            [['mark'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hp' => 'No. Hp',
            'type' => 'Tipe Transaksi',
            'bal' => 'Balance',
            'created' => 'Created At',
            'mark' => 'Mark',
        ];
    }
}
