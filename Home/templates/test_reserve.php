<html lang=en>
    <head>
        <title>{{reserve.firstname}}</title>
    </head>
    <body>
    <p id="demo">print here:</p>

<script>
var reserve = {{reserve_html}};

document.getElementById("demo").innerHTML = reserve;

</script>
        <form>
        <h1>{{reserve.reservationID}}</h1>

        <table border="1">
        
            <tr>
                <td>{{ reserve.reservationID}}</td>
                <td>{{ reserve.firstname}}</td>
                <td>{{ reserve.lastname }}</td>
                <td>{{ reserve.date }}</td>
                <td>{{ reserve.downpayment }}</td>
                <td>{{ reserve.totalPayment }}</td>
                <td>{{ reserve.balance }}</td>  
                <td>{{ reserve.status }}</td> 
            </tr>
        </table>

<p>
<a href="{%url 'sample'%}">return</a>
</p>
        </form>
    </body>
</html>