{% load static %}
{% load humanize %}
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
      <title>Customer Receipt</title>
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
   <body>

<div class="card" >
    <div class="card-body" >
      <div class="container mb-5 mt-3">
        <div class="row d-flex align-items-baseline">
          <div class="col-xl-9">
            <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID:{{reserve.referenceNum}}</strong></p>
          </div>
          <div class="col-xl-3 float-end">
            <a  onClick="printDiv('receipt')"  class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                class="fas fa-print text-primary"></i> Print</a>
                <a href="{% url 'index' %}"class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                    class="far fa-file-pdf text-danger"></i> Exit</a>
          </div>
          <hr>
        </div>
  
        <div class="container" id="receipt">
          <div class="col-md-12">
            <div class="text-center">
              <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
              <p class="pt-0">Madonna's Gardern Resort and Event Place</p>
            </div>
  
          </div>
  
  
          <div class="row">
            <div class="col-xl-8">
              <ul class="list-unstyled">
                <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{reserve.customer}}</span></li>
                <li class="text-muted">Check In: {{reserve.checkIn}} {{reserve.timeIn}}</li>
                <li class="text-muted">check Out: {{reserve.checkIn}} {{reserve.timeIn}}</li>
              </ul>
            </div>
            <div class="col-xl-4">
              <p class="text-muted">Invoice</p>
              <ul class="list-unstyled">
                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                    class="fw-bold">ID:</span>{{reserve.referenceNum}}</li>
                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                    class="fw-bold">Creation Date: </span>
                       {{reserve.date}}</li>
                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                    class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                    {{reserve.status}}</span></li>
              </ul>
            </div>
          </div>
  
          <div class="row my-2 mx-1 justify-content-center">
            <table class="table table-striped table-borderless">
              <thead style="background-color:#84B0CA ;" class="text-white">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Downpayment</th>
                  <th scope="col">Balance After Downpayment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>{{reserve.prices}}</td>
                  <td>{{reserve.discount}}</td>
                  <td>₱ {{reserve.downpayment| intcomma}}</td>
                  <td>₱ {{reserve.balance| intcomma}}</td>
                </tr>
              </tbody>
  
            </table>
          </div>
          <div class="row">
            <div class="col-xl-8">
              <p class="ms-3">Add additional notes and payment information</p>
  
            </div>
            <div class="col-xl-3">
              <p class="text-black float-start"><span class="text-black me-3"> Total Amount:</span><span
                  style="font-size: 25px;"></br> ₱ {{reserve.totalPayment| intcomma }}</span></p>
            </div>
          </div>
          <hr>
          
  
        </div>
      </div>
    </div>
  </div>
  <script>
    function printDiv(divName) {
      console.log("test");
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);
 
      document.body.innerHTML = printContents;
 
      window.print();
 
      document.body.innerHTML = originalContents;
 }


  </script>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
      <script src="{%static 'js/popper.js'%}"></script>  
      {% comment %} <script src="{%static 'js/main11.js'%}"></script>     {% endcomment %}
   </body>
</html>
   