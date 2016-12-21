<?php

namespace cms\seo\backend\models;

use Yii;
use yii\base\Model;

use cms\seo\common\models\Seo;

/**
 * SEO editting form.
 */
class SeoForm extends Model
{

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
	 * @var cms\seo\common\models\Seo
	 */
	private $_object;

	/**
	 * @inheritdoc
	 * @param cms\seo\common\models\Seo $object 
	 */
	public function __construct(\cms\seo\common\models\Seo $object, $config = [])
	{
		$this->_object = $object;

		//attributes
		$this->url = $object->url;
		$this->title = $object->title;
		$this->keywords = $object->keywords;
		$this->description = $object->description;

		parent::__construct($config);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'url' => Yii::t('seo', 'Url'),
			'title' => Yii::t('seo', 'Title'),
			'keywords' => Yii::t('seo', 'Keywords'),
			'description' => Yii::t('seo', 'Description'),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['url', 'description'], 'string', 'max' => 200],
			[['title', 'keywords'], 'string', 'max' => 100],
			['url', 'required'],
			// ['url', 'match'],
		];
	}

	/**
	 * Save
	 * @return boolean
	 */
	public function save()
	{
		if (!$this->validate())
			return false;

		$object = $this->_object;

		$object->url = $this->url;
		$object->title = empty($this->title) ? null : $this->title;
		$object->keywords = empty($this->keywords) ? null : $this->keywords;
		$object->description = empty($this->description) ? null : $this->description;

		if (!$object->save(false))
			return false;

		return true;
	}

}
