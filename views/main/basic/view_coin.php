<?php 
$vic_name = array("bitcoin"=>"비트코인",
                    "ethereum"=>"이더리움",
                    "ripple"=>"리 플",
                    "bitcoin-cash"=>"비트코인 캐쉬",
                    "litecoin"=>"라이트코인",
                    "dash"=>"대 시",
                    "monero"=>"모네로",
                    "ethereum-classic"=>"이더리움 클래식",
                    "zcash"=>"제트캐시",
                    "qtum"=>"큐 텀",
                    "eos"=>"EOS"
                    );

$last = $this->uri->total_segments();
$last_segment = $this->uri->segment($last);

?>  

<section class='tab' id='coin_mall'>
    <ul class='menu_list nomal_font02'>
        <li class="active">
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/bitcoin.png' alt='bitcoin_logo'>
                <figcaption>
                    비트코인
                </figcaption>
            </figure>
        </li>

        <li style='width: 88px;'>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/ethereum.png' alt='bitcoin_logo'>
                <figcaption>
                    이더리움
                </figcaption>
            </figure>
        </li>

        <li style='width: 85px;'>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/ripple.png' alt='bitcoin_logo'>
                <figcaption>
                    리플
                </figcaption>
            </figure>
        </li>
        
        <li style='width: 118px;'>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/bitcoin-cash.png' alt='bitcoin_logo'>
                <figcaption>
                    비트코인캐시
                </figcaption>
            </figure>
        </li>


        <li style='width: 108px;'>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/litecoin.png' alt='bitcoin_logo'>
                <figcaption>
                    라이트코인
                </figcaption>
            </figure>
        </li>

        <li>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/eos.png' alt='bitcoin_logo'>
                <figcaption>
                    아오스
                </figcaption>
            </figure> 
        </li>

        <li> 
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/monero.png' alt='bitcoin_logo'>
                <figcaption>
                모네로
                </figcaption>
            </figure>
        </li>

        <li style='width: 85px;'>
           <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/dash.png' alt='bitcoin_logo'>
                <figcaption>
                   대시
                </figcaption>
            </figure>  
        </li>

        <li style='width: 125px;'>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/ethereum-classic.png' alt='bitcoin_logo'>
                <figcaption>
                    이더리움 클래식
                </figcaption>
            </figure>
        </li>

        <li style='width: 85px;'>
            <figure>
                <img src='http://www.bitcoissue.com/views/_layout/basic/images/store_logo/qtum.png' alt='bitcoin_logo'>
                <figcaption>
                    큐 텀
                </figcaption>
            </figure>
        </li>
    </ul>

    <table class='coin_title nomal_font02'>
        <tr>
            <th>거 래 소</th>
            <th>가 격 <span class='small_font'>(원)</span></th>
            <th>비 트 코 인</th>
            <th>달 러</th>
            <th>달 러 <span class='small_font'>(원)</span></th>
            <th>프 리 미 엄</th>
            <th>변 동 률 <span class='small_font'>(24시)</span></th>
            <th>시 가 총 액</th>
            <th>거 래 량 <span class='small_font'>(24시)</span></th>
        </tr>
    </table>

    <div class='tab_cont' style='padding:0;'>
        <div>
            <table class='coin_cont nomal_font02'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div>
            <table class='coin_cont'>
                <tr>
                    <td>빗 썸</td>
                    <td>\25,000</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td>1111</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>1111</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>업비트</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>코인원</td>
                    <td>\25,000</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td>3333</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>3333</td>
                    <td>3333</td>
                </tr>

                <tr>
                    <td>코 빗</td>
                    <td>\20,000</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td>2222</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+3%</td>
                    <td>2222</td>
                    <td>2222</td>
                </tr>

                <tr>
                    <td>플라이어</td>
                    <td>\20,000</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td>4444</td>
                    <td class='premium nomal_font02'>10%</td>
                    <td class='rate nomal_font02'>▲+6%</td>
                    <td>4444</td>
                    <td>4444</td>
                </tr>

                <tr>
                    <td>바이낸스</td>
                    <td>\20,000</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td>5555</td>
                    <td class='premium nomal_font02'>6%</td>
                    <td class='rate nomal_font02 minus'>▼-8%</td>
                    <td>5555</td>
                    <td>5555</td>
                </tr>

                <tr>
                    <td>파이넥스</td>
                    <td>\25,000</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td>6666</td>
                    <td class='premium nomal_font02'>25%</td>
                    <td class='rate nomal_font02 minus'>▼-5%</td>
                    <td>6666</td>
                    <td>-</td>
                </tr>
            </table>
        </div>
    </div>
</section>

<!--  <section class="coin_mall">
        <table>
            <tr>
                <th>코인명</th>
                <th>가격(원)</th>
                <th>비트코인</th>
                <th>달러</th>
                <th>달러(원)</th>
                <th>프리미엄</th>
                <th>번동률(24시)</th>
                <th>시가총액</th>
                <th>거래량(24시)</th>
            </tr>
            <?php 
            foreach(element('coin_list',$view) as $key => $value){ ?>

                <div id="tab01_<?php echo $key ?>" class="tab01_cont cont" style="display:none">
                    <table>
                <?php foreach($value as $key_ => $value_){ 
                    // if($key_==="bitfinex") continue;
                    ?>
                    <tr>
                        <td><?php echo element($key_,element('vic_type',$view)); ?></td>

                        <td class='text-right'><?php echo !empty(element('current_price',$value_)) ? $unit.number_format(element('current_price',$value_)) : '-'; ?></td>


                        <?php 
                        if(!empty(element('open_price',$value_))) {
                            if((element('current_price',$value_) - element('open_price',$value_)) > 0)
                                echo "<td class='text-right' style='color:red;'>▲ ";
                            else echo "<td class='text-right' style='color:blue;'>▼ ";
                            echo number_format((element('current_price',$value_) - element('open_price',$value_))/element('open_price',$value_) *100,2).' %' ;
                        }else {
                            echo "<td>-";
                        }
                        ?>  
                        </td>
                        
                        <?php 
                        if(empty(element('kprime',$value_))){
                            echo '<td class="text-right">-';
                        } else {
                            if(element('kprime',$value_)>0)
                                echo '<td class="text-right" style="color:blue;">';
                            else 
                                echo '<td class="text-right" style="color:green;">';

                            echo number_format(element('kprime',$value_)*100,2).' %' ;
                        }
                            
                        ?> 
                        </td>
                    </tr>
                <?php } ?>
                    </table>
                </div>
            <?php } ?>

            <tr>
                <td>
                    <figure>
                        <img src="<?php echo site_url('/views/_layout/basic/images/store_logo/bitcoin.png');?>" alt="bitcoin_logo_img">
                        <figcaption>비트코인</figcaption>
                    </figure>
                </td>
                <td>12,850,000</td>
                <td>1.0000000</td>  
                <td>10,800</td> 
                <td>11,707,256</td>
                <td>1,142,743(9.76%)</td>   
                <td>-0.66%</td>
                <td>198조585억</td>
                <td>9조1,422억</td>   
            </tr>
        </table>
    </section> -->