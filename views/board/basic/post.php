<?php $this->managelayout->add_js('/assets/js/jquery-ui-timepicker-addon.js'); ?>
<?php $this->managelayout->add_css('/assets/css/jquery-ui-timepicker-addon.css'); ?>
<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<?php $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); ?>

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

<article class="content03">
    <section class="submenu ">
        <ul>
            <?php
            $menuhtml = '';
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                
                if (element(element(0,element('active',$menu)), $menu)) {
                    
                    foreach (element(element(0,element('active',$menu)),$menu) as $mkey => $mval) {

                        $menu_active='';
                    
                        
                        if(element(1,element('active',$menu)) === element('men_id',$mval))  $menu_active='class="menu_active"';

                        

                    
                        $slink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                        $menuhtml .= '<li '.$menu_active.'><a href="' . $slink . '" ' . element('men_custom', $mval);
                        if (element('men_target', $mval)) {
                            $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                        }
                        $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                        $menuhtml .= '<li>|</li>';
                    
                        
                    }
                    
                }
                
            }
            $menuhtml .= '</ul>';
                    
                
            
            echo $menuhtml;
            ?>

            
            
        </ul> 
    </section>

    <h4><a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" style="color: inherit;">
        <?php echo element('brd_key',element('board', $view)) ==='live_news' && $this->input->get('post_notice')==='4' ? '인기뉴스' : element('brd_name',element('board', $view)); ?>
        </a>
        <span class="small_font">비트코인에 관한 다양한 정보를 한번에 !!</span>

    </h4>
    
    <section class="post_title">
        <h3><?php echo html_escape(element('post_title', element('post', $view))); ?></h3>
        
        <ul>
            <li><b>조 회 수</b> : <?php echo number_format(element('post_hit', element('post', $view))); ?></li>
            <li class='small_font'>|</li>
            <li><b>작 성 일</b> : <?php echo element('display_datetime', element('post', $view)); ?></li>
            <li class='small_font'>|</li>
            <li><b><?php echo element('display_name', element('post', $view)); ?></b></li>
            <li class='small_font'>|</li>
            <li><b>댓 글</b><span>[<?php echo number_format(element('post_comment_count', element('post', $view))); ?>]</span></li>
        </ul>
        
    </section>
    <?php echo show_alert_message($this->session->flashdata('message'), '<div style="width:1150px; margin:20px auto 0" class="alert alert-auto-close alert-dismissible alert-info">', '</div>'); ?>
    <span></span>

   

    <section class='post_area'>
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
        </div>

         <?php if (element('link_count', $view) > 0 OR element('file_download_count', $view) > 0) { ?>
        <div class='post_link' style="margin-top: 20px;">
            <?php
            if (element('file_download_count', $view) > 0) {
                foreach (element('file_download', $view) as $key => $value) {
                    ?>
                    <p>
                       <i class="fa fa-download"></i> <a href="javascript:file_download('<?php echo element('download_link', $value); ?>')"><?php echo html_escape(element('pfi_originname', $value)); ?>(<?php echo byte_format(element('pfi_filesize', $value)); ?>)</a> 
                   </p>
                   <?php
               }
           }
            if (element('link_count', $view) > 0) {
                foreach (element('link', $view) as $key => $value) {
                ?>
                    <p>
                        <i class="fa fa-link"></i> <a href="<?php echo element('link_link', $value); ?>" target="_blank"><?php echo html_escape(element('pln_url', $value)); ?></a>
                        <?php if (element('show_url_qrcode', element('board', $view))) { ?>
                        <span class="url-qrcode"  data-qrcode-url="<?php echo urlencode(element('pln_url', $value)); ?>"><i class="fa fa-qrcode"></i></span>
                        <?php } ?>

                    </p>
                <?php
                }
            }
            ?>
        </div>
        <?php } ?>
    </section>
    
    
    
     <script type="text/javascript">
    //<![CDATA[
    function file_download(link) {
        <?php if (element('point_filedownload', element('board', $view)) < 0) { ?>if ( ! confirm("파일을 다운로드 하시면 포인트가 차감(<?php echo number_format(element('point_filedownload', element('board', $view))); ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?")) { return; }<?php }?>
        document.location.href = link;
    }
    //]]>
    </script>

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
                <?php if (element('is_move', $view)) { ?>
                    
                    <li><a href="javascript:post_copy('move', '<?php echo element('post_id', element('post', $view)); ?>');"><i class="fa fa-arrow-right"></i> 이동하기</a></li>
                    <li class='small_font'>|</li>
                    <?php } ?>
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

$('.datetimepicker').datetimepicker({
    dateFormat:'yy-mm-dd',
    monthNamesShort:[ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ],
    dayNamesMin:[ '일', '월', '화', '수', '목', '금', '토' ],
    changeMonth:true,
    changeYear:true,
    showMonthAfterYear:true,

    // timepicker 설정
    timeFormat:'HH:mm',
    controlType:'select',
    oneLine:true,
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

