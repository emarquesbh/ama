from django import forms
from .models import Ginastica, Imagem

class ImagemForm(forms.ModelForm):
    class Meta:
        model = Imagem
        fields = ['imagem', 'legenda']

class GinasticaForm(forms.ModelForm):
    class Meta:
        model = Ginastica
        fields = '__all__'
        widgets = {
            'data_inicio': forms.DateInput(attrs={'type': 'date'}),
            'data_fim': forms.DateInput(attrs={'type': 'date'}),
            'hora_inicio': forms.TimeInput(attrs={'type': 'time'}),
            'hora_fim': forms.TimeInput(attrs={'type': 'time'}),
            'descricao': forms.Textarea(attrs={'class': 'rich-editor'}),
        }