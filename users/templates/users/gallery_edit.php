{%extends 'sidebar.php'%}
{%load static%}
{% block title %}Staff Gallery{% endblock title %}
{% block head %} <link rel="stylesheet" type="text/css" href="{% static 'css/css4.css' %}">{% endblock head %}
{% block content %}

<form  method = "POST" enctype="multipart/form-data">
    {%csrf_token%} 
<div class="container mt-3 mb-2">
        <div class="card text-center" style="width: 68rem;">
            <h5 class="card-header">
                {{form.galleryTitle}}
            </h5>
            <img src="../../../{{gallery.galleryPic}}" class="rounded mx-auto d-block img-thumbnail" >
            <div class="card-body">
                {{form.galleryPic}}
                <p class="card-title">Tag:{{form.galleryTag}}</p>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <a href="{%url 'gallery.staff.detail' pk=gallery.id%}" class="btn btn-primary my-3">Cancel</a>
            </div>
        </div>
</div>


{% endblock content %}