<?php

use yii\helpers\Html;

$title = $model->title;

$this->title = $title . ' | ' . Yii::$app->name;

$this->params['breadcrumbs'] = [
	['label' => Yii::t('seo', 'SEO'), 'url' => ['index']],
	$title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<?= $this->render('_form', ['model'=>$model]) ?>