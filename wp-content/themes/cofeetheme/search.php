<?php get_header()?>

    <div class="single">
        <div class="container">
            <div class="single-top">

                <?php if(have_posts()): while(have_posts()):the_post();?>

                    <div class=" single-grid">
                        <h4><?php the_title();?></h4>
                        <?php the_content();?>
                    </div>

                <?php endwhile;?>
                <?php endif;?>

            </div>
        </div>
    </div>

<?php get_footer()?>