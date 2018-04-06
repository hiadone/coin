

<style>

</style>



<article class="wrap01">
   <!--<section class="loing_join">
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
    </section>-->

    <section class='point_info info_area'>
       <ul>
            <li class='active'>
                <h2 style='background:url("http://cmy.bitcoissue.com/assets/images/point_info01.png") no-repeat center left; background-size: 19px;'>포인트정보</h2>
            </li>

            <li>
                 <h2 style='background:url("http://cmy.bitcoissue.com/assets/images/user_info04.png") no-repeat center left; background-size: 19px;'>회원정보</h2>
            </li>
       </ul>

       <div class='point_info_cont'>
            <img src='http://cmy.bitcoissue.com/assets/images/spoon_1.png' alt='grade'>

            <div class='my_point'>
                <h3>현재 포인트</h3>
                <strong>5,000 P</strong>
            </div>

            <div class='dis_point'>
                <div>
                    <h3 class='normal_font'>소멸 예정 포인트</h3>
                    <strong>
                        300 P
                    </strong>
                </div>
                <img class='point_more' src='http://cmy.bitcoissue.com/assets/images/point_more.png' alt='point_more'>
            </div>
        </div>

       <span class='small_font'>최근 3개월간 적립/사용 내역입니다.</span>

        <table>
            <tr>
                   <th>날 짜</th>
                   <th class='table_cont'>내 용</th>
                   <th>적립/사용</th>
            </tr>

            <tr>
                   <td>15.11.05</td>
                   <td class='table_cont'>최근 3개월간 사용한 내역입니다..</td>

                   <td>
                       <figure>
                           <img src='http://cmy.bitcoissue.com/assets/images/add.png' alt='add'>
                           <figcaption>200P</figcaption>
                       </figure>
                   </td>
            </tr>

            <tr>
                   <td>15.11.05</td>
                   <td class='table_cont'>최근 3개월간 사용한 내역입니다..</td>
                   
                   <td>
                       <figure>
                           <img src='http://cmy.bitcoissue.com/assets/images/down.png' alt='down'>
                           <figcaption>200P</figcaption>
                       </figure>
                   </td>
            </tr>

            <tr>
                   <td>15.11.05</td>
                   <td class='table_cont'>최근 3개월간 사용한 내역입니다..</td>
                   
                   <td>
                       <figure>
                           <img src='http://cmy.bitcoissue.com/assets/images/add.png' alt='down'>
                           <figcaption>200P</figcaption>
                       </figure>
                   </td>
            </tr>

            <tr>
                   <td>15.11.05</td>
                   <td class='table_cont'>최근 3개월간 사용한 내역입니다..</td>
                   
                   <td>
                       <figure>
                           <img src='http://cmy.bitcoissue.com/assets/images/down.png' alt='down'>
                           <figcaption>200P</figcaption>
                       </figure>
                   </td>
            </tr>

            <tr>
                   <td>15.11.05</td>
                   <td class='table_cont'>최근 3개월간 사용한 내역입니다..</td>
                   
                   <td>
                       <figure>
                           <img src='http://cmy.bitcoissue.com/assets/images/down.png' alt='down'>
                           <figcaption>200P</figcaption>
                       </figure>
                   </td>
            </tr>
        </table>
    </section>
</article>
