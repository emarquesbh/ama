from django import forms
from .models import Ginastica, Imagem
from django import forms

class ContatoForm(forms.Form):
    str_nome = forms.CharField(label="Nome", required=True, max_length=100)
    str_telefone = forms.CharField(label="Telefone", required=False, max_length=20)
    str_email = forms.EmailField(label="Email", required=True)
    str_mensagem = forms.CharField(label="Mensagem", required=True, widget=forms.Textarea)


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