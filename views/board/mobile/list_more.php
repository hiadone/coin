
<?php
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);
$pageid=array('w-3'=>'08yE','w-2'=>'08yH','w-1'=>'08yI');
?>
        
        

            
            
        
           
            <ul class="tab06_cont_list">
    <?php
    if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $result) {          
    ?>
        <li class="">
            <div>
                <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                <a href="<?php echo element('url', $result); ?>" style="
                    <?php
                    if (element('title_color', $result)) {
                        echo 'color:' . element('title_color', $result) . ';';
                    }
                    if (element('title_font', $result)) {
                        echo 'font-family:' . element('title_font', $result) . ';';
                    }
                    if (element('title_bold', $result)) {
                        echo 'font-weight:bold;';
                    }
                    if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                        echo 'font-weight:bold;';
                    }
                    ?>
                " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?>
                <?php if (element('post_comment_count', $result)) { ?><span class="label">+<?php echo element('post_comment_count', $result); ?></span><?php } ?></a>
                <table class="tab06_cont_table">
                    <tbody>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/small_spoon_'.element('display_level', $result,1).'.png');?>" alt="spoon_img"><?php echo element('display_name', $result); ?></td>
                            <td><?php echo element('display_datetime', $result); ?></td>
                            <td>조회수 : <?php echo number_format(element('post_hit', $result)); ?></td>
                        </tr>
                    </tbody>    
                </table>
        
        
                   
            </div>
        </li>

    <?php 
        }
            
    } 
    ?>
</ul>


<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>