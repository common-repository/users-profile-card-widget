<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_Form_View___Fieldset_Base extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $aField = array();
    public $aFieldTypeDefinitions = array();
    public $aOptions = array();
    public $aErrors = array();
    public $oMsg;
    public $aCallbacks = array();
    public function __construct(&$aField, $aOptions, $aErrors, &$aFieldTypeDefinitions, &$oMsg, array $aCallbacks = array()) {
        $this->aField = $this->_getFormatted($aField, $aFieldTypeDefinitions);
        $this->aFieldTypeDefinitions = $aFieldTypeDefinitions;
        $this->aOptions = $aOptions;
        $this->aErrors = $this->getAsArray($aErrors);
        $this->oMsg = $oMsg;
        $this->aCallbacks = $aCallbacks + array('hfID' => null, 'hfTagID' => null, 'hfName' => null, 'hfNameFlat' => null, 'hfInputName' => null, 'hfInputNameFlat' => null, 'hfClass' => null,);
        $this->_loadScripts($this->aField['_structure_type']);
    }
    private function _getFormatted($aFieldset, $aFieldTypeDefinitions) {
        return $this->uniteArrays($aFieldset, $this->_getFieldTypeDefaultArguments($aFieldset['type'], $aFieldTypeDefinitions) + UsersProfileCardWidgetAdminPageFramework_Form_Model___Format_Fieldset::$aStructure);
    }
    private function _getFieldTypeDefaultArguments($sFieldType, $aFieldTypeDefinitions) {
        $_aFieldTypeDefinition = $this->getElement($aFieldTypeDefinitions, $sFieldType, $aFieldTypeDefinitions['default']);
        $_aDefaultKeys = $this->getAsArray($_aFieldTypeDefinition['aDefaultKeys']);
        $_aDefaultKeys['attributes'] = array('fieldrow' => $_aDefaultKeys['attributes']['fieldrow'], 'fieldset' => $_aDefaultKeys['attributes']['fieldset'], 'fields' => $_aDefaultKeys['attributes']['fields'], 'field' => $_aDefaultKeys['attributes']['field'],);
        return $_aDefaultKeys;
    }
    static private $_bIsLoadedSScripts = false;
    static private $_bIsLoadedSScripts_Widget = false;
    private function _loadScripts($sStructureType = '') {
        if ('widget' === $sStructureType && !self::$_bIsLoadedSScripts_Widget) {
            new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_Widget;
            self::$_bIsLoadedSScripts_Widget = true;
        }
        if (self::$_bIsLoadedSScripts) {
            return;
        }
        self::$_bIsLoadedSScripts = true;
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_Utility;
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_OptionStorage;
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_AttributeUpdator;
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_RepeatableField($this->oMsg);
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_SortableField;
    }
    protected function _getRepeaterFieldEnablerScript($sFieldsContainerID, $iFieldCount, $aSettings) {
        $_sAdd = $this->oMsg->get('add');
        $_sRemove = $this->oMsg->get('remove');
        $_sVisibility = $iFieldCount <= 1 ? " style='visibility: hidden;'" : "";
        $_sSettingsAttributes = $this->generateDataAttributes(( array )$aSettings);
        $_bDashiconSupported = false;
        $_sDashiconPlus = $_bDashiconSupported ? 'dashicons dashicons-plus' : '';
        $_sDashiconMinus = $_bDashiconSupported ? 'dashicons dashicons-minus' : '';
        $_sButtons = "<div class='users-profile-card-widget-repeatable-field-buttons' {$_sSettingsAttributes} >" . "<a class='repeatable-field-remove-button button-secondary repeatable-field-button button button-small {$_sDashiconMinus}' href='#' title='{$_sRemove}' {$_sVisibility} data-id='{$sFieldsContainerID}'>" . ($_bDashiconSupported ? '' : '-') . "</a>" . "<a class='repeatable-field-add-button button-secondary repeatable-field-button button button-small {$_sDashiconPlus}' href='#' title='{$_sAdd}' data-id='{$sFieldsContainerID}'>" . ($_bDashiconSupported ? '' : '+') . "</a>" . "</div>";
        $_aJSArray = json_encode($aSettings);
        $_sButtonsHTML = '"' . $_sButtons . '"';
        $_sScript = <<<JAVASCRIPTS
jQuery( document ).ready( function() {
    var _nodePositionIndicators = jQuery( '#{$sFieldsContainerID} .users-profile-card-widget-field .repeatable-field-buttons' );
    /* If the position of inserting the buttons is specified in the field type definition, replace the pointer element with the created output */
    if ( _nodePositionIndicators.length > 0 ) {
        _nodePositionIndicators.replaceWith( $_sButtonsHTML );
    } else { 
    /* Otherwise, insert the button element at the beginning of the field tag */
        // check the button container already exists for WordPress 3.5.1 or below
        if ( ! jQuery( '#{$sFieldsContainerID} .users-profile-card-widget-repeatable-field-buttons' ).length ) { 
            // Adds the buttons
            jQuery( '#{$sFieldsContainerID} .users-profile-card-widget-field' ).prepend( $_sButtonsHTML ); 
        }
    }     
    jQuery( '#{$sFieldsContainerID}' ).updateUsersProfileCardWidgetAdminPageFrameworkRepeatableFields( $_aJSArray ); // Update the fields     
});
JAVASCRIPTS;
        return "<script type='text/javascript'>" . '/* <![CDATA[ */' . $_sScript . '/* ]]> */' . "</script>";
    }
    protected function _getSortableFieldEnablerScript($sFieldsContainerID) {
        $_sScript = <<<JAVASCRIPTS
    jQuery( document ).ready( function() {
        jQuery( this ).enableUsersProfileCardWidgetAdminPageFrameworkSortableFields( '$sFieldsContainerID' );
    });
JAVASCRIPTS;
        return "<script type='text/javascript' class='users-profile-card-widget-sortable-field-enabler-script'>" . '/* <![CDATA[ */' . $_sScript . '/* ]]> */' . "</script>";
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___Fieldset extends UsersProfileCardWidgetAdminPageFramework_Form_View___Fieldset_Base {
    public function get() {
        $_aOutputs = array();
        $_oFieldError = new UsersProfileCardWidgetAdminPageFramework_Form_View___Fieldset___FieldError($this->aErrors, $this->aField['_section_path_array'], $this->aField['_field_path_array'], $this->aField['error_message']);
        $_aOutputs[] = $_oFieldError->get();
        $_oFieldsFormatter = new UsersProfileCardWidgetAdminPageFramework_Form_Model___Format_Fields($this->aField, $this->aOptions);
        $_aFields = $_oFieldsFormatter->get();
        $_aOutputs[] = $this->_getFieldsOutput($_aFields, $this->aCallbacks);
        return $this->_getFinalOutput($this->aField, $_aOutputs, count($_aFields));
    }
    public function _getFieldOutput() {
        return $this->get();
    }
    private function _getFieldsOutput(array $aFields, array $aCallbacks = array()) {
        $_aOutput = array();
        foreach ($aFields as $_isIndex => $_aField) {
            $_aOutput[] = $this->_getEachFieldOutput($_aField, $_isIndex, $aCallbacks, $this->isLastElement($aFields, $_isIndex));
        }
        return implode(PHP_EOL, array_filter($_aOutput));
    }
    private function _getEachFieldOutput(array $aField, $isIndex, array $aCallbacks, $bIsLastElement = false) {
        $_aFieldTypeDefinition = $this->_getFieldTypeDefinition($aField['type']);
        if (!is_callable($_aFieldTypeDefinition['hfRenderField'])) {
            return '';
        }
        $_oSubFieldFormatter = new UsersProfileCardWidgetAdminPageFramework_Form_Model___Format_EachField($aField, $isIndex, $aCallbacks, $_aFieldTypeDefinition);
        $aField = $_oSubFieldFormatter->get();
        $_oFieldAttribute = new UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Field($aField);
        return $aField['before_field'] . "<div " . $_oFieldAttribute->get() . ">" . call_user_func_array($_aFieldTypeDefinition['hfRenderField'], array($aField)) . $this->_getUnsetFlagFieldInputTag($aField) . $this->_getDelimiter($aField, $bIsLastElement) . "</div>" . $aField['after_field'];
    }
    private function _getUnsetFlagFieldInputTag(array $aField) {
        if (false !== $aField['save']) {
            return '';
        }
        return $this->getHTMLTag('input', array('type' => 'hidden', 'name' => '__unset_' . $aField['_fields_type'] . '[' . $aField['_input_name_flat'] . ']', 'value' => $aField['_input_name_flat'], 'class' => 'unset-element-names element-address',));
    }
    private function _getFieldTypeDefinition($sFieldTypeSlug) {
        return $this->getElement($this->aFieldTypeDefinitions, $sFieldTypeSlug, $this->aFieldTypeDefinitions['default']);
    }
    private function _getDelimiter(array $aField, $bIsLastElement) {
        return $aField['delimiter'] ? "<div " . $this->getAttributes(array('class' => 'delimiter', 'id' => "delimiter-{$aField['input_id']}", 'style' => $this->getAOrB($bIsLastElement, "display:none;", ""),)) . ">" . $aField['delimiter'] . "</div>" : '';
    }
    private function _getFinalOutput(array $aFieldset, array $aFieldsOutput, $iFieldsCount) {
        $_oFieldsetAttributes = new UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Fieldset($aFieldset);
        return $aFieldset['before_fieldset'] . "<fieldset " . $_oFieldsetAttributes->get() . ">" . $this->_getFieldsetContent($aFieldset, $aFieldsOutput, $iFieldsCount) . $this->_getExtras($aFieldset, $iFieldsCount) . "</fieldset>" . $aFieldset['after_fieldset'];
    }
    private function _getFieldsetContent($aFieldset, $aFieldsOutput, $iFieldsCount) {
        if (is_scalar($aFieldset['content'])) {
            return $aFieldset['content'];
        }
        $_oFieldsAttributes = new UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Fields($aFieldset, array(), $iFieldsCount);
        return "<div " . $_oFieldsAttributes->get() . ">" . $aFieldset['before_fields'] . implode(PHP_EOL, $aFieldsOutput) . $aFieldset['after_fields'] . "</div>";
    }
    private function _getExtras($aField, $iFieldsCount) {
        $_aOutput = array();
        $_oFieldDescription = new UsersProfileCardWidgetAdminPageFramework_Form_View___Description($aField['description'], 'users-profile-card-widget-fields-description');
        $_aOutput[] = $_oFieldDescription->get();
        $_aOutput[] = $this->_getDynamicElementFlagFieldInputTag($aField);
        $_aOutput[] = $this->_getFieldScripts($aField, $iFieldsCount);
        return implode(PHP_EOL, array_filter($_aOutput));
    }
    private function _getDynamicElementFlagFieldInputTag(array $aFieldset) {
        if ($aFieldset['repeatable']) {
            return $this->_getRepeatableFieldFlagTag($aFieldset);
        }
        if ($aFieldset['sortable']) {
            return $this->_getSortableFieldFlagTag($aFieldset);
        }
        return '';
    }
    private function _getRepeatableFieldFlagTag(array $aFieldset) {
        return $this->getHTMLTag('input', array('type' => 'hidden', 'name' => '__repeatable_elements_' . $aFieldset['_structure_type'] . '[' . $aFieldset['_field_address'] . ']', 'class' => 'element-address', 'value' => $aFieldset['_field_address'], 'data-field_address_model' => $aFieldset['_field_address_model'],));
    }
    private function _getSortableFieldFlagTag(array $aFieldset) {
        return $this->getHTMLTag('input', array('type' => 'hidden', 'name' => '__sortable_elements_' . $aFieldset['_structure_type'] . '[' . $aFieldset['_field_address'] . ']', 'class' => 'element-address', 'value' => $aFieldset['_field_address'], 'data-field_address_model' => $aFieldset['_field_address_model'],));
    }
    private function _getFieldScripts($aField, $iFieldsCount) {
        $_aOutput = array();
        $_aOutput[] = $aField['repeatable'] ? $this->_getRepeaterFieldEnablerScript('fields-' . $aField['tag_id'], $iFieldsCount, $aField['repeatable']) : '';
        $_aOutput[] = $aField['sortable'] && ($iFieldsCount > 1 || $aField['repeatable']) ? $this->_getSortableFieldEnablerScript('fields-' . $aField['tag_id']) : '';
        return implode(PHP_EOL, $_aOutput);
    }
}
