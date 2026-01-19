const fs = require('fs');

// Use node-fetch for Node.js compatibility (or built-in fetch in Node 18+)
let fetch;
if (typeof globalThis.fetch !== 'undefined') {
    // Use built-in fetch (Node 18+)
    fetch = globalThis.fetch;
} else {
    // Fallback to node-fetch
    try {
        fetch = require('node-fetch');
    } catch (e) {
        console.error('Fetch not available. Please install node-fetch:');
        console.error('  npm install node-fetch');
        process.exit(1);
    }
}

// --- CONFIGURATION ---
const API_TOKEN = 'b561a4a6f36944a4acb7938bc08017b1'; // <--- PASTE YOUR KEY HERE
const TEAM_ID = 81; // FC Barcelona
// Update the PHP page directly
const FILE_PATH = 'matches.php';
const FINISHED_URL = `https://api.football-data.org/v4/teams/${TEAM_ID}/matches?status=FINISHED&limit=10`;
const UPCOMING_URL = `https://api.football-data.org/v4/teams/${TEAM_ID}/matches?status=SCHEDULED&limit=10`;

// --- TEMPLATE FUNCTION FOR RECENT RESULTS ---
function createMatchCard(match) {
    return `
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img src="${match.barcaImg}" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">FC Barcelona</h6>
                  </div>
                  <div class="col-4 text-center">
                    <h4 class="text-${match.color} mb-0">${match.homeScore}-${match.awayScore}</h4>
                    <small class="text-muted">${match.resultText}</small>
                  </div>
                  <div class="col-4 text-center">
                    <img src="${match.opponentImg}" alt="${match.opponent}" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">${match.opponent}</h6>
                  </div>
                </div>
                <hr>
                <div class="text-center">
                  <p class="mb-1"><strong>${match.competition}</strong></p>
                  <p class="mb-0">${match.date}</p>
                </div>
              </div>
            </div>
          </div>`;
}

// --- TEMPLATE FUNCTION FOR UPCOMING MATCHES ---
function createUpcomingMatchCard(match) {
    return `
              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="${match.barcaImg}" alt="FC Barcelona" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">FC Barcelona</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h5 class="text-primary">vs</h5>
                        <p class="mb-1"><strong>${match.opponent}</strong></p>
                        <small class="text-muted">${match.competition}</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="${match.opponentImg}" alt="${match.opponent}" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">${match.opponent}</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>${match.competition}</strong></p>
                      <p class="mb-1">${match.date}</p>
                      <p class="mb-1">${match.time}</p>
                      <p class="mb-0">${match.venue}</p>
                      <a href="#" class="btn btn-primary btn-sm mt-2">Buy Tickets</a>
                    </div>
                  </div>
                </div>
              </div>`;
}

async function updateMatches() {
    console.log("Fetching data from API...");

    try {
        // Fetch both finished and upcoming matches
        const [finishedResponse, upcomingResponse] = await Promise.all([
            fetch(FINISHED_URL, {
                headers: { 'X-Auth-Token': API_TOKEN }
            }),
            fetch(UPCOMING_URL, {
                headers: { 'X-Auth-Token': API_TOKEN }
            })
        ]);

        if (!finishedResponse.ok) {
            throw new Error(`API Error (Finished): ${finishedResponse.status} ${finishedResponse.statusText}`);
        }

        if (!upcomingResponse.ok) {
            throw new Error(`API Error (Upcoming): ${upcomingResponse.status} ${upcomingResponse.statusText}`);
        }

        const finishedData = await finishedResponse.json();
        const upcomingData = await upcomingResponse.json();

        // Process finished matches (recent results)
        const latestMatches = finishedData.matches
            .sort((a, b) => new Date(b.utcDate) - new Date(a.utcDate)) // Sort newest first
            .slice(0, 3); // Take top 3

        let recentResultsHtml = "";

        latestMatches.forEach(match => {
            const isHome = match.homeTeam.id === TEAM_ID;
            
            // Determine Opponent and their crest
            const opponent = isHome ? match.awayTeam.name : match.homeTeam.name;
            const opponentImg = isHome ? match.awayTeam.crest : match.homeTeam.crest;
            
            // Get FC Barcelona crest from API
            const barcaImg = isHome ? match.homeTeam.crest : match.awayTeam.crest;
            
            // Determine Scores
            const homeScore = match.score.fullTime.home;
            const awayScore = match.score.fullTime.away;
            const barcaScore = isHome ? homeScore : awayScore;
            const oppScore = isHome ? awayScore : homeScore;

            // Determine Result
            let resultText = "Draw";
            let color = "warning"; // Yellow

            if (barcaScore > oppScore) {
                resultText = "Won";
                color = "success"; // Green
            } else if (barcaScore < oppScore) {
                resultText = "Lost";
                color = "danger"; // Red
            }

            // Format Date
            const dateObj = new Date(match.utcDate);
            const dateStr = dateObj.toLocaleDateString('en-US', {
                year: 'numeric', month: 'long', day: 'numeric'
            });

            // Add to HTML string
            recentResultsHtml += createMatchCard({
                homeScore: barcaScore, 
                awayScore: oppScore, 
                barcaImg,
                opponent, 
                opponentImg, 
                resultText, 
                color,
                competition: match.competition.name,
                date: dateStr
            });
        });

        // Process upcoming matches
        const upcomingMatches = upcomingData.matches
            .sort((a, b) => new Date(a.utcDate) - new Date(b.utcDate)) // Sort oldest first (next match first)
            .slice(0, 2); // Take top 2

        let upcomingMatchesHtml = "";

        upcomingMatches.forEach(match => {
            const isHome = match.homeTeam.id === TEAM_ID;
            
            // Determine Opponent and their crest
            const opponent = isHome ? match.awayTeam.name : match.homeTeam.name;
            const opponentImg = isHome ? match.awayTeam.crest : match.homeTeam.crest;
            
            // Get FC Barcelona crest from API
            const barcaImg = isHome ? match.homeTeam.crest : match.awayTeam.crest;
            
            // Format Date and Time
            const dateObj = new Date(match.utcDate);
            const dateStr = dateObj.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric', 
                month: 'long', 
                day: 'numeric'
            });
            
            const timeStr = dateObj.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                timeZoneName: 'short'
            });

            // Get venue (if available)
            const venue = match.venue || (isHome ? 'Camp Nou, Barcelona' : 'Away');

            // Add to HTML string
            upcomingMatchesHtml += createUpcomingMatchCard({
                barcaImg,
                opponent, 
                opponentImg,
                competition: match.competition.name,
                date: dateStr,
                time: timeStr,
                venue: venue
            });
        });

        // --- WRITE TO FILE ---
        let fileContent = fs.readFileSync(FILE_PATH, 'utf8');
        
        // Update Recent Results section
        const recentStartMarker = '<!-- AUTO-GENERATED MATCHES START -->';
        const recentEndMarker = '<!-- AUTO-GENERATED MATCHES END -->';

        if (fileContent.includes(recentStartMarker) && fileContent.includes(recentEndMarker)) {
            const startIndex = fileContent.indexOf(recentStartMarker);
            const endIndex = fileContent.indexOf(recentEndMarker);
            
            if (startIndex !== -1 && endIndex !== -1 && startIndex < endIndex) {
                const before = fileContent.substring(0, startIndex + recentStartMarker.length);
                const after = fileContent.substring(endIndex);
                fileContent = `${before}\n${recentResultsHtml}\n              ${after}`;
            }
        }

        // Update Upcoming Matches section
        const upcomingStartMarker = '<!-- AUTO-GENERATED UPCOMING MATCHES START -->';
        const upcomingEndMarker = '<!-- AUTO-GENERATED UPCOMING MATCHES END -->';

        if (fileContent.includes(upcomingStartMarker) && fileContent.includes(upcomingEndMarker)) {
            const startIndex = fileContent.indexOf(upcomingStartMarker);
            const endIndex = fileContent.indexOf(upcomingEndMarker);
            
            if (startIndex !== -1 && endIndex !== -1 && startIndex < endIndex) {
                const before = fileContent.substring(0, startIndex + upcomingStartMarker.length);
                const after = fileContent.substring(endIndex);
                fileContent = `${before}\n${upcomingMatchesHtml}\n              ${after}`;
            }
        }

        fs.writeFileSync(FILE_PATH, fileContent, 'utf8');
        console.log("Success! matches.php has been updated with:");
        console.log(`  - ${latestMatches.length} recent results`);
        console.log(`  - ${upcomingMatches.length} upcoming matches`);

    } catch (error) {
        console.error("Error updating matches:", error);
    }
}

updateMatches();