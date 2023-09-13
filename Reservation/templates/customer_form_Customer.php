{%extends 'loginTemp.php'%}
{%load static%}


{%block title%} Reservation Form {%endblock%}


 {%block content%}
<style>
    
    
</style>

<div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-20  ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-cards text-white" style="border-radius: 1rem;">
          <div class="card-body text-center">

            <div class="mb-md-2 mt-md-3 pb-2">

              <h2 class="fw-bold mb-2 text-uppercase">Customer</h2>

    <form  action="{% url 'customer.new'%}" method = "POST">
        {%csrf_token%} 
        <div class="form-row" >
            <div class="form-group col-md-6">
                {{form.firstname.label}}   
                {{form.firstname}}
            </div>
            <div class="form-group col-md-6">
                {{form.lastname.label}}   
                {{form.lastname}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{form.contactNumber.label}}
                {{form.contactNumber}}
            </div>
            <div class="form-group col-md-6"> 
                {{form.email.label}}
                {{form.email}}
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"> Next </button>
            <a href="{%url 'reserve'%}" class="btn btn-danger"> cancel </a>
        </div>
    </form>

    </div>

</div>
</div>
</div>
</div>
</div>
    {%if form.errors%}
    {{form.errors.as_text}}
        <script>
            window.alert("");
        </script>
    {%endif%}
</div>

{%endblock%}