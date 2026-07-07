<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
  xmlns:xhtml="http://www.w3.org/1999/xhtml">

  <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"
              doctype-system="about:legacy-compat"/>

  <xsl:template match="/">
    <html lang="en">
      <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="noindex,follow"/>
        <title>Sitemap — FairIT Solutions</title>
        <link rel="icon" type="image/svg+xml" href="/images/favicon.svg"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"/>
        <style>
          *,*::before,*::after{box-sizing:border-box}
          html,body{margin:0;padding:0}
          body{
            font-family:'Inter',system-ui,-apple-system,'Segoe UI',sans-serif;
            color:#495057;background:#f8f9fa;line-height:1.55;
            -webkit-font-smoothing:antialiased;
          }
          .hero{
            background:#0d0f12;color:#fff;padding:56px 24px 48px;
            border-bottom:1px solid rgba(255,255,255,0.06);
          }
          .container{max-width:1120px;margin:0 auto;padding:0 24px}
          .brand{display:flex;align-items:center;gap:12px;margin-bottom:32px}
          .brand svg{width:36px;height:36px;flex-shrink:0}
          .brand-name{font-weight:700;font-size:16px;line-height:1.1;color:#fff}
          .brand-sub{font-size:10px;letter-spacing:1.5px;color:#adb5bd;text-transform:uppercase;margin-top:2px}
          h1{
            font-size:clamp(28px,4vw,42px);font-weight:800;margin:0 0 12px;
            letter-spacing:-0.02em;color:#fff;
          }
          .subtitle{
            font-size:16px;color:#adb5bd;max-width:640px;margin:0;
          }
          .stats{
            display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));
            gap:16px;margin-top:32px;
          }
          .stat{
            background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);
            border-radius:12px;padding:16px 20px;
          }
          .stat-num{font-size:24px;font-weight:800;color:#fff;line-height:1}
          .stat-label{font-size:11px;color:#adb5bd;letter-spacing:1px;text-transform:uppercase;margin-top:6px}
          main{padding:40px 24px 80px}
          .card{
            background:#fff;border:1px solid #e9ecef;border-radius:16px;
            padding:8px;margin-bottom:24px;overflow:hidden;
          }
          .table-wrap{overflow-x:auto;border-radius:10px}
          table{width:100%;border-collapse:collapse;font-size:14px}
          thead th{
            text-align:left;padding:12px 16px;font-size:11px;font-weight:600;
            color:#6c757d;text-transform:uppercase;letter-spacing:1px;
            border-bottom:1px solid #e9ecef;background:#f8f9fa;
          }
          tbody td{
            padding:14px 16px;border-bottom:1px solid #f1f3f5;vertical-align:top;
          }
          tbody tr:last-child td{border-bottom:none}
          tbody tr:hover{background:#f8f9fa}
          a{color:#2563eb;text-decoration:none;font-weight:500;word-break:break-all}
          a:hover{text-decoration:underline}
          .meta{color:#6c757d;font-size:12px;white-space:nowrap}
          .badge{
            display:inline-block;padding:2px 8px;border-radius:6px;
            font-size:11px;font-weight:600;background:#eff6ff;color:#2563eb;
          }
          .badge-neutral{background:#f1f3f5;color:#495057}
          .lang-chips{display:flex;flex-wrap:wrap;gap:4px}
          .lang-chip{
            font-size:10px;padding:2px 6px;border-radius:4px;
            background:#f1f3f5;color:#495057;font-weight:600;letter-spacing:0.5px;
            text-transform:uppercase;
          }
          .footer{
            margin-top:48px;padding:24px 0;font-size:13px;color:#6c757d;
            border-top:1px solid #e9ecef;text-align:center;
          }
          .footer a{color:#495057}
          @media (max-width:640px){
            .hero{padding:40px 16px 32px}
            main{padding:24px 16px 64px}
            thead th,tbody td{padding:10px 12px}
            .stat{padding:12px 16px}
          }
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
            <h1>XML Sitemap</h1>
            <p class="subtitle">
              This page lists every URL search engines can index on
              <a href="/" style="color:#93c5fd">fairitsolutions.in</a>. Human-readable view of the underlying
              <a href="/sitemap.xml" style="color:#93c5fd">/sitemap.xml</a>.
            </p>
            <div class="stats">
              <div class="stat">
                <div class="stat-num"><xsl:value-of select="count(sitemap:urlset/sitemap:url)"/></div>
                <div class="stat-label">URLs</div>
              </div>
              <div class="stat">
                <div class="stat-num"><xsl:value-of select="count(sitemap:urlset/sitemap:url/image:image)"/></div>
                <div class="stat-label">Images</div>
              </div>
              <div class="stat">
                <div class="stat-num">5</div>
                <div class="stat-label">Languages</div>
              </div>
            </div>
          </div>
        </header>

        <main>
          <div class="container">
            <div class="card">
              <div class="table-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>URL</th>
                      <th>Last modified</th>
                      <th>Frequency</th>
                      <th>Priority</th>
                      <th>Languages</th>
                    </tr>
                  </thead>
                  <tbody>
                    <xsl:for-each select="sitemap:urlset/sitemap:url">
                      <xsl:sort select="sitemap:priority" order="descending" data-type="number"/>
                      <tr>
                        <td>
                          <a href="{sitemap:loc}"><xsl:value-of select="sitemap:loc"/></a>
                        </td>
                        <td class="meta"><xsl:value-of select="substring(sitemap:lastmod,1,10)"/></td>
                        <td class="meta">
                          <xsl:choose>
                            <xsl:when test="sitemap:changefreq">
                              <span class="badge-neutral badge"><xsl:value-of select="sitemap:changefreq"/></span>
                            </xsl:when>
                            <xsl:otherwise><span class="meta">—</span></xsl:otherwise>
                          </xsl:choose>
                        </td>
                        <td class="meta">
                          <xsl:choose>
                            <xsl:when test="sitemap:priority">
                              <span class="badge"><xsl:value-of select="sitemap:priority"/></span>
                            </xsl:when>
                            <xsl:otherwise>—</xsl:otherwise>
                          </xsl:choose>
                        </td>
                        <td>
                          <div class="lang-chips">
                            <xsl:for-each select="xhtml:link[@rel='alternate' and @hreflang!='x-default']">
                              <span class="lang-chip"><xsl:value-of select="@hreflang"/></span>
                            </xsl:for-each>
                          </div>
                        </td>
                      </tr>
                    </xsl:for-each>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="footer">
              This sitemap conforms to the
              <a href="https://www.sitemaps.org/protocol.html" target="_blank" rel="noopener">Sitemaps 0.9 protocol</a>.
              Search engines and crawlers see the raw XML behind this styled view.
            </div>
          </div>
        </main>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
