
	
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

		#event_wrap{
			width: 100%;
			max-width: 700px;
			min-width: 320px;
			margin: 0 auto;
			text-align: center;
			border:10px solid #005da3;
			box-sizing: border-box;
		}

		#event_wrap img{
			width: 100%;
		}

		#event_wrap form{
			width: 100%;
			padding:0 8.5%; 
			box-sizing: border-box;
			background-color: #fff;
			display: inline-block;
		}

		#event_wrap form input{
			height: 35px;
			margin-bottom: 15px;
			outline: none;
			border:1px solid #ededed;
			padding: 0 8px;
			box-sizing: border-box; 
			float: left;
		}

		#event_wrap form button{
			height: 35px;
			margin-bottom: 15px;
			font-family: 'Jeju Gothic', sans-serif;
			font-size: 15px;
			line-height: 35px;
			border: 0;
			border-radius: 10px;
			background-color:#005da3;
			color: #fff;
			float: right;
			outline: none;
		}

		#event_wrap form span{
			display: inline-block;
			width: 100%;
			text-align: center;
			font-size: 13px;
			color: #b73434;
			font-family: 'Jeju Gothic', sans-serif;
			line-height: 18px;
		}

	

	@media screen and (min-width:320px) {
 			#event_wrap form input{
			width: 100%;
		}

		#event_wrap form button{
			width: 100%;
		}
	}


	@media screen and (min-width:1000px) {
 			#event_wrap form input{
			width: 72%;
		}

		#event_wrap form button{
			width: 25%;
		}
	}

	</style>
</head>

<article class="pop">
	<section style="text-align: center;margin-top:1000px;">
    <div id="event_register" style="display: inline-block;">
   </div>
	</section>
</article>

    <input type="hidden" name="redirecturl" value="<?php  echo current_full_url()?>">
	<section id="event_wrap" style="margin-bottom: 20px;">
			<img src="<?php echo base_url('/assets/images/bitissue_event_01.png') ?>">
			<?php
		    $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onSubmit' => 'return submitContents(this)');
		    echo form_open(base_url('/event/event_insert/'.element('post_id',element('post', $view))), $attributes);
		    ?>
				<input type="text" name="elh_mem_id" id="elh_mem_id">
				<button type="submit">회 원 가 입 하 기</button>
				<span>추천하실 회원님을 정확히 입력해 주세요.<br>닉네임을 입력하지 않으시면 500P를 받으실 수 없습니다</span>
			<?php echo form_close(); ?>
			<img style="position: relative; bottom: -4px;" src="<?php echo base_url('/assets/images/bitissue_event_03.png') ?>">	
	</section>

<script type="text/javascript">
    //<![CDATA[
    

function submitContents(f) {
        
        
        var href;
        if( ! jQuery.trim($('#elh_mem_id').val()) ) {
         	if ( ! confirm("닉네임을 입력하지 않으시면 500p 를 받으실 수 없습니다..\n 그래도 회원 가입 하시겠습니까?")) { return false; }
            alert(1);
            view_event_register($('#elh_mem_id').val());
            return false;
        } else {
            alert(2);
            view_event_register($('#elh_mem_id').val());
            return false;
        }
        alert(3);
    return false;
    
}

function view_event_register(elh_mem_id) {

    var comment_url = cb_url + '/login/register/'+elh_mem_id;
    var hash = window.location.hash;

    $('#event_register').load(comment_url, function() {
    	$('.pop').fadeIn();
        if (hash) {
            var st = $(hash).offset().top;
            $('html, body').animate({ scrollTop: st }, 200); //200ms duration
        }
    });
}
    //]]>
    </script>