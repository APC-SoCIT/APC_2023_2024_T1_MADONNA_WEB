{% extends "master.php" %}
{% load static %}
      {% block title %}Welcome to Madonna's {% endblock %}

      {%block head%} 
    <link rel="stylesheet" type="text/css" href="{% static 'css/blog.css' %}">
    {%endblock%}  
      {% block content %}
<div class="container-fluid">
    <div class="row my-2">
        <h1 class="services_taital"><b>Facilities</b></h3>
    </div>
    
{% comment %} <div class="row mb-2"> {% endcomment %}
  <div class="row tm-row m-auto container border border-dark rounded reserve-form reserve_section">
  {%for x in facility%}

        <article class="col-12 col-md-6 tm-post">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <!--<strong class="d-inline-block mb-2 text-primary">World</strong>
-->
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{x.facilityName}}</a>
              </h3>
              <div class="mb-1 text-muted">₱{{x.facilityPrice}}</div>
              <p class="card-text mb-auto">{{x.facilityDescription}}</a>
            </div>
            <img src="../{{x.facilityPic}}" class="card-img-right flex-auto d-none d-md-block" data-holder-rendered="true" style="height:200px; width: 300px;">
          </div>
        </article>
      {% comment %}</div>  {% endcomment %}
      {%endfor%}
</div>
</div>
      {%endblock%}