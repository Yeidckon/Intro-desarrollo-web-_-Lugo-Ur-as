<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Prácticas 21–26 | PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:       #0a0a0f;
      --surface:  #111118;
      --border:   #1e1e2e;
      --accent:   #7c6af7;
      --accent2:  #e94560;
      --text:     #e8e8f0;
      --muted:    #5a5a7a;
      --card-hover: #161622;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Syne', sans-serif;
      min-height: 100vh;
      padding: 60px 24px;
    }

    /* Noise overlay */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 0;
    }

    .wrapper {
      position: relative;
      z-index: 1;
      max-width: 900px;
      margin: 0 auto;
    }

    header {
      margin-bottom: 64px;
    }

    .tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.7rem;
      letter-spacing: 4px;
      color: var(--accent);
      text-transform: uppercase;
      margin-bottom: 16px;
    }

    h1 {
      font-size: clamp(2.4rem, 6vw, 4rem);
      font-weight: 800;
      line-height: 1.05;
      letter-spacing: -1px;
    }

    h1 em {
      font-style: normal;
      color: var(--accent);
    }

    .subtitle {
      margin-top: 14px;
      color: var(--muted);
      font-size: 1rem;
      font-weight: 400;
      font-family: 'JetBrains Mono', monospace;
    }

    /* Divider */
    .divider {
      width: 48px;
      height: 3px;
      background: linear-gradient(90deg, var(--accent), var(--accent2));
      margin: 28px 0;
      border-radius: 2px;
    }

    /* Grid */
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 16px;
    }

    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 28px 28px 24px;
      text-decoration: none;
      color: inherit;
      display: flex;
      flex-direction: column;
      gap: 10px;
      transition: background 0.2s, border-color 0.2s, transform 0.2s;
      position: relative;
      overflow: hidden;
    }

    .card::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, var(--accent) 0%, transparent 60%);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .card:hover {
      background: var(--card-hover);
      border-color: var(--accent);
      transform: translateY(-3px);
    }

    .card:hover::after {
      opacity: 0.04;
    }

    .card-num {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.7rem;
      color: var(--accent);
      letter-spacing: 3px;
    }

    .card h2 {
      font-size: 1.1rem;
      font-weight: 700;
      line-height: 1.3;
    }

    .card p {
      font-size: 0.82rem;
      color: var(--muted);
      font-family: 'JetBrains Mono', monospace;
      line-height: 1.5;
    }

    .card-arrow {
      margin-top: auto;
      padding-top: 16px;
      font-size: 1.2rem;
      color: var(--muted);
      transition: color 0.2s, transform 0.2s;
    }

    .card:hover .card-arrow {
      color: var(--accent);
      transform: translateX(4px);
    }

    footer {
      margin-top: 80px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.7rem;
      color: var(--muted);
      letter-spacing: 2px;
    }
  </style>
</head>
<body>
<div class="wrapper">

  <header>
    <p class="tag">Programación Web &mdash; PHP Server-Side</p>
    <h1>Prácticas<br/><em>21 &ndash; 26</em></h1>
    <div class="divider"></div>
    <p class="subtitle">Lugo Urías Yeidckon Zaid</p>
  </header>

  <nav class="grid">
    <a class="card" href="practica21.php">
      <span class="card-num">P — 21</span>
      <h2>Calculadora Aritmética</h2>
      <p>Suma, resta, multiplicación y división con procesamiento PHP.</p>
      <span class="card-arrow">→</span>
    </a>
    <a class="card" href="practica22.php">
      <span class="card-num">P — 22</span>
      <h2>Fórmula General</h2>
      <p>Raíces de ecuación cuadrática ax²+bx+c calculadas en servidor.</p>
      <span class="card-arrow">→</span>
    </a>
    <a class="card" href="practica23.php">
      <span class="card-num">P — 23</span>
      <h2>Índice de Masa Corporal</h2>
      <p>IMC con clasificación OMS generada en PHP.</p>
      <span class="card-arrow">→</span>
    </a>
    <a class="card" href="practica24.php">
      <span class="card-num">P — 24</span>
      <h2>Fecha Actual</h2>
      <p>Día, mes y año obtenidos con funciones de fecha de PHP.</p>
      <span class="card-arrow">→</span>
    </a>
    <a class="card" href="practica25.php">
      <span class="card-num">P — 25</span>
      <h2>Tablas 1 al 10</h2>
      <p>Generación de tablas de multiplicar del 1 al 10 con PHP.</p>
      <span class="card-arrow">→</span>
    </a>
    <a class="card" href="practica26.php">
      <span class="card-num">P — 26</span>
      <h2>Tablas 1 al N</h2>
      <p>Tablas de multiplicar hasta un límite definido por el usuario.</p>
      <span class="card-arrow">→</span>
    </a>
  </nav>

  <footer>
    <p>© <?php echo date('Y'); ?> &mdash; Lugo Urías &mdash; Servidor PHP</p>
  </footer>

</div>
</body>
</html>
