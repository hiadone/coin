<script>
    $(document).ready(function(){
            $('.point_disappear').css('height' , $(window).height() + 125);
            $('.point_more').click(function(){
                $('.point_disappear').fadeIn();
                $('.point_disappear').css('z-index' , '20000000');
            });


            $('.point_clear').click(function(){
                $('.point_disappear').fadeOut();
                $('.point_disappear').css('z-index' , '-20000000');
            });
    }); 
</script>

<style>

</style>

<section class='main_title point_disappear'>
    <h2>
        소멸 예정 포인트
        <span class='point_clear'>
            <img src='http://cmy.bitcoissue.com/assets/images/clear02.png' alt='clear02'>
        </span>
    </h2>

    <span>소멸예정 인 포인트 를 확인하실 수 있습니다.</span>

    <div class='point_notice'>
           <h3>※ 소멸 예정포인트 유의사항 ※</h3>
           <p>
            유효기간은 적립일로부터 <strong class='big_font'>1년</strong> 입니다.
            <br>
            <br>
            유효기간이 지나면 적립 "월" 기준으로<br>
            순차적으로 익월 1일 00시에 소멸됩니다.
            <br>
            <br>
            포인트에 관한 기타 문의는 <br>고객센터에 문의해 주세요. 
           </p>
    </div>

    <table>
           <tr>
               <th>소멸예정 일시</th>
               <th>소멸예정 포인트</th>
           </tr>

           <tr>
               <td>2018년 00월</td>
               <td class='small_font'><strong class='big_font'>1,000</strong> 포인트</td>
           </tr>

           <tr>
               <td>2018년 00월</td>
               <td class='small_font'><strong class='big_font'>5,000</strong> 포인트</td>
           </tr>

           <tr>
               <td>2018년 00월</td>
               <td class='small_font'><strong class='big_font'>300</strong> 포인트</td>
           </tr>

           <tr>
               <td>2018년 00월</td>
               <td class='small_font'><strong class='big_font'>1,000</strong> 포인트</td>
           </tr>

           <tr>
               <td>2018년 00월</td>
               <td class='small_font'><strong class='big_font'>5,000</strong> 포인트</td>
           </tr>
    </table>
</section>

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
