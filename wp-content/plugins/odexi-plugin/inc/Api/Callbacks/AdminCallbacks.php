<?php
/**
 * @package OdexiPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController {

    public function adminDashboard() {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function cptPage() {
        return require_once( "$this->plugin_path/templates/cpt.php" );
    }

    public function taxonomyPage() {
        return require_once( "$this->plugin_path/templates/taxonomy.php" );
    }

    public function widgetPage() {
        return require_once( "$this->plugin_path/templates/widget.php" );
    }

    public function odexiOptionsGroup ( $input ) {
        return $input;
    }

    public function testOptionsGroup ( $input ) {
        return $input;
    }

    public function odexiAdminSection() {
        echo 'Check this beautiful section!';
    }

    public function testAdminSection() {
        echo 'This is a proper custom field test!';
    }

    public function odexiTextExample() {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
    }

    public function odexiFirstName() {
        $value = esc_attr( get_option( 'first_name' ) );
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
    }

    public function testTextArea() {
        $value = esc_attr( get_option( 'test_textarea' ));
        echo '<textarea name="test" rows="5" cols="40">' . $value .'</textarea>';
    }

    public function testRadioButton() {
        $value = esc_attr( get_option( 'test_radiobutton' ) );
       echo '<input type="radio" name= ' . $value . '
<?php if (isset($gender) && $gender=="female") echo "checked";?>
Female
<input type="radio" name= ' . $value . '
<?php if (isset($gender) && $gender=="male") echo "checked";?>
Male';
    }

}