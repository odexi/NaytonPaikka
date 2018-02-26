<?php
/**
 * @package OdexiPlugin
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    /** @var SettingsApi*/
    public $settings;
    /** @var AdminCallbacks*/
    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register() {
       // add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();


        $this->settings->addPages( $this->pages )->withSubPage('DashBoard')->addSubPages($this->subpages)->register();
    }


    public function setPages() {
        $this->pages = array(
            array(
                'page_title' => 'Odexi Plugin',
                'menu_title' => 'Odexi',
                'capability' => 'manage_options',
                'menu_slug' => 'odexi_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubpages() {
        $this->subpages = array(
            array(
                'parent_slug' => 'odexi_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'odexi_cpt',
                'callback' => array( $this->callbacks, 'cptPage' )
            ),
            array(
                'parent_slug' => 'odexi_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'odexi_taxonomies',
                'callback' => array( $this->callbacks, 'taxonomyPage' )
            ),
            array(
                'parent_slug' => 'odexi_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'odexi_widgets',
                'callback' => array( $this->callbacks, 'widgetPage' )
            )
        );
    }

    public function setSettings() {
        $args = array(
            array(
                'option_group' => 'odexi_options_group',
                'option_name' => 'text_example',
                'callback' => array( $this->callbacks, 'odexiOptionsGroup' )
            ),
            array(
                'option_group' => 'odexi_options_group',
                'option_name' => 'first_name'
            )

        );

        $testArgs = array(
            array(
                'option_group' => 'test_options_group',
                'option_name' => 'test_textarea',
                'callback' => array( $this->callbacks, 'testOptionsGroup' )
            ),
            array(
                'option_group' => 'test_options_group',
                'option_name' => 'test_radiobutton'
            )
        );

        $this->settings->setSettings( $args, $testArgs );
    }

    public function setSections()
{
        $args = array(
            array(
                'id' => 'odexi_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'odexiAdminSection'),
                'page' => 'odexi_plugin'
            )

        );

        $testArgs = array(
            array(
                'id' => 'test_id',
                'title' => 'Test Form',
                'callback' =>array($this->callbacks, 'testAdminSection'),
                'page' => 'odexi_about'
            )
        );
        $this->settings->setSections( $args, $testArgs );
}

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'odexiTextExample'),
                'page' => 'odexi_plugin',
                'section' =>'odexi_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'odexiFirstName'),
                'page' => 'odexi_plugin',
                'section' =>'odexi_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class'
                )
            )
            array(
                'id' => 'test'
            )

        );

        $testArgs = array(
            array(
                'id' => 'test_textarea',
                'title' => 'Text Area',
                'callback' => array($this->callbacks, 'testTextArea'),
                'page' => 'odexi_about',
                'section' => 'test_id',
                'args' => 'test_textarea',
                'class' => 'test-class'
            ),
            array(
                'id' => 'test_radiobutton',
                'title' => 'Radio Button',
                'callback' => array($this->callbacks, 'testRadioButton'),
                'page' => 'odexi_about',
                'section' => 'test_id',
                'args' => 'test_radiobutton',
                'class' => 'test-class'
            )
        );
        $this->settings->setFields( $args, $testArgs );
    }



}