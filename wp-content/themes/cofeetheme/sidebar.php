<div class="col-md-4 about-right heading">
    <div class="abt-1">
        <h3>ABOUT US</h3>
        <?php
        $about_us_page = new WP_Query(['pagename' => 'about']);
        if($about_us_page->have_posts()) : while($about_us_page->have_posts()): $about_us_page->the_post();
        ?>
            <div class="abt-one">
                <?php the_post_thumbnail('small')?>
                <?php the_excerpt();?>
                <div class="a-btn">
                    <a href="<?php the_permalink();?>">Read More</a>
                </div>
            </div>

        <?php endwhile;?>
        <?php endif;?>

    </div>
    <div class="abt-2">
        <h3>YOU MIGHT ALSO LIKE</h3>

        <?php
        $arguments = [
                      'posts_per_page' => 3,
                      'category_name' => 'post',
                      'orderby' => 'rand',
                      'order' => 'DESC',
                      ];
        $you_might_also_like = new WP_Query($arguments);
        if($you_might_also_like->have_posts()): while ($you_might_also_like->have_posts()):$you_might_also_like->the_post();
        ?>
            <div class="might-grid">
                <div class="grid-might">
                    <a href="<?php the_permalink()?>"> <?php the_post_thumbnail('small')?> </a>
                </div>
                <div class="might-top">
                    <h4><a href="<?php the_permalink()?>"> <?php the_title();?> </a></h4>

                    <?php
                    $pos = mb_strpos(get_the_excerpt(),'.',0,'UTF-8');
                    $my_excerpt = mb_substr(get_the_excerpt(),0,$pos+1,'UTF-8');
                    ?>

                    <p><?php echo $my_excerpt;?></p>
                </div>
                <div class="clearfix"></div>
            </div>

        <?endwhile;?>
        <?endif;?>
    </div>
    <div class="abt-2">
        <h3>ARCHIVES</h3>

        <?php
        $args = array(
            'type'            => 'monthly',
            'post_type'       => 'post',
        );
        echo "<ul>";
        wp_get_archives($args);
        echo "</ul>";
        ?>

    </div>
    <div class="abt-2">
        <h3>NEWS LETTER</h3>
        <div class="news">
            <form>
                <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
                <input type="submit" value="Subscribe">
            </form>
        </div>
    </div>
</div>