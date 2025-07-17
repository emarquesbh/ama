# admin/urls.py
from django.urls import path
from .views import backup_database, export_programacao

urlpatterns = [
    path('backup/', backup_database, name='backup_database'),
    path('export_programacao/', export_programacao, name='export_programacao'),
]
