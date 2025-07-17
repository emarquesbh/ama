# admin/backup.py
import os
import subprocess
from django.shortcuts import redirect
from django.conf import settings
from django.http import JsonResponse
from .models import Programacao  # Importe os modelos necessários

def backup_database(request):
    if request.method == 'POST':
        # Define o caminho do backup
        backup_file = os.path.join(settings.BASE_DIR, 'backups', 'backup.sql')

        # Cria a pasta de backups se não existir
        os.makedirs(os.path.dirname(backup_file), exist_ok=True)

        # Comando para criar o backup do banco de dados (ajuste conforme o seu SGBD)
        command = [
            'mysqldump',
            '-u', 'root',         # Substitua pelo seu usuário do MySQL
            '-p', 'ama',          # Substitua pelo nome do seu banco de dados
            '--result-file={}'.format(backup_file)
        ]

        # Executa o comando
        subprocess.run(command)

        return JsonResponse({'message': 'Backup realizado com sucesso!'})
    return redirect('admin_dashboard')  # Redirecione para o painel administrativo

