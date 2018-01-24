<div class="alert alert-auto-close alert-dismissible alert-comment-list-message" style="display:none;"><span class="alert-comment-list-message-content"></span></div>

<?php
if (element('list', element('data', $view))) {
    echo '<ol>';
    foreach (element('list', element('data', $view)) as $result) {
?>
    <li id="comment_<?php echo element('cmt_id', $result); ?>" >
        <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_comment_id[]" value="<?php echo element('cmt_id', $result); ?>" /><?php } ?>
        <p class='comment-list'>
            <?php echo element('content', $result); ?>
        </p>
        <table class="small_font">
            <tr>
                <td>작성일 : <?php echo element('display_datetime', $result); ?></td>
                <td>작성자 : <?php echo element('display_name', $result); ?></td>
            </tr>
        </table>
        <?php if (element('can_update', $result)) { ?>
        <button class="small_font" onClick="comment_box('<?php echo element('cmt_id', $result); ?>', 'cu'); return false;">수 정</button>
        <?php } ?>
        <?php if (element('can_delete', $result)) { ?>
        <button class="small_font" onClick="delete_comment('<?php echo element('cmt_id', $result); ?>', '<?php echo element('post_id', $result); ?>', '<?php echo element('page', $view); ?>');">삭 제</button>
        <?php } ?>
            
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
