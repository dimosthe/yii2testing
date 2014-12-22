<?php

namespace backend\controllers;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
	 /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete'  => ['post'],
                    'confirm' => ['post'],
                    'block'   => ['post']
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'block', 'confirm'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return in_array(\Yii::$app->user->identity->role, $this->module->admins);
                        }
                    ],
                ]
            ]
        ];
    }
}

?>