<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico" >
  <title>Systech Vigia</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/react@18.2.0/umd/react.development.js"></script>
  <script src="https://unpkg.com/react-dom@18.2.0/umd/react-dom.development.js"></script>
</head>
<script>
  function switchSystech() {
    window.location.href = "https://systechsa.com/";
  }
  function openLocal() {
    var version = document.getElementById("version").value;
    var modulo = document.getElementById("modulo").value;
    var standalone = document.getElementById("standalone").checked;

    if (version && modulo && standalone !== "" ) {
      var raiz = "http://localhost:8080/VIGIA_";
      var url = raiz + modulo  + "_" 
      if (standalone) {
        url += "STD";
      }
      url +=  version + "/";
      window.open(url, "_blank");
    } else {
      alert("Por favor, complete todos los campos.");
    }
  }
</script>
<body>
  <header class="header">
    <navbar class="navbar navbar-expand-lg" data-bs-theme="dark">
      <div class="container">
        <button type="button" class="btn" onclick="switchSystech()">
          <img src="logo.png" height="100%" class="rounded float-start"/>
        </button>
        <div type="button" class="systech btn bg-success" >
          <a target="_blank" href="https://systechsa.com/">Systech SA</a>
        </div>
      </div>
    </navbar>
  </header>
  <table class="table" >
    <thead>
      <tr colspan="5"></tr>
    </thead>
    <tbody >
      <tr class="trStyle">
        <td colspan="5">
          <h2><p style="text-align: center; color: red;">Local</p></h2>
        </td>
      </tr>
      <tr style="text-align: center;">
        <td align="center" colspan="2">
          <b>
            <div style="padding-top: 10px; padding-left: 10px;">
              <a target="_blank" href="http://localhost:8080/manager/html">Control</a>
            </div>
          </b>
        </td>
        <td align="center" >
        </td>
        <td align="center" colspan="2">
          <b>
            <div style="padding-top: 10px; padding-left: 10px;">
              <a target="_blank" href="http://localhost:9090/swagger-ui/index.html">Pagina Swagger</a>
            </div>
          </b>
        </td>
      </tr>
      <tr style="text-align: center;">
        <td></td>
        <td colspan="3">
          <p>Seleccion para generar la url completa</p>
          <div style="width: 80px; display: inline-block; margin-right: 20px;">
            <p>Version</p>
            <input type="number" id="version" placeholder="Version" step="0.1" min="9.0" max="10"/>
          </div>
          <div style="width: 250px; display: inline-block; margin-right: 20px;">
            <p>Modulo</p>
            <select id="modulo" placeholder="Modulo">
              <option value="" disabled selected>Elegir el modulo</option>
              <option value="BANCA_STD">BANCA</option>
              <option value="BANCA_GALICIA">BANCA GALICIA</option>
              <option value="BANCO_BCH">BANCA CENTRAL</option>
              <option value="BOLSA_STD">BOLSA</option>
              <option value="FIDEICOMISOS_STD">FIDEICOMISOS</option>
              <option value="LISTAS_LISTAS">LISTAS PORTUGUES (MUFG)</option>
              <option value="SEGUROS_STD">SEGUROS</option>
              <option value="BANCA_STD">STANDALONE</option>
              <option value="TABLERO_STD">TABLERO</option>
              <option value="TARJETAS_STD">TARJETAS</option>
              <option value="TARJETAS_NARANJA">TARJETAS NARANJA</option>
            </select>
          </div>
          <div style="width: 150px; display: inline-block; margin-right: 20px;">
            <p>Standalone</p>
            <select id="standalone" >
              <option value="" disabled selected>Es Standalone o no</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
          <button type="button" class="btn btn-success" onclick="openLocal()">Abrir</button>
        </td>
        <td></td>
      </tr>
      <tr id="frontend">
        <td colspan="5" align="center">
          <h2>
            <p style="color: red;text-align: center;">Pagina interna</p>
          </h2>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <b>
            <div style="padding-top: 10px; padding-left: 10px;">
              <a target="_blank" href="https://systechsa.com/nuevo_sitio/cliente/">Nuevo Sitio</a> 
            </div>
          </b>
        </td>
        <td colspan="2" align="center">
          <b style="text-align: center;">Frontend DESA</b>
          <b>
            <div style="padding-top: 10px; padding-left: 10px;">
              <a target="_blank" href="https://desa-gestiondedeuda.claro.amx/">
                Frontend Unico
              </a> 
            </div>
          </b>
        </td>
        <td colspan="1" align="center">
          <b style="text-align: center;">Frontend TEST</b>
          <b>
            <div style="padding-top: 10px; padding-left: 10px;">
              <a target="_blank" href="https://test-gestiondedeuda.claro.amx/">
                Frontend Unico
              </a> 
            </div>
          </b>
        </td>
      </tr>
   </tbody>
  </table>
  <footer style="text-align: center;">
    Creado por un chanta. v2.0.0
  </footer>
</body>
</html>