  <body>
    <div class="grid-container">
      <div class="grid-item1">Tritt hitzigen Diskussionen bei über alle Themenbereiche des Fussballs!<br /> Unsere Themenbereiche:</div>
      <?php if(isset($login) && $login): ?>
        <div class="grid-item2"><a href="/championsleague/" class="bilderText"><img class="championsleague" src="images/championsleague.svg" alt="championsleague_img"><br />Champions League</a></div>
        <div class="grid-item3"><a href="/superleague/" class="bilderText"><img class="superleague" src="images/superleague.webp" alt="superleague_img"><br />European Super League</a></div>  
        <div class="grid-item4"><a href="/europaleague/" class="bilderText"><img class="europaleague" src="images/europaleague.jpg" alt="europaleague_img"><br />Europa League</a></div>
        <div class="grid-item5"><a href="/transfers/" class="bilderText"><img class="transfers" src="images/transfers.png" alt="transfers_img"><br />Transfers</a></div>
        
        <div class="grid-item6"><a href="/premierleague/" class="bilderText"><img class="premierleague" src="images/premierleague.png" alt="premierleague_img"><br />Premier League</a></div>
        <div class="grid-item7"><a href="/laliga/" class="bilderText"><img class="laliga" src="images/laliga.webp" alt="laliga_img"><br />La Liga</a></div>  
        <div class="grid-item8"><a href="/bundesliga/" class="bilderText"><img class="bundesliga" src="images/bundesliga.png" alt="bundesliga_img"><br />Bundesliga</a></div>
        <div class="grid-item9"><a href="/seriea/" class="bilderText"><img class="serieA" src="images/serie_a.png" alt="seriaA_img"><br />Serie A</a></div>
      <?php else: ?>
        <div class="grid-item2"><a href="/user" class="bilderText"><img class="championsleague" src="images/championsleague.svg" alt="championsleague_img"><br />Champions League</a></div>
        <div class="grid-item3"><a href="/user" class="bilderText"><img class="superleague" src="images/superleague.webp" alt="superleague_img"><br />European Super League</a></div>  
        <div class="grid-item4"><a href="/user" class="bilderText"><img class="europaleague" src="images/europaleague.jpg" alt="europaleague_img"><br />Europa League</a></div>
        <div class="grid-item5"><a href="/user" class="bilderText"><img class="transfers" src="images/transfers.png" alt="transfers_img"><br />Transfers</a></div>
        
        <div class="grid-item6"><a href="/user" class="bilderText"><img class="premierleague" src="images/premierleague.png" alt="premierleague_img"><br />Premier League</a></div>
        <div class="grid-item7"><a href="/user" class="bilderText"><img class="laliga" src="images/laliga.webp" alt="laliga_img"><br />La Liga</a></div>  
        <div class="grid-item8"><a href="/user" class="bilderText"><img class="bundesliga" src="images/bundesliga.png" alt="bundesliga_img"><br />Bundesliga</a></div>
        <div class="grid-item9"><a href="/user" class="bilderText"><img class="serieA" src="images/serie_a.png" alt="seriaA_img"><br />Serie A</a></div>
      <?php endif; ?>
    </div>
  </body>
</html>
