@echo off
echo -------------------------------------
echo 🔄  RESETANDO BANCO DE DADOS DJANGO
echo -------------------------------------

REM Ativar o ambiente virtual
call venv\Scripts\activate

REM Deletar banco de dados
echo 🗑️  Removendo db.sqlite3...
del db.sqlite3

REM Remover migrações de apps
echo 🗑️  Limpando migrações dos apps...

for %%A in (
    atividades_fisicas
    cultura_arte
    projeto
) do (
    if exist %%A\migrations (
        del /Q %%A\migrations\0*.py
        echo Limpou: %%A\migrations
    )
)

REM Recriar migrações
echo 🛠️  Criando novas migrações...
python manage.py makemigrations

REM Aplicar migrações
echo 🛠️  Aplicando migrações...
python manage.py migrate

REM Criar superusuário
echo 👤  Criando superusuário (caso necessário)
python manage.py createsuperuser

REM Rodar servidor
echo ▶️  Iniciando servidor local...
python manage.py runserver

pause
