
<div class="foot_padding">
    <section class="info_area main_title my_info">
    <?php
        echo validation_errors('<div class="alert alert-auto-close alert-warning" role="alert">', '</div>');
        echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-success">', '</div>');
        $attributes = array('class' => 'form-horizontal', 'name' => 'flist', 'id' => 'flist', 'onsubmit' => 'return submitContents(this)');
        echo form_open(current_full_url(), $attributes);
        ?>
            <input type="hidden" name="s" value="1" />
            <input type="hidden" name="ota_value" value="a" />
            <input type="hidden" name="ota_type" value="other_sub_2" />
    
    
    
        <div class="alert alert-dismissible alert-info">
            암호화폐는 최대 10개까지만 선택이 가능합니다.<br />
        </div>
        


           
            <table>
                <?php
                if (element('select_coin_list', $view)) {
                    foreach (element('select_coin_list', $view) as $result) {

                        // if(!in_array($result,element('select_coin_list', $view))) continue; 
                ?>
                    <tr class="" id="white_coin_list_<?php echo $result ?>">
                        <th style="width:50px;"><input type="checkbox" name="ota_id[]" id="white_coin_id_<?php echo $result ?>" value="<?php echo $result ?>" data-id="<?php echo $result ?>" class="" <?php echo in_array($result,element('select_coin_list', $view)) ? 'checked="checked"':''; ?>></th>
                        <td ><?php echo $result ?></td>
                        <td class=""><?php echo element($result,element('coinname_list', $view)) ?></td>
                        <td class="">
                            <button type="button" class="" data-id="<?php echo $result ?>" onclick="moveUp(this);">▲</button>
                            <button type="button" class="" data-id="<?php echo $result ?>" onclick="moveDown(this);">▼</button>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
                <?php
                if (element('white_coin_list', $view)) {
                    foreach (element('white_coin_list', $view) as $result) {

                        if(in_array($result,element('select_coin_list', $view))) continue; 
                ?>
                    <tr class="" id="white_coin_list_<?php echo $result ?>">
                        <th style="width:50px;"><input type="checkbox" name="ota_id[]" id="white_coin_id_<?php echo $result ?>" value="<?php echo $result ?>" data-id="<?php echo $result ?>" class="" <?php echo in_array($result,element('select_coin_list', $view)) ? 'checked="checked"':''; ?>></th>
                        <td ><?php echo $result ?></td>
                        <td class=""><?php echo element($result,element('coinname_list', $view)) ?></td>
                        <td class="">
                            <button type="button" class="" data-id="<?php echo $result ?>" onclick="moveUp(this);">▲</button>
                            <button type="button" class="" data-id="<?php echo $result ?>" onclick="moveDown(this);">▼</button>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
            </table>
            
            
 
            <div>
                <button type="submit" class="ml10" style="width:30%">저장하기</button>
                <button type="button" class="ml10 btn-coin-initializer" style="width:30%">초기화</button>
                <button type="button" class="ml10 btn-history-back" style="width:30%">취소</button>
            </div>

<?php echo form_close(); ?>
    </section>
</div>




<script type="text/javascript">
//<![CDATA[



function moveUp(el){
    var $tr = $(el).parent().parent(); // 클릭한 버튼이 속한 tr 요소
    $tr.prev().before($tr); // 현재 tr 의 이전 tr 앞에 선택한 tr 넣기
}

function moveDown(el){
    var $tr = $(el).parent().parent(); // 클릭한 버튼이 속한 tr 요소
    $tr.next().after($tr); // 현재 tr 의 다음 tr 뒤에 선택한 tr 넣기
}

$(document).on('click', '.btn-coin-initializer', function() {
        
        if (confirm('정말 초기화하시겠습니까?\n 초기화 하면 기본 설정값으로 초기화 됩니다.')) {
            document.location.href= "<?php echo base_url('mypage/user_coin_initializer') ?>";
        } else {
            return false;
        }
    });

$(document).on('click', "input[name='ota_id[]']", function() {
    
    if($(this).is(":checked")){
        
        if ($("input[name='ota_id[]']:checked", document.flist).length > 10) {
            alert('암호화폐는 최대 10개까지만 선택이 가능합니다.');
            return false;
        }
    }       
    
});

function submitContents(f) {
    
    
    if ($("input[name='ota_id[]']:checked", f).length < 1) {
            alert('암호화폐를 하나 이상 선택하세요.');
            return false;
    }

    if ($("input[name='ota_id[]']:checked", f).length > 10) {
            alert('암호화폐는 최대 10개까지만 선택이 가능합니다.');
            return false;
    }

    return true;
}
//]]>
</script>


