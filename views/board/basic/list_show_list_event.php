<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);
?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<article class="content02">
    
    <h3 style='margin-bottom: 20px;'>이벤트 신청 리스트</h3>

    <div class="clearfix"></div>  
    
        <div class="pull-left pd10">전체 : <?php echo element('total_rows', element('data', element('list', $view))); ?>건</div>
        <div class="pull-left pl20" >
            <?php if (element('is_admin', $view) || $this->member->item('mem_level') > 4) { ?>
            <button type="button" onClick="post_multi_action('event_multi_status_update', '2', '선택하신 항목을 무효처리 하시겠습니까?','<?php echo element('brd_key',element('board',$view))?>');" class="btn btn-danger btn-sm">선택무효</button>
            <button type="button" onClick="post_multi_action('event_multi_status_update', '1', '선택하신 항목을 휴효처리 하시겠습니까?','<?php echo element('brd_key',element('board',$view))?>');" class="btn btn-success btn-sm">선택유효</button>
            <?php } ?>
        </div>
        <section class="post_sear pull-right" style="margin-bottom:0px">
            <form class="navbar-form navbar-right pull-right" action="<?php echo post_url(element('brd_key', element('board', element('list', $view))),element('post_id', element('post', $view))); ?>" onSubmit="return postSearch(this);">
                <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                
                <select class="normal_font" name="sfield">
                    <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                    <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                    <option value="post_content" <?php echo ($this->input->get('sfield') === 'post_content') ? ' selected="selected" ' : ''; ?>>내용</option>
                    
                </select>
                <input class="" placeholder="Search" type="search" onfocus="this.placeholder=''" onblur="this.placeholder='Search'" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                <button class="find_img" type="submit"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/search_find.png" alt="find_img"></button>
                
                 
            </form>
         </section> 
        
       
            
            
            <?php if (element('point_info', element('list', $view))) { ?>
                <div class="point-info pull-right mr10">
                    <button class="btn-point-info btn-link" data-toggle="popover" data-trigger="focus" data-placement="left" title="포인트안내" data-content="<?php echo element('point_info', element('list', $view)); ?>"
                    ><i class="fa fa-info-circle fa-lg"></i></button>
                </div>
            <?php } ?>
      
        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        
        
        //]]>
        </script>
  

    <?php
    if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
        $category = element('category', element('board', element('list', $view)));
    ?>
        <ul class="nav nav-tabs clearfix">
            <li role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=">전체</a></li>
            <?php
            if (element(0, $category)) {
                foreach (element(0, $category) as $ckey => $cval) {
            ?>
                <li role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>"><?php echo html_escape(element('bca_value', $cval)); ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    <?php
    }
    ?>

    <?php

    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    
    ?>
    
        <table class='post_table' style="border-top:2px solid #4f4f51">
            <thead>
                <tr>
                    <?php if (element('is_admin', $view)  || $this->member->item('mem_level') > 4) { ?><th><input onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /></th><?php } ?>
                    <th>번호</a></th>
                    <th>이름</th>
                    
                    <th>핸드폰번호</th>
                    
                    <th>신청일시</th>
                    <th class="per40">문의사항</th>
                    <th>상태</th>
                    <th>사유</th>
                    <?php if (element('is_admin', $view)) { ?>
                    <th><small>API상태</small></th>
                    <th><small>전송일</small></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
            <?php
            
            if (element('list', element('data', element('list', $view)))) {
                foreach (element('list', element('data', element('list', $view))) as $result) {
                    
            ?>
                 <tr>
                    <?php if (element('is_admin', $view) || $this->member->item('mem_level') > 4) { ?><td scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('elh_id', $result); ?>" id="chk_elh_id_<?php echo element('elh_id', $result); ?>" /></td><?php } ?>
                    <td><?php echo number_format(element('num', $result)); ?></td>
                    <td><?php echo element('display_name', $result); ?></td>
                    
                    <td><?php echo is_phone(element('elh_mobileno', $result)) ? get_phone(element('elh_mobileno', $result)):(element('elh_mobileno', $result)); ?></td>                    
                    
                    <td><?php echo element('display_datetime', $result) ?></td>
                    <td><?php echo html_escape(element('elh_text', $result)) ?></td>
                    <!-- <td><a href="<?php echo goto_url(element('elh_referer', $result)); ?>" target="_blank"><?php echo element('elh_referer', $result); ?></a></td> -->
                    <td><a href="javascript:post_action_event('event_status_update', '<?php echo element('elh_id', $result);?>', '<?php echo element('elh_status', $result) ==='1' ? '2':'1';?>','<?php echo element('brd_key',element('board',$view))?>');" class="btn <?php echo element('elh_status', $result) ==='1' ? 'btn-success':'btn-danger';?> btn-xs"><?php echo element('elh_status', $result) === '1' ? '유효' : '무효'; ?></a></td>
                    <td><input type="text" class="px100" style="border: 1px solid #e5e6e7;outline: 0 none;padding: 3px 12px;background-color: #FFFFFF;background-image: none;border-radius: 5px;"  name="elh_memo[<?php echo element('elh_id', $result);?>]" id="elh_memo_<?php echo element('elh_id', $result);?>" data-elh_id="<?php echo element('elh_id', $result);?>" value="<?php echo html_escape(element('elh_memo', $result)) ?>" /></td>
                    <?php
                     if (element('is_admin', $view)) {
                        if(element('elh_api_flag2', $result) === "1") echo "<td>전송</td>";
                        else echo "<td>-</td>";

                        echo "<td>".element('display_rst2_datetime', $result,'-')."</td>";
                     } 
                     ?>
                </tr>
            <?php
                }
            }
            if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
            ?>
                <tr>
                    <td colspan="10" class="">게시물이 없습니다</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php echo form_close(); ?>

    <div class="border_button">
        <div class="pull-left mr10">
            <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전체목록</a>
            <a href="<?php echo element('list_url', element('list', $view)); ?>?eventstatus=1" class="btn btn-success btn-sm">유효목록</a>
            <a href="<?php echo element('list_url', element('list', $view)); ?>?eventstatus=2" class="btn btn-danger btn-sm">무효목록</a>
        </div>
        <div class="box-info">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <?php if (element('is_admin', $view)) { ?>
                <button type="button" class="btn btn-outline btn-danger btn-sm mr10" id="export_to_event">체크 항목 이벤트 발송</button> 
                <?php } ?>
                <button type="button" class="btn btn-outline btn-success btn-sm" id="export_to_excel"><i class="fa fa-file-excel-o"></i> 엑셀 다운로드</button>
            </div>            
        </div>
    </div>
    <nav><?php echo element('paging', element('list', $view)); ?></nav>
</article>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

    
<script type="text/javascript">
//<![CDATA[
$(document).on('click', '#export_to_excel', function(){
    exporturl = '<?php echo site_url('board_post/excel_event_list_history/'.element('brd_key',element('board',$view)).'/'.element('post_id',element('post',$view)) . '?' . $this->input->server('QUERY_STRING', null, '')); ?>';
    document.location.href = exporturl;
});

$(document).on('click', '#export_to_event', function() {
        if (confirm("한번 전송한 자료는 수정 할 수 없습니다.\n\n전송하시겠습니까?")) {
            if ($("input[name='chk_post_id[]']:checked").length < 1) {
                alert('항목을 하나 이상 선택하세요.');
                return ;
            }
            <?php
            if (element('list', element('data', element('api_list', $view)))) {
                foreach (element('list', element('data', element('api_list', $view))) as $result) {
                    $status='';
                    $jid='';
                    if(element('elh_status', $result) ==="2") $status='N';
                    elseif(element('elh_status', $result) ==="1") $status='S';

                    if(empty(element('jid', $result))) $jid=date('Ymd');
                    else $jid = element('jid', $result);
                    
            ?>
            if($("#chk_elh_id_<?php echo element('elh_id',$result)?>").prop("checked")){
                 act_cpaProc('<?php echo element('elh_id',$result)?>','<?php echo $jid?>','<?php echo $status?>','<?php echo urlencode(preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", element('elh_memo',$result,'')))?>');
             }
            <?php 
                } 
            } 
            ?>
            alert('텐핑 API 연동이 완료 되었습니다.');
            document.location.reload();
            return false;
        } else {
            return false;
        }
    });


function act_cpaProc(elh_id,jid,status,reason) {
    var href;
    
    href = cb_url + '/postact/tenping_cpa_curl/'+jid+'/'+status+'/'+reason;
    $.ajax({
        async : false,
        url : href,
        type : 'get',
        dataType : 'json',
        success : function(response) {

        },
        complete : function (response) {
            if (response.responseJSON.error) {
                alert(response.responseJSON.Message);
                return false;
            } else if (response.responseJSON.success) {
                $.ajax({
                     async : false,
                     url : cb_url + '/media/act_tpProc/' +elh_id+'/'+response.responseJSON.ResultCode+'/'+response.responseJSON.Message,
                     type : 'get',
                     dataType : 'json',
                     success : function(data) {
                          
                     }
                 });
            }
        }

    });
}

$(document).on('change', 'input[name^=elh_memo]', function() {
    

    post_action_event('event_memo_update', $(this).data('elh_id'),0,'<?php echo element('brd_key',element('board',$view)) ?>');
});



//]]>
</script>