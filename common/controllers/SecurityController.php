<?php

namespace common\controllers;

use dektrium\user\controllers\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController
{
    public function actionLogin()
    {
        $model = $this->module->manager->createLoginForm();

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $user_id = \Yii::$app->user->identity->id;
            $profile = $this->module->manager->findProfileById($user_id);
            $name = is_null($profile->name) || empty(trim($profile->name))?\Yii::$app->user->identity->username:$profile->name;
            \Yii::$app->session->set('user.name', $name);
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

     /**
     * Logs the user out and then redirects to the homepage.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->getUser()->logout();

        return $this->redirect(['//site/about']);//$this->goHome();
    }
}
?>