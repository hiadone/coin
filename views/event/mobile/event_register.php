<?php
            if ($this->cbconfig->item('use_sociallogin')) {
                $this->managelayout->add_js(base_url('assets/js/social_login.js'));
                }
            if ($this->cbconfig->item('use_selfcert') && ($this->cbconfig->item('use_selfcert_phone') OR $this->cbconfig->item('use_selfcert_ipin'))) {
                    $this->managelayout->add_js(base_url('assets/js/member_selfcert.js'));
                }
            ?>
    
    <style>
        @font-face {
          font-family: 'Jeju Gothic';
          font-style: normal;
          font-weight: 400;
          src: url(http://fonts.gstatic.com/ea/jejugothic/v3/JejuGothic-Regular.eot);
          src: url(http://fonts.gstatic.com/ea/jejugothic/v3/JejuGothic-Regular.eot?#iefix) format('embedded-opentype'),
          url(http://fonts.gstatic.com/ea/jejugothic/v3/JejuGothic-Regular.woff2) format('woff2'),
          url(http://fonts.gstatic.com/ea/jejugothic/v3/JejuGothic-Regular.woff) format('woff'),
          url(http://fonts.gstatic.com/ea/jejugothic/v3/JejuGothic-Regular.ttf) format('truetype');
      }

              *{
                margin:0;
                padding:0;
            }

            #event_wrap{
                width: 100%;
                max-width: 700px;
                min-width: 300px;
                padding:5px;
                margin: 0 auto;
                text-align: center;
                box-sizing: border-box;
            }

            #event_wrap > img{
                width: 100%;
            }

            #event_form{
                position: relative;
                background: url('<?php echo base_url('/assets/images/bitissue_event_02.png') ?>') no-repeat top center;
                background-size: 100%;
                padding:0 11%;
                box-sizing: border-box;
            }

            #event_form form input{
                width: 100%;
                height: 35px;
                padding:0 2%; 
                box-sizing: border-box;
                margin-bottom: 10px;
                outline: none;
            }

            #event_form form span{
                display: inline-block;
                line-height: 15px;
                color: #a61e24;
                font-family: 'Jeju Gothic', sans-serif;
                margin-bottom: 15px;
            }

            #event_form h2 {
                font-family: 'Jeju Gothic', sans-serif;
                text-align: center;
                margin-bottom: 10px;
                font-weight: normal;
            }

            #event_form ul{
                width: 100%;
            }

            #event_form li{
                list-style: none;
                overflow:hidden;
                height:35px;
                border-radius: 8px;
            }

            #event_form li img{
                width: 35px;
                float: left;
            }

            #event_form li figure{
                display: inline-block;
                text-align:center;
            }

            #event_form li figcaption{
                height: 35px;
                line-height: 38px;
                font-size: 13px;
                font-family: 'Jeju Gothic', sans-serif;
                cursor: pointer;
                float: right;
            }

            #event_form span{
                font-size: 11px;
                font-family: 'Jeju Gothic', sans-serif;
                color: #a61e24;
            }

       
            #event_form{
                top:-5px;
            }

            #event_form li{
                width: 100%;
                margin-bottom: 10px;
            }

            #event_form h2{
                font-size: 13px;
                line-height: 17px;
            }

            #img_bottom{
                top:-5px;
            }
        
    </style>
</head>

<body style="max-width:700px;">
<article class="wrap01">
    <section class="main_title write_cont" style="margin-bottom: 0px;">
        <h2 style="margin-bottom: 0px;">
            <a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" style="color: inherit;">
            이 벤 트
            </a>
        </h2>
    </section>
    <section id='event_wrap' >
            
            <img src="<?php echo base_url('/assets/images/bitissue_event_m_01.png') ?>">
            <div id="event_form">
                <?php
                $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite');
                echo form_open(base_url('/event/event_insert/'.element('post_id',element('post', $view))), $attributes);
                ?>
                    <input type="hidden" name="socialtype" id="socialtype" value="">
                    <input type="hidden" name="selfcert_type" id="selfcert_type" value="" />
                    <!-- <input type="hidden" name="redirecturl" value="<?php  echo current_full_url()?>"> -->
                    <input type='text' name="elh_mem_id" id="elh_mem_id" placeholder="추천인 닉네임 입력" onfocus="this.placeholder=''" onblur="this.placeholder='추천인 닉네임 입력'">
                    <span>추천하실 회원님을 정확히 입력해 주세요.</span>
                <?php echo form_close(); ?>

                <h2>추천인 닉네임을 입력하시고,<br> 아래 SNS로 로그인해 주세요.</h2>

                <ul>
                    <li style='background-color:#1dc800; color:#fff;'>
                        <a href="javascript:;" onClick="submitContents('naver');" title="naver 로그인" style="color:#fff;">
                        <figure>
                            <img src="<?php echo base_url('/assets/images/naver.png') ?>">
                            <figcaption>네이버 아이디로 가입</figcaption>
                        </figure>
                        </a>
                    </li>

                    <li style='background-color:#fbe300;'>
                        <a href="javascript:;" onClick="submitContents('kakao');" title="kakao 로그인">
                        <figure>
                            <img src="<?php echo base_url('/assets/images/kakao.png') ?>">
                            <figcaption>카카오톡 아이디로 가입</figcaption>
                        </figure>
                        </a>
                    </li>

                    <!-- <li style='background-color:#3b589e; color:#fff;'>
                        <a href="javascript:;" onClick="submitContents('face');" title="face 로그인" style="color:#fff;">
                        <figure>
                            <img src="<?php echo base_url('/assets/images/face.png') ?>">
                            <figcaption>페이스북 아이디로 가입</figcaption>
                        </figure>
                        </a>
                    </li> -->
                </ul>

                <span>회원 가입 시 본인 인증 절차가 진행됩니다. </span>
                
            </div>
            <img id="img_bottom" style='position: relative; ' src="<?php echo base_url('/assets/images/bitissue_event_m_03.png')?>">
    </section>
    <div id="btn_mem_selfcert_phone"></div>
</article>
</body>
</html>
<script type="text/javascript">
    //<![CDATA[
    

function submitContents(social_type) {
        
        
        var href;
        if( ! jQuery.trim($('#elh_mem_id').val()) ) {
            if ( ! confirm("닉네임을 입력하지 않으시면 500p 를 받으실 수 없습니다..\n 그래도 회원 가입 하시겠습니까?")) { return false; }
            $("input[name=socialtype]").val(social_type);
            $("#btn_mem_selfcert_phone").click();
            return false;
        } else {
            
            view_event_register(social_type);
            return false;
        }
        
    return false;
    
}

function view_event_register(social_type) {
    var flag=false;
    $("input[name=socialtype]").val(social_type);
    
    var href = cb_url + '/postact/mem_nickname_check/'+$('#elh_mem_id').val();
    


    $.ajax({
        async: false,
        url : href,
        type : 'get',
        dataType : 'json',
        success : function(data) {
            if (data.error) {
                alert(data.error);
                flag = false;
            } else {
                flag = true;
                
            }
        }
    });

    if(flag)
        $("#btn_mem_selfcert_phone").click();
    else return false;
}
    //]]>
    </script>