<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<article class="wrap01">
        <section class="info_area main_title my_info">
            <ul>
                  
                  <li class='active' onclick="location.href='<?php echo site_url('/mypage'); ?>';">
                       <h2 style='background:url("/assets/images/user_info03.png") no-repeat center left; background-size: 19px;'>회원정보</h2>
                  </li>
                  <li onclick="location.href='<?php echo site_url('/mypage/point'); ?>';">
                      <h2 style='background:url("/assets/images/point_info02.png") no-repeat center left; background-size: 19px;'>포인트정보</h2>
                  </li>

            </ul>
            
            <span class='small_font'>회원님의 정보를 알려드립니다.</span>
            <table>
                <tr>
                    <th>아 이 디</th>
                    <td><?php echo html_escape($this->member->item('mem_userid')); ?></td>
                </tr>

                <tr>
                    <th>닉 네 임</th>
                    <td><?php echo html_escape($this->member->item('mem_nickname')); ?></td>
                </tr>

                <tr>
                    <th>포 인 트</th>
                    <td><?php echo number_format($this->member->item('mem_point')); ?> 포인트</td>
                </tr>

                <tr>
                    <th>회 원 그 룹</th>
                    <td>
                    <figure>
                      <img src='<?php echo base_url('/views/_layout/basic/images/spoon_'.$this->member->item('mem_level').'.png') ?>' alt='spoon_img'>  <figcaption><?php echo element('member_group_name',$view);?></td></figcaption>
                    </figure>
                    
                </tr>

                <tr>
                    <th>가 입 일</th>
                    <td><?php echo display_datetime($this->member->item('mem_register_datetime'), 'full'); ?></td>
                </tr>

                <tr>
                    <th>최 근 로 그 인</th>
                    <td><?php echo display_datetime($this->member->item('mem_lastlogin_datetime'), 'full'); ?></td>
                </tr>
            </table>
            <div>
                <button title="회원탈퇴" onclick="location.href='<?php echo site_url('membermodify/memberleave'); ?>';" style="margin-right: 2%;">회 원 탈 퇴</button>
                <button type="button" class="" title="로그아웃" onclick="location.href='<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>';"><i class="fa fa-sign-out"></i> 로그아웃</button>
            </div>
            
        </section>
    </article>
