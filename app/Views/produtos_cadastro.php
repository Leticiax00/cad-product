<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvo com sucesso!</title>
</head>
<body>
    <h1>Produto salvo!</h1>
</body>

<style>
     body {
            color: white;
            background-color: rgb(2, 2, 49);
        }
        h1 {
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
            height: 80vh;
        }
</style>
</html>
<script>
    setTimeout(function() {
        window.location.href = '<?= site_url('/'); ?>'; // retorna a pagina principal e da um reload
      }, 2000 );
</script>