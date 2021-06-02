<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>


<?php 
$categories= get_categories(array(
  'taxonomy'     => 'favorites',
  'meta_key'     => '_term_order',
  'orderby'      => 'meta_value_num',
  'order'        => 'desc',
  'hide_empty'   => 0,
  )
); 
include( 'templates/header-nav.php' );
?>
<div class="main-content page">
    <div class="container">
	    <div class="row">
	    	<div class="col-12 mx-auto">
                <div class="panel panel-default">
                    <h1 class="h2"><?php echo get_the_title() ?></h1>
                    <div class="panel-body mt-2">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php while( have_posts() ): the_post(); ?>
	    			            <?php the_content();?>
                                    <?php edit_post_link(__('编辑','i_owen'), '<span class="edit-link">', '</span>' ); ?>
	    		                <?php endwhile; ?>
                            </div> 
                        </div>
                    </div>
                </div>
                    <?php
                    if ( comments_open() || get_comments_number() ) :
	    				comments_template();
                    endif; 
                    ?>
	    	</div>
	    </div>
	</div>

<?php get_footer(); ?>