from django.shortcuts import render
from django.http import HttpResponse
from django.views.generic import TemplateView
from Reports.scripts.reports import month

# Create your views here.


class SalesReport(TemplateView):
    template_name = "reports.php"

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)

        graph_data, total_earnings, total_reservations = month()

        context["graph_data"] = graph_data
        context["total_earnings"] = total_earnings
        context["total_reservations"] = total_reservations

        return context
