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
			'url' => Yii::t('seo', 'Url'),
			'title' => Yii::t('seo', 'Title'),
			'keywords' => Yii::t('seo', 'Keywords'),
			'description' => Yii::t('seo', 'Description'),
			'snippet' => Yii::t('seo', 'Snippet'),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['url', 'string'],
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
		$query->andFilterWhere(['like', 'url', $this->url]);

		return $dataProvider;
	}

}
