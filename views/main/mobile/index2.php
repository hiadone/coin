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

    <section class='main_title store_item'>
        <h2 style="margin-bottom:0;">상 품 설 명</h2>

        <div class='item_info'>
            <figure>
                <figcaption>
                    <h3>빙그레 바나나맛 우유(CU)</h3>
                </figcaption>

                <img src='http://cmy.bitcoissue.com/assets/images/store_thum03.png' alt='store_thum01'>
            </figure>

            <ul>
                <li>
                    <h4>사용가능 포인트</h4>
                    <strong>5,000 P</strong>
                </li>

                <li>
                    <h4>결제 포인트</h4>
                    <strong>1,300 P</strong>
                </li>

                <li>
                    <h4>교환처</h4>
                    <p>CU 편의점</p>
                </li>

                <li>
                    <h4>유효기간</h4>
                    <p>구입후 <span>30일</span>이내</p>
                </li>
            </ul>
        </div>

        <div class='item_detail'>
            <h3>상세설명</h3>
            <p>
                이용안내 : 전국 GS25에서 상품 교환이 가능합니다.
                유의사항 : GS25 매장내 행사(1＋1, 2＋1등) 증정상품 적용 불가
                사용불가매장 : 본 쿠폰은 GS25 매장 중 일부 특수점포에서는 사용이 불가합니다.
                           (군부대 PX점포 및 고속도로 휴게서 점포 등)이 점 양해 바랍니다.
            </p>
        </div>

        <div class='item_buy'>
           <input type='tel' placeholder="전송 받으실 전화번호를 입력해 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='전송 받으실 전화번호를 입력해 주세요.'">

           <strong class='small_font'>
               ※ 포인트 구매후 환불이 되지 않으니,꼭! 전화번호와 상품 확인 후<br>구매하기 버튼을 클릭해 주세요.
           </strong>

           <button>구 매 하 기</button>
        </div>
    </section>
</article>
