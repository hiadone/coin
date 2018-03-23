 
 <section class='post_list'>
    <div class='post_table' id='news01'>
        <table class='post_table_li'>
            
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th><input onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /></th><?php } ?>
                    <th>번 호</th>
                    <th>제 목</th>
                    <th>닉 네 임</th>
                    <th>날 짜</th>
                    <th>조 회</th>
                </tr>
            
    <?php 
    $hide_style='';

    
    if(element('brd_key',element('board',$view))==="attendance") $hide_style="style='display:none';";
    
    
    if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $value) {

            if(element('brd_key',element('board',$view))==='live_news' || element('brd_key',element('board',$view))==='hot_news'){ ?>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $value); ?>" /></th><?php } ?>
                    <td><?php echo element('num', $value); ?></td>
                    
                    <td style="text-align:left;padding-left:20px">
                        <?php if (element('category', $value)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $value))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $value))); ?></span></a><?php } ?>
                        <?php if (element('post_reply', $value)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $value)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $value); ?>" style="
                            <?php
                            if (element('title_color', $value)) {
                                echo 'color:' . element('title_color', $value) . ';';
                            }
                            if (element('title_font', $value)) {
                                echo 'font-family:' . element('title_font', $value) . ';';
                            }
                            if (element('title_bold', $value)) {
                                echo 'font-weight:bold;';
                            }
                            if (element('post_id', element('post', $view)) === element('post_id', $value)) {
                                echo 'font-weight:bold;';
                            }
                            ?>
                        " title="<?php echo html_escape(element('title', $value)); ?>"><?php echo html_escape(element('title', $value)); ?></a>
                        <?php if (element('post_comment_count', $value)) { ?><span>+<?php echo element('post_comment_count', $value); ?></span><?php } ?>
                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/views/_layout/basic/images/new.png') ?>"><?php } ?>
                    </td>
                    <td>
                        <figure>
                            <img src="<?php echo base_url('/views/_layout/basic/images/spoon_'.$this->member->item('mem_level').'.png') ?>" alt="spoon_<?php echo $this->member->item('mem_level') ?>">
                            <figcaption><?php echo element('display_name', $value); ?></figcaption>
                        </figure>
                    </td>
                    <td><?php echo element('display_datetime', $value); ?></td>
                    <td><?php echo number_format(element('post_hit', $value)); ?></td>
                </tr>


           <?php } else { ?>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $value); ?>" /></th><?php } ?>
                    <td><?php echo element('num', $value); ?></td>
                    
                    <td>
                        <?php if (element('category', $value)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $value))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $value))); ?></span></a><?php } ?>
                        <?php if (element('post_reply', $value)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $value)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $value); ?>" style="
                            <?php
                            if (element('title_color', $value)) {
                                echo 'color:' . element('title_color', $value) . ';';
                            }
                            if (element('title_font', $value)) {
                                echo 'font-family:' . element('title_font', $value) . ';';
                            }
                            if (element('title_bold', $value)) {
                                echo 'font-weight:bold;';
                            }
                            if (element('post_id', element('post', $view)) === element('post_id', $value)) {
                                echo 'font-weight:bold;';
                            }
                            ?>
                        " title="<?php echo html_escape(element('title', $value)); ?>"><?php echo html_escape(element('title', $value)); ?></a>
                        <?php if (element('post_comment_count', $value)) { ?><span>+<?php echo element('post_comment_count', $value); ?></span><?php } ?>
                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/views/_layout/basic/images/new.png') ?>"><?php } ?>
                    </td>
                    <td>
                        <figure>
                            <img src="<?php echo base_url('/views/_layout/basic/images/spoon_'.$this->member->item('mem_level').'.png') ?>" alt="spoon_<?php echo $this->member->item('mem_level') ?>">
                            <figcaption><?php echo element('display_name', $value); ?></figcaption>
                        </figure>
                    </td>
                    <td><?php echo element('display_datetime', $value); ?></td>
                    <td><?php echo number_format(element('post_hit', $value)); ?></td>
                </tr>

            <?php }?>
    
            
    <?php 
        }    
    } else {
    ?>
            
            <tr>
                <td colspan="6" class="nopost">게시물이 없습니다.</td>
                
            </tr>
            
    <?php }
    ?>

        </table>
    </div>
         <div class='search' <?php echo $hide_style ?>>
        <form class="" name='frm'>
            <input type="hidden" name="brd_key" value="<?php echo element('brd_key',element('board',$view)) ?>" />
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
                
        </div>

        <div class="post_page">
        <nav><?php echo element('paging', element('list', $view)); ?></nav>
        </div>
    
</section>       



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

function boardViewMore(f) {
    
    href = cb_url + '/group/view_board/' + f.brd_key.value+'/'+paging;

    

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