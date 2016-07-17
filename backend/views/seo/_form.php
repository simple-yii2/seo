<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([
	'layout' => 'horizontal',
	'enableClientValidation' => false,
	'options' => ['class' => 'seo-form'],
]); ?>

	<?= $form->field($model, 'url') ?>

	<?= $form->field($model, 'title') ?>

	<?= $form->field($model, 'keywords') ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

	<?= $form->field($model, 'snippet')->textarea(['rows' => 3]) ?>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<?= Html::submitButton(Yii::t('seo', 'Save'), ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('seo', 'Cancel'), ['index'], ['class' => 'btn btn-link']) ?>
		</div>
	</div>

<?php ActiveForm::end(); ?>
