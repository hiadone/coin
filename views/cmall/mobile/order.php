<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_js(base_url('assets/js/cmallitem.js')); ?>

<h3>주문하기</h3>
<table class="table table-hover mt20">
    <thead>
        <tr class="success">
            <th>이미지</th>
            <th>상품명</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php
    $total_price_sum = 0;
    if (element('data', $view)) {
        foreach (element('data', $view) as $result) {
    ?>
        <tr>
            <td><a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>"><img src="<?php echo thumb_url('cmallitem', element('cit_file_1', $result), 60, 60); ?>" class="thumbnail" style="margin:0;width:60px;height:60px;" alt="<?php echo html_escape(element('cit_name', $result)); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" /></a></td>
            <td>
                <a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>"><?php echo html_escape(element('cit_name', $result)); ?></a>
                <ul class="cmall-options" style="display:none;">
                <?php
                $total_num = 0;
                $total_price = 0;
                foreach (element('detail', $result) as $detail) {
                ?>
                    <li><?php echo html_escape(element('cde_title', $detail)) . ' ' . element('cct_count', $detail);?>개 (+<?php echo number_format(element('cde_price', $detail)); ?>원)</li>
                <?php
                    $total_num += element('cct_count', $detail);
                    $total_price += ((int) element('cit_price', $result) + (int) element('cde_price', $detail)) * element('cct_count', $detail);
                }
                $total_price_sum += $total_price;
                ?>
                </ul>
            </td>
            
           
        </tr>
    <?php
        }
    }
    if ( ! element('data', $view)) {
    ?>
        <tr>
            <td colspan="6" class="nopost">주문내역이 비어있습니다</td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<div class="well well-sm mt20">
    사용가능 포인트 <div class="total_price"><span class="checked_price"><?php echo number_format($total_price_sum); ?></span> 점</div>
</div>

<div class="well well-sm mt20">
    결제해야할 포인트 <div class="total_price"><span class="checked_price"><?php echo number_format($total_price_sum); ?></span> 점</div>
</div>

<div class="well well-sm mt20">
    유효기간 <div class="total_price"><?php echo (element('cit_download_days', $result)) ? '구매후 ' . element('cit_download_days', $result) . '일간 ' : '기간제한없음'; ?></div>
</div>

<?php
$sform['view'] = $view;
if ($this->cbconfig->item('use_payment_pg') && element('use_pg', $view)) {
    $this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form1name', $view), $sform);
}
$attributes = array('class' => 'form-horizontal', 'name' => 'fpayment', 'id' => 'fpayment', 'autocomplete' => 'off');
echo form_open(site_url('cmall/orderupdate'), $attributes);
if ($this->cbconfig->item('use_payment_pg') && element('use_pg', $view)) {
    $this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form2name', $view), $sform);
}
?>
    <input type="hidden" name="unique_id" value="<?php echo element('unique_id', $view); ?>" />
    <input type="hidden" name="total_price_sum" id="total_price_sum" value="<?php echo $total_price_sum; ?>" />
    <input type="hidden" name="good_mny" value="0" />
    <input type="radio" name="pay_type" value="bank" id="pay_type_bank" checked style="display:none;" />
    <input type="text" name="order_deposit" id="order_deposit" class="form-control px100" value="0" />

    <div class="market-order-person">
        <p class="market-title mt20">구매하시는 분</p>
        <div class="form-group">
            <label class="control-label">실명</label>
            <div>
                <input type="text" name="mem_realname" class="input" value="<?php echo $this->member->item('mem_nickname'); ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">이메일</label>
            <div>
                <input type="email" name="mem_email" class="input" value="<?php echo $this->member->item('mem_email'); ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">휴대폰</label>
            <div>
                <input type="text" name="mem_phone" class="input" value="<?php echo $this->member->item('mem_phone'); ?>" />
            </div>
        </div>
        
        
        <?php echo form_close();?>

         <p class="market-title mt20">상품 상세설명</p>
         <ul>
            <li>
                
                상품 정보 
            </li>
        </ul>

         <?php
                if ($this->cbconfig->item('use_payment_pg')) {
                    $this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form3name', $view), $sform);
                } ?>
    </div>

<script type="text/javascript">
//<![CDATA[
$(document).on('change', 'input[name= pay_type]', function() {
    if ($("input[name='pay_type']:checked").val() === 'bank') {
        $('.bank-info').show();
    } else {
        $('.bank-info').hide();
    }
});
//]]>
</script>

<script type="text/javascript">
var use_pg = '<?php echo element('use_pg', $view) ? '1' : ''; ?>';
var pg_type = '<?php echo $this->cbconfig->item('use_payment_pg'); ?>';
var payment_unique_id = '<?php echo element('unique_id', $view); ?>';
var good_name = '<?php echo html_escape(element('good_name', $view)); ?>';
var ptype = 'cmall';
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/payment.js'); ?>"></script>
<?php
if ($this->cbconfig->item('use_payment_pg') && element('use_pg', $view)) {
    $this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form4name', $view), $sform);
}
