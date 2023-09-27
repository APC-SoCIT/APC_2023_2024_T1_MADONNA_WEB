{% extends "master.php" %}
{% load static %}

      {% block title %} Blogs {% endblock %}
    {%block head%} 
    <link rel="stylesheet" type="text/css" href="{% static 'css/blog.css' %}">
    {%endblock%}  
    {% block content %}
    <div class="container-fluid m-5">
        <div class="tm-row m-auto container reserve-form reserve_section">
            <div class="row tm-row">
                {% if blog.blog_pic %}
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <h2 class="pt-2 tm-color-primary tm-post-title">{{blog.blog_title}}</h2>
                    <p class="tm-post-meta">{{blog.blog_created}} posted by Madonna's Garden Resort and Events Place</p>
                    <img src="../../blog/{{blog.blog_pic}}" alt="Image" class="tm-post-image">
                </div>
                {% endif %}
            </div>
            <div class="row tm-row">
                <div class="col-lg-12 tm-post-col">
                    <div class="tm-post-full">
                        <div class="mb-4">
                            <div class="tm-post-content">
                                {{blog.blog_content|safe}} <!-- Use |safe to render HTML content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row tm-row">
                <div class="col-12 back-button">
                    <a href="{% url 'blog.customer' %}" class="btn btn-primary">Back to Blog Selection</a>
                </div>
            </div>
        </div>
    </div>
{% endblock %}