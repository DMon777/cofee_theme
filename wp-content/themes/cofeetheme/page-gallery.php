<?php
/*
Template Name: Страница показа галлереи
 */
get_header();?>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.gallery a').Chocolat();
        });
    </script>
    <div class="gallery">
        <div class="container">
            <div class="gallery-top heading">
                <h3>OUR GALLERY</h3>
            </div>
            <section>

                <?php

                $gallery = new WP_Query(['post_type' => 'cofee_gallery']);

                ?>
                <ul id="da-thumbs" class="da-thumbs">
                <?php if($gallery->have_posts()) : while($gallery->have_posts()) : $gallery->the_post();?>
                    <li>
                        <a href="<?php the_post_thumbnail_url();?>" rel="title" class="b-link-stripe b-animate-go  thickbox">
                            <?php the_post_thumbnail('small')?>
                                <div>
                                <h5><?php the_title();?></h5>
                                <span><?php
                                    $content = get_the_content();
                                  echo  strip_tags($content);?></span>
                            </div>
                        </a>
                   </li>
                <?php endwhile;?>
                <?php endif;?>
                    <div class="clearfix"> </div>
                </ul>

<!--                <ul id="da-thumbs" class="da-thumbs">-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo get_template_directory_uri()?><!--/images/g-1.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="--><?php //echo get_template_directory_uri()?><!--/images/g-1.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo get_template_directory_uri()?><!--/images/g-2.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="--><?php //echo get_template_directory_uri()?><!--/images/g-2.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo get_template_directory_uri()?><!--/images/g-3.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="--><?php //echo get_template_directory_uri()?><!--/images/g-3.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="images/g-4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="images/g-4.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="images/g-5.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="images/g-5.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="images/g-6.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="images/g-6.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="images/g-7.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="images/g-7.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="images/g-8.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="images/g-8.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="images/g-9.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">-->
<!--                            <img src="images/g-9.jpg" alt="" />-->
<!--                            <div>-->
<!--                                <h5>Coffee</h5>-->
<!--                                <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <div class="clearfix"> </div>-->
<!--                </ul>-->
            </section>


        </div>
    </div>

<?php get_footer();?>