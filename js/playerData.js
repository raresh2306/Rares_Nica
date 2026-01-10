 (function (root, factory) {
   if (typeof module === 'object' && module.exports) {
     module.exports = factory();
   } else {
     root.playerData = factory();
   }
 })(typeof self !== 'undefined' ? self : this, function () {
   return [
     {
       id: 'bio-marc-andre-ter-stegen',
       slug: 'marc-andre-ter-stegen',
       name: 'Marc-André ter Stegen',
       position: 'Goalkeeper',
       number: 1,
       matches: 422,
       stats: [
         { label: 'Clean sheets', value: 174 },
         { label: 'Total saves', value: 986 },
       ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/1b765077-cfc5-4e66-8169-4e45f6ec7392/01-Ter_Stegen.jpg?width=940&height=940',
       detail:
         'A keeper with great reflexes and also excellent with the ball at his feet.',
       bio: "The German international has been Barca's safety net since 2014. Ter Stegen blends old-school shot-stopping with progressive build-up play, often acting as the first playmaker in possession.",
     },
     {
       id: 'bio-joan-garcia',
       slug: 'joan-garcia',
       name: 'Joan Garcia',
       position: 'Goalkeeper',
       number: 13,
       matches: 7,
       stats: [
         { label: 'Clean sheets', value: 3 },
         { label: 'Total saves', value: 19 },
       ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/2b12f57a-582e-408a-b23e-ec9c42b0d5b9/01-Joan_Garcia.jpg?width=940&height=940',
       detail: 'Academy graduate learning behind seasoned internationals.',
       bio: "Garcia's rapid reactions and calm distribution earned him a first-team role. Coaches trust him to maintain Barça's style whenever he steps in.",
     },
     {
       id: 'bio-szczesny',
       slug: 'szczesny',
       name: 'Szczesny',
       position: 'Goalkeeper',
       number: 25,
       matches: 110,
       stats: [
         { label: 'Clean sheets', value: 8 },
         { label: 'Total saves', value: 12 },
       ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/01ac5137-9725-4e97-858e-711344d43fb5/25-Szczesny.jpg?width=940&height=940',
       detail: 'Experienced international goalkeeper.',
       bio: 'Known for his commanding presence, Szczesny brings leadership and communication to organize defenders in front of him.',
     },
    {
      id: 'bio-alejandro-balde',
      slug: 'alejandro-balde',
      name: 'Alejandro Balde',
      position: 'Defender',
      number: 3,
      matches: 148,
      stats: [
        { label: 'Goals', value: 3 },
        { label: 'Assists', value: 18 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/82dfc9f5-ffc4-4b47-a828-21de924f9b5f/03-Balde.jpg?width=940&height=940',
       detail: 'Explosive full-back with pace and attacking drive.',
       bio: 'Balde stretches defenses with his powerful runs. A La Masia product, he mirrors the modern Barca full-back profile - brave, technical, and relentless.',
     },
    {
      id: 'bio-ronald-araujo',
      slug: 'ronald-araujo',
      name: 'Ronald Araújo',
      position: 'Defender',
      number: 4,
      matches: 190,
      stats: [
        { label: 'Goals', value: 12 },
        { label: 'Assists', value: 7 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/46af26e5-df57-406a-9bb1-b6f037631f0f/04-Araujo.jpg?width=940&height=940',
       detail:
         'Uruguayan center-back known for his physicality, aerial prowess, and leadership qualities.',
       bio: 'Araújo is the emotional heartbeat of the backline. His recovery pace allows the team to defend high, while his aerial duels bring assurance in both boxes.',
     },
    {
      id: 'bio-pau-cubarsi',
      slug: 'pau-cubarsi',
      name: 'Pau Cubarsí',
      position: 'Defender',
      number: 5,
      matches: 103,
      stats: [
        { label: 'Goals', value: 1 },
        { label: 'Assists', value: 5 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/2ca1e448-3d31-4ff2-9909-44fd00368472/02-Cubarsi.jpg?width=940&height=940',
       detail: 'Elegant young centre-back with superb reading of the game.',
       bio: "Cubarsí impressed everyone with his composure beyond his years. His line-breaking passes embody the club's DNA.",
     },
    {
      id: 'bio-andreas-christensen',
      slug: 'andreas-christensen',
      name: 'Andreas Christensen',
      position: 'Defender',
      number: 15,
      matches: 97,
      stats: [
        { label: 'Goals', value: 5 },
        { label: 'Assists', value: 3 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/11a6228b-5034-4d25-9fe3-ea3aafd04dd2/15-Christensen.jpg?width=940&height=940',
       detail: 'Composed centre-back with strong positioning.',
       bio: 'The Dane brings tactical intelligence and calm ball progression, helping Barca control tempo from deep.',
     },
    {
      id: 'bio-gerard-martin',
      slug: 'gerard-martin',
      name: 'Gerard Martín',
      position: 'Defender',
      number: 18,
      matches: 67,
      stats: [
        { label: 'Goals', value: 1 },
        { label: 'Assists', value: 6 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/6fd05ccb-8562-4ffd-9cc8-2d36762a3634/18-Martin.jpg?width=940&height=940',
       detail: 'Versatile defender.',
       bio: 'Martín can slot across the backline, giving coaches flexibility. His mentality fits perfectly with the Barca style of controlled aggression.',
     },
    {
      id: 'bio-jules-kounde',
      slug: 'jules-kounde',
      name: 'Jules Koundé',
      position: 'Defender',
      number: 23,
      matches: 167,
      stats: [
        { label: 'Goals', value: 10 },
        { label: 'Assists', value: 20 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/e25e8ccc-4b69-48ef-8c48-2eebbcc74770/23-Kounde.jpg?width=940&height=940',
       detail: 'Powerful defender comfortable at CB and RB.',
       bio: "Koundé's athleticism allows him to lock down elite forwards, while his technique keeps the build-up crisp on the right flank.",
     },
    {
      id: 'bio-eric-garcia',
      slug: 'eric-garcia',
      name: 'Eric García',
      position: 'Defender',
      number: 24,
      matches: 140,
      stats: [
        { label: 'Goals', value: 7 },
        { label: 'Assists', value: 6 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/ab15b5c3-c764-40f7-983c-0fbd0ccd61bd/24-Eric_Garcia.jpg?width=940&height=940',
       detail: 'Ball-playing centre-back.',
       bio: 'Another La Masia product back at Camp Nou, Eric provides leadership and tactical clarity, excelling in possession phases.',
     },
    {
      id: 'bio-gavi',
      slug: 'gavi',
      name: 'Gavi',
      position: 'Midfielder',
      number: 6,
      matches: 155,
      stats: [
        { label: 'Goals', value: 10 },
        { label: 'Assists', value: 14 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/21356702-1d94-49a8-a94a-4170afe7ca16/06-Gavi.jpg?width=940&height=940',
       detail:
         'Young Spanish talent known for his energy, creativity, and fearless approach to the game.',
       bio: "Gavi plays with fire and finesse. He reintroduces the bite that Barca's midfield thrives on, pressing relentlessly and threading ambitious passes.",
     },
    {
      id: 'bio-pedri',
      slug: 'pedri',
      name: 'Pedri',
      position: 'Midfielder',
      number: 8,
      matches: 223,
      stats: [
        { label: 'Goals', value: 28 },
        { label: 'Assists', value: 27 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/10/597a1e13-c0b2-4c93-a2fd-4cc39a9459cc/08-Pedri.jpg?width=940&height=940',
       detail:
         'Spanish midfielder with exceptional vision and passing ability. A rising star in the Barcelona midfield.',
       bio: 'Nicknamed the "Canary Iniesta", Pedri dictates rhythm with velvet touches and perfectly weighted through balls.',
     },
    {
      id: 'bio-fermin-lopez',
      slug: 'fermin-lopez',
      name: 'Fermín López',
      position: 'Midfielder',
      number: 16,
      matches: 107,
      stats: [
        { label: 'Goals', value: 27 },
        { label: 'Assists', value: 17 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/4e851606-cfd6-4dc4-9042-c3dee40dbeb7/16-Fermin.jpg?width=940&height=940',
       detail: 'Dynamic midfielder with an eye for goal.',
       bio: 'López injects verticality, often crashing the box to finish sweeping team moves.',
     },
    {
      id: 'bio-marc-casado',
      slug: 'marc-casado',
      name: 'Marc Casadó',
      position: 'Midfielder',
      number: 17,
      matches: 59,
      stats: [
        { label: 'Goals', value: 1 },
        { label: 'Assists', value: 7 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/aee1292c-f40e-46e9-8b45-c19646ad3a04/17-Casado.jpg?width=940&height=940',
       detail: 'Energetic midfielder.',
       bio: 'Casadó reads danger early and sets the tone with pressing triggers, a natural pivot for the future.',
     },
    {
      id: 'bio-dani-olmo',
      slug: 'dani-olmo',
      name: 'Dani Olmo',
      position: 'Midfielder',
      number: 20,
      matches: 58,
      stats: [
        { label: 'Goals', value: 17 },
        { label: 'Assists', value: 8 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/79af1dbc-34f3-4bb7-9ee4-08269866ab47/20-Olmo.jpg?width=940&height=940',
       detail: 'Creative attacking midfielder.',
       bio: 'Olmo is a line-breaking dribbler who thrives between the lines, capable of both assisting and finishing.',
     },
    {
      id: 'bio-frenkie-de-jong',
      slug: 'frenkie-de-jong',
      name: 'Frenkie de Jong',
      position: 'Midfielder',
      number: 21,
      matches: 280,
      stats: [
        { label: 'Goals', value: 19 },
        { label: 'Assists', value: 25 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/793001b1-f225-4259-8a74-27e418a3e4c9/21-De_Jong.jpg?width=940&height=940',
       detail:
         'His versatility, energy and great vision have allowed him to continue developing his skills in any midfield position.',
       bio: 'Frenkie glides past pressure and dictates tempo, seamlessly transitioning between holding midfield and driving runs.',
     },
    {
      id: 'bio-marc-bernal',
      slug: 'marc-bernal',
      name: 'Marc Bernal',
      position: 'Midfielder',
      number: 22,
      matches: 14,
      stats: [
        { label: 'Goals', value: 0 },
        { label: 'Assists', value: 1 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/d19a70cc-af3f-4ea0-b0d8-5ef0d098211a/22-Bernal.jpg?width=940&height=940',
       detail: 'Promising midfielder.',
       bio: 'Bernal combines defensive work rate with crisp passing, embodying the newest wave of La Masia talent.',
     },
    {
      id: 'bio-ferran-torres',
      slug: 'ferran-torres',
      name: 'Ferran Torres',
      position: 'Forward',
      number: 7,
      matches: 181,
      stats: [
        { label: 'Goals', value: 58 },
        { label: 'Assists', value: 20 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/c83c3cf6-9c12-41c4-b6fa-ea4cfa2bf7dc/07-Ferran_Torres.jpg?width=940&height=940',
       detail: 'Versatile forward.',
       bio: "Torres' intelligent movement helps stretch defenses, opening channels for fellow attackers.",
     },
    {
      id: 'bio-robert-lewandowski',
      slug: 'robert-lewandowski',
      name: 'Robert Lewandowski',
      position: 'Striker',
      number: 9,
      matches: 166,
      stats: [
        { label: 'Goals', value: 110 },
        { label: 'Assists', value: 21 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/10/6dd5aa47-d5fb-45a5-b171-0da82c9c7105/09-Lewandowski.jpg?width=940&height=940',
       detail:
         "Polish international and one of the world's most prolific strikers. Known for his clinical finishing and aerial ability.",
       bio: 'Lewandowski provides world-class finishing and seasoned leadership, raising the standards of the attacking unit.',
     },
    {
      id: 'bio-lamine-yamal',
      slug: 'lamine-yamal',
      name: 'Lamine Yamal',
      position: 'Forward',
      number: 10,
      matches: 128,
      stats: [
        { label: 'Goals', value: 33 },
        { label: 'Assists', value: 38 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/a9ecee2c-116c-405c-8524-3127913e7a3c/10-Lamine.jpg?width=940&height=940',
       detail: 'Brilliant young winger.',
       bio: 'A generational talent, Yamal dazzles with fearless dribbling and a cultured left foot.',
     },
    {
      id: 'bio-raphinha',
      slug: 'raphinha',
      name: 'Raphinha',
      position: 'Forward',
      number: 11,
      matches: 160,
      stats: [
        { label: 'Goals', value: 63 },
        { label: 'Assists', value: 49 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/10/08bbb1ff-004b-4623-a675-66fd1fbfdc8b/11-Raphinha.jpg?width=940&height=940',
       detail: 'Right winger with flair.',
       bio: 'Raphinha combines flair with work rate, constantly attacking full-backs and tracking back to press.',
     },
    {
      id: 'bio-marcus-rashford',
      slug: 'marcus-rashford',
      name: 'Marcus Rashford',
      position: 'Forward',
      number: 14,
      matches: 26,
      stats: [
        { label: 'Goals', value: 7 },
        { label: 'Assists', value: 8 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/10/85f7a271-6b29-4459-be8b-128cb25596d0/14-Rashford.jpg?width=940&height=940',
       detail: 'Pace and finishing.',
       bio: 'Rashford adds raw pace on the break and a powerful shot, forcing defenses to stay honest in transition.',
     },
    {
      id: 'bio-roony-bardghji',
      slug: 'roony-bardghji',
      name: 'Roony Bardghji',
      position: 'Forward',
      number: 28,
      matches: 14,
      stats: [
        { label: 'Goals', value: 2 },
        { label: 'Assists', value: 4 },
      ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/3ae86d91-e8c5-415e-9299-3b26ec0d2930/28-Bardghji.jpg?width=940&height=940',
       detail: 'Exciting winger.',
       bio: 'Bardghji is relentless when 1v1, always looking to create separation and deliver decisive passes or shots.',
     },
   ];
 });

