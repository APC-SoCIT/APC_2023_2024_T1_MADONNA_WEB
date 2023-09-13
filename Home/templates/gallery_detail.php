{% extends "master.php" %}
{% load static %}
      {% block title %}Welcome to Madonna's {% endblock %}
      {% block content %}

    <div class="card text-center">
        <h5 class="card-header">
            {{gallery.galleryTitle}}
        </h5>
        <img src="../../{{gallery.galleryPic}}" class="rounded mx-auto d-block img-thumbnail" >
        <div class="card-body">
            <p class="card-title">Tag:{{gallery.galleryTag}}</p>
            <a href="{%url 'gallery'%}" class="btn btn-primary my-3">Go Back to Gallery</a>
        </div>
    </div>
</div>


{% endblock content %}