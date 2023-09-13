{% load static %}
{% load customFilters %}
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

      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{% static 'css/bootstrap.min.css' %}">
      <!-- style css -->
      {% comment %} <link rel="stylesheet" type="text/css" href="{% static 'css/css4.css' %}"> {% endcomment %}
      <link rel="stylesheet" type="text/css" href="{% static 'css/sidebar.css' %}">
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
      <link rel="stylesheet" href="{% static 'css/sidebar.css'%}">
      <link rel="stylesheet" href="{% static 'css/owl.theme.default.min.css' %}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
    <script src="{%static 'js/jquery.min.js'%}"></script>
    <script src="{%static 'js/jquery-3.0.0.min.js'%}"></script>  
      <!-- sidebar -->
      <script src="{%static 'js/jquery.mCustomScrollbar.concat.min.js'%}"></script>
      <script src="{%static 'js/custom.js'%}"></script>
      <!-- javascript --> 
      <script src="{%static 'js/owl.carousel.js'%}"></script
      <script src="{%static 'js/popper.js'%}"></script>   
  {% comment %} 
<div id="mySidenav" class="sidenav">
  <img src="{% static 'images/logo2.png' %}">
  <a href="{%url 'main'%}">Reservations</a>
  <a href="#">Users</a>
  <a href="{%url 'blog'%}">Blogs</a>
  <a href="#">Reports</a>
  <a href="{%url 'facility.staff'%}">Facilities</a>
  <a href="">Discount Codes</a>
  <a href="">Testimonies</a>
  <a href="">Gallery</a>
  <a href="{%url 'logout'%}" class="mb-4 fixed-bottom" style="width:250px;">Logout</a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">open</span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div class="main"> {% endcomment %}


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-light navbar-light">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="ms-3">
                            <h3 class="mb-0">{{request.user.get_full_name}}</h3>
                            <h5>{{request.user.username}}</>
                            </br>
                            <span>{{request.user.groups.all.0}}</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        {% if user|is_member_of_group:'Admin'%} 
                       <div class="nav-item dropdown">
                           <a href="url" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Reservation</a>
                           <div class="dropdown-menu bg-transparent border-0">
                               <a href="{% url 'main'%}" class="dropdown-item">Reservations</a>
                               <a href=" {% url 'discount.view' %} " class="dropdown-item">Discounts</a>
                           </div>
                       </div>
                       {% endif %}

                       {% if user|is_member_of_group:'Staff'%}
                       <div class="nav-item dropdown">
                           <a href="url" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Reservation</a>
                           <div class="dropdown-menu bg-transparent border-0">
                               <a href="{% url 'main'%}" class="dropdown-item">Reservations</a>
                               <a href=" {% url 'discount.view' %} " class="dropdown-item">Discounts</a>
                           </div>
                       </div>
                       {% endif %}

                       {% if user|is_member_of_group:'Admin'%}
                       <a href="{% url 'reports' %}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                       <a href="{%url 'user.view'%}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Users</a>
                       {% endif %}


                       {% if user|is_member_of_group:'Admin'%}
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Home Page</a>
                           <div class="dropdown-menu bg-transparent border-0">
                               <a href="{% url 'facility.staff' %}" class="dropdown-item">Facilities</a>
                               <a href="{% url 'blog' %}" class="dropdown-item">Blogs</a>
                               <a href="{%url 'gallery.staff'%}" class="dropdown-item">Gallery</a>
                           </div>
                         
                        </div>
                        {% endif %}

                        {% if user|is_member_of_group:'Social Media Manager'%}
                       <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Home Page</a>
                           <div class="dropdown-menu bg-transparent border-0">
                               <a href="{% url 'facility.staff' %}" class="dropdown-item">Facilities</a>
                               <a href="{% url 'blog' %}" class="dropdown-item">Blogs</a>
                               <a href="{%url 'gallery.staff'%}" class="dropdown-item">Gallery</a>
                           </div>
                         
                        </div>
                        {% endif %}

                </nav>
            </div>
            <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="nav navbar-nav ms-auto navbar-right">
                   
                    <a href=" {% url 'password.change'%}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Change Password</a>
                    <a href="{% url 'logout' %}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Signout</a>
                    
                </div>
            </nav>
            <!-- Navbar End -->

            {% if messages %}
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        {% for message in messages %}
        <li>{{ message }}</li>
        {% endfor %}
    </ul>
</div>
{% endif %}
        
  
{%block content%}

{%endblock%}
</div>
        <!-- Content End -->
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{% static 'lib/chart/chart.min.js '%}"></script>
<script src="{% static 'lib/easing/easing.min.js '%}"></script>
<script src="{% static 'lib/waypoints/waypoints.min.js '%}"></script>
<script src="{% static 'lib/owlcarousel/owl.carousel.min.js '%}"></script>
<script src="{% static 'lib/tempusdominus/js/moment.min.js '%}"></script>
<script src="{% static 'lib/tempusdominus/js/moment-timezone.min.js '%}"></script>
<script src="{% static 'lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js '%}"></script>
    <!-- Javascript files-->
    <script src="{%static 'js/main_sidebar.js'%}"></script>
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