<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Script_CheckboxSelector extends UsersProfileCardWidgetAdminPageFramework_Form_View___Script_Base {
    static public function getScript() {
        return <<<JAVASCRIPTS
(function ( $ ) {

    /**
     * Checks all the checkboxes in siblings.
     */        
    $.fn.selectAllUsersProfileCardWidgetAdminPageFrameworkCheckboxes = function() {
        jQuery( this ).parent()
            .find( 'input[type=checkbox]' )
            .attr( 'checked', true );                
    }
    /**
     * Unchecks all the checkboxes in siblings.
     */
    $.fn.deselectAllUsersProfileCardWidgetAdminPageFrameworkCheckboxes = function() {
        jQuery( this ).parent()
            .find( 'input[type=checkbox]' )
            .attr( 'checked', false );                             
    }          

}( jQuery ));
JAVASCRIPTS;
        
    }
}
