<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_FieldType_checkbox extends UsersProfileCardWidgetAdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('checkbox');
    protected $aDefaultKeys = array('select_all_button' => false, 'select_none_button' => false,);
    protected function getScripts() {
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_CheckboxSelector;
        $_sClassSelectorSelectAll = $this->_getSelectButtonClassSelectors($this->aFieldTypeSlugs, 'select_all_button');
        $_sClassSelectorSelectNone = $this->_getSelectButtonClassSelectors($this->aFieldTypeSlugs, 'select_none_button');
        return <<<JAVASCRIPTS
jQuery( document ).ready( function(){
    // Add the buttons.
    jQuery( '{$_sClassSelectorSelectAll}' ).each( function(){
        jQuery( this ).before( '<div class=\"select_all_button_container\" onclick=\"jQuery( this ).selectAllUsersProfileCardWidgetAdminPageFrameworkCheckboxes(); return false;\"><a class=\"select_all_button button button-small\">' + jQuery( this ).data( 'select_all_button' ) + '</a></div>' );
    });            
    jQuery( '{$_sClassSelectorSelectNone}' ).each( function(){
        jQuery( this ).before( '<div class=\"select_none_button_container\" onclick=\"jQuery( this ).deselectAllUsersProfileCardWidgetAdminPageFrameworkCheckboxes(); return false;\"><a class=\"select_all_button button button-small\">' + jQuery( this ).data( 'select_none_button' ) + '</a></div>' );
    });
});
JAVASCRIPTS;
        
    }
    private function _getSelectButtonClassSelectors(array $aFieldTypeSlugs, $sDataAttribute = 'select_all_button') {
        $_aClassSelectors = array();
        foreach ($aFieldTypeSlugs as $_sSlug) {
            if (!is_scalar($_sSlug)) {
                continue;
            }
            $_aClassSelectors[] = '.users-profile-card-widget-checkbox-container-' . $_sSlug . "[data-{$sDataAttribute}]";
        }
        return implode(',', $_aClassSelectors);
    }
    protected function getStyles() {
        return ".select_all_button_container, .select_none_button_container{display: inline-block;margin-bottom: 0.4em;}.users-profile-card-widget-checkbox-label {margin-top: 0.1em;}.users-profile-card-widget-field input[type='checkbox' ] {margin-right: 0.5em;} .users-profile-card-widget-field-checkbox .users-profile-card-widget-input-label-container {padding-right: 1em;}.users-profile-card-widget-field-checkbox .users-profile-card-widget-input-label-string{display: inline; }";
    }
    protected $_sCheckboxClassSelector = 'apf_checkbox';
    protected function getField($aField) {
        $_aOutput = array();
        $_bIsMultiple = is_array($aField['label']);
        foreach ($this->getAsArray($aField['label'], true) as $_sKey => $_sLabel) {
            $_aOutput[] = $this->_getEachCheckboxOutput($aField, $_bIsMultiple ? $_sKey : '', $_sLabel);
        }
        return "<div " . $this->getAttributes($this->_getCheckboxContainerAttributes($aField)) . ">" . "<div class='repeatable-field-buttons'></div>" . implode(PHP_EOL, $_aOutput) . "</div>";
    }
    protected function _getCheckboxContainerAttributes(array $aField) {
        return array('class' => 'users-profile-card-widget-checkbox-container-' . $aField['type'], 'data-select_all_button' => $aField['select_all_button'] ? (!is_string($aField['select_all_button']) ? $this->oMsg->get('select_all') : $aField['select_all_button']) : null, 'data-select_none_button' => $aField['select_none_button'] ? (!is_string($aField['select_none_button']) ? $this->oMsg->get('select_none') : $aField['select_none_button']) : null,);
    }
    private function _getEachCheckboxOutput(array $aField, $sKey, $sLabel) {
        $_oCheckbox = new UsersProfileCardWidgetAdminPageFramework_Input_checkbox($aField['attributes']);
        $_oCheckbox->setAttributesByKey($sKey);
        $_oCheckbox->addClass($this->_sCheckboxClassSelector);
        return $this->getElementByLabel($aField['before_label'], $sKey, $aField['label']) . "<div class='users-profile-card-widget-input-label-container users-profile-card-widget-checkbox-label' style='min-width: " . $this->sanitizeLength($aField['label_min_width']) . ";'>" . "<label " . $this->getAttributes(array('for' => $_oCheckbox->getAttribute('id'), 'class' => $_oCheckbox->getAttribute('disabled') ? 'disabled' : null,)) . ">" . $this->getElementByLabel($aField['before_input'], $sKey, $aField['label']) . $_oCheckbox->get($sLabel) . $this->getElementByLabel($aField['after_input'], $sKey, $aField['label']) . "</label>" . "</div>" . $this->getElementByLabel($aField['after_label'], $sKey, $aField['label']);
    }
}
class UsersProfileCardWidgetAdminPageFramework_FieldType_posttype extends UsersProfileCardWidgetAdminPageFramework_FieldType_checkbox {
    public $aFieldTypeSlugs = array('posttype',);
    protected $aDefaultKeys = array('slugs_to_remove' => null, 'query' => array(), 'operator' => 'and', 'attributes' => array('size' => 30, 'maxlength' => 400,), 'select_all_button' => true, 'select_none_button' => true,);
    protected $aDefaultRemovingPostTypeSlugs = array('revision', 'attachment', 'nav_menu_item',);
    protected function getStyles() {
        $_sParentStyles = parent::getStyles();
        return $_sParentStyles . ".users-profile-card-widget-field input[type='checkbox'] {margin-right: 0.5em;} .users-profile-card-widget-field-posttype .users-profile-card-widget-input-label-container {padding-right: 1em;}";
    }
    protected function getField($aField) {
        $this->_sCheckboxClassSelector = '';
        $aField['label'] = $this->_getPostTypeArrayForChecklist(isset($aField['slugs_to_remove']) ? $this->getAsArray($aField['slugs_to_remove']) : $this->aDefaultRemovingPostTypeSlugs, $aField['query'], $aField['operator']);
        return parent::getField($aField);
    }
    private function _getPostTypeArrayForChecklist($aSlugsToRemove, $asQueryArgs = array(), $sOperator = 'and') {
        $_aPostTypes = array();
        foreach (get_post_types($asQueryArgs, 'objects') as $_oPostType) {
            if (isset($_oPostType->name, $_oPostType->label)) {
                $_aPostTypes[$_oPostType->name] = $_oPostType->label;
            }
        }
        return array_diff_key($_aPostTypes, array_flip($aSlugsToRemove));
    }
}
