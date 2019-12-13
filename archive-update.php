<?php 
//  Update Taxonomy
get_header(); 
?>

 <!-- Hero Section -->
 <section id="hero-about">
    <div class="hero-about-image">
        <div class="hero-about-text">
            <h5 class="mb-4 pb-0" style="text-align: center;"><span style="font-weight:bold">Blog</span></h5>
        </div>
    </div>
</section>

<section id="featured-project">
    <div class="container">
        <div class="section-header pt-5">
            <h2>Blog</h2>
        </div>
                        
        <div class="row no-gutters " style="padding-top: 30px; padding-bottom: 10px;">

        <?php
          $args = array(
          'post_type'=>'update',
          'tax_query' => array(
          array(
          'taxonomy' => 'news',
          'field' => 'id',
          'terms' => 9,
          'operator' => 'IN',
          ),
          )
          );
          query_posts($args);

          if ( have_posts() ) : 
          while ( have_posts() ) : the_post();
          ?>

            <div class="col-lg-6  col-md-6">
                <div class="card card-project">
                    <div class="card-image">
                    <?php the_post_thumbnail('small_medium', array('class'=> 'img-fluid')); //POST_THUMBNAIL ?>
                    </div>
                    <div class="card-text project-text">
                        <h3><?php the_title();?></h3>
                        <p><?php the_content();?></p>
                    </div>
                    <div class="text-left"><a href="" class="btn btn-lg btn-more">More</a></div>
                </div>
            </div>
            <?php 
            wp_reset_postdata(); 
            ?>
            <?php 
            endwhile; // end loop
            ?>
        </div>
        <?php else: ?>
        <p class="text-center"><b>Sorry, no posts matched your criteria.</b></p>
        <?php endif; ?>
    </div>
</section>

 <?php get_template_part('modal'); ?>  
<?php get_template_part('subscribe'); ?>



<?php get_footer(); ?>