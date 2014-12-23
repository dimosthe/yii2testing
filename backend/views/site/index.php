<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Company | Dashboard';
?>
<section class="content-header">
	<h1>
    	Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
    	<li><a href="<?= Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
    <div class="row">
    	<?php if(\Yii::$app->user->can('admin')): ?>
    	<div class="col-lg-3 col-xs-6">
	    	<div class="small-box bg-yellow">
	        	<div class="inner">
	            	<h3><?= $users?></h3>
	                <p>User Registrations</p>
	            </div>
	            <div class="icon">
	            	<i class="ion ion-person-stalker"></i>
	            </div>
	            <a href="<?= Url::to(['user/admin/index'])?>" class="small-box-footer">
	            	More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	        </div>
	    </div>
		<?php endif?>
	    <div class="col-lg-3 col-xs-6">
	    	<div class="small-box bg-red">
	        	<div class="inner">
	            	<h3>10</h3>
	                <p>Companies</p>
	            </div>
	            <div class="icon">
	            	<i class="ion ion-briefcase"></i>
	            </div>
	            <a href="#" class="small-box-footer">
	            	More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-xs-6">
	    	<div class="small-box bg-aqua">
	        	<div class="inner">
	            	<h3>10</h3>
	                <p>Campaigns</p>
	            </div>
	            <div class="icon">
	            	<i class="ion ion-document-text"></i>
	            </div>
	            <a href="#" class="small-box-footer">
	            	More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-xs-6">
	    	<div class="small-box bg-green">
	        	<div class="inner">
	            	<h3>100</h3>
	                <p>Active Coupons</p>
	            </div>
	            <div class="icon">
	            	<i class="ion ion-key"></i>
	            </div>
	            <a href="#" class="small-box-footer">
	            	More info <i class="fa fa-arrow-circle-right"></i>
	            </a>
	        </div>
	    </div>
    </div>
</section>
