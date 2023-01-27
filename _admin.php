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
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

dcCore::app()->addBehavior('adminBlogPreferencesFormV2',array('behaviorsHLSearchadmin','adminBlogPreferencesForm'));
dcCore::app()->addBehavior('adminBeforeBlogSettingsUpdate',array('behaviorsHLSearchadmin','adminBeforeBlogSettingsUpdate'));

class behaviorsHLSearchadmin
{
	public static function adminBlogPreferencesForm($settings)
	{
		echo
		'<div class="fieldset"><h4 id="highlightSearch_params">'.__('highlightSearch').'</h4>'.
		'<p><label class="classic" for="highlightSearch_enabled">'.
		form::checkbox('highlightSearch_enabled','1',$settings->highlightSearch->highlightSearch_enabled).__('Activate highlightSearch').'</label></p>'.
		'<p><label class="classic" for="highlightSearch_css">'.__('Highlight found words:').' '.
		form::combo('highlightSearch_css',array(__('Yellow highlight')=>'#ffff66',__('Red highlight')=>'#ff9999',__('Green highlight')=>'#99ff99',__('Blue highlight')=>'#9999ff',__('Custom')=>'disable'),$settings->highlightSearch->highlightSearch_css).'</label></p>'.
		'<p class="form-note">'.__('Select "custom" if you define the CSS class "found" in your own style sheet.').'</p>'.
		'</div>';
	}
	
	public static function adminBeforeBlogSettingsUpdate($settings)
	{
		$settings->addNameSpace('highlightSearch');
		$settings->highlightSearch->put('highlightSearch_enabled',!empty($_POST['highlightSearch_enabled']),'boolean');
		$settings->highlightSearch->put('highlightSearch_css',$_POST['highlightSearch_css'], 'string');
		$settings->addNameSpace('system');
	}
}