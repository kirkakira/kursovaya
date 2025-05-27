<?php
use yii\helpers\Html;

$this->title = 'CodeOlymp - Главная';
?>
<div class="hero-section">
    <div class="container">
        <div class="card text-center p-5" style="background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%); color: white;">
            <h1 class="mb-4">Добро пожаловать на CodeOlymp</h1>
            <p class="lead mb-4" style="font-size: 1.25rem; opacity: 0.9;">Платформа для проведения олимпиад по программированию</p>
            <div class="cta-buttons d-flex justify-content-center gap-3">
                <?= Html::a('Все турниры', ['tournaments'], ['class' => 'btn btn-light btn-lg px-4']) ?>
                <?= Html::a('Мой профиль', ['profile/index'], ['class' => 'btn btn-outline-light btn-lg px-4']) ?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 text-center">
                    <i class="fas fa-trophy mb-3" style="font-size: 2.5rem; color: var(--primary);"></i>
                    <h3>Соревнования</h3>
                    <p>Участвуйте в турнирах и покажите свои навыки программирования</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 text-center">
                    <i class="fas fa-chart-line mb-3" style="font-size: 2.5rem; color: var(--primary);"></i>
                    <h3>Развитие</h3>
                    <p>Совершенствуйте свои навыки, решая интересные задачи</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 text-center">
                    <i class="fas fa-users mb-3" style="font-size: 2.5rem; color: var(--primary);"></i>
                    <h3>Сообщество</h3>
                    <p>Общайтесь с единомышленниками и находите новых друзей</p>
                </div>
            </div>
        </div>
    </div>
</div>