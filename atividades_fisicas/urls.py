from . import views 
from django.urls import path
from .views import (
    index,
    yoga_view,
    ginastica_publica,
    posturaalongamento_publica,
    dancasenior_publica,
)

app_name = 'atividades_fisicas'

urlpatterns = [
    path('', index, name='index'),
    path('yoga/', yoga_view, name='yoga_public'),
    path('ginastica/', ginastica_publica, name='ginastica_public'),
    path('posturaalongamento/', posturaalongamento_publica, name='posturaalongamento_public'),
    path('dancasenior/', dancasenior_publica, name='dancasenior_public'),
    path("contato/", views.contato, name="contato"),
    
]
