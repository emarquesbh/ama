from django.urls import path
from .views import GinasticaCreateView, GinasticaListView, GinasticaUpdateView, GinasticaDeleteView

urlpatterns = [
    path('ginastica/', GinasticaListView.as_view(), name='ginastica_list'),
    path('ginastica/add/', GinasticaCreateView.as_view(), name='ginastica_add'),
    path('ginastica/update/<int:pk>/', GinasticaUpdateView.as_view(), name='ginastica_update'),
    path('ginastica/delete/<int:pk>/', GinasticaDeleteView.as_view(), name='ginastica_delete'),
]
