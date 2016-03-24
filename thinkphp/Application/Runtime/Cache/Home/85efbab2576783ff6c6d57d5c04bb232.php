<?php if (!defined('THINK_PATH')) exit();?><meta charset='utf-8'>
<form action="/index.php/Home/Person/update_pro" method="post">
    <input type="hidden" name="b_id" value="<?php echo ($arr["b_id"]); ?>">
    姓名：<input type="text" id="b_name" name="b_name" value="<?php echo ($arr["b_name"]); ?>"><br>
    电话：<input type="text" id="b_phone" name="b_phone" value="<?php echo ($arr["b_phone"]); ?>"><br>
    电话：<input type="text" id="b_qq" name="b_qq" value="<?php echo ($arr["b_qq"]); ?>"><br>

    <input type="submit" value="确定">
</form>