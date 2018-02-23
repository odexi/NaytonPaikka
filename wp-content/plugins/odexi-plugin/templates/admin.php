<div class="wrap">
    <h1>Odexi Plugin required</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a> </li>
        <li><a href="#tab-2">Form</a> </li>
        <li><a href="#tab-3">About</a> </li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">

            <?php
                form_thing();
            ?>

        </div>

        <div id="tab-2" class="tab-pane">
            <h3>Form</h3>
            <form method="post">
                <?php
                    echo '<input type="text" />';
                submit_button();
                ?>
            </form>
        </div>

        <div id="tab-3" class="tab-pane">
            <h3>About</h3>
            <!--<input type="button" value="Create a form" onclick="location='admin.php'" />
            -->
            <?php
            testForm_thing()
            ?>

        </div>
    </div>
</div>

<?php add_shortcode('test', array($this, 'form_thing')); ?>
<?php
    function form_thing(){
        ?>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'odexi_options_group' );
            do_settings_sections('odexi_plugin');
            submit_button();
            ?>
        </form>



        <?php
    }

function testForm_thing(){
    ?>
    <form method="post" action="options.php">
        <?php
        settings_fields( 'test_options_group' );
        do_settings_sections('odexi_about');
        //submit_button();
        ?>
    </form>



    <?php
}

?>