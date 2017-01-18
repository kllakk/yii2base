<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::cssFile('/assets/' . ArrayHelper::getValue(Yii::$app->params['assets'], 'admin.css')) ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    if(!Yii::$app->user->isGuest)  {
        $arrItems[] = ['label' => 'Settings', 'url' => ['/admin/settings']];
    }

    if (Yii::$app->user->isGuest) {
        $arrItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    else  {
        $arrItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    NavBar::begin([
        'brandLabel' => "Админ панель " . \Yii::$app->params['siteBrand'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $arrItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?= Html::jsFile('/assets/' . ArrayHelper::getValue(Yii::$app->params['assets'], 'admin.js')) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
