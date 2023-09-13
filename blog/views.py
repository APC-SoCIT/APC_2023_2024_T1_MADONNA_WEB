from django.shortcuts import render, redirect
from django.core import serializers
from django.http import HttpResponse, HttpResponseRedirect
from django.urls import reverse
from django.template import loader
from django.views.generic import CreateView, TemplateView,ListView, DetailView, UpdateView
from django.views.generic.edit import DeleteView
from blog.models import Blog
from blog.forms import BlogForms
from django.contrib.auth.mixins import LoginRequiredMixin, PermissionRequiredMixin
from django.contrib.messages.views import SuccessMessageMixin
from django.contrib.auth import login, authenticate

# Create your views here.
#Blogs

class detailBlog(DetailView):
    model = Blog
    context_object_name = 'blog'
    template_name = 'blog_detail.php'

class blogCustomer(ListView):
  model = Blog
  context_object_name = 'blog'
  template_name = 'blog_Customer.php'

class newBlog(LoginRequiredMixin, CreateView, PermissionRequiredMixin):
  model = Blog
  form_class = BlogForms
  success_url ='/blog/staff/'
  template_name = 'new_Blog.php'
  login_url = "login"
  permission_required = ('blog.can_view')

  def form_valid(self, form):
    self.object=form.save(commit=False)
    self.object.blog_owner = self.request.user
    self.object.save()
    return redirect(self.get_success_url())

class viewBlogs(PermissionRequiredMixin, LoginRequiredMixin, ListView):
  permission_required = 'Home.view_Blog' 
  model = Blog
  context_object_name = 'blog'
  template_name = 'blog.php'
  login_url = "login"
  
class deleteBlogs(LoginRequiredMixin, DeleteView):
  model= Blog
  success_url = '/blog/staff/'
  template_name = 'delete_blog.php'
  login_url = "login"
class updateBlogs(LoginRequiredMixin, UpdateView, SuccessMessageMixin):
  model = Blog
  form_class = BlogForms
  success_message = 'List succcesfully edited'
  success_url = '/blog/staff/'
  template_name = 'edit_blog.php'
  login_url = "login"



