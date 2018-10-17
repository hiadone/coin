<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<section class="ham foot_padding">
    <h2 class="hidden">회원,포인트정보</h2>
    <div id="view_member" class="ham_cont02">
        <section class="point_info">
            <h3 class="hidden">포인트 정책</h3>
            <ul class="info_menu">
                <li>
                    <a href="<?php echo base_url('/mypage') ?>">회원정보</a>
                </li>
                <li >
                    <a href="<?php echo base_url('/mypage/point') ?>">포인트정보</a>
                </li>
                <li class="select_info_menu">
                    <a href="<?php echo base_url('/mypage/point_provision') ?>">포인트정책</a>
                </li>

            </ul>
            <section class="point_rule">
                <h4>※ 포인트 적립 안내</h4>
                <table class="point_rule_table">
                <thead>
                        <tr>
                            <th>게시판</th>
                            <th>글쓰기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>가입인사(최초 1번)</td>
                            <td style="text-align: right;padding-right:20%;">100 포인트</td>
                        </tr>
                        <tr>
                            <td>출석 체크(하루 1번)</td>
                            <td style="text-align: right;padding-right:20%;">20 포인트</td>
                        </tr>
                        <tr>
                            <td>게시글 작성(하루 3번)</td>
                            <td style="text-align: right;padding-right:20%;">20 포인트</td>
                        </tr>
                        <tr>
                            <td>댓글 작성(하루 3번)</td>
                            <td style="text-align: right;padding-right:20%;">10 포인트</td>
                        </tr>
                    </tbody>
                </table>
                <h4>※ 등급 정책 및 보상 안내</h4>
                <table class="point_rule_table">
                <thead>
                        <tr>
                            <th style="width:30%;">등급 구분</th>
                            <th>등급 포인트</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/small_spoon_5.png')?>" alt="VVIP">VVIP</td>
                            <td style="text-align: right;padding-right:5%;">70,000 포인트 이상</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/small_spoon_4.png')?>" alt="VIP">VIP</td>
                            <td style="text-align: right;padding-right:5%;">8,000 ~ 69,999 포인트</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/small_spoon_3.png')?>" alt="GOLD">GOLD</td>
                            <td style="text-align: right;padding-right:5%;">1,000 ~ 7,999 포인트</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/small_spoon_2.png')?>" alt="SILVER">SILVER</td>
                            <td style="text-align: right;padding-right:5%;">500 ~ 999 포인트</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/small_spoon_1.png')?>" alt="NEW">NEW</td>
                            <td style="text-align: right;padding-right:5%;">0 ~ 499 포인트</td>
                        </tr>
                    </tbody>
                </table>
                

            </section>
        </section>
    </div>
</section>