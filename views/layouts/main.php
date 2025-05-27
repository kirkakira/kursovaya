<?php

use yii\bootstrap5\Nav;
use yii\helpers\Html;
$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php
        $this->head();
        $this->registerLinkTag([
            'rel' => 'stylesheet',
            'href' => 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap'
        ]);
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            :root {
                --primary: #4361ee;
                --primary-light: #e6f0ff;
                --secondary: #3f37c9;
                --dark: #1a1a2e;
                --light: #f8f9fa;
                --success: #4cc9f0;
                --danger: #f72585;
                --warning: #f8961e;
                --info: #4895ef;
                --border-radius: 12px;
                --shadow: 0 4px 20px rgba(0,0,0,0.08);
                --transition: all 0.3s ease;
            }

            body {
                font-family: 'Inter', sans-serif;
                background-color: #e4e4fc;
                color: #333;
                line-height: 1.6;
            }

            .main-header {
                background: white;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;

                background-color: #d4d4fa;

            }
            .main-header{
                background-color: #d4d4fa;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--primary);
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .logo::before {
                content: "</>";
                font-size: 1.8rem;
            }

            .nav-links .nav {
                display: flex;
                gap: 1.5rem;
                align-items: center;
            }

            .nav-links .nav-link {
                color: var(--dark);
                font-weight: 500;
                padding: 0.5rem 1rem;
                border-radius: var(--border-radius);
                transition: var(--transition);
            }

            .nav-links .nav-link:hover {
                color: var(--primary);
                background: var(--primary-light);
            }

            .btn {
                border-radius: var(--border-radius);
                padding: 0.5rem 1.5rem;
                font-weight: 500;
                transition: var(--transition);
            }

            .btn-primary {
                background: var(--primary);
                border-color: var(--primary);
            }

            .btn-primary:hover {
                background: var(--secondary);
                border-color: var(--secondary);
                transform: translateY(-2px);
            }

            .btn-secondary {
                background: white;
                border: 1px solid var(--primary);
                color: var(--primary);
            }

            .btn-secondary:hover {
                background: var(--primary-light);
                transform: translateY(-2px);
            }

            .card {
                background: white;
                border-radius: var(--border-radius);
                box-shadow: var(--shadow);
                border: none;
                padding: 2rem;
                transition: var(--transition);
            }

            .card:hover {
                box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            }

            .main-content {
                padding: 3rem 0;
                min-height: calc(100vh - 150px);
            }

            .main-footer {
                background: var(--dark);
                color: white;
                padding: 2rem 0;
                text-align: center;
            }

            h1, h2, h3, h4 {
                font-weight: 700;
                color: var(--dark);
            }

            h1 {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
            }

            .text-muted {
                color: #6c757d !important;
            }

            .alert {
                border-radius: var(--border-radius);
            }

            .form-control, .form-select {
                border-radius: var(--border-radius);
                padding: 0.75rem 1rem;
                border: 1px solid #e0e0e0;
            }

            .form-control:focus, .form-select:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
            }

            .input-field {
                border-radius: var(--border-radius);
                padding: 0.75rem 1rem;
                border: 1px solid #e0e0e0;
                width: 100%;
            }

            .input-field:focus {
                border-color: var(--primary);
                outline: none;
                box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
            }
        </style>
        <link rel="stylesheet" href="/assets/css/site.css">
    </head>
    <body>
    <?php $this->beginBody() ?>

    <header class="main-header">
        <div class="container">
            <nav class="navbar">
                <a href="http://localhost/kursovaya/web/"><img src="img/icon3.png" alt="" width="120px" height="110px" ></a>


                <div class="nav-links">
                    <?= Nav::widget([
                        'options' => ['class' => 'nav'],
                        'items' => [
                            ['label' => 'Турниры', 'url' => ['/site/tournaments']],
                            Yii::$app->user->isGuest ? (''):(Yii::$app->user->identity->isAdmin() ? (['label'=>'Админ-панель', 'url'=>['/admin/']]) :
                                (['label' => 'Профиль', 'url' => ['/profile/index']])),
                            Yii::$app->user->isGuest ? (
                            ['label' => 'Войти', 'url' => ['/site/login']]
                            ) : (
                                '<li>'
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    'Выйти (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>'
                            )
                        ],
                    ]) ?>
                </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <?= $content ?>
        </div>
    </main>



    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>