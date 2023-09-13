{% extends "master.php" %}
{% load static %}
      {% block title %}Welcome to Madonna's {% endblock %}

      {% block content %}

      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="costum_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <h1 class="furniture_text">Resort</h1>
                     <p class="there_text">Taking a break from work? Or wanted to have a place to chill? The resort has it all!
                        Relax and engage swimming activities here at Madonna's!</p>
                     <div class="contact_bt_main">
                        <div class="contact_bt"><a href="{% url 'about' %}">Contact Us</a></div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="furniture_text">Event Place</h1>
                     <p class="there_text">where you can have an occassion with a venue has multiple facilities!</p>
                     <p></p>
                     
                     <div class="contact_bt_main">
                        <div class="contact_bt"><a href="{% url 'about' %}">Contact Us</a></div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#costum_slider" role="button" data-slide="prev">
               <i class=""><img src="{%static 'images/left-arrow.png'%}"></i>
               </a>
               <a class="carousel-control-next" href="#costum_slider" role="button" data-slide="next">
               <i class=""><img src="{%static 'images/right-arrow.png'%}"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">our services</h1>
            <div class="services_section2 layout_padding">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="{%static 'images/icon-1.png'%}"></div>
                     <h2 class="furnitures_text">Multi-Purpose Hall</h2>
                     <p class="dummy_text">Madonna's Resort has a venue for all events, with our Multi-Purpose
                        Hall we can ensure that your event can have a place in our lovely Resort.
                     </p>
                     <div class="read_bt_main">
                        <div class="read_bt"><a href="{% url 'gallery' %}">Read More</a></div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="{%static 'images/icon-2.png'%}"></div>
                     <h2 class="furnitures_text">Rooms and Cottages</h2>
                     <p class="dummy_text">Plan to stay over the weekend? We got you covered. Our resort
                        provides rooms and cottages that can be used all day and night.   
                     </p>
                     <div class="read_bt_main">
                        <div class="read_bt"><a href={% url 'facility.view' %}>Read More</a></div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="{%static 'images/icon-3.png'%}"></div>
                     <h2 class="furnitures_text">Fun Activities</h2>
                     <p class="dummy_text">Is the Pool not enough? We have you covered as we have amenities that can
                        help you in planning your fun activities.
                     </canvas></p>
                     <div class="read_bt_main">
                        <div class="read_bt"><a href={% url 'facility.view' %}>Read More</a></div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="{%static 'images/icon-4.png'%}"></div>
                     <h2 class="furnitures_text">Pools</h2>
                     <p class="dummy_text">Help yourself to our pools that will help you revitalize your spirit
                        and have fun with your friends and colleagues. 
                     </p>
                     <div class="read_bt_main">
                        <div class="read_bt"><a href={% url 'facility.view' %}>Read More</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
      <!-- furnitures section start -->
      <div class="furnitures_section layout_padding">
         <div class="container">
            <h1 class="our_text">Our beautiful pools</h1>
            <p class="ipsum_text">The resort features a large pool both for public and private!</p>
            <div class="furnitures_section2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <div class="container_main">
                        <img src="{{pool1.0.1}}" alt="Avatar" class="image">
                        <div class="overlay">
                           <a href={% url 'facility.view' %} class="icon" title="User Profile">
                           <i class="fa fa-search"></i>
                           </a>
                        </div>
                     </div>
                     <h3 class="temper_text">Public Pool</h3>
                     <p class="dololr_text">Our Public Pool is open for everyone for free with only the need of paying the entrance fee before venturing the pool.</p>
                  </div>
                  <div class="col-md-6">
                     <div class="container_main">
                        <img src="{{pool1.1.1}}" alt="Avatar" class="image">
                        <div class="overlay">
                           <a href={% url 'facility.view' %} class="icon" title="User Profile">
                           <i class="fa fa-search"></i>
                           </a>
                        </div>
                     </div>
                     <h3 class="temper_text">Private Pool</h3>
                     <p class="dololr_text">Private Pool is for people who wants to reserve a large pool for their group business outing, company outing, or outing for large family.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- furnitures section end -->
      <!-- who section start -->
      <div class="who_section layout_padding">
         <div class="container">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
         </div>
         <div class="get_bt_main">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="get_bt"><a href={% url 'about' %}>About Us</a></div>
         </div>
      </div>
      <!-- who section end -->
      <!-- projects section start -->
      <div class="projects_section layout_padding">
         <div class="container">
            <h1 class="our_text">Our Amenities and Facilities</h1>
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="projects_section2">
                        <div class="container_main2">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.2.1}}" width = "2000" height = "922" alt="Avatar" class="image">
                                    <h1 class="modern_text">{{pool1.2.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.3.1}}" width = "2000" height = "922" alt="Avatar" class="image" >
                                    <h1 class="modern_text">{{pool1.3.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.4.1}}" width = "2000" height = "922" alt="Avatar" class="image">
                                    <h1 class="modern_text">{{pool1.4.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="projects_section2">
                        <div class="container_main1">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.5.1}}" width = "2000" height = "922" alt="Avatar" class="image" >
                                    <h1 class="modern_text">{{pool1.5.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.6.1}}" width = "2000" height = "922" alt="Avatar" class="image" >
                                    <h1 class="modern_text">{{pool1.6.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.7.1}}" width = "2000 " height = "922" alt="Avatar" class="image" >
                                    <h1 class="modern_text">{{pool1.7.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="projects_section2">
                        <div class="container_main1">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.8.1}}" alt="Avatar" class="image" style="width:100%">
                                    <h1 class="modern_text">{{pool1.8.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="{{pool1.9.1}}" alt="Avatar" class="image" style="width:100%">
                                    <h1 class="modern_text">{{pool1.9.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="/{{pool1.10.1}}" alt="Avatar" class="image" style="width:100%">
                                    <h1 class="modern_text">{{pool1.10.2}}</h1>
                                    <div class="middle">
                                       <a href="{% url 'facility.view' %}"><div class="text">VIEW MORE</div> </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- client section end -->


      {% endblock %}
    