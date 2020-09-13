<?php

use app\models\LibraryUser;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BorrowingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Výpůjčky';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nová výpůjčka', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'emptyText' => 'Nejsou evidovány žádné výpůjčky.',
        'columns' => [

            // you may configure additional properties here
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>


</div>