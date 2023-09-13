{%extends "master2.php"%}
{%load static}

{%block title%} New Facility {%endblock%}

{%block content%}
<style>
    ul.errorlist {display:none}
    
</style>

<div class="m-auto container border border-dark rounded reserve-form reserve_section " style="background-color:  #ffb607">
<h3 class=" layout-padding" style="text-align: center" >Add New Facilities</h3>
<form method = "POST" enctype="multipart/form-data">
{%csrf_token%} 
<div class="form-row">
<div class="form-group col-md-4">
    {{form.price.label}}
    {{form.price}}
</div>
<div class="form-group col-md-4">
{{form.maxPax.label}}
{{form.maxPax}}
</div>
<div class="form-group col-md-4">
    {{form.dayTime.label}}
    {{form.dayTime}}
</div>
</div>
<div class="form-group">   
</div>
 <button type="submit" class="btn btn-primary"> Submit </button>

</form>

</div>
{%if form.errors%}
<script>
    window.alert("{{form.errors.as_text}}");
</script>
{{form.errors.as_text}}
{%endif%}
</div>


{%endblock%}