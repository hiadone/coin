<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);

$param =& $this->querystring;
?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<article class="content02">
    <section class="submenu">
        <ul>
            <?php
            $menuhtml = '';
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        if (element(element('men_id', $mval), $menu)) {
                            

                            foreach (element(element('men_id', $mval), $menu) as $lkey => $lval) {
                                if(!empty($param->output())){
                                    if(str_replace("/","",element('men_link', $lval)) === implode("",$this->uri->segment_array()).'?'.$param->output()){
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
                                } elseif(str_replace("/","",element('men_link', $lval)) === implode("",$this->uri->segment_array())){
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
    
    


    <section class='post_list'>
        <div class='post_table'>

        <?php
        $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
        echo form_open('', $attributes);
        ?>
            <table class='post_table_li'>
                <colgroup>
                    <?php if (element('is_admin', $view)) { ?><col class="px30"><?php } ?>
                    <col class="px40" style="width:50px">
                    <col class="">
                    <col class="px130" >
                    <col class="px80">
                    <col class="px40">
                </colgroup>
                <thead>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th><input onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /></th><?php } ?>
                    <th>번 호</th>
                    <th>제 목</th>
                    <th class="spoon-img">닉 네 임</th>
                    <th>날 짜</th>
                    <th>조 회</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (element('list', element('data', element('list', $view)))) {
                    foreach (element('list', element('data', element('list', $view))) as $result) {
                ?>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><td scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></td><?php } ?>
                    <td><?php echo element('num', $result); ?></td>
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
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/spoon_<?php echo element('display_level', $result); ?>.png" alt="spoon_img">
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
                <tbody>
            </table>
            <?php echo form_close(); ?>
        </div>
        <div class="post_sear">
        <form class="navbar-form navbar-right pull-right" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
            <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
            <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
            
            <select class="normal_font" name="sfield">
                <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                <option value="post_content" <?php echo ($this->input->get('sfield') === 'post_content') ? ' selected="selected" ' : ''; ?>>내용</option>
                
            </select>
            <input type="text" class="" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
            <button class="find_img pointer" type="submit"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/search_find.png" alt="find_img"></button>
            
             
        </form>
        </div> 
                
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
            
            
                <div class="post_button">
                    <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전 체</a>
                    <?php if (element('write_url', element('list', $view))) { ?>
                    <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm" >글 쓰 기</a>
                    <?php } ?>
                     <?php if (element('is_admin', $view)) { ?>
                    <a href="javascript:;" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?'); return false;" class="btn btn-success btn-sm">선택삭제</a>
                    <?php } ?>
                </div>
            
        <div><?php echo element('paging', element('list', $view)); ?></div>
    </section>
    <span class='bar'></span>
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
