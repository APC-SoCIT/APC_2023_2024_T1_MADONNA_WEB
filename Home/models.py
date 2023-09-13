from django.db import models

# Create your models here.


class Gallery(models.Model):
    galleryTitle = models.CharField(max_length=255)
    galleryPic = models.ImageField(upload_to='gallery')
    galleryTag = models.CharField(max_length=100)