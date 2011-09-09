<form action="/index.php/people" method="post"> 
	<fieldset> 
	  <legend>New Person=====</legend>
		<dl>
			<dt><label for="first_name">first name</label></dt>
			<dd><input type="text" name="person[first_name]" id="first_name" /><dd>
			<dt><label for="last_name">last name</label></dt>
			<dd><input type="text" name="person[last_name]" id="last_name" /><dd>
			<dt><label for="phone">phone</label></dt>
			<dd><input type="text" name="person[phone]" id="phone" /><dd>
			<dt><label for="email">email</label></dt>
			<dd><input type="text" name="person[email]" id="email" /><dd>
			<dt><label for="email_display">email_display</label></dt>
			<dd><input type="text" name="person[email_display]" id="email_display" /><dd>
			<dt><label></label></dt>
			<dd><input type="submit" /></dd>
		</dl>
	</fieldset>
</form>