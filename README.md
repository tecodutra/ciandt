# Ci&amp;T PHP

## Rest API para manipulação de usuários

API simples para manipular uma lista de usuários contendo os campos (Nome, Sobrenome, Email & Telefone.). Essa API contém os seguintes requisitos:

- Dados são salvos em um arquivo de texto
- Utiliza Rest API
- Endpoint para listar todos os usuarios
- Endpoint para deletar usuarios por email
- Endpoint para adicionar um usuario novo
- Endpoint para atualizar os dados do usuario.

### Listar todos os usuários

```
[GET] /exemplo7.php
```

### Deletar usuário por e-mail

```
[DELETE] /exemplo7.php?email=teste@teste.com`
```

### Adicionar novo usuário

```
[POST] /exemplo7.php`
```

### Atualziar dados do usuário

```
[PUT] `/exemplo7.php?email=teste@teste.com`
```
