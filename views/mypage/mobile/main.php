<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<section class="ham">
    <h2 class="hidden">회원,포인트정보</h2>
    <div class="ham_cont02">
        <section class="point_info">
            <h3 class="hidden">회원정보</h3>
            <ul class="info_menu">
                <li class="select_info_menu">
                    <a href="<?php echo base_url('/mypage') ?>">회원정보</a>
                </li>
                <li>
                    <a href="<?php echo base_url('/mypage/point') ?>">포인트정보</a>
                </li>
                <li>
                    <a href="<?php echo base_url('/mypage/point_provision') ?>">포인트정책</a>
                </li>

            </ul>
            
            <section>
                <h4 class="hidden">회원정보</h4>
                    <table class="mb20">
                        <tbody>    
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
                              <img src='<?php echo base_url('/assets/images/small_spoon_'.$this->member->item('mem_level').'.png') ?>' alt='spoon_img'>  <figcaption><?php echo element('member_group_name',$view);?></td></figcaption>
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
                        </tbody>
                    </table>
            <ul class="info_btn">
                <li>
                <button title="회원탈퇴" onclick="location.href='<?php echo site_url('membermodify/memberleave'); ?>';" style="margin-right: 2%;">회 원 탈 퇴</button>
                </li>
                <li>
                <button type="button" class="" title="로그아웃" onclick="location.href='<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>';"><i class="fa fa-sign-out"></i> 로그아웃</button>
                </li>
            </ul>
            
            </section>
        </section>
    </div>
</section>
