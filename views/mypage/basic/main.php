<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

        <section class="ham_cont point_info">
            <ul class="info_menu">
                  
                  <li class='active' onclick="view_mypage('view_member');">
                       <h2 style='background:url("<?php echo base_url('/assets/images/user_info03.png')?>") no-repeat center left; background-size: 19px;'>회원정보</h2>
                  </li>
                  <li class='pointer' onclick="view_mypoint('view_member');">
                      <h2 style='background:url("<?php echo base_url('/assets/images/point_info02.png')?>") no-repeat center left; background-size: 19px;'>포인트정보</h2>
                  </li>

            </ul>
            
            <span class='small_font'>회원님의 정보를 알려드립니다.</span>
            <table class="mb20">
                <tr>
                    <th style='width: 70px;'>아 이 디</th>
                    <td><?php echo html_escape($this->member->item('mem_userid')); ?></td>
                </tr>

                <tr>
                    <th style='width: 70px;'>닉 네 임</th>
                    <td><?php echo html_escape($this->member->item('mem_nickname')); ?></td>
                </tr>

                <tr>
                    <th style='width: 70px;'>포 인 트</th>
                    <td><?php echo number_format($this->member->item('mem_point')); ?> 포인트</td>
                </tr>

                <tr>
                    <th style='width: 70px;'>회 원 그 룹</th>
                    <td>
                    <figure>
                      <img style='width: 30px;' src='<?php echo base_url('/views/_layout/basic/images/spoon_'.$this->member->item('mem_level').'.png') ?>' alt='spoon_img'>  <figcaption style='height: 30px; line-height: 35px;'><?php echo element('member_group_name',$view);?></td></figcaption>
                    </figure>
                    
                </tr>

                <tr>
                    <th style='width: 70px;'>가 입 일</th>
                    <td><?php echo display_datetime($this->member->item('mem_register_datetime'), 'full'); ?></td>
                </tr>

                <tr>
                    <th style='width: 70px;'>최 근 로 그 인</th>
                    <td><?php echo display_datetime($this->member->item('mem_lastlogin_datetime'), 'full'); ?></td>
                </tr>
            </table>
            <ul class="info_btn">
                <ul>
                    <li>
                        <button class='' title="회원탈퇴" onclick="view_memberleave('view_member');">회 원 탈 퇴</button>
                    </li>

                    <li>
                        <button class='' title="로그아웃" onclick="location.href='<?php echo site_url('login/logout?url=' . urlencode(site_url())); ?>';">로 그 아 웃</button>
                    </li>
                </ul>
                
            </ul>
            
        </section>
    
