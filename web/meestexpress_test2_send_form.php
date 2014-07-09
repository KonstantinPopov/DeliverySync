<?php ?>
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>Тестування Сервісів</title>
	</head>
	<body>
		<form action="http://api1c.meest-group.com/services/test2/send.php" method="post" style="border: 1px inset red; width: 450px; padding: 15px; float: left;height: 425px; border-right: 0;">
			<table>
				<tr>
					<td>login</td>
					<td><input type="text" name="login" value="user1"></td>
				</tr>
				<tr>
					<td>password</td>
					<td><input type="password" name="password" value="pass1"></td>
				</tr>
				<tr>
					<td>function</td>
					<td><input type="text" name="function" value=""></td>
				</tr>
				<tr>
					<td>request</td>
					<td><textarea name="request" rows="15" cols="40"></textarea></td>
				</tr>
				<tr>
					<td>request_id</td>
					<td><input type="text" name="request_id"value=""></td>
				</tr>
				<tr>
					<td>wait</td>
					<td><input type="checkbox" name="wait" value="1"></td>
				</tr>
			</table>
			<center style="margin-top:15px;">
				<input type="submit" value="Відправити">
			</center>
		</form>
		<div style="float: left; border: 1px inset red; height: 225px; padding: 15px; ">
			<p style="font-size: 13px;">Відправляється XML методом POST на адрес http://api1c.meest-group.com/services/1C_Document.php</p>
<pre style="color: #993434; font-size: 14px; font-family: monospace;">
   <span class="tag">&lt;?xml version="1.0" encoding="UTF-8"?&gt;</span>
   &lt;param&gt;
      &lt;login&gt;<span style="color: #2B4086;">login</span>&lt;/login&gt;
      &lt;function&gt;<span style="color: #2B4086;">function</span>&lt;/function&gt;
      &lt;request&gt;<span style="color: #2B4086;">request</span>&lt;/request&gt;
      &lt;request_id&gt;<span style="color: #2B4086;">request_id</span>&lt;/request_id&gt;
      &lt;wait&gt;<span style="color: #2B4086;">wait</span>&lt;/wait&gt;
      &lt;sign&gt;<span style="color: #2B4086;">sign</span>&lt;/sign&gt;
  &lt;/param>
</pre>
			<p style="font-size: 13px;">sign = md5 ( login + password + function + request + request_id + wait)</p>
		</div>
	</body>
</html>