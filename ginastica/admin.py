from django.contrib import admin
from .models import Ginastica

class GinasticaAdmin(admin.ModelAdmin):
    list_display = ('nome', 'duracao', 'data_criacao')
    search_fields = ('nome',)

admin.site.register(Ginastica, GinasticaAdmin)
