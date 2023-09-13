{% extends 'sidebar.php' %}
{%load static%}

{%block title%} Account Management {%endblock%}

{% block content %}

<div class="content">
    <div class="container">
        <div class="container pt-4 px-4">
            <h1 class=>User Accounts</h1>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Groups</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Reset Password</th>
                    </thead>
                    <tbody>
                        {% for user in  user1%}
                        <tr>
                            <td>{{user.id}}</td>
                            <td>{{user.first_name}} {{user.last_name}}</td>
                            <td>{{user.username}}</td>
                            <td>{{user.email}}</td>
                            <td><ul>{%for group in user.groups.all%}
                                        <li>{{group.name}}</li>
                                        {%endfor%}</ul></td>
                            <td><a class="btn btn-sm btn-primary" href="{% url 'user.edit' pk=user.id %}">Edit</a></td>
                            <td><a class="btn btn-sm btn-primary" href="{% url 'reset.password' user_id=user.id %}">Reset Password</a></td>
                        </tr>
                        {%endfor%}
                    </tbody>
                </table>
            </div>
            <a href="{%url 'register'%}" class="btn btn-primary my-3">Add Account</a>
        </div>
    </div>
</div>




{%endblock%}