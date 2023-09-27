{%extends "master2.php"%}

{% block title %}Change Password{% endblock title %}


{% block content%}

<form method="POST" method="password.change">
    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Change Password</h3>

    {% csrf_token %}
{{form.as_p}}

<div class="mt-4 pt-2 container d-flex justify-content-center">
    <button class="changepassbutton"><input class="btn btn-primary" type="submit" value="Submit" /></button>
    <button class="changepassbutton"><a href="{%url 'main'%}" class="btn btn-primary my-3">Cancel</a></button>
  </div>
</form>
{% endblock %}