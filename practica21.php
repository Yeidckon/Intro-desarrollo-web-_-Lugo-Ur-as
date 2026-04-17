<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>P21 — Calculadora | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg: #0a0a0f; --surface: #111118; --border: #1e1e2e;
      --accent: #7c6af7; --accent2: #e94560;
      --text: #e8e8f0; --muted: #5a5a7a;
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
    h1 { font-size: 1.7rem; font-weight: 800; margin-bottom: 32px; }
    label { display: block; font-family: 'JetBrains Mono', monospace; font-size: 0.75rem;
            color: var(--muted); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px; }
    input[type="number"] { width: 100%; padding: 12px 16px; background: #0d0d14; border: 1px solid var(--border);
            border-radius: 10px; color: var(--text); font-size: 1.1rem; font-family: 'JetBrains Mono', monospace;
            outline: none; margin-bottom: 20px; transition: border-color 0.2s; }
    input[type="number"]:focus { border-color: var(--accent); }
    .btns { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 8px; }
    button { padding: 12px; background: #1a1a26; border: 1px solid var(--border); border-radius: 10px;
             color: var(--text); font-family: 'Syne', sans-serif; font-size: 0.9rem; font-weight: 600;
             cursor: pointer; transition: background 0.2s, border-color 0.2s; }
    button:hover { background: var(--accent); border-color: var(--accent); }
    .resultado { margin-top: 28px; padding: 20px 22px; background: #0d0d14; border-left: 3px solid var(--accent);
                 border-radius: 10px; font-family: 'JetBrains Mono', monospace; font-size: 1rem; line-height: 1.6; }
    .resultado .val { font-size: 1.5rem; font-weight: 700; color: var(--accent); }
    .error { border-left-color: var(--accent2); color: var(--accent2); }
  </style>
</head>
<body>
<a class="back" href="index.php">← Menú</a>

<div class="card">
  <p class="tag">P — 21</p>
  <h1>Calculadora Aritmética</h1>

  <form method="POST">
    <label>Variable A</label>
    <input type="number" name="a" step="any"
           value="<?php echo isset($_POST['a']) ? htmlspecialchars($_POST['a']) : ''; ?>"/>

    <label>Variable B</label>
    <input type="number" name="b" step="any"
           value="<?php echo isset($_POST['b']) ? htmlspecialchars($_POST['b']) : ''; ?>"/>

    <div class="btns">
      <button type="submit" name="op" value="suma">Suma</button>
      <button type="submit" name="op" value="resta">Resta</button>
      <button type="submit" name="op" value="multiplicacion">Multiplicación</button>
      <button type="submit" name="op" value="division">División</button>
    </div>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['op'])) {
    $a  = floatval($_POST['a']);
    $b  = floatval($_POST['b']);
    $op = $_POST['op'];

    $simbolos = ['suma'=>'+','resta'=>'-','multiplicacion'=>'×','division'=>'÷'];
    $simbolo  = $simbolos[$op] ?? '?';

    if ($op === 'division' && $b == 0) {
      echo '<div class="resultado error">División entre cero no está definida.</div>';
    } else {
      switch ($op) {
        case 'suma':           $r = $a + $b; break;
        case 'resta':          $r = $a - $b; break;
        case 'multiplicacion': $r = $a * $b; break;
        case 'division':       $r = $a / $b; break;
      }
      echo "<div class=\"resultado\">";
      echo "$a $simbolo $b<br/>";
      echo "<span class=\"val\">= $r</span>";
      echo "</div>";
    }
  }
  ?>
</div>
</body>
</html>
