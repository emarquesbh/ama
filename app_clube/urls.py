# app_clube/urls.py
from django.urls import path
from .views import listar_cursos, adicionar_curso, editar_curso, excluir_curso

urlpatterns = [
    path('cursos/', listar_cursos, name='listar_cursos'),
    path('cursos/adicionar/', adicionar_curso, name='adicionar_curso'),
    path('cursos/editar/<int:id>/', editar_curso, name='editar_curso'),
    path('cursos/excluir/<int:id>/', excluir_curso, name='excluir_curso'),
]
