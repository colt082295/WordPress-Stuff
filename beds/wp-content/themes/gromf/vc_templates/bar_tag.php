<?php
add_action( 'vc_before_init', 'your_name_integrateWithVC' );
function your_name_integrateWithVC() {
   vc_map( array(
      "name" => __( "Bar tag test", "my-text-domain" ),
      "base" => "bartag",
      "class" => "",
      "category" => __( "Content", "my-text-domain"),
      'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
      'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Text", "my-text-domain" ),
            "param_name" => "foo",
            "value" => __( "Default param value", "my-text-domain" ),
            "description" => __( "Description for foo param.", "my-text-domain" )
         )
      )
   ) );
}
?>