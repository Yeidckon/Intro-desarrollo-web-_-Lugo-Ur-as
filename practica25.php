<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>P25 — Tablas 1-10 | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg: #eaf4fb; --accent: #2196f3; --accent-dark: #1769aa;
      --text: #1a1a2e; --muted: #5a9abf; --border: #b3d9f2;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--text); font-family: 'Syne', sans-serif;
           min-height: 100vh; padding: 40px 24px 60px; }
    .back { display: inline-block; margin-bottom: 28px; font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; }
    .back:hover { color: var(--accent); }
    h1 { font-size: 1.8rem; color: var(--accent-dark); margin-bottom: 6px; }
    .sub { font-family: 'JetBrains Mono', monospace; font-size: 0.78rem; color: var(--muted); margin-bottom: 28px; }
    .php-badge { display: inline-block; padding: 4px 12px; background: #e3f2fd;
                 border: 1px solid var(--border); border-radius: 6px;
                 font-family: 'JetBrains Mono', monospace; font-size: 0.68rem;
                 color: var(--accent-dark); letter-spacing: 2px; margin-bottom: 32px; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
    .tabla-card { background: #fff; border: 1px solid var(--border); border-radius: 10px; overflow: hidden; }
    .tabla-header { background: var(--accent); padding: 10px 16px; display: flex; align-items: center; gap: 10px; }
    .tabla-header .numero { font-size: 1.4rem; font-weight: 800; color: #fff; }
    .tabla-header .titulo { font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; color: #d0eaff; }
    .tabla-body { padding: 8px 0; }
    .fila { display: grid; grid-template-columns: 28px 16px 28px 16px 1fr;
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
<p class="sub">Del 1 al 10 generadas con bucles PHP</p>
<span class="php-badge">for + for — PHP server-side</span>

<div class="grid">
<?php
for ($tabla = 1; $tabla <= 10; $tabla++) {
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
</body>
</html>
