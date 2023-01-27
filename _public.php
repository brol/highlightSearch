<?php
/**
 * @brief highlightSearch, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Keul <keul at keul dot fr> and contributors
 *
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
if (!defined('DC_RC_PATH')) { return; }

dcCore::app()->addBehavior('publicAfterContentFilterV2',array('behaviorsHLSearch','HSAddHL'));
dcCore::app()->addBehavior('publicHeadContent',array('behaviorsHLSearch','HSAddCSS'));

class behaviorsHLSearch {
	public static function HSAddHL ($tag,$args) {
		if (isset(dcCore::app()->public->search) && dcCore::app()->public->search != '' && dcCore::app()->blog->settings->highlightSearch->highlightSearch_enabled) {
			if ($tag == "EntryContent" || $tag == "EntryExcerpt") {
				//on récupère la liste des mots recherchés
				$s = dcCore::app()->public->search;
				$s = explode(' ', dcCore::app()->public->search);
				// pour chacun des mots
				foreach($s as $t) {
					if ($t != '') {
						//on retire les caractères spéciaux qui peuvent foutre la merde
						$t=str_replace(array('<','>','#','%'),array('','','',''),$t);
						
						$args[0]=preg_replace('#(?!<.*?)('.preg_quote($t).')(?![^<>]*?>)#i','<span class="found">\1</span>',$args[0]);
					}
				}
			}       
		}
	}
	public static function HSAddCSS() {
		if(isset(dcCore::app()->public->search) && dcCore::app()->blog->settings->highlightSearch->highlightSearch_enabled && dcCore::app()->blog->settings->highlightSearch->highlightSearch_css != 'disable') {
			echo '<style type="text/css">.found{ background:'.dcCore::app()->blog->settings->highlightSearch->highlightSearch_css.';}</style>'."\n";
		}
	}
}