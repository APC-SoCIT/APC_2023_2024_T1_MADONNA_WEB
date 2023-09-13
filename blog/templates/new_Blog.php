{%extends "master2.php"%}
{%load static}

{%block title%} New Post {%endblock%}

{%block content%}
<style>
    ul.errorlist {display:none}
    
</style>

<div class="m-auto container border border-dark rounded reserve-form reserve_section " style="background-color:  #ffb607">
<h3 class=" layout-padding" style="text-align: center">Add new Blog</h3>
<form  action="{% url 'blog.add'%}" method = "POST" enctype="multipart/form-data">
{%csrf_token%} 
<div class="form-row">
<div class="form-group col-md-6">
    {{form.blog_title.label}}
    {{form.blog_title}}
</div>
<div class="form-group col-md-6">
{{form.blog_pic.label}}
{{form.blog_pic}}
    
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
{{form.blog_content.label}}
    {{form.blog_content}}
</div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{form.blog_status.label}}
            {{form.blog_status}}
        </div>
</div>
<div class="form-group">   
<div class="container d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"> Submit </button>
            <a href="{%url 'blog'%}" class="btn btn-danger"> cancel </a>
        </div>
 </div>
</form>


{%if form.errors%}
<script>
    window.alert("{{form.errors.as_text}}");
</script>
{%endif%}
</div>
{%endblock%}