{%extends "loginTemp.php"%}
{%load static%}


{%block title%}login{%endblock%}

{%block content%}
<div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-20  ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark  text-white" style="border-radius: 1rem;">
          <div class="card-body text-center">

            <div class="mb-md-2 mt-md-3 pb-2">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
            
                {{form.errors}}
                <form method="POST">
                    {% csrf_token %}
                    {% for field in form %}
                    <p>{{ field.label }}: <br> {{ field }}</p>
                    {% endfor %}
                    <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary"> Login </button>
                    </div>
                    </form> 


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  {%if form.errors%}
<script>
    alert("{{form.errors.as_text}}");
</script>
{%endif%}
{%endblock%}