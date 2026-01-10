document.addEventListener('DOMContentLoaded', () => {
  const data = Array.isArray(window.playerData) ? window.playerData : [];
  const slug =
    document.body && document.body.dataset
      ? document.body.dataset.playerSlug
      : '';
  const player =
    slug && data.length ? data.find((p) => p.slug === slug) : undefined;
  const root = document.getElementById('playerProfileRoot');

  if (!root) return;

  if (!player) {
    root.innerHTML =
      '<p class="text-danger">Player information is unavailable right now.</p>';
    return;
  }

  // Special layout for Gerard Martin - larger image
  const isGerardMartin = player.slug === 'gerard-martin';
  const imageCol = isGerardMartin ? 'col-lg-7' : 'col-lg-5';
  const contentCol = isGerardMartin ? 'col-lg-5' : 'col-lg-7';
  
  root.innerHTML = `
    <div class="container py-6">
      <div class="row g-5 align-items-start">
        <div class="${imageCol}">
          <img src="${player.image}" alt="${player.name}" class="img-fluid rounded shadow${isGerardMartin ? ' w-100' : ''}">
        </div>
        <div class="${contentCol}">
          <p class="text-uppercase text-primary fw-semibold mb-2">${player.position}${player.number ? ` • #${player.number}` : ''}</p>
          <h1 class="fw-bold mb-3">${player.name}</h1>
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
          <p class="lead mb-3">${player.detail}</p>
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

