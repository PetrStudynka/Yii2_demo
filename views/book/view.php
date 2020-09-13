<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $book app\models\Book */
/* @var $genreBook app\models\Book */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Přidat žánr knize: ' . $book->name . ' - ' . $book->author;
$this->params['breadcrumbs'][] = ['label' => 'Knihy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($genreBook, 'genre')->dropDownList($book->getGenreNames(), ['class' => 'form-control inline-block', 'prompt' => 'Vyberte další žánr']); ?>

    <div class="form-group">
        <?= Html::submitButton('Přidat', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>