<?php

use backend\models\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Subject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->dropDownList([ ArrayHelper::map(Student::find()->all(), 'student_id','name')], ['prompt'=>'Select the Student'] ) ?>

    <?= $form->field($model, 'subjects')->dropDownList([
        'Math' => 'Math',  'Science' => 'Science', 'Hindi' => 'Hindi', 'G.K.' => 'G.K.', ],
          ['prompt' => 'Select Subject']) ?>

    <?= $form->field($model, 'marks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
