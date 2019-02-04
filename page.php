<?php
global $post;
// get the page number
$page = 0;
$base_url = $_SERVER['REQUEST_URI'];
preg_match('#/([0-9]+)/?$#', $_SERVER['REQUEST_URI'], $matches);
if (preg_match('#/([0-9]+)/?$#', $_SERVER['REQUEST_URI'], $matches)) {
  $page = intval($matches[1]);
  //$base_url = preg_replace('#[0-9]+/?$#', '', $base_url);
}

// output page links
$count = intval(get_post_meta($post->ID, 'project', true));

// output the right row
$count = 1;
if (have_rows('<acf_field>', $post->ID)) {
  while (have_rows('<acf_field>', $post->ID)) {
    $count++;
    the_row();
    if ($count == $page) {
		 the_sub_field('title');
			
		 the_sub_field('image'); 
					
		 the_sub_field('content'); 

					    }
					  }
					
					}

			//initial page if 0
		 if($page == 0): 
        	the_title();
			the_post_thumbnail();
					
			 endif;
				?>
				
				<!-- pagination link -->
						<ul class="list-unstyled">
							
							<?php
							 $i=2; 
										if( have_rows('<acf_field>') ):
										    while ( have_rows('<acf_field>') ) : the_row(); ?>
										<li><a href="<?php echo the_permalink().$i ?>"> 
										<?php $i++; ?>	
										     <?php  echo the_sub_field('title'); ?> </a></li>
										   <?php  endwhile;
										endif;
								?>							
							</ul>
