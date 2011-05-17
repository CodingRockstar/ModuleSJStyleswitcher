<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Stephan Jahrling, 2011
 * @author     Stephan Jahrling <info@jahrling-software.de>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Font sizes and styles
 */
$GLOBALS['TL_SJSTYLESWITCHER'] = array(

  'FONTSIZES' => array(
  
     'SMALL' => array(
        'label' => &$GLOBALS['TL_LANG']['MSC']['SJSTYLESWITCHER']['font_small'],
        'image' => '/system/modules/ModuleSJStyleswitcher/html/schrift1.jpg',
        'css'   => '/system/modules/ModuleSJStyleswitcher/html/fontsize.css',
        'class' => 'fontsmall'
     ),
     
     'MEDIUM' => array(
        'label' => &$GLOBALS['TL_LANG']['MSC']['SJSTYLESWITCHER']['font_medium'],
        'image' => '',
        'css'   => '/system/modules/ModuleSJStyleswitcher/html/fontsize.css',
        'class' => 'fontmedium'
     ),
     
     'BIG' => array(
        'label' => &$GLOBALS['TL_LANG']['MSC']['SJSTYLESWITCHER']['font_big'],
        'image' => '/system/modules/ModuleSJStyleswitcher/html/schrift3.jpg',
        'css'   => '/system/modules/ModuleSJStyleswitcher/html/fontsize.css',
        'class' => 'fontbig'
     ),
  
  ),
  
  
  'STYLES' => array(
  
     'STANDARD' => array(
        'label' => &$GLOBALS['TL_LANG']['MSC']['SJSTYLESWITCHER']['style_standard'],
        'image' => '/system/modules/ModuleSJStyleswitcher/html/stilvariante_01.jpg',
        'css'   => '',
        'class' => ''
     ),
     
     'BLACKWHITE' => array(
        'label' => &$GLOBALS['TL_LANG']['MSC']['SJSTYLESWITCHER']['style_blackwhite'],
        'image' => '/system/modules/ModuleSJStyleswitcher/html/stilvariante_02.jpg',
        'css'   => '/system/modules/ModuleSJStyleswitcher/html/blackwhite.css',
        'class' => 'blackwhite'
     )
  
  )

);



/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD']['miscellaneous'], -1, array
(
	'sjstyleswitcher' => 'ModuleSJStyleswitcher'
));


?>