<style>
.box{width:100%;float:left; padding:0 20px;}
.box-table{width:100%; clear:both;background:#fff;padding: 20px 20px 10px;overflow: hidden;}
.box-table-header{width: 100%;clear: both;border-bottom: 2px solid #e7eaec;overflow: hidden;background: #fff; overflow:hidden;}

.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9 {
float:left;
}
</style>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.boyoon.css">


<article class="content02">
    
    <h4>코인 가격표 설정
        <span class="small_font">비트코인에 관한 다양한 정보를 한번에 !!</span>
    </h4>
    
    <?php
        echo validation_errors('<div class="mt20 alert alert-auto-close alert-warning" role="alert">', '</div>');
        echo show_alert_message($this->session->flashdata('message'), '<div class="mt20 alert alert-auto-close alert-dismissible alert-success">', '</div>');
        $attributes = array('class' => 'form-horizontal', 'name' => 'flist', 'id' => 'flist', 'onsubmit' => 'return submitContents(this)');
        echo form_open(current_full_url(), $attributes);
        ?>
            
    <div class="col-sm-8">
    <div class="box mb20">
    <div class="box-table">
        <div class="alert alert-dismissible alert-info">
            암호화폐는 최대 10개까지만 선택이 가능합니다.<br />
        </div>
        
            <div class="box-table-header" style="line-height: 20px;">
                <div class="pull-left media-heading" >
                    코인 우선 순위 리스트 
                </div>
                <div class="pull-right small_font" style="padding-top:5px">&#8251 각 항목을 드래그 하면 순서를 변경 할 수 있습니다.</div>
            </div>
            <div class="list-group">
                <div class="form-group list-group-item">
                    <div class="col-sm-2">순서변경</div>
                    <div class="col-sm-3">코드명</div>
                    <div class="col-sm-5">화폐명</div>
                    
                    <div class="col-sm-2">비고</div>
                    
                </div>
                <div id="sortable_a">
                    <?php
                    if (element('select_coin_list', $view)) {
                        foreach (element('select_coin_list', $view) as $result) {

                            // if(!in_array($result,element('select_coin_list', $view))) continue; 
                    ?>
                        <div class="form-group list-group-item" id="select_coin_list_<?php echo $result ?>">
                            <div class="col-sm-2"><div class="fa fa-arrows" style="cursor:pointer;padding:5px"></div><input type="hidden" name="ota_id[]" value="<?php echo $result ?>" /></div>
                            <div class="col-sm-3"><?php echo $result ?></div>
                            <div class="col-sm-5"><?php echo element($result,element('coinname_list', $view)) ?></div>
                            
                            <div class="col-sm-2"><button type="button" class="btn btn-outline btn-default btn-xs btn-delete-row" data-id="<?php echo $result ?>">삭제</button></div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="btn-group pull-right mt20" role="group" aria-label="...">
                    <button type="submit" class="btn btn-outline btn-success">저장하기</button>
                    <button type="button" class="btn btn-outline btn-danger ml10 btn-coin-initializer">초기화</button>
                    <button type="button" class="btn btn-outline ml10 btn-default btn-history-back">취소</button>
                </div>
        
    </div>
    </div>
</div>

<div class="col-sm-4">
    <div class="box mb20">
    <div class="box-table">
        <div class="box-table-header">
            <div class="pull-left media-heading" style="line-height: 30px;">
                코인 리스트
            </div>
            
        </div>
        <div class="list-group">
            <div class="form-group list-group-item">
                <div class="col-sm-1"></div>
                <div class="col-sm-4">코드명</div>
                <div class="col-sm-7">화폐명</div>
            </div>
            <div>
                <?php
                if (element('white_coin_list', $view)) {
                    foreach (element('white_coin_list', $view) as $result) {
                ?>
                    <div class="form-group list-group-item">
                        
                        <div class="col-sm-1"><input type="checkbox" name="chk_white_coin_id[]" id="white_coin_id_<?php echo $result ?>" value="<?php echo $result ?>" data-id="<?php echo $result ?>" class="btn-add-rows" <?php echo in_array($result,element('select_coin_list', $view)) ? 'checked="checked"':''; ?>></div>
                        <div class="col-sm-4"><label for="white_coin_id_<?php echo $result ?>" class="checkbox-inline pointer"><?php echo $result ?></label></div>
                        <div class="col-sm-7"><img src='<?php echo site_url('/views/_layout/basic/images/store_logo/'.strtoupper($result).'.png') ?>' alt='coin' style="width:15px;"> <span style="vertical-align: text-top;"><?php echo element($result,element('coinname_list', $view)) ?></span></div>
                        
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
            
        
    </div>
    </div>
    
</div>
<?php echo form_close(); ?>
</article>



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).on('click', '.btn-add-rows', function() {
    if($(this).is(":checked")){
        if ($("input[name='chk_white_coin_id[]']:checked", document.flist).length > 10) {
            alert('암호화폐는 최대 10개까지만 선택이 가능합니다.');
            return false;
        }
        $('#sortable_a').append(' <div class="form-group list-group-item" id="select_coin_list_'+$(this).data('id')+'"><div class="col-sm-2"><div class="fa fa-arrows" style="cursor:pointer;"></div><input type="hidden" name="ota_id[]" value="'+$(this).data('id')+'" /></div><div class="col-sm-3">'+$(this).parent().nextAll('.col-sm-4').html()+'</div><div class="col-sm-5">'+$(this).parent().nextAll('.col-sm-7').html()+'</div><div class="col-sm-2"><button type="button" class="btn btn-outline btn-default btn-xs btn-delete-row" data-id="'+$(this).data('id')+'">삭제</button></div></div>');
    } else {
        $('#select_coin_list_'+$(this).data('id')).remove();
    }
});
$(document).on('click', '.btn-delete-row', function() {
    $(this).parents('div.list-group-item').remove();
    

    $('#white_coin_id_'+$(this).data('id')).prop("checked", false);
});
$(function () {
    $('#sortable_a').sortable({
        handle:'.fa-arrows',scroll:false

    });
})

$(document).on('click', '.btn-coin-initializer', function() {
        
        if (confirm('정말 초기화하시겠습니까?\n 초기화 하면 기본 설정값으로 초기화 됩니다.')) {
            document.location.href= "<?php echo base_url('mypage/user_coin_initializer') ?>";
        } else {
            return false;
        }
    });


function submitContents(f) {
    
    
    if ($("input[name='chk_white_coin_id[]']:checked", f).length < 1) {
            alert('암호화폐를 하나 이상 선택하세요.');
            return false;
    }

    if ($("input[name='chk_white_coin_id[]']:checked", f).length > 10) {
            alert('암호화폐는 최대 10개까지만 선택이 가능합니다.');
            return false;
    }

    return true;
}
//]]>
</script>
