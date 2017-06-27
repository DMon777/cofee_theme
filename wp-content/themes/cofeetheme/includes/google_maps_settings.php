<?php


function cofee_maps_settings_page(){

    add_menu_page('Опции Карт Google','Настройки Google Карт',
        'manage_options','google_maps_settings_page',
        'google_maps_options_callback');
}

function google_maps_options_callback(){?>
    <div class="wrap">
        <h2>Опции Google Карт</h2>
        <p> Укажите координаты того мест которое должно отображаться на карте </p>
        <form action="options.php" method="post">
            <?php settings_fields( 'google_maps_option_group' ); ?>
            <?php do_settings_sections( 'google_maps_settings_page' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }

function google_maps_settings(){

    register_setting( 'google_maps_option_group',
        'google_maps_options');

    add_settings_section( 'google_maps_settings_section',
        '','','google_maps_settings_page');

    add_settings_field('lat','lat',
        'lat_callback','google_maps_settings_page',
        'google_maps_settings_section',['label_for' =>'lat' ] );

    add_settings_field('lng','lng',
        'lng_callback','google_maps_settings_page',
        'google_maps_settings_section',['label_for' =>'lng' ] );

}

function lat_callback(){
   $options = get_option('google_maps_options');
    ?>
    <input type="text" name="google_maps_options[lat]"
           id="lat"
           value="<?php echo esc_attr($options['lat']); ?>" class="regular-text">
    <?php
}

function lng_callback(){
    $options = get_option('google_maps_options');
    ?>
    <input type="text" name="google_maps_options[lng]"
           id="lng"
           value="<?php echo esc_attr($options['lng']); ?>" class="regular-text">
    <?php
}


?>