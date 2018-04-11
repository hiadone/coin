<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);
?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>
<article class="content02">
    <section class="submenu ">
        <ul>
            <?php
            $menuhtml = '';
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        if (element(element('men_id', $mval), $menu)) {
                            

                            foreach (element(element('men_id', $mval), $menu) as $lkey => $lval) {
                                
                                if(str_replace("/","",element('men_link', $lval)) === implode("",$this->uri->segment_array())){

                                    foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                        $menu_active='';
                                        
                                        if($lkey === $skey) $menu_active='class="menu_active"';
                                        $slink = element('men_link', $sval) ? element('men_link', $sval) : 'javascript:;';
                                        $menuhtml .= '<li '.$menu_active.'><a href="' . $slink . '" ' . element('men_custom', $sval);
                                        if (element('men_target', $sval)) {
                                            $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                        }
                                        $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                                        $menuhtml .= '<li>|</li>';
                                    }

                                }
                                
                            }
                            

                        } 
                    }
                }
            }
            
            echo $menuhtml;
            ?>

            
            
        </ul> 
    </section>

        <?php
        $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
        echo form_open('', $attributes);
        ?>

        <?php if (element('is_admin', $view)) { ?>
        <div style='margin-top:20px;''><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label>
        </div>
        <?php } ?>

        <section class='gallery_li vod_li'>
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
                        <a href="<?php echo element('post_url', $result); ?>" target="_blank" title="<?php echo html_escape(element('title', $result)); ?>">
                            <figure>
                                <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class=""  />
                                <figcaption>
                                    <h3><?php echo element('title', $result); ?></h3>
                                    <div class='img_writer'>
                                        <p class='small_font'>
                                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/spoon_<?php echo element('display_level', $result); ?>.png" alt="spoon_img">
                                            
                                            <?php echo element('display_name', $result); ?>
                                        </p>

                                        <span>|</span> 

                                        <p class='small_font'>조회수 <?php echo number_format(element('post_hit', $result)); ?></p>
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
        </section>
    <?php echo form_close(); ?>

   
            

        
                
        <!-- <?php if (element('search_list_url', element('list', $view))) { ?>
            <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a>
        <?php } ?> -->
        <section class="post_button">
                     
            <?php if (element('write_url', element('list', $view))) { ?>
                <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글 쓰 기</a>    
            <?php } ?>
            <?php if (element('is_admin', $view)) { ?>
            <div class="btn btn-default btn-sm" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');">선택삭제</div>
            <div class="btn btn-default btn-sm" onClick="post_modify(document.flist);">선택수정 </div>
            <?php } ?>
        </section>
        <section class="post_page">
            <?php echo element('paging', element('list', $view)); ?>
        </section>
    
    

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
