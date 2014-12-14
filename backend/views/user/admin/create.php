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
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 */

$this->title = Yii::t('user', 'Create a user account');

$roles = ['admin'=>'Admin', 'editor'=>'Editor', 'user'=>'User'];
?>
<section class="content-header">
    <h1><?= Html::encode($this->title) ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= Url::to(['/user/admin/index']); ?>">Users</a></li>
        <li class="active"><?= Html::encode($this->title); ?></li>
    </ol>
</section>
<section class="content">
<?php echo $this->render('@dektrium/user/views/admin/flash') ?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="alert alert-info">
            <?= Yii::t('user', 'Password and username will be sent to user by email') ?>.
            <?= Yii::t('user', 'If you want password to be generated automatically leave its field empty') ?>.
        </div>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => 25, 'autofocus' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?=  $form->field($model, 'role')->dropDownList($roles) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
</section>
