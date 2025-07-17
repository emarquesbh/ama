from django.contrib import admin
from django.urls import path, include

# --- INÍCIO DA PERSONALIZAÇÃO ---
# Defina os novos títulos aqui
admin.site.site_header = 'Administração do Club da Amizade'
admin.site.site_title = 'Portal Administrativo Club da Amizade'
admin.site.index_title = 'Bem-vindo ao portal do Club da Amizade'
# --- FIM DA PERSONALIZAÇÃO ---

urlpatterns = [
    path('admin/', admin.site.urls),
    # ... outras rotas do seu projeto
    # path('', include('ama.urls')),
]