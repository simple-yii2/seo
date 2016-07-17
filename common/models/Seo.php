<?php

namespace seo\common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * SEO acrive record.
 */
class Seo extends ActiveRecord
{

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'Seo';
	}

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

}
