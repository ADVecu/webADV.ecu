<?php

/* Como vimos en los formularios, la información se envía mediante métodos POST o GET.
En el caso de este ejemplo, se está utilizando el método POST (datos viajan de manera oculta).
La información que se envía es la correspondiente a las etiquetas input y textarea y para acceder a ella lo hacemos
a través del atributo name del input. 
PHP accede al valor de cada input enviado de la siguiente manera:
HTML: <input type="text" name="apellido">
PHP: $_POST['apellido'] (variable)
Si en el input con name apellido escribieron Miranda, del lado de PHP $_POST['apellido'] va a ser igual a miranda */
/*Entonces según el formulario que les dejé de ejemplo*/

    if(isset($_POST['enviar'])){//si el botón con el name enviar es pulsado
        if(!empty($_POST['nombre'])&& !empty($_POST['email'])&&!empty($_POST['msg'])){
        //si no están vacios los inputs name, email y msg 
        //guardo el contenido de cada campo en variables
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $telefono=$_POST['telefono'];
            $asunto="Asunto ....";//podes poner un input asunto para que lo decida el usuario o colocar vos uno genérico
            $msg="Nombre: ".$nombre."\n".$telefono."\n".$_POST['msg'];//el mensaje con el nombre agregado
            $header="From: ".$email."\r\n";//la persona que escribió me dejo su email, entonces el remitente es ese email
            $header.="Reply-To: noreply@example.com"."\r\n";//Le mando un no responder o noreply
            $header.="X-Mailer: PHP/".phpversion();
            $tuCasilla="daniel.gaviria.utp@gmail.com";//tenés que colocar tu casilla de email de consultas,es decir, la casilla en la cual vas a recibir las consultas que deja la gente en tu página
            $mail=mail($tuCasilla,$asunto,$msg,$header);//usamos la función especial de php para mandar mails
            if($mail){// si el email se mando respondo éxito con javascript
                echo "<script>
                        alert('Gracias por tu contacto! en breves nos estaremos comunicando');
                        window.location='contacto.html'
                        </script>";//redirecciono a contacto.html recuerden ustedes poner el nombre de la página a la cual deberia volver luego de enviar el form
                        
            }else{//si no se pudo enviar el email lo notifico
                echo "<script>
                        alert('Lamentamos decirle que no hemos podido enviar su consulta');
                        window.location='contacto.html' 
                        </script>";//redirecciono a contacto.html recuerden ustedes poner el nombre de la página a la cual deberia volver luego de enviar el form
            }
        }
        else{//si los parámetros están vacios, aunque podemos controlar esto con required
            echo "<script>
            alert('Error faltan parametros');
                    window.location='contacto.html'
                  </script>"; //redirecciono a contacto.html recuerden ustedes poner el nombre de la página a la cual deberia volver luego de enviar el form
        }
    }  
?>