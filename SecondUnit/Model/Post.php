<?php
namespace Learning\SecondUnit\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'learning_secondunit_post';

	protected $_cacheTag = 'learning_secondunit_post';

	protected $_eventPrefix = 'learning_secondunit_post';

	protected function _construct()
	{
		$this->_init('Learning\SecondUnit\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
