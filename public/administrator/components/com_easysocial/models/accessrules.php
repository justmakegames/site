<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

FD::import('admin:/includes/model');

class EasySocialModelAccessRules extends EasySocialModel
{
	public function __construct($config = array())
	{
		parent::__construct('accessrules', $config);
	}

	public function initStates()
	{
		$state 		= $this->getUserStateFromRequest('published', 'all');
		$filter		= $this->getUserStateFromRequest('extension', 'all');
		$group		= $this->getUserStateFromRequest('group', 'all');
		$ordering	= $this->getUserStateFromRequest('ordering', 'id');
		$direction	= $this->getUserStateFromRequest('direction', 'asc');

		$this->setState('filter', $filter);
		$this->setState('published', $state);
		$this->setState('group', $group);
		$this->setState('ordering', $ordering);
		$this->setState('direction', $direction);

		parent::initStates();
	}

	public function getItems($options = array())
	{
		$db = FD::db();
		$sql = $db->sql();

		$sql->select('#__social_access_rules');

		$state = $this->getState('published', 'all');

		if (isset($state) && $state !== 'all')
		{
			$sql->where('state', $state);
		}

		$filter = $this->getState('filter', 'all');

		if (isset($filter) && $filter !== 'all')
		{
			$sql->where('extension', $filter);
		}

		$group = $this->getState('group', 'all');

		if (isset($group) && $group !== 'all')
		{
			$sql->where('group', $group);
		}

		$search = $this->getState('search');

		if (!empty($search))
		{
			$sql->where('title' , '%' . $search . '%', 'LIKE');
		}

		$ordering = $this->getState('ordering');

		if (!empty($ordering))
		{
			$direction = $this->getState('direction');

			$sql->order($ordering, $direction);
		}

		$limit 	= $this->getState('limit');

		if ($limit > 0)
		{
			$this->setState('limit', $limit);

			// Get the limitstart.
			$limitstart = $this->getUserStateFromRequest('limitstart', 0);
			$limitstart = ($limit > 0 ? (floor($limitstart / $limit) * $limit ) : 0 );

			$this->setState('limitstart', $limitstart);

			// Set the total number of items.
			$this->setTotal($sql->getTotalSql());

			// Get the list of users
			$result = $this->getData($sql->getSql());
		}
		else
		{
			$db->setQuery($sql);
			$result = $db->loadObjectList();
		}

		if (!$result)
		{
			return false;
		}

		$access = array();

		foreach ($result as $row)
		{
			$acc = FD::table('accessrules');
			$acc->bind($row);

			$access[] = $acc;
		}

		return $access;
	}

	public function getAllRules( $options = array() )
	{
		$db = FD::db();
		$sql = $db->sql();

		$sql->select('#__social_access_rules');

		if( isset( $options['group'] ) )
		{
			$sql->where( 'group', $options['group'] );
		}

		if( isset( $options['state'] ) )
		{
			$sql->where( 'state', $options['state'] );
		}

		if( isset( $options['ordering'] ) )
		{
			$sql->order( $options['ordering'] );
		}

		$db->setQuery( $sql );

		$result = $db->loadObjectList();

		$access = array();

		foreach ($result as $row)
		{
			$acc = FD::table('accessrules');
			$acc->bind($row);

			$access[] = $acc;
		}

		return $access;
	}

	public function getExtensions()
	{
		$db = FD::db();
		$sql = $db->sql();

		$sql->select('#__social_access_rules');
		$sql->column('extension', '', 'distinct');

		$db->setQuery($sql);
		$result = $db->loadColumn();

		return $result;
	}

	public function scan($path)
	{
		jimport('joomla.filesystem.folder');

		$files = array();

		if ($path == 'admin' || $path == 'components')
		{
			$directory = JPATH_ROOT . '/administrator/components';
		}

		if ($path == 'site')
		{
			$directory = JPATH_ROOT . '/components';
		}

		if ($path == 'apps')
		{
			$directory = SOCIAL_APPS;
		}

		if ($path == 'fields')
		{
			$directory = SOCIAL_FIELDS;
		}

		if ($path == 'plugins')
		{
			$directory = JPATH_ROOT . '/plugins';
		}

		if ($path == 'modules')
		{
			$directory = JPATH_ROOT . '/modules';
		}

		$files = JFolder::files($directory, '.access$', true, true);

		return $files;
	}

	public function install($path)
	{
		jimport('joomla.filesystem.file');

		$data = FD::makeObject($path);

		if (empty($data))
		{
			FD::logError(__FILE__, __LINE__, 'ACCESS: Unable to read the file ' . $path);
			$this->setError(JText::_('Unable to read access file'));
			return false;
		}

		$json = FD::json();

		$now = FD::date()->toSQL();

		$result = array();

		foreach ($data as $row)
		{
			if (empty($row->name))
			{
				continue;
			}

			$name = $row->name;

			unset($row->name);

			$element = '';

			if (!empty($row->element))
			{
				$element = $row->element;
			}
			else
			{
				// If no element is defined, then we check if the name has a . starting from index 1 to get the first segment
				if (strpos($name, '.') > 0)
				{
					$tmp = explode('.', $name);

					$element = $tmp[0];
				}
			}

			unset($row->element);

			$group = !empty($row->group) ? $row->group : SOCIAL_TYPE_USER;

			unset($row->group);

			$extension = !empty($row->extension) ? $row->extension : SOCIAL_COMPONENT_NAME;

			unset($row->extension);

			$table = FD::table('accessrules');

			$state = $table->load(
				array(
					'name' => $name,
					'element' => $element,
					'group' => $group,
					'extension' => $extension
				)
			);

			if ($state)
			{
				continue;
			}

			$table->name = $name;
			$table->element = $element;
			$table->group = $group;
			$table->extension = $extension;

			$this->loadLanguage($extension);

			// JText here because the title/description is not used in frontend, and also due to "search" using SQL like to perform, we should store translated text into db
			$table->title = !empty($row->title) ? JText::_($row->title) : '';
			$table->description = !empty($row->description) ? JText::_($row->description) : '';

			unset($row->title);
			unset($row->description);

			$table->state = SOCIAL_STATE_PUBLISHED;

			$table->created = $now;

			$table->params = $json->encode($row);

			$table->store();

			$result[] = $table->title;
		}

		return $result;
	}

	private function loadLanguage($extension = 'com_easysocial')
	{
		static $loaded = array();

		if (!in_array($extension, $loaded))
		{
			$loaded[] = $extension;

			if ($extension === 'com_easysocial')
			{
				FD::apps()->loadAllLanguages();
			}

			JFactory::getLanguage()->load($extension, JPATH_ROOT . '/administrator');
			JFactory::getLanguage()->load($extension, JPATH_ROOT);
		}

		return true;
	}
}
