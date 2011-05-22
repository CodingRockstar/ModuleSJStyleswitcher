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
 * @copyright  Stephan Jahrling (Stephan Jahrling - Softwarelösungen), Oliver Richter (Grünfisch Webdesign) 2011
 * @author     Stephan Jahrling <info@jahrling-software.de>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['sjstyleswitcher'] = '{title_legend},name,headline,type;{config_legend},sjstyleswitcher_fontsizes,sjstyleswitcher_styles,sjstyleswitcher_alternatestyles,sjstyleswitcher_cookielifetime;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['sjstyleswitcher_fontsizes'] = array
(
	'label'            => &$GLOBALS['TL_LANG']['tl_module']['sjstyleswitcher_fontsizes'],
	'exclude'          => true,
	'inputType'        => 'checkbox',
	'options_callback' => array('tl_module_sjstyleswitcher', 'loadStyleFontsizes'),
	'eval'             => array('multiple'=>true, 'tl_class'=>'')
); 

$GLOBALS['TL_DCA']['tl_module']['fields']['sjstyleswitcher_styles'] = array
(
	'label'            => &$GLOBALS['TL_LANG']['tl_module']['sjstyleswitcher_styles'],
	'exclude'          => true,
	'inputType'        => 'checkbox',
	'options_callback' => array('tl_module_sjstyleswitcher', 'loadStyleContrasts'),
	'eval'             => array('multiple'=>true, 'tl_class'=>'')
); 

$GLOBALS['TL_DCA']['tl_module']['fields']['sjstyleswitcher_cookielifetime'] = array
(
	'label'            => &$GLOBALS['TL_LANG']['tl_module']['sjstyleswitcher_cookielifetime'],
	'exclude'          => true,
	'inputType'        => 'text',
	'eval'             => array('maxlength'=>3, 'rgxp'=>'digit', 'tl_class'=>'')
); 

$GLOBALS['TL_DCA']['tl_module']['fields']['sjstyleswitcher_alternatestyles'] = array
(
	'label'            => &$GLOBALS['TL_LANG']['tl_module']['sjstyleswitcher_alternatestyles'],
	'exclude'          => true,
	'inputType'        => 'checkbox',
	'eval'             => array('tl_class'=>'')
);



/**
 * Class tl_module_sjstyleswitcher
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Stephan Jahrling 2011
 * @author     Stephan Jahrling <http://www.jahrling-software.de>
 */
class tl_module_sjstyleswitcher extends Backend
{

	/**
	 * Load the options for font-sizes
	 * @return array
	 */
	public function loadStyleFontsizes()
	{
	
		$arrReturn = array();
		foreach($GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'] as $name => $data)
			$arrReturn[ $name ] = $data['label'];
			
		return $arrReturn;
	
	}
	
	
	/**
	 * Load the options for styles
	 * @return array
	 */
	public function loadStyleContrasts()
	{
	
		$arrReturn = array();
		foreach($GLOBALS['TL_SJSTYLESWITCHER']['STYLES'] as $name => $data)
			$arrReturn[ $name ] = $data['label'];
			
		return $arrReturn;
	
	}
	 
}

?>