<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MenuCategory;
use kartik\file\FileInput;



/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php 
      $form = ActiveForm::begin([
          'options'=>['enctype'=>'multipart/form-data']]); // important         
           ?>
           
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'avaible')->dropDownList(
        [['1'=>'Ada'],['0'=>'Habis']],
        ['prompt'=>'Menu tersedia?']
    ) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(MenuCategory::find()->All(), 'id', 'name'),
        ['prompt'=>'Select MenuCategory']
    ) ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
          ]);   ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
