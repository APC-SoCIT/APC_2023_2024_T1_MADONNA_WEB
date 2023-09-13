from django import forms
from django.contrib.auth.forms import UserCreationForm, UserChangeForm, SetPasswordForm
from django.contrib.auth.models import User, Group


class UserRegistrationForm(UserCreationForm):
    groups = forms.ModelChoiceField(queryset=Group.objects.all(), required=True)
    email = forms.EmailField()

    class Meta:
        model = User
        fields = ['username', 'first_name', 'last_name', 'email',
                  'password1', 'password2', 'groups']
        widgets = {
            'username' : forms.TextInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off','autocomplete':'off'}),
            'password1' : forms.PasswordInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'password2' : forms.PasswordInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'email' : forms.EmailInput(attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'first_name' : forms.TextInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'last_name' : forms.TextInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
        }

        labels = {
            'username' : "Username",
            'email' : "Email",
            'first_name' : "First Name",
            'last_name' : "Last Name",
            'groups' : "Assign as",
        }
    def save(self, commit=True):
        user = super().save(commit=False)
        group = self.cleaned_data.get('groups')

        if group:
            user.groups.set([group])
        else:
            user.groups.clear()

        if commit:
            user.save()

        return user 




class UserUpdateForm(UserChangeForm):
    groups = forms.ModelChoiceField(queryset=Group.objects.all(), required=True)
    email = forms.EmailField()
    is_active = forms.BooleanField()

    class Meta:
        model = User
        fields = ['username', 'first_name', 'last_name', 'email',
                  'password', 'is_active', 'groups']
        widgets = {
            'username' : forms.TextInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'password' : forms.PasswordInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            #'password2' : forms.PasswordInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'email' : forms.TextInput(attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'first_name' : forms.TextInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'last_name' : forms.TextInput( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
            'is_active' : forms.RadioSelect( attrs={'class' : 'form-control form-control-lg','autocomplete':'off'}),
        }

        labels = {
            'username' : "Username",
            'email' : "Email",
            'first_name' : "First Name",
            'last_name' : "Last Name",
            'groups' : "Assign as",
        }

    def save(self, commit=True):
        user = super().save(commit=False)
        group = self.cleaned_data.get('groups')

        if group:
            user.groups.set([group])
        else:
            user.groups.clear()

        if commit:
            user.save()

        return user


class ResetPasswordForm(SetPasswordForm):
    new_password1 = forms.CharField(
        label="New Password",
        widget=forms.PasswordInput(attrs={'class': 'form-control'}),
    )
    new_password2 = forms.CharField(
        label="Confirm Password",
        widget=forms.PasswordInput(attrs={'class': 'form-control'}),
    )

    def __init__(self, user, *args, **kwargs):
        super().__init__(user, *args, **kwargs)
        self.fields['new_password1'].help_text = None  # Remove help text

    class Meta:
        model = User
        fields = ['new_password1', 'new_password2']