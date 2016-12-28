<?php

use yii\grid\GridView;
use yii\helpers\Html;

$title = Yii::t('seo', 'SEO');

$this->title = $title . ' | ' . Yii::$app->name;

$this->params['breadcrumbs'] = [
	$title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<div class="btn-toolbar" role="toolbar">
	<?= Html::a(Yii::t('seo', 'Create'), ['create'], ['class' => 'btn btn-primary']) ?>
</div>

<?= GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $model,
	'summary' => '',
	'tableOptions' => ['class' => 'table table-condensed'],
	'columns' => [
		[
			'attribute' => 'path',
			'format' => 'html',
			'value' => function ($model, $key, $index, $column) {
				$path =Html::tag('strong',  Html::encode($model->path));
				$title = Html::tag('span', Html::encode($model->title), ['class' => 'text-muted']);

				return $path . ' ' . $title;
			},
		],
		[
			'class'=>'yii\grid\ActionColumn',
			'options'=>['style'=>'width: 50px;'],
			'template'=>'{update} {delete}',
		],
	],
]) ?>
