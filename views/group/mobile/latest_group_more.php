
     
    <?php 
  

    
   
    
 
    if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $value) {

            if(element('brd_key',element('board',$view))==='live_news' || element('brd_key',element('board',$view))==='hot_news'){ ?>
                <li class='gallery_news'>
                    <a href="<?php echo element('url', $value); ?>" >
                    <figure>
                        <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                        <figcaption>
                        <h3 class="normal_font"><?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?><?php echo html_escape(element('title', $value)); ?></h3>
                        <p class="display_content"><?php echo element('display_content', $value); ?></p>
                        </figcaption>
                    </figure>
                </a>
                </li>                        


           <?php } else { ?>
                <li>
                    <a href="<?php echo element('url', $value); ?>" >
                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?>
                    <?php echo html_escape(element('title', $value)); ?>
                     <span><?php if (element('post_comment_count', $value)) { ?> [<?php echo element('post_comment_count', $value); ?>]<?php } ?></span>
                    
                    <table>
                        <tr>
                            <td colspan="2"><?php echo element('display_datetime', $value); ?></td>
                            <td colspan="2"><?php echo element('display_name', $value); ?></td>
                            <td colspan="2">조회수 : <?php echo number_format(element('post_hit', $value)); ?></td>
                        </tr>
                    </table>
                    </a>
                </li>

            <?php 
                }
            }
        } 
    ?>

     
    
       



