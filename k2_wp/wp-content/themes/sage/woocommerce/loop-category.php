<?php
woo_loop_before();
if (have_posts()) { $count = 0;
 
    $title_before = '<span class="archive_header">';
    $title_after = '</span>';
 
    woo_archive_title( $title_before, $title_after );
?>
 
<div class="fix"></div>
 
<?php
    while (have_posts()) { the_post(); $count++;
 
        woo_get_template_part( 'content', get_post_type() );
 
    } // End WHILE Loop
} else {
    get_template_part( 'content', 'noposts' );
} // End IF Statement
 
woo_loop_after();
 
woo_pagenav();
?>