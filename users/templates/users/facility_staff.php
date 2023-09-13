{%extends 'sidebar.php'%}
{%load static%}
{%block title%} Facility Editing Page{%endblock%}
{%block content%}
{% load humanize %}

<div class="content">
<div class="container">
    <div class="container pt-4 px-4">
<h1 class=>Facilities</h1>


<div class="table-responsive">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="text-dark">
                <th scope="col">Id</th>
                <th scope="col">Facility</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            {% for x in  facility%}
            <tr>
                <td>{{x.id}}</td>
                <td>{{x.facilityName}}</td>
                <td>{{x.facilityDescription}}</td>
                <td>{{x.facilityCategory}}</td>
                <td>₱{{x.facilityPrice| intcomma}}</td>
                <td><a class="btn btn-sm btn-primary" href="{%url 'facility.edit' pk=x.id%}">Edit</a></td>
            </tr>
            {%endfor%}
        </tbody>
    </table>
</div>




     {% comment %}    <table border="1" class="reserve">
        {% for x in  facility%}
            <tr>
                <td> {{x.facilityName}}</td>
                <td> {{x.facilityDescription}}</td>
                <td> {{x.facilityCategory}}</td>
                <td> {{x.facilityPrice}}</td>
                <td> <img src="/{{x.facilityPic}}" style="height:200px; width: 300px;"></td>
                <td><a href = "{%url 'facility.edit' pk=x.id%}"> Edit Facility Information</a></td>
                <td><a href = ""> Disable Facility from site</a></td>
            </tr>
        {% endfor %}
        </table> {% endcomment %}
        <a href="{%url 'facility.new'%}" class="btn btn-primary my-3">Add new Facility</a>
</div>
</div>
</div>
{%endblock%}


