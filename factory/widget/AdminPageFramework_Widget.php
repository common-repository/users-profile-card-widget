<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_Widget_Router extends UsersProfileCardWidgetAdminPageFramework_Factory {
    public function __construct($oProp) {
        parent::__construct($oProp);
        $this->oUtil->registerAction('widgets_init', array($this, '_replyToDetermineToLoad'));
    }
    public function _replyToLoadComponents() {
        return;
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_Widget_Model extends UsersProfileCardWidgetAdminPageFramework_Widget_Router {
    function __construct($oProp) {
        parent::__construct($oProp);
        $this->oUtil->registerAction("set_up_{$this->oProp->sClassName}", array($this, '_replyToRegisterWidget'));
        if ($this->oProp->bIsAdmin) {
            add_filter('validation_' . $this->oProp->sClassName, array($this, '_replyToSortInputs'), 1, 3);
        }
    }
    public function _replyToSortInputs($aSubmittedFormData, $aStoredFormData, $oFactory) {
        return $this->oForm->getSortedInputs($aSubmittedFormData);
    }
    public function _replyToHandleSubmittedFormData($aSavedData, $aArguments, $aSectionsets, $aFieldsets) {
        if (empty($aSectionsets) || empty($aFieldsets)) {
            return;
        }
        $this->oResource;
    }
    public function _replyToRegisterWidget() {
        global $wp_widget_factory;
        if (!is_object($wp_widget_factory)) {
            return;
        }
        $wp_widget_factory->widgets[$this->oProp->sClassName] = new UsersProfileCardWidgetAdminPageFramework_Widget_Factory($this, $this->oProp->sWidgetTitle, $this->oUtil->getAsArray($this->oProp->aWidgetArguments));
        $this->oProp->oWidget = $wp_widget_factory->widgets[$this->oProp->sClassName];
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_Widget_View extends UsersProfileCardWidgetAdminPageFramework_Widget_Model {
    public function content($sContent, $aArguments, $aFormData) {
        return $sContent;
    }
    public function _printWidgetForm() {
        echo $this->oForm->get();
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_Widget_Controller extends UsersProfileCardWidgetAdminPageFramework_Widget_View {
    public function setUp() {
    }
    public function load($oAdminWidget) {
    }
    public function enqueueStyles($aSRCs, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueStyles')) {
            return $this->oResource->_enqueueStyles($aSRCs, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    public function enqueueStyle($sSRC, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueStyle')) {
            return $this->oResource->_enqueueStyle($sSRC, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    public function enqueueScripts($aSRCs, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueScripts')) {
            return $this->oResource->_enqueueScripts($aSRCs, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    public function enqueueScript($sSRC, $aCustomArgs = array()) {
        if (method_exists($this->oResource, '_enqueueScript')) {
            return $this->oResource->_enqueueScript($sSRC, array($this->oProp->sPostType), $aCustomArgs);
        }
    }
    protected function setArguments(array $aArguments = array()) {
        $this->oProp->aWidgetArguments = $aArguments;
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_Widget extends UsersProfileCardWidgetAdminPageFramework_Widget_Controller {
    protected $_sStructureType = 'widget';
    public function __construct($sWidgetTitle, $aWidgetArguments = array(), $sCapability = 'edit_theme_options', $sTextDomain = 'users-profile-card-widget') {
        if (empty($sWidgetTitle)) {
            return;
        }
        $_sProprtyClassName = isset($this->aSubClassNames['oProp']) ? $this->aSubClassNames['oProp'] : 'UsersProfileCardWidgetAdminPageFramework_Property_' . $this->_sStructureType;
        $this->oProp = new $_sProprtyClassName($this, null, get_class($this), $sCapability, $sTextDomain, $this->_sStructureType);
        $this->oProp->sWidgetTitle = $sWidgetTitle;
        $this->oProp->aWidgetArguments = $aWidgetArguments;
        parent::__construct($this->oProp);

    }
}
