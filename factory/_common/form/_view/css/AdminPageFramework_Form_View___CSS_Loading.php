<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Loading extends UsersProfileCardWidgetAdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        $_sSpinnerPath = $this->getWPAdminDirPath() . '/images/wpspin_light-2x.gif';
        if (!file_exists($_sSpinnerPath)) {
            return '';
        }
        $_sSpinnerURL = esc_url(admin_url('/images/wpspin_light-2x.gif'));
        return ".users-profile-card-widget-form-loading {position: absolute;background-image: url({$_sSpinnerURL});background-repeat: no-repeat;background-size: 32px 32px;background-position: center; display: block !important;width: 92%;height: 70%;opacity: 0.5;}";
    }
}
