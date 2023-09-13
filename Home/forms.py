from django import forms
from blog.models import Gallery

class GalleryForm(forms.ModelForm):
   
    class Meta:
        galleryChoices=(
        ('Facilities','Facilities'),
        ('Events','Events'),
        ('Promos','Promos'),
        ('Guests','Guests'),
        )
        model = Gallery
        fields = [
            'galleryTitle',
            'galleryPic',
            'galleryTag',
            
        ]
        widgets = {
            'galleryTitle' : forms.TextInput(attrs={'class' : 'form-control'}),
            'galleryTag': forms.RadioSelect(choices = galleryChoices)
        }

    def clean_field(self):
        data = self.cleaned_data["field"]

        
        return data
    



