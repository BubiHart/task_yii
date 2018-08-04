<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Сhange your data';
$this->params['breadcrumbs'][] = $this->title;

?>
    <h1><?= Html::encode($this->title)?></h1>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin([
            'id' => 'reset-data-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}{error}",
            ],
        ]); ?>

        <?= $form->field($model, 'new_login') ?>

        <?= $form->field($model, 'old_password') ?>

        <?= $form->field($model, 'new_password') ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
