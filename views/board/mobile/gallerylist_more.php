



    

    
    <?php
    $i = 0;
    $open = false;
    $cols = element('gallery_cols', element('board',  $view));

     if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $result) {
            if ($cols && $i % $cols === 0) {
                echo '<ul class="tab10_list">';
                $open = true;
            }
            $marginright = (($i+1)% $cols === 0) ? 0 : 2;
    ?>
        <li class="gallery-box" style="width:<?php echo element('gallery_percent', element('board',  $view)); ?>%;margin-right:<?php echo $marginright;?>%;">
            <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
            
                <a href="<?php echo element('url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>">
                    <h4>
                        <img src="<?php echo base_url('assets/images/spoon_'.element('display_level', $result,1).'.png');?>" alt="spoon_img">
                        <span class="contents-title"><?php echo html_escape(element('title', $result)); ?></span>
                    </h4>

                    <div  class="contents-view"><?php echo strip_tags(element('post_content', $result)); ?></div>

                    <table class="tab10_listinfo">
                        <tr>
                            <td><?php echo element('display_datetime', $result); ?></td>
                            <td class="user_nick"><?php echo element('display_name', $result); ?></td>
                            <td><i class="fa fa-eye"></i> <?php echo number_format(element('post_hit', $result)); ?></td>
                            <td><i class="fa fa-comments"></i> <?php echo element('post_comment_count', $result); ?></td>
                        </tr>
                    </table>
                    <!-- <img class="tab10_pic" src="http://placehold.it/900x600/"> -->
                    <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class=" " style="width:<?php echo element('gallery_image_width', element('board',  $view)) ? element('gallery_image_width', element('board',  $view)).'px':'100%'; ?>;height:<?php echo element('gallery_image_height', element('board', $view)) ? element('gallery_image_height', element('board',  $view)).'px' : '100%'; ?>;margin-bottom:-4px;" />
                </a>
            </li>
        <?php
                $i++;
                if ($cols && $i > 0 && $i % $cols === 0 && $open) {
                    echo '</ul>';
                    $open = false;
                }
            }
        }
        if ($open) {
            echo '</ul>';
            $open = false;
        }
        ?>
        

    
    
    
    
    
    



<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
