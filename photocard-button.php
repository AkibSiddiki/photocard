<?php
/**
 * ─────────────────────────────────────────────────────────────────
 *  News Photo Card Button — embed anywhere inside details.php
 *  Opens the full photo card editor pre-filled with article data.
 *
 *  PHP vars used: $sHeadShow, $sImgShow, $sInsertDate,
 *                 $sSiteName, $sFavicon, $sSiteURL
 * ─────────────────────────────────────────────────────────────────
 */

$_pcDomain = parse_url($sSiteURL, PHP_URL_HOST);
$_pcDomain = preg_replace('/^www\./i', '', $_pcDomain);

// Extract just the date (e.g. from "২১:৩০, ২৪ মে ২০২৬" to "২৪ মে ২০২৬")
$_pcDateOnly = $sInsertDate;
if (strpos($_pcDateOnly, ', ') !== false) {
    $parts = explode(', ', $_pcDateOnly);
    $_pcDateOnly = trim(end($parts));
}

// Build query string — all values are URL-encoded
$_pcParams = http_build_query([
    'headline' => strip_tags($sHeadShow),
    'image'    => $sImgShow,
    'date'     => $_pcDateOnly,
    'source'   => strip_tags($sSiteName),
    'logo'     => 'https://www.narayanganjtimes.com/media/common/logo.png',
]);

// Path to the generator page (adjust if placed in a subfolder)
$_pcEditorUrl = $sSiteURL . 'photocard/news-card-generator?' . $_pcParams;
?>

<div style="margin:18px auto;text-align:center;">
  <a href="<?php echo htmlspecialchars($_pcEditorUrl); ?>"
     target="_blank"
     style="
       display:inline-flex;align-items:center;gap:8px;
       background:#e8000d;color:#fff;text-decoration:none;
       padding:11px 22px;border-radius:6px;font-size:15px;
       font-family:inherit;font-weight:600;
       box-shadow:0 2px 8px rgba(0,0,0,.25);
     ">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2.2"
         stroke-linecap="round" stroke-linejoin="round">
      <rect x="3" y="3" width="18" height="18" rx="2"/>
      <circle cx="12" cy="12" r="4"/>
      <line x1="16.5" y1="7.5" x2="16.51" y2="7.5"/>
    </svg>
    ফটো কার্ড
  </a>
</div>
