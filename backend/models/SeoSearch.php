<?php

namespace seo\backend\models;

use Yii;
use yii\data\ActiveDataProvider;

use seo\common\models\Seo;

/**
 * SEO search model.
 */
class SeoSearch extends Seo {

	/**
	 * Search rules
	 * @return array
	 */
	public function rules() {
		return [
			['url', 'string'],
		];
	}

	/**
	 * Search function.
	 * @param array $params Attributes array.
	 * @return yii\data\ActiveDataProvider
	 */
	public function search($params) {
		//ActiveQuery
		$query = Seo::find();

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
