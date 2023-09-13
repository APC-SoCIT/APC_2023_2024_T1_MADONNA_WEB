{%extends "loginTemp.php"%}
{%load static%}


{%block title%}login{%endblock%}

{%block content%}

<hr></hr>
<div class="container center-content m-auto d-flex justify-content-center my-auto vertical-center opacity-25" style="max-width: 75%">
    {{form.errors}}
<form method="POST">
    {% csrf_token %}
    {% for field in form %}
        <p>{{ field.label }}: <br> {{ field }}</p>
    {% endfor %}
    <div class="d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary"> Login </button>
        </div>
</form>
</div>

{%if form.errors%}
<script>
    alert("{{form.errors.as_text}}");
</script>
{%endif%}
{%endblock%}