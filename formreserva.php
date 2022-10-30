<html>
    <head>
        <title>reservas</title>
        <body>
            <form action="" method="post">
                <label for="elegir">hola <?php echo $Owner->getId();echo $Owner->getName() ;echo $Owner->getsurName()?> <br>
                elija los dias que necesita un keeper</label><br><br>
                
                <label for="" name="fechastart">date start</label>
                <input type="text" name="fechastart" id="fechastart"><br>
                <input type="date"><br><br>

                 <label for="" name="fechafinish">date finish</label>
                <input type="text" name="fechafinish" id="fechafinish"><br>
                <input type="date"><br><br>

                <input type="button" id="ingresarreserva">ingresar reserva</button>
                <button type="button" id="finish">finish</button>
                <button type="button" id="mostrarreserva">mostrar reserva</button>
                
            </form>
        </body>
</html>
