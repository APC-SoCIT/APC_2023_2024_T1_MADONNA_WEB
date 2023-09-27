from django import forms
from .models import Room, Reservation, RoomType
from Reservation.models import Discount, Facility
import requests
from django.urls import reverse
from captcha.fields import ReCaptchaField
from django.conf import settings


class ReservationForm(forms.ModelForm):
    captcha  =ReCaptchaField()
    room_type = forms.ModelChoiceField(
        queryset=RoomType.objects.all(),
        required=True,
        empty_label=None,  # To force users to select a room type
    )
    reservation_type = forms.ChoiceField(choices=Reservation.RESERVATION_TYPE_CHOICES)
    
    num_rooms = forms.IntegerField(
        required=False,
        min_value=1,  # Require at least 1 room
    )
    discount_code = forms.CharField(
        max_length=50, required=False, label="Discount Code"
    )
    check_in_time = forms.TimeField(
        required=True,
        widget=forms.TimeInput(
            attrs={"placeholder": "HH:MM AM/PM", "readonly": "True"}
        ),
    )
    check_out_time = forms.TimeField(
        required=True,
        widget=forms.TimeInput(
            attrs={"placeholder": "HH:MM AM/PM", "readonly": "True"}
        ),
    )
    RESERVATION_TIME_CHOICES = [
        ("", "Select Reservation Time"),  # Add this empty choice
        ("Morning", "Morning"),
        ("Night", "Night"),
    ]

    reservation_time = forms.ChoiceField(
        choices=RESERVATION_TIME_CHOICES,
        required=True,
        label='Reservation Time'
    )
    num_guests_select = forms.ChoiceField(
        label='Number of Guests (Dropdown)',
        required=False,  # Make it optional since you have a text field
        choices=[(30,"30"),(50,"50"),(100,"100"),(150,"150")],  # You can adjust the range as needed
        widget=forms.Select(),
    )

    active_facilities = Facility.objects.filter(facilityActive=True)
    # Create the choice tuple from the active facilities
    facility_choices = [(facility.pk, facility.facilityName) for facility in active_facilities]
    facility_choices.insert(0,(None, 'No Thanks'))
    room_type = forms.ChoiceField(choices= facility_choices)

    class Meta:
        model = Reservation
        fields = [
            "room",
            "check_in_date",
            "check_out_date",
            "guest_name",
            "guest_email",
            "guest_phone",
            "num_guests",
            "room_type",
            "num_rooms",
            "check_in_time",
            "check_out_time",
            "reservation_time",
            "reservation_type",
        ]

        widgets = {
            "check_in_date": forms.TextInput(attrs={"readonly": "True"}),
            "check_out_date": forms.TextInput(attrs={"readonly": "True"}),
        }

        input_formats = {
            "check_in_time": ["%I:%M %p"],  # 07:00 AM
            "check_out_time": ["%I:%M %p"],  # 07:00 PM
        }

    # Add a room_type field to your form

    def __init__(self, *args, **kwargs):
        super(ReservationForm, self).__init__(*args, **kwargs)

        # You can customize the form fields here if needed

        # Make check-in and check-out fields read-only
        self.fields["check_in_date"].widget.attrs["readonly"] = True
        self.fields["check_out_date"].widget.attrs["readonly"] = True
        
        super().__init__(*args, **kwargs)
        # Set the 'required' attribute of the 'room' field to False
        self.fields["room"].required = False

    # def clean_discount_code(self):
    #     discount_code = self.cleaned_data.get('discount_code')
    #     if discount_code:
    #         # Perform AJAX request to validate the discount code
    #         url = reverse('validate_discount_code')
    #         response = requests.get(url, {'discount_code': discount_code})
    #         data = response.json()
    #         if not data.get('valid'):
    #             raise forms.ValidationError("Invalid discount code")
    #     return discount_code

    def clean_discount_code(self):
        discount_code = self.cleaned_data.get("discount_code")
        if discount_code:
            try:
                # Attempt to retrieve the discount object based on the code
                discount = Discount.objects.get(
                    discountCode=discount_code, discountActive=True
                )
            except Discount.DoesNotExist:
                # If the discount doesn't exist or is not active, raise a ValidationError
                raise forms.ValidationError("Invalid or inactive discount code.")
        return discount_code

    def clean_reservation_time(self):
        reservation_time = self.cleaned_data.get("reservation_time")
        if not reservation_time or reservation_time == "":
            raise forms.ValidationError("Please select a reservation time.")
        return reservation_time


    def clean_check_in_time(self):
        check_in_time = self.cleaned_data.get("check_in_time")
        print(f"check_in_time: {check_in_time}")
        # Rest of your validation code
        return check_in_time


    def clean_check_out_time(self):
        check_out_time = self.cleaned_data.get("check_out_time")
        print(f"check_out_time: {check_out_time}")
        # Rest of your validation code
        return check_out_time
