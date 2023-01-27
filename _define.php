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

$this->registerModule(
    'highlightSearch',
    'Words found after a search take the CSS class \"found\"',
    'Keul and contributors',
    '1.4-dev',
    [
        'requires'    => [['core', '2.24']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_CONTENT_ADMIN,
        ]),
        'type'       => 'plugin',
        'settings' => [
            'blog' => '#params.highlightSearch_params',
        ],
        'support'    => 'http://forum.dotclear.org/viewtopic.php?id=36855',
        'details'    => 'https://plugins.dotaddict.org/dc2/details/' . basename(__DIR__),
    ]
);
