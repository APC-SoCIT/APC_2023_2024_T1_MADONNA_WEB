{%extends "master2.php"%}
{%load static%}

{%block title%} New Facility {%endblock%}

{%block content%}
<style>
    ul.errorlist {display:none}
    
</style>

<div class="m-auto container border border-dark rounded reserve-form reserve_section " style="background-color:  #ffb607">
<h3 class=" layout-padding" style="text-align: center" >Add New Facilities</h3>
<form  action="{% url 'facility.new'%}" method = "POST" enctype="multipart/form-data">
{%csrf_token%} 
<div class="form-row">
<div class="form-group col-md-6">
    {{form.facilityName.label}}
    {{form.facilityName}}
</div>
<div class="form-group col-md-6">
{{form.facilityPrice.label}}
{{form.facilityPrice}}
    
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
    {{form.facilitymax.label}}
    {{form.facilitymax}}
</div>
<div class="form-group col-md-6">
{{form.facilityPic.label}}
{{form.facilityPic}}
    
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
{{form.errors.as_text}}
{%endif%}
</div>
{%endblock%}