<?php
/**
 * @version     1.0.0
 * @package     com_quick2cart
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      sanjivani <sanjivani_p@tekdi.net> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of coupons.
 *
 * @package     Quick2cart
 * @subpackage  com_quick2cart
 * @since       2.2
 */
class quick2cartViewManagecoupon extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->_setToolBar();
		$mainframe = JFactory::getApplication();
		$input=$mainframe->input;

 		$option = $input->get('option');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	'desc',			'word' );
		$filter_type		= $mainframe->getUserStateFromRequest( "$option.filter_type",		'filter_type', 		0,			'string' );
		$filter_state = $mainframe->getUserStateFromRequest( $option.'search_list', 'search_list', '', 'string' );
		$search = $mainframe->getUserStateFromRequest( $option.'search', 'search','', 'string' );
		$search = JString::strtolower( $search );
		$limit = '';
		$limitstart = '';
		$cid[0]='';
		if($search==null)
		$search='';
		$edit		= $input->get( 'edit','' );
		$layout		= $input->get( 'layout','' );
		$cid		= $input->get(  'cid','','ARRAY' );
		$model		=  $this->getModel( 'Managecoupon' );
		 if($cid)
		 {
		 	$total 		= $this->get( 'Total');
			$pagination = $this->get( 'Pagination' );
			$coupons = $model->Editlist($cid[0]);
			$limit = $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', 'limit', 'int' );
			$limitstart = $mainframe->getUserStateFromRequest( $option.'limitstart', 'limitstart', 0, 'int' );
			$model->setState('limit', $limit); // Set the limit variable for query later on
	    $model->setState('limitstart', $limitstart);
		 }
		 else
		 {
		 	$total 		= $this->get( 'Total');
			$pagination = $this->get( 'Pagination' );
			$coupons 		= $this->get( 'Managecoupon' );

			$limit = $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', 'limit', 'int' );
			$limitstart = $mainframe->getUserStateFromRequest( $option.'limitstart', 'limitstart', 0, 'int' );
			$model->setState('limit', $limit); // Set the limit variable for query later on
		 	$model->setState('limitstart', $limitstart);
		 }
		// search filter
		$lists['search_select']	= $search;
		$lists['search']		= $search;
		$lists['search_list']	= $filter_state;
		$lists['order']			= $filter_type;
		$lists['order_Dir']		= $filter_order_Dir;
		$lists['limit']			= $limit;
		$lists['limitstart']	= $limitstart;
		// Get data from the model
		$this->assignRef('lists', $lists);
		$this->assignRef('pagination', $pagination);
		$this->assignRef('coupons',$coupons);

		 // FOR DISPLAY SIDE FILTER
     if(JVERSION>=3.0)
     {
			 JHtmlSidebar::setAction('index.php?option=com_quick2cart');
            $this->sidebar = JHtmlSidebar::render();
      }
		parent::display($tpl);
	}//function display ends here

	function _setToolBar()
	{	// Get the toolbar object instance
		$bar = JToolBar::getInstance('toolbar');
		JToolBarHelper::title( JText::_( 'AD_COUPAN_TITLE' ), 'icon-48-quick2cart.png' );

		//JToolBarHelper::cancel( 'cancel', 'Close' );
	}

}// class
