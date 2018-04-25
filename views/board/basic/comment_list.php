<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>



<section class='reply_list'>
        
    <div class="alert alert-auto-close alert-dismissible alert-comment-list-message" style="display:none;"><span class="alert-comment-list-message-content"></span></div>
<?php
if (element('list', element('data', $view))) {
    echo '<h2>Comment</h2><ol class="post-view">';
    
    foreach (element('list', element('data', $view)) as $result) {
?>
    <li id="comment_<?php echo element('cmt_id', $result); ?>" >
        <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_comment_id[]" value="<?php echo element('cmt_id', $result); ?>" /><?php } ?>
        <div class='reply_cont'>
            <figure>
                <img src="<?php echo base_url('/views/_layout/basic/images/reply_spoon/spoon_'.element('display_level', $result,1).'.png')?>" alt='reply_icon_img'>
                <figcaption>
                    <h3><?php echo element('display_name', $result); ?></h3>
                    <p class='comment-list'>
                        <?php echo element('content', $result); ?> 
                    </p>
                </figcaption>
            </figure>
            
            <ul>
                <li>작성일 : <?php echo element('display_datetime', $result); ?></li>
                <li class='small_font'>|</li>
                <li>작성자 : <?php echo element('display_name', $result); ?></li>
                <li class='small_font'>|</li>
                <?php if (element('can_update', $result)) { ?>
                <li class='modify'><a href="javascript:;" onClick="comment_box('<?php echo element('cmt_id', $result); ?>', 'cu'); return false;">수 정</a></li>
                <li class='small_font'>|</li>
                <?php } ?>
                <?php if (element('can_delete', $result)) { ?>
                <li class='clear'><a href="javascript:;" onClick="delete_comment('<?php echo element('cmt_id', $result); ?>', '<?php echo element('post_id', $result); ?>', '<?php echo element('page', $view); ?>'); return false;">삭 제</a></li>
                <li class='small_font'>|</li>
                <?php } ?>
                <?php if (element('can_comment_choose', $view)) { ?>
                    
                <li><a   id="btn-comment-choose-<?php echo element('cmt_id', $result); ?>" href="javascript:;" onClick="comment_choose('<?php echo element('cmt_id', $result); ?>', '1', 'comment-choose-<?php echo element('cmt_id', $result); ?>');" title="채택하기">채 택</a></li>
                    <li class='small_font'>|</li>
                <?php } ?>
                
            </ul>
        </div>

        <!-- <div class='reply_modify'>
            <textarea class='write_area' maxlength="1000"></textarea>
            <span class='write_count'></span>
            <button>저 장</button>
        </div>     -->  


        
        

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
</section>
<section class="post_page">
<div><?php echo element('paging', $view); ?></div>
</section>