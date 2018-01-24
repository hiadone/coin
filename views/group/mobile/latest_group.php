    <?php 
    $hide_style='';
    if(element('brd_key',element('board',$view))==="attenddata") $hide_style="style='display:none';";
    
    echo '<div id="tab06_'.element('brd_key',element('board',$view)).'" class="tab06_cont cont">
            <ul>';
    if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $value) {?>
            <li onClick="location.href='<?php echo element('url', $value); ?>'">
                <h3><?php echo html_escape(element('title', $value)); ?></h3>
                 <span><?php if (element('post_comment_count', $value)) { ?> [<?php echo element('post_comment_count', $value); ?>]<?php } ?></span>
                
                <table>
                    <tr>
                        <td colspan="2"><?php echo element('display_datetime', $value); ?></td>
                        <td colspan="2"><?php echo element('display_name', $value); ?></td>
                        <td colspan="2">조회수 : <?php echo number_format(element('post_hit', $value)); ?></td>
                    </tr>
                </table>
            </li>
    <?php 
        }    
    } else {
    ?>
            
            <li>
                <h3>게시물이 없습니다.</h3>
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
        <div <?php echo $hide_style ?>>
        <form class="" >
            <input type="hidden" name="brd_key" value="<?php echo element('brd_key',element('board',$view)) ?>" />
            <input type="hidden" name="findex" value="<?php echo html_escape($this->input->post('findex')); ?>" />
            <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->post('category_id')); ?>" />
            
        
            
                <select class="" name="sfield">
                    <option value="post_both" <?php echo ($this->input->post('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                    <option value="post_title" <?php echo ($this->input->post('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                    <option value="post_nickname" <?php echo ($this->input->post('sfield') === 'post_nickname') ? ' selected="selected" ' : ''; ?>>닉네임</option>
                    
                </select>
                <input type="text" class="per40" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->post('skeyword')); ?>" />
                <button class="middle_font" type="button" onClick='boardSearch(this.form);'>검 색</button>
                <button class="middle_font" type="button" onClick='boardtotal(this.form);'>전 체</button>
            
        </form>
        </div>
        <div class="text-center">
                <a href="<?php echo element('write_url',$view); ?>" class="btn btn-success btn-sm per45" >글쓰기</a>
                <a href="javascript:;" class="btn btn-success btn-sm per45">더보기</a>
            </div>
        
        
    </div>
    
       



<script type="text/javascript">
//<![CDATA[


 function boardSearch(f) {
    var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
    if (skeyword.length < 2) {
        alert('2글자 이상으로 검색해 주세요');
        f.skeyword.focus();
        return false;
    }
    href = cb_url + '/group/view_board/' + f.brd_key.value;

    

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

function boardtotal(f) {    
    view_board('view_board',f.brd_key.value);
}


    //]]>
</script>