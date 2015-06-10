<!DOCTYPE html>
<html>
<head>
    <title>Formulário do Linha de Código</title>
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery.js"></script>
    <link href="bs/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<form class="form-horizontal">
<fieldset>
 
<!-- Form Name -->
<legend>Formulário do Linha de Código</legend>
 
<!-- Text input-->
<div class="control-group">
  <label class="control-label">Nome</label>
  <div class="controls">
    <input id="nome" name="nome" type="text" placeholder="Insira seu nome" class="input-xlarge" required>
    <p class="help-block">* Campo Obrigatório</p>
  </div>
</div>
 
<!-- Multiple Radios -->
<div class="control-group">
  <label class="control-label">Sexo</label>
  <div class="controls">
    <label class="radio">
      <input type="radio" name="sexo" value="Masculino" checked="checked">
      Masculino
    </label>
    <label class="radio">
      <input type="radio" name="sexo" value="Feminino">
      Feminino
    </label>
  </div>
</div>
 
<!-- Select Basic -->
<div class="control-group">
  <label class="control-label">País</label>
  <div class="controls">
    <select id="pais" name="pais" class="input-xlarge">
      <option>Brasil</option>
      <option>EUA</option>
      <option>Espanha</option>
      <option>Itália</option>
    </select>
  </div>
</div>
 
<!-- File Button -->
<div class="control-group">
  <label class="control-label">Foto</label>
  <div class="controls">
    <input id="foto" name="foto" class="input-file" type="file">
  </div>
</div>
 
<!-- Button -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
  </div>
</div>
 
</fieldset>
</form>
 
</body>
</html>


