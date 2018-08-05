<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Change your account data';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>
<p>If you want just to reset login leave blank other fields</p>
<p>To change password you must enter previous</p>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'new_login')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'old_password')->passwordInput() ?>

        <?= $form->field($model, 'new_password') ->passwordInput()?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
