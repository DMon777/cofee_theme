<?php

/**
 * Created by PhpStorm.
 * User: Дима
 * Date: 13.05.2017
 * Time: 23:47
 */
class Footer_Widget extends WP_Widget
{

    public function __construct(){

        $args = [
            'name' => 'Footer widget',
            'description' => 'Виджет для вывода в футере'
        ];
        parent::__construct('footer_widget_id','',$args);
    }

    public function widget($args, $instance)
    {?>

        <div class="slide">
            <div class="container">
                <div class="fle-xsel">
                    <ul id="flexiselDemo3">
                        <?php

                        $slider_options = get_option('cofee_break_footer_widget_images_option');

                        if(!empty($slider_options)):
                        foreach ($slider_options as $key => $val ):?>
                            <li>
                                <a href="#">
                                    <div class="banner-1">
                                        <img src="<?php echo $val['file'];?>" class="img-responsive" alt="hello">
                                    </div>
                                </a>
                            </li>

                        <?php endforeach;?>

                        <?php else:?>
                            <li style="font-size: 24px;line-height: normal" >загрузите картинки для слайдера в админ панели!!!</li>
                            <li style="font-size: 24px;line-height: normal" >загрузите картинки для слайдера в админ панели!!!</li>
                            <li style="font-size: 24px;line-height: normal" >загрузите картинки для слайдера в админ панели!!!</li>
                            <li style="font-size: 24px;line-height: normal" >загрузите картинки для слайдера в админ панели!!!</li>
                            <li style="font-size: 24px;line-height: normal" >загрузите картинки для слайдера в админ панели!!!</li>
                        <?php endif;?>

<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <div class="banner-1">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/s-1.jpg" class="img-responsive" alt="hello">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <div class="banner-1">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/s-2.jpg" class="img-responsive" alt="">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <div class="banner-1">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/s-3.jpg" class="img-responsive" alt="">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <div class="banner-1">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/s-4.jpg" class="img-responsive" alt="">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <div class="banner-1">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/s-5.jpg" class="img-responsive" alt="">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <div class="banner-1">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/s-6.jpg" class="img-responsive" alt="">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    <?php }

    public function form($instance){?>

        <h2> Добавляем картинки в футер.</h2>

    <?php }

}


