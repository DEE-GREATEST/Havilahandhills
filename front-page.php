<?php 
/* Template Name: Home */
get_header(); 
?>


<!-- Hero Section -->
<section id="hero">
    <div class="container">
    <div class="hero-image">
        <div class="hero-text">
            <h5 class="mb-4 pb-0">Let's help you <br><span style="font-weight:bold;">build efficiency</span> & grow <span style="font-weight:bold;">bottom line</span></h5>
            <a href="/NEW/about" class="btn btn-lg learnmore">Learn more</a>
        </div>
    </div>
    </div>
</section>


<!-- Trusted companies section -->
<section id="companies">
    <div class="container-fluid">
        <div class="section-header">
            <h2>Trusted By Global Companies</h2>
        </div>
    </div>
    <?php get_template_part('trusted-companies'); ?>
</section>

<!-- Services section -->
<section id="services">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
        </div>
           
        <!-- Service section icons -->
        <div class="row no-gutters services-wrap clearfix" style="padding-top: 30px; padding-bottom: 10px; margin:auto;">

        <?php
          $args = array(
          'post_type'=>'services',
          'tax_query' => array(
          array(
          'taxonomy' => 'type',
          'field' => 'id',
          'terms' => 4,
          'operator' => 'IN',
          ),
          )
          );
          query_posts($args);

          if ( have_posts() ) : 
          while ( have_posts() ) : the_post();
          ?>
            <div class="col-lg-3  col-md-4">
                <div class="services-icon">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium', array('class'=> 'img-fluid')); //POST_THUMBNAIL ?></a>
                </div>
                <div class="services-icon-text">
                    <div><p class="text-center pt-4"><?php the_excerpt();?></p></div>
                </div>
            </div>

            <?php 
            wp_reset_postdata(); 
            ?>
            
            <?php 
            endwhile; // end loop
            ?>   

            <?php else: ?>
            <p class="text-center">Sorry, no posts matched your criteria.</p>

          <?php endif; ?>         
            
        </div>
        <div class="text-center">
            <a href="" class="btn btn-lg btn-project" data-toggle="modal" data-target="#modalLoginForm">Start A Project</a>
        </div>
        
        
        
         <?php get_template_part('modal'); ?>  
            
</section>

<?php get_template_part('subscribe'); ?>

<?php get_template_part('featured-project'); ?>


<?php get_footer(); ?>