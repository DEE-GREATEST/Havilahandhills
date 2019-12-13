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
                    <?php the_post_thumbnail('small_medium', array('class'=> 'img-fluid card-img-top')); //POST_THUMBNAIL ?>
                    </div>
                    <div class="card-text project-text">
                        <div><h3><?php the_title();?></h3></div>
                        
                        <div><p><?php the_content();?></p></div>
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

<section id="see-all-project"> 
    <div class="text-center"><a href="https://havilahandhills.com/NEW/projects/" class="btn btn-lg btn-all-project">See All Projects</a></div>
</section>