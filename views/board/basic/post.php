<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php    $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); ?>

<?php
if (element('syntax_highlighter', element('board', $view)) OR element('comment_syntax_highlighter', element('board', $view))) {
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shCore.css'));
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shThemeMidnight.css'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shCore.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushJScript.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushPhp.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushCss.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushXml.js'));
?>
    <script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf = '<?php echo base_url('assets/js/syntaxhighlighter/scripts/clipboard.swf'); ?>';
    var is_SyntaxHighlighter = true;
    SyntaxHighlighter.all();
    </script>
<?php } ?>


<?php echo element('headercontent', element('board', $view)); ?>

<article class="content02">
    <section class="post_head">
        <h4>
            <?php echo element('brd_name',element('board', $view)); ?>
        </h4>
    </section>
    
    <section class="post">
        <div class="post_title">
            <h3><?php echo html_escape(element('post_title', element('post', $view))); ?></h3>
            <?php echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>'); ?>
            <ul>
                <li><b>조 회 수</b> : <?php echo number_format(element('post_hit', element('post', $view))); ?></li>
                <li class='small_font'>|</li>
                <li><b>작 성 일</b> : <?php echo element('display_datetime', element('post', $view)); ?></li>
                <li class='small_font'>|</li>
                <li><b><?php echo element('display_name', element('post', $view)); ?></b></li>
                <li class='small_font'>|</li>
                <li><b>댓 글</b><span>[<?php echo number_format(element('post_comment_count', element('post', $view))); ?>]</span></li>
            </ul>
        </div>

        <span></span>
        
        <div class='post_area'>
            <?php if (element('link_count', $view) > 0 OR element('file_download_count', $view) > 0) { ?>
            <div class="table-box">
                <table class="table-body">
                    <tbody>
                    <?php
                    if (element('file_download_count', $view) > 0) {
                        foreach (element('file_download', $view) as $key => $value) {
                    ?>
                        <tr>
                            <td><i class="fa fa-download"></i> <a href="javascript:file_download('<?php echo element('download_link', $value); ?>')"><?php echo html_escape(element('pfi_originname', $value)); ?>(<?php echo byte_format(element('pfi_filesize', $value)); ?>)</a> <span class="time"><i class="fa fa-clock-o"></i> <?php echo display_datetime(element('pfi_datetime', $value), 'full'); ?></span><span class="badge"><?php echo number_format(element('pfi_download', $value)); ?></span></td>
                        </tr>
                    <?php
                        }
                    }
                    if (element('link_count', $view) > 0) {
                        foreach (element('link', $view) as $key => $value) {
                    ?>
                        <tr>
                            <td><i class="fa fa-link"></i> <a href="<?php echo element('link_link', $value); ?>" target="_blank"><?php echo html_escape(element('pln_url', $value)); ?></a><span class="badge"><?php echo number_format(element('pln_hit', $value)); ?></span>
                                <?php if (element('show_url_qrcode', element('board', $view))) { ?>
                                    <span class="url-qrcode"  data-qrcode-url="<?php echo urlencode(element('pln_url', $value)); ?>"><i class="fa fa-qrcode"></i></span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>

            <div class="contents-view">
                <div class="contents-view-img">
                <?php
                if (element('file_image', $view)) {
                    foreach (element('file_image', $view) as $key => $value) {
                ?>
                    <img src="<?php echo element('thumb_image_url', $value); ?>" alt="<?php echo html_escape(element('pfi_originname', $value)); ?>" title="<?php echo html_escape(element('pfi_originname', $value)); ?>" class="view_full_image" data-origin-image-url="<?php echo element('origin_image_url', $value); ?>" style="max-width:100%;" />
                <?php
                    }
                }
                ?>
                </div>

                <!-- 본문 내용 시작 -->
                <div id="post-content"><?php echo element('content', element('post', $view)); ?></div>
                <!-- 본문 내용 끝 -->
            </div>
        </div>
        
    </section>
    
    <section class='post_view'>
        <ul>
            <?php if (element('prev_post', $view)) { ?>
                <li><a href="<?php echo element('url', element('prev_post', $view)); ?>" class="">◀ 이전글</a></li>
                <li class='small_font'>|</li>
            <?php } ?>
            <?php if (element('next_post', $view)) { ?>
                <li><a href="<?php echo element('url', element('next_post', $view)); ?>" class="">다음글 ▶</a>
                <li class='small_font'>|</li>
            <?php } ?>
            <?php if (element('modify_url', $view)) { ?>
                <li><a href="<?php echo element('modify_url', $view); ?>" class="">수정</a></li>
                <li class='small_font'>|</li>
            <?php } ?>
            <?php    if (element('delete_url', $view)) { ?>
                <li><a class="btn-one-delete pointer" data-one-delete-url="<?php echo element('delete_url', $view); ?>">삭제</a></li>
                <li class='small_font'>|</li>
            <?php } ?>
            <li><a href="<?php echo element('list_url', $view); ?>" class="">목록</a></li>
        </ul>
    </section>

    <?php
    if ( ! element('post_hide_comment', element('post', $view))) {
    ?>
        <div id="viewcomment"></div>
    <?php
        $this->load->view(element('view_skin_path', $layout) . '/comment_write');
    }
    ?>
</article>

    


<?php echo element('footercontent', element('board', $view)); ?>

<?php if (element('target_blank', element('board', $view))) { ?>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
    $("#post-content a[href^='http']").attr('target', '_blank');
});
//]]>
</script>
<?php } ?>

<script type="text/javascript">
//<![CDATA[
var client = new ZeroClipboard($('.copy_post_url'));
client.on('ready', function(readyEvent) {
    client.on('aftercopy', function(event) {
        alert('게시글 주소가 복사되었습니다. \'Ctrl+V\'를 눌러 붙여넣기 해주세요.');
    });
});
//]]>
</script>
<?php
if (element('highlight_keyword', $view)) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js'));
?>
    <script type="text/javascript">
    //<![CDATA[
    $('#post-content').highlight([<?php echo element('highlight_keyword', $view);?>]);
    //]]>
    </script>
<?php } ?>
