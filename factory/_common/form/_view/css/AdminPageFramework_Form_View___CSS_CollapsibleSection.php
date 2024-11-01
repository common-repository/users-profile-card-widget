<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Base extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $aAdded = array();
    public function add($sCSSRules) {
        $this->aAdded[] = $sCSSRules;
    }
    public function get() {
        $_sCSSRules = $this->_get() . PHP_EOL;
        $_sCSSRules.= $this->_getVersionSpecific();
        $_sCSSRules.= implode(PHP_EOL, $this->aAdded);
        return $_sCSSRules;
    }
    protected function _get() {
        return '';
    }
    protected function _getVersionSpecific() {
        return '';
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_CollapsibleSection extends UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getCollapsibleSectionsRules();
    }
    private function _getCollapsibleSectionsRules() {
        $_sCSSRules = ".users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box, .users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box{font-size:13px;background-color: #fff;padding: 15px 18px;margin-top: 1em; border-top: 1px solid #eee;border-bottom: 1px solid #eee;}.users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.collapsed.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.collapsed {border-bottom: 1px solid #dfdfdf;margin-bottom: 1em; }.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box {margin-top: 0;}.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.collapsed {margin-bottom: 0;}#poststuff .metabox-holder .users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.users-profile-card-widget-section-title h3,#poststuff .metabox-holder .users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.users-profile-card-widget-section-title h3{font-size: 1em;margin: 0;}.users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.accordion-section-title:after,.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.accordion-section-title:after {top: 12px;right: 15px;}.users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.accordion-section-title:after,.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.accordion-section-title:after {content: '\\f142';}.users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.accordion-section-title.collapsed:after,.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.accordion-section-title.collapsed:after {content: '\\f140';} .users-profile-card-widget-collapsible-sections-content.users-profile-card-widget-collapsible-content.accordion-section-content,.users-profile-card-widget-collapsible-section-content.users-profile-card-widget-collapsible-content.accordion-section-content,.users-profile-card-widget-collapsible-sections-content.users-profile-card-widget-collapsible-content-type-box, .users-profile-card-widget-collapsible-section-content.users-profile-card-widget-collapsible-content-type-box{border: 1px solid #dfdfdf;border-top: 0;background-color: #fff;}tbody.users-profile-card-widget-collapsible-content {display: table-caption; padding: 10px 20px 15px 20px;}tbody.users-profile-card-widget-collapsible-content.table-caption {display: table-caption; }.users-profile-card-widget-collapsible-toggle-all-button-container {margin-top: 1em;margin-bottom: 1em;width: 100%;display: table; }.users-profile-card-widget-collapsible-toggle-all-button.button {height: 36px;line-height: 34px;padding: 0 16px 6px;font-size: 20px;width: auto;}.flipped > .users-profile-card-widget-collapsible-toggle-all-button.button.dashicons {-moz-transform: scaleY(-1);-webkit-transform: scaleY(-1);transform: scaleY(-1);filter: flipv; }.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box .users-profile-card-widget-repeatable-section-buttons {margin: 0;margin-right: 2em; margin-top: -0.32em;}.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box .users-profile-card-widget-repeatable-section-buttons.section_title_field_sibling {margin-top: 0;}.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box .repeatable-section-button {background: none; }.accordion-section-content.users-profile-card-widget-collapsible-content-type-button {background-color: transparent;}.users-profile-card-widget-collapsible-button {color: #888;margin-right: 0.4em;font-size: 0.8em;}.users-profile-card-widget-collapsible-button-collapse {display: inline;} .collapsed > * > .users-profile-card-widget-collapsible-button-collapse {display: none;}.users-profile-card-widget-collapsible-button-expand {display: none;}.collapsed > * > .users-profile-card-widget-collapsible-button-expand {display: inline;}";
        if (version_compare($GLOBALS['wp_version'], '3.8', '<')) {
            $_sCSSRules.= ".users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.accordion-section-title:after,.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.accordion-section-title:after {content: '';top: 18px;}.users-profile-card-widget-collapsible-sections-title.users-profile-card-widget-collapsible-type-box.accordion-section-title.collapsed:after,.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box.accordion-section-title.collapsed:after {content: '';} .users-profile-card-widget-collapsible-toggle-all-button.button {font-size: 1em;}.users-profile-card-widget-collapsible-section-title.users-profile-card-widget-collapsible-type-box .users-profile-card-widget-repeatable-section-buttons {top: -8px;}";
        }
        return $_sCSSRules;
    }
}
