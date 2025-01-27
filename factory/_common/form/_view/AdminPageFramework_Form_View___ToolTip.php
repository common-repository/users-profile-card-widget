<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___ToolTip extends UsersProfileCardWidgetAdminPageFramework_Form_View___Section_Base {
    public $aArguments = array('attributes' => array(), 'icon' => null, 'title' => null, 'content' => null,);
    public $sTitleElementID;
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->sTitleElementID,);
        if ($this->_isContent($_aParameters[0])) {
            $this->aArguments['content'] = $_aParameters[0];
        } else {
            $this->aArguments = $this->getAsArray($_aParameters[0]) + $this->aArguments;
        }
        $this->sTitleElementID = $_aParameters[1];
    }
    private function _isContent($asContent) {
        if (is_string($asContent)) {
            return true;
        }
        if (is_array($asContent) && !$this->isAssociative($asContent)) {
            return true;
        }
        return false;
    }
    public function get() {
        if (!$this->aArguments['content']) {
            return '';
        }
        $_sHref = esc_attr("#{$this->sTitleElementID}");
        return '' . "<a href='{$_sHref}' class='users-profile-card-widget-form-tooltip'>" . $this->_getTipLinkIcon() . "<span class='users-profile-card-widget-form-tooltip-content'>" . $this->_getTipTitle() . $this->_getDescriptions() . "</a>";
    }
    private function _getTipLinkIcon() {
        if (isset($this->aArguments['icon'])) {
            return $this->aArguments['icon'];
        }
        if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
            return "<span class='dashicons dashicons-editor-help'></span>";
        }
        return '[?]';
    }
    private function _getTipTitle() {
        if (isset($this->aArguments['title'])) {
            return "<span class='users-profile-card-widget-form-tool-tip-title'>" . $this->aArguments['title'] . "</span>";
        }
        return '';
    }
    private function _getDescriptions() {
        if (isset($this->aArguments['content'])) {
            return "<span class='users-profile-card-widget-form-tool-tip-description'>" . implode("</span><span class='users-profile-card-widget-form-tool-tip-description'>", $this->getAsArray($this->aArguments['content'])) . "</span>";
        }
        return '';
    }
}
