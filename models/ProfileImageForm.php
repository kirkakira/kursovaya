<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ProfileImageForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 2],
        ];
    }

    public function upload($userId)
    {
        if ($this->validate()) {
            $filename = 'user_' . $userId . '_' . time() . '.' . $this->imageFile->extension;
            $path = 'uploads/profile_images/' . $filename;

            if (!file_exists('uploads/profile_images/')) {
                mkdir('uploads/profile_images/', 0777, true);
            }

            $this->imageFile->saveAs($path);
            return $filename;
        }
        return false;
    }
}