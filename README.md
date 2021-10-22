# Dados para acesso as rotas

## Cidade

* Listar
```
GET: /cidade/listar

Parametros: id, nome e grupo_id
```

Obs: Caso seja efetuada a busca sem passar parametro, irá retornar todos os registros de cidade cadastros.

* Cadastrar
```
POST: /cidade/cadastrar
{
    "nome":"Cidade de teste",
    "id_grupos": 1
}
```

* Editar
```
PUT: /cidade/editar/{id}
{
    "nome":"Cidade de teste editar",
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

Parametros: id, nome
```
Obs: Caso seja efetuada a busca sem passar parametro, irá retornar todos os registros de grupos cadastros.

* Cadastrar
```
POST: /grupo/cadastrar
{
    "nome":"Grupo de teste"
}
```

* Editar
```
POST: /grupo/editar/{id}
{
    "nome":"Cidade de teste"    
}
```

-------------

## Rotas Campanha

* Listar 
```
GET: /campanha/listar

Parametros: id, nome, flg_ativo
```

Obs: Caso seja efetuada a busca sem passar parametro, irá retornar todos os registros de campanhas cadastros.



