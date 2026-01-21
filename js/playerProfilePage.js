/**
 * GENERARE DINAMICĂ A PROFILURILOR DE JUCĂTORI
 * 
 * Acest script generează dinamic conținutul pentru paginile individuale ale jucătorilor
 * Folosește datele din playerData.js pentru a popula template-ul HTML
 * Detectează automat jucătorul curent bazat pe data-player-slug din body
 * 
 * Funcționalități:
 * - Identificare jucător curent după URL slug
 * - Generare HTML dinamic pentru profil
 * - Afișare statistici, biografie și imagini
 * - Layout special pentru anumiți jucători (ex: Gerard Martin)
 * - Tratare erori pentru jucători negăsiți
 */

document.addEventListener('DOMContentLoaded', () => {
  // Preluăm datele jucătorilor din window.playerData (încărcat din playerData.js)
  const data = Array.isArray(window.playerData) ? window.playerData : [];
  
  // Identificăm slug-ul jucătorului curent din data attribute-ul body-ului
  const slug =
    document.body && document.body.dataset
      ? document.body.dataset.playerSlug
      : '';
  
  // Căutăm jucătorul în array-ul de date după slug
  const player =
    slug && data.length ? data.find((p) => p.slug === slug) : undefined;
  
  // Găsim container-ul unde vom injecta conținutul profilului
  const root = document.getElementById('playerProfileRoot');

  // Verificăm dacă există container-ul
  if (!root) return;

  // Tratăm cazul în care jucătorul nu este găsit în date
  if (!player) {
    root.innerHTML =
      '<p class="text-danger">Player information is unavailable right now.</p>';
    return;
  }

  // LAYOUT SPECIAL - Gerard Martin are layout diferit (imagine mai mare)
  const isGerardMartin = player.slug === 'gerard-martin';
  const imageCol = isGerardMartin ? 'col-lg-7' : 'col-lg-5';
  const contentCol = isGerardMartin ? 'col-lg-5' : 'col-lg-7';
  
  // GENERARE HTML DINAMIC - Creăm template-ul pentru profilul jucătorului
  root.innerHTML = `
    <div class="container py-6">
      <div class="row g-5 align-items-start">
        <!-- COLOANA IMAGINE - Afișăm imaginea jucătorului -->
        <div class="${imageCol}">
          <img src="${player.image}" alt="${player.name}" class="img-fluid rounded shadow${isGerardMartin ? ' w-100' : ''}">
        </div>
        
        <!-- COLOANA CONȚINUT - Informații detaliate despre jucător -->
        <div class="${contentCol}">
          <!-- POZIȚIE ȘI NUMĂR - Informații de bază despre jucător -->
          <p class="text-uppercase text-primary fw-semibold mb-2">${player.position}${player.number ? ` • #${player.number}` : ''}</p>
          <h1 class="fw-bold mb-3">${player.name}</h1>
          
          <!-- STATISTICI ȘI MECIURI - Badge-uri cu informații numerice -->
          ${player.matches !== null && player.matches !== undefined ? `
          <div class="mb-4">
            <span class="badge bg-secondary me-2 mb-2">Matches: ${player.matches}</span>
            ${player.stats && player.stats.length > 0
              ? player.stats
                  .map(
                    (stat) =>
                      `<span class="badge bg-primary me-2 mb-2">${stat.label}: ${stat.value}</span>`
                  )
                  .join('')
              : ''}
          </div>
          ` : ''}
          
          <!-- DESCRIERE SCURTĂ -->
          <p class="lead mb-3">${player.detail}</p>
          
          <!-- BIOGRAFIE COMPLETĂ - Paragrafe detaliate -->
          <div class="bio-content">
            ${Array.isArray(player.bio) 
              ? player.bio.map(paragraph => `<p class="mb-3">${paragraph}</p>`).join('')
              : player.bio.split(/\n\n+/).map(paragraph => `<p class="mb-3">${paragraph.trim()}</p>`).join('')
            }
          </div>
          <div class="mt-4">
            <a href="../team.html" class="btn btn-primary me-2">Back to team</a>
            <a href="../player-bios.html#${player.id}" class="btn btn-outline-light">See all bios</a>
          </div>
        </div>
      </div>
    </div>`;
});

