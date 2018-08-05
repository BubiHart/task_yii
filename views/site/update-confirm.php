<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>New login</label>: <?= Html::encode($model->new_login) ?></li>
    <li><label>Old password</label>: <?= Html::encode($model->old_password) ?></li>
    <li><label>New password</label>: <?= Html::encode($model->new_password) ?></li>
</ul>
