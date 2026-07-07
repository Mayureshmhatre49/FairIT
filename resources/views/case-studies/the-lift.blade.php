@extends('layouts.app')
@section('title', 'Case Study: Production ERP for Film & Content — FairIT Solutions')
@section('description', 'A purpose-built ERP for film, television, and commercial production — replacing spreadsheet-and-inbox sprawl with a single source of truth.')

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "Article",
            "@id": "{{ url()->current() }}#article",
            "headline": "{{ addslashes($study->project_name) }} — {{ addslashes($study->domain) }} Case Study",
            "description": "{{ addslashes(\Illuminate\Support\Str::limit($study->summary, 200)) }}",
            "url": "{{ url()->current() }}",
            "datePublished": "{{ $study->created_at->toIso8601String() }}",
            "dateModified": "{{ $study->updated_at->toIso8601String() }}",
            "articleSection": "{{ $study->domain }}",
            "author": { "@id": "https://fairitsolutions.ch/#organization" },
            "publisher": { "@id": "https://fairitsolutions.ch/#organization" },
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" },
            "inLanguage": "{{ app()->getLocale() }}"
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Case Studies", "item": "{{ route('case-studies.index') }}" },
                { "@type": "ListItem", "position": 3, "name": "{{ addslashes($study->project_name) }}", "item": "{{ url()->current() }}" }
            ]
        }
    ]
}
</script>
@endsection

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,600;12..96,800&family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap');

.case-study-lift {
    --ink:#17171B;
    --ink-2:#22222A;
    --ink-3:#33333d;
    --paper:#F7F6F1;
    --card:#FFFFFF;
    --amber:#E07B39;
    --amber-deep:#BC601F;
    --line:#E3E0D6;
    --line-dk:#3A3A44;
    --muted:#6E6D66;
    --muted-2:#9B9A92;
    --pos:#2F7A55;
    --neg:#C0492B;
    --disp:"Bricolage Grotesque",system-ui,sans-serif;
    --body:"IBM Plex Sans",system-ui,sans-serif;
    --mono:"IBM Plex Mono",ui-monospace,monospace;
    --maxw:1280px;
}

.case-study-lift * {box-sizing:border-box;margin:0;padding:0}
.case-study-lift html {scroll-behavior:smooth}
.case-study-lift {
    font-family:var(--body);
    background:var(--paper);
    color:var(--ink);
    line-height:1.6;
    -webkit-font-smoothing:antialiased;
    font-size:17px;
  }
.case-study-lift .wrap {
    max-width: var(--maxw);
    margin: 0 auto;
    padding: 0 16px;
}
@media (min-width: 640px) {
    .case-study-lift .wrap {
        padding: 0 24px;
    }
}
@media (min-width: 1024px) {
    .case-study-lift .wrap {
        padding: 0 32px;
    }
}

  /* ---- film perforation rail ---- */
.case-study-lift .perf {
    height:18px;
    background:
      repeating-linear-gradient(90deg,
        transparent 0 14px,
        rgba(255,255,255,.85) 14px 24px,
        transparent 24px 38px);
    background-color:var(--ink);
    background-clip:content-box;
    border-top:1px solid var(--line-dk);
    border-bottom:1px solid var(--line-dk);
  }
.case-study-lift .perf span {display:block;height:100%;
    background:
      repeating-linear-gradient(90deg,
        var(--ink) 0 9px,
        #0c0c0f 9px 11px,
        var(--ink) 11px 29px);
    -webkit-mask:repeating-linear-gradient(90deg,#000 0 13px,transparent 13px 25px) center/auto 8px no-repeat;
  }
  /* simpler reliable perforation */
.case-study-lift .filmstrip {
    background:var(--ink);
    padding:6px 0;
    display:flex;gap:14px;justify-content:center;
    overflow:hidden;
  }
.case-study-lift .filmstrip i {
    width:18px;height:9px;border-radius:2px;
    background:var(--paper);opacity:.9;flex:0 0 auto;
  }

  /* ---- HERO ---- */
.case-study-lift header.hero {
    background:var(--ink);
    color:var(--paper);
    position:relative;
    overflow:hidden;
  }
.case-study-lift .hero-inner {padding:64px 0 76px;position:relative;z-index:2}
.case-study-lift .eyebrow {
    font-family:var(--mono);
    font-size:12.5px;
    letter-spacing:.22em;
    text-transform:uppercase;
    color:var(--amber);
    display:flex;align-items:center;gap:12px;
    margin-bottom:30px;
  }
.case-study-lift .eyebrow::before {content:"";width:34px;height:1px;background:var(--amber)}
.case-study-lift h1.title {
    font-family:var(--disp);
    font-weight:800;
    font-size:clamp(2.4rem,6vw,4.55rem);
    line-height:1.02;
    letter-spacing:-.02em;
    max-width:16ch;
    margin-bottom:26px;
  }
.case-study-lift h1.title em {color:var(--amber);font-style:normal}
.case-study-lift .lede {
    font-size:clamp(1.05rem,2vw,1.3rem);
    color:#D8D6CE;
    max-width:100%;
    line-height:1.55;
  }
  /* call-sheet meta strip */
.case-study-lift .meta {
    margin-top:44px;
    border-top:1px solid var(--line-dk);
    display:grid;
    grid-template-columns:repeat(4,1fr);
  }
.case-study-lift .meta div {
    padding:20px 22px 18px 0;
    border-right:1px solid var(--line-dk);
  }
.case-study-lift .meta div:last-child {border-right:0;padding-right:0}
.case-study-lift .meta dt {
    font-family:var(--mono);font-size:11px;letter-spacing:.18em;
    text-transform:uppercase;color:var(--muted-2);margin-bottom:8px;
  }
.case-study-lift .meta dd {font-size:15px;color:var(--paper);font-weight:500;line-height:1.35}
  /* slate corner motif */
.case-study-lift .slate-stripe {
    position:absolute;top:0;right:0;width:46%;height:54px;
    background:repeating-linear-gradient(118deg,var(--paper) 0 26px,var(--ink) 26px 52px);
    opacity:.10;
  }

  /* ---- SECTION SHELL ---- */
.case-study-lift section {padding:84px 0}
.case-study-lift .sec-eyebrow {
    font-family:var(--mono);font-size:12px;letter-spacing:.2em;
    text-transform:uppercase;color:var(--amber-deep);
    display:flex;align-items:center;gap:10px;margin-bottom:22px;
  }
.case-study-lift .sec-eyebrow .clap {
    width:26px;height:18px;display:inline-block;flex:0 0 auto;
    background:
      linear-gradient(180deg,var(--ink) 0 6px,transparent 6px),
      repeating-linear-gradient(115deg,var(--ink) 0 4px,var(--paper) 4px 8px);
    background-size:100% 100%,100% 7px;
    background-repeat:no-repeat;
    background-position:top, top;
    border:1px solid var(--ink);
  }
.case-study-lift h2.sec {
    font-family:var(--disp);font-weight:700;
    font-size:clamp(1.7rem,3.6vw,2.65rem);
    line-height:1.08;letter-spacing:-.015em;
    max-width:20ch;margin-bottom:26px;
  }
.case-study-lift .prose p {max-width:100%;margin-bottom:18px;color:#2c2c30}
.case-study-lift .prose p strong {font-weight:600;color:var(--ink)}

.case-study-lift .brief {background:var(--card);border-top:1px solid var(--line)}
.case-study-lift .pull {
    border-left:3px solid var(--amber);
    padding:6px 0 6px 22px;
    margin:30px 0 4px;
    font-family:var(--disp);font-weight:600;
    font-size:clamp(1.2rem,2.4vw,1.6rem);
    line-height:1.25;color:var(--ink);max-width:30ch;
  }

  /* ---- SPINE (numbered lifecycle) ---- */
.case-study-lift .spine {background:var(--paper)}
.case-study-lift .step {
    display:grid;
    grid-template-columns:88px 1fr;
    gap:0 28px;
    border-top:1px solid var(--line);
    padding:30px 0;
    align-items:start;
  }
.case-study-lift .step:last-child {border-bottom:1px solid var(--line)}
.case-study-lift .step .num {
    font-family:var(--mono);font-weight:600;
    font-size:14px;color:var(--amber-deep);
    padding-top:4px;letter-spacing:.04em;
  }
.case-study-lift .step h3 {
    font-family:var(--disp);font-weight:600;font-size:1.32rem;
    letter-spacing:-.01em;margin-bottom:8px;line-height:1.15;
  }
.case-study-lift .step p {color:#3a3a3e;max-width:100%;font-size:16px}
.case-study-lift .step.wrap-step {background:var(--ink);color:var(--paper);
    margin:0 -28px;padding:34px 28px;border:0;border-radius:4px;
    grid-template-columns:88px 1fr;}
.case-study-lift .step.wrap-step .num {color:var(--amber)}
.case-study-lift .step.wrap-step h3 {color:var(--paper)}
.case-study-lift .step.wrap-step p {color:#D6D4CC}

  /* ---- SUPPORTING MODULES (parallel, not numbered) ---- */
.case-study-lift .support {background:var(--card);border-top:1px solid var(--line)}
.case-study-lift .cards {display:grid;grid-template-columns:repeat(3,1fr);gap:1px;
    background:var(--line);border:1px solid var(--line);margin-top:14px}
.case-study-lift .mcard {background:var(--card);padding:30px 26px}
.case-study-lift .mcard .tag {
    font-family:var(--mono);font-size:11px;letter-spacing:.16em;
    text-transform:uppercase;color:var(--amber-deep);margin-bottom:16px;
    display:block;
  }
.case-study-lift .mcard h3 {font-family:var(--disp);font-weight:600;font-size:1.28rem;
    margin-bottom:10px;letter-spacing:-.01em}
.case-study-lift .mcard p {font-size:15.5px;color:#3a3a3e;margin-bottom:16px}
.case-study-lift .chips {display:flex;flex-wrap:wrap;gap:7px}
.case-study-lift .chip {
    font-family:var(--mono);font-size:11px;
    border:1px solid var(--line);border-radius:100px;
    padding:4px 11px;color:var(--muted);background:var(--paper);
  }

  /* ---- ESTIMATE DEEP-DIVE (AICP) ---- */
.case-study-lift .estimate {background:#F6F1E7;border-top:1px solid var(--line)}
.case-study-lift .estimate .sec-eyebrow {color:var(--amber-deep)}
.case-study-lift .est-lede {
    border-left:3px solid var(--amber);padding-left:22px;
    max-width:60ch;color:#2c2c30;margin-bottom:8px;
  }
.case-study-lift .est-lede strong {font-weight:600;color:var(--ink)}
.case-study-lift .acards {display:grid;grid-template-columns:repeat(3,1fr);gap:1px;
    background:var(--line);border:1px solid var(--line);margin-top:30px}
.case-study-lift .acard {background:var(--card);padding:28px 24px}
.case-study-lift .acard .tag {font-family:var(--mono);font-size:11px;letter-spacing:.16em;
    text-transform:uppercase;color:var(--amber-deep);margin-bottom:14px;display:block}
.case-study-lift .acard h3 {font-family:var(--disp);font-weight:600;font-size:1.14rem;
    margin-bottom:9px;letter-spacing:-.01em;line-height:1.2}
.case-study-lift .acard p {font-size:14.5px;color:#3a3a3e;line-height:1.55}
  @media (max-width:760px){.acards{grid-template-columns:1fr}}

  /* ---- BUDGET VIZ (functional color demo) ---- */
.case-study-lift .build {background:var(--paper)}
.case-study-lift .bgrid {display:grid;grid-template-columns:1.2fr 1fr;gap:46px;align-items:center;margin-top:8px}
.case-study-lift .ledger {border:1px solid var(--line);background:var(--card);border-radius:4px;overflow:hidden;font-family:var(--mono)}
.case-study-lift .ledger .lhead {display:grid;grid-template-columns:1fr 90px 90px 64px;
    background:var(--ink);color:var(--paper);font-size:11px;
    letter-spacing:.08em;text-transform:uppercase;padding:11px 16px;gap:8px}
.case-study-lift .lrow {display:grid;grid-template-columns:1fr 90px 90px 64px;
    padding:12px 16px;gap:8px;font-size:13px;border-top:1px solid var(--line);align-items:center}
.case-study-lift .lrow .lbl {font-family:var(--body);font-weight:500}
.case-study-lift .lrow .delta {font-weight:600;text-align:right}
.case-study-lift .delta.pos {color:var(--pos)}
.case-study-lift .delta.neg {color:var(--neg)}
.case-study-lift .num-r {text-align:right;color:#4a4a4e}

  /* ---- ACROSS THE SLATE (procurement intelligence) ---- */
.case-study-lift .slate {background:var(--card);border-top:1px solid var(--line)}
.case-study-lift .slate-intro {max-width:60ch;color:#2c2c30;margin-bottom:6px}
.case-study-lift .slate-intro strong {font-weight:600;color:var(--ink)}
.case-study-lift .scards {display:grid;grid-template-columns:1fr 1fr;gap:1px;
    background:var(--line);border:1px solid var(--line);margin-top:28px}
.case-study-lift .scard {background:var(--card);padding:34px 30px}
.case-study-lift .scard .tag {font-family:var(--mono);font-size:11px;letter-spacing:.16em;
    text-transform:uppercase;color:var(--amber-deep);margin-bottom:16px;display:block}
.case-study-lift .scard h3 {font-family:var(--disp);font-weight:600;font-size:1.34rem;
    margin-bottom:11px;letter-spacing:-.012em;line-height:1.16}
.case-study-lift .scard p {font-size:15.5px;color:#3a3a3e;line-height:1.55}
.case-study-lift .scard p em {font-style:italic;color:var(--ink)}
  @media (max-width:760px){.scards{grid-template-columns:1fr}}

  /* ---- RESULTS ---- */
.case-study-lift .wrapsec {background:var(--ink);color:var(--paper)}
.case-study-lift .wrapsec .sec-eyebrow {color:var(--amber)}
.case-study-lift .wrapsec h2.sec {color:var(--paper)}
.case-study-lift .stats {display:grid;grid-template-columns:repeat(4,1fr);gap:1px;
    background:var(--line-dk);border:1px solid var(--line-dk);margin-top:14px}
.case-study-lift .stat {background:var(--ink);padding:30px 22px}
.case-study-lift .stat .fig {font-family:var(--disp);font-weight:800;
    font-size:clamp(2rem,4vw,2.9rem);color:var(--amber);line-height:1;
    letter-spacing:-.02em}
.case-study-lift .stat .fig .ph {
    border-bottom:2px dashed var(--amber);padding-bottom:1px;
  }
.case-study-lift .stat .cap {font-size:14px;color:#CFCDC5;margin-top:14px;line-height:1.4}
.case-study-lift .note {
    font-family:var(--mono);font-size:11.5px;color:var(--muted-2);
    margin-top:22px;letter-spacing:.02em;
  }

  /* ---- CLOSE ---- */
.case-study-lift .close {background:var(--card);border-top:1px solid var(--line)}
.case-study-lift .close p {max-width:100%;font-size:1.08rem;color:#2c2c30}
.case-study-lift footer {background:var(--ink);color:var(--muted-2);
    font-family:var(--mono);font-size:12px;letter-spacing:.06em;
    padding:26px 0;text-align:center}

  /* reveal */
.case-study-lift .reveal {opacity:0;transform:translateY(16px);transition:opacity .6s ease,transform .6s ease}
.case-study-lift .reveal.in {opacity:1;transform:none}

.case-study-lift a {color:var(--amber-deep)}
.case-study-lift :focus-visible {outline:2px solid var(--amber);outline-offset:3px}

  @media (max-width:760px){
.case-study-lift {font-size:16px}
.case-study-lift .meta {grid-template-columns:repeat(2,1fr)}
.case-study-lift .meta div {border-right:0;border-bottom:1px solid var(--line-dk);padding-right:0}
.case-study-lift .meta div:nth-child(odd) {border-right:1px solid var(--line-dk);padding-right:18px}
.case-study-lift .cards {grid-template-columns:1fr}
.case-study-lift .stats {grid-template-columns:repeat(2,1fr)}
.case-study-lift .bgrid {grid-template-columns:1fr;gap:28px}
.case-study-lift .step {grid-template-columns:56px 1fr}
.case-study-lift .step.wrap-step {grid-template-columns:56px 1fr}
.case-study-lift section {padding:60px 0}
  }
  @media (prefers-reduced-motion:reduce){
.case-study-lift .reveal {opacity:1;transform:none;transition:none}
.case-study-lift html {scroll-behavior:auto}
  }

  /* ---- DASHBOARD PREVIEW ---- */
.case-study-lift .dashboard-preview {background:var(--card);border-top:1px solid var(--line)}
.case-study-lift .dash-frame {
    border-radius:10px;
    overflow:hidden;
    border:1px solid var(--line-dk);
    box-shadow:0 8px 40px rgba(0,0,0,.18),0 2px 8px rgba(0,0,0,.10);
    background:#0f0f13;
    margin-bottom:22px;
  }
.case-study-lift .dash-bar {
    background:#1a1a20;
    border-bottom:1px solid #2a2a32;
    padding:10px 16px;
    display:flex;
    align-items:center;
    gap:8px;
  }
.case-study-lift .dash-dot {
    width:11px;height:11px;border-radius:50%;display:inline-block;flex:0 0 auto;
  }
.case-study-lift .dash-label {
    font-family:var(--mono);font-size:11px;color:#6E6D66;letter-spacing:.08em;margin-left:6px;
  }
.case-study-lift .dash-img {
    display:block;width:100%;height:auto;
  }



/* Override some global margins/paddings for custom design */
.case-study-lift header.hero {
    margin-top: 0;
    padding-top: 80px;
}
.case-study-lift h1.title {
    font-family: "Bricolage Grotesque", system-ui, sans-serif !important;
}
.case-study-lift h2.sec {
    font-family: "Bricolage Grotesque", system-ui, sans-serif !important;
}
.case-study-lift .step h3 {
    font-family: "Bricolage Grotesque", system-ui, sans-serif !important;
}
.case-study-lift .mcard h3 {
    font-family: "Bricolage Grotesque", system-ui, sans-serif !important;
}
</style>

<div class="case-study-lift pt-16">


<header class="hero">
  <div class="slate-stripe" aria-hidden="true"></div>
  <div class="wrap hero-inner">
    <div class="eyebrow">Case Study — Production ERP</div>
    <h1 class="title">From estimate to <em>wrap</em>, one system runs the whole production.</h1>
    <p class="lede">A purpose-built ERP for film, television, and commercial production — replacing the spreadsheet-and-inbox sprawl that runs most shoots with a single source of truth, from the first budget line to the signed closure document.</p>
    <dl class="meta">
      <div><dt>Sector</dt><dd>Film &amp; commercial production</dd></div>
      <div><dt>Engagement</dt><dd>Product design &amp; build</dd></div>
      <div><dt>Scope</dt><dd>Full production lifecycle ERP</dd></div>
      <div><dt>Role</dt><dd>Architecture, build, delivery</dd></div>
    </dl>
  </div>
</header>

<div class="filmstrip" aria-hidden="true">
  <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
</div>

<!-- THE BRIEF -->
<section class="brief reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>The brief</div>
    <h2 class="sec">Every project ran on different tools, and the real number arrived too late.</h2>
    <div class="prose">
      <p>A production house runs many projects at once with a crew that is mostly freelance. Budgets start their life in spreadsheets. Contracts live in email threads. Purchase orders get approved over text and reconciled from memory. Casting and location scouting happen in someone's head or a folder of reference photos.</p>
      <p>The result is predictable: nobody knows a project's <strong>true position until it is over</strong> — by which point overruns are already sunk cost. When a shoot wraps, building the closure document means chasing every department for figures that no longer reconcile.</p>
      <div class="pull">In a business with thin margins, the gap between estimated and actual is the business.</div>
    </div>
  </div>
</section>

<!-- THE SPINE -->
<section class="spine reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>The production spine</div>
    <h2 class="sec">The ERP mirrors the lifecycle of a production itself.</h2>
    <p class="prose" style="margin-bottom:34px;"><span style="max-width:62ch;display:inline-block;color:#3a3a3e">Each stage hands off to the next inside one system, so the budget set on day one is the same record being reconciled at closure — no re-keying, no parallel versions, no drift.</span></p>

    <div class="step">
      <div class="num">01 / Pre-pro</div>
      <div><h3>Build the estimate on the AICP bid form</h3>
      <p>A producer builds a line-item estimate before the project is greenlit — on the AICP Bid Form, the format every agency expects and uses to compare competing bids side by side. Sections, fees, and fringes are structured in from the start, so the estimate is agency-ready, not a blank spreadsheet.</p></div>
    </div>
    <div class="step">
      <div class="num">02 / Greenlight</div>
      <div><h3>Convert the estimate into a live project</h3>
      <p>One action turns an approved estimate into an active project, carrying every budget line across as the committed baseline to track against. Nothing is re-entered and nothing is lost in translation.</p></div>
    </div>
    <div class="step">
      <div class="num">03 / Crew up</div>
      <div><h3>Add the team, freelancers, and contracts</h3>
      <p>Staff and freelancers are added to a shared production roster, and contracts are generated against each engagement — terms, dates, and rates captured against the person and the project, not buried in an inbox.</p></div>
    </div>
    <div class="step">
      <div class="num">04 / Commit</div>
      <div><h3>Raise purchase orders</h3>
      <p>POs are issued to freelancers and vendors and tied to specific budget lines, so every commitment is visible <em>before</em> money goes out — not discovered after.</p></div>
    </div>
    <div class="step">
      <div class="num">05 / In production</div>
      <div><h3>Track budget vs. actual</h3>
      <p>A live view of estimated, committed, and actual spend per line and per project. Overruns surface while there is still room to act, turning the budget from a post-mortem document into a steering instrument.</p></div>
    </div>
    <div class="step wrap-step">
      <div class="num">06 / Wrap</div>
      <div><h3>Generate the project closure document</h3>
      <p>On completion the system assembles the full closure document automatically — final budget reconciliation, contracts, purchase orders, and the complete project record compiled into a single deliverable, the moment the shoot wraps.</p></div>
    </div>
  </div>
</section>


<!-- DASHBOARD PREVIEW -->
<section class="dashboard-preview reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>Platform in action</div>
    <h2 class="sec">What a production manager sees, live.</h2>
    <p class="prose" style="max-width:66ch;color:#3a3a3e;margin-bottom:32px;">The dashboard surfaces every critical number in one view — active projects, budget utilisation, schedule progress, freelancer check-ins, and upcoming milestones — so a production manager can make decisions without opening a single spreadsheet.</p>
    <div class="dash-frame" role="img" aria-label="Indicative Production ERP dashboard showing project overview, budget utilisation, team and schedule data">
      <div class="dash-bar">
        <span class="dash-dot" style="background:#E07B39"></span>
        <span class="dash-dot" style="background:#6E6D66;opacity:.5"></span>
        <span class="dash-dot" style="background:#6E6D66;opacity:.5"></span>
        <span class="dash-label">Northlight Productions — Production ERP</span>
      </div>
      <img src="{{ asset('images/case-studies/production-erp-dashboard.png') }}" alt="Indicative ERP dashboard" class="dash-img" loading="lazy" width="1120" height="630">
    </div>
    <p class="note">// Indicative dashboard — representative of the live production environment.</p>
  </div>
</section>

<!-- ESTIMATE DEEP-DIVE -->
<section class="estimate reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>Zoom in — the estimate engine</div>
    <h2 class="sec">The estimate phase is a full AICP bidding engine.</h2>
    <p class="est-lede">Because the estimate is built on the <strong>AICP Bid Form</strong> — the standard US agencies require and use to compare bids in a triple-bid review — the work a producer does to win a job is the same record that runs the project and reconciles at wrap. These are the capabilities layered on top of that format.</p>
    <div class="acards">
      <div class="acard">
        <span class="tag">Structure</span>
        <h3>AICP sections, pre-loaded</h3>
        <p>The full lettered structure ships built in — from prep and shoot crew through equipment, talent, and post finishing — so nothing is missed and every bid lands in the exact shape an agency auditor expects.</p>
      </div>
      <div class="acard">
        <span class="tag">Math</span>
        <h3>Fees, fringes &amp; contingency, live</h3>
        <p>Production fee, insurance, and contingency apply as percentages on top of below-the-line costs, with per-section overrides (a reduced fee on travel or P&amp;W) and union fringes on labor lines — calculated instantly, with no broken cell references.</p>
      </div>
      <div class="acard">
        <span class="tag">Actuals</span>
        <h3>One form, estimate to actual</h3>
        <p>Every AICP line carries estimated and actual side by side. Actuals flow back from the purchase-order log and timesheets, so the bid you submitted becomes the cost report you reconcile at wrap — one artifact, no re-keying.</p>
      </div>
      <div class="acard">
        <span class="tag">Rate cards</span>
        <h3>Pricing pulled from the database</h3>
        <p>Crew day rates, equipment packages, and talent and location costs draw from the shared libraries, so estimates are fast to assemble and pricing stays consistent from one job to the next.</p>
      </div>
      <div class="acard">
        <span class="tag">Versions</span>
        <h3>Scenarios without file sprawl</h3>
        <p>Bid revisions and alternate scopes — a 15s/30s/60s set, an added shoot day, a weather-day contingency — live as versions of one budget instead of a folder of conflicting spreadsheets.</p>
      </div>
      <div class="acard">
        <span class="tag">Output</span>
        <h3>The bid package, generated</h3>
        <p>Top sheet, detailed cost breakdown, bid letter, and production calendar generate from the same data into a client-ready document — with per-section currency conversion for cross-border shoots.</p>
      </div>
    </div>
  </div>
</section>

<!-- SUPPORTING MODULES -->
<section class="support reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>Modules that run across every project</div>
    <h2 class="sec">Three libraries the whole studio draws from.</h2>
    <div class="cards">
      <div class="mcard">
        <span class="tag">CRM</span>
        <h3>Client &amp; creative relationships</h3>
        <p>A lightweight CRM that records the preferences — the likes and dislikes — of clients, agencies, and directors, so the next pitch and the next shoot start from what already worked with that relationship.</p>
        <div class="chips"><span class="chip">clients</span><span class="chip">agencies</span><span class="chip">directors</span><span class="chip">preferences</span></div>
      </div>
      <div class="mcard">
        <span class="tag">Locations</span>
        <h3>Location library</h3>
        <p>Every available shoot location in one searchable catalogue. Each location is tagged by its features, so a producer can filter to an exact brief in seconds instead of scrolling through a folder of photos.</p>
        <div class="chips"><span class="chip">tag-based search</span><span class="chip">features</span><span class="chip">availability</span></div>
      </div>
      <div class="mcard">
        <span class="tag">Talent</span>
        <h3>Talent management</h3>
        <p>A database of talent that casting draws from directly. Profiles are tagged across attributes — including features and ethnicity — so a casting brief becomes a filter, not a manual search.</p>
        <div class="chips"><span class="chip">tag-based search</span><span class="chip">ethnicity</span><span class="chip">attributes</span></div>
      </div>
    </div>
  </div>
</section>

<!-- BUILD / BUDGET CONTROL -->
<section class="build reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>Budget control</div>
    <h2 class="sec">Control within a project — and across the whole slate.</h2>
    <div class="bgrid">
      <div class="ledger" role="img" aria-label="Illustrative budget vs actual ledger showing line items with positive and negative variances">
        <div class="lhead"><span>Budget line</span><span class="num-r">Est.</span><span class="num-r">Actual</span><span class="num-r">Δ</span></div>
        <div class="lrow"><span class="lbl">Camera dept.</span><span class="num-r">12,000</span><span class="num-r">11,400</span><span class="delta pos">−5%</span></div>
        <div class="lrow"><span class="lbl">Talent</span><span class="num-r">28,000</span><span class="num-r">29,900</span><span class="delta neg">+7%</span></div>
        <div class="lrow"><span class="lbl">Location</span><span class="num-r">9,500</span><span class="num-r">9,500</span><span class="delta pos">0%</span></div>
        <div class="lrow"><span class="lbl">Post / VFX</span><span class="num-r">16,000</span><span class="num-r">18,200</span><span class="delta neg">+14%</span></div>
      </div>
      <div class="prose">
        <p>Estimates, contracts, POs, and actuals all bind to the same budget lines, so variance is computed live — and the same records generate the closure document at wrap.</p>
      </div>
    </div>
    <div class="scards">
      <div class="scard">
        <span class="tag">Buy vs. rent</span>
        <h3>Capital decisions from the data</h3>
        <p>Rental spend per equipment item accrues across projects; when it crosses the cost of owning, the buy-vs-rent crossover surfaces on its own.</p>
      </div>
      <div class="scard">
        <span class="tag">Vendor leverage</span>
        <h3>Negotiate from real numbers</h3>
        <p>Spend per vendor rolls up across the slate, so the suppliers earning the most business surface on their own — leverage for the next rate negotiation.</p>
      </div>
    </div>
  </div>
</section>

<!-- THE WRAP / RESULTS -->
<section class="wrapsec reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>Dailies — the outcome</div>
    <h2 class="sec">One source of truth, from first estimate to final wrap.</h2>
    <div class="stats">
      <div class="stat"><div class="fig">55%</div><div class="cap">less time assembling budget-vs-actual reporting</div></div>
      <div class="stat"><div class="fig">4&ndash;5 <span style="font-size:.5em;font-weight:600;letter-spacing:0">days</span></div><div class="cap">faster to a completed project closure document</div></div>
      <div class="stat"><div class="fig">100%</div><div class="cap">of purchase orders tied to a budget line</div></div>
      <div class="stat"><div class="fig">100%</div><div class="cap">of concurrent productions run from a single system</div></div>
    </div>
    <p class="note">// Measured across live productions after rollout.</p>
  </div>
</section>

<!-- CLOSE -->
<section class="close reveal">
  <div class="wrap">
    <div class="sec-eyebrow"><span class="clap" aria-hidden="true"></span>The takeaway</div>
    <h2 class="sec">Built around how productions actually work.</h2>
    <p>Rather than bending a generic ERP to fit film, the system was designed along the production lifecycle a studio already lives by — estimate, greenlight, crew, commit, control, wrap — with the CRM, location, and talent libraries feeding every project underneath. The closure document, once a week of chasing, became the natural end of a process that was tracking itself the whole time.</p>
  </div>
</section>

<div class="filmstrip" aria-hidden="true">
  <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
</div>





</div>

<script nonce="{{ csp_nonce() }}">
document.addEventListener('DOMContentLoaded', function() {
    // Simple scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    reveals.forEach(r => observer.observe(r));
});
</script>
@endsection