<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>P23 — IMC | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg: #0f0a0a; --surface: #181111; --border: #2e1e1e;
      --accent: #e94560; --accent2: #f7a046;
      --text: #f0e8e8; --muted: #7a5a5a;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--text); font-family: 'Syne', sans-serif;
           min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
    .back { position: fixed; top: 24px; left: 24px; font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; }
    .back:hover { color: var(--accent); }
    .card { background: var(--surface); border: 1px solid var(--border); border-radius: 20px;
            padding: 48px 52px; width: 100%; max-width: 500px; }
    .tag { font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; color: var(--accent);
           letter-spacing: 4px; text-transform: uppercase; margin-bottom: 12px; }
    h1 { font-size: 1.7rem; font-weight: 800; margin-bottom: 6px; }
    .sub { font-family: 'JetBrains Mono', monospace; font-size: 0.78rem; color: var(--muted); margin-bottom: 32px; }
    label { display: block; font-family: 'JetBrains Mono', monospace; font-size: 0.75rem;
            color: var(--muted); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px; }
    input[type="number"] { width: 100%; padding: 12px 16px; background: #0f0a0a; border: 1px solid var(--border);
            border-radius: 10px; color: var(--text); font-size: 1.1rem; font-family: 'JetBrains Mono', monospace;
            outline: none; margin-bottom: 20px; transition: border-color 0.2s; }
    input[type="number"]:focus { border-color: var(--accent); }
    button { width: 100%; padding: 13px; background: var(--accent); border: none; border-radius: 10px;
             color: #fff; font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700;
             cursor: pointer; transition: opacity 0.2s; }
    button:hover { opacity: 0.85; }
    .resultado { margin-top: 28px; padding: 24px; background: #0f0a0a;
                 border: 1px solid var(--border); border-radius: 12px; text-align: center; }
    .imc-num { font-size: 3.5rem; font-weight: 800; color: var(--accent); line-height: 1; }
    .imc-lbl { font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; color: var(--muted);
               letter-spacing: 3px; text-transform: uppercase; margin: 6px 0 18px; }
    .badge { display: inline-block; padding: 8px 20px; border-radius: 8px; font-weight: 700;
             font-size: 0.95rem; }
    .bajo      { background: #1a3a5c; color: #7ec8f5; }
    .normal    { background: #1a3a26; color: #6ee0a0; }
    .sobrepeso { background: #3a2e10; color: #f7d06e; }
    .obesidad1 { background: #3a1e10; color: #f7a06e; }
    .obesidad2 { background: #3a1010; color: #f78080; }
    .obesidad3 { background: #2a0808; color: #f76060; }
    .tabla-ref { width: 100%; border-collapse: collapse; margin-top: 28px; font-size: 0.8rem; }
    .tabla-ref th { background: #1a1010; color: var(--muted); padding: 8px 10px; text-align: left;
                    font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; letter-spacing: 2px; }
    .tabla-ref td { padding: 7px 10px; border-bottom: 1px solid var(--border); color: #c0a0a0; }
    .tabla-ref tr:last-child td { border-bottom: none; }
  </style>
</head>
<body>
<a class="back" href="index.php">← Menú</a>

<div class="card">
  <p class="tag">P — 23</p>
  <h1>Índice de Masa Corporal</h1>
  <p class="sub">IMC = peso / estatura²</p>

  <form method="POST">
    <label>Peso (kg)</label>
    <input type="number" name="peso" step="0.1" min="1" placeholder="Ej. 65"
           value="<?php echo isset($_POST['peso']) ? htmlspecialchars($_POST['peso']) : ''; ?>"/>

    <label>Estatura (cm)</label>
    <input type="number" name="estatura" step="0.1" min="1" placeholder="Ej. 165"
           value="<?php echo isset($_POST['estatura']) ? htmlspecialchars($_POST['estatura']) : ''; ?>"/>

    <button type="submit">Calcular IMC</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peso     = floatval($_POST['peso']);
    $estatura = floatval($_POST['estatura']);

    if ($peso <= 0 || $estatura <= 0) {
      echo '<div class="resultado" style="color:var(--accent2)">Ingresa valores válidos.</div>';
    } else {
      $em  = $estatura / 100;
      $imc = $peso / ($em * $em);
      $r   = round($imc, 2);

      if ($imc < 18.5)      { $clase = 'bajo';      $text = 'Bajo peso'; }
      elseif ($imc < 25)    { $clase = 'normal';     $text = 'Peso normal'; }
      elseif ($imc < 30)    { $clase = 'sobrepeso';  $text = 'Sobrepeso'; }
      elseif ($imc < 35)    { $clase = 'obesidad1';  $text = 'Obesidad grado I'; }
      elseif ($imc < 40)    { $clase = 'obesidad2';  $text = 'Obesidad grado II'; }
      else                  { $clase = 'obesidad3';  $text = 'Obesidad grado III'; }

      echo '<div class="resultado">';
      echo "<div class=\"imc-num\">$r</div>";
      echo '<div class="imc-lbl">kg / m²</div>';
      echo "<span class=\"badge $clase\">$text</span>";
      echo '</div>';
    }
  }
  ?>

  <table class="tabla-ref">
    <tr><th>IMC (kg/m²)</th><th>Clasificación</th></tr>
    <tr><td>&lt; 18.5</td><td>Bajo peso</td></tr>
    <tr><td>18.5 — 24.9</td><td>Peso normal</td></tr>
    <tr><td>25.0 — 29.9</td><td>Sobrepeso</td></tr>
    <tr><td>30.0 — 34.9</td><td>Obesidad I</td></tr>
    <tr><td>35.0 — 39.9</td><td>Obesidad II</td></tr>
    <tr><td>≥ 40.0</td><td>Obesidad III</td></tr>
  </table>
</div>
</body>
</html>
