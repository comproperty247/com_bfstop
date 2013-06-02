<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class bfstopModelfailedloginlist extends JModelList
{
	public function __construct($config = array())
	{
		$config['filter_fields'] = array(
			'l.id',
			'l.username',
			'l.ipaddress',
			'l.error',
			'l.logtime',
			'l.origin'
		);
		parent::__construct($config);
	}

	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('l.id, l.username, l.ipaddress, l.error, l.logtime, l.origin');
		$query->from('#__bfstop_failedlogin l');
		$ordering  = $this->getState('list.ordering', 'l.id');
		$ordering  = (strcmp($ordering, '') == 0) ? 'b.id' : $ordering;
		$direction = $this->getState('list.direction', 'ASC');
		$direction = (strcmp($direction, '') == 0) ? 'ASC' : $direction;
//		$query->order($db->getEscaped($ordering).' '.$db->getEscaped($direction));
		return $query;
	}

	protected function populateState($ordering = null, $direction = null) {
		parent::populateState('l.id', 'ASC');
	}
}
