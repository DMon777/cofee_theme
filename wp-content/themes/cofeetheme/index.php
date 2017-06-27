<?php get_header(); ?>
<!--banner-end-->
<!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <?php
                    $cofee_of_the_months = new WP_Query('category_name=
                    cofee-of-the-months');
                    ?>

                    <?php if($cofee_of_the_months->have_posts()) : while($cofee_of_the_months->have_posts()) : $cofee_of_the_months->the_post();?>

                        <div class="about-one">
                            <p>Find The Most</p>
                            <h3><?php the_title();?></h3>
                        </div>
                        <div class="about-two">
                            <a href="<?php the_permalink()?>"><?php the_post_thumbnail('full');?></a>
                            <p>Posted by <a href="#"><?php the_author();?></a> on <?php echo get_the_date('j M,Y')?> <a href="<?php echo get_comments_link();?>">comments(<?php echo wp_count_comments(get_the_ID())->total_comments;?>)</a></p>
                            <?php the_excerpt();?>
                            <div class="about-btn">
                                <a href="<?php the_permalink();?>">Read More</a>
                            </div>
                            <ul>
                                <li><p>Share : </p></li>
                                <li><a href="#"><span class="fb"> </span></a></li>
                                <li><a href="#"><span class="twit"> </span></a></li>
                                <li><a href="#"><span class="pin"> </span></a></li>
                                <li><a href="#"><span class="rss"> </span></a></li>
                                <li><a href="#"><span class="drbl"> </span></a></li>
                            </ul>
                        </div>
                    <?php endwhile;?>
                    <?php endif;?>

<!--                    <div class="about-tre"><!-- начало блока с постами  -->
<!---->
<!--                        --><?php
//
//                        /* Для того чтобы вывести посты через foreach сначала получил их с помощью функции get_posts,
//                        она вернула массив в виде пронумерованного ключа со значением в виде объекта с постом. */
//
//                        $id = $cofee_of_the_months->posts[0]->ID;
//                        $all_my_posts = get_posts(['post__not_in' => [$id],'numberposts' => 0]);
//                        ?>
<!--                        --><?php //$i = 1;?>
<!--                        --><?php //foreach ($all_my_posts as $post): setup_postdata($post)?>
<!--                            --><?php //if($i % 2  != 0):?>
<!--                        <div class="a-1">-->
<!--                            <div class="col-md-6 abt-left">-->
<!--                                <a href="--><?php //the_permalink()?><!--">--><?php //the_post_thumbnail('small')?><!--</a>-->
<!--                                <h6>--><?php //echo get_the_date('d/m/Y')?><!--</h6>-->
<!--                                <h3><a href="--><?php //the_permalink()?><!--">--><?php //the_title();?><!--</a></h3>-->
<!--                                --><?php //the_excerpt();?>
<!--                            </div>-->
<!--                                --><?php //if(count($all_my_posts) == $i): ?>
<!--                                    <div class="clearfix"></div>-->
<!--                                    </div>-->
<!--                                --><?php //endif;?>
<!--                            --><?php //else:?>
<!--                                <div class="col-md-6 abt-left">-->
<!--                                    <a href="--><?php //the_permalink()?><!--">--><?php //the_post_thumbnail('small')?><!--</a>-->
<!--                                    <h6>--><?php //echo get_the_date('d/m/Y')?><!--</h6>-->
<!--                                    <h3><a href="--><?php //the_permalink()?><!--">--><?php //the_title();?><!--</a></h3>-->
<!--                                    --><?php //the_excerpt();?>
<!--                                </div>-->
<!--                                <div class="clearfix"></div>-->
<!--                                </div>  <!-- end a1 -->
<!--                            --><?php //endif;?>
<!--                            --><?php //$i++;?>
<!--                        --><?php //endforeach; wp_reset_postdata(); ?>
<!--                        </div><!-- конец блока с постами  -->
<!--                    </div>-->


<!--    еще одна попытка вывести посты по нормальному                -->
                    <div class="about-tre">
                        <?php
                        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $posts = new WP_Query([
                                'posts_per_page' => 2,
                                'category_name' => 'post',
                                'paged' => $paged // передаем текущую страницу для пагинации
                        ]);
                        ?>
    <?php $count = 1;?>
    <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post();?>
            <?php if($count == 1 || $count % 2 != 0):?>
                <div class="a1">
                    <div class="col-md-6 abt-left">
                        <a href="<?php the_permalink()?>"><?php the_post_thumbnail('small')?></a>
                        <h6>Find The Most</h6>
                        <h3><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                        <label><?php echo get_the_date('M d,Y');?></label>
                    </div>

            <?else:?>

                    <div class="col-md-6 abt-left">
                        <a href="<?php the_permalink()?>"><?php the_post_thumbnail('small')?></a>
                        <h6>Find The Most</h6>
                        <h3><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                        <label><?php echo get_the_date('M d,Y');?></label>
                    </div>
            </div>


            <?endif;?>

        <?$count++;?>
    <?php endwhile;?>
    <?php endif;?>
    <?php wp_reset_postdata();?><!-- сбрасываем данные -->

                        </div><!-- end div about tre -->
                    </div>

<!--    тут заканчивается попытка вывести посты по нормальному                -->

                </div>
            <?php get_sidebar();?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

    <div id = 'pagination'>
<?php

$big = 999999999; // уникальное число

echo paginate_links( array(
    'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'  => '?paged=%#%',
    'prev_text'    => '&laquo',
    'next_text'    => '&raquo',
    'current' => max( 1, get_query_var('paged') ),
    'total'   => $posts->max_num_pages
) );


?>
</div>



<!--about-end-->
<!--slide-starts-->
<?php if(!dynamic_sidebar('cofee_theme_footer_widget')): ?>
    <span>Для отображения картинок добавте виджет - Footer Widget в админ панели!</span>
<?php endif;?>
<!--slide-end-->
<!--footer-starts-->
<?php get_footer();?>