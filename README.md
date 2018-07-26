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
<table> 
  <tbody>
      <tr> 
          <tr> 
            <th valign="top">URL</th>
            <td><code>/exercicio7.php</code></td> 
      </tr> 
      <tr> 
        <th valign="top">Método</th>
        <td><b><code>GET</code></td>
      </tr>
      <tr> 
        <th valign="top">Resposta de sucesso</th> 
        <td><b>Exemplo:</b> <br> <b>Código:</b> 200 <br> <b>Conteúdo:</b>
            <pre>[
 {
      "nome": "Teste",
      "sobrenome": "Primeiro",
      "email": "primeiro@gmail.com",
      "telefone": "(31)99999-9999"
  },
  {
      "nome": "Teste",
      "sobrenome": "Segundo",
      "email": "segundo@gmail.com",
      "telefone": "(31)88888-8888"
  },
  ...
]</pre>
        </td> 
      </tr>
      <tr> 
        <th valign="top"> Resposta de erro </th> 
        <td><code>[]</code></td>
      </tr> 
    </tbody>
  </table>

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
