<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9">

  <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"
              doctype-system="about:legacy-compat"/>

  <xsl:template match="/">
    <html lang="en">
      <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="noindex,follow"/>
        <title>Sitemap Index — FairIT Solutions</title>
        <link rel="icon" type="image/svg+xml" href="/images/favicon.svg"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"/>
        <style>
          *,*::before,*::after{box-sizing:border-box}
          html,body{margin:0;padding:0}
          body{font-family:'Inter',system-ui,-apple-system,sans-serif;color:#495057;background:#f8f9fa;line-height:1.55}
          .hero{background:#0d0f12;color:#fff;padding:56px 24px 48px}
          .container{max-width:1120px;margin:0 auto;padding:0 24px}
          .brand{display:flex;align-items:center;gap:12px;margin-bottom:32px}
          .brand svg{width:36px;height:36px}
          .brand-name{font-weight:700;font-size:16px;color:#fff}
          .brand-sub{font-size:10px;letter-spacing:1.5px;color:#adb5bd;text-transform:uppercase;margin-top:2px}
          h1{font-size:clamp(28px,4vw,42px);font-weight:800;margin:0 0 12px;letter-spacing:-0.02em;color:#fff}
          .subtitle{font-size:16px;color:#adb5bd;max-width:640px;margin:0}
          main{padding:40px 24px 80px}
          .card{background:#fff;border:1px solid #e9ecef;border-radius:16px;padding:8px;overflow:hidden}
          .table-wrap{overflow-x:auto;border-radius:10px}
          table{width:100%;border-collapse:collapse;font-size:14px}
          thead th{text-align:left;padding:12px 16px;font-size:11px;font-weight:600;color:#6c757d;text-transform:uppercase;letter-spacing:1px;border-bottom:1px solid #e9ecef;background:#f8f9fa}
          tbody td{padding:16px;border-bottom:1px solid #f1f3f5}
          tbody tr:last-child td{border-bottom:none}
          tbody tr:hover{background:#f8f9fa}
          a{color:#2563eb;text-decoration:none;font-weight:500}
          a:hover{text-decoration:underline}
          .meta{color:#6c757d;font-size:12px}
          .footer{margin-top:48px;padding:24px 0;font-size:13px;color:#6c757d;border-top:1px solid #e9ecef;text-align:center}
          .footer a{color:#495057}
          @media (max-width:640px){.hero{padding:40px 16px 32px}main{padding:24px 16px 64px}thead th,tbody td{padding:12px}}
        </style>
      </head>
      <body>
        <header class="hero">
          <div class="container">
            <div class="brand">
              <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <g fill="none" stroke-linecap="round" stroke-width="2.6">
                  <ellipse cx="46" cy="52" rx="37" ry="34" stroke="#FFFFFF" transform="rotate(-40 46 52)"/>
                  <ellipse cx="53" cy="49" rx="36" ry="35" stroke="#FFFFFF" transform="rotate(-8 53 49)"/>
                  <ellipse cx="51" cy="53" rx="35" ry="36" stroke="#FFFFFF" transform="rotate(28 51 53)"/>
                  <ellipse cx="49" cy="47" rx="38" ry="33" stroke="#FFFFFF" transform="rotate(52 49 47)"/>
                  <ellipse cx="54" cy="48" rx="38" ry="33" stroke="#9BC0DC" transform="rotate(-22 54 48)"/>
                  <ellipse cx="47" cy="53" rx="35" ry="35" stroke="#9BC0DC" transform="rotate(14 47 53)"/>
                </g>
              </svg>
              <div>
                <div class="brand-name">FairIT Solutions</div>
                <div class="brand-sub">AI Operating Systems</div>
              </div>
            </div>
            <h1>Sitemap Index</h1>
            <p class="subtitle">
              This index groups our child sitemaps. Follow any entry below to see the URLs it contains.
              Total child sitemaps:
              <strong style="color:#fff"><xsl:value-of select="count(sitemap:sitemapindex/sitemap:sitemap)"/></strong>.
            </p>
          </div>
        </header>

        <main>
          <div class="container">
            <div class="card">
              <div class="table-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>Sitemap</th>
                      <th>Last modified</th>
                    </tr>
                  </thead>
                  <tbody>
                    <xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
                      <tr>
                        <td><a href="{sitemap:loc}"><xsl:value-of select="sitemap:loc"/></a></td>
                        <td class="meta"><xsl:value-of select="substring(sitemap:lastmod,1,10)"/></td>
                      </tr>
                    </xsl:for-each>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="footer">
              Conforms to the
              <a href="https://www.sitemaps.org/protocol.html" target="_blank" rel="noopener">Sitemaps 0.9 protocol</a>.
              Search engines see the raw XML behind this view.
            </div>
          </div>
        </main>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
