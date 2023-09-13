{% extends "master.php" %}
{% load static %}
{% block title %} Reserve {% endblock %}
{%block head%}
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{%static 'css/Reserve_style.css'%}">
{%endblock%}
 {% block content %}
<div class="container tm-row m-auto container reserve-form reserve_section"">
 <div id="booking" class="section">




	<div class="section-center">
		<div class="container">
			<div class="row">
				<div class="booking-form">
					<form method="POST">
						{% csrf_token %}
						<div class="select-div">
						<div class="row no-margin">
							<div class="col-md-3">
								<div class="form-header">
									<h3>Already have a Reservaion?</h3>
									<h4 class="mb-2">{{form2.non_sfield_errors.as_text}}</h4>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row no-margin">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Reference Code</span>
											{{form_2.reference}}
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-btn">
									<button class="submit-btn" name="check">Check status</button>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>





	<div class="section-center2">
		<div class="container">
			<div class="row">
				<div class="booking-form">
					<form method="POST">
						{% csrf_token %}
						<div class="select-div">
						<div class="row no-margin">
							<div class="col-md-3">
								<div class="form-header">
									<h2>Book Now</h2>
									<h3 class="mb-2">{{form.non_field_errors.as_text}}</h3>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row no-margin">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Check In</span>
											{{form.checkIn}}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Time and Maximum Pax</span>
											{{form.prices}}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Check Out</span>
											{{form.checkOut}}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Check In Time</span>
											{{form.timeIn}}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Check Out Time</span>
											{{form.timeOut}}
										</div>
									</div>
									
									
									
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-btn">
									<button class="submit-btn" name="new">Check availability</button>
									
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	
	
</div>
</div>
	
<script>
$(function () {
	$('.select-div').on('change', 'select', function (e) {//use on to delegate
		var v = $(e.target).val(), t = $(e.target).find(':selected').text(), p = $(e.target).closest('.select-div');
		if (v) {
			var c = (function(t) {
				switch(t) {
					case '---------': return 0;
					{%for price in prices%}
					case 'For {{price.dayTime}} Reservation with Maximum of {{price.maxPax}} Pax': 
					var day = "{{price.dayTime}}"
					switch(day){
						case "Day":
						console.log('day: ' + day )
						var now=document.getElementById("id_checkIn").value
						document.getElementById("id_timeIn").value = "07:00"
						document.getElementById("id_timeOut").value = "19:00"
						document.getElementById("id_checkOut").value = now
						break;

						case "Night":
						console.log('Night: ' + day )
						var now=document.getElementById("id_checkIn").value
						var numdate = now.split('-');
						console.log(now)
						var year = parseInt(numdate[0]);
						var month = parseInt(numdate[1]);
						if(month < 10){
							month = "0" + month;
						}
						var day = parseInt(numdate[2])+1;
						if(day < 10){
							day = "0" + day;
						}
						numdate = year+"-"+month+"-"+day;
						console.log(numdate)

						document.getElementById("id_timeIn").value = "19:00"
						document.getElementById("id_timeOut").value = "07:00"
						document.getElementById("id_checkOut").value = numdate
						break;


						case "Whole Day":
						console.log('Whole Day: ' + day )
						var now=document.getElementById("id_checkIn").value
						var numdate = now.split('-');
						console.log(now)
						var year = parseInt(numdate[0]);
						var month = parseInt(numdate[1]);
						if(month < 10){
							month = "0" + month;
						}
						var day = parseInt(numdate[2])+1;
						if(day < 10){
							day = "0" + day;
						}
						console.log(day)
						numdate = year+"-"+month+"-"+day;
						console.log(numdate)

						document.getElementById("id_timeIn").value = "07:00"
						document.getElementById("id_timeOut").value = "07:00"
						document.getElementById("id_checkOut").value = numdate
						break;	getElementById("id_checkOut").value = numdate
						break;
					}
					return {{price.price}};

					{%endfor%}
				}
			})(t);
		}
	});
});

</script>
 {% endblock %}
