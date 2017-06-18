<?php

namespace app\models;

use Yii;
use yii\filters\auth\HttpBasicAuth;


/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $avaible
 * @property double $price
 * @property integer $category_id
 * @property string $image_src_filename
 * @property string $image_web_filename
 */
class Menu extends \yii\db\ActiveRecord
{
    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;  
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'avaible', 'price', 'category_id', 'image_src_filename', 'image_web_filename'], 'required'],
            [['description'], 'string'],
            [['avaible', 'category_id'], 'integer'],
            [['price'], 'number'],
            [['name', 'image_src_filename', 'image_web_filename'], 'string', 'max' => 256],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'nama menu',
            'description' => 'deskripsi menu',
            'avaible' => 'kosong',
            'price' => 'harga/porsi',
            'category_id' => 'kategori',
            'image_src_filename' => 'Image Src Filename',
            'image_web_filename' => 'Image Web Filename',
        ];
    }

}
