<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibraryUser */

$this->title = 'Přidat čtenáře';
$this->params['breadcrumbs'][] = ['label' => 'Čtenáři', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>