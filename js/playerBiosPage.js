document.addEventListener('DOMContentLoaded', () => {
  const data = Array.isArray(window.playerData) ? window.playerData : [];
  const container = document.getElementById('biosContainer');

  if (!container || data.length === 0) return;

  const statList = (stats = []) =>
    stats
      .map(
        (stat) =>
          `<span class="badge bg-primary me-2 mb-2">${stat.label}: ${stat.value}</span>`
      )
      .join('');

  data.forEach((player) => {
    const section = document.createElement('section');
    section.id = player.id;
    section.className = 'bio-section border-bottom pb-5 mb-5';
    section.innerHTML = `
      <div class="row g-4 align-items-center">
        <div class="col-md-4">
          <img src="${player.image}" alt="${player.name}" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-8">
          <p class="text-uppercase text-primary fw-semibold mb-1">${player.position} • #${player.number}</p>
          <h2 class="fw-bold mb-3">${player.name}</h2>
          <div class="mb-3">
            <span class="badge bg-secondary me-2 mb-2">Matches: ${player.matches}</span>
            ${statList(player.stats)}
          </div>
          <p class="mb-2">${player.detail}</p>
          <p class="mb-3 text-muted">${player.bio}</p>
          <a class="btn btn-outline-light btn-sm" href="players/${player.slug}.html">View full bio</a>
        </div>
      </div>`;
    container.appendChild(section);
  });
});

