<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<script>
    

    $(document).ready(function(){
        view_board();
    });
</script>
<div class="foot_padding">
    <!-- 갤러리 -->
    <section class="wrap_con">
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
                    // echo "\n";
                }
                
            }
            echo '</ul>';
        }
        ?>
        
        
        <?php 
        $hide_style='';
        if(element('brd_key',element('board',$view))==="attendance" || element('brd_key',element('board',$view))==="express") $hide_style="style='display:none';";
        
        ?>
        <section>
            <div>월간신작 TOP9</div>
            <div id="webtoon_1"></div>
        </section>
        <section>
            <div>학원/액션</div>
            <div id="webtoon_2"></div>
        </section>
        <section>
            <div>드라마</div>
            <div id="webtoon_3"></div>
        </section>
    </section>
</div>



<script type="text/javascript">
    //<![CDATA[
    function view_board() {
        
            $.ajax({
            type: "GET", 
            async: true,
            data: "pageid=08yE&lang=utf-8&out=json", 
            url: "https://ssl-hiadone.ad4989.co.kr/cgi-bin/pelicanc.dll?impr", 
            cache: false, 
            dataType: "jsonp", 
            jsonp: "jquerycallback", 
            success: function(data) 
            {

              // $("#" +id).html('<div class="tab09_cont cont" ><ul>'+data.tag+'</ul></div>'); 

              $("#webtoon_1").html('<div class="tab09_cont cont" >'+data.tag+'</div>'); 

            },
            error: function(xhr, status, error) { ; } 
            });

            $.ajax({
            type: "GET", 
            async: true,
            data: "pageid=08yH&lang=utf-8&out=json", 
            url: "https://ssl-hiadone.ad4989.co.kr/cgi-bin/pelicanc.dll?impr", 
            cache: false, 
            dataType: "jsonp", 
            jsonp: "jquerycallback", 
            success: function(data) 
            {

              // $("#" +id).html('<div class="tab09_cont cont" ><ul>'+data.tag+'</ul></div>'); 

              $("#webtoon_2").html('<div class="tab09_cont cont" >'+data.tag+'</div>'); 

            },
            error: function(xhr, status, error) { ; } 
            });

            $.ajax({
            type: "GET", 
            async: true,
            data: "pageid=08yI&lang=utf-8&out=json", 
            url: "https://ssl-hiadone.ad4989.co.kr/cgi-bin/pelicanc.dll?impr", 
            cache: false, 
            dataType: "jsonp", 
            jsonp: "jquerycallback", 
            success: function(data) 
            {

              // $("#" +id).html('<div class="tab09_cont cont" ><ul>'+data.tag+'</ul></div>'); 

              $("#webtoon_3").html('<div class="tab09_cont cont" >'+data.tag+'</div>'); 

            },
            error: function(xhr, status, error) { ; } 
            });
        
    }   
</script>