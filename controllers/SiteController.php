<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\User;
use app\models\LoginForm;
use app\models\ProfileImageForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->identity->isAdmin()){
                return $this->redirect(['/admin']);
            }
            return $this->redirect(['profile/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password_hash);
            if ($model->save()) {
                Yii::$app->user->login($model);
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionTournaments()
    {
        $searchModel = new \app\models\TournamentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $tournaments = $dataProvider->getModels();

        return $this->render('tournaments', [
            'searchModel' => $searchModel,
            'tournaments' => $tournaments,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Действие для отдачи изображений профиля
     */
    public function actionProfileImage($filename)
    {
        $path = Yii::getAlias('@webroot/uploads/profile_images/') . $filename;

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, null, [
                'inline' => true,
                'mimeType' => mime_content_type($path)
            ]);
        }

        throw new \yii\web\NotFoundHttpException('Изображение не найдено');
    }

    /**
     * Действие для удаления изображения профиля
     */
    public function actionDeleteProfileImage()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        $user = Yii::$app->user->identity;
        if ($user->profile_image) {
            $path = Yii::getAlias('@webroot/uploads/profile_images/') . $user->profile_image;
            if (file_exists($path)) {
                unlink($path);
            }
            $user->profile_image = null;
            if ($user->save(false)) {
                Yii::$app->session->setFlash('success', 'Фото профиля удалено.');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при удалении фото.');
            }
        }

        return $this->redirect(Yii::$app->request->referrer ?: ['profile/index']);
    }


}