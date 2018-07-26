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

<table> 
  <tbody>
      <tr> 
          <th valign="top" align="left">URL</th>
          <td><code>/exercicio7.php</code></td> 
      </tr> 
      <tr> 
        <th valign="top" align="left">Método</th>
        <td><b><code>GET</code></td>
      </tr>
      <tr> 
        <th valign="top" align="left">Resposta de sucesso</th> 
        <td><b>Exemplo:</b> <br> <b>Status:</b> 200 <br> <b>Conteúdo:</b>
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
    </tbody>
  </table>

### Deletar usuário por e-mail

<table> 
  <tbody> 
      <tr> 
        <th valign="top" align="left">URL</th>
        <td><code>/exercicio7.php?email=:email</code></td> 
      </tr> 
      <tr> 
        <th valign="top" align="left">Método</th>
        <td><b><code>DELETE</code></td>
      </tr>
      <tr> 
        <th valign="top" align="left"> Parâmetros URL </th>
        <td> <b>Obrigatório:</b> <br> <code>email=[string]</code> <br> exemplo: email=teste@teste.com <br></td> 
      </tr>
      <tr> 
        <th valign="top" align="left">Resposta de sucesso</th> 
        <td><b>Exemplo:</b> <br> <b>Status:</b> 200 <br> <b>Conteúdo:</b>
            <pre>{
      "nome": "Teste",
      "sobrenome": "Terceiro",
      "email": "teste@teste.com",
      "telefone": "(31)77777-77777"
  }</pre>
        </td> 
      </tr>
      <tr> 
        <th valign="top" align="left">Resposta de erro</th> 
        <td><b>E-mail do usuário não informado</b><br>ou<br> <b>Não existe usuário com este e-mail</b></td>
      </tr>
    </tbody>
  </table>

### Adicionar novo usuário

<table> 
  <tbody> 
      <tr> 
        <th valign="top" align="left">URL</th>
        <td><code>/exercicio7.php</code></td> 
      </tr> 
      <tr> 
        <th valign="top" align="left">Método</th>
        <td><b><code>POST</code></td>
      </tr>
      <tr> 
        <th valign="top" align="left">Dados de parâmetro (Body)</th> 
        <td><b>Exemplo:</b>
          <pre>{
      "nome": "Teste",
      "sobrenome": "Quarto",
      "email": "quarto@gmail.com",
      "telefone": "(31)12345-6789"
}</pre> 
        </td> 
      </tr>
      <tr> 
        <th valign="top" align="left">Resposta de sucesso</th> 
        <td><b>Exemplo:</b> <br> <b>Status:</b> 200 <br> <b>Conteúdo:</b>
            <pre>{
      "nome": "Teste",
      "sobrenome": "Quarto",
      "email": "quarto@gmail.com",
      "telefone": "(31)12345-6789"
}</pre>
        </td> 
      </tr>
    </tbody>
  </table>
  
### Atualizar dados do usuário

<table> 
  <tbody> 
      <tr> 
        <th valign="top" align="left">URL</th>
        <td><code>/exercicio7.php?email=:email</code></td> 
      </tr> 
      <tr> 
        <th valign="top" align="left">Método</th>
        <td><b><code>PUT</code></td>
      </tr>
      <tr> 
        <th valign="top" align="left">Parâmetros URL</th>
        <td> <b>Obrigatório:</b> <br> <code>email=[string]</code> <br> exemplo: email=quarto@gmail.com <br></td> 
      </tr>
      <tr> 
        <th valign="top" align="left">Dados de parâmetro (Body)</th> 
        <td><b>Exemplo:</b>
          <pre>{
      "nome": "Teste",
      "sobrenome": "Quinto",
      "email": "quinto@gmail.com",
      "telefone": "(31)98765-4321"
}</pre> 
        </td> 
      </tr>
      <tr> 
        <th valign="top" align="left">Resposta de sucesso</th> 
        <td><b>Exemplo:</b> <br> <b>Status:</b> 200 <br> <b>Conteúdo:</b>
            <pre>{
      "nome": "Teste",
      "sobrenome": "Quinto",
      "email": "quinto@gmail.com",
      "telefone": "(31)98765-4321"
}</pre>
        </td> 
      </tr>
      <tr> 
        <th valign="top" align="left">Resposta de erro</th> 
        <td><b>E-mail do usuário não informado</b><br>ou<br> <b>Não existe usuário com este e-mail</b></td>
       </tr>
    </tbody>
  </table>
