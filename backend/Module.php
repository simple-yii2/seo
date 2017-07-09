<?php

namespace cms\seo\backend;

use Yii;

use cms\components\BackendModule;

/**
 * SEO backend module
 */
class Module extends BackendModule {

	/**
	 * @inheritdoc
	 */
	public static function moduleName()
	{
		return 'seo';
	}

	/**
	 * @inheritdoc
	 */
	protected static function cmsSecurity()
	{
		$auth = Yii::$app->getAuthManager();
		if ($auth->getRole('SEO') === null) {
			//seo role
			$role = $auth->createRole('SEO');
			$auth->add($role);
		}
	}

	/**
	 * @inheritdoc
	 */
	public function cmsMenu($base)
	{
		if (!Yii::$app->user->can('SEO'))
			return [];

		return [
			['label' => Yii::t('seo', 'SEO'), 'url' => ["$base/seo/seo/index"]],
		];
	}

}
