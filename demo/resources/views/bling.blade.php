<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <title>Demo Bling ERP API - PHP</title>
</head>

<body>
  <form action="http://localhost:8000" method="post">
    @csrf
    <div>
      <label for="client_id">Client ID</label><br />
      <input name="client_id" style="width: 500px" /><br />
    </div>
    <div>
      <label for="client_secret">Client Secret</label><br />
      <input name="client_secret" style="width: 500px" /><br /><br />
    </div>
    <button type="submit">Iniciar autenticação</button>
  </form>
</body>

</html>
