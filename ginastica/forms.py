from django import forms
from .models import Ginastica

class GinasticaForm(forms.ModelForm):
    class Meta:
        model = Ginastica
        fields = ['nome', 'descricao', 'duracao']
