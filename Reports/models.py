from django.db import models

# Create your models here.


class WeekReport(models.Model):
    week_report_id = models.BigAutoField(primary_key=True)
    report_date = models.DateField(auto_now_add=True)
    reservations = models.IntegerField()
    customers = models.IntegerField()
    earnings = models.IntegerField()


class MonthReport(models.Model):
    month_report_id = models.BigAutoField(primary_key=True)
    report_month = models.DateField(auto_now_add=True)
    total_reservations = models.IntegerField()
    total_customers = models.IntegerField()
    total_earnings = models.IntegerField()
