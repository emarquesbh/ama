from django.views.generic import CreateView, ListView, UpdateView, DeleteView
from django.urls import reverse_lazy
from .models import Ginastica

class GinasticaCreateView(CreateView):
    model = Ginastica
    fields = ['nome', 'descricao', 'duracao']
    template_name = 'ginastica_form.html'
    success_url = reverse_lazy('ginastica_list')

class GinasticaListView(ListView):
    model = Ginastica
    template_name = 'ginastica_list.html'

class GinasticaUpdateView(UpdateView):
    model = Ginastica
    fields = ['nome', 'descricao', 'duracao']
    template_name = 'ginastica_form.html'
    success_url = reverse_lazy('ginastica_list')

class GinasticaDeleteView(DeleteView):
    model = Ginastica
    template_name = 'ginastica_confirm_delete.html'
    success_url = reverse_lazy('ginastica_list')
