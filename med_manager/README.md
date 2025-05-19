# Gestão de Medicamentos PI – Grupo 50

Sistema web simples em **PHP + MySQL** para controle de medicamentos, desenvolvido como parte do projeto integrador (PTI).  
Ele permite que cada usuário registre, acompanhe e gerencie prazos de validade de seus próprios medicamentos.


## Funcionalidades

- **Autenticação**: cadastro e login seguros.
- **Dashboard**: contadores de medicamentos totais e a vencer em 30 dias.
- **CRUD** completo de medicamentos (nome, lote, validade, quantidade).
- **Alertas visuais** para itens próximos do vencimento.
- 

## Instalação rápida

## IMPORTAÇÃO DO BANCO  
Abra o *phpMyAdmin* e execute `database.sql`.
ou
Importe diretamente na função Importar selecionando o arquivo de 'database.sql'.
## SUBA O PROJETO AO XAMPP  
Copie a pasta `med_manager` para `htdocs/` (ou `/var/www/html/`).
## ACESSE
Navegue até `http://localhost/med_manager/`  

## Estrutura de pastas

med_manager/

assets/
   css/          estilos customizados

includes/
   db.php        # conexão MySQL
   auth.php      # proteção de rotas
 
index.php         # login
register.php      # cadastro
dashboard.php     # painel principal
add_medicine.php  # criar medicamento
list_medicine.php # listar/gerenciar
edit_medicine.php # editar
delete_medicine.php

