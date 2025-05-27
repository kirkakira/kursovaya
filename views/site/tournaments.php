<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tournament;

$this->title = 'Олимпиады по программированию';
$this->registerCss('
    .tournament-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        border-left: 4px solid var(--primary);
    }
    .tournament-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }
    .filter-card {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: var(--shadow);
    }
    .tag {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        background: var(--primary-light);
        font-size: 0.85em;
        margin-right: 8px;
        margin-bottom: 8px;
        color: var(--primary);
        font-weight: 500;
    }
    .page-header {
        margin-bottom: 2.5rem;
    }
    .page-header h1 {
        position: relative;
        display: inline-block;
    }
    .page-header h1::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
    }
');
?>

<div class="tournaments-page">
    <div class="container">
        <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
            <p class="text-muted">Найдите подходящий турнир для участия</p>
        </div>

        <!-- Фильтры -->
        <div class="filter-card">
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'options' => ['class' => 'form-inline']
            ]); ?>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <?= $form->field($searchModel, 'class')->dropDownList(
                        array_combine(range(1, 11), range(1, 11)),
                        ['prompt' => 'Все классы', 'class' => 'form-select']
                    ) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($searchModel, 'language')->dropDownList(
                        Tournament::getLanguages(),
                        ['prompt' => 'Все языки', 'class' => 'form-select']
                    ) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($searchModel, 'age_group')->dropDownList(
                        Tournament::getAgeGroups(),
                        ['prompt' => 'Все возрасты', 'class' => 'form-select']
                    ) ?>
                </div>

                <div class="col-md-2" style="margin-top: 40px">
                    <?= Html::submitButton('<i class="fas fa-search me-2"></i>Поиск', ['class' => 'btn btn-primary w-100']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <!-- Список турниров -->
        <?php if (!empty($tournaments)): ?>
            <div class="tournaments-list">
                <?php foreach ($tournaments as $tournament): ?>
                    <div class="tournament-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h3><?= Html::encode($tournament->name) ?></h3>
                            <span class="text-muted">
                                <i class="far fa-calendar-alt me-2"></i><?= Yii::$app->formatter->asDate($tournament->date) ?>
                            </span>
                        </div>

                        <div class="tags mb-3">
                            <span class="tag"><i class="fas fa-code me-2"></i><?= $tournament->language ?? 'Не указан' ?></span>
                            <span class="tag"><i class="fas fa-graduation-cap me-2"></i><?= $tournament->class ? "{$tournament->class} класс" : 'Не указан' ?></span>
                            <span class="tag">
                                <i class="fas fa-user-friends me-2"></i>
                                <?php
                                $ageGroups = Tournament::getAgeGroups();
                                echo $ageGroups[$tournament->age_group] ?? $ageGroups['unknown'];
                                ?>
                            </span>
                        </div>

                        <?php if ($tournament->description): ?>
                            <p class="text-secondary mb-4">
                                <?= Html::encode($tournament->description) ?>
                            </p>
                        <?php endif; ?>

                        <div class="d-flex justify-content-between align-items-center">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <?= Html::a('<i class="fas fa-sign-in-alt me-2"></i>Войдите для участия', ['/site/login'], [
                                    'class' => 'btn btn-outline-primary'
                                ]) ?>
                            <?php else: ?>
                                <?= Html::a('Участвовать <i class="fas fa-arrow-right ms-2"></i>', ['application/create', 'tournament_id' => $tournament->id], [
                                    'class' => 'btn btn-primary'
                                ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="card text-center py-5">
                <i class="far fa-folder-open mb-3" style="font-size: 3rem; color: #adb5bd;"></i>
                <h4>На данный момент нет доступных турниров</h4>
                <p class="text-muted">Попробуйте изменить параметры поиска или зайдите позже</p>
            </div>
        <?php endif; ?>
    </div>
</div>