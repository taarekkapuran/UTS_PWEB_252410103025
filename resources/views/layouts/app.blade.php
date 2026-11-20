<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') · Forza Motor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@62..125,100..900&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#ececE8;--paper:#fff;--ink:#101010;--mute:#5f5f5a;--line:#d5d5cf;--signal:#ffd400}
        *{box-sizing:border-box}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:'Archivo',system-ui,sans-serif;line-height:1.55}
        a{color:inherit}
        h1,h2,h3{margin:0;font-stretch:125%;font-weight:800;line-height:1.05;letter-spacing:-.01em}
        h2{font-size:1.6rem;margin:48px 0 18px}
        .wrap{max-width:1180px;margin:0 auto;padding:0 20px}
        .nav{background:var(--paper);border-bottom:3px solid var(--ink);position:sticky;top:0;z-index:5}
        .nav .wrap{display:flex;align-items:center;gap:24px;min-height:64px;flex-wrap:wrap}
        .nav img{height:40px;display:block}
        .nav ul{display:flex;gap:4px;list-style:none;margin:0 0 0 auto;padding:0;flex-wrap:wrap}
        .nav a.link{display:block;padding:8px 14px;text-decoration:none;font-weight:600}
        .nav a.link:hover{background:var(--bg)}
        .nav a.on{background:var(--signal)}
        .hero{display:grid;grid-template-columns:1fr 1.2fr;gap:24px;align-items:center;padding:48px 0 24px}
        .hero h1{font-size:clamp(2.2rem,6vw,4.4rem);overflow-wrap:anywhere}
        .hero p{max-width:44ch;color:var(--mute);font-size:1.1rem}
        .hero img{width:100%;height:auto}
        .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:2px;background:var(--ink);border:2px solid var(--ink)}
        .stats div{background:var(--paper);padding:16px 18px}
        .stats span{display:block;color:var(--mute);font-size:.9rem}
        .stats strong{font-size:1.05rem}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px}
        .card{background:var(--paper);border:2px solid var(--ink);display:flex;flex-direction:column;text-decoration:none;transition:box-shadow .15s}
        .card:hover{box-shadow:6px 6px 0 var(--ink)}
        .card img{width:100%;aspect-ratio:16/10;object-fit:contain;background:#fff}
        .card .b{padding:16px;border-top:2px solid var(--ink)}
        .card h3{font-size:1.1rem;margin-bottom:4px}
        .tag{display:inline-block;background:var(--signal);padding:1px 8px;font-weight:700;font-size:.85rem}
        .meta{display:flex;gap:16px;margin-top:10px;color:var(--mute);font-size:.92rem}
        .tablewrap{overflow-x:auto;background:#fff;border:2px solid var(--ink)}
        table{border-collapse:collapse;width:100%;min-width:820px}
        th,td{padding:12px 14px;text-align:left;border-bottom:1px solid var(--line);vertical-align:middle}
        th{background:var(--ink);color:#fff;font-weight:600}
        td img{width:96px;height:60px;object-fit:contain;display:block}
        details{background:#fff;border:2px solid var(--ink);margin-top:12px}
        summary{cursor:pointer;padding:14px 18px;font-weight:700;display:flex;gap:12px;align-items:center}
        dl{display:grid;grid-template-columns:minmax(140px,230px) 1fr;margin:0;padding:0 18px 18px;gap:8px 16px}
        dt{color:var(--mute)} dd{margin:0}
        .panel{background:#fff;border:2px solid var(--ink);padding:24px;margin-top:20px}
        .panel ol{margin:12px 0 0;padding-left:22px}
        .login{min-height:100vh;display:grid;grid-template-columns:1.1fr 1fr}
        .login .l{background:#fff;display:flex;flex-direction:column;justify-content:center;align-items:center;gap:24px;padding:32px;border-right:3px solid var(--ink)}
        .login .l .logo{height:110px}
        .login .l .bike{width:100%;max-width:560px}
        .login .r{display:flex;align-items:center;justify-content:center;padding:32px}
        form{width:100%;max-width:380px}
        form h1{font-size:2rem;margin-bottom:8px}
        label{display:block;font-weight:600;margin:16px 0 6px}
        input{width:100%;padding:12px;border:2px solid var(--ink);font:inherit;background:#fff}
        button,.btn{display:block;margin-top:22px;padding:14px 20px;background:var(--signal);border:2px solid var(--ink);font:inherit;font-weight:700;cursor:pointer;width:100%;text-align:center;text-decoration:none;transition:box-shadow .15s}
        button:hover,.btn:hover{box-shadow:4px 4px 0 var(--ink)}
        .alert{background:#fff;border-left:6px solid var(--signal);padding:10px 14px;margin-top:16px}
        :focus-visible{outline:3px solid var(--ink);outline-offset:2px}
        .foot{background:var(--ink);color:#d8d8d2;margin-top:64px;padding:32px 0}
        .foot .wrap{display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap;align-items:center}
        .foot img{height:44px;filter:invert(1);display:block}
        .foot small{max-width:60ch}
        @media(max-width:800px){.hero,.login{grid-template-columns:1fr}.login .l{border-right:0;border-bottom:3px solid var(--ink)}.nav ul{margin-left:0;width:100%}dl{grid-template-columns:1fr;gap:2px}dd{margin-bottom:10px}}
        @media(prefers-reduced-motion:reduce){*{transition:none!important}}
    </style>
</head>
<body>
    @hasSection('bare')
        {{-- Halaman login: tanpa navbar dan footer --}}
        @yield('bare')
    @else
        <x-navbar :username="$username" />
        <main class="wrap">
            @yield('content')
        </main>
        @include('components.footer')
    @endif
</body>
</html>