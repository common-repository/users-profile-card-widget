<?php
/**
 Admin Page Framework v3.7.13 by Michael Uno
 
 
 */
class UsersProfileCardWidgetAdminPageFramework_Resource_widget extends UsersProfileCardWidgetAdminPageFramework_Resource_Base {
public function __construct(){
       

}
public function _enqueueStyles($aSRCs, $aCustomArgs = array()) {
$_aHandleIDs = array();
foreach (( array )$aSRCs as $_sSRC) {
$_aHandleIDs[] = $this -> _enqueueStyle($_sSRC, $aCustomArgs);
}
return $_aHandleIDs;
}

public function _enqueueStyle($sSRC, $aCustomArgs = array()) {

/*
if(empty($this -> oProp)){
$sStructureType ='widget';
 $sCapability = 'edit_theme_options';
 $sTextDomain = 'users-profile-card-widget';
 $_sProprtyClassName = isset($this->aSubClassNames['oProp']) ? $this->aSubClassNames['oProp'] : 'UsersProfileCardWidgetAdminPageFramework_Property_' . $sStructureType;
        $this->oProp = new $_sProprtyClassName($this, null, get_class($this), $sCapability, $sTextDomain, $sStructureType);


}
 
 */




$sSRC = trim($sSRC);
if (empty($sSRC)) {
return '';
}
$sSRC = $this -> getResolvedSRC($sSRC);
$_sSRCHash = md5($sSRC);
if (isset($this -> oProp -> aEnqueuingStyles[$_sSRCHash])) {
return '';
}
$this -> oProp -> aEnqueuingStyles[$_sSRCHash] = $this -> uniteArrays(( array )$aCustomArgs, array('sSRC' => $sSRC, 'sType' => 'style', 'handle_id' => 'style_' . $this -> oProp -> sClassName . '_' . 

(++$this -> oProp -> iEnqueuedStyleIndex), ), 

self::$_aStructure_EnqueuingResources);

$this -> oProp -> aResourceAttributes[$this -> oProp -> aEnqueuingStyles[$_sSRCHash]['handle_id']] = $this -> oProp -> aEnqueuingStyles[$_sSRCHash]['attributes'];
return $this -> oProp -> aEnqueuingStyles[$_sSRCHash]['handle_id'];
}

public function _enqueueScripts($aSRCs, $aCustomArgs = array()) {
$_aHandleIDs = array();
foreach (( array )$aSRCs as $_sSRC) {
$_aHandleIDs[] = $this -> _enqueueScript($_sSRC, $aCustomArgs);
}
return $_aHandleIDs;
}

public function _enqueueScript($sSRC, $aCustomArgs = array()) {
$sSRC = trim($sSRC);
if (empty($sSRC)) {
return '';
}
$sSRC = $this -> getResolvedSRC($sSRC);
$_sSRCHash = md5($sSRC);
if (isset($this -> oProp -> aEnqueuingScripts[$_sSRCHash])) {
return '';
}
$this -> oProp -> aEnqueuingScripts[$_sSRCHash] = $this -> uniteArrays(( array )$aCustomArgs, array('sSRC' => $sSRC, 'sType' => 'script', 'handle_id' => 'script_' . $this -> oProp -> sClassName . '_' . (++$this -> oProp -> iEnqueuedScriptIndex), ), self::$_aStructure_EnqueuingResources);
$this -> oProp -> aResourceAttributes[$this -> oProp -> aEnqueuingScripts[$_sSRCHash]['handle_id']] = $this -> oProp -> aEnqueuingScripts[$_sSRCHash]['attributes'];
return $this -> oProp -> aEnqueuingScripts[$_sSRCHash]['handle_id'];
}

public function _forceToEnqueueStyle($sSRC, $aCustomArgs = array()) {
return $this -> _enqueueStyle($sSRC, $aCustomArgs);
}

public function _forceToEnqueueScript($sSRC, $aCustomArgs = array()) {
return $this -> _enqueueScript($sSRC, $aCustomArgs);
}

}
