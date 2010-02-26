<?php
/**
* @version		$Id: defines.php 10381 2008-06-01 03:35:53Z pasamio $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* Joomla! Application define
*/

//Global definitions
//Joomla framework path definitions
$parts = explode( DS, JPATH_BASE );

//print_r($parts);
$newparts = array();
for($i=0;$i<count($parts)-4;$i++){
	//echo $parts[$i] . "\n";
	$newparts[] = $parts[$i];

}

//print_r(implode( DS, $newparts ));
//Defines
define( 'JPATH_ROOT',			implode( DS, $newparts ) );

define( 'JPATH_SITE',			JPATH_ROOT.DS.'jupgrade' );
define( 'JPATH_CONFIGURATION', 	JPATH_ROOT.DS.'jupgrade' );
define( 'JPATH_ADMINISTRATOR', 	JPATH_ROOT.DS.'jupgrade'.DS.'administrator' );
define( 'JPATH_XMLRPC', 		JPATH_ROOT.DS.'jupgrade'.DS.'xmlrpc' );
define( 'JPATH_LIBRARIES',	 	JPATH_ROOT.DS.'jupgrade'.DS.'libraries' );
define( 'JPATH_PLUGINS',		JPATH_ROOT.DS.'jupgrade'.DS.'plugins'   );
define( 'JPATH_INSTALLATION',	JPATH_ROOT.DS.'jupgrade'.DS.'installation' );
define( 'JPATH_THEMES'	   ,	JPATH_BASE.DS.'jupgrade'.DS.'templates' );
define( 'JPATH_CACHE',			JPATH_BASE.DS.'jupgrade'.DS.'cache');
