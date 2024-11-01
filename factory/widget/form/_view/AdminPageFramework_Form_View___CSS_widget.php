<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_widget extends UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getWidgetRules();
    }
    private function _getWidgetRules() {
        return ".widget .users-profile-card-widget-section .form-table > tbody > tr > td,.widget .users-profile-card-widget-section .form-table > tbody > tr > th{display: inline-block;width: 100%;padding: 0;float: right;clear: right; }.widget .users-profile-card-widget-field,.widget .users-profile-card-widget-input-label-container{width: 100%;}.widget .sortable .users-profile-card-widget-field {padding: 4% 4.4% 3.2% 4.4%;width: 91.2%;}.widget .users-profile-card-widget-field input {margin-bottom: 0.1em;margin-top: 0.1em;}.widget .users-profile-card-widget-field input[type=text],.widget .users-profile-card-widget-field textarea {width: 100%;} @media screen and ( max-width: 782px ) {.widget .users-profile-card-widget-fields {width: 99.2%;}.widget .users-profile-card-widget-field input[type='checkbox'], .widget .users-profile-card-widget-field input[type='radio'] {margin-top: 0;}}";
    }
    protected function _getVersionSpecific() {
        $_sCSSRules = '';
        if (version_compare($GLOBALS['wp_version'], '3.8', '<')) {
            $_sCSSRules.= ".widget .users-profile-card-widget-section table.mceLayout {table-layout: fixed;}";
        }
        if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
            $_sCSSRules.= ".widget .users-profile-card-widget-section .form-table th{font-size: 13px;font-weight: normal;margin-bottom: 0.2em;}.widget .users-profile-card-widget-section .form-table {margin-top: 1em;}";
        }
        return $_sCSSRules;
    }
}
