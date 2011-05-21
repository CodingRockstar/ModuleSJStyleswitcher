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
 
 
var SJStyleswitcher = new Class(
{
  
    Implements: Options,
    options: {
       id: 0,
       selector: 'sjstyleswitcher',
       cookieLifetime: 0
    },


    initialize: function( options ){ this.setOptions( options ); this.loadStyles(); },

    
    loadStyles: function(){
    
       var modId = this.options.id;
       var cookieLifetime = this.options.cookieLifetime;
       
       
       $$('.styleswitcher a').addEvent('click', function(event){
       
          event.stop();
          
          var urlFragments = this.href.split('/');
          var type = urlFragments[ urlFragments.length-2 ];
          var val  = urlFragments[ urlFragments.length-1 ].substr(0, urlFragments[ urlFragments.length-1 ].length-5 );
          
          var jsonRequest = new Request.JSON({
             url: 'ajax.php', 
             onSuccess: function(style){
                
                // error message ?
                if ( style.msg != undefined && style.msg.length > 0 )
                   alert( style.msg );
                
                // delete old class
                if (style.deleteClass != null && style.deleteClass.length > 0) $(document.body).removeClass( style.deleteClass );
                
                // set new class  
                if( style.class.length > 0 )
                   $(document.body).addClass( style.class );
                   
                // save new class
                if (type == 'changefont')
                   var styleCookie = Cookie.write('SJSTYLESWITCHER_FONTSIZE', val, {duration: cookieLifetime});
                else
                   var styleCookie = Cookie.write('SJSTYLESWITCHER_STYLE', val, {duration: cookieLifetime});
                   
                   
                // add css-file to head
                if (style.css != null && style.css.length > 0)
                   var newCSS = Asset.css( style.css, { } );
                
             },
             onError: function(text, error){
                alert( error );
             }
          }).get({'action': 'fmd', 'id': modId, 'type': type, 'style': val});
          
          
       });
           
    }
    
});