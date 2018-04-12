<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php echo element('headercontent', element('board', $view)); ?>

<article class="wrap01">
    <section class="main_title write_area">
        <h2><?php echo html_escape(element('board_name', element('board', $view))); ?></h2>
        <!-- 제목 입력 영역 -->
            <div class="text_area">
            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>');
            $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onsubmit' => 'return submitContents(this)');
            echo form_open_multipart(current_full_url(), $attributes);
            ?>
            <?php if (element('is_post_name', element('post', $view))) { ?>
               
                        <input type="hidden"  name="post_nickname" id="post_nickname" value="<?php echo set_value('post_nickname', element('post_nickname', element('post', $view))); ?>" />

                
               
                        <input type="hidden" name="post_email" id="post_email" value="<?php echo set_value('post_email', element('post_email', element('post', $view))); ?>" />
                    
                
            <?php } ?>
            <input type="hidden" name="<?php echo element('primary_key', $view); ?>"    value="<?php echo element(element('primary_key', $view), element('post', $view)); ?>" />
           
               
                    <label class="middle_font">제 목</label>
                    <input type="text" name="post_title" id="post_title" value="<?php echo set_value('post_title', element('post_title', element('post', $view))); ?>" placeholder="제목을 입력 해주세요" onfocus="this.placeholder=''" maxlength="40" onblur="this.placeholder='제목을 입력 해주세요'">
                    <?php if (element('use_google_map', element('board', $view))) { ?>
                        <span class="map_btn">
                            <button type="button" class="btn btn-sm btn-default" id="btn_google_map" onClick="open_google_map();" >지도</button>
                        </span>
                    <?php } ?>

        <?php if (element('can_post_notice', element('post', $view)) OR element('can_post_secret', element('post', $view)) OR element(' can_post_receive_email', element('post', $view))) { ?>

        <div class="option_area">
            <!-- <label class="middle_font">옵 션</label> -->
            <ul>
                
                <?php if (element('can_post_notice', element('post', $view))) { ?>

                    <li style="width: 45px;">
                        <label class="checkbox-inline middle_font" for="post_notice_1">
                             공지
                        </label>
                        <input type="checkbox" name="post_notice" id="post_notice_1" value="1" <?php echo set_checkbox('post_notice', '1', (element('post_notice', element('post', $view)) === '1' ? true : false)); ?> onChange="if (this.checked) {$('#post_notice_2').prop('disabled', true);} else {$('#post_notice_2').prop('disabled', false);}" <?php if (element('post_notice', element('post', $view)) === '2')echo "disabled='disabled'"; ?> />
                    </li>



                    <li style="width: 66px;">
                        <label class="checkbox-inline middle_font" for="post_notice_2">
                            전체공지
                        </label>

                         <input type="checkbox" name="post_notice" id="post_notice_2" value="2" <?php echo set_checkbox('post_notice', '2', (element('post_notice', element('post', $view)) === '2' ? true : false)); ?> onChange="if (this.checked) {$('#post_notice_1').prop('disabled', true);} else {$('#post_notice_1').prop('disabled', false);}" <?php if (element('post_notice', element('post', $view)) === '1')echo "disabled='disabled'"; ?> />
                    </li>
                    
                    <?php if(element('brd_id', element('post', $view))==="5" || element('brd_id', element('post', $view))==="16"){ ?>
                    <li style="width: 66px;">
                        <label class="checkbox-inline middle_font" for="post_notice_3"> 해드라인</label>
                   
                        <input type="checkbox" name="post_notice" id="post_notice_3" value="3" <?php echo set_checkbox('post_notice', '3', (element('post_notice', element('post', $view)) === '3' ? true : false)); ?> />
                        
                    </li>
                    <li style="width: 66px;">
                        <label class="checkbox-inline middle_font" for="post_notice_4">인기뉴스</label>
                   
                        <input type="checkbox" name="post_notice" id="post_notice_4" value="4" <?php echo set_checkbox('post_notice', '4', (element('post_notice', element('post', $view)) === '4' ? true : false)); ?> /> 
                        
                    </li>

                     <li style="width: 66px;">
                        <label class="checkbox-inline middle_font" for="post_notice_5">인기+해드</label>
                   
                        <input type="checkbox" name="post_notice" id="post_notice_5" value="5" <?php echo set_checkbox('post_notice', '5', (element('post_notice', element('post', $view)) === '5' ? true : false)); ?> /> 
                        
                    </li>
                    <?php } ?>


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
            </ul>
        </div>

        <?php } ?>
        <?php if (element('use_category', element('board', $view))) { ?>
            <li>
                <span>카테고리</span>
                <select name="post_category" class="input">
                    <option value="">카테고리선택</option>
                    <?php
                    $category = element('category', $view);
                    function ca_select($p = '', $category = '', $post_category = '')
                    {
                        $return = '';
                        if ($p && is_array($p)) {
                            foreach ($p as $result) {
                                $exp = explode('.', element('bca_key', $result));
                                $len = (element(1, $exp)) ? strlen(element(1, $exp)) : '0';
                                $space = str_repeat('-', $len);
                                $return .= '<option value="' . html_escape(element('bca_key', $result)) . '"';
                                if (element('bca_key', $result) === $post_category) {
                                    $return .= 'selected="selected"';
                                }
                                $return .= '>' . $space . html_escape(element('bca_value', $result)) . '</option>';
                                $parent = element('bca_key', $result);
                                $return .= ca_select(element($parent, $category), $category, $post_category);
                            }
                        }
                        return $return;
                    }

                    echo ca_select(element(0, $category), $category, element('post_category', element('post', $view)));
                    ?>
                </select>
            </li>
        <?php } ?>
        <?php
        if (element('extra_content', $view)) {
            echo '<div class="link_area">
                        <ul>';
            foreach (element('extra_content', $view) as $key => $value) {
        ?>
            <li>
                <label><?php echo element('display_name', $value); ?></label>
                <?php echo element('input', $value); ?>
            </li>
        <?php
            }
            echo '</ul></div>';
        }
        ?>
        
      

            <?php echo display_dhtml_editor('post_content', set_value('post_content', element('post_content', element('post', $view))), $classname = '', $is_dhtml_editor = element('use_dhtml', element('board', $view)), $editor_type = $this->cbconfig->item('post_editor_type')); ?>
            <?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>
            <span class="char_count">
                <?php if (element('post_min_length', element('board', $view))) { ?>
                    최소 <strong><?php echo number_format(element('post_min_length', element('board', $view))); ?></strong> 글자 이상
                <?php } if (element('post_max_length', element('board', $view))) { ?>
                    <span>/<strong><?php echo number_format(element('post_max_length', element('board', $view))); ?></strong></span>
                <?php } ?>
                <span id="char_count">0</span>
            </span>
        <?php } ?>
        </div>
        
        




            <?php
            if (element('link_count', element('board', $view)) > 0) {
                echo '<div class="link_area">
                        <ul>';
                $link_count = element('link_count', element('board', $view));
                for ($i = 0; $i < $link_count; $i++) {
                    $link = html_escape(element('pln_url', element($i, element('link', $view))));
                    $link_column = $link ? 'post_link_update[' . element('pln_id', element($i, element('link', $view))) . ']' : 'post_link[' . $i . ']';
            ?>
                    <li>
                        <label class="middle_font">링 크 0<?php echo $i+1; ?></label>
                        <input type="text" name="<?php echo $link_column; ?>" value="<?php echo set_value($link_column, $link); ?>" />

                    </li>


        <?php
            }
            echo '</ul></div>';
        }
        if (element('use_upload', element('board', $view))) {
            echo '<div class="upload_area">
                        <ul>';
            $file_count = element('upload_file_count', element('board', $view));
            for ($i = 0; $i < $file_count; $i++) {
                $download_link = html_escape(element('download_link', element($i, element('file', $view))));
                $file_column = $download_link ? 'post_file_update[' . element('pfi_id', element($i, element('file', $view))) . ']' : 'post_file[' . $i . ']';
                $del_column = $download_link ? 'post_file_del[' . element('pfi_id', element($i, element('file', $view))) . ']' : '';
        ?>     
        <?php if ($download_link) { ?>
            <li class="active del_file">
                    <label for="<?php echo $del_column; ?>">
                         삭제
                    </label>
                    
                    <input type="text" value="" disabled="disabled" class="middle_font"/ >
                    <a href="<?php echo $download_link; ?>"><?php echo html_escape(element('pfi_originname', element($i, element('file', $view)))); ?></a>
                    <input type="checkbox" name="<?php echo $del_column; ?>" id="<?php echo $del_column; ?>" value="1" <?php echo set_checkbox($del_column, '1'); ?> />
                    
            </li>
            <?php } ?>
                <li class="active">
                    <input type="text" value="선택된 파일이 없습니다." disabled="disabled" class="middle_font"/>
                    <input type="file" class="file_load" name="<?php echo $file_column; ?>" />
                    <label for="input_file" class="middle_font">
                        업 로 드
                    </label>
                    
                </li>
            
        <?php
            }
            echo '</ul>
            <span style="text-align:left; color: #5d5d5d;" class="small_font">
                    <!-- - 파일을 추가,삭제를 하시려면 좌측의 버튼을 클릭<br> -->
                    - 그림파일은 .gif,.jpg,.png만 가능<br>
                    - 파일 업로드는 1M 까지만 가능
            </span>

            </div>';
        }
        ?>
        
        <?php if (element('use_post_tag', element('board', $view)) && element('can_tag_write', element('board', $view))) { ?>
            <li>
                <span>태그</span>
                <input type="text" class="input per95" name="post_tag" id="post_tag" value="<?php echo set_value('post_tag', element('post_tag', element('post', $view))); ?>" />
                <div class="help-block">태그를 콤마(,)로 구분해 입력해주세요. 예) 자유,인기,질문</div>
            </li>
        <?php } ?>
        <?php
        if (element('can_poll_write', element('board', $view))) {
            $this->managelayout->add_css(base_url('assets/css/datepicker3.css'));
            $this->managelayout->add_js(base_url('assets/js/bootstrap-datepicker.js'));
            $this->managelayout->add_js(base_url('assets/js/bootstrap-datepicker.kr.js'));
        ?>
            <input type="hidden" name="ppo_id" value="<?php echo html_escape(element('ppo_id', element('poll', $view))); ?>" />
            <?php if ( ! element('poll_item', $view)) { ?>
                <li>
                    <span>설문</span>
                    <a href="javascript:;" onClick="$('.post_poll_area').slideToggle('slow');">여기를 클릭하셔서 설문을 등록하실 수 있습니다</a>
                </li>
            <?php } ?>
            <div class="post_poll_area" <?php if ( ! element('poll_item', $view)) { ?>style="display:none;" <?php } ?> >
                <li>
                    <span>설문기간</span>
                    기간 :
                    <input type="text" class="input datepicker " name="ppo_start_date" value="<?php echo (element('ppo_start_datetime', element('poll', $view)) >'0000-00-00 00:00:00') ? substr(element('ppo_start_datetime', element('poll', $view)),0,10) : ''; ?>" readonly="readonly" />
                    <select name="ppo_start_time" class="input">
                    <?php for ($i = 0; $i <24; $i++) {?>
                        <option value="<?php echo $i;?>" <?php echo (substr(element('ppo_start_datetime', element('poll', $view)),11,2) === sprintf("%02d", $i)) ? 'selected="selected"' : ''; ?>><?php echo $i;?>시</option>
                    <?php } ?>
                    </select>
                        ~
                    <input type="text" class="input datepicker" name="ppo_end_date" value="<?php echo (element('ppo_end_datetime', element('poll', $view)) >'0000-00-00 00:00:00') ? substr(element('ppo_end_datetime', element('poll', $view)),0,10) : ''; ?>" readonly="readonly" />
                    <select name="ppo_end_time" class="input">
                        <?php for ($i = 0; $i <24; $i++) {?>
                            <option value="<?php echo $i;?>" <?php echo (substr(element('ppo_end_datetime', element('poll', $view)),11,2) === sprintf("%02d", $i)) ? 'selected="selected"' : ''; ?>><?php echo $i;?>시</option>
                        <?php } ?>
                    </select>
                    <div class="help-block">기간을 입력하지 않으시면, 기간제한없이 참여 가능합니다</div>
                </li>
                <li>
                    <span>설문제목</span>
                    <input type="text" class="input" name="ppo_title" id="ppo_title" value="<?php echo set_value('ppo_title', element('ppo_title', element('poll', $view))); ?>" />
                </li>
                <li>
                    <span>답변 <a href="javascript:;" onClick="add_poll_item();">+</a></span>
                    <div class="poll_item_area">
                        <?php
                        if (element('poll_item', $view)) {
                            foreach (element('poll_item', $view) as $pikey => $pival) {
                        ?>
                            <input type="text" class="input" name="poll_item_update[<?php echo html_escape(element('ppi_id', $pival)); ?>]" value="<?php echo html_escape(element('ppi_item', $pival)); ?>" />
                        <?php
                            }
                        }
                        ?>
                        <input type="text" class="input" name="poll_item[]" value="" />
                        <input type="text" class="input" name="poll_item[]" value="" />
                        <input type="text" class="input" name="poll_item[]" value="" />
                    </div>
                </li>
                <li>
                    <span>설문옵션</span>
                    <select name="ppo_choose_count" class="input">
                    <?php for ($pcount= 1; $pcount<= 10; $pcount++) { ?>
                        <option value="<?php echo $pcount; ?>" <?php echo ((int) element('ppo_choose_count', element('poll', $view)) === $pcount) ? 'selected="selected"' : ''; ?>>답변 <?php echo $pcount; ?>개 선택 가능</option>
                    <?php } ?>
                    </select>
                    <label for="ppo_after_comment" class="checkbox-inline">
                        <input type="checkbox" name="ppo_after_comment" id="ppo_after_comment" value="1" <?php echo set_checkbox('ppo_after_comment', '1', (element('ppo_after_comment', element('poll', $view)) ? true : false)); ?> /> 댓글작성후참여가능
                    </label>
                    <?php if (element('is_admin', $view)) {?>
                        <input type="number" name="ppo_point" id="ppo_point" class="input" style="width:80px;" value="<?php echo set_value('ppo_point', element('ppo_point', element('poll', $view))); ?>" /> 참여자에게 포인트지급(관리자전용)
                    <?php } ?>
                </li>
            </div>
            <script type="text/javascript">
            //<![CDATA[
            function add_poll_item(val) {
                if ( ! val) val = '';
                $('.poll_item_area').append('<input type="text" class="form-control" name="poll_item[]" value="' + val + '" />');
            }
            //]]>
            </script>
        <?php } ?>
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
            <div class="text-center middle_font" style="margin-bottom: 0;">
                
                <button type="submit">저 장</button>
                <button type="button">취 소</button>
            </div>
        </div>
    <?php echo form_close(); ?>
</div>

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

$(function(){
// 글자수 초과시 경고창
    $('.text_area > input').keydown(function(){
        var content = $(this).val().length;
        if(content == 40){
            alert('최대 40자까지만 가능합니다.');
        }
    });
});

// 파일 업로드
var fileTarget = $('.upload_area li input.file_load');

    fileTarget.on('change', function(){
        if(window.FileReader){
        // 파일명 추출
        var filename = $(this)[0].files[0].name;
        } 

        else {
        // Old IE 파일명 추출
        var filename = $(this).val().split('/').pop().split('\\').pop();
        };

    $(this).siblings('.upload_area li input:nth-child(1)').val(filename);
    });
//]]>

var del_tx = $('.upload_area li.del_file a').text();
$('.upload_area li.del_file input').val(del_tx);

</script>
