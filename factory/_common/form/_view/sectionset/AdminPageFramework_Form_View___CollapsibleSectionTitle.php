<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Section_Base extends UsersProfileCardWidgetAdminPageFramework_Form_Base {
    public function isSectionsetVisible($aSectionset) {
        if (empty($aSectionset)) {
            return false;
        }
        return $this->callBack($this->aCallbacks['is_sectionset_visible'], array(true, $aSectionset));
    }
    public function isFieldsetVisible($aFieldset) {
        if (empty($aFieldset)) {
            return false;
        }
        return $this->callBack($this->aCallbacks['is_fieldset_visible'], array(true, $aFieldset));
    }
    public function getFieldsetOutput($aFieldset) {
        if (!$this->isFieldsetVisible($aFieldset)) {
            return '';
        }
        $_oFieldset = new UsersProfileCardWidgetAdminPageFramework_Form_View___Fieldset($aFieldset, $this->aSavedData, $this->aFieldErrors, $this->aFieldTypeDefinitions, $this->oMsg, $this->aCallbacks);
        $_sFieldOutput = $_oFieldset->get();
        return $_sFieldOutput;
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___SectionTitle extends UsersProfileCardWidgetAdminPageFramework_Form_View___Section_Base {
    public $aArguments = array('title' => null, 'tag' => null, 'section_index' => null, 'sectionset' => array(),);
    public $aFieldsets = array();
    public $aSavedData = array();
    public $aFieldErrors = array();
    public $aFieldTypeDefinitions = array();
    public $oMsg;
    public $aCallbacks = array('fieldset_output', 'is_fieldset_visible' => null,);
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->aFieldsets, $this->aSavedData, $this->aFieldErrors, $this->aFieldTypeDefinitions, $this->oMsg, $this->aCallbacks);
        $this->aArguments = $_aParameters[0] + $this->aArguments;
        $this->aFieldsets = $_aParameters[1];
        $this->aSavedData = $_aParameters[2];
        $this->aFieldErrors = $_aParameters[3];
        $this->aFieldTypeDefinitions = $_aParameters[4];
        $this->oMsg = $_aParameters[5];
        $this->aCallbacks = $_aParameters[6];
    }
    public function get() {
        $_sTitle = $this->_getSectionTitle($this->aArguments['title'], $this->aArguments['tag'], $this->aFieldsets, $this->aArguments['section_index'], $this->aFieldTypeDefinitions);
        return $_sTitle;
    }
    private function _getToolTip() {
        $_aSectionset = $this->aArguments['sectionset'];
        $_sSectionTitleTagID = str_replace('|', '_', $_aSectionset['_section_path']) . '_' . $this->aArguments['section_index'];
        $_oToolTip = new UsersProfileCardWidgetAdminPageFramework_Form_View___ToolTip($_aSectionset['tip'], $_sSectionTitleTagID);
        return $_oToolTip->get();
    }
    protected function _getSectionTitle($sTitle, $sTag, $aFieldsets, $iSectionIndex = null, $aFieldTypeDefinitions = array(), $aCollapsible = array()) {
        $_aSectionTitleField = $this->_getSectionTitleField($aFieldsets, $iSectionIndex, $aFieldTypeDefinitions);
        return $_aSectionTitleField ? $this->getFieldsetOutput($_aSectionTitleField) : "<{$sTag}>" . $this->_getCollapseButton($aCollapsible) . $sTitle . $this->_getToolTip() . "</{$sTag}>";
    }
    private function _getCollapseButton($aCollapsible) {
        $_sExpand = esc_attr($this->oMsg->get('click_to_expand'));
        $_sCollapse = esc_attr($this->oMsg->get('click_to_collapse'));
        return $this->getAOrB('button' === $this->getElement($aCollapsible, 'type', 'box'), "<span class='users-profile-card-widget-collapsible-button users-profile-card-widget-collapsible-button-expand' title='{$_sExpand}'>&#9658;</span>" . "<span class='users-profile-card-widget-collapsible-button users-profile-card-widget-collapsible-button-collapse' title='{$_sCollapse}'>&#9660;</span>", '');
    }
    private function _getSectionTitleField(array $aFieldsetsets, $iSectionIndex, $aFieldTypeDefinitions) {
        foreach ($aFieldsetsets as $_aFieldsetset) {
            if ('section_title' !== $_aFieldsetset['type']) {
                continue;
            }
            $_oFieldsetOutputFormatter = new UsersProfileCardWidgetAdminPageFramework_Form_Model___Format_FieldsetOutput($_aFieldsetset, $iSectionIndex, $aFieldTypeDefinitions);
            return $_oFieldsetOutputFormatter->get();
        }
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___CollapsibleSectionTitle extends UsersProfileCardWidgetAdminPageFramework_Form_View___SectionTitle {
    public $aArguments = array('title' => null, 'tag' => null, 'section_index' => null, 'collapsible' => array(), 'container_type' => 'section', 'sectionset' => array(),);
    public $aFieldsets = array();
    public $aSavedData = array();
    public $aFieldErrors = array();
    public $aFieldTypeDefinitions = array();
    public $oMsg;
    public $aCallbacks = array('fieldset_output', 'is_fieldset_visible' => null,);
    public function get() {
        if (empty($this->aArguments['collapsible'])) {
            return '';
        }
        return $this->_getCollapsibleSectionTitleBlock($this->aArguments['collapsible'], $this->aArguments['container_type'], $this->aArguments['section_index']);
    }
    private function _getCollapsibleSectionTitleBlock(array $aCollapsible, $sContainer = 'sections', $iSectionIndex = null) {
        if ($sContainer !== $aCollapsible['container']) {
            return '';
        }
        $_sSectionTitle = $this->_getSectionTitle($this->aArguments['title'], $this->aArguments['tag'], $this->aFieldsets, $iSectionIndex, $this->aFieldTypeDefinitions, $aCollapsible);
        $_aSectionset = $this->aArguments['sectionset'];
        $_sSectionTitleTagID = str_replace('|', '_', $_aSectionset['_section_path']) . '_' . $iSectionIndex;
        return $this->_getCollapsibleSectionsEnablerScript() . "<div " . $this->getAttributes(array('id' => $_sSectionTitleTagID, 'class' => $this->getClassAttribute('users-profile-card-widget-section-title', $this->getAOrB('box' === $aCollapsible['type'], 'accordion-section-title', ''), 'users-profile-card-widget-collapsible-title', $this->getAOrB('sections' === $aCollapsible['container'], 'users-profile-card-widget-collapsible-sections-title', 'users-profile-card-widget-collapsible-section-title'), $this->getAOrB($aCollapsible['is_collapsed'], 'collapsed', ''), 'users-profile-card-widget-collapsible-type-' . $aCollapsible['type']),) + $this->getDataAttributeArray($aCollapsible)) . ">" . $_sSectionTitle . "</div>";
    }
    static private $_bLoaded = false;
    protected function _getCollapsibleSectionsEnablerScript() {
        if (self::$_bLoaded) {
            return;
        }
        self::$_bLoaded = true;
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_CollapsibleSection($this->oMsg);
    }
}
