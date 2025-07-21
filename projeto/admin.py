from django.contrib import admin

# Path: projeto/admin.py
# Registra no painel administrativo os modelos do app Projeto
# Cada atividade aparecerá como submenu separado no admin

from django.contrib import admin
from .models import (
    GinasticaCerebral, Danca, Pilates,
    GrupoConvivenciaTerapeutica, TaiChiChuan, PinturaEmTecido
)

admin.site.register(GinasticaCerebral)
admin.site.register(Danca)
admin.site.register(Pilates)
admin.site.register(GrupoConvivenciaTerapeutica)
admin.site.register(TaiChiChuan)
admin.site.register(PinturaEmTecido)
