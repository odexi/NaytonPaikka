<h1>CPT</h1>

<?php
testForm_thing()
?>

<?php


function testForm_thing(){
    ?>
    <form method="post" action="options.php">
        <?php
        settings_fields( 'test_options_group' );
        do_settings_sections('odexi_about');
        submit_button();
        ?>
    </form>



    <?php
}

?>
