<?php

namespace cms\seo\common\models;

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
	public static function tableName()
	{
		return 'Seo';
	}

	/**
	 * Find SEO by url path
	 * @param string $path 
	 * @return Seo|null
	 */
	public static function findByPath($path)
	{
		return static::find()->andWhere(['path' => $path])->one();
	}

}
