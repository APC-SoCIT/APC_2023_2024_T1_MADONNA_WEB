from . import views
from django.contrib import admin
from django.urls import include, path
from django.contrib.auth import views as auth_views
from django.conf import settings
from django.conf.urls.static import static 


urlpatterns = [
    path('staff/', views.viewBlogs.as_view(), name='blog'),
    path('new/', views.newBlog.as_view(), name='blog.add'),
    path('delete/<int:pk>/', views.deleteBlogs.as_view(), name='blog.delete'),
    path('update/<int:pk>/', views.updateBlogs.as_view(), name='blog.update'),
    path('home/', views.blogCustomer.as_view(), name='blog.customer'),
    path('home/<int:pk>', views.detailBlog.as_view(),name='blog.detail'),
]+ static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)