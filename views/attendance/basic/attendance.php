<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);
?>


<article class="content02">
    <section class="submenu ">
        <ul>
            <?php
            $menuhtml = '';
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        if (element(element('men_id', $mval), $menu)) {
                            

                            foreach (element(element('men_id', $mval), $menu) as $lkey => $lval) {
                                
                                if(str_replace("/","",element('men_link', $lval)) === implode("",$this->uri->segment_array())){

                                    foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                        $menu_active='';
                                        
                                        if($lkey === $skey) $menu_active='class="menu_active"';
                                        $slink = element('men_link', $sval) ? element('men_link', $sval) : 'javascript:;';
                                        $menuhtml .= '<li '.$menu_active.'><a href="' . $slink . '" ' . element('men_custom', $sval);
                                        if (element('men_target', $sval)) {
                                            $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                        }
                                        $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                                        $menuhtml .= '<li>|</li>';
                                    }

                                }
                                
                            }
                            

                        } 
                    }
                }
            }
            
            echo $menuhtml;
            ?>

            
            
        </ul>
        
    </section>
    


        <?php
        $attributes = array('class' => 'atten_write', 'name' => 'attendanceform', 'id' => 'attendanceform');
        echo form_open('', $attributes);
        ?>
            <label class='nomal_font02'>한마디</label>
            <input type="text" name="memo" value="<?php echo html_escape(element(0, element('default_memo', $view))); ?>" id="att_memo" class="" onClick="this.value='';" />
            <button type="button" name="change_memo" class="refresh" id="change_memo"><img src='<?php echo element('layout_skin_url', $layout); ?>/images/refresh.png' alt='refresh_img'></button>
            <button type="button" name="submit"  id="add_attendance">출 첵 하 기</button>
            <p class="point nomal_font02" >출석가능시간 : <?php echo $this->cbconfig->item('attendance_start_time'); ?> ~ <?php echo $this->cbconfig->item('attendance_end_time'); ?> , 출석포인트 : <?php echo $this->cbconfig->item('attendance_point') ?>점</p>
            <!-- <p class="point nomal_font02 view_policy" >포 인 트 정 책 보 기</p> -->
            
        <?php echo form_close(); ?>
        
        <!-- <div class="alert alert-dismissible alert-warning alert-point-policy point_policy">
            <button type="button" class="close alertclose" >&times;</button>
            <strong>포인트 정책</strong><br/>
            출석가능시간 : <?php echo $this->cbconfig->item('attendance_start_time'); ?> ~ <?php echo $this->cbconfig->item('attendance_end_time'); ?><br />
            <?php
            if ($this->cbconfig->item('attendance_point')) {
                echo '출석포인트 : ' . $this->cbconfig->item('attendance_point') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_1')) {
                echo '1등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_1') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_2')) {
                echo '2등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_2') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_3')) {
                echo '3등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_3') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_4')) {
                echo '4등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_4') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_5')) {
                echo '5등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_5') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_6')) {
                echo '6등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_6') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_7')) {
                echo '7등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_7') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_8')) {
                echo '8등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_8') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_9')) {
                echo '9등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_9') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_10')) {
                echo '10등포인트 : 출석포인트 + ' . $this->cbconfig->item('attendance_point_10') . '점<br />';
            }
            if ($this->cbconfig->item('attendance_point_regular') && $this->cbconfig->item('attendance_point_regular_days')) {
                echo '개근포인트 : ' . $this->cbconfig->item('attendance_point_regular') . '점, ' . $this->cbconfig->item('attendance_point_regular_days') . '일 마다 지급<br />';
            }
            ?>
        </div> -->

        <section class="atten_date"><h3 class='big_font'><?php echo element('date_format', $view); ?></h3>
        <table>
            <tr>
                <td>◀ <a href="<?php echo site_url('attendance?date=' . element('lastmonth', $view)); ?>">지난 달</a></td>
                <td><a href="<?php echo site_url('attendance'); ?>">오늘보기</a></td>
                <td><a href="<?php echo element('nextmonth', $view) ? site_url('attendance?date=' . element('nextmonth', $view)) : 'javascript:;'; ?>">다음 달</a> ▶</td>
            </tr>
        </table>
        
        <ul class="date-navigation">
            
            <?php
            for ($day = 1; $day <= element('lastday', $view); $day++) {
            ?>
                <li class="datepick <?php echo (sprintf("%02d", $day) === element('d', $view)) ? ' active' : ''; ?>" data-attendance-date="<?php echo element('ym', $view) . "-" . sprintf("%02d", $day);?>"><?php echo $day; ?></li>
            <?php
            }
            ?>
            
        </ul>
        </section>
        <div id="viewattendance"></div>
        
    
    
</article>
<script type="text/javascript">
//<![CDATA[
function view_attendance(id, date, page) {
    var list_url = cb_url + '/attendance/dailylist/' + date + '?page=' + page;
    $('#' + id).load(list_url);
}

$(document).on('click', '.datepick', function() {
    view_attendance('viewattendance', $(this).attr('data-attendance-date'), '1');
    $('.date-navigation > li').removeClass("active");
    $(this).addClass('active');
});

function attendance_page(date, page) {
    view_attendance('viewattendance', date, page);
    attendance_cur_page = page;
}

var memos = new Array();
<?php
if (element('default_memo', $view)) {
    foreach (element('default_memo', $view) as $key => $val) {
?>
    memos[<?php echo $key; ?>] = '<?php echo html_escape($val);?>';
<?php
    }
}
?>

function change_memo() {
    var r = Math.floor(Math.random() * <?php echo count(element('default_memo', $view)); ?>);
    if ($('#att_memo').val() == memos[r]) {
        change_memo();
        return;
    }
    $('#att_memo').val(memos[r]);
}
$(document).on('click', '#change_memo', change_memo);

var is_submit_attendance = false;

$(document).on('click', '#add_attendance', function() {
    if (is_submit_attendance === true) {
        return false;
    }

    is_submit_attendance = true;

    $('#attendanceform').validate();
    if ($('#attendanceform').valid()) // check if form is valid
    {
        // do some stuff
    }
    else
    {
        is_submit_attendance = false;
        return false;
        // just show validation errors, dont post
    }

    $.ajax({
        url : cb_url + '/attendance/update',
        type : 'POST',
        cache : false,
        data : $('#attendanceform').serialize(),
        dataType : 'json',
        success : function(data) {
            is_submit_attendance = false;
            if (data.error) {
                alert(data.error);
                return false;
            } else if (data.success) {
                alert(data.success);
                view_attendance('viewattendance', '<?php echo element('date', $view); ?>', '1');
            }
        },
        error : function(data) {
            is_submit_attendance = false;
            alert('오류가 발생하였습니다.');
            return false;
        }
    });
});

$(document).ready(function($) {
    view_attendance('viewattendance', '<?php echo element('date', $view); ?>', '1');
});
$(function() {
    $('#attendanceform').validate({
        rules: {
            memo : { required:true
            <?php if ($this->cbconfig->item('attendance_memo_length')) {?>
                , maxlength:<?php echo $this->cbconfig->item('attendance_memo_length'); ?>
            <?php } ?>
            }
        }
    });
});
$(document).on('click', '.view_policy', function() {
    $('.alert-point-policy').toggle();
});
//]]>
</script>
