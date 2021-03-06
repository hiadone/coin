<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>
<div class="foot_padding">
        <!-- 뉴스 -->
    <section class="main_title wrap_con">
        <h2><?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?></h3>
        <?php if ( ! element('access_list', element('board', element('list', $view))) && element('use_rss_feed', element('board', element('list', $view)))) { ?>
            <a href="<?php echo rss_url(element('brd_key', element('board', element('list', $view)))); ?>" class="btn btn-default btn-sm" title="<?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?> RSS 보기"><i class="fa fa-rss"></i></a>
        <?php } ?>

        
        
        


        <section class="tab10 wrap_con">
            <div class='search'>
                
                <form name='frm' class="" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
                    <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                    <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                    <input type="hidden" name="brd_key" value="<?php echo element('brd_key', element('board', element('list', $view))) ?>" />
                    
                
                    
                    <select class="" name="sfield">
                        <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                        <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                        <option value="post_nickname" <?php echo ($this->input->get('sfield') === 'post_nickname') ? ' selected="selected" ' : ''; ?>>닉네임</option>
                        
                    </select>
                    <input type="text" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                    <button type="submit"  style="width: 25px;"><i class="fa fa-search"></i></button>
                    <button type="button" ><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=" style="color:inherit;">전 체</a></button>
                    
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
        
        
        
    
    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>

    <?php if (element('is_admin', $view)) { ?>
        <div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
    <?php } ?>

    <div class="table-image">
    <?php
    $i = 0;
    $open = false;
    $cols = element('gallery_cols', element('board', element('list', $view)));
    if (element('list', element('data', element('list', $view)))) {
        foreach (element('list', element('data', element('list', $view))) as $result) {
            if ($cols && $i % $cols === 0) {
                echo '<ul class="tab10_list">';
                $open = true;
            }
            $marginright = (($i+1)% $cols === 0) ? 0 : 2;

            if($i > 5 ) break;
    ?>
        <li class="gallery-box" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
            <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
            
                <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>">
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
                    <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class=" " style="width:<?php echo element('gallery_image_width', element('board', element('list', $view))) ? element('gallery_image_width', element('board', element('list', $view))).'px':'100%'; ?>;height:<?php echo element('gallery_image_height', element('board', element('list', $view))) ? element('gallery_image_height', element('board', element('list', $view))).'px' : '100%'; ?>;margin-bottom:-4px;" />
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
        </div>

        <div><?php echo element('paging', element('list', $view)); ?></div>
    <?php echo form_close(); ?>
    
    
    
    </section>
    <div class="border_button" style="background: #fff">
            <div class="pull-left mg10">
                <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-info btn-sm">목 록</a>
                <?php if (element('search_list_url', element('list', $view))) { ?>
                    <!-- <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a> -->
                <?php } ?>
            </div>
            <?php if (element('is_admin', $view)) { ?>
                <div class="pull-left mg10">
                        <div  onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');" class="btn btn-danger btn-sm">선택삭제하기</div>
                </div>
            <?php } ?>
            <?php if (element('write_url', element('list', $view))) { ?>
                <div class="pull-right mg10">
                    <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
                </div>
            <?php } ?>
    </div>
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
