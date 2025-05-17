<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="nginx.png" >
  <title>Systech Vigia</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/react@18.2.0/umd/react.development.js"></script>
  <script src="https://unpkg.com/react-dom@18.2.0/umd/react-dom.development.js"></script>
</head>
<body>
  <header>
    <navbar class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
      <div class="container">
        <button type="button" class="btn" onclick="switchSystech()">
          <img src="systechsa.png" height="100%" class="rounded float-start"/>
        </button>
        <button type="button" class="btn bg-success">
          <a href="/">Link local</a>
        </button>
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
      <tr class="trStyle" style="text-align: center;">
        <td align="center" colspan="5">
          <b>
            <div style="padding-top: 10px; padding-left: 10px;">
              <a target="_blank" href="http://localhost:8080/VIGIA_BANCA_STD9.19">Página</a>
            </div>
          </b>
        </td>
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
              <a target="_blank" href="https://systechsa.com/nuevo_sitio/Cliente/">Nuevo Sitio</a> 
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