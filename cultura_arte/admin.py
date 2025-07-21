# Path: cultura_arte/admin.py
# Registro dos submodelos do app Cultura e Arte
# Cada um aparece como submenu separado no admin do Django
# Permite administração individual de Violão, Celular, Informática, Teclado e Bonecando

from django.contrib import admin
from .models import Violao, Celular, Informatica, Teclado, Bonecando

admin.site.register(Violao)
admin.site.register(Celular)
admin.site.register(Informatica)
admin.site.register(Teclado)
admin.site.register(Bonecando)

