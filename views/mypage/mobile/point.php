<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<article class="wrap01">
    <section class='point_info info_area'>
        <ul class='info_menu_tab'>
            <li  onclick="location.href='<?php echo site_url('/mypage'); ?>';">
                 <h2 style='background:url("<?php echo base_url('/assets/images/user_info04.png')?>") no-repeat center left; background-size: 19px;'>회원정보</h2>
            </li>
            <li class='active' onclick="location.href='<?php echo site_url('/mypage/point'); ?>';">
                <h2 style='background:url("<?php echo base_url('/assets/images/point_info01.png')?>") no-repeat center left; background-size: 19px;'>포인트정보</h2>
            </li>
        </ul>

        <div class='point_info_cont'>
            <img src='<?php echo base_url('/views/_layout/basic/images/spoon_'.$this->member->item('mem_level').'.png') ?>' alt='spoon_img' >

             <div class='my_point'>
                 <h3>현재 포인트</h3>
                 <strong><?php echo number_format($this->member->item('mem_point')); ?> P</strong>
             </div>

             <div class='dis_point'>
                 <div>
                     <h3 class='normal_font'>소멸 예정 포인트</h3>
                     <strong>
                         0 P
                     </strong>
                 </div>
                <img class='point_more' src='<?php echo base_url('/assets/images/point_more.png')?>' alt='point_more'>
             </div>
         </div>
        
        <span class='small_font'>최근 3개월간 적립/사용 내역입니다.</span>

        <table>
            <tr>
               <th>날 짜</th>
               <th class='table_cont'>내 용</th>
               <th>적립/사용</th>
            </tr>
            
            <?php
            if (element('list', element('data', $view))) {
                foreach (element('list', element('data', $view)) as $result) {
            ?>
                <tr>
                    <td><?php echo display_datetime(element('poi_datetime', $result)); ?></td>
                    <td class='table_cont'><?php echo html_escape(element('poi_content', $result)); ?></td>
                    <td>
                        <figure>
                            <?php 
                                if(element('poi_point', $result) > 0)
                                    echo '<img src="'.base_url('/assets/images/add.png').'" alt="add">';
                                 else 
                                    echo '<img src="'.base_url('/assets/images/down.png').'" alt="down">';
                             ?>
                            
                            <figcaption><?php echo number_format(abs(element('poi_point', $result))); ?> P</figcaption>
                        </figure>
                    </td>
                    
                </tr>
            <?php
                }
            }
            if ( ! element('list', element('data', $view))) {
            ?>
                <tr>
                    <td colspan="3" class="nopost">회원님의 포인트 내역이 없습니다</td>
                </tr>
            <?php
            }
            ?>

        </table>
        <nav class='mo_pager'><?php echo element('paging', $view); ?></nav>
    </div>

