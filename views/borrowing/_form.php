<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Book;
use app\models\LibraryUser;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Borrowing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="borrowing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book')->dropDownList(ArrayHelper::map(Book::find()->select(['name', 'id_book'])->all(), 'id_book', 'name'), ['class' => 'form-control inline-block', 'prompt' => 'Vyberte knihu']); ?>
    <?= $form->field($model, 'user')->dropDownList(ArrayHelper::map(LibraryUser::find()->select(['first_name', 'last_name', 'id_user'])->all(), 'id_user', 'displayName'), [
        'class' => 'form-control inline-block',
        'prompt' => 'Vyberte uživatele'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Přidat', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>