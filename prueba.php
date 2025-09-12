<?php
// generar_link_con_combos.php
// Archivo PHP que muestra varios combos (select) y genera un link hacia una URL
// Guarda este archivo en tu servidor local (ej: htdocs en XAMPP) y �brelo en el navegador.

// Helper para sanear valores recibidos por GET
function s($key, $default = '') {
    return isset($_GET[$key]) ? htmlspecialchars($_GET[$key], ENT_QUOTES, 'UTF-8') : $default;
}

// Valores por defecto / opciones (pod�s modificarlas)
$countries = ['' => '-- seleccionar pa�s --', 'ar' => 'Argentina', 'uy' => 'Uruguay', 'cl' => 'Chile', 'br' => 'Brasil'];
$categories = ['' => '-- seleccionar categor�a --', 'tech' => 'Tecnolog�a', 'home' => 'Hogar', 'food' => 'Alimentos', 'books' => 'Libros'];
$colors = ['' => '-- seleccionar color --', 'red' => 'Rojo', 'blue' => 'Azul', 'green' => 'Verde', 'black' => 'Negro'];
$sizes = ['' => '-- seleccionar tama�o --', 's' => 'S', 'm' => 'M', 'l' => 'L', 'xl' => 'XL'];

// Base URL donde queremos generar el link (puedes cambiarla)
$base_url = s('base_url', 'https://example.com/buscar');

// Leer valores seleccionados para que se muestren al recargar
$sel_country = s('country');
$sel_category = s('category');
$sel_color = s('color');
$sel_size = s('size');
$extra_query = s('extra');

// Generar query string seguro
function build_query($params) {
    $filtered = array_filter($params, function($v) { return $v !== null && $v !== ''; });
    return http_build_query($filtered);
}

$params = [
    'country' => $sel_country,
    'category' => $sel_category,
    'color' => $sel_color,
    'size' => $sel_size,
];
if ($extra_query !== '') $params['q'] = $extra_query;

$generated_link = $base_url;
$query_string = build_query($params);
if ($query_string !== '') $generated_link .= '?' . $query_string;

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Generador de link con combos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    label { display:block; margin-top:10px; }
    select, input[type=text] { padding:6px; width:300px; max-width:100%; }
    .controls { margin-top:12px; }
    .result { margin-top:16px; padding:10px; background:#f4f4f4; border-radius:6px; }
    button { padding:8px 12px; margin-right:8px; }
    .small { font-size:0.9em; color:#555 }
  </style>
</head>
<body>
  <h2>Generador de link con combos</h2>
  <p class="small">Seleccione valores en los combos y el link se generará automáticamente. Podés cambiar la base URL si querés que apunte a otro dominio.</p>

  <form id="form" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Base URL:
      <input type="text" name="base_url" id="base_url" value="<?php echo $base_url; ?>" placeholder="https://example.com/buscar">
    </label>

    <label>País:
      <select name="country" id="country">
        <?php foreach($countries as $val => $label): ?>
          <option value="<?php echo $val ?>" <?php echo $val === $sel_country ? 'selected' : '' ?>><?php echo $label ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>Categor�a:
      <select name="category" id="category">
        <?php foreach($categories as $val => $label): ?>
          <option value="<?php echo $val ?>" <?php echo $val === $sel_category ? 'selected' : '' ?>><?php echo $label ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>Color:
      <select name="color" id="color">
        <?php foreach($colors as $val => $label): ?>
          <option value="<?php echo $val ?>" <?php echo $val === $sel_color ? 'selected' : '' ?>><?php echo $label ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>Tama�o:
      <select name="size" id="size">
        <?php foreach($sizes as $val => $label): ?>
          <option value="<?php echo $val ?>" <?php echo $val === $sel_size ? 'selected' : '' ?>><?php echo $label ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>Texto adicional (q):
      <input type="text" name="extra" id="extra" value="<?php echo $extra_query; ?>" placeholder="palabra clave">
    </label>

    <div class="controls">
      <button type="button" id="btnGenerate">Generar link</button>
      <button type="submit">Guardar (recargar con par�metros)</button>
      <button type="button" id="btnReset">Reset</button>
    </div>
  </form>

  <div class="result">
    <strong>Link generado:</strong>
    <div style="margin-top:8px; word-break:break-all">
      <a href="<?php echo $generated_link ?>" id="generatedLink" target="_blank"><?php echo $generated_link ?></a>
    </div>

    <div style="margin-top:10px;">
      <button id="btnCopy">Copiar al portapapeles</button>
      <button id="btnOpen" onclick="openLink(event)">Abrir en nueva pesta�a</button>
    </div>
  </div>

  <script>
    // JS para generar el link en el cliente sin recargar
    function buildClientLink() {
      const base = document.getElementById('base_url').value.trim() || '';
      const params = new URLSearchParams();
      const country = document.getElementById('country').value;
      const category = document.getElementById('category').value;
      const color = document.getElementById('color').value;
      const size = document.getElementById('size').value;
      const extra = document.getElementById('extra').value.trim();

      if (country) params.set('country', country);
      if (category) params.set('category', category);
      if (color) params.set('color', color);
      if (size) params.set('size', size);
      if (extra) params.set('q', extra);

      let url = base || '';
      // Si la base no tiene esquema, asumir http(s) opcionalmente ? aqu� dejamos tal cual
      const qs = params.toString();
      if (qs) {
        url += (url.includes('?') ? '&' : '?') + qs;
      }
      return url;
    }

    document.getElementById('btnGenerate').addEventListener('click', function(){
      const url = buildClientLink();
      const a = document.getElementById('generatedLink');
      a.href = url;
      a.textContent = url;
    });

    document.getElementById('btnCopy').addEventListener('click', async function(){
      const url = document.getElementById('generatedLink').href;
      try {
        await navigator.clipboard.writeText(url);
        alert('Link copiado al portapapeles');
      } catch (e) {
        prompt('Copia manualmente este link:', url);
      }
    });

    function openLink(e) {
      e.preventDefault();
      const url = document.getElementById('generatedLink').href;
      if (!url) return;
      window.open(url, '_blank');
    }

    document.getElementById('btnReset').addEventListener('click', function(){
      document.getElementById('form').reset();
      document.getElementById('generatedLink').href = '';
      document.getElementById('generatedLink').textContent = '';
    });

    // Generar link inicial (si el usuario carg� par�metros v�a GET)
    (function(){
      // si el link pre-generado del servidor existe, lo dejamos; sino generamos uno en cliente
      const cur = document.getElementById('generatedLink').href;
      if (!cur || cur === window.location.href) {
        const url = buildClientLink();
        document.getElementById('generatedLink').href = url;
        document.getElementById('generatedLink').textContent = url;
      }
    })();
  </script>

</body>
</html>
