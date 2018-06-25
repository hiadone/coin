<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="foot_padding">
    <section class="wrap_con">
        <h2 class="hidden"><?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?></h2>
        
        <?php 
        if (element('menu', $layout)) {
            $menu = element('menu', $layout);
            echo '<ul class="nav nav-sub nav-pills nav-justified">';
            if (element(element(0,element('active',$menu)), $menu)) {
                
                foreach (element(element(0,element('active',$menu)),$menu) as $mkey => $mval) {

                    $active='';
                
                    if(element(1,element('active',$menu)) === element('men_id',$mval)) {
                        
                        $active='active';
                    }

                
                    echo '<li class="'.$active.'" ><a href="'.base_url(element('men_link',$mval)).'">'.element('men_name',$mval).'</a></li>';
                    echo "\n";
                }
                
            }
            echo '</ul>';
        }
        ?>
        <section class="store_li">
            <h2 class="hidden">스토어</h2>
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
                                    echo '<ul class="store-gallery">';
                                    $open = true;
                                }
                                $marginright = (($i+1)% $cols === 0) ? 0 : 2;
                                ?>
                                <li class="gallery-box" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
                                    <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
                                    <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>">
                                        <figure>
                                            <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class=""/>
                                            <figcaption>
                                                <h4><?php echo html_escape(element('title', $result)); ?></h4>
                                                
                                                <div>
                                                    포인트 <span class='normal_font'><?php echo number_format(element('output',element(0,element('extra_content', $result)))); ?> P</span>
                                                </div>
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

            <div class="post_button" style='padding:0 3%; box-sizing: border-box; margin-bottom: 5%; text-align: right;'>
                <!-- <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전체</a> -->
                <?php if (element('write_url', element('list', $view))) { ?>
                    <a href="<?php echo element('write_url', element('list', $view)); ?>">글 쓰 기</a>    
                <?php } ?>
                <?php if (element('is_admin', $view)) { ?>
                <div onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');">선 택 삭 제</div>
                <?php } ?>
            </div>

            <div class="post_page">
                <nav class="mo_pager">
                    <?php echo element('paging', element('list', $view)); ?>
                </nav>
            </div>
        </section>
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
