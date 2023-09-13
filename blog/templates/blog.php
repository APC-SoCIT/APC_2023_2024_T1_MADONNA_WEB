{%extends "sidebar.php"%}
{%load static%}

        {%block title%}Blog Admins{%endblock%}
{%block content%}


<div class="content">
    <div class="container">
        <div class="container pt-4 px-4">
            <h1 class="p-5">Blogs</h1>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Posted?</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for x in  blog%}
                        <tr>
                            <td>{{x.blog_id}}</td>
                            <td>{{x.blog_title}}</td>
                            <td>{{x.blog_content|truncatewords:5}}</td>
                            <td>{{x.blog_owner}}</td>
                            <td>{{x.blog_status}}</td>
                            <td><a href = "{%url 'blog.update' pk=x.blog_id%}"> Edit Blog</a></td>
                        </tr>
                        {%endfor%}
                    </tbody>
                </table>
            </div>
            <a href="{%url 'blog.add'%}" class="btn btn-primary my-3">Add new Blog</a>
        </div>
    </div>
</div>

{% if messages %}
<ul class="messages">
    {% for message in messages %}
    <li  {% if message.tags %} class=" {{ message.tags }} " {% endif %}> {{ message }} </li>
    {% endfor %}
</ul>
{% endif %} 
{%endblock%}

