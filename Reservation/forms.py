from django import forms
from django.utils import timezone
from Reservation.models import Reservations, Customer, Facility, Prices, Discount
from Home.models import Gallery
from Reservation.reservation_function.availability import check_availability2 ,check_availability, check_availability3


class CustomCheckboxSelectMultiple(forms.CheckboxSelectMultiple):
    template_name = 'custom_checkbox_select.html'
    
class CustomerForm(forms.ModelForm):
    class Meta:
        model = Customer
        fields = {"firstname", "lastname", "contactNumber", "email"}
        widgets = {
            "firstname": forms.TextInput(attrs={"class": "form-control"}),
            "lastname": forms.TextInput(attrs={"class": "form-control"}),
            "contactNumber": forms.TextInput(attrs={"class": "form-control"}),
            "email": forms.EmailInput(attrs={"class": "form-control"}),
        }
        labels = {
            "firstname": "First Name",
            "lastname": "Last Name",
            "contactNumber": "Contact Number",
            "email": "Email",
        }


class ReservationForm(forms.ModelForm):
    model = Reservations
    discountAmount=forms.CharField(widget=forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'}))
    class Meta:
        model = Reservations
        discountAmount=forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'})
        fields = (
            "checkIn",
            "checkOut",
            "downpayment",
            "totalPayment",
            "balance",
            'prices',
            'facility',
            'discount',
            'timeIn',
            'timeOut',
            'referenceNum'
        )
        widgets = {
            'checkIn' : forms.DateInput(attrs={'class': 'form-control', 'type':'date'}),
            'checkOut' : forms.DateInput(attrs={'class': 'form-control', 'type':'date', 'readonly':'True'}),
            'totalPayment' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'}),
            'balance' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'}),
            'downpayment' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True',}),
            'facility' : CustomCheckboxSelectMultiple( attrs={'class' : 'form-control form-row d-flex justify-content-center align-items-center h-20  ', "onclick":"facilitiesFee("")","id":"id_facility"}),
            'discount' : forms.TextInput(attrs={'class' : 'form-control'}),
            'timeIn' : forms.TimeInput(attrs={'class': 'form-control', 'type':'time', 'readonly':'True'}),
            'timeOut' : forms.TimeInput(attrs={'class': 'form-control', 'type':'time', 'readonly':'True'}),
            'referenceNum' : forms.TextInput(attrs={'class' : 'form-control','type':'hidden'}, ),
        }

        labels = {
            "checkIn": "Check In Date",
            "checkOut": "Check Out Date",
            "totalPayment": "Total",
            "downpayment": "Downpayment Required",
            "balance": "Payment Balance",
            'facility': 'Additional Facilities'
        }

    def clean(self):
        cleaned_data=super().clean()
        prices=cleaned_data.get("prices")
        checkIn = cleaned_data.get("checkIn")
        checkOut = cleaned_data.get("checkOut")
        timeIn = cleaned_data.get("timeIn")
        timeOut = cleaned_data.get("timeOut")
        if checkIn < timezone.now().date():
            raise forms.ValidationError("Check in date cannot be in the past")
        if checkOut < timezone.now().date():
            raise forms.ValidationError("Check Out date cannot be in the past")
        if checkOut < checkIn:
            raise forms.ValidationError("Check Out date cannot be earlier than check in")
        check1 = ''
        checkID=0
        data2=Prices.objects.all().values()
        for price in data2:
            check1 = 'For '+price['dayTime'] +' Reservation with Maximum of '+str(price['maxPax'])+ ' Pax'
            if check1 == str(prices):
                checkID=price['id']
        prices_list = Prices.objects.filter(id = checkID).values_list('id')
        available_price=[]
        for price in prices_list:
            print(check_availability(price, checkIn,checkOut))
            if check_availability2(price, checkIn,checkOut,timeIn, timeOut):
                available_price.append(price)
        if len(available_price)>0:
            av_price = available_price[0] 
            print('Available')
        else:
            print('no room available')
            raise forms.ValidationError("Date not available") 
        print(prices) 
        return cleaned_data
    


class ReservationEditForm(forms.ModelForm):
    model = Reservations
    reservationChoices=(
    ('Approved','Approved'),
    ('Pending','Pending'),
    ('Cancelled','Cancelled'),
    )
    discountAmount=forms.CharField(widget=forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'}),initial=0)
    class Meta:
        reservationChoices=(
        ('Approved','Approved'),
        ('Pending','Pending'),
        ('Cancelled','Cancelled'),
        )
        model = Reservations
        discountAmount=forms.IntegerField(widget=forms.NumberInput(attrs={'class' : 'form-control', 'readonly':'True'},))
        fields = (
            "checkIn",
            "checkOut",
            "downpayment",
            "totalPayment",
            "balance",
            'prices',
            'facility',
            'discount',
            'timeIn',
            'timeOut',
            'referenceNum',
            'status'
        )
        widgets = {
            'checkIn' : forms.DateInput(attrs={'class': 'form-control', 'type':'date'}),
            'checkOut' : forms.DateInput(attrs={'class': 'form-control', 'type':'date', 'readonly':'True'}),
            'totalPayment' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'}),
            'balance' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'}),
            'downpayment' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True',}),
            'facility' : CustomCheckboxSelectMultiple( attrs={'class' : 'form-control form-row d-flex justify-content-center align-items-center h-20  '}),
            'discount' : forms.TextInput(attrs={'class' : 'form-control'}),
            'timeIn' : forms.TimeInput(attrs={'class': 'form-control', 'type':'time', 'readonly':'True'}),
            'timeOut' : forms.TimeInput(attrs={'class': 'form-control', 'type':'time', 'readonly':'True'}),
            'referenceNum' : forms.TextInput(attrs={'class' : 'form-control', 'readonly':'True'} ),
            'status': forms.RadioSelect(choices=reservationChoices,attrs={'class' : 'd-flex form-control justify-content-center align-items-center h-20  '})
        }

        labels = {
            "checkIn": "Check In Date",
            "checkOut": "Check Out Date",
            "totalPayment": "Total",
            "downpayment": "Downpayment Required",
            "balance": "Payment Balance",
            'facility': 'Additional Facilities',
            'discountAmount': 'Amount of Discount'
        }

    def __init__(self, *args, **kwargs):
      self.user = kwargs.pop('user')  # cache the user object you pass in
      super(ReservationEditForm, self).__init__(*args, **kwargs)  # and carry on to init the form

    def clean(self):
        cleaned_data=super().clean()
        prices=cleaned_data.get("prices")
        checkIn = cleaned_data.get("checkIn")
        checkOut = cleaned_data.get("checkOut")
        timeIn = cleaned_data.get("timeIn")
        timeOut = cleaned_data.get("timeOut")
        if checkOut < checkIn:
            raise forms.ValidationError("Check Out date cannot be earlier than check in")
        check1 = ''
        checkID=0
        data2=Prices.objects.all().values()
        for price in data2:
            check1 = 'For '+price['dayTime'] +' Reservation with Maximum of '+str(price['maxPax'])+ ' Pax'
            if check1 == str(prices):
                checkID=price['id']
        prices_list = Prices.objects.filter(id = checkID).values_list('id')
        available_price=[]
        for price in prices_list:
            print(check_availability(price, checkIn,checkOut))
            if check_availability3(price, checkIn,checkOut,timeIn,timeOut,self.user):
                available_price.append(price)
        if len(available_price)>0:
            av_price = available_price[0] 
            print('Available')
        else:
            print('no room available')
            raise forms.ValidationError("Date not available") 
        print(prices) 
        return cleaned_data
    




class FacilityForm(forms.ModelForm):
    model = Facility
    class Meta:
        model = Facility
        FacilityCategoriesChoices = (
            ('pool','Pool'),
            ('rooms','Rooms'),
            ('cottages','Cottages'),
            ('EH','Event Hall'),
     
  )
        fields = ( 'facilityName', 'facilityDescription', 'facilityPic', 'facilityPrice','facilityCategory', 'facilitymax')
        widgets = {
            'facilityName' : forms.TextInput(attrs={'class': 'form-control'}),
            'facilityDescription' : forms.Textarea(attrs={'class': 'form-control'}),
            
            'facilityPrice' : forms.NumberInput(attrs={'class': 'form-control'}),
            'facilitymax' : forms.NumberInput(attrs={'class': 'form-control'}),
            
            'facilityCategory': forms.RadioSelect(choices=FacilityCategoriesChoices),
        }
        labels = {
            'facilityName' : 'Facility Name',
            'facilityDescription' : 'Facility Description',
            'facilityPic' : 'Facility Pic',
            'facilityPrice' : 'Facility Price',
            'facilitymax' : 'Facility Maximum Occupancy',
            'facilityCategory' : 'Category'
            
        }

class PriceForm(forms.ModelForm):
    model = Prices
    class Meta:
        model = Prices
        dayTimeChoices = (
            ('day','Day'),
            ('night','Night'),
            ('whole','Whole Day')
        )

        maxPaxChoices = (
            (30, '30 pax'),
            (50, '50 pax'),
            (100, '100 pax'),
            (150, '150 pax')
        )
        fields = ('price', 'maxPax', 'dayTime')
        widgets = {

            'price' : forms.NumberInput(attrs={'class' : 'form-control'}),
            'maxPax': forms.RadioSelect(choices=maxPaxChoices, attrs={'class' : 'form-control'}),
            'dayTime': forms.RadioSelect(choices=dayTimeChoices, attrs={'class' : 'form-control'})
        }

        label = {
            'price': 'Price',
            'dayTime' : 'Schedule',
            'maxPax' : 'Maximum Guest'
        }


class DiscountForm(forms.ModelForm):
    model = Discount
    class Meta:
        activeChoice = (
            (True, 'True'),
            (False, 'False'),
        )
        model = Discount
        fields = ('discountCode', 'discountPrice', 'discountActive')
        widgets = {

            'discountCode' : forms.TextInput(attrs={'class' : 'form-control'}),
            'discountPrice': forms.NumberInput(attrs={'class' : 'form-control'}),
            'discountActive': forms.RadioSelect(choices=activeChoice,attrs={'class' : 'form-control'})
        }

        label = {
            'discountCode': 'Code',
            'discountPrice' : 'Discount Off',
            'discountActive' : 'Is discount Active?'
        }


class ReservationChecker(forms.Form):
    checkIn = forms.DateField(widget= forms.DateInput(attrs={'class': 'form-control', 'type':'date'}))
    prices=forms.ModelChoiceField(queryset=Prices.objects.all())
    checkOut     = forms.DateField(widget= forms.DateInput(attrs={'class': 'form-control', 'type':'date', 'readonly':'True'}))
    timeIn =  forms.TimeField(widget= forms.TimeInput(attrs={'class': 'form-control', 'type':'time', 'readonly':'True'}))
    timeOut = forms.TimeField(widget= forms.TimeInput(attrs={'class': 'form-control', 'type':'time', 'readonly':'True'}))
    def clean(self):
        cleaned_data=super().clean()
        prices=cleaned_data.get("prices")
        checkIn = cleaned_data.get("checkIn")
        checkOut = cleaned_data.get("checkOut")
        timeIn = cleaned_data.get("timeIn")
        timeOut = cleaned_data.get("timeOut")
        if checkIn < timezone.now().date():
            raise forms.ValidationError("Check in date cannot be in the past")
        if checkOut < timezone.now().date():
            raise forms.ValidationError("Check Out date cannot be in the past")
        if checkOut < checkIn:
            raise forms.ValidationError("Check Out date cannot be earlier than check in")
        check1 = ''
        checkID=0
        data2=Prices.objects.all().values()
        for price in data2:
            check1 = 'For '+price['dayTime'] +' Reservation with Maximum of '+str(price['maxPax'])+ ' Pax'
            if check1 == str(prices):
                checkID=price['id']
        prices_list = Prices.objects.filter(id = checkID).values_list('id')
        available_price=[]
        for price in prices_list:
            print('test'+ str(check_availability2(price, checkIn,checkOut,timeIn, timeOut)))
            if check_availability2(price, checkIn,checkOut,timeIn, timeOut):
                available_price.append(price)
        if len(available_price)>0:
            av_price = available_price[0] 
            print('Available')
        else:
            print('no room available')
            raise forms.ValidationError("Date not available") 
        print(prices) 
        return cleaned_data

class ReferenceChecker(forms.Form):
    reference = forms.CharField(widget=forms.TextInput(attrs={'class': 'form-control'}),initial="MGREP-############",label="Reference Number")

    def clean_reference(self):
        print('checking')
        data = self.cleaned_data['reference']
        referenceList = Reservations.objects.filter(referenceNum = data)
        if not referenceList:
            print('not found')
            raise forms.ValidationError("Reference Code Not Found")

        return data