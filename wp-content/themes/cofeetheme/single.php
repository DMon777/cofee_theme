<?php get_header(); ?>

    <div class="single">
        <div class="container">
            <div class="single-top">

                <?php if(have_posts()): while(have_posts()):the_post();?>

                    <a href="#"><?php the_post_thumbnail(false,['class' => 'img-responsive'])?></a>
                    <div class=" single-grid">
                        <h4><?php the_title();?></h4>
                        <ul class="blog-ic">
                            <li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i><?php echo get_the_author()?></span> </a> </li>
                            <li><span><i class="glyphicon glyphicon-time"> </i><?php echo get_the_date('M d,Y');?></span></li>
                            <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:<?php echo get_count_views();?></span></li>
                        </ul>
                        <?php the_content();?>
                    </div>

                <?php endwhile;?>
                <?php endif;?>

                <div class="comments-wrap">
                    <?php comments_template();?>
                </div>

            </div>
        </div>
    </div>

<?php get_footer();?>