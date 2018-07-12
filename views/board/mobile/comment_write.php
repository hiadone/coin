<?php
if ( ! element('post_hide_comment', element('post', $view)) && element('is_admin', $view)) {
?>
    <div class="chk_comment_all_wrapper"><label for="chk_comment_all"><input id="chk_comment_all" onclick="all_commentlist_checked(this.checked);" type="checkbox" /> 코멘트 전체선택</label></div>
    <button type="button" class="btn btn-default btn-sm admin-manage-comment"><i class="fa fa-cog big-fa"></i>댓글관리</button>
    <div class="btn-admin-manage-layer admin-manage-layer-comment">
        <div class="item" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제</div>
        <div class="item" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
        <div class="item" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
        <div class="item" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
        <div class="item" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
        <div class="item" onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
    </div>
<?php
}
if (element('can_comment_write', element('comment', $view)) OR element('show_textarea', element('comment', $view))) {
?>
    <div id="comment_write_box">
        <div class="well comment_write_box_inner pd0">
            <div class="alert alert-auto-close alert-dismissible alert-comment-message" style="display:none;"><span class="alert-comment-message-content"></span></div>
            <?php
            $attributes = array('name' => 'fcomment', 'id' => 'fcomment');
            echo form_open('', $attributes);
            ?>
                <input type="hidden" name="mode" id="mode" value="c" />
                <input type="hidden" name="post_id" value="<?php echo element('post_id', element('post', $view)); ?>" />
                <input type="hidden" name="cmt_id" value="" id="cmt_id" />
                <input type="hidden" name="cmt_page" value="" id="cmt_page" />
                
                <textarea class="input commenttextarea mt0 mb0" name="cmt_content" id="cmt_content" rows="5" accesskey="c" <?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'onClick="alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} ?>><?php echo set_value('cmt_content', element('cmt_content', element('comment', $view))); ?></textarea>
                <?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>
                    <div class="pull-right">
                        <strong><span id="char_count">0</span></strong>
                        <?php if (element('comment_min_length', element('board', $view))) { ?>
                            최소 <strong><?php echo number_format(element('comment_min_length', element('board', $view))); ?></strong> 글자 이상
                        <?php }
                        if (element('comment_max_length', element('board', $view))) { ?>
                            /<strong><?php echo number_format(element('comment_max_length', element('board', $view))); ?></strong>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="comment_write_button_area mt0 mb10">
                    <div class="form-group pull-left">
                        <button type="button" class="btn btn-danger btn-sm" id="cmt_btn_submit" onClick="<?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} else { ?>add_comment(this.form, '<?php echo element('post_id', element('post', $view)); ?>');<?php } ?> ">댓글등록</button>
                    </div>
                    
                </div>
                
            <?php echo form_close(); ?>
        </div>
    </div>
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
