<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $book app\models\Book */
/* @var $genreBook app\models\GenreBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($book, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($book, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($genreBook, 'genre')->dropDownList($book->getGenreNames(), ['class' => 'form-control inline-block', 'prompt' => 'Vyberte žánr']); ?>


    <div class="form-group">
        <?= Html::submitButton('Přidat', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>