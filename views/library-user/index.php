<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibraryUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Čtenáři';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Přidat čtenáře', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'emptyText' => 'Nejsou evidováni žádní čtenáři.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'last_name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model['id_user']], [

                            'title' => 'Smazat?', 'data-confirm' => "Opravdu chcete smazat čtenáře {$model->first_name} {$model->last_name} ?", 'data-method' => 'post'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>