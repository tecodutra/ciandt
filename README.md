# Ci&amp;T PHP

## Descrição

Os problemas abaixo têm a intenção de avaliar o conhecimento em alguns tópicos da estrutura de Linguagem PHP e também em lógica de programação.

## Objetivo

1. Criar código de exemplo para cada problema separadamente
2. Publicá-los em um repositório público e compartilhar o mesmo para ser avaliado pela nossa equipe

## Problemas

1. Mostra o nome do país e sua capital em uma lista ordenada pelo nome da capital.
2. Informa quando Joãozinho mordeu seu dedo. Ele morderá seu dedo 50% das vezes.
3. Mostra na tela a extensão de 3 arquivos enviados via upload em uma lista em ordem alfabética.
4. Formulário contendo os campos: Nome, Sobrenome, e-mail, telefone, login e senha quer salva as submissões dentro de um arquivo chamado registros.txt.
5. Parser que converte um arquivo XML em um arquivo CSV usando PHP.
6. Classe para criar um select Field para um user registration form. Após criar essa classe crie um webform simples e adicione esse campo criado.
7. API simples para manipular uma lista de usuários contendo os campos.

## Rest API para manipulação de usuários

API simples para manipular uma lista de usuários contendo os campos (Nome, Sobrenome, Email e Telefone.). Essa API contém as seguintes características:

- Utiliza Rest API
- Dados dos usuários são salvos em um arquivo de texto com conteúdo Json
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
