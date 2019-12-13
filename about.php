<?php 

/* Template Name: About */

get_header(); 
?>

<!-- Hero Section -->
<section id="hero-about">
    <div class="hero-about-image">
        <div class="hero-about-text">
            <h5 class="mb-4 pb-0">About<span style="font-weight:bold;"> Havilah & Hills</span></h5>
        </div>
    </div>
</section>



 <!-- #ABOUT HAVILAH -->
<section id="about" class="pt-5 pb-5">
    <div class="container">

        <?php
        $query = new WP_Query( array('category_name' =>'About', 'post_per_page'=>'1'));
        while ( $query-> have_posts()) : $query-> the_post();
        ?>

        <div class="section-header">
            <h2><?php the_title(); ?></h2>
        </div>
        <div><p class="text-center about-text"><?php the_content(); ?></p></div>
        
        <?php 
        wp_reset_postdata(); 
            ?>

        <?php 
        endwhile; // end loop
        ?>
        <div class="text-center">
            <a href="" class="btn btn-lg btn-project" data-toggle="modal" data-target="#modalLoginForm">Start A Project</a>
        </div>

        <?php get_template_part('modal'); ?>  


    </div>
</section>

<?php get_template_part('subscribe'); ?>

<?php get_template_part('featured-project'); ?>


<?php get_footer(); ?>