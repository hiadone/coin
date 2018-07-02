<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<section class="ham foot_padding">
    <h2 class="hidden">회원,포인트정보</h2>
    <div id="view_member" class="ham_cont02">
        <section class="point_info">
            <h3 class="hidden">포인트정보</h3>
            <ul class="info_menu">
                <li>
                    <a href="<?php echo base_url('/mypage') ?>">회원정보</a>
                </li>
                <li class="select_info_menu">
                    <a href="<?php echo base_url('/mypage/point') ?>">포인트정보</a>
                </li>
                <li>
                    <a href="<?php echo base_url('/mypage/point_provision') ?>">포인트정책</a>
                </li>

            </ul>
            <section>
            
                <div class='point_info_cont'>
                    <img src='<?php echo base_url('/views/_layout/mobile/images/spoon_'.$this->member->item('mem_level').'.png') ?>' alt='spoon_img' >

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
                <table class="point_accu">
                    <tbody>
        
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
                                <td ><?php echo display_datetime(element('poi_datetime', $result)); ?></td>
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
            </section>
                
        </section>

    </div>
</section>