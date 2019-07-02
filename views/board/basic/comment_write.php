<section class='reply_write'>
        <div class="alert alert-auto-close alert-dismissible alert-comment-message" style="display:none;"><span class="alert-comment-message-content"></span></div>
<?php
if ( ! element('post_hide_comment', element('post', $view)) && element('is_admin', $view)) {
?>  
    <div class="mb20">
    <a class="chk_comment_all_wrapper"><label for="chk_comment_all"><input id="chk_comment_all" onclick="all_commentlist_checked(this.checked);" type="checkbox" /> 코멘트 전체선택</label></a>
    <span>|</span>
    <a href="javascript:comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');">선택삭제</a>
    </div>
<?php
}
if (element('can_comment_write', element('comment', $view)) OR element('show_textarea', element('comment', $view))) {
?>  
    
    <div id="comment_write_box">
        <h3>댓 글</h3>
        <div class="well reply_modify">
            
            <?php


            $attributes = array('name' => 'fcomment', 'id' => 'fcomment');
            echo form_open('', $attributes);
            ?>
                <input type="hidden" name="mode" id="mode" value="c" />
                <input type="hidden" name="post_id" value="<?php echo element('post_id', element('post', $view)); ?>" />
                <input type="hidden" name="cmt_id" value="" id="cmt_id" />
                <input type="hidden" name="cmt_page" value="" id="cmt_page" />
                <?php
                if ($this->member->is_admin() === 'super') {
                ?>
                    <div class="form-group mb20">
                        <label for="cmt_nickname">닉네임</label>
                        <input type="text" class="input" id="cmt_nickname" name="cmt_nickname" value="<?php echo set_value('cmt_nickname',element('cmt_nickname', element('comment', $view))); ?>" />
                        <label for="display_level">등급</label>
                        <input type="number" class="input" id="display_level" name="display_level" />
                    </div>
                <?php
                }
                ?>
                <textarea  <?php if($this->member->is_member() === false) {?> placeholder="댓글쓰기는 로그인후 이용이 가능합니다."  onfocus="this.placeholder=''" maxlength="100" onblur="this.placeholder='댓글쓰기는 로그인후 이용이 가능합니다.'" <?php } ?> class="write_area" name="cmt_content" id="cmt_content" rows="3" accesskey="c" <?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'onClick="alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} ?>><?php echo set_value('cmt_content', element('cmt_content', element('comment', $view))); ?></textarea>
                <?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>
                    <div class="reply-div" style='text-align: right;'>현재 <strong><span id="char_count">0</span></strong> 글자이며,
                        <?php if (element('comment_min_length', element('board', $view))) { ?>
                            최소 <strong><?php echo number_format(element('comment_min_length', element('board', $view))); ?></strong> 글자 이상
                        <?php } if (element('comment_max_length', element('board', $view))) { ?>
                            최대 <strong><?php echo number_format(element('comment_max_length', element('board', $view))); ?></strong> 글자 이하
                        <?php } ?>
                        입력하실 수 있습니다.
                    </div>
                <?php } ?>
                
                
                    <button type="button" class="pointer" id="cmt_btn_submit" onClick="<?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} else { ?>add_comment(this.form, '<?php echo element('post_id', element('post', $view)); ?>');<?php } ?> ">댓글등록</button>
                
                    
               

                <?php if ($this->member->is_member() === false) { ?>
                    <div class="form-inline passcord mt20">
                        <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
                            <div class="captcha" id="recaptcha"></div>
                            <button type="button" id="captcha" style="display:none;"></button>
                            <input type="hidden" name="recaptcha" />
                        <?php } else { ?>
                           <!--  <div class="form-group"><img src="<?php echo base_url('assets/images/preload.png'); ?>" width="160" height="40" id="captcha" alt="captcha" title="captcha" /></div>
                            <div class="form-group">
                                <input type="text" class="input col-md-4" id="captcha_key" name="captcha_key" />
                            </div>
                            <div class="form-group">자동등록방지 숫자를 순서대로 입력하세요.</div> -->
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php echo form_close(); ?>
        </div>
    </div>
<?php
}
?>
    </div>

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
$(document).ready(function($) {
    view_comment('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', '', '');
});
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
