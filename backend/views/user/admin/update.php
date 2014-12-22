<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 */

$this->title = Yii::t('user', 'Update user account');

$roles = ['admin'=>'Admin', 'editor'=>'Editor', 'user'=>'User'];
?>
<section class="content-header">
    <h1><i class="glyphicon glyphicon-user"></i> <?= Html::encode($model->username)?>  <?= Html::a(Yii::t('user', 'Show user account'), ['/user/profile/show','id'=>$model->id], ['class' => 'btn btn-success btn-xs']) ?>
        <?php if (!$model->getIsConfirmed()): ?>
            <?= Html::a(Yii::t('user', 'Confirm'), ['confirm', 'id' => $model->id], ['class' => 'btn btn-success btn-xs', 'data-method' => 'post']) ?>
        <?php endif; ?>
        <?php if ($model->getIsBlocked()): ?>
            <?= Html::a(Yii::t('user', 'Unblock'), ['block', 'id' => $model->id], ['class' => 'btn btn-success btn-xs', 'data-method' => 'post', 'data-confirm' => Yii::t('user', 'Are you sure to block this user?')]) ?>
        <?php else: ?>
            <?= Html::a(Yii::t('user', 'Block'), ['block', 'id' => $model->id], ['class' => 'btn btn-danger btn-xs', 'data-method' => 'post', 'data-confirm' => Yii::t('user', 'Are you sure to block this user?')]) ?>
        <?php endif; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= Url::to(['/user/admin/index']); ?>">Users</a></li>
        <li class="active"><?= Html::encode($this->title); ?></li>
    </ol>
</section>
<section class="content">

<?php echo $this->render('@dektrium/user/views/admin/flash') ?>

<div class="panel panel-info">
    <div class="panel-heading"><?= Yii::t('user', 'Information') ?></div>
    <div class="panel-body">
        <?= Yii::t('user', 'Registered at {0, date, MMMM dd, YYYY HH:mm} from {1}', [$model->created_at, is_null($model->registration_ip) ? 'N/D' : long2ip($model->registration_ip)]) ?>
        <br/>
        <?php if (Yii::$app->getModule('user')->enableConfirmation && $model->getIsConfirmed()): ?>
            <?= Yii::t('user', 'Confirmed at {0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]) ?>
            <br/>
        <?php endif; ?>
        <?php if ($model->getIsBlocked()): ?>
            <?= Yii::t('user', 'Blocked at {0, date, MMMM dd, YYYY HH:mm}', [$model->blocked_at]) ?>
        <?php endif;?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => 25]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?=  $form->field($model, 'role')->dropDownList($roles) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
</section>
