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
	public static function tableName() {
		return 'Seo';
	}

}
