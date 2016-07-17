<?php

namespace seo\backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use seo\backend\models\SeoForm;
use seo\backend\models\SeoSearch;
use seo\common\models\Seo;

/**
 * SEO manage controller.
 */
class SeoController extends Controller
{

	/**
	 * Access control.
	 * @return array
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					['allow' => true, 'roles' => ['SEO']],
				],
			],
		];
	}

	/**
	 * SEO list.
	 * @return void
	 */
	public function actionIndex()
	{
		$model = new SeoSearch;

		return $this->render('index', [
			'dataProvider'=>$model->search(Yii::$app->getRequest()->get()),
			'model'=>$model,
		]);
	}

	/**
	 * SEO creating.
	 * @return void
	 */
	public function actionCreate()
	{
		$model = new SeoForm;

		if ($model->load(Yii::$app->getRequest()->post()) && $model->create()) {
			Yii::$app->session->setFlash('success', Yii::t('seo', 'Changes saved successfully.'));
			return $this->redirect(['index']);
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * SEO updating.
	 * @param integer $id SEO id.
	 * @return void
	 */
	public function actionUpdate($id)
	{
		$object = Seo::findOne($id);
		if ($object === null)
			throw new BadRequestHttpException(Yii::t('seo', 'SEO not found.'));

		$model = new SeoForm(['object' => $object]);

		if ($model->load(Yii::$app->getRequest()->post()) && $model->update()) {
			Yii::$app->session->setFlash('success', Yii::t('seo', 'Changes saved successfully.'));
			return $this->redirect(['index']);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * SEO deleting.
	 * @param integer $id SEO id.
	 * @return void
	 */
	public function actionDelete($id)
	{
		$item = Seo::findOne($id);
		if ($item === null)
			throw new BadRequestHttpException(Yii::t('seo', 'SEO not found.'));

		if ($item->delete()) {			
			Yii::$app->session->setFlash('success', Yii::t('seo', 'SEO deleted successfully.'));
		}

		return $this->redirect(['index']);
	}

}
