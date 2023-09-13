from django.shortcuts import render
from django.core import serializers
from django.http import HttpResponse, HttpResponseRedirect
from django.urls import reverse
from django.template import loader
from django.views.generic import CreateView, TemplateView,ListView, DetailView, UpdateView
from django.views.generic.edit import DeleteView
from Reservation.models import Reservations, Facility
from blog.models import Blog, Gallery



#Blog Files

#Reservation Files

class GalleryView(ListView):
    model = Gallery
    context_object_name = 'gallery'
    template_name = "gallery.php"

class detailGallery (DetailView):
  model = Gallery
  context_object_name= 'gallery'
  template_name = 'gallery_detail.php'
class sampleView(ListView):
  model = Reservations
  context_object_name = "reserve"
  template_name='test.php'
  




#Home Page Views
class indexView(TemplateView):
  template_name='index.php'
  context_object_name = 'home'

  def get_context_data(self, **kwargs):
    context = super(indexView, self).get_context_data(**kwargs)
    context['blog'] = Blog.objects.values()
    context['pool1'] = Facility.objects.values_list('id','facilityPic','facilityName')

    """ context['venue_list'] = Venue.objects.all()
    context['festival_list'] = Festival.objects.all()
    # And so on for more models """
    return context



class aboutView(TemplateView):
  template_name='about.php'


class addView(TemplateView):
  template_name = "add.php"

class facilitiesView(ListView):
  model = Facility
  template_name = 'facilities.php'
  context_object_name = 'facility'


def reservations(request):
  reserve = Reservations.objects.all().order_by('reservationID')
  template = loader.get_template('reservation.php')
  reserve_html = []
  for instance in Reservations.objects.all():  # it's not serialization, but extracting of the useful fields
      reserve_html.append({'pk': instance.reservationID, 'fname': instance.firstname, 'lname': instance.lastname, 
      'date': instance.date, 'dp': instance.downpayment, 'total': instance.totalPayment, 'bal': instance.balance
      , 'stat': instance.status})
  reserve_dic = {'reserve': reserve, 'ac_tab_n': 'ac_tab', 'reserve_html': reserve_html}
  return render(request, 'reservation.php', reserve_dic)


def addrecord(request):
  fname = request.POST['first']
  lname = request.POST['last']
  date = request.POST['date']   
  dp = request.POST['dp']
  tp = request.POST['tp']
  bal = request.POST['bal']
  stat=request.POST['status']
  newRec = Reservations(firstname=fname, lastname=lname, date=date, downpayment=dp, totalPayment=tp, balance=bal, status=stat )
  newRec.save()
  return HttpResponseRedirect(reverse('sample'))
# Create your views here.


