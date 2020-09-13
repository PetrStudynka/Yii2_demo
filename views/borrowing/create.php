<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Borrowing */

$this->title = 'Přidat výpůjčku';
$this->params['breadcrumbs'][] = ['label' => 'Výpůjčky', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>