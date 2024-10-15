<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .menu-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .btn {
            margin: 10px;
            width: 250px;
        }
        .btn-custom-blue {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        .btn-custom-blue:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-custom-red {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
        .btn-custom-red:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container menu-container">
        <h1 class="mb-4 text-dark">Menu Principal</h1>
        
        <a href="index.php" class="btn btn-custom-blue btn-lg">
            <i class="fas fa-list-ul mr-2"></i>Lista de Medicamentos
        </a>
        
        <a href="venda.php" class="btn btn-secondary btn-lg">
            <i class="fas fa-shopping-cart mr-2"></i>Venda
        </a>
        
        <a href="loginUSER.php" class="btn btn-custom-red btn-lg">
            <i class="fas fa-sign-out-alt mr-2"></i>Sair
        </a>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>