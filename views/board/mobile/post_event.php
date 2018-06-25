<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php    
    $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); 
    $point_eventdownload=0;
?>


<div class="foot_padding">
    <section class='main_title store_item'>
        <h2 style="margin-bottom:0;">상 품 설 명</h2>

        
        <?php echo show_alert_message($this->session->flashdata('message'), '<div class="mt10 alert alert-auto-close alert-dismissible alert-info">', '</div>'); ?>

        <div class='item_info'>
            <figure>
                <figcaption>
                    <h3><?php echo html_escape(element('post_title', element('post', $view))); ?></h3>
                </figcaption>
                
                 <?php
                if (element('file_image', $view)) {
                    foreach (element('file_image', $view) as $key => $value) {
                ?>
                    <img src="<?php echo element('thumb_image_url', $value); ?>" alt="<?php echo html_escape(element('pfi_originname', $value)); ?>" title="<?php echo html_escape(element('pfi_originname', $value)); ?>" class="view_full_image" data-origin-image-url="<?php echo element('origin_image_url', $value); ?>" style="max-width:100%;" />
                <?php
                    }
                }
                ?>
            </figure>

    <?php if (element('extra_content', $view)) { ?>
        <ul>
            <li>
                    <h4>사용가능 포인트</h4>
                    <strong><?php echo number_format($this->member->item('mem_point')) ?> P</strong>
                </li>
        <?php foreach (element('extra_content', $view) as $key => $value) { ?>
            <li>
                <h4><?php echo html_escape(element('display_name', $value)); ?></h4>
                <?php if(element('field_name', $value)==='order_point'){ 
                    $point_eventdownload=element('output', $value);
                ?>
                    <strong><?php echo number_format(element('output', $value)); ?> P</strong>
                <?php } else { ?>
                    <p><?php echo nl2br(html_escape(element('output', $value))); ?></p>
                <?php } ?>
            </li>
        <?php } ?>
        </ul>
    <?php } ?>
    </div>
       

    <div class='item_detail'>
        <h3>상세설명</h3>
        <p>
            <?php echo element('content', element('post', $view)); ?>
        </p>
    </div>
    <div class='item_buy'>
        <?php
            $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onSubmit' => 'return submitContents(this)');
            echo form_open(base_url('/event/event_insert/'.element('post_id',element('post', $view))), $attributes);
            ?>
            <input type="hidden" name="post_id" id="post_id" value="<?php echo element('post_id',element('post', $view));?>">
            <input type="hidden" name="redirecturl" value="<?php  echo current_full_url()?>">

            <input type='text'  name="elh_mobileno" id="elh_mobileno" placeholder="전송 받으실 전화번호를 입력해 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='전송 받으실 전화번호를 입력해 주세요.'">

            <strong class='small_font'>
               ※ 포인트 구매후 환불이 되지 않으니,꼭! 전화번호와 상품 확인 후<br>구매하기 버튼을 클릭해 주세요.
            </strong>

            <button type='submit'>구 매 하 기</button>
            <?php echo form_close(); ?>
        </div>
    </section>
    <div class="border_button middle_font" style='padding:0 3%; margin-bottom: 5%;'>
        <div class="btn-group pull-left" role="group" aria-label="...">
            <?php if (element('modify_url', $view)) { ?>
                <a style='margin-right: 5px;' href="<?php echo element('modify_url', $view); ?>" class="btn-sm">수 정</a>
            <?php } ?>
            <?php    if (element('delete_url', $view)) { ?>
                <a  class=" btn-sm btn-one-delete" data-one-delete-url="<?php echo element('delete_url', $view); ?>">삭 제</a>
            <?php } ?>
                <!-- <a href="<?php echo element('list_url', $view); ?>" class="btn btn-default btn-sm">목록</a> -->
            
           
        </div>
        <?php if (element('write_url', $view)) { ?>
            <div class="pull-right">
                <a style='background:#1c446d; display: inline-block; text-align: center; color: #fff;
                 border-radius: 5px; font-size: 12px; font-weight: bold; padding:5px; box-sizing: border-box;' href="<?php echo element('write_url', $view); ?>">글 쓰 기</a>
            </div>
        <?php } ?>
        </div>
        


        


    
   

   

   

   

    

   

   
    <div id="viewcomment"></div>
    <div class='write_cont' style='margin-bottom: 5%;'>
    <ul class="middle_font post-view">
        <li><a href="<?php echo element('list_url', $view); ?>" class="">목 록</a></li>
        <?php if (element('prev_post', $view)) { ?>
            <li><a href="<?php echo element('url', element('prev_post', $view)); ?>" >◀ 이전글</a></li>
        <?php } ?>
        <?php if (element('next_post', $view)) { ?>
            <li><a href="<?php echo element('url', element('next_post', $view)); ?>" >다음글 ▶</a></li>
        <?php } ?>
        
    </ul>
    </div>
</div>
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





