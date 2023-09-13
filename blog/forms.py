from django import forms
from blog.models import Blog

class BlogForms(forms.ModelForm):

    class Meta:
        model = Blog
        fields = ('blog_title', 'blog_content','blog_pic', 'blog_status')
        widgets = {
            'blog_title': forms.TextInput(attrs={'class' : 'form-control'}),
            'blog_content':forms.Textarea(attrs={'class' : 'form-control'}),
            'blog_status':forms.CheckboxInput(attrs={'class' : 'form-control'}),
        }
        labels = {
            'blog_title':'Title',
            'blog_content':'Content',
            'blog_pic' : 'Upload Image',
            'blog_status': 'Post Blog?'
        }