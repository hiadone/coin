<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<article class="wrap01">
        <section class="main_title my_info">
            <h2>회 원 정 보</h2>
            <span>회원님의 정보를 알려드립니다.</span>
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
                    <td>0000</td>
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
    