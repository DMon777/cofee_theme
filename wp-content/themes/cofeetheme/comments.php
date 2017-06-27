<?php
if(comments_open()){?>

    <div class="comments heading">
        <h3>Comments</h3>
        <?php $i = 1; ?>
        <?php foreach ($comments as $comment):?>
            <div class="media">
                <?php if($i % 2 != 0):  ?>
                    <div class="media-body">
                        <h4 class="media-heading">	<?php comment_author(); ?></h4>
                        <p> <?php comment_text(); ?> </p>
                    </div>
                    <div class="media-right">
                        <a href="#">
                            <?php echo get_avatar( $comment, $size='70' ); ?> </a>
                    </div>

                <?php else: ?>
                    <div class="media-left">
                        <a href="#">
                            <?php echo get_avatar( $comment, $size='70' ); ?>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php comment_author(); ?></h4>
                        <p> <?php comment_text(); ?> </p>
                    </div>
                <?php endif;?>
            </div>

            <?php $i++;?>
        <?php endforeach;?>
    </div>

    <div class="comment-bottom heading">
    <h3>Leave a Comment</h3>
    <form method="post" action = "<?php echo site_url('wp-comments-post.php')?>">
        <input type="hidden" name = "comment_post_ID" value="<?php echo $post->ID;?>" id = "comment_post_ID">
        <input type="text" name="author" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
        <input type="text" name = 'email' value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
        <textarea cols="77" name = "comment" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
        <input type="submit" value="Send">
    </form>
    </div>



<?php }

else{
    echo "<p> Комментарии зактыты </p>";
}