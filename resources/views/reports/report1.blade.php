<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Reporte de Clientes</title>      
    <style>         
    table {             
        width: 100%;             
        font-size: 18px;              
        border:1px solid black;             
        border-collapse: collapse;              
        }         
        th {             
            background-color: burlywood;             
            border:1px solid black;  
        }         
        td {             
            border:1px solid black;          
        }  
    </style>  
</head>  
<body>  
    <h1 align="center">Listado de clientes</h1>  
    <hr><br>     
<table>  
        <tr>  
            <th>Código</th>  
            <th>Nombre</th>  
            <th>Email</th>  
            <th>Telefono</th>  
        </tr>     
        @foreach ($data as $item)  
        <tr>  
            <td style="background-color: bisque">{{$item['codigo']}}</td>              
            <td>{{$item['nombre']}}</td>  
            <td>${{$item['email']}}</td>  
            <td>{{$item['telefono']}}</td>  
        </tr>     
        @endforeach   
    </table>   
</body>  
</html>  
