<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>P24 — Fecha | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg: #1a1a2e; --surface: rgba(255,255,255,0.05); --border: rgba(255,255,255,0.12);
      --accent: #e94560; --text: #ffffff; --muted: rgba(255,255,255,0.4);
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
           color: var(--text); font-family: 'Syne', sans-serif;
           min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
    .back { position: fixed; top: 24px; left: 24px; font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; }
    .back:hover { color: var(--accent); }
    .card { background: var(--surface); backdrop-filter: blur(12px);
            border: 1px solid var(--border); border-radius: 24px;
            padding: 60px 70px; text-align: center; max-width: 620px; width: 100%;
            box-shadow: 0 24px 64px rgba(0,0,0,0.5); }
    .tag { font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; color: var(--muted);
           letter-spacing: 5px; text-transform: uppercase; margin-bottom: 28px; }
    .fecha-box { padding: 28px 32px; background: rgba(255,255,255,0.06); border-radius: 14px;
                 border-left: 4px solid var(--accent); }
    .fecha-txt { font-size: clamp(1.1rem, 3vw, 1.55rem); font-weight: 600; line-height: 1.6; }
    .fecha-txt .hl { color: var(--accent); font-weight: 800; }
    .badge { margin-top: 28px; font-family: 'JetBrains Mono', monospace; font-size: 0.68rem;
             letter-spacing: 3px; color: var(--muted); text-transform: uppercase; }
    .php-tag { display: inline-block; margin-top: 8px; padding: 4px 12px;
               background: rgba(233,69,96,0.15); border: 1px solid rgba(233,69,96,0.3);
               border-radius: 6px; font-family: 'JetBrains Mono', monospace; font-size: 0.7rem;
               color: var(--accent); letter-spacing: 2px; }
  </style>
</head>
<body>
<a class="back" href="index.php">← Menú</a>

<div class="card">
  <p class="tag">P — 24 &nbsp;/&nbsp; Fecha del Servidor</p>

  <?php
  // Configurar locale en español
  setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain', 'Spanish');

  $dias = ['domingo','lunes','martes','miércoles','jueves','viernes','sábado'];
  $meses = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

  $diaSemana = $dias[(int)date('w')];
  $diaSemana = ucfirst($diaSemana);
  $diaMes    = (int)date('j');
  $mes       = $meses[(int)date('n')];
  $anio      = date('Y');
  $hora      = date('H:i:s');
  ?>

  <div class="fecha-box">
    <p class="fecha-txt">
      Hoy es <span class="hl"><?php echo $diaSemana; ?></span>
      <?php echo $diaMes; ?> de
      <span class="hl"><?php echo $mes; ?></span>
      del año <span class="hl"><?php echo $anio; ?></span>
    </p>
  </div>

  <p class="badge">
    Hora del servidor: <?php echo $hora; ?><br/>
    <span class="php-tag">generado con PHP date()</span>
  </p>
</div>
</body>
</html>
