<h3>Login Required</h3>
<div class="box">
{if $error != ""}<div class="boxerror">{$error}</div>{/if}
<form action="{$smarty.server.PHP_SELF}" method="post">
<table> 
<tr><td align="right">Username:</td><td><input type="text" name="username"></td></tr> 
<tr><td align="right">Password:</td><td><input type="password" name="password"></td></tr> 
<tr><td align="right"></td><td><input type="submit" name="Submit" value="Submit"></td></tr>
</table>
</form>
</div>
<br />