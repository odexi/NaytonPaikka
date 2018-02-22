<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
//$_SESSION['testi'] = get_current_user_id();


get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <!-- contents of Your Post -->
        <h1><?php the_title();  ?></h1>

       <?php

    //    wd_form_maker(6, "embedded");


       /*?>

<?php
$key = 'textarea';
$textarea = 'textarea';
$radiobutton = 'radio-button';
$arr = array();
$labelTypes = array();

$getTextAreas = get_post_custom_values($textarea);
$getRadioButtons = get_post_custom_values($radiobutton);
foreach($getRadioButtons as $radio){
    array_push($arr, $radio );
}
foreach($getTextAreas as $txtarea){
    array_push($arr, $txtarea );
}

$custom_field_keys = get_post_custom_keys();


foreach ( $custom_field_keys as $key => $value ) {
    $valuet = trim($value);
    if ( '_' == $valuet{0})
        continue;
    //echo $key . " => " . $value . "<br />";
    print_r($valuet);
    array_push($labelTypes, $valuet);
    //foreach($arr as $titles){

       // print_r(get_post_custom_values($radiobutton));
        // if ($titles == get_post_custom_values($valuet)){
          //   print_r("juu");
        // }
       // print_r("value: " . $value . "\n");
       // print_r("title: " . $titles . "\n");
        //if ($value == $titles){
         //   print_r(" ");
        //}


    //}
}



foreach($arr as $k){
  //  print_r($k);
    ?>
    <label for="your_fields"><?php echo $k ?></label>
            <br>
            <textarea id="your_fields" rows="5" cols="30"
                      style="width:500px;"></textarea>
<br>
    <?php
}
?>*/?>





 </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>