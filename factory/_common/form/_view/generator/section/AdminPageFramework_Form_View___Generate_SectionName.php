<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_Section_Base extends UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_Base {
    public $hfCallback = null;
    public $sIndexMark = '___i___';
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->hfCallback,);
        $this->aArguments = $_aParameters[0];
        $this->hfCallback = $_aParameters[1];
    }
    public function getModel() {
        return '';
    }
    protected function _getFiltered($sSubject) {
        return is_callable($this->hfCallback) ? call_user_func_array($this->hfCallback, array($sSubject, $this->aArguments,)) : $sSubject;
    }
    protected function _getInputNameConstructed($aParts) {
        $_sName = array_shift($aParts);
        foreach ($aParts as $_sPart) {
            $_sName.= '[' . $_sPart . ']';
        }
        return $_sName;
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_SectionName extends UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_Section_Base {
    public function get() {
        return $this->_getFiltered($this->_getSectionName());
    }
    public function getModel() {
        return $this->get() . '[' . $this->sIndexMark . ']';
    }
    protected function _getSectionName($isIndex = null) {
        $this->aArguments = $this->aArguments + array('section_id' => null, '_index' => null,);
        if (isset($isIndex)) {
            $this->aArguments['_index'] = $isIndex;
        }
        $_aNameParts = $this->aArguments['_section_path_array'];
        if (isset($this->aArguments['section_id'], $this->aArguments['_index'])) {
            $_aNameParts[] = $this->aArguments['_index'];
        }
        $_sResult = $this->_getInputNameConstructed($_aNameParts);
        return $_sResult;
    }
}
