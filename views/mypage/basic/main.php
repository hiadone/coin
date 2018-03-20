<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<section class="ham_info" >
    <h2>회 원 정 보</h2>
    <span class='small_font'>회원님의 정보를 알려 드립니다.</span>

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
                    <img src='<?php echo element('layout_skin_url', $layout); ?>/images/gold_spoon.png' alt='gold_spoon_img'>
                    <figcaption><?php echo element('member_group_name',$view);?></figcaption>
                </figure>
                
            </td>
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

    <ul>
        <li>
            <button class='' title="회원탈퇴" onclick="view_memberleave('view_member');">회 원 탈 퇴</button>
        </li>

        <li>
            <button class='' title="로그아웃" onclick="location.href='<?php echo site_url('login/logout?url=' . urlencode(site_url())); ?>';">로 그 아 웃</button>
        </li>
    </ul>
</section>