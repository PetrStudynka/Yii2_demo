<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Borrowing */

$this->title = 'Detail výpůjčky: ' . $model->id_borrowing;
$this->params['breadcrumbs'][] = ['label' => 'Výpůjčky', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="borrowing-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!$model->returned) echo Html::a('Vráceno', ['update', 'id' => $model->id_borrowing], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_borrowing',
            [
                'attribute' => 'user',
                'value' => function ($model) {
                    return $model->users->first_name . ' ' . $model->users->last_name;
                }
            ],

            [
                'attribute' => 'book',
                'value' => function ($model) {
                    return $model->books->name;
                }
            ],
            'borrowed:datetime',
            'returned:datetime',
        ],
    ]) ?>

</div>