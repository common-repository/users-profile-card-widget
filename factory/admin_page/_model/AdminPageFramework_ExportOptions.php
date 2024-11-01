<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_CustomSubmitFields extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $aPost = array();
    public $sInputID;
    public function __construct(array $aPostElement) {
        $this->aPost = $aPostElement;
        $this->sInputID = $this->getInputID($aPostElement['submit']);
    }
    protected function getSubmitValueByType($aElement, $sInputID, $sElementKey = 'format') {
        return $this->getElement($aElement, array($sInputID, $sElementKey), null);
    }
    public function getSiblingValue($sKey) {
        return $this->getSubmitValueByType($this->aPost, $this->sInputID, $sKey);
    }
    public function getInputID($aSubmitElement) {
        foreach ($aSubmitElement as $sInputID => $v) {
            $this->sInputID = $sInputID;
            return $this->sInputID;
        }
    }
}
class UsersProfileCardWidgetAdminPageFramework_ExportOptions extends UsersProfileCardWidgetAdminPageFramework_CustomSubmitFields {
    public $sClassName;
    public $sFileName;
    public $sFormatType;
    public $bIsDataSet;
    public function __construct($aPostExport, $sClassName) {
        parent::__construct($aPostExport);
        $this->sClassName = $sClassName;
        $this->sFileName = $this->getSubmitValueByType($aPostExport, $this->sInputID, 'file_name');
        $this->sFormatType = $this->getSubmitValueByType($aPostExport, $this->sInputID, 'format');
        $this->bIsDataSet = $this->getSubmitValueByType($aPostExport, $this->sInputID, 'transient');
    }
    public function getTransientIfSet($vData) {
        if ($this->bIsDataSet) {
            $_tmp = $this->getTransient(md5("{$this->sClassName}_{$this->sInputID}"));
            if ($_tmp !== false) {
                $vData = $_tmp;
            }
        }
        return $vData;
    }
    public function getFileName() {
        return $this->sFileName;
    }
    public function getFormat() {
        return $this->sFormatType;
    }
    public function doExport($vData, $sFormatType = null, array $aHeader = array()) {
        $sFormatType = isset($sFormatType) ? $sFormatType : $this->sFormatType;
        $this->_outputHTTPHeader($aHeader);
        $this->_outputDataByType($vData, $sFormatType);
        exit;
    }
    private function _outputHTTPHeader(array $aHeader, $sKey = '') {
        foreach ($aHeader as $_sKey => $_asValue) {
            if (is_array($_asValue)) {
                $this->_outputHTTPHeader($_asValue, $_sKey);
                continue;
            }
            $_sKey = $this->getAOrB($sKey, $sKey, $_sKey);
            header("{$_sKey}: {$_asValue}");
        }
    }
    private function _outputDataByType($vData, $sFormatType) {
        switch (strtolower($sFormatType)) {
            case 'text':
                if (in_array(gettype($vData), array('array', 'object'))) {
                    echo UsersProfileCardWidgetAdminPageFramework_Debug::get($vData, null, false);
                }
                echo $vData;
                return;
            case 'json':
                echo json_encode(( array )$vData);
                return;
            case 'array':
            default:
                echo serialize(( array )$vData);
                return;
        }
    }
}
