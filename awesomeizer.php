<?php

/*------------------------------------------------------------------------------------------------------------------------

    author: Sean Goresht
    www: https://seangoresht.com/
    github: https://github.com/srsgores

    twitter: http://twitter.com/S.Goresht

    Licensed under the GNU Public License http://www.gnu.org/copyleft/gpl.html

--------------------------------------------------------------------------------------------------------------------- */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

class plgSystemAwesomeizer extends JPlugin {

	function plgSystemAwesomeizer(&$subject, $config) {

		parent::__construct($subject, $config);
	}

	function onAfterRoute() {
		$document = &JFactory::getDocument();
		$mainframe = &JFactory::getApplication();

		//params
		$version = $this->params->get('version','1.7.2');
		$modernizr = $this->params->get('modernizr','1');
		$bootstrap = $this->params->get('bootstrap','1');
		$peity = $this->params->get('peity','1');
		$datatables = $this->params->get('datatables','1');
		$chosen = $this->params->get('chosen','1');
		$noty = $this->params->get('noty','1');
		$highcharts = $this->params->get('highcharts','1');

		$icomoon = $this->params->get('icomoon','1');
		$animate = $this->params->get('animate','1');
		$customadmincss = $this->params->get('customadmincss','admin-mods.css');
		$customsitecss = $this->params->get('customsitecss','mods.css');

		$customadminjs = $this->params->get('customadminjs','custom-admin.js');
		$customsitejs = $this->params->get('customsitejs','custom-site.js');

		$ajax = $this->params->get('ajax','1');


		$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js');
		$noconflict = $this->params->get('noconflict','1');
		if($noconflict == 1) {
			if ($mainframe->isAdmin()) {
				$document->addScript(JURI::base().'../plugins/system/awesomeizer/jquery.noconflict.js');
				}
			else {
				$document->addScript(JURI::base().'plugins/system/awesomeizer/jquery.noconflict.js');
			}
		}
		if ($modernizr == 1) {
			$document->addScript("http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js");
		}
		if ($bootstrap == 1) {
			$document->addScript("http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.0.4/bootstrap.min.js");
		}
		if ($peity == 1) {
			$document->addScript("http://benpickles.github.com/peity/jquery.peity.min.js");
		}
		if ($datatables == 1) {
			$document->addScript("http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.1/jquery.dataTables.min.js");
		}

		if ($highcharts == 1) {
			$document->addScript("http://code.highcharts.com/highcharts.js");
		}
		
		if ($mainframe->isAdmin()) {
			if ($chosen == 1) {
				$document->addScript(JURI::base().'../plugins/system/awesomeizer/js/chosen.jquery.min.js');
				$document->addStyleSheet(JURI::base(). "../plugins/system/awesomeizer/css/chosen/chosen.css");
			}
			if ($noty == 1) {
				$document->addScript(JURI::base().'../plugins/system/awesomeizer/js/jquery.noty.js');
				$document->addStyleSheet(JURI::base(). "../plugins/system/awesomeizer/css/noty/jquery.noty.css");
				$document->addStyleSheet(JURI::base(). "../plugins/system/awesomeizer/css/noty/noty_theme_growl.css");
			}
			if ($animate == 1) {
				$document->addStyleSheet(JURI::base(). "../plugins/system/awesomeizer/css/animate.css");
			}
			if ($icomoon == 1) {
				$document->addStyleSheet(JURI::base(). "../plugins/system/awesomeizer/css/IcoMoon/style.css");
				$document->addCustomTag("<!--[if lte IE 7]><script src= \"" . JURI::base(). "../plugins/system/awesomeizer/css/IcoMoon/lte-ie7.js" . "\"><![endif]-->");
			}
			if ($ajax == 1) {
				$document->addScript("http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js");
				$document->addScript(JURI::base().'../plugins/system/awesomeizer/js/jquery.history.js');
				$document->addScript(JURI::base().'../plugins/system/awesomeizer/js/ajaxify.js');
			}

			if (JFile::exists(JPATH_SITE. '/plugins/system/awesomeizer/css/' . $customadmincss)) {
				$document->addStyleSheet(JURI::base()."../plugins/system/awesomeizer/css/" . $customadmincss);
			}
			if (JFile::exists(JPATH_SITE.'/plugins/system/awesomeizer/js/' . $customadminjs)) {
				$document->addScript(JURI::base().'../plugins/system/awesomeizer/js/' . $customadminjs);
			}
		}
		else {
			if ($chosen == 1) {
				$document->addScript(JURI::base().'plugins/system/awesomeizer/js/chosen.jquery.min.js');
				$document->addStyleSheet(JURI::base(). "plugins/system/awesomeizer/css/chosen/chosen.css");
			}
			if ($noty == 1) {
				$document->addScript(JURI::base().'plugins/system/awesomeizer/js/jquery.noty.js');
				$document->addStyleSheet(JURI::base(). "plugins/system/awesomeizer/css/noty/jquery.noty.css");
				$document->addStyleSheet(JURI::base(). "plugins/system/awesomeizer/css/noty/noty_theme_growl.css");
			}
			if ($animate == 1) {
				$document->addStyleSheet(JURI::base(). "plugins/system/awesomeizer/css/animate.css");
			}
			if ($icomoon == 1) {
				$document->addStyleSheet(JURI::base(). "plugins/system/awesomeizer/css/IcoMoon/style.css");
				/*$document->addCustomTag("<!--[if lte IE 7]><script src= \"" . JURI::base(). "plugins/system/awesomeizer/css/IcoMoon/lte-ie7.js" . "\"><![endif]-->")
				TODO: fix this so that IE - can be happy*/;
			}

			if (JFile::exists(JPATH_SITE. "/plugins/system/awesomeizer/css/" . $customsitecss)) {
				$document->addStyleSheet(JURI::base(). "plugins/system/awesomeizer/css/" . $customsitecss);
			}
			if (JFile::exists(JPATH_SITE.'/plugins/system/awesomeizer/js/' . $customsitejs)) {
				$document->addScript(JURI::base().'plugins/system/awesomeizer/js/' . $customsitejs);
			}
		}
	} //end anonymous function
} //end class

/*$document->addScript("http://cdnjs.cloudflare.com/ajax/libs/less.js/1.3.0/less-1.3.0.min.js");*/
/*$document->addCustomTag("<link rel=\"stylesheet/less\" href= \" " . JURI::base(). "../plugins/system/awesomeizer/less/admin-mods.less");*/
/*$document->addScript("http://cdnjs.cloudflare.com/ajax/libs/css3finalize/2.4/jquery.css3finalize.min.js");*/	
			
//optional: mobilize admin back-end
/*$document->addScript("http://cdnjs.cloudflare.com/ajax/libs/mobilizejs/0.9/mobilize.min.js");*/

?>
