<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<div class="alert-comment-list-message" style="display:none;"><span class="alert-comment-list-message-content"></span></div>

<?php
if (element('list', element('data', $view))) {
    echo '<ol class="post-view">';
    foreach (element('list', element('data', $view)) as $result) {
?>
    <li id="comment_<?php echo element('cmt_id', $result); ?>" >
        <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_comment_id[]" value="<?php echo element('cmt_id', $result); ?>" /><?php } ?>
        <div class='comment-list'>
            <?php echo element('content', $result); ?> 
        </div>
        <table class="small_font">
            <tr>
                <td>작성일 : <?php echo element('display_datetime', $result); ?></td>
                <td>작성자 : <?php echo element('display_name', $result); ?></td>
            </tr>
        </table class="reply_btn">
        
        <div class="comment-button"> 
            <?php
            if ( ! element('post_del', element('post', $view)) && ! element('cmt_del', $result)) {
            ?>
                <?php if (element('can_update', $result)) { ?>
                <button class="small_font" onClick="comment_box('<?php echo element('cmt_id', $result); ?>', 'cu'); return false;">수 정</button>
                <?php } ?>
                <?php if (element('can_delete', $result)) { ?>
                <button class="small_font" onClick="delete_comment('<?php echo element('cmt_id', $result); ?>', '<?php echo element('post_id', $result); ?>', '<?php echo element('page', $view); ?>');">삭 제</button>
                <?php } ?>
                <?php if (element('can_comment_choose', $view)) { ?>
                    
                    <button class="small_font" id="btn-comment-choose-<?php echo element('cmt_id', $result); ?>" onClick="comment_choose('<?php echo element('cmt_id', $result); ?>', '1', 'comment-choose-<?php echo element('cmt_id', $result); ?>');" title="채택하기"><i class="fa fa-thumbs-o-up fa-xs"></i> 채택</button>
                <?php } ?>
            <?php } ?>
        </div>

            <span id="edit_<?php echo element('cmt_id', $result); ?>"></span><!-- 수정 -->
            <span id="reply_<?php echo element('cmt_id', $result); ?>"></span><!-- 답변 -->
            <input type="hidden" value="<?php echo element('cmt_secret', $result); ?>" id="secret_comment_<?php echo element('cmt_id', $result); ?>" />
            <textarea id="save_comment_<?php echo element('cmt_id', $result); ?>" style="display:none"><?php echo html_escape(element('cmt_content', $result)); ?></textarea>
        </li>
    
<?php
    }
    echo '</ol>';
}
?>
<nav><?php echo element('paging', $view); ?></nav>
