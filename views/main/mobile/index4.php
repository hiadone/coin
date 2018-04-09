<article class="wrap01">
   <!-- <section class="loing_join">
        <ul class="small_font">
            <?php
            if($this->member->is_member()){
                echo '<li onClick=\'location.href="'.site_url('mypage').'";\'  title="마이페이지">
                <figure><img src="'.base_url('assets/images/spoon_'.$this->member->item('mem_level').'.png').'" alt="spoon"><figcaption>'.$this->member->item('mem_nickname').
                '</figcaption></figure></li>';
                echo '<li>|</li>';
                echo '<li>포인트 '.number_format($this->member->item('mem_point')).'P</li>';
                echo '<li>|</li>';
                 echo '<li onClick=\'location.href="'.site_url('mypage').'";\'>회원정보</li>';
                 echo '<li>|</li>';
                 echo '<li onClick=\'location.href="'.site_url('login/logout?url=' . urlencode(current_full_url())).'";\'  title="로그아웃">로그아웃</li>';
            } else {


                echo '<li style="width:49%; text-align:right; padding-right:3%;" onClick=\'location.href="'.site_url('login?url=' . urlencode(current_full_url())).'";\'  title="로그인" style="text-align:right;">로 그 인</li>';
                echo '<li>|</li>';
                echo '<li style="width:49%; text-align:left; padding-left:3%;" onClick=\'location.href="'.site_url('login?url=' . urlencode(current_full_url())).'";\'  title="회원가입" style="text-align:left;"">회 원 가 입</li>';
            }
            ?>
            
            
        </ul>
    </section> -->

    <section class='info_area my_info main_title'>
      <ul class='info_menu_tab'>
            <li>
                <h2 style='background:url("http://cmy.bitcoissue.com/assets/images/point_info02.png") no-repeat center left; background-size: 19px;'>포인트정보</h2>
            </li>

            <li class='active'>
                 <h2 style='background:url("http://cmy.bitcoissue.com/assets/images/user_info03.png") no-repeat center left; background-size: 19px;'>회원정보</h2>
            </li>
      </ul>

      <span class='small_font'>회원님의 정보를 알려 드립니다.</span>

      <table>
          <tr>
            <th>아 이 디</th>
            <td>admin</td>
          </tr>

          <tr>
            <th>닉 네 임</th>
            <td>관리자</td>
          </tr>

          <tr>
            <th>포 인 트</th>
            <td>500,925 포인트</td>
          </tr>

          <tr>
            <th>회 원 그 룹</th>
            <td>
              <figure>
                <img src="http://cmy.bitcoissue.com/views/_layout/basic/images/spoon_100.png" alt="spoon_img">  <figcaption>하이애드원</figcaption></figure>
            </td>
          </tr>

          <tr>
            <th>가 입 일</th>
            <td>01-08 11:42</td>
          </tr>

          <tr>
            <th>최 근 로 그 인</th>
            <td>09:34</td>
          </tr>
      </table>

      <div>
        <button title="회원탈퇴" onclick="location.href='http://cmy.bitcoissue.com/membermodify/memberleave';" style="margin-right: 2%;">회 원 탈 퇴</button>
        <button type="button" class="" title="로그아웃" onclick="location.href='http://cmy.bitcoissue.com/login/logout?url=http%3A%2F%2Fcmy.bitcoissue.com%2Fmypage';"><i class="fa fa-sign-out"></i> 로그아웃</button>
      </div>

    </section>

</article>
