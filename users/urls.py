from . import views
from django.contrib import admin
from django.urls import include, path
from django.contrib.auth import views as auth_views

urlpatterns = [
    path('register', views.registerUser.as_view(), name='register'),
    path('login', views.StaffLoginView.as_view(), name='login'),
    path('logout', views.StaffLogoutView.as_view(), name='logout'),
    path('staff', views.reserveListView.as_view(), name='main'),
    path('staff/facility/new', views.newFacility.as_view(), name='facility.new'),
    path('staff/facility', views.viewFacility.as_view(), name='facility.staff'),
    path('staff/facility/edit/<int:pk>', views.editFacility.as_view(), name='facility.edit'),
    path('accounts/', views.userList.as_view(), name='user.view'),
    path('staff/gallery/add', views.addGallery.as_view(), name='gallery.add'),
    path('staff/gallery', views.staffGallery.as_view(), name='gallery.staff'),
    path('staff/gallery/<int:pk>', views.detailGallery.as_view(),name='gallery.staff.detail'),
    path('staff/gallery/edit/<int:pk>', views.editGallery.as_view(), name='gallery.staff.edit'),
    path('staff/password/change', views.changepassword.as_view(), name='password.change'),
    path('accounts/edit/<int:pk>', views.editUser.as_view(), name='user.edit'),
    path('accounts/delete/<int:pk>', views.deleteGallery.as_view(), name='gallery.delete'),
    path('change_password/<int:user_id>', views.resetPasswordView.as_view(), name='reset.password'),
]
