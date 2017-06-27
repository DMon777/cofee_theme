<?php

//delete_option('cofee_break_footer_widget_images_option');

//add_action('admin_menu','delete_footer_widget_image');


function delete_footer_widget_image(){

    if($_POST['delete_footer_image']){
     //   $options = get_option('cofee_break_footer_widget_images_option');
        unlink($_POST['image_src'][0]);
        return true;
    }
    else return false;

}


function cofee_break_footer_widget_menu(){

    add_menu_page('Опции Footer Widget','Footer Widget',
        'manage_options','footer_widget_page',
        'cofee_break_footer_options_callback');

    add_submenu_page('footer_widget_page','Footer Images','Изображения в футере',
        'manage_options','footer_widget_images_page',
        'footer_widget_images_callback');
}
/* вставляю пустой массив в значение опции чтобы функция обработчик не вызывалась 2 раза
если опции еще нет в базе данных */
function check_option_image_exists(){
    $options = get_option('cofee_break_footer_widget_images_option');
    if(empty($options)){
        update_option('cofee_break_footer_widget_images_option',array());
    }
}

function cofee_break_footer_options_callback(){?>

    <div class="wrap">
        <h2>Опции Footer Widget</h2>
        <p>На этой странице вы сможете настроить и загрузить изобраежния для Footer Widget</p>
        <form action="options.php" method="post">
            <?php settings_fields( 'cofee-break-footer-widget-group' ); ?>
            <?php do_settings_sections( 'footer_widget_page' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>

<?php }


function cofee_break_footer_widget_settings(){

    //images

    register_setting( 'cofee-break-footer-widget-images-group',
        'cofee_break_footer_widget_images_option','footer_widget_images_sanitize');

    add_settings_section('footer_widget_images_section','Изображения footer widget',
        '','footer_widget_images_page');

    add_settings_field('footer_widget_images_id','Загрузите изображения',
        'footer_images_callback','footer_widget_images_page',
        'footer_widget_images_section');

    //settings

    register_setting( 'cofee-break-footer-widget-group',
        'cofee_break_footer_widget_option');

    add_settings_section( 'cofee_break_footer_widget_settings_section',
        'Настройки footer widget','','footer_widget_page');

    add_settings_field('visible_items_id','Количество отображаемых изображений',
        'visible_items_callback','footer_widget_page',
       'cofee_break_footer_widget_settings_section',['label_for' =>'visible_items_id' ] );

    add_settings_field('animation_speed_id','скорость анимации( в миллесекундах 1000 = 1 сек. )',
        'amimation_speed_callback','footer_widget_page',
        'cofee_break_footer_widget_settings_section',['label_for' =>'animation_speed_id' ] );
}

function footer_widget_images_sanitize($options){

       if( !empty($_FILES['footer_widget_image']['tmp_name']) ) {
           $overrides = array('test_form' => false);/* для того чтобы файл реально загружался на сервер а не в те
	стовом режиме */
           $file = wp_handle_upload($_FILES['footer_widget_image'], $overrides);/* функция для загрузки файла на
	сервер, при успешной загрузке возвращает массив с данными о картинке */
           $old_option = get_option('cofee_break_footer_widget_images_option');

           if (!empty($old_option)) {
               $options = $old_option;
               $options[] = ['file' => $file['url'],'src' => $file['file']];

           } else {
               $options[] = ['file' => $file['url'],'src' => $file['file']];
           }
       }

       else{
           $old_options = get_option('cofee_break_footer_widget_images_option');
           if(empty($old_options)){
               return $options;
           }
           else{
               $options = $old_options;
           }
       }

    if($_POST['delete_footer_image']){
        foreach ($_POST['delete_footer_image'] as $val){
            unlink($options[$val]['src']);
            unset($options[$val]);

           }
    }

    return $options;
}

function footer_images_callback(){// показ поля для загрузки изображений
    $options = get_option('cofee_break_footer_widget_images_option');
    var_dump($options);
    ?>
    <input type="file" name="footer_widget_image"  id="footer_widget_images_id">
    <?php if(!empty($options)):?>
    <div class = 'wpap'>
    <?php foreach ($options as $key => $val):?>
        <p>  <img src = "<?php echo $val['file'];?>" alt = 'vaselisa' width = "200"></p>
        <p> <input type="checkbox" name = 'delete_footer_image[]' value="<?php echo $key;?>" > delete </input></p>
     <?php endforeach;?>
    </div>
    <?php endif;?>

<?php }

function amimation_speed_callback(){//  animation speed items callback
    $options = get_option('cofee_break_footer_widget_option');
    ?>
    <input type="text" name="cofee_break_footer_widget_option[animation_speed]"
           id="animation_speed_id"
           value="<?php echo esc_attr($options['animation_speed']); ?>" class="regular-text">
    <?php
}

function visible_items_callback(){//  visible items callback
    $options = get_option('cofee_break_footer_widget_option');
    ?>
    <input type="text" name="cofee_break_footer_widget_option[visible_items]"
           id="visible_items_id"
           value="<?php echo esc_attr($options['visible_items']); ?>" class="regular-text">
    <?php
    }

function footer_widget_images_callback(){// показ страницы субменю для загрузки изображений

    ?>
    <div class="wrap">
        <h2>Загрузка изображений в Footer Widget</h2>
        <!-- не забываем добавить атрибут enctype к форме для загрузки файлов -->
        <form action="options.php" method="post" enctype="multipart/form-data">
            <?php settings_fields( 'cofee-break-footer-widget-images-group' ); ?>
            <?php do_settings_sections( 'footer_widget_images_page' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}



