{% extends "master.php" %}
{% load static %}

      {% block title %} Blogs {% endblock %}
    {%block head%} 
    <link rel="stylesheet" type="text/css" href="{% static 'css/blog.css' %}">
    {%endblock%}  
    {% block content %}
    <div class="container-fluid m-5">
    <div class="row tm-row tm-row m-auto container reserve-form reserve_section"">
    <div class="row tm-row">
        {%if blog.blog_pic%}
                <div class="col-12">
                    
                <hr class="tm-hr-primary tm-mb-55">
                    <img src = "../../blog/{{blog.blog_pic}}" alt="Image"  width="954" height="535" class="tm-mb-40">
                </div>
        {%endif%}

            </div>
    <div class="row tm-row">
    <div class="col-lg-8 tm-post-col">
    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{blog.blog_title}}</h2>
                            <p class="tm-mb-40">{{blog.blog_created}} posted by Madonna's Garden Resort and Events Place</p>
                            <p>
                                {{blog.blog_content}}
                            </p>
                        </div>
</div>
</div>
</div>
</div>
</div>
{% endblock %}