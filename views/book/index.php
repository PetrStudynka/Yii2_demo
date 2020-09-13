<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Knihy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Přidat knihu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'emptyText' => 'Nejsou evidovány žádné knihy.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'author',
            [
                'attribute' => 'genre',
                'value' => function ($model) {

                    return $model->getGenresList();
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {update}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model['id_book']], [

                            'title' => 'Smazat?', 'data-confirm' => 'Opravdu chcete smazat tuhle knihu?', 'data-method' => 'post'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>