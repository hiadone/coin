<?php $this->managelayout->add_js('/assets/js/jquery-ui-timepicker-addon.js'); ?>
<?php $this->managelayout->add_css('/assets/css/jquery-ui-timepicker-addon.css'); ?>
<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>



<?php echo element('headercontent', element('board', $view)); ?>

<article class="content04">
    
        <h4><a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" style="color: inherit;">
            <?php echo html_escape(element('board_name', element('board', $view))); ?> 글쓰기
            <span class="small_font">비트코인에 관한 다양한 정보를 한번에 !!</span>
            </a>
        </h4>
    

<section class="cont_write">
    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onsubmit' => 'return submitContents(this)');
    echo form_open_multipart(current_full_url(), $attributes);
    ?>
        <input type="hidden" name="<?php echo element('primary_key', $view); ?>"    value="<?php echo element(element('primary_key', $view), element('post', $view)); ?>" />

        <table>
                <?php if (element('is_post_name', element('post', $view)) || $this->member->is_admin() === 'super') { ?>
                    <tr>
                        <th class='nomal_font02'>이름</th>
                        <td ><input type="text" class="input" style="width:200px" name="post_nickname" id="post_nickname" value="<?php echo set_value('post_nickname', element('post_nickname', element('post', $view))); ?>" />
                        </td>
                        <th class='nomal_font02'>등급</th>
                        <td><input type="text" class="input" style="width:200px" name="display_level" id="display_level" value="<?php echo set_value('display_level', element('display_level', element('post', $view))); ?>" /></td>
                    </tr>
                    <?php if ($this->member->is_member() === false) { ?>
                        <tr>
                            <th class='nomal_font02'>비밀번호</th>
                            <td colspan="3"><input type="password" class="input px150" name="post_password" id="post_password" /></td>
                        </tr>
                    <?php } ?>
                   <!-- <tr>
                        <th class='nomal_font02'>이메일</th>
                        <td colspan="3"><input type="text" class="input px400" name="post_email" id="post_email" value="<?php echo set_value('post_email', element('post_email', element('post', $view))); ?>" /></td>
                    </tr>
                    <tr>
                        <th class='nomal_font02'>홈페이지</th>
                        <td colspan="3"><input type="text" class="input px400" name="post_homepage" id="post_homepage" value="<?php echo set_value('post_homepage', element('post_homepage', element('post', $view))); ?>" /></td>
                    </tr> -->
                <?php } ?>
                <tr>
                    <th class='nomal_font02'>제목</th>
                    <td colspan="3">
                        <input type="text" class="" name="post_title" id="post_title" value="<?php echo set_value('post_title', element('post_title', element('post', $view))); ?>" />
                        <span class='small_font'>*최대 50글자 까지 입력 가능합니다.*</span>
                    </td>
                </tr>
                
                <?php if (element('can_post_notice', element('post', $view)) OR element('can_post_secret', element('post', $view)) OR element('can_post_receive_email', element('post', $view))) { ?>
                    <tr>
                        <th class='nomal_font02'>옵 션</th>
                        <td colspan="3">
                        <?php if (element('can_post_notice', element('post', $view))) { ?>
                            <label class="checkbox-inline" for="post_notice_1">
                                <input type="checkbox" name="post_notice" id="post_notice_1" value="1" <?php echo set_checkbox('post_notice', '1', (element('post_notice', element('post', $view)) === '1' ? true : false)); ?> onChange="if (this.checked) {$('#post_notice_2').prop('disabled', true);} else {$('#post_notice_2').prop('disabled', false);}" <?php if (element('post_notice', element('post', $view)) === '2')echo "disabled='disabled'"; ?> /> 공지
                            </label>
                            <label class="checkbox-inline" for="post_notice_2">
                                <input type="checkbox" name="post_notice" id="post_notice_2" value="2" <?php echo set_checkbox('post_notice', '2', (element('post_notice', element('post', $view)) === '2' ? true : false)); ?> onChange="if (this.checked) {$('#post_notice_1').prop('disabled', true);} else {$('#post_notice_1').prop('disabled', false);}" <?php if (element('post_notice', element('post', $view)) === '1')echo "disabled='disabled'"; ?> /> 전체공지
                            </label>
                        <?php } ?>
                        <?php if(element('brd_id', element('post', $view))==="5" || element('brd_id', element('post', $view))==="16"){ ?>
                            <label class="checkbox-inline" for="post_notice_3">
                                <input type="checkbox" name="post_notice" id="post_notice_3" value="3" <?php echo set_checkbox('post_notice', '3', (element('post_notice', element('post', $view)) === '3' ? true : false)); ?> /> 해드라인
                            </label>
                            <label class="checkbox-inline" for="post_notice_4">
                                <input type="checkbox" name="post_notice" id="post_notice_4" value="4" <?php echo set_checkbox('post_notice', '4', (element('post_notice', element('post', $view)) === '4' ? true : false)); ?>  /> 인기뉴스
                            </label>
                            <label class="checkbox-inline" for="post_notice_5">
                                <input type="checkbox" name="post_notice" id="post_notice_5" value="5" <?php echo set_checkbox('post_notice', '5', (element('post_notice', element('post', $view)) === '5' ? true : false)); ?>  /> 인기+해드 
                            </label>
                        <?php } ?>
                        <?php if (element('can_post_secret', element('post', $view))) { ?>
                            <label class="checkbox-inline" for="post_secret">
                                <input type="checkbox" name="post_secret" id="post_secret" value="1" <?php echo set_checkbox('post_secret', '1', (element('post_secret', element('post', $view)) ? true : false)); ?> /> 비밀글
                            </label>
                        <?php } ?>
                        <?php if (element('can_post_receive_email', element('post', $view))) { ?>
                            <label class="checkbox-inline" for="post_receive_email">
                                <input type="checkbox" name="post_receive_email" id="post_receive_email" value="1" <?php echo set_checkbox('post_receive_email', '1', (element('post_receive_email', element('post', $view)) ? true : false)); ?> /> 답변메일받기
                            </label>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <th class='nomal_font02'>닉 네 임</th>
                    <td><?php echo $this->member->item('mem_nickname') ?></td>
                    <th class='nomal_font02'>작성일</th>
                    <td><?php echo element('post_datetime', element('post', $view)) ? element('post_datetime', element('post', $view)) : date('Y.m.d') ?></td>
                </tr>
                <?php
                if (element('extra_content', $view)) {
                    foreach (element('extra_content', $view) as $key => $value) {
                ?>
                    <tr>
                        <th class='nomal_font02'>
                            <?php echo element('display_name', $value); ?>
                        </th>
                        <td colspan="3">
                            <?php echo element('input', $value); ?>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
                <?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>
                    <div class="well well-sm" style="margin-bottom:15px;">
                        현재 <strong><span id="char_count">0</span></strong> 글자이며,
                        <?php if (element('post_min_length', element('board', $view))) { ?>
                            최소 <strong><?php echo number_format(element('post_min_length', element('board', $view))); ?></strong> 글자 이상
                        <?php } if (element('post_max_length', element('board', $view))) { ?>
                            최대 <strong><?php echo number_format(element('post_max_length', element('board', $view))); ?></strong> 글자 이하
                        <?php } ?>
                        입력하실 수 있습니다.
                    </div>
                <?php } ?>
                <tr>
                    <th class='nomal_font02'>내 용</th>
                    <?php if ( ! element('use_dhtml', element('board', $view))) { ?>
                        <div class="btn-group pull-right mb10">
                            <?php if (element('use_emoticon', element('board', $view))) { ?>
                                <button type="button" class="btn btn-default btn-sm" onclick="window.open('<?php echo site_url('helptool/emoticon?id=post_content'); ?>', 'emoticon', 'width=600,height=400,scrollbars=yes')"><i class="fa fa-smile-o fa-lg"></i></button>
                            <?php } ?>
                            <?php if (element('use_specialchars', element('board', $view))) { ?>
                                <button type="button" class="btn btn-default btn-sm" onclick="window.open('<?php echo site_url('helptool/specialchars?id=post_content'); ?>', 'specialchars', 'width=490,height=245,scrollbars=yes')"><i class="fa fa-star-o fa-lg"></i></button>
                            <?php } ?>
                            <button type="button" class="btn btn-default btn-sm" onClick="resize_textarea('post_content', 'down');"><i class="fa fa-plus fa-lg"></i></button>
                            <button type="button" class="btn btn-default btn-sm" onClick="resize_textarea('post_content', 'up');"><i class="fa fa-minus fa-lg"></i></button>
                        </div>
                    <?php } ?>
                    <td colspan="3" style='padding:0; padding-bottom: 10px;'>
                    <?php echo display_dhtml_editor('post_content', set_value('post_content', element('post_content', element('post', $view))), $classname = 'dhtmleditor', $is_dhtml_editor = element('use_dhtml', element('board', $view)), $editor_type = $this->cbconfig->item('post_editor_type')); ?>
                    </td>
                </tr>
                
                <?php
                if (element('link_count', element('board', $view)) > 0) {
                    echo "<tr>
                    <th class='nomal_font02'>링 크(URL)</th>
                    <td colspan='3'>
                        <ul class='link_li'>";
                    $link_count = element('link_count', element('board', $view));
                    for ($i = 0; $i < $link_count; $i++) {
                        $link = html_escape(element('pln_url', element($i, element('link', $view))));
                        $link_column = $link ? 'post_link_update[' . element('pln_id', element($i, element('link', $view))) . ']' : 'post_link[' . $i . ']';
                ?>
                        <li><label>링크 #<?php echo $i+1; ?></label><input type="text"  name="<?php echo $link_column; ?>" value="<?php echo set_value($link_column, $link); ?>" /></li>
                    
                <?php
                    }
                    echo '</ul>
                    </td>
                </tr>';
                }
                ?>
                        

                <?php
                if (element('use_upload', element('board', $view))) {
                    echo "<tr>
                    <th class='nomal_font02'>첨부파일</th>
                    <td colspan='3'>
                        <ul class='upload_li'>";
                    $file_count = element('upload_file_count', element('board', $view));
                    for ($i = 0; $i < $file_count; $i++) {
                        $download_link = html_escape(element('download_link', element($i, element('file', $view))));
                        $file_column = $download_link ? 'post_file_update[' . element('pfi_id', element($i, element('file', $view))) . ']' : 'post_file[' . $i . ']';
                        $del_column = $download_link ? 'post_file_del[' . element('pfi_id', element($i, element('file', $view))) . ']' : '';
                ?>
                    <li>
                        <div class='upload_btn' >
                            <input class="file" value="선택된 파일이 없습니다." disabled="disabled">
                            <input type="file"  name="<?php echo $file_column; ?>" />
                            <label for="input_file" class="pointer">업 로 드</label>
                        </div>
                        <?php if ($download_link) { ?>
                            <div class='upload_clear'>
                            <a href="<?php echo $download_link; ?>"><?php echo html_escape(element('pfi_originname', element($i, element('file', $view)))); ?></a>
                            <label for="<?php echo $del_column; ?>">
                                <input type="checkbox" name="<?php echo $del_column; ?>" id="<?php echo $del_column; ?>" value="1" <?php echo set_checkbox($del_column, '1'); ?> /> 삭 제
                            </label>
                            </div>
                        <?php } ?>
                    </li>
                <?php
                    }
                    echo '</ul>
                    </td>
                </tr>';
                }
                ?>
            </table>
            <p class='small_font'>
                - 그림파일은 .gif , .jpg , .png 만 가능 <br>
                - 파일 업로드는 1M 까지만 가능
            </p>
                <?php if ($this->member->is_member() === false) { ?>
                    <div class="well text-center mt20">
                        <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
                            <div class="captcha" id="recaptcha"><button type="button" id="captcha"></button></div>
                            <input type="hidden" name="recaptcha" />
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/images/preload.png'); ?>" width="160" height="40" id="captcha" alt="captcha" title="captcha" />
                            <input type="text" class="input col-md-4" id="captcha_key" name="captcha_key" />
                            자동등록방지 숫자를 순서대로 입력하세요.
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="post_button">
                    <button style='margin-right: 5px;' type="submit" class="">작 성 완 료</button>
                    <button type="button" class="btn-history-back">취 소</button>
                </div>
            
    <?php echo form_close(); ?>
    </section>
</article>

<?php echo element('footercontent', element('board', $view)); ?>


<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?php echo element('post_min_length', element('board', $view)) + 0; ?>); // 최소
var char_max = parseInt(<?php echo element('post_max_length', element('board', $view)) + 0; ?>); // 최대

<?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>

check_byte('post_content', 'char_count');
$(function() {
    $('#post_content').on('keyup', function() {
        check_byte('post_content', 'char_count');
    });
});
<?php } ?>

function submitContents(f) {
    if ($('#char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte('post_content', 'char_count'));
            if (char_min > 0 && char_min > cnt) {
                alert('내용은 ' + char_min + '글자 이상 쓰셔야 합니다.');
                $('#post_content').focus();
                return false;
            } else if (char_max > 0 && char_max < cnt) {
                alert('내용은 ' + char_max + '글자 이하로 쓰셔야 합니다.');
                $('#post_content').focus();
                return false;
            }
        }
    }
    var title = '';
    var content = '';
    $.ajax({
        url: cb_url + '/postact/filter_spam_keyword',
        type: 'POST',
        data: {
            title: f.post_title.value,
            content: f.post_content.value,
            csrf_test_name : cb_csrf_hash
        },
        dataType: 'json',
        async: false,
        cache: false,
        success: function(data) {
            title = data.title;
            content = data.content;
        }
    });

    if (title) {
        alert('제목에 금지단어(\'' + title + '\')가 포함되어있습니다');
        f.post_title.focus();
        return false;
    }
    if (content) {
        alert('내용에 금지단어(\'' + content + '\')가 포함되어있습니다');
        f.post_content.focus();
        return false;
    }
}
</script>

<?php
if (element('is_post_name', element('post', $view))) {
    if ($this->cbconfig->item('use_recaptcha')) {
        $this->managelayout->add_js(base_url('assets/js/recaptcha.js'));
    } else {
        $this->managelayout->add_js(base_url('assets/js/captcha.js'));
    }
}
?>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fwrite').validate({
        rules: {
            post_title: {required :true, minlength:2},
            post_content : {<?php echo (element('use_dhtml', element('board', $view))) ? 'required_' . $this->cbconfig->item('post_editor_type') : 'required'; ?> : true }
        <?php if (element('is_post_name', element('post', $view))) { ?>
            , post_nickname: {required :true, minlength:2, maxlength:20}
            , post_email: {required :true, email:true}
        <?php } ?>
        <?php if ($this->member->is_member() === false) { ?>
            , post_password: {required :true, minlength:4, maxlength:100}
        <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
            , recaptcha : {recaptchaKey:true}
        <?php } else { ?>
            , captcha_key : {required: true, captchaKey:true}
        <?php } ?>
        <?php } ?>
        <?php if (element('use_category', element('board', $view))) { ?>
            , post_category : {required: true}
        <?php } ?>
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});

<?php if (element('has_tempsave', $view)) { ?>get_tempsave(cb_board); <?php } ?>
<?php if ( ! element('post_id', element('post', $view))) { ?>window.onbeforeunload = function () { auto_tempsave(cb_board); } <?php } ?>


    var fileTarget = $(".upload_btn input[type='file']");

    fileTarget.on('change', function(){
        if(window.FileReader){
                    // 파일명 추출
                    var filename = $(this)[0].files[0].name;
                }else {
                    // Old IE 파일명 추출
                    var filename = $(this).val().split('/').pop().split('\\').pop();
                };

                $(this).siblings('.upload_btn input.file').val(filename);
                
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
