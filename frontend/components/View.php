<?php

namespace cms\seo\frontend\components;

use Yii;

use cms\seo\common\models\Seo;

class View extends \yii\web\View
{

	/**
	 * @var string|integer
	 */
	public $expires = '+30 days';

	/**
	 * @var string|integer
	 */
	public $lastModified = '-30 days';

	/**
	 * @var boolean
	 */
	public $seoEnabled = true;

	/**
	 * @var string|array
	 * @see yii\helpers\Url::to()
	 */
	public $canonical;

	/**
	 * @inheritdoc
	 */
	public function afterRender($viewFile, $params, &$output)
	{
		//seo
		if ($this->seoEnabled)
			$this->registerSeo();

		//expires
		if ($this->expires !== null) {
			if (is_string($this->expires))
				$this->expires = strtotime($this->expires);
			
			header("Expires: " . gmdate('D, d M Y H:i:s', $this->expires) . ' GMT');
		}

		//last modified
		if ($this->lastModified !== null) {
			if (is_string($this->lastModified))
				$this->lastModified = strtotime($this->lastModified);

			header("Last-Modified: " . gmdate('D, d M Y H:i:s', $this->lastModified) . ' GMT');
		}

		//canonical page
		if (!empty($this->canonical))
			$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::to($this->canonical)], 'canonical');
	}

	/**
	 * Register SEO information
	 * @return void
	 */
	private function registerSeo()
	{
		$info = parse_url(Yii::$app->request->absoluteUrl);

		$object = Seo::findByPath($info['path']);
		if ($object === null)
			return;

		if ($object->title !== null)
			$this->title = $object->title;

		if ($object->description !== null)
			$this->registerMetaTag(['name' => 'description', 'content' => $object->description], 'description');

		if ($object->keywords !== null)
			$this->registerMetaTag(['name' => 'keywords', 'content' => $object->keywords], 'keywords');
	}

}
