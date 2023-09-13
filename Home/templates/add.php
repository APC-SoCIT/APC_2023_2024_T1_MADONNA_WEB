<h1>Add member</h1>

<form action="addrecord/" method="post">
{% csrf_token %}
First Name:<br>
<input name="first">
<br><br>
Last Name:<br>
<input name="last">
<br><br>
date:<br>
<input name="date">
<br><br>
downpayment:<br>
<input name="dp">
<br><br>
total payment:<br>
<input name="tp">
<br><br>
Balance:<br>
<input name="bal">
<br><br>
Status:<br>
<input name="status">
<br><br>
<input type="submit" value="Submit">
</form>