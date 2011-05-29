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
 * Class ModuleSJStyleswitcher
 *
 * Front end module "ModuleSJStyleswitcher".
 * @copyright  Stephan Jahrling (Stephan Jahrling - Softwarelösungen), Oliver Richter (Grünfisch Webdesign) 2011
 * @author     Stephan Jahrling <http://www.jahrling-software.de>
 */
class ModuleSJStyleswitcher extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_sjstyleswitcher';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### STYLESWITCHER - MODULE ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}


		$GLOBALS['TL_CSS'][] = '/system/modules/ModuleSJStyleswitcher/html/styleswitcher.css';
		$GLOBALS['TL_JAVASCRIPT'][] = '/system/modules/ModuleSJStyleswitcher/html/styleswitcher.js';


		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
	
		global $objPage;
		$this->import('Input');
		$this->import('Session');

        
		// 1. font - sizes
		$arrFonts = deserialize($this->sjstyleswitcher_fontsizes);
		$arrTplFonts = array();

		if ( is_array($arrFonts) && count($arrFonts) )
		   foreach ($arrFonts as $font)
		   {
		       $arrTplFonts[$font] = $GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$font];
		       $arrTplFonts[$font]['href'] = $this->generateFrontendUrl($objPage->row(), '/changefont/' . $font);
		   }
		     
		$this->Template->arrFonts = $arrTplFonts;
		
		
		
		// 2. styles
		$arrStyles = deserialize($this->sjstyleswitcher_styles);
		$arrTplStyles = array();
		
		if ( is_array($arrStyles) && count($arrStyles) )
		   foreach ($arrStyles as $style)
		   {
		       $arrTplStyles[$style] = $GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$style];
		       $arrTplStyles[$style]['href'] = $this->generateFrontendUrl($objPage->row(), '/changestyle/' . $style);
		   }
		     
		$this->Template->arrStyles = $arrTplStyles;
		
		
		
		// 3. change style
		// 3.1 change font size
		if ($this->Input->get('changefont') != '' && is_array($GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->get('changefont')]))
		{
			// 3.1.1 set new style
			$this->setCookie('SJSTYLESWITCHER_FONTSIZE', $this->Input->get('changefont'), (($this->sjstyleswitcher_cookielifetime > 0) ? (time() + $this->sjstyleswitcher_cookielifetime*86400) : 0));
    
			// 3.1.2 redirect to page
			$this->redirect( $this->generateFrontendUrl($objPage->row()) );
		}
		
		// 3.2 change style
		if ($this->Input->get('changestyle') != '' && is_array($GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->get('changestyle')]))
		{
			// 3.2.1 set new style
			$this->setCookie('SJSTYLESWITCHER_STYLE', $this->Input->get('changestyle'), (($this->sjstyleswitcher_cookielifetime > 0) ? (time() + $this->sjstyleswitcher_cookielifetime*86400) : 0));
    
			// 3.2.2 redirect to page
			$this->redirect( $this->generateFrontendUrl($objPage->row()) );
		}
		
		
		
		// 4. load saved styles
		if ($this->Input->cookie('SJSTYLESWITCHER_FONTSIZE') != '')
		{
			$objPage->cssClass .= ' ' . $GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->cookie('SJSTYLESWITCHER_FONTSIZE')]['class'];

			if (strlen($GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->cookie('SJSTYLESWITCHER_FONTSIZE')]['css']))
				$GLOBALS['TL_HEAD'][] = '<link rel="stylesheet" media="screen" type="text/css" href="' . $GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->cookie('SJSTYLESWITCHER_FONTSIZE')]['css'] . '" id="sjFontLink" />';
		}

  
		if ($this->Input->cookie('SJSTYLESWITCHER_STYLE') != '')
		{
			$objPage->cssClass .= ' ' . $GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->cookie('SJSTYLESWITCHER_STYLE')]['class'];

			if (strlen($GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->cookie('SJSTYLESWITCHER_STYLE')]['css']))
				$GLOBALS['TL_HEAD'][] = '<link rel="stylesheet" media="screen" type="text/css" href="' . $GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->cookie('SJSTYLESWITCHER_STYLE')]['css'] . '" id="sjStyleLink" />';
		}	
        
        
       
		// 5. use styles as alternate stylesheets
		/*
		if ($this->sjstyleswitcher_alternatestyles == '1')
			foreach ($GLOBALS['TL_SJSTYLESWITCHER']['STYLES'] as $name => $style)
				if (strlen($style['css']))
					$GLOBALS['TL_HEAD'][] = '<link rel="alternate stylesheet" type="text/css" href="' . $style['css'] . '" title="' . $style['label'] . '" id="' . $name . '" />';
		*/


		// 6. insert mootools
		$GLOBALS['TL_MOOTOOLS'][] = "<script type='text/javascript'>
<!--//--><![CDATA[//><!--
window.addEvent('domready', function() {
   new SJStyleswitcher({id: " . $this->id . ", cookieLifetime: " . $this->sjstyleswitcher_cookielifetime . "});
});
//--><!]]>
</script>";
		
	
	}
	
	
	/**
	 * Generate ajax
	 */
	public function generateAjax()
	{
		if (strlen($this->Input->get('type')) && strlen($this->Input->get('style')))
		{

			if ($this->Input->get('type') == 'changefont' && is_array($GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->get('style')]))
			{
				$GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->get('style')]['deleteClass'] = $GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->cookie('SJSTYLESWITCHER_FONTSIZE')]['class'];
				return $GLOBALS['TL_SJSTYLESWITCHER']['FONTSIZES'][$this->Input->get('style')];
			}

			if ($this->Input->get('type') == 'changestyle' && is_array($GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->get('style')]))
			{
				$GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->get('style')]['deleteClass'] = $GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->cookie('SJSTYLESWITCHER_STYLE')]['class'];
				return $GLOBALS['TL_SJSTYLESWITCHER']['STYLES'][$this->Input->get('style')];
			}

		}

		return array('msg' => 'style not found');

	}

}

?>