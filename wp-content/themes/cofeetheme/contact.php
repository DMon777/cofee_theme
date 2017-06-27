<?php
/*
Template Name: Страница контактов
 */
get_header(); ?>

    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h3><?php the_title();?></h3>
            </div>
            <div class="contact-bottom">
<!--                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6632.248000703498!2d151.265683!3d-33.7832959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12abc7edcbeb07%3A0x5017d681632bfc0!2sManly+Vale+NSW+2093%2C+Australia!5e0!3m2!1sen!2sin!4v1433329298259" frameborder="0" style="border:0"></iframe>-->
                <div id="map" style="width: 100%; height: 400px;">

                </div>
                <div class="contact-text">
                    <div class="col-md-4 contact-left">

                    <?php if(have_posts()): while(have_posts()): the_post();?>
                        <?php the_content();?>








<!--                        <input placeholder="Name" type="text" required>-->
<!--                        <input placeholder="Email" type="text" required>-->
<!--                        <textarea placeholder="Message" required></textarea>-->
<!--                        <div class="submit-btn">-->
<!--                            <form>-->
<!--                                <input type="submit" value="SUBMIT">-->
<!--                            </form>-->
<!--                        </div>-->


                    <?php endwhile;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!--slide-end-->
    <!--footer-starts-->
<?php get_footer();?>