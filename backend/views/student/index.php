<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\grid\ActionColumn;
use backend\models\Student;

/** @var yii\web\View $this */
/** @var backend\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showHeader'=>true,
        'showFooter'=> true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           [
                 'attribute'=>'name',
                 'format'=> 'html',
                 'label'  => 'Users',
                 'footer'=>'Freinds',

           ],
            'class',
           [
                  'attribute'=> 'house',
                  'label'=>'House/Teams',
                  'value'=>function ($data){
                    if($data->house=='Green'){
                     
                      return   $data->house.' ✨Rocks';
                         
                    }
                    else{
                        return $data->house;
                    }
                  },
               'contentOptions' => function($model) {
     
                switch($model->house) {
                    case 'Red': return ['style' => 'background-color:red; font-weight:bold;'];
                    case 'Green': return ['style' => 'background-color:green; font-weight:bold;'];
                    case 'Blue': return ['style' => 'background-color:blue; font-weight:bold;'];
                    default: return [];
                }
            },
    'filter' => ['Blue' => 'Blue', 'Green' => 'Green', 'Red' => 'Red'], 
                 
           ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'header'=>'Actions',
                 'headerOptions'=>['width'=>130],
                 'template'=>'{update}{view}{delete}',
            ],
        ],
        'layout'=>"{items}\n{summary}\n{pager}",
       'rowOptions'=> ['class'=> ''],
       'showOnEmpty'=>false,
       'emptyCell'=>'N/A', 
    ]); 
     
    
    ?> 
    
    <?php Pjax::begin(); // Enables AJAX-based pagination and sorting
    // echo ListView::widget([
    //     'dataProvider' => $dataProvider,
    //     'itemView' => function ($model, $key, $index, $widget) {
    //         return '
    //         <div class="list-item">
    //             <h3 class="item-name">' . htmlspecialchars($model->name) . '</h3>
    //             <p class="item-house">House: ' . htmlspecialchars($model->house) . '</p>
    //             <p class="item-class">Class: ' . htmlspecialchars($model->class) . '</p>
    //         </div>';
    //     },
    //     'options' => ['class' => 'list-view-wrapper'], // Wrapper for the entire list
    //     'itemOptions' => ['class' => 'list-view-item well'], // Styling each item block
    //     'layout' => "{summary}\n{items}\n<div class='pagination-wrapper'>{pager}</div>", // Layout customization
    //     'summary' => 'Showing {count} of {totalCount} items.', // Summary text at the top
    //     'emptyText' => '<div class="alert alert-warning">No records found.</div>', // Display when no data available
    //     'pager' => [
    //         'class' => 'yii\widgets\LinkPager',
    //         'options' => ['class' => 'pagination'], // Pagination wrapper class for Bootstrap styling
    //         'firstPageLabel' => 'First',
    //         'lastPageLabel' => 'Last',
    //         'maxButtonCount' => 5, // Limit number of displayed page buttons
    //     ],
    // ]);
    // Pjax::end();
    // ?>


</div>
