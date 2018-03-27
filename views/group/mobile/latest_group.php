     <script>
         $(document).ready(function(){
            var wid = $('.tab06_cont div').width()- 186 ;
               $('.tab06_cont div input').css('width' , wid);
         });
     </script>
     
    <?php 
    $hide_style='';

    
    if(element('brd_key',element('board',$view))==="attendance") $hide_style="style='display:none';";
    
    echo '<div id="tab06_'.element('brd_key',element('board',$view)).'" class="tab06_cont cont">
            <ul>';
    if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $value) {

            if(element('brd_key',element('board',$view))==='live_news' || element('brd_key',element('board',$view))==='hot_news'){ ?>
                <li class='gallery_news'>
                    <a href="<?php echo element('url', $value); ?>" >
                    <figure>
                        <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                        <figcaption>
                        <h3 class="normal_font">
                            <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>"><?php } ?>
                            <?php echo html_escape(element('title', $value)); ?>
                        </h3>
                        <p class="display_content"><?php echo element('display_content', $value); ?></p>
                        </figcaption>
                    </figure>
                </a>
                </li>                        


           <?php } else { ?>
                <li>
                    <a href="<?php echo element('url', $value); ?>" >
                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>"><?php } ?>
                        <?php echo html_escape(element('title', $value)); ?>
                     <span><?php if (element('post_comment_count', $value)) { ?> [<?php echo element('post_comment_count', $value); ?>]<?php } ?></span>
                    
                    <table>
                        <tr>
                            <td colspan="2"><?php echo element('display_datetime', $value); ?></td>
                            <td colspan="2"><?php echo element('display_name', $value); ?></td>
                            <td colspan="2">조회수 : <?php echo number_format(element('post_hit', $value)); ?></td>
                        </tr>
                    </table>
                    </a>
                </li>

    <?php }?>
    
            
    <?php 
        }    
         if(element('page', $view))
            for($i=0; $i < element('page', $view); $i++)
                echo '<div id="view_board_more_'.($i+1).'"></div>';
            
    } else {
    ?>
            
            <li>
                게시물이 없습니다.
                <table>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                </table>
            </li>
            
    <?php }
    ?>

        </ul>
         <div class='search' <?php echo $hide_style ?>>
        <form class="" name='frm'>
            <input type="hidden" name="brd_key" value="<?php echo element('brd_key',element('board',$view)) ?>" />
            <input type="hidden" name="post_notice" value="<?php echo element('post_notice',element('board',$view)) ?>" />
            <input type="hidden" name="findex" value="<?php echo html_escape($this->input->post('findex')); ?>" />
            <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->post('category_id')); ?>" />
            
        
            
                <select class="" name="sfield">
                    <option value="post_both" <?php echo ($this->input->post('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                    <option value="post_title" <?php echo ($this->input->post('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                    <option value="post_nickname" <?php echo ($this->input->post('sfield') === 'post_nickname') ? ' selected="selected" ' : ''; ?>>닉네임</option>
                    
                </select>
                <input type="text" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->post('skeyword')); ?>" />
                <button class="middle_font" type="button" onClick='boardSearch(document.frm);' style="width: 25px;"><i class="fa fa-search"></i></button>
                <button class="middle_font" type="button" onClick='boardtotal(this.form);'>전 체</button>
            
        </form>
        </div>

        <div class="text-center">

                <a href="<?php echo element('write_url',$view); ?>"><?php echo element('write_text',$view); ?></a>
                <a href="javascript:boardViewMore(document.frm);" style="margin-left:2%;">더 보 기</a>
        </div>

        
        


    </div>
    
       



<script type="text/javascript">
//<![CDATA[

var paging=2;
var page=<?php echo element('page', $view) ?>;
 function boardSearch(f) {
    var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
    if (skeyword.length < 2) {
        alert('2글자 이상으로 검색해 주세요');
        f.skeyword.focus();
        return false;
    }
    href = cb_url + '/group/view_board/' + f.brd_key.value+'/0/'+f.post_notice.value;;

    

    $.ajax({
        async: false,
        url : href,
        type : 'post',
        data :  'sfield='+f.sfield[f.sfield.selectedIndex].value+'&skeyword='+f.skeyword.value+ '&csrf_test_name=' + cb_csrf_hash,
        success : function(data) {
            $('#view_board').html(data);
            
            
        }
    });
}

function boardViewMore(f) {
    
    href = cb_url + '/group/view_board/' + f.brd_key.value+'/'+paging+'/'+f.post_notice.value;

    

    $.ajax({
        async: false,
        url : href,
        type : 'post',
        data :  'sfield='+f.sfield[f.sfield.selectedIndex].value+'&skeyword='+f.skeyword.value+ '&csrf_test_name=' + cb_csrf_hash,
        success : function(data) {
            $('#view_board_more_'+paging).html(data);

            if(page > paging)
                paging = paging+1;
            
        }
    });
}

function boardtotal(f) {    
    view_board('view_board',f.brd_key.value);
}


    //]]>
</script>