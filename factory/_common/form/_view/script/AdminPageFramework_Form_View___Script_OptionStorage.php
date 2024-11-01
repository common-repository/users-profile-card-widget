<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Script_OptionStorage extends UsersProfileCardWidgetAdminPageFramework_Form_View___Script_Base {
    static public function getScript() {
        return <<<JAVASCRIPTS
(function ( $ ) {
            
    $.fn.aUsersProfileCardWidgetAdminPageFrameworkInputOptions = {}; 
                            
    $.fn.storeUsersProfileCardWidgetAdminPageFrameworkInputOptions = function( sID, vOptions ) {
        var sID = sID.replace( /__\d+_/, '___' );// remove the section index. The g modifier is not used so it will replace only the first occurrence.
        $.fn.aUsersProfileCardWidgetAdminPageFrameworkInputOptions[ sID ] = vOptions;
    };
    $.fn.getUsersProfileCardWidgetAdminPageFrameworkInputOptions = function( sID ) {
        var sID = sID.replace( /__\d+_/, '___' ); // remove the section index
        return ( 'undefined' === typeof $.fn.aUsersProfileCardWidgetAdminPageFrameworkInputOptions[ sID ] )
            ? null
            : $.fn.aUsersProfileCardWidgetAdminPageFrameworkInputOptions[ sID ];
    }

}( jQuery ));
JAVASCRIPTS;
        
    }
}
