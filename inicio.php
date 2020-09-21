<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>
 

  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    canvas {
      position: absolute;
    }
  </style>
</head>
<body>
  <video id="video" width="720" height="560" autoplay muted></video>
 
  <div id="container">
    <p>el usuario es <?php echo $_SESSION['usuario'] ?></p>
    <form action="">
        <div id="question-container">
            <label for="" id="pregunta">1.- Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugiat
                debitis cum itaque
                sed odio harum dolores maxime officiis reprehenderit. Repellendus dolores cumque ipsum nesciunt ab
                incidunt non nulla? Eligendi!</label><br>
            <input type="radio">
            <label for="">Option 1</label><br>
            <input type="radio">
            <label for="">Option 2</label><br>
            <input type="radio">
            <label for="">Option 3</label><br>
        </div>
        <div id="question-container">
            <label for="" id="pregunta">2.- Lorem ipsum dolor sit amet consectetur adipisicing elit. Id placeat quia
                repellendus quisquam!
                Accusantium aut dolor quas unde molestiae! Accusantium ea dolore iusto nobis tempora eius! Iusto aut
                consequatur alias.</label><br>
            <input type="radio">
            <label for="">Option 1</label><br>
            <input type="radio">
            <label for="">Option 2</label><br>
            <input type="radio">
            <label for="">Option 3</label><br>
        </div>
        <div id="question-container">
            <label for="" id="pregunta">3.- Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem,
                exercitationem ullam ratione
                cumque expedita modi dolorem at sunt mollitia maiores amet excepturi similique reprehenderit
                quibusdam
                doloribus repellat illum fugiat quod.</label><br>
            <input type="radio">
            <label for="">Option 1</label><br>
            <input type="radio">
            <label for="">Option 2</label><br>
            <input type="radio">
            <label for="">Option 3</label><br>
        </div>
        <div id="question-container">
            <label for="" id="pregunta">4.- Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem,
                exercitationem ullam ratione
                cumque expedita modi dolorem at sunt mollitia maiores amet excepturi similique reprehenderit
                quibusdam
                doloribus repellat illum fugiat quod.
            </label>
            <br>
            <br>
            <textarea name="message" rows="10" cols="100">

        </textarea>
        </div>
        <br>
        <button type="button" onclick="alert('se enviaron tus respuestas')">Enviar respuestas</button>
    </form>
</div>

</body>
</html>