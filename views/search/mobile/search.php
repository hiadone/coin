<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<article class="wrap01 ">
    <section class ="main_title search">
        <h2>검 색</h2>
        <form action="<?php echo current_url(); ?>" onSubmit="return checkSearch(this);" class="text-center">
            <div class="cate_sel">
                <select class="" name="sfield">
                    <option value="post_both" <?php echo $this->input->get('sfield') === 'post_both' ? 'selected="selected"' : ''; ?>>제목+내용</option>
                    <option value="post_title" <?php echo $this->input->get('sfield') === 'post_title' ? 'selected="selected"' : ''; ?>>제목</option>
                    <option value="post_content" <?php echo $this->input->get('sfield') === 'post_content' ? 'selected="selected"' : ''; ?>>내용</option>
                </select>
            
                <select class="" name="board_id">
                    <option value="">전체게시판</option>
                    <?php
                    if (element('boardlist', $view)) {
                        foreach (element('boardlist', $view) as $key => $value) {
                    ?>
                        <option value="<?php echo element('brd_id', $value); ?>" <?php echo element('brd_id', $value) === $this->input->get('board_id') ? 'selected="selected"' : ''; ?>><?php echo element('brd_name', $value); ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <input type="text" class="" name="skeyword" onfocus="this.placeholder=''" onblur="this.placeholder='검색어'" placeholder="검색어" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                <button type="submit" class="middle_font">검색</button>
            </div>
        </form>


    <div class="search_list" id="searchresult">
<?php


if (element('list', element('data', $view))) {
    foreach (element('list', element('data', $view)) as $lkey => $lval) {

        echo '<h3>'.element('brd_name',element($lkey,element('boardlist', $view))).'</h3>
            <ul>';
        foreach($lval as $key => $result){
?>
        
            <li>
            <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('post_title', $result)); ?>"><?php echo html_escape(element('post_title', $result)); ?><span><?php if (element('post_comment_count', $result)) { ?> [<?php echo element('post_comment_count', $result); ?>]<?php } ?></span>
                <table>
                    <tr>
                        <td colspan="2"><?php echo element('display_datetime', $result); ?></td>
                        <td colspan="2"><?php echo element('display_name', $result); ?></td>
                        <td colspan="2">조회수 : <?php echo number_format(element('post_hit', $result)); ?></td>
                    </tr>
                </table>
            </a>
            </li>
<?php
        }
    echo '</ul>';
    }
}
if ( ! element('list', element('data', $view))) {
?>
    <div class="media">
        <div class="media-body nopost">
            검색 결과가 없습니다
        </div>
    </div>
<?php
}
?>
    </div>
    <nav><?php echo element('paging', $view); ?></nav>
    </section>
</article>


<script type="text/javascript">
//<![CDATA[
function checkSearch(f) {
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
<?php if (element('highlight_keyword', $view) && 0) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#searchresult').highlight([<?php echo element('highlight_keyword', $view);?>]);
//]]>
</script>
<?php } ?>
