{%extends "master2.php"%}

{% block title %}Reset Password{% endblock title %}


{% block content%}

<form method="POST" method="reset.password">
    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Change Password</h3>

    {% csrf_token %}
    {{ form.non_field_errors }}
    
    <div class="form-group">
        <label for="{{ form.new_password1.id_for_label }}">New Password:</label>
        {{ form.new_password1 }}
        {{ form.new_password1.errors }}
    </div>

    <div class="form-group">
        <label for="{{ form.new_password2.id_for_label }}">Confirm Password:</label>
        {{ form.new_password2 }}
        {{ form.new_password2.errors }}
    </div>
    
    <button type="submit" class="btn btn-primary">Change Password</button>
    <a href="{% url 'user.view' %}" class="btn btn-secondary">Cancel</a> 
</form>
{% endblock %}