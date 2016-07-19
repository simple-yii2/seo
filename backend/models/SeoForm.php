<?php

namespace seo\backend\models;

use Yii;
use yii\base\Model;

use seo\common\models\Seo;

/**
 * SEO editting form.
 */
class SeoForm extends Model {

	/**
	 * @var string Url.
	 */
	public $url;

	/**
	 * @var string Title.
	 */
	public $title;

	/**
	 * @var string Meta keywords.
	 */
	public $keywords;

	/**
	 * @var string Meta description.
	 */
	public $description;

	/**
	 * @var string Snippet.
	 */
	public $snippet;

	/**
	 * @var seo\common\models\Seo Seo ar model
	 */
	public $object;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

		if (($object = $this->object) !== null) {
			$this->setAttributes($object->getAttributes(['url', 'title', 'keywords', 'description', 'snippet']), false);
		}
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

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['url', 'description', 'snippet'], 'string', 'max' => 200],
			[['title', 'keywords'], 'string', 'max' => 100],
			['url', 'required'],
			// ['url', 'match'],
		];
	}

	/**
	 * Seo creation
	 * @return boolean
	 */
	public function create() {
		if (!$this->validate())
			return false;

		$this->object = $object = new Seo([
			'url' => $this->url,
			'title' => empty($this->title) ? null : $this->title,
			'keywords' => empty($this->keywords) ? null : $this->keywords,
			'description' => empty($this->description) ? null : $this->description,
			'snippet' => empty($this->snippet) ? null : $this->snippet,
		]);

		if (!$object->save(false))
			return false;

		return true;
	}

	/**
	 * Seo updating
	 * @return boolean
	 */
	public function update() {
		if ($this->object === null)
			return false;

		if (!$this->validate())
			return false;

		$object = $this->object;

		$object->setAttributes([
			'url' => $this->url,
			'title' => empty($this->title) ? null : $this->title,
			'keywords' => empty($this->keywords) ? null : $this->keywords,
			'description' => empty($this->description) ? null : $this->description,
			'snippet' => empty($this->snippet) ? null : $this->snippet,
		], false);

		if (!$object->save(false))
			return false;

		return true;
	}

}
