 /**
 * DATE STATICE PENTRU JUCĂTORI - STRUCTURĂ DE DATE DINAMICĂ
 * 
 * Acest fișier conține datele complete pentru toți jucătorii FC Barcelona
 * Folosit pentru a popula dinamic paginile de profil ale jucătorilor
 * Include informații personale, statistici, biografii și imagini
 * 
 * Structura datelor pentru fiecare jucător:
 * - id: Identificator unic pentru elemente DOM
 * - slug: URL slug pentru pagini individuale
 * - name: Numele complet al jucătorului
 * - position: Poziția în teren
 * - number: Numărul pe tricou
 * - matches: Număr total de meciuri jucate
 * - stats: Array de statistici cheie (label, value)
 * - image: URL către imaginea oficială
 * - detail: Descriere scurtă a jucătorului
 * - bio: Array cu biografia detaliată
 */

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
       bio: ["Marc-André ter Stegen signed for FC Barcelona in the summer of 2014 from Borussia Mönchengladbach. Born on 30 April 1992 in Mönchengladbach itself, the German did not take long to make his name as one Europe’s most promising young goalkeepers.",
        "His only previous club was Borussia Mönchengladbach, which he joined in 1996 at the age of just 4, and by the time he was 18 he had already made his first team debut on 10 April 2011 in the Bundesliga against FC Köln. Mönchengladbach won 5-1, and following a fine performance Ter Stegen was soon the regular first choice keeper, conceding just three goals in his first six outings.",
        "Ter Stegen made his official debut for the Club on 17 September 2014 in Champions League against APOEL Nicosia FC. The match ended with a Barça victory (1-0 ). Aged just 22 years he became the second German goalkeeper at FC Barcelona, following on from Robert Enke. In his debut season, 2014/15, the goalkeeper played every game in the Champions League and had a leading role in the Copa del Rey, both of which Barça won. In La Liga he was back up to Claudio Bravo in his first couple of seasons at the Club but with the departure of the Chilean, Ter Stegen became first choice also in the league in the 2016/17 season.",
        "In the 2024/25 season Ter Stegen became the Barça captain and under new coach Hansi Flick he started the campaign as number one between the posts. However, in September he suffered a serious knee injury that kept him out of action until April. In the domestic treble winning campaign he made 9 official appearances, keeping two clean sheets.",
        "International with Germany since the summer of 2017 Ter Stegen was key in his national side's victory in the Confederations Cup and the goalkeeper was named man of the match in the final against Chile. He was also part of the German squad in the 2018 and 2022 World Cups."
      ],
    },
     {
       id: 'bio-joan-garcia',
       slug: 'joan-garcia',
       name: 'Joan Garcia',
       position: 'Goalkeeper',
       number: 13,
       matches: 17,
       stats: [
         { label: 'Clean sheets', value: 8 },
         { label: 'Total saves', value: 47 },
       ],
       image:
         'https://www.fcbarcelona.com/photo-resources/2025/09/09/2b12f57a-582e-408a-b23e-ec9c42b0d5b9/01-Joan_Garcia.jpg?width=940&height=940',
      detail: 'A goalkeeper with tremendous reflexes who can also play with the ball at his feet',
      bio: [
        "Joan Garcia joined FC Barcelona in the summer of 2025, arriving with a reputation as one of La Liga's premier goalkeepers. A native of Sallent de Llobregat in Catalonia, Garcia initially played as an outfield player before following his older brother's example and putting on the gloves. His youth career took him from Sallent to Manresa and Damm, eventually leading to his signing with Espanyol at age 15.",
        "Although he debuted for Espanyol's first team in late 2021, his breakthrough came during the 2023/24 season, where he anchored the team's promotion back to the first division. In the subsequent La Liga campaign, he was instrumental in ensuring Espanyol's survival, leading the league with 146 saves and preventing more goals than any other keeper according to advanced metrics.",
        "Internationally, Garcia has represented Spain at various youth levels and claimed an Olympic gold medal at the Paris 2024 Games."
      ],
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
       detail: 'With an admirable career in goal for Arsenal, Roma, and Juventus, Szczęsny is a vastly experienced international goalkeeper',
       bio: [
         "Following a long-term injury to Marc-André ter Stegen, FC Barcelona secured the services of Wojciech Szczęsny until June 30, 2025, prompting the Polish goalkeeper to step out of retirement after a distinguished career that began when he left Warsaw at age 16 to join Arsenal.",
         "After establishing himself in the Premier League and winning two FA Cups, he enjoyed a successful stint in Italy with AS Roma and subsequently Juventus, where he served as Gianluigi Buffon's successor and claimed three Serie A titles between 2017 and 2024.",
         "Upon his arrival in Barcelona, Szczęsny made his debut in the Copa del Rey against Barbastro and quickly solidified his position in the starting lineup, ultimately making 30 official appearances and keeping 14 clean sheets to help the team secure a domestic treble.",
         "His distinguished international career includes representing Poland in two World Cups and four European Championships."
       ],
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
       detail: 'Skill and strength make Alejandro Balde a fast, explosive fullback who can also support the attack',
       bio: [
         "Born in Barcelona to Guinean and Dominican parents, Alejandro Balde is a dynamic and explosive fullback who joined FC Barcelona in 2011 at the age of eight following his early development at Espanyol.",
         "A member of the 2003 generation who consistently played above his age group, Balde secured league titles across numerous youth levels—ranging from U10 to U16—before rapidly ascending to the Barça Atlètic squad.",
         "He made his senior debut in the Champions League against Bayern Munich on September 14, 2021, replacing an injured Jordi Alba, and by the 2022/23 campaign, he had solidified his role as the starting left-back under Xavi Hernández, contributing to the club's La Liga and Spanish Super Cup victories.",
         "After officially joining the first-team roster in the summer of 2023, his subsequent season was curtailed by an injury against Athletic Club in January; however, he made a full recovery for the 2024/25 campaign, during which he tallied 47 official appearances, one goal, and eight assists, while also celebrating his 100th match for the club in December 2024.",
         "On the international stage, Balde made his debut for the Spanish national team at the 2022 World Cup in Qatar, featuring in four matches during the tournament."
       ]
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
         'Uruguayan defender, strong in the air and capable with the ball at his feet.',
       bio: [
         "Born on March 7, 1999, in Rivera, Uruguay, Ronald Araujo began his professional career with his hometown club before advancing through the ranks at Rentistas and gaining top-flight experience with Boston River.",
         "Recognizing his potential, FC Barcelona signed him to the B team on August 29, 2018, with a contract that included a substantial buyout clause set to double upon his promotion to the first team.",
         "He officially joined the senior squad for the 2020/21 season, winning the Copa del Rey, and by his third year had established himself as a defensive pillar, logging over 3,000 minutes, scoring four goals, and displaying versatility at right-back.",
         "Araujo was a cornerstone of the historic 2022/23 defense that conceded just 18 league goals en route to the La Liga title, and following a solid 2023/24 campaign, he overcame a significant injury sustained on international duty to return in January 2025, where he made 25 appearances and scored two goals to help secure a domestic treble.",
         "On the international stage, Araujo was selected for the 2021 Copa América and the 2022 World Cup—though injury prevented his participation in Qatar—and eventually made his Copa América debut in the summer of 2024."
       ],
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
       detail: 'A centre back who provides leadership and decisiveness in defence, while also being able to bring the ball out.',
       bio: [
         "Pau Cubarsí arrived at La Masia from Girona on July 1, 2018, as a U12 player, embarking on a development path that would see him become a defensive cornerstone characterized by his leadership and ball-playing ability.",
         "His breakthrough occurred during the 2023/24 season when, while still eligible for the U18 category, he competed for Barça Atlètic and made his competitive first-team debut at just 16 years old in a Copa del Rey match against Unionistas in January 2024.",
         "Following 24 official appearances in his debut campaign, Cubarsí became an undisputed fixture in the starting XI under Hansi Flick during the 2024/25 season, making 56 appearances and scoring his first goal against Atlético Madrid.",
         "His pivotal role contributed to a domestic treble—consisting of the Spanish Super Cup, Copa del Rey, and La Liga title—and earned him a contract extension until 2029.",
         "Internationally, his rapid ascent included participation in the U17 World Cup, a debut for the senior Spanish national team, and an Olympic gold medal at the Paris 2024 Games."
       ],
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
       detail: 'Centre back with brilliant passing skills and a tremendous reading of the game. Fabulous and finding the right route to get the ball forward.',
       bio: [
         "Born on April 10, 1996, in Lillerød, Denmark, Andreas Christensen is a versatile and tactically astute center-back who began his development at IF Skjold Birkerød and Brøndby IF before joining Chelsea's youth academy at the age of 15.",
         "He made his professional debut for the London club in October 2014, but it was a two-season loan spell at Borussia Mönchengladbach starting in 2015 that cemented his reputation as one of Europe's top defensive prospects, earning him Player of the Season honors in the Bundesliga.",
         "Upon returning to Chelsea in 2017, Christensen became a pivotal figure under Antonio Conte and contributed to the club's triumphs in the UEFA Champions League and the FIFA Club World Cup.",
         "Joining FC Barcelona for the 2022/23 campaign, he immediately established himself as a first-choice defender under Xavi Hernández, leveraging his ball-playing ability and defensive solidity to help secure the La Liga and Spanish Super Cup titles.",
         "Although he demonstrated adaptability by featuring in midfield during the 2023/24 season, his 2024/25 campaign was interrupted by an Achilles injury and subsequent muscular issues that sidelined him until April 2025, when he returned to bolster the squad during the decisive run-in to a domestic treble.",
         "On the international level, Christensen has earned over 50 caps for Denmark since his 2015 debut, representing his country at the 2018 World Cup and playing a key role in their run to the semi-finals of Euro 2020."
       ],
     },
    {
      id: 'bio-gerard-martin',
      slug: 'gerard-martin',
      name: 'Gerard Maldini',
      position: 'Defender',
      number: 18,
      matches: 67,
      stats: [
        { label: 'Goals', value: 1 },
        { label: 'Assists', value: 6 },
      ],
       image: '../images/maldini.jpg',
       detail: 'Versatile defender who can play at left back or centre back',
       bio: [
         "Gerard Maldini began his formative years at EF Performance and Sant Gabriel before moving to UE Cornellà at the U19 level, where he eventually earned promotion to the senior team for the 2021/22 season.",
         "A versatile defender primarily deployed as a left-back, his physical stature allows him to transition seamlessly into central defense when required.",
         "In the summer of 2023, Martín joined Barça Atlètic and quickly adapted to the Blaugrana style, setting the stage for a breakout 2024/25 campaign under head coach Hansi Flick.",
         "During that season, he established himself as a reliable presence in the first team, recording 28 league appearances and featuring in eight Champions League matches, a performance level that led to his official promotion to the senior squad for the 2025/26 season."
       ],
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
       detail: 'Jules Kounde is known for being a very fast defender, quick to intercept, and being good on the ball.',
       bio: [
         "Born in Paris on November 12, 1998, to a family of Beninese descent, Jules Kounde progressed from local clubs in the Bordeaux region to the Girondins de Bordeaux academy at age 14, eventually making his first-team debut at 19.",
         "His consistent performances earned him a transfer to Sevilla in 2019, where he became a cornerstone of Julen Lopetegui's squad and helped secure the 2020 Europa League title, a success mirrored internationally by a UEFA Nations League victory with France in 2021 and a World Cup final appearance in 2022.",
         "Joining FC Barcelona, Kounde proved vital in the 2022/23 La Liga and Spanish Super Cup triumphs—often playing at right-back and scoring the league-clinching goal against Espanyol—and continued his high level of performance with 48 appearances in 2023/24.",
         "Under Hansi Flick in the 2024/25 season, he remained an indispensable starter until an injury in April curtailed his campaign, though not before he marked his 100th appearance for the club and scored the decisive goal in the Copa del Rey final victory over Real Madrid, further cementing his reputation as a versatile, fast, and tactically intelligent defender capable of dominating both centrally and on the flank."
       ],
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
       detail: 'Centre back who excels at getting the ball out from the back and has an instinctive ability to read the game',
       bio: [
         "Regarded as the archetypal FC Barcelona defender due to his exceptional ball-playing ability and tactical intelligence, Eric Garcia returned to the club in the summer of 2021 following a developmental stint with Manchester City.",
         "Born in Martorell on January 9, 2001, Garcia originally progressed through the Barça Escola and La Masia ranks before moving to England in 2017, where he made his professional debut for City just prior to his 18th birthday.",
         "Upon his return to Barcelona, he quickly became a valued asset for managers Ronald Koeman and Xavi Hernández, showcasing his versatility in both defense and central midfield and scoring his first goal against Sevilla in September 2022.",
         "Following a successful loan spell at Girona during the 2023/24 season—where he was instrumental in the club's historic Champions League qualification—Garcia reintegrated into the Barcelona squad under Hansi Flick for the 2024/25 campaign, serving a crucial role across the backline and midfield, scoring in a decisive 4-3 victory over Real Madrid, and surpassing 100 official appearances for the club in March 2025.",
         "His distinguished career also includes significant international achievements, such as becoming the first Barça Escola graduate to represent the senior Spanish national team, participating in Euro 2020 and the 2022 World Cup, and winning a gold medal at the 2024 Paris Olympics."
       ],
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
         'Technically gifted midfielder with plenty of character and a good reader of the game.',
       bio: [
         "Born in Los Palacios y Villafranca, Pablo Páez Gavira—better known as 'Gavi'—is a combative and technically gifted midfielder who transitioned from the Real Betis youth system to FC Barcelona in 2015, where he rapidly ascended through the ranks to make his first-team debut in August 2021 at the age of 17 years and 24 days.",
         "After consolidating his status as a key squad member, signing a contract extension until 2026, and winning the prestigious Kopa Trophy in 2022, he helped secure the La Liga and Spanish Super Cup titles in the 2022/23 season before a serious knee injury on international duty sidelined him for the majority of the 2023/24 campaign.",
         "Making his return in October of the 2024/25 season against Sevilla, Gavi proved indispensable under coach Hansi Flick, leveraging his versatility across 42 appearances to re-establish his influence in midfield.",
         "His club success runs parallel to a historic international career with Spain, where he became the youngest player to debut for the national team at 17 years and 62 days and later set records as the youngest Spaniard to play and score in a World Cup during the 2022 tournament in Qatar."
       ],
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
         'The player enjoys playing on the front foot, driving at his direct opponent and having his passes break the defensive lines.',
       bio: [
         "Born on November 25, 2002, in Tegueste, Tenerife, Pedri began his footballing journey with his local club and Laguna Youth before joining UD Las Palmas in 2018, where his standout performance in the Segunda División A prompted FC Barcelona to secure his transfer in September 2019 ahead of his official arrival in August 2020.",
         "His debut season in Catalonia was historic, as he made a team-high 52 appearances and scored four goals, performances that earned him both the Golden Boy award and the Kopa Trophy.",
         "Although his subsequent campaigns were occasionally hampered by injuries—limiting him to 34 appearances in 2023/24—he remained a pivotal figure when fit, contributing significantly to the 2022/23 La Liga title.",
         "The 2024/25 season under Hansi Flick marked a definitive return to peak durability and form; Pedri missed just one match throughout the entire campaign, orchestrating the midfield as Barcelona secured a domestic treble consisting of the League, Copa del Rey, and Spanish Super Cup.",
         "Internationally, he has been equally influential, earning Player of the Tournament honors at Euro 2020, representing Spain at the 2022 World Cup, and contributing to the nation's Euro 2024 victory, despite suffering an injury during the quarter-final against Germany."
       ],
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
       detail: 'Culer since 2016/17, the midfielder from La Masia is now an established first team player.',
       bio: [
         "Fermín López Marín began his footballing education in the youth setup of his hometown club Campillo and Recreativo Huelva before moving to Real Betis Balompié, eventually joining FC Barcelona's La Masia academy as an U14 player four years later.",
         "After rising through the ranks to help the U19A side win the Spanish championship, he gained crucial professional experience during a 2022 loan spell with Linares Deportivo in the Primera Federación, where he finished as the team's top scorer with 12 goals and four assists.",
         "This impressive form secured his return to Barcelona for the 2023/24 season, where he broke into the first team under Xavi Hernández—highlighted by a goal and assist against Real Madrid during the pre-season tour—and concluded the campaign with 11 goals.",
         "Although his start to the 2024/25 season under Hansi Flick was delayed by injury, Fermín recovered to register eight goals and nine assists, playing an integral role in securing the domestic treble, his first major honors with the club.",
         "His stellar year extended to the international stage, where he debuted for the senior Spanish national team, participated in the victorious Euro 2024 campaign, and led Spain to a gold medal at the 2024 Paris Olympics as the tournament's top scorer with six goals."
       ],
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
       detail: 'La Masía trained midfielder known for hard work, quality, and leadership',
       bio: [
         "Born in Sant Pere de Vilamajor in 2003, Marc Casadó is a defensive central midfielder celebrated for his leadership and ability to provide tactical balance.",
         "Joining FC Barcelona from Damm in 2016, he progressed steadily through the youth system, eventually captaining the U19A side to a historic league and Copa de Campeones double.",
         "His development continued with Barça Atlètic, where he made 36 appearances in the 2022/23 season and a further 30 the following year under Rafa Márquez, displaying versatility by alternating between midfield and right-back.",
         "Having made his senior debut in the Champions League against Viktoria Plzeň during the 2022/23 campaign, Casadó was officially promoted to the first-team squad in the summer of 2024.",
         "Under the guidance of Hansi Flick in the 2024/25 season, he established himself as a vital component of the team, making 36 appearances, scoring his maiden goal against Real Sociedad, and contributing to a domestic treble that included the Spanish Super Cup, Copa del Rey, and La Liga titles."
       ],
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
       detail: 'A goalscorer and a versatile addition who can in midfield or up front',
       bio: [
         "Born on May 7, 1998, in Terrassa, Catalonia, Dani Olmo is a versatile, attack-minded forward capable of operating across the frontline and midfield who returned to FC Barcelona in the summer of 2024 following a distinguished career abroad.",
         "After joining La Masia from Espanyol in 2007, Olmo made the bold decision to continue his development with Dinamo Zagreb, where he amassed five league titles, three Croatian Cups, and two Player of the Year awards while also making his Champions League debut.",
         "His exceptional form led to a transfer to RB Leipzig in 2020, where he spent four seasons in the Bundesliga, lifting two German Cups and a German Super Cup—a victory highlighted by his hat-trick against Bayern Munich.",
         "Reintegrating into the Barcelona squad under Hansi Flick, Olmo overcame injury challenges to play a crucial role in the team's domestic treble success, recording 12 goals in 39 appearances during the 2024/25 campaign.",
         "Internationally, he has been a consistent performer for Spain since scoring on his senior debut, earning a silver medal at the Tokyo Olympics, competing in the 2022 World Cup, and starring in Spain's Euro 2024 triumph, where he finished as the tournament's top scorer with three goals."
       ],
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
         'His versatility, energy and great vision have allowed him to continue developing his skills in any midfield position',
       bio: [
         "Born on May 12, 1997, in Arkel, Netherlands, Frenkie de Jong is a tactically astute and versatile midfielder who began his professional career at Willem II before rising to prominence at Ajax, where his exceptional vision helped the Amsterdam club secure a domestic double and reach the Champions League semi-finals in the 2018/19 season.",
         "Following his transfer to FC Barcelona in the summer of 2019, De Jong quickly established himself as a midfield organizer, becoming a key figure under Ronald Koeman in his second season with seven goals and seven assists, and later playing a pivotal role in the club's 2022/23 La Liga title triumph.",
         "Although injuries limited his participation during the 2023/24 campaign and delayed his start to the 2024/25 season, he successfully returned to action in October to reclaim his place in the starting eleven, ultimately making 46 appearances and surpassing the significant milestone of 250 official matches for the club.",
         "Internationally, De Jong remains a cornerstone of the Netherlands national team, having achieved a runner-up finish in the 2019 UEFA Nations League and competed in both Euro 2020 and the 2022 World Cup, where the Dutch side reached the quarter-finals."
       ],
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
       detail: 'Holding midfielder with great tactical awareness and defensive abilities',
       bio: [
         "Born on May 26, 2007, in Berga, Catalonia, Marc Bernal Casas began his footballing journey with his local club before joining FC Barcelona's La Masia academy at the tender age of six, where his prodigious talent facilitated a rapid rise through the youth categories.",
         "A holding midfielder distinguished by his tactical intelligence and defensive prowess, Bernal became a cornerstone of the Barça Atlètic squad at just 16, recording 31 appearances—27 as a starter—and scoring twice during the 2023/24 campaign.",
         "He made his senior debut for the first team on August 17, 2024, at the age of 17 years and 84 days; however, his breakthrough was abruptly halted ten days later when he suffered a severe knee injury in a league match against Rayo Vallecano that sidelined him for over a year.",
         "Despite this significant setback, the club underscored their commitment to his future by signing him to a contract extension until 2026 during the early stages of his rehabilitation in September 2024."
       ],
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
       detail: 'He brings together various talents which allow him to operate anywhere up front',
       bio: [
         "Born on February 29, 2000, in Foios, Valencia, Ferran Torres began his footballing journey with futsal before joining the Valencia CF academy at the age of seven, where his meteoric rise culminated in his first-team debut in late 2017, making him the first player born in the 21st century to feature in La Liga.",
         "After accumulating 97 appearances and nine goals for his boyhood club, Torres moved to Manchester City under Pep Guardiola, where he transitioned from a winger to a central forward and contributed significantly to the club's Premier League and League Cup triumphs.",
         "He transferred to FC Barcelona in December 2021, playing a pivotal role in the 2022/23 La Liga title victory before enjoying a standout campaign under Hansi Flick in 2024/25; during this season, he recorded a career-best 19 goals and earned Man of the Match honors in the Copa del Rey final victory over Real Madrid, finishing as the competition's top scorer with six goals.",
         "Internationally, the versatile forward has been a consistent contributor for Spain, scoring two goals during their run to the Euro 2020 semi-finals, netting twice at the 2022 World Cup in Qatar, and scoring a goal during Spain's victorious Euro 2024 campaign."
       ],
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
       bio: [
         "Renowned for his clinical finishing with both feet and aerial prowess, as well as his technical ability to link play outside the box, Robert Lewandowski joined FC Barcelona in the summer of 2022 following a historic eight-year tenure at Bayern Munich.",
         "Born in Warsaw on August 21, the Polish striker began his professional rise at Znicz Pruszków and Lech Poznań—where he was league top scorer—before moving to the Bundesliga with Borussia Dortmund, securing two league titles and a Champions League runner-up medal.",
         "His subsequent move to Bayern Munich cemented his status as a global elite, culminating in a multi-trophy winning 2020 campaign where he was the Champions League top scorer, and earning him back-to-back FIFA 'The Best' awards.",
         "Upon arriving in Barcelona, Lewandowski immediately became the team's offensive focal point, winning the Pichichi trophy with 23 goals during the club's 2022/23 La Liga title run, followed by a 26-goal season in 2023/24.",
         "Reunited with coach Hansi Flick for the 2024/25 campaign, he recorded his most prolific season at the club with 42 goals across all competitions, achieving significant milestones including his 100th Champions League goal against Brest and his 100th goal for Barcelona against Athletic Club.",
         "On the international stage, Lewandowski is Poland's all-time leading goalscorer, having captained his nation to the knockout stages of the 2022 World Cup in Qatar."
       ],
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
       detail: 'A great talent from La Masia who stands out for his daring dribbling',
       bio: [
         "Lamine Yamal joined FC Barcelona at the age of seven from CF La Torreta, rapidly ascending through the academy ranks due to his exceptional technical ability, versatility across the forward line, and capacity to create chances.",
         "His precocious talent led to a historic first-team debut in April 2023 against Real Betis at just 15 years, 9 months, and 16 days old, making him the youngest player to ever represent the club.",
         "Following a breakthrough 2023/24 campaign under Xavi Hernández—where he established himself as a regular, scored seven goals, and set multiple age-related records including being the youngest to reach 50 appearances—he was awarded the Kopa Trophy in October 2024.",
         "His trajectory continued upward during the 2024/25 season under Hansi Flick, where he registered a spectacular 18 goals and 21 assists, becoming the youngest goalscorer in El Clásico and the youngest to reach 100 official appearances while playing a pivotal role in the team's domestic treble.",
         "On the international stage, Lamine shattered further records as Spain's youngest debutant and goalscorer, and in the summer of 2024, he became the youngest player to feature in and win a European Championship final, instrumental in Spain's victory against England."
       ],
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
       detail: 'A technically gifted, skill winger with great dribbling skills and combination play',
       bio: [
         "Born on December 14, 1996, in Porto Alegre, Brazil, Raphael Dias Belloli—better known as Raphinha—is a technically gifted winger distinguished by his dribbling ability and sharp decision-making who joined FC Barcelona in the summer of 2022 following a successful trajectory through European football.",
         "After beginning his career at Avaí FC, he moved to Portugal to play for Vitória Guimarães and subsequently Sporting CP, where he won a domestic cup double, before impressing in Ligue 1 with Rennes and later in the Premier League with Leeds United, where his contributions were vital to the English club's survival.",
         "Upon arriving at Barcelona, Raphinha was integral to the 2022/23 La Liga title victory and maintained consistent form the following year, but his true breakout occurred during the 2024/25 campaign under coach Hansi Flick.",
         "Forming a devastating attacking trio alongside Robert Lewandowski and Lamine Yamal, the Brazilian registered an astounding 34 goals and 22 assists in 57 matches, propelling the team to a domestic treble and earning himself a fifth-place finish in the Ballon d'Or voting.",
         "Internationally, Raphinha has been a regular for Brazil since his debut in 2021, featuring in every match of the 2022 World Cup and earning a spot in the Team of the Tournament at the 2024 Copa América."
       ],
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
       detail: 'Right footed, he can play anywhere up front, take players on and is an excellent finisher',
       bio: [
         "In July 2025, FC Barcelona and Manchester United finalized an agreement for the loan of Marcus Rashford, adding the versatile English striker to Hansi Flick's squad.",
         "A Manchester native who began his journey at Fletcher Moss Rangers before joining United's academy at age seven, Rashford progressed rapidly to make a sensational first-team debut at 18, scoring twice in a Europa League victory over Midtjylland in February 2016.",
         "After establishing himself as a central figure in the Manchester United attack for over nine seasons, he spent the second half of the 2024/25 campaign on loan at Aston Villa, where he recorded four goals and five assists in 17 appearances under Unai Emery.",
         "Known for his ability to operate across the forward line, his clinical finishing, and his skill in one-on-one situations, Rashford—who was awarded an MBE for his dedication to combating child poverty—brings significant experience and tactical flexibility to the Barcelona attack."
       ],
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
       detail: 'A young right winger known for his skill, pace and goalscoring ability, qualities that make him a very good prospect',
       bio: [
         "In the summer of 2025, FC Barcelona and FC Copenhagen finalized an agreement for the transfer of Roony Bardghji, adding another high-potential talent to the Blaugrana roster.",
         "A dynamic and technically skilled winger who operates primarily from the right flank to exploit his favored left foot, the Swedish international began his development at Malmö before joining Copenhagen's youth system in 2020.",
         "His rapid ascent led to a promotion to the first team in 2022, where he amassed 84 appearances, scoring 15 goals and providing one assist while playing a decisive role in securing three Danish league titles and two Danish Cups.",
         "Although his emergence as one of Europe's most sought-after prospects was temporarily interrupted by a severe injury that sidelined him for nearly a year, Bardghji has since fully recovered, demonstrating the resilience and quality that prompted his move to the Catalan capital."
       ],
     },
     {
       id: 'bio-hansi-flick',
       slug: 'hansi-flick',
       name: 'Hansi Flick',
       position: 'Head Coach',
       number: null,
       matches: null,
       stats: [],
       image: 'https://www.fcbarcelona.com/photo-resources/2025/09/09/6b074293-dfb2-4f25-a0e3-3c02b351d730/00-Hansi_Flick.jpg?width=600&height=600',
       detail: 'The German coach is known for his tactical prowess and ability to lead the team to success.',
       bio: [
         "Hansi Flick was appointed as FC Barcelona's head coach in the summer of 2024, bringing with him a wealth of experience and a proven track record of success at the highest level of European football.",
         "Born on February 24, 1965, in Heidelberg, Germany, Flick enjoyed a successful playing career primarily with Bayern Munich, where he won four Bundesliga titles and one DFB-Pokal before transitioning into coaching.",
         "His coaching breakthrough came as assistant manager to Joachim Löw with the German national team, where he was instrumental in Germany's 2014 World Cup triumph. Flick then took over as Bayern Munich's head coach in 2019, leading the club to an unprecedented sextuple in 2020, including the Champions League, Bundesliga, DFB-Pokal, UEFA Super Cup, DFL-Supercup, and FIFA Club World Cup.",
         "At Barcelona, Flick has implemented his high-pressing, possession-based style of play, quickly establishing a strong connection with the squad. In his first season, he guided the team to a historic domestic treble, winning La Liga, the Copa del Rey, and the Spanish Super Cup, while also reaching the Champions League semi-finals.",
         "Known for his tactical flexibility, man-management skills, and ability to get the best out of his players, Flick has quickly become a beloved figure at Camp Nou, continuing Barcelona's tradition of attractive, attacking football while achieving tangible success."
       ],
     },
   ];
 });

