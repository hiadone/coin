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

            
            <li class="submenu_arrow"></li>
        </ul>
        
    </section>



<section class='post_list'>
    <div class='post_table'>
    

    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>

        <?php if (element('is_admin', $view)) { ?>
            <div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
        <?php } ?>

        <?php
        if (element('notice_list', element('list', $view))) {
        ?>
            <table class="table table-hover">
                <tbody>
                <?php
                foreach (element('notice_list', element('list', $view)) as $result) {
                ?>
                    <tr>
                        <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                        <td><span class="label label-primary">공지</span></td>
                        <td>
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
                            <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                            <?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
                            <?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
                            <?php    if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
                            <?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
                        <td><?php echo element('display_name', $result); ?></td>
                        <td><?php echo element('display_datetime', $result); ?></td>
                        <td><?php echo number_format(element('post_hit', $result)); ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        <?php
        }
        ?>

        <div class="table-image">
            <?php
            $i = 0;
            $open = false;
            $cols = element('gallery_cols', element('board', element('list', $view)));
            if (element('list', element('data', element('list', $view)))) {
                foreach (element('list', element('data', element('list', $view))) as $result) {
                    if ($cols && $i % $cols === 0) {
                        echo '<ul class="mt20">';
                        $open = true;
                    }
                    $marginright = (($i+1)% $cols === 0) ? 0 : 2;
            ?>
                <li class="gallery-box" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
                <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
                <span class="label label-default"><?php echo element('num', $result); ?></span>
                <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                <?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
                <?php    if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
                <div>
                    <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>"><img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class="thumbnail img-responsive" style="width:<?php echo element('gallery_image_width', element('board', element('list', $view))); ?>px;height:<?php echo element('gallery_image_height', element('board', element('list', $view))); ?>px;" /></a>
                </div>
                <p>
                    <?php if (element('post_reply', $result)) { ?><span class="label label-primary">Re</span><?php } ?>
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
                </p>
                <p>
                    <?php echo element('display_name', $result); ?>
                    <?php //echo element('display_datetime', $result); ?>
                    <?php if (element('is_hot', $result)) { ?><span class="label label-danger">Hot</span><?php } ?>
                    <?php if (element('is_new', $result)) { ?><span class="label label-warning">New</span><?php } ?>
                    <?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
                    <?php if (element('post_comment_count', $result)) { ?><span class="comment-count"><i class="fa fa-comments"></i><?php echo element('post_comment_count', $result); ?></span><?php } ?>
                    <span class="hit-count"><i class="fa fa-eye"></i> <?php echo number_format(element('post_hit', $result)); ?></span>
                </p>
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
            <button class="find_img" type="submit"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/search_find.png" alt="find_img"></button>
            <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm pull-right">전체</a>
            <?php if (element('is_admin', $view)) { ?>
            <div class="btn btn-default btn-sm pull-right" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');">선택삭제</div>
            <?php } ?>
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
            
            <?php if (element('write_url', element('list', $view))) { ?>
                <div class="post_button">
                    <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글 쓰 기</a>
                </div>
            <?php } ?>
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
