# Projeto de demonstração

## Aplicativo no Bling

Crie um aplicativo para teste [como esta página descreve](https://developer.bling.com.br/aplicativos#introdu%C3%A7%C3%A3o).

É obrigatório que você crie com a URL de redirecionamento como `http://localhost:8000/auth`.

Além disso, para fins de teste, conceda a permissão para listar produtos.

## Execução

Crie um arquivo `.env` copiando o `.env.example` existente:

```bash
cp .env.example .env
```

Inicie o servidor executando:

```bash
php artisan serve
```

Abra no navegador a URL `http://localhost:8000` e siga o que é apresentado.

### Passo a passo

1. Insira o _client ID_ e o _client secret_;
2. Conceda as permissões pedidas;
3. O _token_ de acesso aparecerá em seu navegador em formato JSON. Além disso,
   será feita uma listagem de seus produtos ilustrando o uso da biblioteca.
