<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('name');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Coffee Break Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

    <?php wp_head();?>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key= AIzaSyA3KdgJ0p-FU1T-yixPRjhN-4AqnyuERKA&callback=initMap">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Tenor+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/chocolat.css" type="text/css" media="screen" charset="utf-8">
    <!---- start-smoth-scrolling---->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--start-smoth-scrolling-->

</head>
<body>
<!--header-top-starts-->
<div class="header-top">
    <div class="container">
        <div class="head-main">
            <a href="index.html"><img src="<?php echo get_template_directory_uri()?>/images/logo-1.png" alt="logo" /></a>
        </div>
    </div>
</div>
<!--header-top-end-->
<!--start-header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class="navigation">
                <span class="menu"></span>
               <?php wp_nav_menu([
                       'theme_location' => 'header_menu',
                        'menu' => 'header_menu',
                        'container' => false,
                        'menu_class' => 'navig',
               ]); ?>
<!--                <ul class="navig">-->
<!--                    <li><a href="index.html"  class="active">Home</a></li>-->
<!--                    <li><a href="about.html">About</a></li>-->
<!--                    <li><a href="gallery.html">Gallery</a></li>-->
<!--                    <li><a href="typo.html">Typo</a></li>-->
<!--                    <li><a href="contact.html">Contact</a></li>-->
<!--                </ul>-->
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <form method="post" action = "">
                    <input name = "s" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                    </form>
                </div>
                <ul>
                    <li><a href="#"><span class="fb"> </span></a></li>
                    <li><a href="#"><span class="twit"> </span></a></li>
                    <li><a href="#"><span class="pin"> </span></a></li>
                    <li><a href="#"><span class="rss"> </span></a></li>
                    <li><a href="#"><span class="drbl"> </span></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- script-for-menu -->
<!-- script-for-menu -->
<script>
    jQuery(document).ready(function($) {
        $("span.menu").click(function(){
            $(" ul.navig").slideToggle("slow" , function(){
            });
        });
    });

</script>
<!-- script-for-menu -->
<!--banner-starts-->
<div class="banner">
    <div class="container">
        <div class="banner-top">
            <div class="banner-text">
                <h2>Aliquam erat</h2>
                <h1>Suspendisse potenti</h1>
                <div class="banner-btn">
                    <a href="single.html">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>