/* 
 * Mudthemes Responsive Navigation Script
 * 
 * Definition: This script is used to display a multilevel 
 * dropdown navigation for mobile devices.
 * Author: muthemes.com
 * 
 * Copyright @ 2013, mudthemes
 */

jQuery(document).ready(function($) {

			$(document).ready(function(){
                            
                            var mudRespNav = function(){
                                
                                $(window).load(function(){
                                    var mudrnTabStatus = $('#menu-container .mudrn-tab').css('display');
                                    if(mudrnTabStatus === 'block'){
                                        $('#menu-container #menu').addClass('mudrn-menu');
                                    } else {
                                        $('#menu-container #menu').removeClass('mudrn-menu');
                                    }
                                });

                                $(window).resize(function(){
                                    var mudrnTabStatus = $('#menu-container .mudrn-tab').css('display');
                                    var menuStatus = $('#menu-container #menu').css('display');
                                    
                                    if(mudrnTabStatus === 'block'){
                                        $('#menu-container #menu').addClass('mudrn-menu');
                                        $('#menu-container #menu').hide();
                                    } else {
                                        $('#menu-container #menu').removeClass('mudrn-menu');
                                        if( menuStatus === 'none' ){
                                            $('#menu-container #menu').show();
                                        }
                                    }
                                });

                                $('#menu-container .mudrn-tab').click(function(){
                                    var menuStatus = $('#menu-container #menu').css('display');
                                    if (menuStatus === 'block'){                                                                                
                                        $('#menu-container #menu').slideUp();
                                    }else {

                                        $('#menu-container #menu').slideDown();
                                    }});
                                
/*                                
                                $prependRestrict = false; // used to restrict the number of <div> appends (default is 1)
                                var mudrnTabTextShow = 'Show Menu';
                                var mudrnTabTextHide = 'Hide Menu';
                                var sfMenuContainer = $('#menu-container'); // SF Menu Container
                                var sfMenuContainerMenu = $('#menu-container #menu'); // SF Menu Container - Menu
                                var sfMenuContainerUL = $('#menu-container #menu > ul'); // SF Menu Container - Menu - ul

                                $(document).ready(function(){
                                    var sfMenuStatus = $(sfMenuContainer).css('display'); // Display Status of SF Menu Container
                                    
                                        if(sfMenuStatus === 'none' && $prependRestrict === false ){
                                        $(sfMenuContainer).prepend('<div class="mudrn-tab"><a href="#">' + mudrnTabTextShow + '</a></div>');
                                        $(sfMenuContainerUL).addClass('mudrn-menu'); // add mudrn-menu class to existing menu.
                                        $(sfMenuContainer).show();
                                        $(sfMenuContainerMenu).hide();
                                        $prependRestrict = true;
                                    }
                                }); // end window load
                                
                                $(window).resize(function(){
                                    var sfMenuStatus = $(sfMenuContainer).css('display'); // Display Status of SF Menu Container
                                    var sfMenuMStatus = $(sfMenuContainerMenu).css('display'); // Display Status of SF Menu Container
    
                                    if(sfMenuStatus === 'none' && $prependRestrict === false ){
                                        $(sfMenuContainer).prepend('<div class="mudrn-tab"><a href="#">' + mudrnTabTextShow + '</a></div>');
                                        $(sfMenuContainerUL).addClass('mudrn-menu'); // add mudrn-menu class to existing menu.
                                        $(sfMenuContainer).show();
                                        $(sfMenuContainerMenu).hide();
                                        $prependRestrict = true;
                                    }
                                    
                                    if(sfMenuMStatus === 'block' && $prependRestrict === true ){
                                        $('.mudrn-tab').hide();
                                    }
                                }); // end window resize */
                            }; mudRespNav(); // end mudRespNav

                        }); // end document ready


}); // end jQuery document ready
