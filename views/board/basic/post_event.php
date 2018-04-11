<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php    
    $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); 
    $point_eventdownload=0;
?>


<article class='content04'>
    <h4>
        스토어 상품구매
        <span class="small_font">비트코인에 관한 다양한 정보를 한번에 !!</span>
    </h4>

    <section class='item_detail'>
        <?php echo show_alert_message($this->session->flashdata('message'), '<div class="mt10 alert alert-auto-close alert-dismissible alert-info">', '</div>'); ?>
         <?php
        if (element('file_image', $view)) {
            foreach (element('file_image', $view) as $key => $value) {
        ?>
            <img src="<?php echo element('thumb_image_url', $value); ?>" alt="<?php echo html_escape(element('pfi_originname', $value)); ?>" title="<?php echo html_escape(element('pfi_originname', $value)); ?>" class="view_image" data-origin-image-url="<?php echo element('origin_image_url', $value); ?>" style="max-width:100%;" />
        <?php
            }
        }
        ?>
        <div class='item_info'> 
            <h2>상품명 : <?php echo html_escape(element('post_title', element('post', $view))); ?></h3>
            <?php if (element('extra_content', $view)) { ?>
                <ul>
                    <li>
                            <h3 class='big_font'>사용가능 포인트</h3>
                            <strong><?php echo number_format($this->member->item('mem_point')) ?> P</strong>
                        </li>
                <?php foreach (element('extra_content', $view) as $key => $value) { ?>
                    <li>
                        <h3 class='big_font'><?php echo html_escape(element('display_name', $value)); ?></h3>
                        <?php if(element('field_name', $value)==='order_point'){ 
                            $point_eventdownload=element('output', $value);
                        ?>
                            <strong><?php echo number_format(element('output', $value)); ?> P</strong>
                        <?php } else { ?>
                            <p class='nomal_font02'><?php echo nl2br(html_escape(element('output', $value))); ?></p>
                        <?php } ?>
                    </li>
                <?php } ?>
                </ul>
            <?php } ?>
            <div class='item_buy'>
            <?php
                $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onSubmit' => 'return submitContents(this)');
                echo form_open(base_url('/event/event/'.element('post_id',element('post', $view))), $attributes);
                ?>
                <input type="hidden" name="post_id" id="post_id" value="<?php echo element('post_id',element('post', $view));?>">
                <input type="hidden" name="redirecturl" value="<?php  echo current_full_url()?>">

                <input type='text'  name="elh_mobileno" id="elh_mobileno" placeholder="전송 받으실 전화번호를 입력해 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='전송 받으실 전화번호를 입력해 주세요.'">

                <span>포인트 구매 후 환불이 되지 않으니<br> 꼭! 전화번호와 상품 확인 후 구매하기 버튼을 클릭해 주세요.</span>

                <button type='submit' class="big_font">구 매 하 기</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
    
    <section class='item_explain'>
        <h2>상 품 설 명</h2>
         <p>
            <?php echo element('content', element('post', $view)); ?>
        </p>
    </section>

    <div id="viewcomment"></div>
</article>

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
            <?php } ?>
             <?php if (element('write_url', $view)) { ?>
                <li><a href="<?php echo element('write_url', $view); ?>" class="">글쓰기</a></li>
                <li class='small_font'>|</li>
            <?php } ?>
            <li><a href="<?php echo element('list_url', $view); ?>" class="">목록</a></li>
        </ul>
</section>

 <script type="text/javascript">
    //<![CDATA[
    

    function submitContents(f) {
        
        
        var href;
         if( ! jQuery.trim($('#elh_mobileno').val()) ) {
            alert('전화번호를 입력해 주세요');
            $('#elh_mobileno').focus();
            flag=false;
            return false;
        } else {
            <?php if ($point_eventdownload > 0) { ?>if ( ! confirm("사용하신 포인트는 환불이 되지 않습니다.\n 구매 하시겠습니까?")) { return false; }<?php }?>
            return true;
        }
        
    return false;
    
}
    //]]>
    </script>
<?php echo element('footercontent', element('board', $view)); ?>





