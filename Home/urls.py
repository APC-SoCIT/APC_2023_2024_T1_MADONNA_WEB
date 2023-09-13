from . import views
from django.contrib import admin
from django.urls import include, path
from django.contrib.auth import views as auth_views


urlpatterns = [
    
    path('', views.indexView.as_view(), name='index'),
    path('about/', views.aboutView.as_view(), name='about'),
    path('sample', views.sampleView.as_view(), name='sample'),
    path('add/', views.addView.as_view(), name='add'),
    path('add/addrecord/', views.addrecord, name='addrecord'),
    path('facilities/', views.facilitiesView.as_view(), name='facility.view'),
    path('gallery/', views.GalleryView.as_view(), name='gallery'),
    path('gallery/<int:pk>', views.detailGallery.as_view(), name='gallery.detail')
    
]