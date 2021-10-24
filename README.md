# Arquitetura
Laravel Framework versão 8.65.0<br>
PHP versão 7.3.31<br>
Banco de dados MySQL

# Dados para acesso as rotas

## Cidade

* Listar
```
GET: /cidade/listar
Parâmetros: id, nome e grupo_id
```
*Obs: Caso seja efetuada a busca sem passar parâmetro, irá retornar todos as cidade cadastros.*
* Cadastrar
```
POST: /cidade/cadastrar
{
    "nome":"Cidade de teste",
    "grupo_id": 1
}
```

* Editar
```
PUT: /cidade/editar/{id}
{
    "nome":"Cidade de teste editar",
    "grupo_id": 1
}
```

* Excluir 
```
DELETE: /cidade/excluir/{id}
```
-----
## Rotas Grupo

* Listar 
```
GET: /grupo/listar
Parâmetros: id, nome
```
*Obs: Caso seja efetuada a busca sem passar parâmetro, irá retornar todos os grupos cadastros.*

* Cadastrar
```
POST: /grupo/cadastrar
{
    "nome":"Grupo de teste"
}
```

* Cadastrar Campanha do Grupo
```
POST: /grupo/cadastrar-campanha
{
    "grupo_id": "1",
    "campanha_id":"1"
}
```

* Editar
```
PUT: /grupo/editar/{id}
{
    "nome":"Grupo Alterado"    
}
```

* Excluir 
```
DELETE: /grupo/excluir/{id}
```

-------------

## Rotas Campanha

* Listar 
```
GET: /campanha/listar
Parâmetros: id, nome, flg_ativo
```

*Obs: Caso seja efetuada a busca sem passar parâmetro, irá retornar todos as campanhas cadastros.*

* Cadastrar
```
POST: /campanha/cadastrar
{ 
    "nome":"Campanha de Teste",
    "flg_ativo": "S"
}
```
*Obs: O parâmetro flg_ativo é opcional, caso não seja informado, o valor padrão é S.*

* Editar
```
PUT: /campanha/editar/{id}
{
    "nome":"Campanha de Teste",
    "flg_ativo": "N"    
}
```
* Excluir 
```
DELETE: /campanha/excluir/{id}
```
-------------
## Rotas Produto

* Listar 
```
GET: /produto/listar
Parâmetros: id, nome, valor, campanha_id, desconto_id
```

*Obs: Caso seja efetuada a busca sem passar parâmetro, irá retornar todos os produtos cadastros.*

* Cadastrar
```
POST: /produto/cadastrar
{
    "nome":"Produto 4",
    "valor": 3.49,
    "campanha_id": 1,
    "desconto_id": 1
}
```
*Obs: Os parâmetros campanha_id e desconto_id são opcionais.*
* Editar
```
PUT: /produto/editar/{id}
{
    "nome":"Produto Alterado",
    "valor": 3.49,
    "campanha_id": 1,
    "desconto_id": 1   
}
```
* Excluir 
```
DELETE: /produto/excluir/{id}
```
----------
## Rotas Desconto

* Listar 
```
GET: /desconto/listar
Parâmetros: id, nome e valor
```

*Obs: Caso seja efetuada a busca sem passar parâmetro, irá retornar todos os descontos cadastros.*
* Cadastrar
```
POST: /desconto/cadastrar
{       
    "nome": "Desconto 10%",
    "valor": 10
}
```
* Editar
```
PUT: /desconto/editar/{id}
{          
    "nome": "Desconto Alterado",
    "valor": 20
}
```
* Excluir 
```
DELETE: /desconto/excluir/{id}
```