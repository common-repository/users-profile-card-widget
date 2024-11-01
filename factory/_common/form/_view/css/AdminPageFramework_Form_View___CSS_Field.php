<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Field extends UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getFormFieldRules();
    }
    static private function _getFormFieldRules() {
        return "td.users-profile-card-widget-field-td-no-title {padding-left: 0;padding-right: 0;}.users-profile-card-widget-fields {display: table; width: 100%;table-layout: fixed;}.users-profile-card-widget-field input[type='number'] {text-align: right;} .users-profile-card-widget-fields .disabled,.users-profile-card-widget-fields .disabled input,.users-profile-card-widget-fields .disabled textarea,.users-profile-card-widget-fields .disabled select,.users-profile-card-widget-fields .disabled option {color: #BBB;}.users-profile-card-widget-fields hr {border: 0; height: 0;border-top: 1px solid #dfdfdf; }.users-profile-card-widget-fields .delimiter {display: inline;}.users-profile-card-widget-fields-description {margin-bottom: 0;}.users-profile-card-widget-field {float: left;clear: both;display: inline-block;margin: 1px 0;}.users-profile-card-widget-field label{display: inline-block; width: 100%;}.users-profile-card-widget-field .users-profile-card-widget-input-label-container {margin-bottom: 0.25em;}@media only screen and ( max-width: 780px ) { .users-profile-card-widget-field .users-profile-card-widget-input-label-container {margin-bottom: 0.5em;}} .users-profile-card-widget-field .users-profile-card-widget-input-label-string {padding-right: 1em; vertical-align: middle; display: inline-block; }.users-profile-card-widget-field .users-profile-card-widget-input-button-container {padding-right: 1em; }.users-profile-card-widget-field .users-profile-card-widget-input-container {display: inline-block;vertical-align: middle;}.users-profile-card-widget-field-image .users-profile-card-widget-input-label-container { vertical-align: middle;}.users-profile-card-widget-field .users-profile-card-widget-input-label-container {display: inline-block; vertical-align: middle; } .repeatable .users-profile-card-widget-field {clear: both;display: block;}.users-profile-card-widget-repeatable-field-buttons {float: right; margin: 0.1em 0 0.5em 0.3em;vertical-align: middle;}.users-profile-card-widget-repeatable-field-buttons .repeatable-field-button {margin: 0 0.1em;font-weight: normal;vertical-align: middle;text-align: center;}@media only screen and (max-width: 960px) {.users-profile-card-widget-repeatable-field-buttons {margin-top: 0;}}.users-profile-card-widget-sections.sortable-section > .users-profile-card-widget-section,.sortable .users-profile-card-widget-field {clear: both;float: left;display: inline-block;padding: 1em 1.32em 1em;margin: 1px 0 0 0;border-top-width: 1px;border-bottom-width: 1px;border-bottom-style: solid;-webkit-user-select: none;-moz-user-select: none;user-select: none; text-shadow: #fff 0 1px 0;-webkit-box-shadow: 0 1px 0 #fff;box-shadow: 0 1px 0 #fff;-webkit-box-shadow: inset 0 1px 0 #fff;box-shadow: inset 0 1px 0 #fff;-webkit-border-radius: 3px;border-radius: 3px;background: #f1f1f1;background-image: -webkit-gradient(linear, left bottom, left top, from(#ececec), to(#f9f9f9));background-image: -webkit-linear-gradient(bottom, #ececec, #f9f9f9);background-image: -moz-linear-gradient(bottom, #ececec, #f9f9f9);background-image: -o-linear-gradient(bottom, #ececec, #f9f9f9);background-image: linear-gradient(to top, #ececec, #f9f9f9);border: 1px solid #CCC;background: #F6F6F6;} .users-profile-card-widget-fields.sortable {margin-bottom: 1.2em; } .users-profile-card-widget-field .button.button-small {width: auto;} .font-lighter {font-weight: lighter;} .users-profile-card-widget-field .button.button-small.dashicons {font-size: 1.2em;padding-left: 0.2em;padding-right: 0.22em;}";
    }
    protected function _getVersionSpecific() {
        $_sCSSRules = '';
        if (version_compare($GLOBALS['wp_version'], '3.8', '<')) {
            $_sCSSRules.= ".users-profile-card-widget-field .remove_value.button.button-small {line-height: 1.5em; }";
        }
        if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
            $_sCSSRules.= ".users-profile-card-widget-repeatable-field-buttons {margin: 2px 0 0 0.3em;} @media screen and ( max-width: 782px ) {.users-profile-card-widget-fieldset {overflow-x: hidden;}}";
        }
        return $_sCSSRules;
    }
}
