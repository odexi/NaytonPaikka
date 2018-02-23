<?php
/**
 * @package OdexiPlugin
 */
namespace Inc\Api;

class SettingsApi {

    public $admin_pages = array();

    public $admin_subpages = array();

    public $settings = array();
    public $testSettings = array();
    public $testSections = array();
    public $testFields = array();
    public $sections = array();
    public $fields = array();



    public function register(){
        if ( ! empty($this->admin_pages)) {
            add_action( 'admin_menu', array( $this, 'addAdminMenu') );
        }

        if ( !empty($this->settings)) {
            add_action( 'admin_init', array( $this, 'registerCustomFields'));
        }

        if ( !empty($this->testSettings)) {
            add_action( 'admin_init', array( $this, 'registerTestCustomFields'));
        }
    }

    public function addPages(array $pages) {
        $this->admin_pages = $pages;

        return $this;
    }

    public function withSubPage( string $title = null ) {
        if (empty($this->admin_pages)) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $subpage = array(
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            )
        );

        $this->admin_subpages = $subpage;

        return $this;
    }

    public function addSubPages( array $pages)
    {
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);

        return $this;
    }

    public function addAdminMenu() {
        foreach ($this->admin_pages as $page) {
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'],
                $page['callback'], $page['icon_url'], $page['position']);
        }

        foreach ($this->admin_subpages as $page) {
            add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'],
                $page['menu_slug'], $page['callback']);
        }
    }

    public function setSettings(array $settings, array $testSettings) {
        $this->settings = $settings;
        $this->testSettings = $testSettings;

        return $this;
    }

    public function setSections(array $sections, array $testSections) {
        $this->sections = $sections;
        $this->testSections = $testSections;

        return $this;
    }

    public function setFields(array $fields, array $testFields) {
        $this->fields = $fields;
        $this->testFields = $testFields;

        return $this;
    }



    public function registerCustomFields()
    {

        // register setting
        foreach ($this->settings as $setting) {
            register_setting($setting["option_group"], $setting["option_name"], (isset($setting["callback"]) ? $setting["callback"] : ''));
        }

        // add settings section
        foreach ($this->sections as $section) {
            add_settings_section($section["id"], $section["title"], (isset($section["callback"]) ? $section["callback"] : ''), $section["page"]);
        }

        // add settings field
        foreach ($this->fields as $field) {
            add_settings_field($field["id"], $field["title"], (isset($field["callback"]) ? $field["callback"] : ''), $field["page"], $field["section"], (isset($field["args"]) ? $field["args"] : ''));
        }
    }

    public function registerTestCustomFields()
    {

        // register setting
        foreach ($this->testSettings as $setting) {
            register_setting($setting["option_group"], $setting["option_name"], (isset($setting["callback"]) ? $setting["callback"] : ''));
        }

        // add settings section
        foreach ($this->testSections as $section) {
            add_settings_section($section["id"], $section["title"], (isset($section["callback"]) ? $section["callback"] : ''), $section["page"]);
        }

        // add settings field
        foreach ($this->testFields as $field) {
            add_settings_field($field["id"], $field["title"], (isset($field["callback"]) ? $field["callback"] : ''), $field["page"], $field["section"], (isset($field["args"]) ? $field["args"] : ''));
        }
    }
}