<!DOCTYPE html>
<html>
<head>
    <title>Novo Contato - Netshow.me</title>
</head>

<body>
<h2>Seguem os dados preenchidos no formulário de contato</h2>
<br/>
    <p>Nome: {{ $data['name'] }}</p>
    <p>E-mail: {{ $data['email'] }}</p>
    <p>Telefone: {{ $data['phone'] }}</p>
    <p>Message: {{ $data['message'] }}</p>
    <p>Seu IP: {{ $data['visitor'] }}</p>
</body>
</html>