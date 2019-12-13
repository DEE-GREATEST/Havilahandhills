<?php 

get_header(); 

?>



<section style="padding-top:5rem; padding-bottom:5rem"> 
  <div class="container">
    
    <?php
    if(have_posts()) : 
    while(have_posts()) : the_post();
    ?>  
    <div class="row"> 
     <div class="col-lg-8  center offset-lg-2"><h4 class="text-center" style="color:#038BB4;"><b><?php the_title(); ?></b></h4><br>
     <div class="text-center">
        <?php the_post_thumbnail('medium_large', array('class'=> 'img-fluid')); //POST_THUMBNAIL ?> 
      </div>
      <br>
        <p><?php the_content();?></p>
      </div>
    </div>
  </div>
  
  <?php 
  wp_reset_postdata(); 
  ?>
  
  <?php 
  endwhile; // end loop
  else: 
  ?>
  <p> Sorry, No POST </p>
  <?php endif;?>

  
</section>


        
        
        
       


  


<?php get_template_part('featured-project'); ?>

<?php
get_template_part('subscribe'); //INCLUDE SUBCRIBE
?>

<?php get_footer();?>
