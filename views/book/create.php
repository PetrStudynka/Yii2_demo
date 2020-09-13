<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $book app\models\Book */
/* @var $genreBook app\models\GenreBook */

$this->title = 'Přidat knihu';
$this->params['breadcrumbs'][] = ['label' => 'Knihy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'book' => $book,
        'genreBook' => $genreBook
    ]) ?>

</div>