{%extends "sidebar.php"%}
{%load static%}

{%block title %}
Reservation 
{%endblock%}

{%block content%}



<style>
    ul.errorlist {display:none}
    
</style>

<div class="container center-content m-auto d-flex justify-content-center my-auto vertical-center opacity-25" style="background-color:  #ffb607; max-width: 75%;">
    
    <form  action="{% url 'reserve.staff.new'%}" method = "POST">
    <p style="text"><h3>Resrevation Form</h3></p>
        {%csrf_token%} 
        <div class="form-row" >
            <div class="form-group col-md-6">
                {{form.checkIn.label}}
                {{form.checkIn}}
            </div>
        <div class="form-group col-md-6">
                {{form.checkOut.label}}   
                {{form.checkOut}}
        </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    {{form.date.label}}
      {{form.date}}
    </div>
    <div class="form-group col-md-6">
    {{form.downpayment.label}}
    {{form.downpayment}}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    {{form.totalPayment.label}}  
    {{form.totalPayment}}
    </div>
    <div class="form-group col-md-6">
    {{form.balance.label}}
    {{form.balance}}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
    {{form.status.label}}  
    {{form.status}}
    </div>
</div>

<div class="form-group">   
</div>
 <button type="submit" class="btn btn-primary"> Submit </button>

</form>


{%if form.errors%}
<script>
    window.alert("{{form.errors.as_text}}");
</script>
{%endif%}
</div>


{%endblock%}