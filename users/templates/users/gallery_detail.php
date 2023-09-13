{%extends 'sidebar.php'%}
{%load static%}
{% block title %}Staff Gallery{% endblock title %}
{% block head %} <link rel="stylesheet" type="text/css" href="{% static 'css/css4.css' %}">{% endblock head %}
{% block content %}

<div class="container mt-3 mb-2">
        <div class="card text-center" style="width: 68rem;">
            <h5 class="card-header">
                {{gallery.galleryTitle}}
            </h5>
            <img src="../../{{gallery.galleryPic}}" class="rounded mx-auto d-block img-thumbnail" >
            <div class="card-body">
                <p class="card-title">Tag:{{gallery.galleryTag}}</p>
                <a href="{%url 'gallery.staff.edit' pk=gallery.id%}" class="btn btn-primary my-3">Edit</a>
                <a href="{%url 'gallery.staff'%}" class="btn btn-primary my-3">Go Back to Gallery</a>
                <a href="{%url 'gallery.delete' pk=gallery.id%}" class="btn btn-primary my-3">Delete</a>
            </div>
        </div>
</div>


{% endblock content %}