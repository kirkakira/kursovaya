<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Application;

class ApplicationController extends Controller
{
    public function actionCreate($tournament_id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $model = new Application();
        $model->user_id = Yii::$app->user->id;
        $model->tournament_id = $tournament_id;
        $model->created_at = time();

        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Заявка подана успешно!');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при подаче заявки');
        }

        return $this->redirect(['site/tournaments']);
    }
}