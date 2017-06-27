<?php get_header(); ?>

    <div class="welcome">
        <div class="container">
            <div class="welcome-top heading">

            <?php if(have_posts()): while(have_posts()): the_post();?>
                <h3>WELCOME</h3>
                <div class="welcome-bottom">
                    <?php the_post_thumbnail('small')?>
                    <?php the_content();?>
                </div>
            <?php endwhile;?>

            <?php endif;?>

            </div>
        </div>
    </div>
    <!--welcome-end-->
    <!--team-starts-->
    <div class="team">
        <div class="container">
            <div class="team-top heading">
                <h3>OUR TEAM</h3>
            </div>

            <?php
                $our_team = new WP_Query('category_name=our-team');


            ?>
            <div class="team-bottom">
            <?php if($our_team->have_posts()): while($our_team->have_posts()): $our_team->the_post();?>

                <div class="col-md-3 team-left">
                    <?php the_post_thumbnail('small');?>
                    <h4><?php the_title();?></h4>
                    <p><?php the_content();?></p>
                </div>
            <?php endwhile;?>

            <?php endif;?>
                <div class="clearfix"></div>
            </div>

<!--            <div class="team-bottom">-->
<!--                <div class="col-md-3 team-left">-->
<!--                    <img src="images/t-1.jpg" alt="" />-->
<!--                    <h4>Rita Nelson</h4>-->
<!--                    <p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 team-left">-->
<!--                    <img src="images/t-2.jpg" alt="" />-->
<!--                    <h4>Marta Healy</h4>-->
<!--                    <p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 team-left">-->
<!--                    <img src="images/t-3.jpg" alt="" />-->
<!--                    <h4>John Black</h4>-->
<!--                    <p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 team-left">-->
<!--                    <img src="images/t-4.jpg" alt="" />-->
<!--                    <h4>Kate Tompson</h4>-->
<!--                    <p>Fusce at elementum diam. Integer pellentesque ultricies pharetra.</p>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->
        </div>
    </div>



<?php if(!dynamic_sidebar('cofee_theme_footer_widget')): ?>
    <span>Для отображения картинок добавте виджет - Footer Widget в админ панели!</span>
<?php endif;?>
<!--slide-end-->
<!--footer-starts-->
<?php get_footer();?>