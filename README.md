# Gestão de Medicamentos PI – Grupo 50

Sistema web simples em **PHP + MySQL** para controle de medicamentos, desenvolvido como parte do projeto integrador (PTI).  
Ele permite que cada usuário registre, acompanhe e gerencie prazos de validade de seus próprios medicamentos.

### Veja um vídeo da utilização do site!


https://github.com/user-attachments/assets/9f414fb1-8164-409f-a194-bf3236b25428


## Funcionalidades

- **Autenticação**: cadastro e login seguros.
- **Dashboard**: contadores de medicamentos totais e a vencer em 30 dias.
- **CRUD** completo de medicamentos (nome, lote, validade, quantidade).
- **Alertas visuais** para itens próximos do vencimento.


## Instalação rápida

## IMPORTAÇÃO DO BANCO  
Abra o *[phpMyAdmin](http://localhost/phpmyadmin/)* e execute `database.sql`.
ou
Importe diretamente na função Importar selecionando o arquivo de 'database.sql'.
Caso você tenha mudado a porta do seu Apache para inicia-lo como eu, você terá que adicionar a porta selecionada para a mudança Ex: 'localhost:8080/phpmyadmin/'.
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

### Integrantes

Jean Vitor Batista Felix;

Hugo de Araújo Gomes;

Raphael Moraes Mender;

Nathan Barros de Assis;

Camila do Nascimento Feitosa;

Felipe Americo de Oliveira;

Felipe Americo de Oliveira;

### Prints Projetos

![image](https://github.com/user-attachments/assets/455cea91-07b8-46d8-a50f-a4c71825e387)

DASHBOARD
![image](https://github.com/user-attachments/assets/404810e1-3f1e-4d80-8d4c-aaa11fa19345)

ADD_MEDICINE
![image](https://github.com/user-attachments/assets/597cb573-8cfe-48bd-9c56-c1a06f59c069)

LIST_MEDICINE
![image](https://github.com/user-attachments/assets/52458335-100c-4df3-8151-670077a868a6)
