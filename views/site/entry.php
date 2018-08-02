<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title)?></h1>

<?php $form = ActiveForm::begin([
    'id' => 'register-form',
    'fieldConfig' => [
        'template' => "{label}\n{input}{error}",
    ],
]); ?>

<?= $form->field($model, 'login') ?>

<?= $form->field($model, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>