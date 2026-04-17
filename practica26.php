<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>P26 — Tablas 1-N | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg: #eaf4fb; --accent: #2196f3; --accent-dark: #1769aa;
      --text: #1a1a2e; --muted: #5a9abf; --border: #b3d9f2; --error: #d32f2f;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--text); font-family: 'Syne', sans-serif;
           min-height: 100vh; padding: 40px 24px 60px; }
    .back { display: inline-block; margin-bottom: 28px; font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; }
    .back:hover { color: var(--accent); }
    h1 { font-size: 1.8rem; color: var(--accent-dark); margin-bottom: 6px; }
    .sub { font-family: 'JetBrains Mono', monospace; font-size: 0.78rem; color: var(--muted); margin-bottom: 24px; }
    .controles { display: flex; flex-wrap: wrap; align-items: center; gap: 14px;
                 background: #fff; border: 1px solid var(--border); border-radius: 10px;
                 padding: 18px 24px; margin-bottom: 14px; max-width: 600px; }
    .controles label { font-size: 0.9rem; color: var(--accent-dark); font-weight: 700; }
    .controles input[type="number"] { width: 100px; padding: 9px 14px; font-size: 1rem;
                                       border: 1px solid #90caf9; border-radius: 8px; outline: none;
                                       text-align: center; color: var(--accent-dark);
                                       background: #f0f8ff; font-family: 'JetBrains Mono', monospace;
                                       transition: border-color 0.2s; }
    .controles input:focus { border-color: var(--accent); }
    button { background: var(--accent); color: #fff; border: none; padding: 10px 28px;
             font-size: 0.95rem; font-family: 'Syne', sans-serif; font-weight: 700;
             border-radius: 8px; cursor: pointer; transition: background 0.2s; }
    button:hover { background: var(--accent-dark); }
    .error-msg { color: var(--error); font-family: 'JetBrains Mono', monospace;
                 font-size: 0.82rem; margin-bottom: 18px; min-height: 20px; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-top: 16px; }
    .tabla-card { background: #fff; border: 1px solid var(--border); border-radius: 10px; overflow: hidden; }
    .tabla-header { background: var(--accent); padding: 10px 16px; display: flex; align-items: center; gap: 10px; }
    .tabla-header .numero { font-size: 1.4rem; font-weight: 800; color: #fff; }
    .tabla-header .titulo { font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; color: #d0eaff; }
    .tabla-body { padding: 8px 0; }
    .fila { display: grid; grid-template-columns: 36px 16px 28px 16px 1fr;
            align-items: center; padding: 5px 16px; font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem; gap: 4px; }
    .fila:hover { background: #eaf4fb; }
    .fila .op { color: #555; text-align: right; }
    .fila .signo { color: var(--accent); text-align: center; }
    .fila .result { font-weight: 700; color: var(--accent-dark); text-align: right; }
  </style>
</head>
<body>
<a class="back" href="index.php">← Menú</a>
<h1>Tablas de Multiplicar</h1>
<p class="sub">Elige hasta qué número generar</p>

<form method="POST">
  <div class="controles">
    <label for="numero">Generar tablas del 1 al:</label>
    <input type="number" id="numero" name="numero" min="1" max="100" placeholder="Ej. 10"
           value="<?php echo isset($_POST['numero']) ? (int)$_POST['numero'] : ''; ?>"/>
    <button type="submit">Generar tablas</button>
  </div>
</form>

<?php
$errorMsg = '';
$limite   = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['numero']) || $_POST['numero'] === '') {
    $errorMsg = 'Ingresa un número válido.';
  } else {
    $limite = (int)$_POST['numero'];
    if ($limite < 1) {
      $errorMsg = 'El número debe ser mayor a cero.';
      $limite = null;
    } elseif ($limite > 100) {
      $errorMsg = 'El límite máximo es 100 tablas.';
      $limite = null;
    }
  }
}
?>
<p class="error-msg"><?php echo htmlspecialchars($errorMsg); ?></p>

<?php if ($limite !== null): ?>
<div class="grid">
<?php
for ($tabla = 1; $tabla <= $limite; $tabla++) {
    echo '<div class="tabla-card">';
    echo '<div class="tabla-header">';
    echo "<span class=\"numero\">$tabla</span>";
    echo "<span class=\"titulo\">Tabla del $tabla</span>";
    echo '</div>';
    echo '<div class="tabla-body">';
    for ($i = 1; $i <= 10; $i++) {
        $r = $tabla * $i;
        echo '<div class="fila">';
        echo "<span class=\"op\">$tabla</span>";
        echo '<span class="signo">×</span>';
        echo "<span class=\"op\">$i</span>";
        echo '<span class="signo">=</span>';
        echo "<span class=\"result\">$r</span>";
        echo '</div>';
    }
    echo '</div></div>';
}
?>
</div>
<?php endif; ?>

</body>
</html>
