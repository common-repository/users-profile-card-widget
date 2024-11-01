<?php 

/*
Plugin Name: Users Profile Card Widget
Plugin URI: http://users-profile-card-widget.22bees.com/
Description: An SEO friendly widget the create and display user profile card.  
Author: 22Bees
Version: 0.2.0
Author URI: http://www.22bees.com
*/

if (!class_exists('UsersProfileCardWidgetAdminPageFramework_Registry', false)):
    abstract class UsersProfileCardWidgetAdminPageFramework_Registry_Base {
        const VERSION = '0.2.0';
        const NAME = 'WP Users Profile Card Widget';
        const DESCRIPTION = ' An SEO friendly widget the create and display user profile card';
        const URI = 'http://users-profile-card-widget.22bees.com.org/';
        const AUTHOR = '22Bees';
        const AUTHOR_URI = 'http://www.22bees.com/';
        const COPYRIGHT = 'Copyright (c) 2013-2016';
        const LICENSE = 'MIT <http://opensource.org/licenses/MIT>';
        const CONTRIBUTORS = '';
    }
    final class UsersProfileCardWidgetAdminPageFramework_Registry extends UsersProfileCardWidgetAdminPageFramework_Registry_Base {
        const TEXT_DOMAIN = 'wp-users-profile-card';
        const TEXT_DOMAIN_PATH = '/language';
        static public $bIsMinifiedVersion = true;
        static public $bIsDevelopmentVersion = true;
        static public $sAutoLoaderPath;
        static public $sIncludeClassListPath;
        static public $aClassFiles = array();
        static public $sFilePath = '';
        static public $sDirPath = '';
        static public function setUp($sFilePath = __FILE__) {
            self::$sFilePath = $sFilePath;
            self::$sDirPath = dirname(self::$sFilePath);
            self::$sIncludeClassListPath = self::$sDirPath . '/users-profile-card-widget.class.php';
            self::$aClassFiles = self::_getClassFilePathList(self::$sIncludeClassListPath);
            self::$sAutoLoaderPath = isset(self::$aClassFiles['UsersProfileCardWidgetAdminPageFramework_RegisterClasses']) ? self::$aClassFiles['UsersProfileCardWidgetAdminPageFramework_RegisterClasses'] : '';
            self::$bIsMinifiedVersion = class_exists('UsersProfileCardWidgetAdminPageFramework_MinifiedVersionHeader', false);
            self::$bIsDevelopmentVersion = isset(self::$aClassFiles['UsersProfileCardWidgetAdminPageFramework_InclusionClassFilesHeader']);
        }
        static private function _getClassFilePathList($sInclusionClassListPath) {
            $aClassFiles = array();
            include ($sInclusionClassListPath);
            return $aClassFiles;
        }
        static public function getVersion() {
            if (!isset(self::$sAutoLoaderPath)) {
                trigger_error('Admin Page Framework: ' . ' : ' . sprintf(__('The method is called too early. Perform <code>%2$s</code> earlier.', 'admin-page-framework'), __METHOD__, 'setUp()'), E_USER_WARNING);
                return self::VERSION;
            }
            $_aMinifiedVesionSuffix = array(0 => '', 1 => '.min',);
            $_aDevelopmentVersionSuffix = array(0 => '', 1 => '.dev',);
            return self::VERSION . $_aMinifiedVesionSuffix[( integer )self::$bIsMinifiedVersion] . $_aDevelopmentVersionSuffix[( integer )self::$bIsDevelopmentVersion];
        }
        static public function getInfo() {
            $_oReflection = new ReflectionClass(__CLASS__);
            return $_oReflection->getConstants() + $_oReflection->getStaticProperties();
        }
    }
endif;
if (!class_exists('UsersProfileCardWidgetAdminPageFramework_Bootstrap', false)):
    final class UsersProfileCardWidgetAdminPageFramework_Bootstrap {
        static private $_bLoaded = false;
        public function __construct($sLibraryPath) {
            if (!$this->_isLoadable()) {
                return;
            }
            UsersProfileCardWidgetAdminPageFramework_Registry::setUp($sLibraryPath);
            if (UsersProfileCardWidgetAdminPageFramework_Registry::$bIsMinifiedVersion) {
                return;
            }
            $this->_include();
        }
        private function _isLoadable() {
            if (self::$_bLoaded) {
                return false;
            }
            self::$_bLoaded = true;
            return defined('ABSPATH');
        }
        private function _include() {
            include (UsersProfileCardWidgetAdminPageFramework_Registry::$sAutoLoaderPath);
            new UsersProfileCardWidgetAdminPageFramework_RegisterClasses('', array('exclude_class_names' => array('UsersProfileCardWidgetAdminPageFramework_MinifiedVersionHeader', 'UsersProfileCardWidgetAdminPageFramework_BeautifiedVersionHeader',),), UsersProfileCardWidgetAdminPageFramework_Registry::$aClassFiles);
            self::$_bXDebug = isset(self::$_bXDebug) ? self::$_bXDebug : extension_loaded('xdebug');
            if (self::$_bXDebug) {
                new UsersProfileCardWidgetAdminPageFramework_Utility;
                new UsersProfileCardWidgetAdminPageFramework_WPUtility;
            }
        }
        static private $_bXDebug;
    }
    new UsersProfileCardWidgetAdminPageFramework_Bootstrap(__FILE__);
endif;




class upcw_Plugin_Widget_APF extends UsersProfileCardWidgetAdminPageFramework_Widget {

    public function start() {}

    public function setUp() {
        $this->setArguments(
            array(
                'description'   =>  __( 'Add a profile card to your sidebar.', TEXT_DOMAIN ),
            )
        );

add_action('admin_head', function () {
  echo '<style> .users-profile-card-widget-section-tab.nav-tab{padding: 0.0em 0.0em !important; } .users-profile-card-widget-section-tabs-contents{ margin-top:0 !important;} .users-profile-card-widget-sectionset,.users-profile-card-widget-section{ margin-bottom: 0 !important; }</style>';
});


add_action('admin_head',function(){
wp_enqueue_style('font-awesome', plugin_dir_url( __FILE__ ). 'css/font-awesome.min.css');
});


add_action('wp_head',function(){
wp_enqueue_style('font-awesome', plugin_dir_url( __FILE__ ). 'css/font-awesome.min.css');
});
    }    

    /**
     * Sets up the form.
     *
     * Alternatively you may use load_{instantiated class name} method.
     */

     
    public function load( $oAdminWidget ) {
    


    

  $this->addSettingFields(
            array(
                'field_id'      => 'title',
                'type'          => 'text',
                'title'         => __( 'Title', TEXT_DOMAIN ),
                'default'       => 'About Me',
            )
            );
    




$this->addSettingSections(
     array(
         'section_id'    => 'upcw_image',
 'section_tab_slug'  => 'root_section_tab',
         'title'         => '<i class="fa fa-picture-o"></i>',
         'description' => 'Select or Upload Images'
     ),
     array(
         'section_id'    => 'upcw_info',
      'section_tab_slug'  => 'root_section_tab',
         'title'         => '<i class="fa fa-info-circle"></i>',
 'description' => 'Enter the Profile details',
         'attributes' => array(
 'style' => 'display:none;'
 )
       
     ),
     
     array(
         'section_id'    => 'upcw_social',
      'section_tab_slug'  => 'root_section_tab',
         'title'         => '<i class="fa fa-share-square-o"></i>',
         'description' => 'Enter your social media link',
         'attributes' => array(
 'style' => 'display:none;'
 )
    
     ),
     array(
         'section_id'    => 'upcw_settings',
      'section_tab_slug'  => 'root_section_tab',
         'title'         => '<i class="fa fa-cog"></i>',
          'description' => 'Other settings',
         'attributes' => array(
 'style' => 'display:none;'
 )
     ),
     array(
         'section_id'    => 'upcw_22bees',
      'section_tab_slug'  => 'root_section_tab',
         'title'         => '<i class="fa fa-reply"></i>',
         'attributes' => array(
 'style' => 'display:none;'
 ),
         'content' =>'In case you need some modification in the design, just modify/add css code to your own style. '
     )
    
);




        
        $this->addSettingFields(
            'upcw_image',
            array(
            
                'field_id'      => 'image',
                'type'          => 'image',
                'title'         => __( 'Image', TEXT_DOMAIN),
            ),    
array(
                'field_id'      => 'cover_header',
                'type'          => 'image',
                'title'         => __( 'Cover Header.', TEXT_DOMAIN ),
            )
        );        



        $this->addSettingFields(
            'upcw_info',
            array(
                'field_id'      => 'name',
                'type'          => 'text',
                'title'         => __( 'Name:', TEXT_DOMAIN),
            ),    
array(
                'field_id'      => 'tagline',
                'type'          => 'text',
                'title'         => __( 'Tagline.', TEXT_DOMAIN ),
            ),   
            array(
                'field_id'      => 'description',
                'type'          => 'textarea',
                'title'         => __( 'Description', TEXT_DOMAIN),
            )
        );    



        $this->addSettingFields(
            'upcw_social',
            array(
                'field_id'      => 'facebook',
                'type'          => 'text',
                'title'         => __( 'Facebook', TEXT_DOMAIN),
            ),
            array(
                'field_id'      => 'twitter',
                'type'          => 'text',
                'title'         => __( 'Twitter', TEXT_DOMAIN),
            ),
            array(
                'field_id'      => 'website',
                'type'          => 'text',
                'title'         => __( 'Website', TEXT_DOMAIN),
            ),
            array(
                'field_id'      => 'linkedin',
                'type'          => 'text',
                'title'         => __( 'LinkedIn', TEXT_DOMAIN),
            )
            
        );    


        $this->addSettingFields(
            'upcw_settings',
    
            array(
                'field_id'      => 'border_color',
                'type'          => 'color',
                'title'         => __( 'Border Color', TEXT_DOMAIN),
            ),   
            array(
                'field_id'      => 'bg_color',
                'type'          => 'color',
                'title'         => __( 'Top Background Color', TEXT_DOMAIN),
            ),
            array(
                'field_id'      => 'main_bg_color',
                'type'          => 'color',
                'title'         => __( 'Main Background Color', TEXT_DOMAIN),
            ),   
            array(
                'field_id'      => 'name_color',
                'type'          => 'color',
                'title'         => __( 'Name Color', TEXT_DOMAIN),
            ),
            array(
                'field_id'      => 'tag_color',
                'type'          => 'color',
                'title'         => __( 'Tagline Color', TEXT_DOMAIN),
            ),  
            array(
                'field_id'      => 'desc_color',
                'type'          => 'color',
                'title'         => __( 'Description Color', TEXT_DOMAIN),
            ),  
            array(
                'field_id'      => 'social_color',
                'type'          => 'color',
                'title'         => __( 'Social Media Color', TEXT_DOMAIN),
            ),   
            array(
                'field_id'      => 'social_bg_color',
                'type'          => 'color',
                'title'         => __( 'Social Media Background Color', TEXT_DOMAIN),
            )
        );        





    }// end of Load






    public function validate( $aSubmit, $aStored, $oAdminWidget ) {


        return $aSubmit;

    }    

    /**
     * Print out the contents in the front-end.
     *
     * Alternatively you may use the content_{instantiated class name} method.
     */
    public function content( $sContent, $aArguments, $aFormData ) {



//$this->enqueueStyle( UsersProfileCardWidgetAdminPageFramework_Registry::$sDirPath . '/css/font-awesome.min.css' );








$card_id = $aArguments['widget_id'];
//print_r($aFormData);
ob_start();
?>


    <div class="upcw-card upcw-hovercard" itemscope itemtype="http://schema.org/Person">
                <div class="upcw-cardheader">

                </div>
                <div class="upcw-avatar">
                    <img alt="<?php echo $aFormData['upcw_info']['name'] ?>" src="<?php echo $aFormData['upcw_image']['image'] ?>">
                </div>
                <div class="upcw-info">
                <?php if(!empty($aFormData['upcw_info']['name'])){?>
                    <div class="upcw-title" itemprop="name"><a <?php if(!empty($aFormData['upcw_social']['website'])){
						echo ' itemprop="url" href="' . $aFormData['upcw_social']['website'] . '"';
                    }?>><?php echo $aFormData['upcw_info']['name']; ?></a></div>
                    <?php } ?>
                    <?php if(!empty($aFormData['upcw_info']['tagline'])){?>
                    <div class="upcw-tag"><?php echo $aFormData['upcw_info']['tagline']?></div>
                    <?php } ?>
                <?php if(!empty($aFormData['upcw_info']['description'])){?>
                    <div class="upcw-desc" itemprop="description"><?php echo $aFormData['upcw_info']['description']?></div>
                    <?php } ?>
                    
                </div>
                <div class="upcw-bottom">
                <?php if(!empty($aFormData['upcw_social']['facebook'])){?>
                    <a class="upcw-btn btn btn-primary " href="<?php echo $aFormData['upcw_social']['facebook'] ?>">
                        <i class="fa fa-facebook-official fa-2"></i>
                    </a> <?php } ?>
                    <?php if(!empty($aFormData['upcw_social']['twitter'])){?>
                    <a class="upcw-btn btn btn-primary " href="<?php echo  $aFormData['upcw_social']['twitter'] ?>">
                        <i class="fa fa-twitter fa-2"></i>
                    </a> <?php } ?>
                    
                    <?php if(!empty($aFormData['upcw_social']['website'])){?>
                    <a class="upcw-btn btn btn-primary " href="<?php echo $aFormData['upcw_social']['website'] ?>">
                        <i class="fa fa-globe fa-2"></i>
                    </a> <?php } ?>
                    <?php if(!empty($aFormData['upcw_social']['linkedin'])){?>
                    <a class="upcw-btn btn btn-primary " href="<?php echo  $aFormData['upcw_social']['linkedin'] ?>">
                        <i class="fa fa-linkedin fa-2"></i>
                    </a> <?php } ?>
                   
                </div>
      </div>



<?php
$html = ob_get_contents();
ob_end_clean();

$style = $this->_stylesheet($card_id,$aFormData);
        return $sContent . $html .$style;







    }

private function _stylesheet($card_id,$aFormData) {
ob_start();
?>


<style>
#<?php echo $card_id;?> .upcw-card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-heading {
    padding: 0 20px;
    margin: 0;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-heading.image .upcw-card-heading-header {
    display: inline-block;
    vertical-align: top;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-heading.image .upcw-card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-heading.image .upcw-card-heading-header span {
    font-size: 12px;
    color: #999999;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-body {
    padding: 0 20px;
    margin-top: 20px;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-media img {
    max-width: 100%;
    max-height: 100%;
}

#<?php echo $card_id;?> .upcw-card .upcw-card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color:<?php if(!empty($aFormData['upcw_settings']['main_bg_color'])){
     echo $aFormData['upcw_settings']['main_bg_color']; } else { ?>rgba(214, 224, 226, 0.2)<?php } ?>;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-cardheader {
    
    background: <?php if(!empty($aFormData['upcw_settings']['bg_color'])){ ?><?php echo $aFormData['upcw_settings']['bg_color'];?> <?php } ?> <?php if(!empty($aFormData['upcw_image']['image'])){ ?>url("<?php echo $aFormData['upcw_image']['cover_header'];?>")<?php } ?>;
    background-size: cover;
    height: 135px;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-avatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid <?php if(!empty($aFormData['upcw_settings']['border_color'])){
      echo $aFormData['upcw_settings']['border_color']; } else {
      echo 'rgba(255,255,255,0.5);';
      }
      
      ?>
    
    
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-info {
    padding: 4px 8px 10px;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-info .upcw-title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    vertical-align: middle;
}
#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-info .upcw-title a {
color: <?php if(!empty($aFormData['upcw_settings']['name_color'])){
     echo $aFormData['upcw_settings']['name_color'] ; } else { ?>#262626<?php } ?>;

}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-info .upcw-tag a {
color: <?php if(!empty($aFormData['upcw_settings']['tag_color'])){
     echo $aFormData['upcw_settings']['tag_color'] ; } else { ?>#1a1a1a<?php } ?>;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-info .upcw-desc {
    overflow: hidden;
    line-height: 20px;
color: <?php if(!empty($aFormData['upcw_settings']['desc_color'])){
     echo $aFormData['upcw_settings']['desc_color'] ; } else { ?>#737373<?php } ?>;
    text-overflow: ellipsis;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-bottom {
    padding: 10px 20px;
   
min-height: 40px;
     <?php if(!empty($aFormData['upcw_settings']['social_bg_color'])){
     echo 'background-color:' .$aFormData['upcw_settings']['social_bg_color'] ; }?>;
}

#<?php echo $card_id;?> .upcw-card.upcw-hovercard .upcw-bottom i{
 font-size: 16px;
 <?php if(!empty($aFormData['upcw_settings']['social_color'])){
     echo 'color:' .$aFormData['upcw_settings']['social_color'] ; }?>;
}
#<?php echo $card_id;?> .upcw-card .upcw-btn{ 
border-radius: 50%; width:32px; height:32px; line-height:18px; 
    margin: 5px 3px;
 }


</style>
<?php


$style = ob_get_contents();




ob_end_clean();



      




return $style;

}








}
new upcw_Plugin_Widget_APF( 

    __( 'User Profile Card', TEXT_DOMAIN ) // the widget title

);







 
 
 
 
 
