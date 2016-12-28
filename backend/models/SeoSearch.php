<?php

namespace cms\seo\backend\models;

use Yii;
use yii\data\ActiveDataProvider;

use cms\seo\common\models\Seo;

/**
 * SEO search model
 */
class SeoSearch extends Seo
{

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'path' => Yii::t('seo', 'Path'),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['path', 'string'],
		];
	}

	/**
	 * Search function.
	 * @param array $params Attributes array.
	 * @return yii\data\ActiveDataProvider
	 */
	public function search($params)
	{
		//ActiveQuery
		$query = static::find();

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		//return data provider if no search
		if (!($this->load($params) && $this->validate())) return $dataProvider;

		//search
		$query->andFilterWhere(['like', 'path', parse_url($this->path)['path']]);

		return $dataProvider;
	}

}
