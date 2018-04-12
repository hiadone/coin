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
<article class="wrap01">
    <section class="main_title write_cont">
        <h2>
        <?php 
            if(element('brd_key', element('board', $view))==='live_news' && $this->input->get('post_notice')) echo '인기뉴스';
            else echo html_escape(element('board_name', element('board', $view)));

         ?>
        </h2>
        <?php echo show_alert_message($this->session->flashdata('message'), '<div class="alert-auto-close">', '</div>'); ?>
        <div class="board">
            <h3 class="post-view"><?php echo html_escape(element('post_title', element('post', $view))); ?></h3>
            <b class="middle_font">댓 글 <span>[ <?php echo number_format(element('post_comment_count', element('post', $view))); ?> 개 ]</span></b>
            <table class="small_font post-view">
                <tr>
                    <td>조회수 : <?php echo number_format(element('post_hit', element('post', $view))); ?></td>
                    <td><?php echo element('display_datetime', element('post', $view)); ?></td>
                    <td><?php echo element('display_name', element('post', $view)); ?></td>
                </tr>
            </table>

    <script type="text/javascript">
        //<![CDATA[
        function file_download(link) {
            <?php if (element('point_filedownload', element('board', $view)) < 0) { ?>if ( ! confirm("파일을 다운로드 하시면 포인트가 차감(<?php echo number_format(element('point_filedownload', element('board', $view))); ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?")) { return; }<?php }?>
            document.location.href = link;
        }
        //]]>
    </script>

        <?php if (element('extra_content', $view)) { ?>
            <div class="table-box">
                <table class="table-body">
                    <tbody>
                    <?php foreach (element('extra_content', $view) as $key => $value) { ?>
                        <tr>
                            <th class="px150"><?php echo html_escape(element('display_name', $value)); ?></th>
                            <td><?php echo nl2br(html_escape(element('output', $value))); ?></td>
                        </tr>
                    <?php } ?>
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

             <?php if (element('link_count', $view) > 0 OR element('file_download_count', $view) > 0) { ?>
        <div>
            <table class="table-body" style='table-layout: fixed; font-weight: bold;'>
                <tbody>
                <?php
                if (element('file_download_count', $view) > 0) {
                    foreach (element('file_download', $view) as $key => $value) {
                ?>
                    <tr>
                        <td style='border-top: 0;'><i class="fa fa-download"></i> <a href="javascript:file_download('<?php echo element('download_link', $value); ?>')"><?php echo html_escape(element('pfi_originname', $value)); ?>(<?php echo byte_format(element('pfi_filesize', $value)); ?>)</a> </td>
                    </tr>
                <?php
                    }
                }
                if (element('link_count', $view) > 0) {
                    foreach (element('link', $view) as $key => $value) {
                ?>
                    <tr>
                        <td style='border-top: 0; padding:0;'><a style='width: 100%; display: inline-block; word-break: break-all;' href="<?php echo element('link_link', $value); ?>" target="_blank"><?php echo html_escape(element('pln_url', $value)); ?></a><!-- <span class="badge"><?php echo number_format(element('pln_hit', $value)); ?></span> -->
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
    <?php
        }
        
    ?>

        </div>
       
        <div class="border_button middle_font ">
        <div class="btn-group pull-left" role="group" aria-label="...">
            <?php if (element('modify_url', $view)) { ?>
                <a href="<?php echo element('modify_url', $view); ?>" class="btn-sm">수정</a>
            <?php } ?>
            <?php    if (element('delete_url', $view)) { ?>
                <a  class=" btn-sm btn-one-delete" data-one-delete-url="<?php echo element('delete_url', $view); ?>">삭제</a>
            <?php } ?>
                <!-- <a href="<?php echo element('list_url', $view); ?>" class="btn btn-default btn-sm">목록</a> -->
            
           
        </div>
        <?php if (element('write_url', $view)) { ?>
            <div class="pull-right middle_font">
                <a href="<?php echo element('write_url', $view); ?>" class="btn-sm">글 쓰 기</a>
            </div>
        <?php } ?>
        </div>
        </div>


    
   

   

   

   

    

   

    <?php
    if ( ! element('post_hide_comment', element('post', $view))) {
    ?>
        
    <?php
        $this->load->view(element('view_skin_path', $layout) . '/comment_write');
    }
    ?>
    <div id="viewcomment"></div>
    <ul class="middle_font post-view">
        <li><a href="<?php echo element('list_url', $view); ?>" class="">목 록</a></li>
        <?php if (element('prev_post', $view)) { ?>
            <li><a href="<?php echo element('url', element('prev_post', $view)); ?>" >◀ 이전글</a></li>
        <?php } ?>
        <?php if (element('next_post', $view)) { ?>
            <li><a href="<?php echo element('url', element('next_post', $view)); ?>" >다음글 ▶</a></li>
        <?php } ?>
        
    </ul>
</section>
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
client.on('ready', function( readyEvent ) {
    client.on('aftercopy', function( event ) {
        alert('게시글 주소가 복사되었습니다. \'Ctrl+V\'를 눌러 붙여넣기 해주세요.');
    });
});
//]]>
</script>
<?php
if (element('highlight_keyword', $view)) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#post-content').highlight([<?php echo element('highlight_keyword', $view);?>]);
//]]>
</script>
<?php } ?>
