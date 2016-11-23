<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idRequest',
            'fullName',
            'passport',
            'nie',
            'tel',
            // 'email:email',
            // 'region',
            // 'address',
            // 'zipcode',
            // 'fromName',
            // 'properties',
            // 'location',
            // 'maxPrice',
            // 'accepted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
