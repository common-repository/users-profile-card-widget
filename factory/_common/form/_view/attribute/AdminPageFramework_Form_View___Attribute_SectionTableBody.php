<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_SectionTableBody extends UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Base {
    public $sContext = 'section_table_content';
    protected function _getAttributes() {
        $_sCollapsibleType = $this->getElement($this->aArguments, array('collapsible', 'type'), 'box');
        return array('class' => $this->getAOrB($this->aArguments['_is_collapsible'], 'users-profile-card-widget-collapsible-section-content' . ' ' . 'users-profile-card-widget-collapsible-content' . ' ' . 'accordion-section-content' . ' ' . 'users-profile-card-widget-collapsible-content-type-' . $_sCollapsibleType, null),);
    }
}
