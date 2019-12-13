<?php 
//  Services Taxonomy
get_header(); 
?>


 <!-- Hero Section -->
 <section id="hero-about">
    <div class="hero-about-image">
        <div class="hero-about-text">
            <h5 class="mb-4 pb-0" style="text-align: center;"><span style="font-weight:bold"> Our Services</span></h5>
        </div>
    </div>
</section>



<section id="about" class="pt-5">
    <div class="container">
        <div class="section-header">
            <h2>What We Do Best</h2>
        </div>

        <div class="row no-gutters services-wrap clearfix" style="padding-top: 30px; padding-bottom: 50px;">


            <?php
            $args = array(
            'post_type'=>'services',
            'tax_query' => array(
            array(
            'taxonomy' => 'type',
            'field' => 'id',
            'terms' => 6,
            'operator' => 'IN',
            ),
            )
            );
            query_posts($args);

            if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
            ?>
                   
            <div class="col-lg-4  col-md-3">
                <div class="card" style="width: 20rem; height: 40rem; background-color: #FFFFFF;"> 
                    <div class="text-center services-icon pt-5">
                        <?php the_post_thumbnail('medium', array('class'=> 'img-fluid')); //POST_THUMBNAIL ?>
                    </div>
                    <div class="services-icon-text pt-3">
                        <h5 class="text-center" style="color:#038BB4; fonr-size: 24px; font-family: 'Ubuntu', sans-serif;"><?php the_title();?></h5>
                    </div>
                    <!-- <div class="card-text"> -->
                        <p class="text-enter pr-5"><?php the_content();?> </p>
                    <!-- </div> -->
                </div>

                <br>
                <br>
                <br>
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


<?php get_template_part('subscribe'); ?>

<!-- ============================================
FEATURED PROJECT TEMPLATE
============================================ -->

<section id="featured-project">
    <div class="container">
        <div class="section-header">
            <h2>Featured Projects</h2>
        </div>
                    
        <div class="row no-gutters " style="padding-top: 30px; padding-bottom: 10px;">

            <?php
            $args = array(
            'post_type'=>'projects',
            'posts_per_page' => 2,
            'tax_query' => array(
            array(
            'taxonomy' => 'project category',
            'field' => 'id',
            'terms' => 3,
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
                    <?php the_post_thumbnail('large', array('class'=> 'img-fluid')); //POST_THUMBNAIL ?>
                    </div>
                    <div class="card-text project-text">
                        <h3><?php the_title();?></h3>
                        <?php the_content();?>
                    </div>
                    <div class="text-left"><p><?php if ( get_post_meta( get_the_ID(), 'Button', true ) ) : ?>
                            <?php echo ( get_post_meta( get_the_ID(), 'Button', true ) ); ?>
						  <?php endif; ?>
                        </p></div>
                    <!-- <div class="text-left"><a href="" class="btn btn-lg btn-more">More</a></div> WIll BE CUSTOM FILED LATER -->
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



<?php get_footer(); ?>