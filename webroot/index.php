<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Om mig";

$herbert['main'] = <<<EOD
<h1>Om mig</h1>
<h3>Marcus Törnroth</h3>
<p>Det är mitt namn, glöm aldrig det! Själv har jag inte riktigt koll på mitt namnminne, se till exempel namngivningen av webbtemplaten <a href="http://www.student.bth.se/~matg12/herbert/webroot/about.php">Herbert</a>. Var det kanske Hubert jag var ute efter?</p>
<h3>Född och uppväxt</h3>
<p>En junidag 1979 jag kom till världen, närmare bestämt till <a href="http://www.familjenhelsingborg.se">Helsingborg</a>. Där bodde jag i hela åtta år och har med mig minnen därifrån om hur vi cyklade omkring bland gatorna och i <a href="http://ramlösa.se">Ramlösaparken</a>, lekte konstant, kidnappade katt, smällde smällare på nyårsafton och mycket mer. Ganska okomplicerad och härlig tid.</p>
<p>Pappa fick nytt jobb inom banken, platsen var <a href="http://www.goteborg.com">Göteborg</a>. Så familjen (jag plus fem till) tog oss till en villaförort söder om den go'a staden. Som en glad skånepåg började jag i andra klass och mina skånska skorrande rrr blev kända på den närliggande låg- och mellanstadieskolan. Med nya kompisar cyklade jag runt i området. Det var tiden när mountainbiken blev populär, så vi höll oss mycket i skogen och på klipporna. Sen hittade vi på en hel del andra saker, varav vissa var bara dumheter. En hyfsat ordinär uppväxt, med andra ord.</p>
<p>När tiden var inne för att utbilda mig, hamnade jag <a href="http://www.destinationjonkoping.se">Jönköping/Huskvarna</a> tack vare ständiga hormonrusningar i kroppen och en känsla kallad för förälskelse. Inget jag ångrar, även om jag trivdes kanon i Göteborg. <a href="http://www.visitsmaland.se">Småland</a> med kärlek toppade det.</p>
<p>Nu får jag väl ändå kalla mig vuxen. Jag gillar faktist oliver (lite grann), det är ändå en av kriterierna. Dessutom har en kvinna fastnat för mig, så pass att hon gick med på att gifta sig med mig. Förälskelsen gick alltså över till det mer stabila kärleks-tillståndet. I like! Utöver det ville hon att jag skulle få bli pappa till hennes kommande barn. Det var ett tag sen nu, grabben är snart tio år. Den andra är sju år och (lill)tjejen är på malliga fyra år. Dessutom har vi landat i den idylliska småländska orten <a href="http://boivaggeryd.se">Vaggeryd</a>, idealt för småbarnsfamiljer (sägs det). Så, vuxen kan jag nog kalla mig. Ibland.</p>
<h3>Lärare, maskinoperatör och student</h3>
<p>Frågan är om man säger att man är lärare när man inte längre är aktiv som det? Nåja, jag är utbildad i huvudsak vid <a href="http://www.hj.se">Högskolan i Jönköping</a> och har därefter undervisat ma/no i grundskolans senare del. Det är lärorikt, givande och krävande.</p>
<p>Av olika skäl ville jag ge mer tid för det som är mitt stora intresse, nämligen IT och webbskapande. Därför valde jag att söka annat jobb när min lärartjänst slutade, det är ju trots allt ett krävande jobb om man vill göra bra ifrån sig. Jag landade som maskinoperatör och kunde därför lägga mer tid på mitt intresse. Det har gjort att jag har kunnat studera IT halvtid på distans, vilket har varit spännande.
<h3>Nu och framtiden</h3>
<p>Målet med mina studier är såklart att komma in i branschen och kunna jobba med det som jag tycker är roligt. Dock har jag utökat studierna till heltid eftersom det är både kul och utvecklande, men även för att kunna bli klar tidigare. För sen kommer framtiden... Då ni! Då kommer den smålandsbosatta skånskfödda göteborgaren ägna sin arbetstid åt det som får de små grå att komma igång för att hitta nya lösningar, möjligheter och annat i den wida webb-wärlden. Det är nästan ett <em>Halleluja!</em> på det!</p>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
