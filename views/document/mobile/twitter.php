<?php //$this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<style>

.cover {display: block;position:fixed;top:0;right:0;width:100%;height:100%;overflow:hidden;z-index:9999;margin:0;background-color: rgba( 0, 0, 0, 0.5 );display:none}
</style>
<script>
    
    

    // 전체 스크립트 
    $(document).ready(function(){
        // 인물트위터 , 코인공식트위터 , 거래소 더보기 영역 스크립트
            // 인물트위터 , 코인공식트위터 , 거래소 더보기 버튼 클릭시 cover
                

            // 인물트위터 , 코인공식트위터 , 거래소 더보기의 X 버튼 클릭시 (모든 popup메뉴 닫기)
                $('span.clear').click(function(){
                    $('.cover').hide();
                    $('.pop').animate({'opacity' : '0'} , 700);
                    $('.pop').css('display' , 'none');
                        // $('html, body').css({'overflow': 'auto', 'height': '100%'}); //scroll hidden 해제
                        $("html, body").unbind('scroll  mousewheel');
                    setTimeout(function(){
                            $('.cover_menu_sub').css({'z-index':'-100'});if(postact_flag)location.reload();
                        },700); 
                });

            // 인물트위터 더보기 클릭시 해당 팝업 보여주기
                $('.person_twitter tr:last-child td:last-child').click(function(){
                    $('.person_twitter_more').css('display' , 'block');
                    $('.person_twitter_more').animate({'opacity' : '1'} , 700);
                    view_twitter('person_twitter', 'person_twitter');
                });

            // 코인공식 트위터 더보기 클릭시 해당 팝업 보여주기
                $('.coin_twitter tr:last-child td:last-child').click(function(){
                    $('.coin_twitter_more').css('display' , 'block');
                    $('.coin_twitter_more').animate({'opacity' : '1'} , 700);
                    view_twitter('coin_twitter', 'coin_twitter');
                });

            // 거래소 더보기 클릭시 해당 팝업 보여주기
                $('.coin_trade tr:last-child td:last-child').click(function(){
                    $('.coin_trade_more').css('display' , 'block');
                    $('.coin_trade_more').animate({'opacity' : '1'} , 700);
                    view_twitter('coin_trade', 'coin_trade');
                });

            // +버튼(추가) 클릭시 체크버튼,입력란 보여주기
                $('.pop div span.plus').click(function(){
                    $(this).css('display' , 'none');                                        // +버튼 숨기기
                    $('.pop table td span').css('display' , 'none');                        
                    $('.pop div span.plus').hide();
                    $('.pop div span.minus').hide();
                    $('.pop div span.minus_check').hide();
                    $('.pop div span.plus_check').show();
                    
                    
                    $(this).parents('div').siblings('ul').slideDown();
                });

            // -버튼 or 체크버튼(추가) 클릭시
                $('.pop div span.plus_check').click(function(){
                    
                    if(twitter_action('twitter_update',$(this).data('bng_name'))){
                        
                        // $(this).siblings('span:nth-child(3)').css('display' , 'block');             
                        
                        $('.pop div span.plus').show();
                        $('.pop div span.minus').show();
                        $('.pop div span.minus_check').hide();
                        $('.pop div span.plus_check').hide();

                        $('.pop table td span').css('display' , 'none');
                        $('.pop ul').slideUp();
                        view_twitter($(this).data('bng_name'),$(this).data('bng_name'));
                        postact_flag=true;
                    }
                   
                });


                        


                $('.pop div span.minus').click(function(){
                    $('.pop table td span').css('display' , 'block');
                    // $(this).siblings('span:nth-child(3)').css('display' , 'none');
                    $('.pop div span.plus').hide();
                    $('.pop div span.minus').hide();
                    $('.pop div span.plus_check').hide();
                    $('.pop div span.minus_check').show();
                    
                    
                });

                $('.pop div span.minus_check').click(function(){
                    
                    $('.pop div span.plus_check').hide();
                    $('.pop div span.minus_check').hide();
                    $('.pop div span.plus').show();
                    $('.pop div span.minus').show();
                    $('.pop table td span').css('display' , 'none');
                   
                });

    });
</script> 


<div class="foot_padding">

    <section class="mb40">
        <h3 class="hidden"><?php echo html_escape(element('board_name', element('board', element('list', $view))));?></h3>
        
        <?php 
        if (element('menu', $layout)) {
            $menu = element('menu', $layout);
            echo '<ul class="nav nav-sub nav-pills nav-justified ">';
            if (element(element(0,element('active',$menu)), $menu)) {
                
                foreach (element(element(0,element('active',$menu)),$menu) as $mkey => $mval) {

                    $active='';
                
                    if(element(1,element('active',$menu)) === element('men_id',$mval)) {
                        
                        $active='active';
                    }

                
                    echo '<li class="'.$active.'" ><a href="'.base_url(element('men_link',$mval)).'">'.element('men_name',$mval).'</a></li>';
                    echo "\n";
                }
                
            }
            echo '</ul>';
        }
        ?>
        <section>
            <!-- 가상화폐 인물 트위터 리스트 영역-->
            <h3 class="hidden">트위터</h3>
                <section class="table_li person_twitter">
                <h4>가상화폐 인물 트위터</h4>
                <table>
                    <?php echo twitter("person_twitter",'order',11,"<td>","</td>") ?>
                </table>
            </section>

        <!-- 가상화폐 코인 공식 트위터 리스트 영역-->
            <section class="table_li coin_twitter">
                <h4>가상화폐 코인 공식 트위터</h4>
                <table>
                    <?php echo twitter("coin_twitter",'order',15,"<td>","</td>") ?>
                </table>
            </section>

        <!-- 거래소 바로가기 리스트 영역 -->
            <section class="table_li coin_trade">
                <h4>거래소 바로가기</h4>
                <table>
                    <?php echo twitter("coin_trade",'order',11,"<td>","</td>") ?>
                </table>
            </section>

        <!-- ad 영역 -->
            <!-- <section class="ad">
               
                <script src="https://zone5.adpopcon.com/cgi-bin/PelicanC.dll?impr?pageid=08yC&out=script"></script>
            </section> -->

        <!-- N버튼 영역 -->
        </article>
    </section>
</div>
<!-- 인물트위터 더보기 클릭시 팝업 내용-->


<div  class="cover">
    <section class="person_twitter_more pop">
        <?php
        $attributes = array('name' => 'ftwitterlist', 'id' => 'ftwitterlist');
        echo form_open('', $attributes);
        ?>
        <!-- 타이틀 영역 -->
        <div class="header">
            <span class="clear">
                <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
            </span>

            <h2>인 물 트 위 터</h2>

            <span data-bng_name="person_twitter"  class="plus" style="margin-right:2%">
                <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
            </span>
            <span data-bng_name="person_twitter"  class="minus">
                <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
            </span>
            <span data-bng_name="person_twitter"  style="display:none;float: right;" class="plus_check">
                <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
            </span>
            <span data-bng_name="person_twitter"  style="display:none;float: right;" class="minus_check">
                <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
            </span>
        </div>
        <!-- +버튼 클릭시 , 추가 입력란 영역--> 
        <ul>
            <li><input type="text" name="ban_title_person_twitter" placeholder="인물 트위터 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='인물 트위터 명을 입력해주세요.'">
            </li>
            <li><input type="text" name="ban_url_person_twitter" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
            </li>
        </ul>
        <!-- 리스트 영역-->
        <div id="person_twitter">
        </div>
    </section>

<!-- 코인 공식트위터 더보기 클릭시 팝업 내용-->
    <section class="coin_twitter_more pop">
        <!-- 타이틀 영역 -->
        <div class="header">
            <span class="clear">
                <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
            </span>

            <h2>코인 공식 트위터</h2>
            <span data-bng_name="coin_twitter"  class="plus" style="margin-right:2%">
                <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
            </span>
            <span data-bng_name="coin_twitter"  class="minus">
                <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
            </span>
            <span data-bng_name="coin_twitter"  style="display:none;float: right;" class="plus_check">
                <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
            </span>
            <span data-bng_name="coin_twitter"  style="display:none;float: right;" class="minus_check">
                <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
            </span>

            

            
        </div>
        <!-- +버튼 클릭시 , 추가 입력란 영역--> 
        <ul>
            <li><input type="text" name="ban_title_coin_twitter" placeholder="코인 공식 트위터 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='코인 공식 트위터 명을 입력해주세요.'">
            </li>
            <li><input type="text" name="ban_url_coin_twitter" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
            </li>
        </ul>
        <!-- 리스트 영역-->
        <div id="coin_twitter">
        </div>
    </section>


<!-- 거래소 바로가기 더보기 클릭시 팝업 내용-->
    <section class="coin_trade_more pop">
        <!-- 타이틀 영역 -->
        <div class="header">
            <span class="clear">
                <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
            </span>

            <h2>거래소 바로가기</h2>

            <span data-bng_name="coin_trade"  class="plus" style="margin-right:2%">
                <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
            </span>
            <span data-bng_name="coin_trade"  class="minus">
                <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
            </span>
            <span data-bng_name="coin_trade"  style="display:none;float: right;" class="plus_check">
                <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
            </span>
            <span data-bng_name="coin_trade"  style="display:none;float: right;" class="minus_check">
                <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
            </span>

            
            
        </div>
        <!-- +버튼 클릭시 , 추가 입력란 영역--> 
        <ul>
            <li><input type="text" name="ban_title_coin_trade" placeholder="거래소 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='거래소 명을 입력해주세요.'">
            </li>
            <li><input type="text" name="ban_url_coin_trade" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
            </li>
        </ul>
        <div id="coin_trade">
        </div>
        <!-- 리스트 영역-->
        <?php echo form_close(); ?>        
    </section>
</div>





<script type="text/javascript">
    //<![CDATA[
    function view_twitter(id,twitter_key) {
        var list_url = cb_url + '/main/twitter/' + twitter_key;
        $('#' + id).load(list_url);
        $('.pop div span.plus').show();
        $('.pop div span.minus').show();
        $('.pop div span.plus_check').hide();
        $('.pop div span.minus_check').hide();
        $('.pop ul').slideUp();
        $('.cover').show();
        postact_flag = false;
    }

   

    function twitter_action(action_type, bng_name, msg) {
        var flag=false;
        var href;
        if ( action_type == '') {
            return false;
        }
        if ( msg) {
            if ( ! confirm(msg)) { return false; }
        }
        href = cb_url + '/postact/' + action_type + '/' + bng_name;
        var $that = $(this);
        $.ajax({
            async: false,
            url : href,
            type : 'post',
            data :  $('#ftwitterlist').serialize() + '&csrf_test_name=' + cb_csrf_hash,
            dataType : 'json',
            success : function(data) {
                if (data.error) {
                    alert(data.error);
                    flag = false;
                } else if (data.success) {
                    flag = true;
                }
            }
        });
        return flag;
    }

    function twitter_delete(ban_id,bng_name) {
        var flag=false;
        var href;
        if ( ban_id < 1) {
            return false;
        }
        
        href = cb_url + '/postact/twitter_delete/' + ban_id;
        var $that = $(this);
        $.ajax({
            async: false,
            url : href,
            type : 'get',
            dataType : 'json',
            success : function(data) {
                if (data.error) {
                    alert(data.error);
                    postact_flag = false;
                    return ;
                } else if (data.success) {
                    view_twitter(bng_name,bng_name);
                    postact_flag  = true;
                    return ;
                }
            }
        });
        return ;
    }
    //]]>
</script>
