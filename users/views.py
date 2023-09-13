from django.shortcuts import render, redirect, get_object_or_404
from django.http import HttpResponseRedirect
from django.contrib.auth import login, authenticate
from django.contrib import messages
from django.urls import reverse_lazy
from django.contrib.messages.views import SuccessMessageMixin
from .forms import UserRegistrationForm, UserUpdateForm, ResetPasswordForm
from django.views.generic import CreateView, TemplateView,ListView, DetailView, UpdateView
from blog.models import Blog, Gallery
from blog.forms import  BlogForms
from django.views.generic.edit import DeleteView, FormView
from django.contrib.auth.views import LoginView, LogoutView
from django.contrib.auth.forms import PasswordChangeForm
from django.contrib.auth.views import PasswordChangeView
from django.contrib.auth.mixins import LoginRequiredMixin, PermissionRequiredMixin, UserPassesTestMixin
from django.contrib.auth.models import User 
from Reservation.models import Reservations, Facility
from Reservation.forms import FacilityForm
from Home.forms import GalleryForm
from django.contrib.auth.models import User
from .mixins import GroupRequiredMixin
from django.contrib.auth.models import Group
from django.utils.decorators import method_decorator
from .decorators import groups_required

# Create your views here.

#Account Management
class StaffLoginView(LoginView):
  template_name = 'users/loginTest.php'
  redirect_authenticated_user= True
  def form_valid(self, form):
    response = super().form_valid(form)  
    if self.request.user.groups.filter(name='Social Media Manager').exists():
      return redirect('/staff/gallery')
    else:
      #redirect_authenticated_user= True
      return redirect('/staff')

class StaffLogoutView(LogoutView):
  template_name = 'users/logout.php'
  login_url = "login"

@method_decorator(groups_required(['Admin', 'Staff']), name='dispatch')
class reserveListView(LoginRequiredMixin,ListView):
  model = Reservations
  context_object_name = 'reserve'
  template_name = 'users/home.php'
  login_url = "login"

@method_decorator(groups_required(['Admin']), name='dispatch')
class userList(LoginRequiredMixin, ListView):
  model=User
  context_object_name = 'user1'
  template_name = 'users/user_list.php'

@method_decorator(groups_required(['Admin']), name='dispatch')
class registerUser(LoginRequiredMixin, CreateView):
  form_class = UserRegistrationForm
  template_name = 'users/register.php'
  success_url = '/accounts/'

class changepassword(PasswordChangeView, LoginRequiredMixin):
  form_class = PasswordChangeForm
  template_name = 'users/user_changePass.php'
  success_url = '/staff'

@method_decorator(groups_required(['Admin']), name='dispatch')
class editUser(LoginRequiredMixin,UpdateView):
  form_class=UserUpdateForm
  model = User
  template_name='users/edit_user.php'
  success_url = '/accounts/'

def is_admin(user):
    return user.groups.filter(name='Admin').exists()
@method_decorator(groups_required(['Admin']), name='dispatch')

class resetPasswordView(UserPassesTestMixin, FormView):
   template_name = 'users/reset_password.php'
   form_class = ResetPasswordForm
   success_url = '/accounts/'
   
   def test_func(self):
      return is_admin(self.request.user)
   
   def get_form_kwargs(self):
    kwargs = super().get_form_kwargs()
    kwargs['user'] = self.get_user()
    return kwargs
   
   def get_user(self):
    user_id = self.kwargs.get('user_id')
    return get_object_or_404(User, pk=user_id)
   
   def form_valid(self, form):
    form.save()
    messages.success(self.request, 'Password changed successfully.') 
    return super().form_valid(form)
  


# Blogs 


class newBlog(LoginRequiredMixin, CreateView, PermissionRequiredMixin):
  model = Blog
  form_class = BlogForms
  success_url ='/blog'
  template_name = 'new_Blog.php'
  login_url = "login"
  permission_required = ('blog.can_view')

class viewBlogs(PermissionRequiredMixin, LoginRequiredMixin, ListView):
  permission_required = 'Home.view_Blog' 
  model = Blog
  context_object_name = 'blog'
  template_name = 'blog.php'
  login_url = "login"
  

class deleteBlogs(LoginRequiredMixin, DeleteView):
  model= Blog
  success_url = '/blog'
  template_name = 'delete_blog.php'
  login_url = "login"
class updateBlogs(LoginRequiredMixin, UpdateView, SuccessMessageMixin):
  model = Blog
  form_class = BlogForms
  success_message = 'List succcesfully edited'
  success_url = 'blog'
  template_name = 'edit_blog.php'
  login_url = "login"

class detaliBlog(DetailView):
    model = Blog
    context_object_name = 'blog'
    template_name = 'blog_view.php'

#Home Page/Facilities
class viewFacility(LoginRequiredMixin,ListView):
  model = Facility
  context_object_name = 'facility'
  template_name = 'users/facility_staff.php'

class newFacility(LoginRequiredMixin,CreateView):
  model = Facility
  form_class = FacilityForm
  success_url='/staff/facility'
  login_url = 'login'
  template_name = 'users/new_facility.php'

class editFacility(LoginRequiredMixin, UpdateView):
  model = Facility
  context_object_name = 'facility'
  form_class = FacilityForm
  success_url = '/staff/facility'
  template_name = 'users/edit_facility.php'


class addGallery (LoginRequiredMixin, CreateView):
  model = Gallery
  form_class = GalleryForm
  template_name = 'users/gallery_add.php'
  login_url = 'login'
  success_url = '/staff/gallery'

  def form_valid(self, form):
    self.object=form.save(commit=False)
    self.object.galleryUploader = self.request.user
    self.object.save()
    return redirect(self.get_success_url())
  
class staffGallery (LoginRequiredMixin, ListView):
  model = Gallery
  context_object_name = 'gallery'
  template_name = 'users/gallery_staff.php'
  login_url='login'

class detailGallery (LoginRequiredMixin, DetailView):
  model = Gallery
  context_object_name= 'gallery'
  template_name = 'users/gallery_detail.php'
  login_url = 'login' 

class editGallery(LoginRequiredMixin, UpdateView):
  model = Gallery
  form_class = GalleryForm
  context_object_name = 'gallery'
  template_name = 'users/gallery_edit.php'
  login_url = 'login'
  success_url = '../'

  

""" def register(request):
    if request.method == 'POST':
        form = UserRegistrationForm(request.POST)
        if form.is_valid():
            form.save()

            messages.success(request, f'Your account has been created. You can log in now!')    
            return redirect('login')
    else:
        form = UserRegistrationForm()

    context = {'form': form}
    return render(request, 'users/register.php', context) """

class deleteGallery(LoginRequiredMixin, DeleteView):
  model= Gallery
  success_url='/staff/gallery'
  template_name = 'users/delete_gallery.php'
  login_url = 'login'