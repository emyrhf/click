# Guia de Deployment no Vercel - Click!

## Alterações Realizadas

Seu projeto foi transformado para funcionar no Vercel com as seguintes mudanças:

### 1. **Configuração de Variáveis de Ambiente**
- O arquivo `.env.example` foi criado como referência
- As credenciais do banco de dados foram movidas para variáveis de ambiente
- Use `.env` local para desenvolvimento (NÃO será enviado ao git)

### 2. **Estrutura de Rotas (vercel.json)**
- Routes foram ajustadas para mapear corretamente:
  - `/` → `/api/visao/index.php` (página inicial)
  - `/visao/*` → `/api/visao/*.php` (páginas de visão)
  - `/processadores/*` → `/api/processadores/*.php` (processadores)
  - `/public/*` → arquivos estáticos (CSS, JS, imagens)

### 3. **Caminhos de Arquivo**
- Removidos todos os usos de `$_SERVER['DOCUMENT_ROOT']`
- Substituídos por constantes definidas em `config.php`:
  - `ROOT_PATH`, `COMPONENTS_PATH`, `MODELS_PATH`, `PROCESSORS_PATH`, `VIEWS_PATH`

### 4. **Referências de Recursos**
- Todos os `href` e `src` agora usam `BASE_URL`
- Caminhos de imagens ajustados para `/public/imgs/`
- CSS e JS agora apontam para `<?= BASE_URL ?>/public/...`

### 5. **Segurança**
- Criado `.gitignore` para não enviar `.env` ao repositório
- Criado `.vercelignore` para ignorar arquivos desnecessários

---

## Como Fazer Deploy

### Pré-requisitos
- Conta no [Vercel](https://vercel.com)
- Repositório no GitHub com o código atualizado

### Passo 1: Preparar o Repositório

1. Se ainda não usou git:
```bash
git init
git add .
git commit -m "Preparação para Vercel"
git branch -M main
git remote add origin https://github.com/seu-usuario/click.git
git push -u origin main
```

2. Se já tem repositório, apenas faça push das mudanças:
```bash
git add .
git commit -m "Transformação para Vercel"
git push
```

### Passo 2: Configurar Variáveis de Ambiente no Vercel

1. Acesse [Vercel Dashboard](https://vercel.com/dashboard)
2. Clique em "New Project"
3. Selecione seu repositório do GitHub (click)
4. Configure as variáveis de ambiente:

Na seção "Environment Variables", adicione:
```
DB_HOST = mysql-emyrhf.alwaysdata.net
DB_USER = emyrhf
DB_PASSWORD = sua_senha_aqui
DB_NAME = emyrhf_click_db
```

**Importante:** Nunca compartilhe a senha. Use variáveis de ambiente securas.

### Passo 3: Deploy

1. Clique em "Deploy"
2. Aguarde o processo completar
3. Você receberá uma URL como: `https://seu-projeto.vercel.app`

### Passo 4: Testar

1. Acesse: `https://seu-projeto.vercel.app`
2. Teste as funcionalidades:
   - Página inicial
   - Cadastro
   - Login
   - Envio de imagens
   - Perfil

---

## Estrutura de Diretórios

```
click/
├── api/
│   ├── config.php              # Configurações (BASE_URL, paths)
│   ├── conexao.php             # Conexão com BD
│   ├── components/
│   │   ├── Header.php
│   │   └── imgPerfil.php
│   ├── modelo/
│   │   ├── post.php
│   │   └── usuario.php
│   ├── processadores/
│   │   ├── processar-cadastro.php
│   │   ├── processar-login.php
│   │   ├── processar-enviar-imagem.php
│   │   ├── processar-editar-perfil.php
│   │   ├── processar-apagar-post.php
│   │   └── processar-loggout.php
│   └── visao/
│       ├── index.php
│       ├── login.php
│       ├── cadastro.php
│       ├── adicionar.php
│       ├── publicacao.php
│       ├── perfil.php
│       └── edicao.php
├── public/
│   ├── css/
│   │   ├── style.css
│   │   ├── reset.css
│   │   ├── header.css
│   │   └── edicao.css
│   ├── js/
│   │   └── script.js
│   └── imgs/               # Imagens enviadas pelos usuários
├── vercel.json            # Configuração do Vercel
├── .env.example           # Exemplo de variáveis de ambiente
├── .gitignore             # Arquivos a ignorar no git
└── README.md
```

---

## Diferenças Local vs Vercel

| Aspecto | Local | Vercel |
|--------|-------|--------|
| BASE_URL | `http://localhost/click` | `https://seu-projeto.vercel.app` |
| Banco de Dados | Pode usar localhost | Usa servidor remoto (alwaysdata) |
| Variáveis de Ambiente | `.env` local | Configuradas no dashboard |
| Rotas | `/click/api/visao/...` | `/visao/...` |

---

## Resolução de Problemas

### ❌ Erro 404 ao acessar a página

**Solução:** Verifique se o `vercel.json` está correto e se as rotas foram ajustadas.

### ❌ Erro de conexão ao banco de dados

**Solução:** 
- Confirme as credenciais no `.env` do Vercel
- Verifique se o servidor MySQL (alwaysdata) está funcionando
- Teste a conexão localmente antes

### ❌ Imagens não aparecem

**Solução:** 
- Confirme que as imagens estão em `/public/imgs/`
- Verifique se `BASE_URL` está correto
- Limpe o cache do navegador (Ctrl+Shift+Del)

### ❌ Links quebrados após deploy

**Solução:** 
- Verifique se todos os `href` usam `<?= BASE_URL ?>`
- Confirme que `/api/` foi removido dos caminhos internos

---

## Próximas Melhorias (Opcional)

1. **HTTPS**: Vercel fornece HTTPS automaticamente ✅
2. **CDN**: Vercel usa CDN global automaticamente ✅
3. **Compressão**: Ativada por padrão ✅
4. **Cache**: Configure cache headers em `vercel.json`
5. **Banco de Dados Serverless**: Considere migrar para um banco serverless (Neon, PlanetScale)
6. **Upload de Arquivos**: Use serviço como AWS S3 ou Cloudinary em vez de armazenar localmente

---

## Contato & Suporte

Para dúvidas sobre o deployment:
- Documentação Vercel: https://vercel.com/docs
- Documentação PHP no Vercel: https://vercel.com/docs/serverless-functions/openapi/runtimes/php

Boa sorte com seu projeto! 🚀
