<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<script>
    

    $(document).ready(function(){
        var hashtag = location.hash.substring(1, location.hash.length).replace(/ /gi, '%20');

        for (var i=1; i<hashtag;  i++){
            $('#view_pagination_btn').click();
        }
                              
    });
</script>
<?php echo element('headercontent', element('board', element('list', $view))); ?>
<div class="foot_padding">
    <!-- tab06 영역--> 
    <section class="wrap_con">
        <h3 class="hidden"><?php echo html_escape(element('board_name', element('board', element('list', $view))));?></h3>
        
        <?php 
        if (element('menu', $layout)) {
            $menu = element('menu', $layout);
            echo '<ul class="nav nav-sub nav-pills nav-justified">';
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
        
        
        <?php 
        $hide_style='';
        if(element('brd_key',element('board',$view))==="attendance" || element('brd_key',element('board',$view))==="express") $hide_style="style='display:none';";
        
        ?>

            
            
        <section id="tab06_'.element('brd_key',element('board',$view)).'" class="tab06_cont wrap_con">
            <div class='search' <?php echo $hide_style ?>>
                <form name='frm' class="" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
                    <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                    <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                    <input type="hidden" name="brd_key" value="<?php echo element('brd_key', element('board', element('list', $view))) ?>" />
                    
                
                    
                    <select class="" name="sfield">
                        <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                        <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                        <option value="post_nickname" <?php echo ($this->input->get('sfield') === 'post_nickname') ? ' selected="selected" ' : ''; ?>>닉네임</option>
                        
                    </select>
                    <input type="text" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                    <button type="submit"  style="width: 25px;"><i class="fa fa-search"></i></button>
                    <button type="button" ><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=" style="color:inherit;">전 체</a></button>
                    
                </form>
            </div>
            <script type="text/javascript">
            //<![CDATA[
            function postSearch(f) {
                
                var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
                if (skeyword.length < 2) {
                    alert('2글자 이상으로 검색해 주세요');
                    f.skeyword.focus();
                    return false;
                }
                return true;
            }
            
            
            //]]>
            </script>
            <?php
            $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
            echo form_open('', $attributes);
            ?>
            <ul class="tab06_cont_list">
            
            
            
            <?php
            if (element('notice_list', element('list', $view))) {
                foreach (element('notice_list', element('list', $view)) as $result) {
            ?>
                <li class="notice">
                    <div>
                        <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="
                            <?php
                            if (element('title_color', $result)) {
                                echo 'color:' . element('title_color', $result) . ';';
                            }
                            if (element('title_font', $result)) {
                                echo 'font-family:' . element('title_font', $result) . ';';
                            }
                            if (element('title_bold', $result)) {
                                echo 'font-weight:bold;';
                            }
                            if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                                echo 'font-weight:bold;';
                            }
                            ?>
                        " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?>
                        <?php if (element('post_comment_count', $result)) { ?><span class="label">+<?php echo element('post_comment_count', $result); ?></span><?php } ?></a>
                        <table class="tab06_cont_table">
                            <tbody>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/images/small_spoon_'.element('display_level', $result,1).'.png');?>" alt="spoon_img"><?php echo element('display_name', $result); ?></td>
                                    <td><?php echo element('display_datetime', $result); ?></td>
                                    <td>조회수 : <?php echo number_format(element('post_hit', $result)); ?></td>
                                </tr>
                            </tbody>    
                        </table>
                
                
                           
                    </div>
                </li>
            <?php
                }
            }


            if (element('list', element('data', element('list', $view)))) {
                foreach (element('list', element('data', element('list', $view))) as $result) {
            ?>
                <li class="">
                    <div>
                        <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="
                            <?php
                            if (element('title_color', $result)) {
                                echo 'color:' . element('title_color', $result) . ';';
                            }
                            if (element('title_font', $result)) {
                                echo 'font-family:' . element('title_font', $result) . ';';
                            }
                            if (element('title_bold', $result)) {
                                echo 'font-weight:bold;';
                            }
                            if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                                echo 'font-weight:bold;';
                            }
                            ?>
                        " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?>
                        <?php if (element('post_comment_count', $result)) { ?><span class="label">+<?php echo element('post_comment_count', $result); ?></span><?php } ?></a>
                        <table class="tab06_cont_table">
                            <tbody>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/images/small_spoon_'.element('display_level', $result,1).'.png');?>" alt="spoon_img"><?php echo element('display_name', $result); ?></td>
                                    <td><?php echo element('display_datetime', $result); ?></td>
                                    <td>조회수 : <?php echo number_format(element('post_hit', $result)); ?></td>
                                </tr>
                            </tbody>    
                        </table>
                
                
                           
                    </div>
                </li>

            <?php 
                }
                    
            } else {
            ?>
                    
                    <li style="height:150px;text-align: center;">
                        게시물이 없습니다.
                        
                    </li>
                    
            <?php }
            ?>

            </ul>
            <div><?php echo element('paging', element('list', $view)); ?></div>
        
        
        <?php echo form_close(); ?>
        
        </section>
        <div class="border_button">
            <div class="pull-left mg10">
                <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-info btn-sm">목 록</a>
                <?php if (element('search_list_url', element('list', $view))) { ?>
                    <!-- <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a> -->
                <?php } ?>
            </div>
            <?php if (element('is_admin', $view)) { ?>
                <div class="pull-left mg10">
                        <div  onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');" class="btn btn-danger btn-sm">선택삭제하기</div>
                </div>
            <?php } ?>
            <?php if (element('write_url', element('list', $view))) { ?>
                <div class="pull-right mg10">
                    <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>
<!-- <script type="text/javascript">
    //<![CDATA[
    function view_board(id,brd_key) {
        if(brd_key=='w-1' || brd_key=='w-2' || brd_key=='w-3'){
            $.ajax({
            type: "GET", 
            async: true,
            data: "pageid=<?php echo element(element('brd_key',element('board', element('list', $view))),$pageid) ?>&lang=utf-8&out=json", 
            url: "https://ssl-hiadone.ad4989.co.kr/cgi-bin/pelicanc.dll?impr", 
            cache: false, 
            dataType: "jsonp", 
            jsonp: "jquerycallback", 
            success: function(data) 
            {

              // $("#" +id).html('<div class="tab09_cont cont" ><ul>'+data.tag+'</ul></div>'); 

              $("#" +id).html('<div class="tab09_cont cont" >'+data.tag+'</div>'); 

            },
            error: function(xhr, status, error) { ; } 
            });
        } else {
            var list_url = cb_url + '/group/view_board/' + brd_key+'/0/<?php echo $this->input->get('post_notice')?>';
            $('#' + id).load(list_url,'',function(){
            });
        }
    }   

    

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
    //]]>
</script> -->


<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>

