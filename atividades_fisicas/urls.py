from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index_publica'),
    path('yoga/', views.yoga_publica, name='yoga_publica'),
    path('ginastica/', views.ginastica_publica, name='ginastica_publica'),
    path('dancasenior/', views.dancasenior_publica, name='dancasenior_publica'),
    path('posturaalongamento/', views.posturaalongamento_publica, name='posturaalongamento_publica'),
]
