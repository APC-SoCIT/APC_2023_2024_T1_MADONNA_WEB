from django.utils import timezone
from django.test import TestCase
from Reservation.forms import ReservationForm

# Create your tests here.


class ReservationFormTestCase(TestCase):
    """
    Test cases for Reservation forms
    """

    def test_reservation_form_valid(self):
        data = {
            "checkIn": timezone.now().date() + timezone.timedelta(days=1),
            "checkOut": timezone.now().date() + timezone.timedelta(days=2),
            "downpayment": 100,
            "totalPayment": 500,
            "balance": 400,
            "status": "Yes",
            "discounted": 1,
        }
        form = ReservationForm(data=data)
        self.assertTrue(form.is_valid())
