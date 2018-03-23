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
        <div class='post_table pt20 '>

        
        
        <?php
        $i = 0;
        if (element('list', element('data', $view))) {
            foreach (element('list', element('data', $view)) as $result) {
        ?>
            <div class="table-box">
                <div class="table-heading" id="heading_<?php echo $i; ?>" onclick="return faq_open(this);">
                    <?php echo element('title', $result); ?>
                </div>
                <div class="table-answer answer" id="answer_<?php echo $i; ?>">
                    <?php echo element('content', $result); ?>
                </div>
            </div>
        <?php
                $i++;
            }
        }
        if ( ! element('list', element('data', $view))) {
        ?>
            <div class="table-answer nopost">내용이 없습니다</div>
        <?php
        }
        ?>
        </div>
        <div class="post_sear">
        <form class="navbar-form navbar-right pull-right" action="<?php echo current_url(); ?>" onSubmit="return faqSearch(this)">
            <select class="normal_font" name="sfield">
                <option value="faq_both" <?php echo ($this->input->get('sfield') === 'faq_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                <option value="faq_title" <?php echo ($this->input->get('sfield') === 'faq_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                <option value="faq_content" <?php echo ($this->input->get('sfield') === 'faq_content') ? ' selected="selected" ' : ''; ?>>내용</option>
                
            </select>
            <input type="text" class="" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
            <button class="find_img" type="submit"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/search_find.png" alt="find_img"></button>
            <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm pull-right">전체</a>
        </form>
        <script type="text/javascript">
        //<![CDATA[
        function faqSearch(f) {
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
        </div> 
    <div><?php echo element('paging', $view); ?></div>
    </section>
    
</article>
<?php
if ($this->member->is_admin() === 'super') {
?>
    <div class="text-center mb20">
        <a href="<?php echo admin_url('page/faq'); ?>?fgr_id=<?php echo element('fgr_id', element('faqgroup', $view)); ?>" class="btn btn-black btn-sm" target="_blank" title="FAQ 수정">FAQ 수정</a>
    </div>
<?php
}
?>
<script type="text/javascript">
//<![CDATA[
function faq_open(el)
{
    var $con = $(el).closest('.table-box').find('.answer');

    if ($con.is(':visible')) {
        $con.slideUp();
    } else {
        $('.answer:visible').css('display', 'none');
        $con.slideDown();

    }
    return false;
}
//]]>
</script>
