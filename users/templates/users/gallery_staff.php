{%extends 'sidebar.php'%}
{%load static%}
{% block title %}Staff Gallery{% endblock title %}
{% block head %} <link rel="stylesheet" type="text/css" href="{% static 'css/css4.css' %}">{% endblock head %}
{% block content %}
<div class="container">
    <div class="row">
    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="gallery-title">Gallery</h1>
    </div>

    <div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a href="{%url 'gallery.add'%}"><button class="btn btn-default filter-button" >Add Photo</button></a>
    </div>
    <div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button class="btn btn-default filter-button" data-filter="all">All</button>
        <button class="btn btn-default filter-button" data-filter="Facilities">Facilities</button>
        <button class="btn btn-default filter-button" data-filter="Events">Events</button>
        <button class="btn btn-default filter-button" data-filter="Promos">Promos</button>
        <button class="btn btn-default filter-button" data-filter="Guests">Guests</button>
        </div>
    <br/>
    



        {% for pics in gallery %}
        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter {{pics.galleryTag}}">
            <a href="{%url 'gallery.staff.detail' pk=pics.id%}"><img src="../{{pics.galleryPic}}" class="img-responsive"></a>
        </div>
        {% endfor %}

    </div>
</div>
</section>

<script>
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

{% endblock content %}
