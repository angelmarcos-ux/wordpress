<?php
require_once('/var/www/html/wp-load.php');
$post = get_post(14);
echo $post->post_content;
