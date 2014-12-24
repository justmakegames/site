<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2012 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );

Foundry::import( 'admin:/tables/table' );

class SocialTableRegions extends SocialTable
{
	public $id			= null;
	public $uid			= null;
	public $type		= null;
	public $name		= null;
	public $code		= null;
	public $parent_uid	= null;
	public $parent_type	= null;
	public $params		= null;

	public function __construct(& $db )
	{
		parent::__construct( '#__social_regions' , 'id' , $db );
	}

	public function load( $keys = null, $reset = true )
	{
		$state = parent::load( $keys, $reset );

		// If unable to load the data, then we directly inject the data in as property to avoid double assigning
		if( !$state )
		{
			if( empty( $keys ) )
			{
				// If empty, use the value of the current key
				$keyName = $this->_tbl_key;
				$keyValue = $this->$keyName;

				// If empty primary key there's is no need to load anything
				if( empty( $keyValue ) )
				{
					return true;
				}

				$keys = array( $keyName => $keyValue );
			}
			elseif( !is_array( $keys ) )
			{
				// Load by primary key.
				$keys = array( $this->_tbl_key => $keys );
			}

			foreach( $keys as $field => $value )
			{
				$this->$field = $value;
			}
		}

		return $state;
	}

	public function initParams()
	{
		if( is_object( $this->params ) )
		{
			return true;
		}

		if( empty( $this->params ) )
		{
			$this->params = new stdClass();

			return true;
		}

		$this->params = Foundry::makeObject( $this->params );
		return true;
	}

	public function setParam( $key, $value )
	{
		$this->initParams();

		$this->params->$key = $value;
	}

	public function getParam( $key )
	{
		$this->initParams();

		if( !isset( $this->params->$key ) )
		{
			return false;
		}

		return $this->params->$key;
	}

	public function store( $updateNulls = false )
	{
		if( empty( $this->params ) )
		{
			$this->params = new stdClass();
		}

		if( is_object( $this->params ) )
		{
			$this->params = Foundry::json()->encode( $this->params );
		}

		return parent::store( $updateNulls );
	}

	public function getCountries()
	{
		$options = array(
			'type' => SOCIAL_REGION_TYPE_COUNTRY,
			'state' => SOCIAL_STATE_PUBLISHED
		);

		$data = Foundry::model( 'regions' )->getRegions( $options );

		return $data;
	}

	public function getStates()
	{
		if( $this->type === SOCIAL_REGION_TYPE_COUNTRY )
		{
			$options = array(
				'type' => SOCIAL_REGION_TYPE_STATE,
				'parent_uid' => $this->uid,
				'parent_type' => SOCIAL_REGION_TYPE_COUNTRY,
				'state' => SOCIAL_STATE_PUBLISHED
			);

			$data = Foundry::model( 'regions' )->getRegions( $options );

			return $data;
		}

		return false;
	}

	public function getCities()
	{
		if( $this->type === SOCIAL_REGION_TYPE_REGION )
		{
			$options = array(
				'type' => SOCIAL_REGION_TYPE_CITY,
				'parent_uid' => $this->uid,
				'parent_type' => SOCIAL_REGION_TYPE_STATE,
				'state' => SOCIAL_STATE_PUBLISHED
			);

			$data = Foundry::model( 'regions' )->getRegions( $options );

			return $data;
		}
	}
}
