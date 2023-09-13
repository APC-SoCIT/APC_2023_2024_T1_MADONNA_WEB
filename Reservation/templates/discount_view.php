{% extends 'sidebar.php' %}
{%load static%}

{%block title%} Discount Management {%endblock%}

{% block content %}

<div class="content">
    <div class="container">
        <div class="container pt-4 px-4">
            <h1 class=>Discounts</h1>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Discount Code</th>
                            <th scope="col">Discount Code</th>
                            <th scope="col">Discount Worth</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for info in  discount%}
                        <tr>
                            <td>{{info.id}}</td>
                            <td>{{info.discountCode}}</td>
                            <td>{{info.discountPrice}}</td>
                            <td>{{info.discountActive}}</td>
                            <td><a class="btn btn-sm btn-primary" href="{% url 'discount.edit' pk=info.id %}">Edit</a></td>
                            
                        </tr>
                        {%endfor%}
                    </tbody>
                </table>
            </div>
            <a href="{%url 'discount.new'%}" class="btn btn-primary my-3">Add Account</a>
        </div>
    </div>
</div>




{%endblock%}