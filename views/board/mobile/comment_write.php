<?php
if ( ! element('post_hide_comment', element('post', $view)) && element('is_admin', $view)) {
?>
    <div class="chk_comment_all_wrapper middle_font"><label for="chk_comment_all"><input id="chk_comment_all" onclick="all_commentlist_checked(this.checked);" type="checkbox" /> 코멘트 전체선택</label></div>
    
    <div class="item middle_font" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제</div>
        
    
<?php
}
if (element('can_comment_write', element('comment', $view)) OR element('show_textarea', element('comment', $view))) {
?>
    <ol id="comment_write_box" class="post-view">
    <li style="border-bottom:0; padding:0 3%; box-sizing: border-box; margin-bottom: 0;">
        <h3>댓글쓰기</h3>
            <?php
            $attributes = array('name' => 'fcomment', 'id' => 'fcomment');
            echo form_open('', $attributes);
            ?>
                <input type="hidden" name="mode" id="mode" value="c" />
                <input type="hidden" name="post_id" value="<?php echo element('post_id', element('post', $view)); ?>" />
                <input type="hidden" name="cmt_id" value="" id="cmt_id" />
                <input type="hidden" name="cmt_page" value="" id="cmt_page" />
                
                <textarea <?php if($this->member->is_member() === false) {?> placeholder="댓글쓰기는 로그인후 이용이 가능합니다."  onfocus="this.placeholder=''" maxlength="100" onblur="this.placeholder='댓글쓰기는 로그인후 이용이 가능합니다.'" <?php } ?> class=" " name="cmt_content" id="cmt_content"  accesskey="c" <?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'onClick="alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} ?>><?php echo set_value('cmt_content', element('cmt_content', element('comment', $view))); ?></textarea>
                <?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>
                    <span class="char_count">
                        <span id="char_count">0</span>/
                        <?php if (element('comment_min_length', element('board', $view))) { ?>
                            최소 <strong><?php echo number_format(element('comment_min_length', element('board', $view))); ?></strong> 글자 이상
                        <?php } if (element('comment_max_length', element('board', $view))) { ?>
                            <strong><?php echo number_format(element('comment_max_length', element('board', $view))); ?></strong>
                        <?php } ?>
                    </span>
                <?php } ?>
               
                        <button type="button" class="per100 small_font" id="cmt_btn_submit" onClick="<?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} else { ?>add_comment(this.form, '<?php echo element('post_id', element('post', $view)); ?>');<?php } ?> ">저 장</button>
                   <div class="alert-comment-message" style="display:none;"><span class="alert-comment-message-content"></span></div>
                    
                <?php if ($this->member->is_member() === false) { ?>
                    <div class="form-inline passcord">
                        <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
                            <div class="captcha" id="recaptcha"></div>
                            <button type="button" id="captcha" style="display:none;"></button>
                            <input type="hidden" name="recaptcha" />
                        <?php } else { ?>
                            <!-- <div class="form-group"><img src="<?php echo base_url('assets/images/preload.png'); ?>" width="160" height="40" id="captcha" alt="captcha" title="captcha" /></div>
                            <div class="form-group">
                                <input type="text" class="input col-md-4" id="captcha_key" name="captcha_key" />
                            </div>
                            <div class="form-group">자동등록방지 숫자를 순서대로 입력하세요.</div> -->
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php echo form_close(); ?>        
        </li>
    </ol>
<?php
}
?>
<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?php echo element('comment_min_length', element('board', $view)) + 0; ?>); // 최소
var char_max = parseInt(<?php echo element('comment_max_length', element('board', $view)) + 0; ?>); // 최대

<?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>

check_byte('cmt_content', 'char_count');
$(function() {
    $(document).on('keyup', '#cmt_content', function() {
        check_byte('cmt_content', 'char_count');
    });
});
<?php } ?>
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/comment.js'); ?>"></script>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function($) {
    view_comment('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', '', '');
});
//]]>
</script>

<?php if (element('is_comment_name', element('comment', $view))) { ?>
    <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/recaptcha.js'); ?>"></script>
    <?php } else { ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/captcha.js'); ?>"></script>
    <?php } ?>
<?php } ?>
<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fcomment').validate({
        rules: {
<?php if (element('is_comment_name', element('comment', $view))) { ?>
            cmt_nickname: {required :true, minlength:2, maxlength:20},
            cmt_password: {required :true, minlength:<?php echo element('password_length', element('comment', $view)); ?>},
<?php if ($this->cbconfig->item('use_recaptcha')) { ?>
            recaptcha : {recaptchaKey:true},
<?php } else { ?>
            captcha_key : {required: true, captchaKey:true},
<?php } ?>
<?php } ?>
            cmt_content: {required :true},
            mode : {required : true}
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});
//]]>
</script>
