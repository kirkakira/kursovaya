<?php
use yii\helpers\Html;

$this->title = 'Мой профиль';
?>
<div class="profile-page">
    <div class="container">
        <div class="card">
            <div class="d-flex align-items-center mb-4">
                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                    <img src="img/icon.png" alt="" style="width: 80px; height: 80px;">
                </div>
                <div class="ms-4">
                    <h1 class="mb-1"><?= Html::encode(Yii::$app->user->identity->username) ?></h1>
                    <p class="text-muted mb-0">Участник с <?= Yii::$app->formatter->asDate(Yii::$app->user->identity->created_at) ?></p>
                </div>
            </div>

            <div class="applications-list">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Мои заявки</h2>
                    <span class="badge bg-primary rounded-pill"><?= count($applications) ?></span>
                </div>

                <?php if (!empty($applications)): ?>
                    <div class="row">
                        <?php foreach ($applications as $app): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h4 class="mb-0"><?= $app->tournament->name ?></h4>
                                            <span class="status-badge">
    <?= Html::encode($app->status) ?>
</span>
                                        </div>
                                        <p class="text-muted"><i class="far fa-calendar-alt me-2"></i>Дата подачи: <?= Yii::$app->formatter->asDate($app->created_at) ?></p>

                                        <?php if ($app->status == 'одобрена'): ?>
                                            <div class="alert alert-success mt-3 mb-0">
                                                <i class="fas fa-check-circle me-2"></i> Ваша заявка одобрена! Ждем вас на турнире.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="card text-center py-5">
                        <i class="far fa-folder-open mb-3" style="font-size: 3rem; color: #adb5bd;"></i>
                        <h4>У вас пока нет заявок</h4>
                        <p class="text-muted">Примите участие в турнире, чтобы увидеть свои заявки здесь</p>
                        <?= Html::a('Посмотреть турниры', ['/site/tournaments'], ['class' => 'btn btn-primary mt-3']) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>