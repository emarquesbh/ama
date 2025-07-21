from django.shortcuts import render, get_object_or_404
from .models import Yoga, Ginastica, DancaSenior, PosturaAlongamento

def yoga_publica(request):
    atividade = get_object_or_404(Yoga)
    return render(request, 'atividades_fisicas/yoga.html', {'atividade': atividade})

def ginastica_publica(request):
    atividade = get_object_or_404(Ginastica)
    return render(request, 'atividades_fisicas/ginastica.html', {'atividade': atividade})

def dancasenior_publica(request):
    atividade = get_object_or_404(DancaSenior)
    return render(request, 'atividades_fisicas/dancasenior.html', {'atividade': atividade})

def posturaalongamento_publica(request):
    atividade = get_object_or_404(PosturaAlongamento)
    return render(request, 'atividades_fisicas/posturaalongamento.html', {'atividade': atividade})

def index(request):
    return render(request, 'atividades_fisicas/index.html')
