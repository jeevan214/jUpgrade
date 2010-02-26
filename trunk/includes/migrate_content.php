<?php
/**
 * jUpgrade
 *
 * @author      Matias Aguirre
 * @email       maguirre@matware.com.ar
 * @url         http://www.matware.com.ar
 * @license     GNU/GPL
 */

define( '_JEXEC', 1 );
define( 'JPATH_BASE', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );
require_once ( JPATH_BASE .DS.'defines.php' );

require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'methods.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'factory.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'import.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'error'.DS.'error.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'base'.DS.'object.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'database.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'table.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'tablenested.php' );
require_once ( JPATH_LIBRARIES.DS.'joomla'.DS.'database'.DS.'table'.DS.'content.php' );
require(JPATH_ROOT.DS."configuration.php");

$jconfig = new JConfig();
//print_r($jconfig);

$config = array();
$config['driver']   = 'mysql';
$config['host']     = $jconfig->host;
$config['user']     = $jconfig->user; 
$config['password'] = $jconfig->password;
$config['database'] = $jconfig->db;  
$config['prefix']   = $jconfig->dbprefix;
//print_r($config);

$config_new = $config;
$config_new['prefix'] = "j16_";

$db = JDatabase::getInstance( $config );
$db_new = JDatabase::getInstance( $config_new );
//print_r($db_new);

$query = "SELECT `id`, `title`, NULL AS `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, NULL"
." FROM " . $config['prefix'] . "content"
." ORDER BY id ASC";

$db->setQuery( $query );
$content = $db->loadObjectList();
//echo $db->errorMsg();

//print_r($content[0]);

for($i=0;$i<count($content);$i++) {
	//echo $sections[$i]->id . "<br>";

	$new = new JTableContent($db_new);
	//print_r($new);
	$new->title = $content[$i]->title;
	$new->alias = $content[$i]->alias;
	$new->title_alias = $content[$i]->title_alias;
	$new->introtext = $content[$i]->introtext;
	$new->fulltext = $content[$i]->fulltext;
	$new->state = $content[$i]->state;
	$new->mask = $content[$i]->mask;
	$new->catid = $content[$i]->catid;
	$new->created = $content[$i]->created;
	$new->created_by = $content[$i]->created_by;
	$new->created_by_alias = $content[$i]->created_by_alias;
	$new->modified = $content[$i]->modified;
	$new->modified_by = $content[$i]->modified_by;
	$new->checked_out = $content[$i]->checked_out;
	$new->checked_out_time = $content[$i]->checked_out_time;
	$new->publish_up = $content[$i]->publish_up;
	$new->publish_down = $content[$i]->publish_down;
	$new->images = $content[$i]->images;
	$new->urls = $content[$i]->urls;
	$new->parentid = $content[$i]->parentid;
	$new->ordering = $content[$i]->ordering;
	$new->metakey = $content[$i]->metakey;
	$new->metadesc = $content[$i]->metadesc;
	$new->access = $content[$i]->access+1;
	$new->hits = $content[$i]->hits;
	//$new->level = 1;
	//$new->extension = "com_content";
	//$new->setRules('{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
	$new->store();

}

sleep(1);
?>
