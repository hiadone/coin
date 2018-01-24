<div class="box">
    <div class="box-table">
        <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        $attributes = array('class' => 'form-horizontal', 'name' => 'fadminwrite', 'id' => 'fadminwrite');
        echo form_open_multipart(current_full_url(), $attributes);
        ?>
            <input type="hidden" name="<?php echo element('primary_key', $view); ?>"    value="<?php echo element(element('primary_key', $view), element('data', $view)); ?>" />
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터명</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ban_title" value="<?php echo set_value('ban_title', element('ban_title', element('data', $view))); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">시작일</label>
                    <div class="col-sm-10 form-inline">
                        <input type="text" class="form-control datepicker" name="ban_start_date" value="<?php echo set_value('ban_start_date', element('ban_start_date', element('data', $view))); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">종료일</label>
                    <div class="col-sm-10 form-inline">
                        <input type="text" class="form-control datepicker" name="ban_end_date" value="<?php echo set_value('ban_end_date', element('ban_end_date', element('data', $view))); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터 위치</label>
                    <div class="col-sm-10 form-inline">
                        <select class="form-control" name="bng_name">
                            <option value="">=트위터 위치 선택=</option>
                            <?php
                            if (element('group', $view)) {
                                foreach (element('group', $view) as $gval) {
                            ?>
                                <option value="<?php echo html_escape(element('bng_name', $gval)); ?>" <?php echo set_select('bng_name', element('bng_name', $gval), (element('bng_name', element('data', $view)) === element('bng_name', $gval) ? true : false)); ?>><?php echo html_escape(element('bng_name', $gval)); ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터 URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ban_url" value="<?php echo set_value('ban_url', element('ban_url', element('data', $view))); ?>" />
                    </div>
                </div>                
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터 링크 새창여부</label>
                    <div class="col-sm-10 form-inline">
                        <select name="ban_target" class="form-control">
                            <option value="" <?php echo set_select('ban_target', '', ( ! element('ban_target', element('data', $view)) ? true : false)); ?> >현재창</option>
                            <option value="_blank" <?php echo set_select('ban_target', '_blank', (element('ban_target', element('data', $view)) === '_blank' ? true : false)); ?> >새창</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터 정렬순서</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="ban_order" value="<?php echo set_value('ban_order', element('ban_order', element('data', $view)) + 0); ?>" />
                        <div class="help-inline">정렬 순서가 큰 값이 먼저 출력됩니다</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터표시기기</label>
                    <div class="col-sm-10 form-inline">
                        <select class="form-control" name="ban_device">
                            <option value="all" <?php echo set_select('ban_device', 'all', (element('ban_device', element('data', $view)) === 'all' ? true : false)); ?>>모든기기</option>
                            <option value="pc" <?php echo set_select('ban_device', 'pc', (element('ban_device', element('data', $view)) === 'pc' ? true : false)); ?>>PC만</option>
                            <option value="mobile" <?php echo set_select('ban_device', 'mobile', (element('ban_device', element('data', $view)) === 'mobile' ? true : false)); ?>>모바일만</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">트위터활성화</label>
                    <div class="col-sm-10">
                        <label class="radio-inline" for="ban_activated_1">
                            <input type="radio" name="ban_activated" id="ban_activated_1" value="1" <?php echo set_radio('ban_activated', '1', (element('ban_activated', element('data', $view)) === '1' ? true : false)); ?> /> 활성
                        </label>
                        <label class="radio-inline" for="ban_activated_0">
                            <input type="radio" name="ban_activated" id="ban_activated_0" value="0" <?php echo set_radio('ban_activated', '0', (element('ban_activated', element('data', $view)) !== '1' ? true : false)); ?> /> 비활성
                        </label>
                    </div>
                </div>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <button type="button" class="btn btn-default btn-sm btn-history-back" >취소하기</button>
                    <button type="submit" class="btn btn-success btn-sm">저장하기</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fadminwrite').validate({
        rules: {
            ban_title: 'required',
            ban_start_date: { alpha_dash:true, minlength:10, maxlength:10 },
            ban_end_date: { alpha_dash:true, minlength:10, maxlength:10 },
            bng_name: 'required',
            ban_width: { number:true },
            ban_height: { number:true },
            ban_order: { number:true },
            ban_activated: 'required'
        }
    });
});
//]]>
</script>
