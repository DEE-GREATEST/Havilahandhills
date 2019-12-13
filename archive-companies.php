<?php 
//  Services Taxonomy
get_header(); 
?>

<!-- Hero Section -->
<section id="hero">
    <div class="container">
    <div class="hero-image">
        <div class="hero-text">
            <h5 class="mb-4 pb-0">Let's help you <br><span style="font-weight:bold;">build efficiency</span> & grow <span style="font-weight:bold;">bottom line</span></h5>
            <a href="/about" class="btn btn-lg learnmore">Learn more</a>
        </div>
    </div>
    </div>
</section>


<section id="companies">
    <div class="container-fluid">
        <div class="section-header">
            <h2>Trusted By Global Companies</h2>
        </div>
    </div>
    <?php get_template_part('trusted-companies'); ?>
</section>




<section id="services">
    <div class="container">
        <div class="section-header">
            <h2>Companies</h2>
        </div>
        <?php
          $args = array(
          'post_type'=>'companies',
          'tax_query' => array(
          array(
          'taxonomy' => 'Companies Name',
          'field' => 'id',
          'terms' => 8,
          'operator' => 'IN',
          ),
          )
          );
          query_posts($args);

          if ( have_posts() ) : 
          while ( have_posts() ) : the_post();
          ?>
        <div class="card mb-3" style="max-width: 840px; min-height: 300px;">       
            <div class="row no-gutters">
                <div class="col-md-4" style="height: 300px; background-color:#C4C4C4">
                     <p class="text-center mt-5 pt-5"><?php the_title();?></p> 
                    <!-- <img src="..." class="card-img" alt="FutureSphere"> -->
                    <?php the_post_thumbnail('medium', array('class'=> 'img-fluid')); //POST_THUMBNAIL ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="height: 300px; background-color: #fff;">
                    <?php the_content();?>
                        <!-- <p class="card-text ml-5 mt-5 pt-5">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                        <div class="text-left ml-5"><a href="" class="btn btn-lg btn-more">More</a></div> 
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <?php 
            wp_reset_postdata(); 
            ?>
            <?php 
            endwhile; // end loop
            ?>

<?php else: ?>
        <p class="text-center"><b>Sorry, no posts matched your criteria.</b></p>
        <?php endif; ?>
    </div>
</section>


 <?php get_template_part('modal'); ?>  


<?php get_template_part('subscribe'); ?>

<?php get_template_part('featured-project'); ?>


<?php get_footer(); ?>