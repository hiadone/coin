<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<article class="wrap01">
        <section class="main_title serv">
            <h2><?php echo element('fgr_title', element('faqgroup', $view)); ?></h2>
            <form class="search_box text-center mb20" action="<?php echo current_url(); ?>" onSubmit="return faqSearch(this)">
                <input type="text" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" class="input" placeholder="Search" />
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                <button class="btn btn-info" type="button" onClick="location.href='<?php echo current_full_url() ?>';">전체보기</button>
                
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

<?php
$i = 0;
if (element('list', element('data', $view))) {
    echo '<ul>';
    foreach (element('list', element('data', $view)) as $result) {

?>
    <li class="serv-box">
        <div class="serv_title" id="heading_<?php echo $i; ?>" onclick="return faq_open(this);">
           <h3><?php echo element('title', $result); ?></h3>
           <div class="text-center" >▼</div>
            <table class="small_font">
                <tr>
                    <td><?php echo element('display_datetime', $result); ?></td>
                    <td><?php echo element('display_name', $result); ?></td>
                </tr>
            </table>
            
        </div>
        <div class="serv_cont answer" id="answer_<?php echo $i; ?>">
            <p><?php echo element('content', $result); ?></p>
        </div>
    </li>
<?php
        $i++;
    }
    echo '</ul>';
}
if ( ! element('list', element('data', $view))) {
?>
    <div class="table-answer nopost">내용이 없습니다</div>
<?php
}
?>
    <nav><?php echo element('paging', $view); ?></nav>
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
    var $con = $(el).closest('.serv-box').find('.answer');

    if ($con.is(':visible')) {
        $con.slideUp();
        $(el).find('.text-center').html('▼');
    } else {
        $('.answer:visible').css('display', 'none');
        $con.slideDown();
        $(el).find('.text-center').html('▲');
    }
    return false;
}
//]]>
</script>
