from django.db import models
from Reservation.models import Discount
import random
import string
from decimal import Decimal

# Create your models here.

class RoomType(models.Model):
    room_type = models.CharField(max_length=50)

    def __str__(self):
        return self.room_type

class Room(models.Model):
    room_number = models.CharField(max_length=10)
    room_type = models.ForeignKey(RoomType, on_delete=models.CASCADE)
    price_per_night = models.DecimalField(max_digits=10, decimal_places=2)

    def __str__(self):
        return self.room_number  # You can change this to display room type and number


    
class Reservation(models.Model):
    room = models.ManyToManyField(Room,  default=1, blank=True, null=True)
    check_in_date = models.DateField()
    check_out_date = models.DateField()
    check_in_time = models.TimeField()  # New field for check-in time
    check_out_time = models.TimeField()  # New field for check-out time
    guest_name = models.CharField(max_length=100)
    guest_email = models.EmailField()
    guest_phone = models.CharField(max_length=20)
    num_guests = models.PositiveIntegerField(default=1)
    discount_code = models.ForeignKey(Discount, on_delete=models.SET_NULL, null= True, blank= True)
    reservation_time = models.CharField(max_length=10, choices=[('Morning', 'Morning'), ('Night', 'Night')])
    RESERVATION_TYPE_CHOICES = (
        ('public', 'Public'),
        ('private', 'Private'),
    )

    reservation_type = models.CharField(max_length=10, choices=RESERVATION_TYPE_CHOICES)
    reference_number = models.CharField(max_length=16, unique=True, null=True)
    reservationChoices=(
    ('Approved','Approved'),
    ('Pending','Pending'),
    ('Cancelled','Cancelled'),
  )
    status = models.CharField(choices=reservationChoices, max_length=10,default='Pending')
    date = models.DateField(auto_now=True)
    total = models.DecimalField(max_digits=10, decimal_places=2)

    def generate_unique_reference_number(self):
        while True:
            reference_number = ''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(8))
            if not Reservation.objects.filter(reference_number=reference_number).exists():
                return 'MGREP-' + reference_number

    def save(self, *args, **kwargs):
        if not self.reference_number:
            self.reference_number = self.generate_unique_reference_number()     
        super().save(*args, **kwargs)



class UnavailableDate(models.Model):
    date = models.DateField()

    def __str__(self) -> str:
        return str(self.date)
