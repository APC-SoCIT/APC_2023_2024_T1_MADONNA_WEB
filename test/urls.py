from . import views
from django.contrib import admin
from django.urls import include, path

urlpatterns = [
    path("test/", views.testReserve, name="test"),
    path('create-reservation/',views.ReservationCreateView.as_view(), name='create_reservation'),
    path('reservation-success/', views.ReservationSuccessView.as_view(), name='reservation_success'),
    path('validate_discount_code/', views.validate_discount_code, name='validate_discount_code'),
     path('reservation/summary/<str:reference_number>/', views.ReservationSummaryView.as_view(), name='reservation_summary'),
     
]