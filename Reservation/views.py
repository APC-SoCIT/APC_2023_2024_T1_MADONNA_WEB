from django.shortcuts import render, redirect, get_object_or_404
from datetime import datetime
from django.http import HttpResponse, HttpResponseRedirect
from django.contrib.auth.mixins import LoginRequiredMixin, PermissionRequiredMixin
from django.views.generic.edit import DeleteView
from django.contrib.auth.views import LoginView, LogoutView
from django.views.generic import FormView, CreateView, TemplateView,ListView, DetailView, UpdateView
from django.contrib.auth import login, authenticate
from Reservation.models import Reservations, Customer, Discount, Prices, Facility
from Reservation.forms import ReferenceChecker, ReservationChecker, ReservationForm, CustomerForm, PriceForm, DiscountForm, ReservationEditForm
from django.contrib.messages.views import SuccessMessageMixin
from Reservation.reservation_function.availability import check_availability
from django.contrib.auth.decorators import login_required
# Create your views here.
def test(request):
    return HttpResponse("this is a test")


""" class reserveView(FormView):
  model = Reservations
  form_class = ReservationChecker
  context_object_name = 'reserve'
  template_name='reservation.php'
  success_url='/test/form' """


def reserveView(request):
  obj = Prices.objects.all().values()
  form = ReservationChecker(None)
  form2 = ReferenceChecker(None)
  
  if request.method=='POST' and 'new' in request.POST:
    form = ReservationChecker(request.POST)
    if (form.is_valid()):
      print('valid')
      return redirect('reservation.new')
  if request.method=='POST' and 'check' in request.POST:
    form2 = ReferenceChecker(request.POST)
    if form2.is_valid():
      pk = form2.cleaned_data['reference']
      return redirect('reserve.receipt',referenceNum=pk)
  context={
    "form": form,
    "form_2":form2,
    "prices":obj,   
  }
  return render(request, 'reservation.php', context)




class newReserve(CreateView):
    model = Reservations
    form_class = ReservationForm
    form2 = CustomerForm
    success_url = "/reserve"
    template_name = "reservation_form_Customer.php"

    def get_context_data(self, **kwargs):
        context = super(newReserve, self).get_context_data(**kwargs)
        context["prices"] = Prices.objects.all().values()
        context["checkOut"] = Reservations.objects.values("checkOut")
        """ context['venue_list'] = Venue.objects.all()
    context['festival_list'] = Festival.objects.all()
    # And so on for more models """
        return context


def reserveNew(request):
  obj = Customer.objects.values()
  form = ReservationForm(request.POST or None)
  form2 = CustomerForm(request.POST or None)
  context={
    "form": form,
    "form_2":form2,
    "object":obj,   
    "prices":Prices.objects.all().values(),
    "discount":Discount.objects.all().values().filter(discountActive=True),
    "facility":Facility.objects.all().values().exclude(facilityCategory='Pool'),
  }

  if all([form.is_valid(), form2.is_valid()]):
    data = form.cleaned_data
    data2=Prices.objects.all().values()
  
    parent=form2.save(commit=False)
    child=form.save(commit=False)
    
    exist = False
    for x in obj:
      if form2.cleaned_data['firstname'].lower() == x['firstname'].lower() and form2.cleaned_data['lastname'].lower() == x['lastname'].lower() and form2.cleaned_data['email'].lower() == x['email'].lower():
        print(x['firstname'])
        form.cleaned_data['customer_id'] = x['id']
        print("exsist")
        exist=True

    print(exist)
    if exist==False:
        child.customer = parent
        form2.save()
    
        
    print(form.cleaned_data)
    pk = form.cleaned_data['referenceNum']
    form.save() 
    return redirect('reserve.receipt',referenceNum=pk)
  return render(request, 'reservation_form_Customer.php', context)

@login_required
def reserveEdit(request,pk):
  obj = Customer.objects.values()
  fields = get_object_or_404(Reservations, reservationID=pk)
  pk2 = Reservations.objects.all().values_list('customer').filter(reservationID=pk)
  fields2 = get_object_or_404(Customer, id=pk2[0][0])
  print(fields)
  form = ReservationEditForm(request.POST or None, user=pk, instance=fields)
  form2 = CustomerForm(request.POST or None, instance=fields2)
  context={
    "form": form,
    "form_2":form2,
    "object":obj,   
    "prices":Prices.objects.all().values(),
    "discount":Discount.objects.all().values().filter(discountActive=True),
    "facility":Facility.objects.all().values().exclude(facilityCategory='Pool'),
  }

  if all([form.is_valid(), form2.is_valid()]):
    data = form.cleaned_data
    data2=Prices.objects.all().values()
  
    parent=form2.save(commit=False)
    child=form.save(commit=False)
    
    exist = False
    for x in obj:
      if form2.cleaned_data['firstname'].lower() == x['firstname'].lower() and form2.cleaned_data['lastname'].lower() == x['lastname'].lower() and form2.cleaned_data['email'].lower() == x['email'].lower():
        print(x['firstname'])
        form.cleaned_data['customer_id'] = x['id']
        print("exsist")
        exist=True

    print(exist)
    if exist==False:
      child.customer = parent
      form2.save()
    print(form.cleaned_data)
    
    form.save() 
    return redirect('main')
  return render(request, 'reservation_edit_form.php', context)


class viewReservation(DetailView):
  model=Reservations
  context_object_name = 'reserve'
  template_name='reference.php'
  

  def get_object(self, queryset=None):
        return Reservations.objects.get(referenceNum=self.kwargs.get("referenceNum"))


class newCustomer(CreateView):
    model = Customer
    form_class = CustomerForm
    success_url = "../reservation/new"
    template_name = "customer_form_Customer.php"


class moreDetailView(DetailView):
    model = Reservations
    context_object_name = "reserve"
    template_name = "test_reserve.php"


""" class checkReceipt(FormView):

 """
class newReserveStaff(LoginRequiredMixin,CreateView):
  model = Reservations
  form_class = ReservationForm
  success_url = 'main'
  template_name = 'reservations_form.php'
  login_url = "login"



class updateReserve(LoginRequiredMixin, UpdateView):
    model = Reservations
    form_class = ReservationForm
    success_url = "/staff"
    template_name = "reserve_edit.php"


class addPrice(LoginRequiredMixin, CreateView):
    model = Prices
    form_class = PriceForm
    success_url = "/staff/"
    template_name = "prices_new.php"


class editPrice(LoginRequiredMixin, UpdateView):
    model = Prices
    form_class = PriceForm
    success_url = "/staff/"
    template_name = "prices_new.php"





class viewDiscount(LoginRequiredMixin, ListView):
  model=Discount
  context_object_name = 'discount'
  template_name='discount_view.php'

class newDiscount(LoginRequiredMixin, CreateView):
  model=Discount
  form_class=DiscountForm
  template_name='discount_new.php'
  success_url='/discount'

class editDiscount(LoginRequiredMixin, UpdateView):
  model=Discount
  form_class=DiscountForm
  template_name='discount_new.php'
  success_url='/discount'


class deleteReservation(LoginRequiredMixin,DeleteView):
  model= Reservations
  context_object_name = 'reserve'
  success_url = 'main'
  template_name = 'delete_reservation.php'
  login_url = "login"