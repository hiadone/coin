<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);


?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<article class="content02">
    
    
    


        <?php
        $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
        echo form_open('', $attributes);
        ?>
            <table class='post_table table-hover' style="border-top:2px solid #4f4f51">
                <tr>
                    <th>번 호</th>
                    <th>제 목</th>
                    <th class="spoon-img">닉 네 임</th>
                    <th>날 짜</th>
                    <th>조 회</th>
                </tr>
                <?php
                if (element('list', element('data', element('list', $view)))) {
                    foreach (element('list', element('data', element('list', $view))) as $result) {
                ?>
                <tr>
                    
                    <td><?php if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                                echo '<span class="fa fa-check fa-lg"></span>';
                            } else echo element('num', $result); ?></td>
                    <td style="text-align: left;padding-left:20px;">
                        <?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="
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
                        " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                        <?php if (element('post_comment_count', $result)) { ?><span class="comment-count">+<?php echo element('post_comment_count', $result); ?></span><?php } ?></td>
                    <td class="spoon-img">
                        <figure>
                            <img src="<?php echo base_url("/assets/images/small_spoon_".element('display_level', $result,1).".png")?>" alt="spoon_img">
                            <figcaption><?php echo element('display_name', $result); ?></figcaption>
                        </figure>
                        
                        
                    </td>
                    <td><?php echo element('display_datetime', $result); ?></td>
                    <td><?php echo number_format(element('post_hit', $result)); ?></td>
                </tr>
                <?php
                    }
                }
                if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
                ?>
                <tr>
                    <td colspan="6" class="nopost">게시물이 없습니다</td>
                </tr>
                <?php } ?>
                
            </table>
            <?php echo form_close(); ?>
       
                
        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        //]]>
        </script>
            

        
                
        <!-- <?php if (element('search_list_url', element('list', $view))) { ?>
            <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a>
        <?php } ?> -->
            
            
                <section class="post_button">
                    <a href="<?php echo element('list_url', element('list', $view)); ?>">목 록</a>
                    <?php if (element('write_url', element('list', $view))) { ?>
                    <a href="<?php echo element('write_url', element('list', $view)); ?>">글 쓰 기</a>
                    <?php } ?>
                </section>
            
        <!-- <section class="post_page"><?php echo element('paging', element('list', $view)); ?></section> -->
    
<?php echo element('footercontent', element('board', element('list', $view))); ?>

</article>
<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
