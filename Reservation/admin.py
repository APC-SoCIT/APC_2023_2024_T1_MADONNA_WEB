from django.contrib import admin
from .models import Reservations, Customer, Discount, Facility

# Register your models here.
@admin.register(Reservations)
class RequestDemoAdmin(admin.ModelAdmin):
    list_display=['customer','checkIn', 'checkOut', 'prices']

admin.site.register(Customer)
admin.site.register(Facility)
admin.site.register(Discount)