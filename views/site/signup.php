<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>
<div class="site-signup">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h1 class="mb-3"><?= Html::encode($this->title) ?></h1>
                            <p class="text-muted">Создайте учетную запись, чтобы начать участвовать в турнирах</p>
                        </div>

                        <?php $form = ActiveForm::begin(); ?>

                        <div class="mb-3">
                            <?= $form->field($model, 'username')->textInput([
                                'class' => 'form-control form-control-lg',
                                'placeholder' => 'Имя пользователя',
                                'autofocus' => true
                            ]) ?>
                        </div>

                        <div class="mb-3">
                            <?= $form->field($model, 'email')->input('email', [
                                'class' => 'form-control form-control-lg',
                                'placeholder' => 'Email'
                            ]) ?>
                        </div>

                        <div class="mb-3">
                            <?= $form->field($model, 'password_hash')->passwordInput([
                                'class' => 'form-control form-control-lg',
                                'placeholder' => 'Пароль'
                            ])->label('Пароль') ?>
                        </div>

                        <div class="d-grid gap-2">
                            <?= Html::submitButton('Зарегистрироваться', [
                                'class' => 'btn btn-primary btn-lg'
                            ]) ?>
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-0">Уже есть аккаунт? <?= Html::a('Войти', ['login'], [
                                    'class' => 'text-primary fw-bold'
                                ]) ?></p>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>