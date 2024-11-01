<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View__Resource__Head extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $oForm;
    public function __construct($oForm, $sHeadActionHook = 'admin_head') {
        $this->oForm = $oForm;
        if (in_array($this->oForm->aArguments['structure_type'], array('widget'))) {
            return;
        }
        add_action($sHeadActionHook, array($this, '_replyToInsertRequiredInlineScripts'));
    }
    public function _replyToInsertRequiredInlineScripts() {
        if (!$this->oForm->isInThePage()) {
            return;
        }
        if ($this->hasBeenCalled(__METHOD__)) {
            return;
        }
        echo "<script type='text/javascript' class='users-profile-card-widget-form-script-required-in-head'>" . '/* <![CDATA[ */ ' . $this->_getScripts_RequiredInHead() . ' /* ]]> */' . "</script>";
    }
    private function _getScripts_RequiredInHead() {
        return 'document.write( "<style class=\'users-profile-card-widget-js-embedded-inline-style\'>' . str_replace('\\n', '', esc_js($this->_getInlineCSS())) . '</style>" );';
    }
    private function _getInlineCSS() {
        $_oLoadingCSS = new UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Loading;
        $_oLoadingCSS->add($this->_getScriptElementConcealerCSSRules());
        return $_oLoadingCSS->get();
    }
    private function _getScriptElementConcealerCSSRules() {
        return ".users-profile-card-widget-form-js-on {visibility: hidden;}.widget .users-profile-card-widget-form-js-on { visibility: visible; }";
    }
}
