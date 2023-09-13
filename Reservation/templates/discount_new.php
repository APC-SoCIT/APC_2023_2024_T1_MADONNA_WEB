{%extends "master2.php"%}

{% block title %}New Discount Code{% endblock title %}

{% block content%}

<form method="POST">

{% csrf_token %}
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="form-outline">
              {{form.discountCode.label_tag}}
              {{form.discountCode.errors}}
              {{form.discountCode}}
              {{form.discountCode.help_text}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="form-outline">
              {{form.discountPrice.label_tag}}
              {{form.discountPrice.errors}}
              {{form.discountPrice}}
              {{form.discountPrice.help_text}}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="form-outline">
              {{form.discountActive.label_tag}}
              {{form.discountActive.errors}}
              {{form.discountActive}}
              {{form.discountActive.help_text}}
            </div>
        </div>
    </div>
    <div class="form-group">   
        <div class="container d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                    <a href="{%url 'discount.view'%}" class="btn btn-danger"> cancel </a>
                </div>
         </div>
</form>



{% endblock %}