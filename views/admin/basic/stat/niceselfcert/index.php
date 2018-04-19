<div class="box">
    <div class="box-table">
        <?php
        $attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
        echo form_open(current_full_url(), $attributes);
        ?>
            <div class="box-table-header">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="<?php echo admin_url($this->pagedir); ?>">본인인증 목록</a></li>
                    <!-- <li role="presentation"><a href="<?php echo admin_url($this->pagedir . '/graph'); ?>">기간별 그래프</a></li> -->
                </ul>
                <?php
                ob_start();
                ?>  
                    <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
                        <a href="<?php echo element('listall_url', $view); ?>" class="btn btn-sm <?php echo (!$this->input->get('msh_status')) ? 'btn-success' : 'btn-default'; ?>">전체목록</a>
                        <a href="?msh_status=1" class="btn btn-sm <?php echo ($this->input->get('msh_status') === '1' ) ? 'btn-success' : 'btn-default'; ?>">유효 목록</a>
                        <a href="?msh_status=2" class="btn btn-sm <?php echo ($this->input->get('msh_status') === '2' ) ? 'btn-success' : 'btn-default'; ?>">무효 목록</a>
                    </div>
                    
                <?php
                $buttons = ob_get_contents();
                ob_end_flush();
                ?>
            </div>
            <div class="row">전체 : <?php echo element('total_rows', element('data', $view), 0); ?>건</div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>번호</a></th>
                            <th>이름</th>
                            <th>핸드폰번호</th>
                            <th>생년월일</th>
                            <th>성별</th>
                            <th>인증일시</th>
                            <!-- <th>유입 URL</th>
                            <th>관련미디어</th> -->
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (element('list', element('data', $view))) {
                        foreach (element('list', element('data', $view)) as $result) {
                    ?>
                        <tr>
                            <td><?php echo number_format(element('num', $result)); ?></td>
                            <td><?php echo element('display_name', $result); ?></td>
                            <td><?php echo get_phone(element('mem_phone', $result)); ?></td>
                            <td><?php echo get_birthdate(element('mem_birthday', $result)); ?></td>
                            <td><?php echo element('msh_gender', $result) === '1' ? '남성' : '여성'; ?></td>
                            <td><?php echo display_datetime(element('msh_datetime', $result), 'full'); ?></td>
                            <!-- <td><a href="<?php echo goto_url(element('msh_referer', $result)); ?>" target="_blank"><?php echo element('msh_referer', $result); ?></a></td>
                            <td><?php echo html_escape(element('post_title', $result)); ?><a href="<?php echo goto_url(element('post_url', $result)); ?>" target="_blank"><span class="fa fa-external-link"></span></a></td> -->
                            
                        </tr>
                    <?php
                        }
                    }
                    if ( ! element('list', element('data', $view))) {
                    ?>
                        <tr>
                            <td colspan="8" class="nopost">자료가 없습니다</td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="box-info">
                <?php echo element('paging', $view); ?>
                <div class="pull-left ml20"><?php echo admin_listnum_selectbox();?></div>
                <?php echo $buttons; ?>
            </div>
        <?php echo form_close(); ?>
    </div>
    <form name="fsearch" id="fsearch" action="<?php echo current_full_url(); ?>" method="get">
        <div class="box-search">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <select class="form-control" name="sfield" >
                        <?php echo element('search_option', $view); ?>
                    </select>
                    <div class="input-group">
                        <input type="text" class="form-control" name="skeyword" value="<?php echo html_escape(element('skeyword', $view)); ?>" placeholder="Search for..." />
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm" name="search_submit" type="submit">검색!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-search">
            <div class="row">
                <div class="col-md-11">
                    <div class="form-horizontal">
                    <?php
                    if (element('search_list', element('get_member_group_post_list', $view))){
                        $checkbox_content=""; 
                        $i=0;
                        
                        foreach(element('search_list', element('get_member_group_post_list', $view)) as $key => $value){
                            
                            $checked="";
                            foreach($value as $key_ =>$value_){
                                if(empty($this->input->get('post_id_')) || in_array($key_,$this->input->get('post_id_'))) $checked='checked';
                            }
                            $checkbox_content.= '<div class="form-group">';
                            $checkbox_content.= '<label for="'.$key.'" class="col-sm-2 control-label checkbox-inline" style="color:#ec5956;text-align:center;font-weight:bold;"><input type="checkbox"  data-chkkey="chk'.$key.'" name="chkall" id="'.$key.'" '.$checked.'/>'.html_escape(element($key,element('member_group_name_list', element('get_member_group_post_list', $view)))).'</label>';
                            $checkbox_content.= '<div class="col-sm-10" style="text-align:left">';

                            foreach($value as $key_ => $value_){

                            $checked="";
                            if(empty($this->input->get('post_id_')) || in_array($key_,$this->input->get('post_id_'))) $checked='checked';
                            $checkbox_content .= '<label for="post_id_' . $i . '" class="checkbox-inline"><input type="checkbox" name="post_id_[]" id="post_id_' . $i . '" value="' . $key_ . '" class="chk'.$key.'" '.$checked.' /> ' . html_escape(element('post_title',$value_)) . ' </label> ';
                            $i++;
                            }
                            $checkbox_content.= '</div>';
                            $checkbox_content.= '</div>';
                        }
                        

                        echo $checkbox_content;
                    }
                    ?>


                    </div>
                </div>
                <!-- <div class="col-md-1">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-outline btn-primary " name="check_submit" type="submit">적용!</button>
                        </span>
                    </div>
                </div> -->
            </div>
        </div>
    </form>
</div>
