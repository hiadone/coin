<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<article class="wrap01">
    <section class='main_title store_li'>
        <h2>스 토 어</h2>
   

    

    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>

    <?php if (element('is_admin', $view)) { ?>
        <div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
    <?php } ?>

    

    <div class="">
    <?php
            $i = 0;
            $open = false;
            $cols = element('gallery_cols', element('board', element('list', $view)));
            if (element('list', element('data', element('list', $view)))) {
                foreach (element('list', element('data', element('list', $view))) as $result) {

                    
                    if ($cols && $i % $cols === 0) {
                        echo '<ul class="">';
                        $open = true;
                    }
                    $marginright = (($i+1)% $cols === 0) ? 0 : 2;
                    ?>
                    <li class="gallery-box" >
                        <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>">
                            <figure>
                                <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class="" style="width:<?php echo element('gallery_image_width', element('board', element('list', $view))); ?>px;height:<?php echo element('gallery_image_height', element('board', element('list', $view))); ?>px;" />
                                <figcaption>
                                    <h3><?php echo html_escape(element('title', $result)); ?></h3>
                                    
                                        <p class='small_font'>
                                            포인트 <span class='normal_font'><?php echo number_format(element('output',element(0,element('extra_content', $result)))); ?> P</span>
                                        </p>

                                        

                                        
                                    

                                    
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <?php
                    $i++;
                    if ($cols && $i > 0 && $i % $cols === 0 && $open) {
                        echo '</ul>';
                        $open = false;
                    }
                }
            } else{
                echo '<ul class="mt20"><li>게시물이 없습니다.</li></ul>';
            }
            if ($open) {
                echo '</ul>';
                $open = false;
            }
            ?>
        </div>
    <?php echo form_close(); ?>

    <section class="post_button">
                     <!-- <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전체</a> -->
            <?php if (element('write_url', element('list', $view))) { ?>
                <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글 쓰 기</a>    
            <?php } ?>
            <?php if (element('is_admin', $view)) { ?>
            <div class="btn btn-default btn-sm" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');">선택삭제</div>
            <?php } ?>
        </section>
        <section class="post_page">
            <?php echo element('paging', element('list', $view)); ?>
        </section>
</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
