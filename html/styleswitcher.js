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
 
 
var SJStyleswitcher=new Class({Implements:Options,options:{id:0,selector:'sjstyleswitcher',cookieLifetime:0},initialize:function(a){this.setOptions(a);this.loadStyles()},loadStyles:function(){var j=this.options.id;var k=this.options.cookieLifetime;$$('.styleswitcher a').addEvent('click',function(e){e.stop();var f=this.href.split('/');var g=f[f.length-2];var h=f[f.length-1].substr(0,f[f.length-1].length-5);var i=new Request.JSON({url:'ajax.php',onSuccess:function(a){if(a.msg!=undefined&&a.msg.length>0)alert(a.msg);if(a.deleteClass!=null&&a.deleteClass.length>0)$(document.body).removeClass(a.deleteClass);if(a.class.length>0)$(document.body).addClass(a.class);if(g=='changefont')var b=Cookie.write('SJSTYLESWITCHER_FONTSIZE',h,{duration:k});else var b=Cookie.write('SJSTYLESWITCHER_STYLE',h,{duration:k});var c=(g=='changefont')?$('sjFontLink'):$('sjStyleLink');if(a.css!=null&&a.css.length>0){if(!c)var d=Asset.css(a.css,{id:(g=='changefont')?'sjFontLink':'sjStyleLink'});else $(c).set('href',a.css)}else if(c)$(c).dispose()},onError:function(a,b){alert(b)}}).get({'action':'fmd','id':j,'type':g,'style':h})})}});