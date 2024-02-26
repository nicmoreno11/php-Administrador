<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="icon" href="imagenes/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="icon" href="../imagenes/logo.png">

</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap');
body {
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0;
    background-color: aliceblue; 
}

h1{
    padding-left: 700px;
}

.titulo{
    padding-left: 430px;
}

nav{
    margin-top: 0;
    left: 0;
    width: 100%;
    position: absolute;
    font-family: 'Nunito','sans-serif';
    z-index: 1;
    font-size: 18px;
    background-color: white;
    box-sizing: border-box;
}
.menu-principal{
    list-style: none;
    display: flex;
    justify-content: flex-end;
    margin-right: 94px;
}
.menu-principal>li>a{
    display: block;
    padding: 30px 15px;
    color: black;
    text-decoration: none;
    font-weight: bold;  
}
.menu-principal>li:hover{
    background-color: deepskyblue;
}
.submenu{
    position: absolute;
    display: none;
    list-style: none;
    width: 200px;
    background-color: rgba(0, 195, 255, 0.664);
}
.menu-principal li:hover .submenu{
    display: block;
}
.submenu li:hover{
    background-color: deepskyblue;
}
.submenu li a{
    display: block;
    color: black;
    text-decoration: none;
    padding: 15px 15px 15px 20px;
}
.contenido {
    padding: 20px;
}

.contenido p {
    color: #333; 
}

.contenido a{
    text-decoration: none;
    color: black;
}

.contenido2{
    padding-left: 55px;
}

.container{
    width: 100%;
    max-width: 1200px;
    height: 430px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: auto;
    padding: 65px;
}
.container .card{
    width: 330px;
    height: 430px;
    border-radius: 8px;
    box-shadow: 0 2px 2px rgba(6, 49, 85, 0.63);
    overflow: hidden;
    margin: 20px;
    text-align: center;
    transition: all 0.25s;
    background-color: #fff;
    cursor: pointer;
}
.container .card:hover{
    transform: translateY(-15px);
    box-shadow: 0 12px 16px rgba(1,1.5,1,0.2);
}
.container .card img{
    width: 130px;
    padding: 34px;
}
.container .card h4{
    font-weight: 600;
}
.container .card p{
    padding: 0 1rem;
    font-size: 16px;
    font-weight: 300;
}
.container .card a{
    font-weight: 500;
    text-decoration: none;
    color: #333;
}
input[type="button"]{
    width:123px;
    height: 45px;
    border-radius: 0.25spx;
    background-color: dodgerblue;
    cursor: pointer;
    border:none;
    color: #333;
    font-family: 'Nunito', sans-serif;
}

footer{
    position: relative;
    top: 370px;
    width: 100%;
    left: 0;
    font-family: 'Nunito';
    border-top: 1px solid #d7d7d7;
    background-color:rgb(245, 245, 245-);
    height: 220px;
    padding-left: 25px;
    padding: 25px;
}
footer section{
    display: table-cell;
    width: 300px;
    position: relative;
}
footer section a{
    color: black;
}

footer section i{
    font-size: 33px;
    padding-left: 20px;
}
.iconos{
    position: relative;
    top: 0px;
    left: 290px;
}
.terminos{
    text-align: center;
    margin-top: 12px;
}
.terminos p{
    position: relative;
    top: 23px;
    margin-bottom: 12px;
    
}
</style>
<body>
    <h1 class="tituloPrincipal">Bienvenido Administrador</h1>
        <nav class="menu">
            <ul class="menu-principal">
                <li><a href="Usuario/seleccionar.php">Usuarios</a></li>
                <li><a href="Reserva/seleccionar.php">Habitaciones</a> </li>
                <li><a href="Habitacion/seleccionar.php">Reservar</a></li>
                <li><a href="../perfil.php">Mi Perfil</a></li>
                <li><a href="../index.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    <div class="contenido">
        <p>Registrar nuevos usuarios, habitaciones y reservas en el sistema.</p><a href="https://www.sena.edu.co/es-co/sena/Paginas/quienesSomos.aspx">Nuestra pagina web</a>
    </div>
    <div class="container">
        <div class="card">
            <img src="../imagenes/usuarios.png" alt="">
            <h4>Usuarios</h4>
            <p>Aqui podras gestionar a todos los usuarios del sistema, empleados, clientes etc.</p>
            <a href="./Usuario/registrar.php"><input type="button" value="Registrar"></a>
        </div>
       
        <div class="card">
            <img src="../imagenes/calendario.png" alt="">
            <h4>Reservas</h4>
            <p>Aqui registraras las reservas del hotel puedes actualizarlas y eliminarlas</p>
            <a href="./Reserva/registrar.php"><input type="button" value="Registrar"></a>
        </div>

        <div class="card">
            <img src="../imagenes/habitaciones.png" alt="">
            <h4>Habitaciones</h4>
            <p>Podras registrar habitaciones nuevas, actualizarlas segun el estado y tambien su descripción</p>
            <a href="./Habitacion/registrar.php"><input type="button" value="Registrar"></a>
        </div>
          <!---<div class="card">
            <img src="../imagenes/habitaciones.png" alt="">
            <h4>Habitaciones</h4>
            <p>Podras registrar habitaciones nuevas, actualizarlas segun el estado y tambien su descripción</p>
            <a href="./Habitacion/registrar.php"><input type="button" value="Registrar"></a>
        </div>--->
        <!---<div class="card">
            <img src="../imagenes/habitaciones.png" alt="">
            <h4>Habitaciones</h4>
            <p>Podras registrar habitaciones nuevas, actualizarlas segun el estado y tambien su descripción</p>
            <a href="./Habitacion/registrar.php"><input type="button" value="Registrar"></a>
        </div>--->
    </div>
    <footer class="piepag">
         <section class="informacion">
            <h3>Ubicación</h3>
            <p>Soacha Cundinamarca
            <p>Calle 30</p></section>
        
        <section class="informacion2">
            <h3>Contacto</h3>
            <a href=""><p>32569785211</p></a>
            <a href=""><p>administrador@sena.edu.co</p></a>
        </section>
        
        <section class="iconos">
            <h3>Nuestras redes</h3>
            <a href="https://web.facebook.com/sena.soacha/?locale=es_LA&_rdc=1&_rdr"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fsenasoachacide"><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
        </section>
        <div class="terminos">
            <p>Terms & Conditions / Privacy & Cookie Statement</p>
            <p>© 2024 
            All Rights Reserved | Hotel Aurora Oasis | Powered by Cloudbeds</p>
        </div>
        </footer> 
</body>
</html