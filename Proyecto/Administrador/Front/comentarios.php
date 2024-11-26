<?php
require "menu.php";

?>


<title>Comentarios</title>
<div class="container">
  <h2>Deja tu comentario</h2>
  <form action="correo.php" > 
    <div class="form-group">
      <label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="comment">Comentario:</label>
      <textarea id="comment" name="comment" rows="4" required></textarea>
    </div>
    <button type="submit">Enviar</button>
  </form>
</div>




<style>
body{

background-image: url('../background.png');
background-size: cover;

}
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
  border-radius: 10px;
  text-align: center;
}

h2 {
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
  width: 100%;
}

label {
  margin-bottom: 5px;
  font-size: 18px;
  font-weight: 600;
  text-align: left;
}

input, textarea {
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: #f2f2f2;
  font-size: 16px;
  width: 100%;
}

textarea {
  resize: none;
}

button[type="submit"] {
  background-color: #0099cc;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

button[type="submit"]:hover {
  background-color: #006699;
}

</style>