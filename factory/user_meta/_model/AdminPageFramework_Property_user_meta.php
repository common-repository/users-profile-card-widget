<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Property_user_meta extends UsersProfileCardWidgetAdminPageFramework_Property_post_meta_box {
    public $_sPropertyType = 'user_meta';
    public $_sFormRegistrationHook = 'admin_enqueue_scripts';
    protected function _getOptions() {
        return array();
    }
}
