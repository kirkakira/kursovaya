<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход в систему';
?>
<div class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card auth-card">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h1 class="mb-3">Вход в систему</h1>
                            <p class="text-muted">Введите свои учетные данные для входа</p>
                        </div>

                        <?php $form = ActiveForm::begin(); ?>
                        <div class="mb-3">
                            <?= $form->field($model, 'username')->textInput([
                                'class' => 'form-control form-control-lg',
                                'placeholder' => 'Имя пользователя'
                            ]) ?>
                        </div>

                        <div class="mb-3">
                            <?= $form->field($model, 'password')->passwordInput([
                                'class' => 'form-control form-control-lg',
                                'placeholder' => 'Пароль'
                            ]) ?>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <?= Html::submitButton('Войти', [
                                'class' => 'btn btn-primary btn-lg'
                            ]) ?>
                        </div>

                        <div class="text-center">
                            <p class="mb-0">Нет аккаунта? <?= Html::a('Зарегистрируйтесь', ['signup'], [
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