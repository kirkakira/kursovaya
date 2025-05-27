<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Application;
use app\models\ProfileImageForm;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $applications = Application::find()
            ->with('tournament')
            ->where(['user_id' => Yii::$app->user->id])
            ->all();

        $model = new ProfileImageForm();
        $user = Yii::$app->user->identity;

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $filename = $model->upload($user->id);
                if ($filename) {
                
                    if ($user->profile_image && file_exists('uploads/profile_images/' . $user->profile_image)) {
                        unlink('uploads/profile_images/' . $user->profile_image);
                    }

                    $user->profile_image = $filename;
                    if ($user->save(false)) {
                        Yii::$app->session->setFlash('success', 'Фото профиля успешно обновлено!');
                    } else {
                        Yii::$app->session->setFlash('error', 'Ошибка при сохранении данных.');
                    }
                    return $this->refresh();
                }
            }
        }

        return $this->render('index', [
            'applications' => $applications,
            'model' => $model,
        ]);
    }

    public function actionDeleteImage()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $user = Yii::$app->user->identity;
        if ($user->profile_image) {
            if (file_exists('uploads/profile_images/' . $user->profile_image)) {
                unlink('uploads/profile_images/' . $user->profile_image);
            }
            $user->profile_image = null;
            if ($user->save(false)) {
                Yii::$app->session->setFlash('success', 'Фото профиля удалено.');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при удалении фото.');
            }
        }

        return $this->redirect(['index']);
    }
}
