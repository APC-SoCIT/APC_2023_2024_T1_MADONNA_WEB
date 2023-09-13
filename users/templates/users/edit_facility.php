{%extends "master2.php"%}
{%load static%}

{%block title%} Edit Facility{{facility.facilityName}} {%endblock%}

{%block content%}
<style>
    ul.errorlist {display:none}
    
</style>

<div class="m-auto container border border-dark rounded reserve-form reserve_section " style="background-color:  #ffb607">
<h3 class=" layout-padding" style="text-align: center" >Edit {{facility.facilityName}}</h3>
<form  method = "POST" enctype="multipart/form-data">
{%csrf_token%} 
<div class="form-row">
<div class="form-group col-md-6">
    {{form.facilityName.label}}
    {{form.facilityName}}
</div>
<div class="form-group col-md-6">
{{form.facilityPic.label}}
</br>
{{form.facilityPic}}
<img src="/{{facility.facilityPic}}" style="height:200px; width: 300px;">
    
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
{{form.facilityPrice.label}}
    {{form.facilityPrice}}
</div>
<div class="form-group col-md-6">
    {{form.facilitymax.label}}
    {{form.facilitymax}}
</div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
    {{form.facilityDescription.label}}
        {{form.facilityDescription}}
    </div>

    <div class="form-group col-md-6">
        <div class="form-control">
        {{form.facilityCategory.label}}
            {{form.facilityCategory}}
        </div>
    </div>
</div>
<div class="form-group">   
<div class="container d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"> Submit </button>
            <a href="{%url 'facility.staff'%}" class="btn btn-danger"> cancel </a>
        </div>
 </div>
</form>


{%if form.errors%}
<script>
    window.alert("{{form.errors.as_text}}");
</script>
{%endif%}

{% if messages %}
<ul class="messages">
    {% for message in messages %}
    <li  {% if message.tags %} class=" {{ message.tags }} " {% endif %}> {{ message }} </li>
    {% endfor %}
</ul>
{% endif %}
</div>
{%endblock%}