<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

    <section class="ham_out" >
        <h2>회 원 탈 퇴</h2>
        <div style="border:0; ">
            <img src="<?php echo base_url('/assets/images/stop.png') ?>" alt="stop">
            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-warning"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            ?>
            <?php
            $attributes = array('class' => 'form-horizontal', 'name' => 'fconfirmpassword', 'id' => 'fconfirmpassword', 'onsubmit' => 'return confirmleave()');
            echo form_open(current_url(), $attributes);
            ?>

            <h3>정말로 탈퇴 하시겠습니까 ?</h3>
            
            <p style="margin-bottom: 20px;">
                회원 탈퇴시 모든 정보가 삭제되며<br>
                어떠한 경우에도 복구되지 않습니다.<br><br>
                탈퇴 시 동일한 SNS로 재가입은<br>
                1개월 이내로는 재가입이 불가능 하며<br><br>

                <b>
                    적립하신 모든 포인트가 소멸됩니다.<br>
                    탈퇴하시겠습니까?
                </b>
            </p>
            <!-- <span>비밀번호</span> -->
            <!-- <input type="password" class="input px150" id="mem_password" name="mem_password" /> -->
        
            <button type="submit">탈 퇴 하 기</button>
            <?php echo form_close(); ?>
        </div>

        
    </section>



<script type="text/javascript">
//<![CDATA[
// $(function() {
//     $('#fconfirmpassword').validate({
//         rules: {
//             mem_password : { required:true, minlength:4 }
//         }
//     });
// });
function confirmleave() {
    if (confirm('정말 회원 탈퇴를 하시겠습니까? 탈퇴한 회원정보는 복구할 수 없으므로 신중히 선택하여주세요. 확인을 누르시면 탈퇴가 완료됩니다 ')) {
        return true;
    } else {
        return false;
    }
}
//]]>
</script>
