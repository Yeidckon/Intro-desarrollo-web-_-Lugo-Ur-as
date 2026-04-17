<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>P22 — Fórmula General | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg: #0a0f0a; --surface: #111811; --border: #1e2e1e;
      --accent: #4caf72; --accent2: #e94560;
      --text: #e8f0e8; --muted: #5a7a5a;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--text); font-family: 'Syne', sans-serif;
           min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
    .back { position: fixed; top: 24px; left: 24px; font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; }
    .back:hover { color: var(--accent); }
    .card { background: var(--surface); border: 1px solid var(--border); border-radius: 20px;
            padding: 48px 52px; width: 100%; max-width: 460px; }
    .tag { font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; color: var(--accent);
           letter-spacing: 4px; text-transform: uppercase; margin-bottom: 12px; }
    h1 { font-size: 1.7rem; font-weight: 800; margin-bottom: 6px; }
    .formula { font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; color: var(--muted);
               margin-bottom: 32px; }
    label { display: block; font-family: 'JetBrains Mono', monospace; font-size: 0.75rem;
            color: var(--muted); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px; }
    input[type="number"] { width: 100%; padding: 12px 16px; background: #0a0f0a; border: 1px solid var(--border);
            border-radius: 10px; color: var(--text); font-size: 1.1rem; font-family: 'JetBrains Mono', monospace;
            outline: none; margin-bottom: 20px; transition: border-color 0.2s; }
    input[type="number"]:focus { border-color: var(--accent); }
    button { width: 100%; padding: 13px; background: var(--accent); border: none; border-radius: 10px;
             color: #0a0f0a; font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700;
             cursor: pointer; transition: opacity 0.2s; margin-top: 4px; }
    button:hover { opacity: 0.85; }
    .resultado { margin-top: 28px; padding: 22px 24px; background: #0a0f0a;
                 border: 1px solid var(--border); border-left: 3px solid var(--accent);
                 border-radius: 10px; font-family: 'JetBrains Mono', monospace; line-height: 2; }
    .resultado .lbl { font-size: 0.7rem; color: var(--muted); letter-spacing: 2px; text-transform: uppercase; }
    .resultado .val { font-size: 1.4rem; font-weight: 700; color: var(--accent); }
    .error { border-left-color: var(--accent2); color: var(--accent2); font-size: 0.9rem; }
  </style>
</head>
<body>
<a class="back" href="index.php">← Menú</a>

<div class="card">
  <p class="tag">P — 22</p>
  <h1>Fórmula General</h1>
  <p class="formula">ax² + bx + c = 0</p>

  <form method="POST">
    <label>Coeficiente A</label>
    <input type="number" name="a" step="any"
           value="<?php echo isset($_POST['a']) ? htmlspecialchars($_POST['a']) : ''; ?>"/>

    <label>Coeficiente B</label>
    <input type="number" name="b" step="any"
           value="<?php echo isset($_POST['b']) ? htmlspecialchars($_POST['b']) : ''; ?>"/>

    <label>Coeficiente C</label>
    <input type="number" name="c" step="any"
           value="<?php echo isset($_POST['c']) ? htmlspecialchars($_POST['c']) : ''; ?>"/>

    <button type="submit">Calcular raíces</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $c = floatval($_POST['c']);

    if ($a == 0) {
      echo '<div class="resultado error">El coeficiente A no puede ser cero (no es cuadrática).</div>';
    } else {
      $disc = ($b * $b) - (4 * $a * $c);
      if ($disc < 0) {
        echo '<div class="resultado error">Discriminante negativo: no existen raíces reales.<br/>';
        echo '<small>Discriminante = ' . round($disc, 4) . '</small></div>';
      } else {
        $x1 = (-$b + sqrt($disc)) / (2 * $a);
        $x2 = (-$b - sqrt($disc)) / (2 * $a);
        echo '<div class="resultado">';
        echo '<span class="lbl">Discriminante</span><br/>';
        echo round($disc, 6) . '<br/><br/>';
        echo '<span class="lbl">x₁</span><br/>';
        echo '<span class="val">' . round($x1, 6) . '</span><br/>';
        echo '<span class="lbl">x₂</span><br/>';
        echo '<span class="val">' . round($x2, 6) . '</span>';
        echo '</div>';
      }
    }
  }
  ?>
</div>
</body>
</html>
