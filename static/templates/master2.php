{% load static %}
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>{% block title %}{% endblock %}</title>
      {%block head%} {%endblock%}
      <meta name="keywords" content="Resort">
      <meta name="description" content="">
      <meta name="author" content="YouNIX">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{% static 'css/bootstrap.min.css' %}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{% static 'css/css4.css' %}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{% static 'css/responsive10.css' %}">
      <!-- fevicon -->
      <link rel="icon" href="{% static 'images/fevicon.png '%}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{% static 'css/jquery.mCustomScrollbar.min.css'%}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{% static 'css/owl.carousel.min.css'%}">
      <link rel="stylesheet" href="{% static 'css/nice-select.css'%}">
      <link rel="stylesheet" href="{% static 'css/owl.theme.default.min.css' %}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body style="background-color: black;">
      <!-- Javascript files-->
      <script src="{%static 'js/jquery.min.js'%}"></script>
      <script src="{%static 'js/popper.min.js'%}"></script>
      <script src="{%static 'js/bootstrap.bundle.min.js'%}"></script>
      <script src="{%static 'js/jquery-3.0.0.min.js'%}"></script>
      <script src="{%static 'js/plugin.js'%}"></script>
      <script src="{%static 'js/popper.js'%}"></script>  
      <script src="{%static 'js/main11.js'%}"></script>
      <!-- sidebar -->
      <script src="{%static 'js/jquery.mCustomScrollbar.concat.min.js'%}"></script>
      <script src="{%static 'js/custom.js'%}"></script>
      <!-- javascript --> 
      <script src="{%static 'js/owl.carousel.js'%}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
      <script src="{%static 'js/popper.js'%}"></script>  
      <script src="{%static 'js/main11.js'%}"></script>    
      <!-- header section start -->  

      <div class="container py-5 h-100">
         <div class="row justify-content-center align-items-center h-100">
           <div class="col-12 col-lg-9 col-xl-7">
             <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
               <div class="card-body p-4 p-md-5">

   {%block content%}

   {%endblock%}
</div>
</div>
</div>
</div>
</div>
    <!-- Javascript files-->
      <script src="{%static 'js/jquery.min.js'%}"></script>
      <script src="{%static 'js/popper.min.js'%}"></script>
      <script src="{%static 'js/bootstrap.bundle.min.js'%}"></script>
      <script src="{%static 'js/jquery-3.0.0.min.js'%}"></script>
      <script src="{%static 'js/plugin.js'%}"></script>
      <script src="{%static 'js/popper.js'%}"></script>  
     
      <!-- sidebar -->
      <script src="{%static 'js/jquery.mCustomScrollbar.concat.min.js'%}"></script>
      <script src="{%static 'js/custom.js'%}"></script>
      <!-- javascript --> 
      <script src="{%static 'js/owl.carousel.js'%}"></script>
      
      <script src="{%static 'js/popper.js'%}"></script>  
      </body>
</html>
   