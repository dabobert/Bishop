<form action="/index.php/people" method="post"> 
	<fieldset> 
	  <legend>Edit Person</legend>
		<dl>
			<dt><label for="first_name">first name</label></dt>
			<dd><input type="text" name="first_name" id="first_name" value="<?= $person->first_name ?>" /><dd>
			<dt><label for="last_name">last name</label></dt>
			<dd><input type="text" name="last_name" id="last_name" value="<?= $person->last_name ?>"/><dd>
			<dt><label for="phone">phone</label></dt>
			<dd><input type="text" name="phone" id="phone" value="<?= $person->phone ?>"/><dd>
			<dt><label for="email">email</label></dt>
			<dd><input type="text" name="email" id="email" value="<?= $person->email ?>"/><dd>
			<dt><label for="email_display">email_display</label></dt>
			<dd><input type="text" name="email_display" id="email_display" value="<?= $person->email_display ?>"/><dd>
			<dt></dt>
			<dd><input type="submit" /></dd>
		</dl>
	</fieldset>
</form>