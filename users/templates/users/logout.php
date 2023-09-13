{% extends 'loginTemp.php' %}
{%load static%}

{% block content %}
    <br>
    <div class="alert alert-success" role="alert">
        <h2 style="text-align: center;">Logged out!</h2>
        <h3>Login again?</h3>
    <a href="{% url 'login' %}">---> Login</a> <br>
    <a href="{% url 'index' %}"><--- Or go back to home.</a>
    </div>

{% endblock content %}