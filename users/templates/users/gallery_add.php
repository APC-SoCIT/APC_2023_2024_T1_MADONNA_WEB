{%extends "master2.php"%}
{%load static%}

{%block title%} Gallery Add {%endblock%}

{% block content %}
<form  method = "POST" enctype="multipart/form-data">
    {%csrf_token%} 
<h3></h3>
{{form.as_p}}
<button type="submit" class="btn btn-primary"> Submit </button>
<a href="{%url 'gallery.staff'%}" class="btn btn-primary my-3">Cancel</a>

{%endblock%}