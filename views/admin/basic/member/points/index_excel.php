<meta http-equiv="Content-Type" content="text/html; charset=<?php echo config_item('charset');?>" />
<style type="text/css">
th {font-weight:bold;padding:5px; min-width:120px; width:120px; _width:120px; text-align:center; line-height:18px; font-size:12px; color:#959595; font-family:dotum,돋움; border-right:1px solid #e4e4e4;}
td {text-align:center; line-height:40px; font-size:12px; color:#474747; font-family:gulim,굴림; border-right:1px solid #e4e4e4;}
</style>
<table width="100%" border="1" bordercolor="#E4E4E4" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>회원아이디</th>
                            <th>회원명</th>
                            <th>포인트</th>
                            <th>발생일시</th>
                            <th>포인트내용</th>
                            <th>포인트합</th>
                            <th><input type="checkbox" name="chkall" id="chkall" /></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (element('list', element('data', $view))) {
                        foreach (element('list', element('data', $view)) as $result) {
                    ?>
                        <tr>
                            <td><?php echo number_format(element('num', $result)); ?></td>
                            <td><a href="?sfield=point.mem_id&amp;skeyword=<?php echo element('mem_id', $result); ?>"><?php echo html_escape(element('mem_userid', $result)); ?></a></td>
                            <td><?php echo element('display_name', $result); ?></td>
                            <td class="text-right"><?php echo number_format(element('poi_point', $result)); ?></td>
                            <td><?php echo display_datetime(element('poi_datetime', $result), 'full'); ?></td>
                            <td><?php echo html_escape(element('poi_content', $result)); ?></td>
                            <td class="text-right"><?php echo number_format(element('mem_point', $result)); ?></td>
                            <td><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element(element('primary_key', $view), $result); ?>" /></td>
                        </tr>
                    <?php
                        }
                    }
                    if ( ! element('list', element('data', $view))) {
                    ?>
                        <tr>
                            <td colspan="8" class="nopost">자료가 없습니다</td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
