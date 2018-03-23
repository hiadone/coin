<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);
?>
<script>

    var postact_flag=false;
    var global_cur_unit='krw';
    var coinActiveTab='tab01_btc';
    setInterval('view_coin(global_cur_unit)',5000);


$(document).ready(function(){

    view_board('view_board','<?php echo $record_num ?>');

    $("section.submenu ul li").click(function () {
        
        view_board('view_board',$(this).attr('id'));
    });
});
</script>
<article class="content02">
    <section class="submenu sub_02">
        <ul>
            <?php 
            if (element('board_list', $view)) {
                $bcount=count(element('board_list', $view));
                $tab06=array();

                foreach (element('board_list', $view) as $key => $board) {
                    
                    array_push($tab06,element('brd_key',$board));
                    echo '<li id="'.element('brd_key',$board).'" >'.element('board_name',$board).'</li>';
                    echo '<li>|</li>';
                }
            }
             ?>
            <li class="submenu_arrow"></li>
        </ul>
        
    </section>
    
    <div  id="view_board">

    </div>
</article>

<script type="text/javascript">
    //<![CDATA[
    function view_board(id,brd_key) {
        var list_url = cb_url + '/group/view_board/' + brd_key;
        $('#' + id).load(list_url,'',function(){
            $("ul.tab06_tabs li").removeClass("active").css("color" , "#333");
            $('#'+brd_key).addClass("active").css({"color": "#1c446d"});
            $('#'+brd_key).addClass("active").css("color", "#1c446d");

        });
    }

    function view_coin(cur_unit) {
        global_cur_unit = cur_unit;
        var list_url = cb_url + '/main/show_coin_data/' + global_cur_unit;
        $('#coin_data').load(list_url,function(){
            $("#" + coinActiveTab).hide();
            $("#" + coinActiveTab).fadeIn();
        });   
    }
    //]]>
</script>