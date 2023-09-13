{%extends 'master2.php'%}
{%load static%}

{%block title%} Confirm delete{%endblock%}

{%block content%}

<div class = "container center-content d-flex justify-content-center" style="background-color:#ffb607; max-width:70%;">
<form method=post>
    {%csrf_token%}
    <p><b> Are you sure you want to delete the reservation ??</b></p>
    <p><i> This action can't be reversed</p></i>

    <div class="d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-danger m-2"> Submit </button>
            <a href="{%url 'main'%}" class="btn btn-primary m-2"> cancel </a>
        </div>
    
</form>
</div>
{%endblock%}