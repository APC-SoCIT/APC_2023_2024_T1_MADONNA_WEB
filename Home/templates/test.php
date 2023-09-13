{%extends "master2.php"%}
{%load static%}

        {%block title%}Sample{%endblock%}
{%block content%}

<div class="container center-content" style="background-color:#ffb607;">
        <h1 class=>Current Reservations</h1>
        <table border="1" class="reserve">
        {% for x in  reserve%}
            <tr>
                <td> {{ x.firstname}} {{x.lastname}}</td>
                <td> {{x.date}}</td>
                <td><a href = "{%url 'reservation.edit' pk=x.reservationID%}"> Edit Reservation</a></td>
            </tr>
        {% endfor %}
        </table>
        <a href="{%url 'blog.add'%}" class="btn btn-primary">Add new reservation</a>
</div>
{%endblock%}
