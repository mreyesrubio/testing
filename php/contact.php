<?php
      
      $errors = array();

      if (!isset($_POST['name'])) {
            $errors['name'] = 'Ingresa tu nombre!';
      }
      
      if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Ingresa un email válido!';
      }

      if (!isset($_POST['subject'])) {
            $errors['subject'] = 'Escribe el asunto del mensaje';
      }
      
      if (!isset($_POST['massage'])) {
            $errors['message'] = 'Escribe tu mensaje';
      }

      $errorOutput = '';

      if(!empty($errors)){

            $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
            $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

            $errorOutput  .= '<ul>';

            foreach ($errors as $key => $value) {
                  $errorOutput .= '<li>'.$value.'</li>';
            }

            $errorOutput .= '</ul>';
            $errorOutput .= '</div>';

            echo $errorOutput;
            die();
      }



      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['massage'];
      $from = $email;
      $to = 'ejemplo@ejemplo.com';//Cambiar mail por mail válido  
      
      $body = "From: $name\n E-Mail: $email\n Message:\n $message";


      $result = '';
      if (mail ($to, $subject, $body)) {
            $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
            $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $result .= 'Gracias por contáctarnos!';
            $result .= '</div>';

            echo $result;
            die();
      }

      $result = '';
      $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
      $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      $result .= 'Algo sucedió, por favor vuelve a intentarlo más tarde';
      $result .= '</div>';

      echo $result;
      