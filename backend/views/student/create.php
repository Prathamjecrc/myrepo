<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Student $model */

$this->title = 'Create Student';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-create">
    <h1>Hello Pratham V6</h1>
<h1> <?=Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


