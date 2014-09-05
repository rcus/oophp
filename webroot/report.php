<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */
// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Redovisning";

$herbert['main'] = <<<EOD
<h1>Redovisning av kursmomenten</h1>
<h2>Kmom01: Kom igång med programmering i PHP</h2>
<h3>Utvecklingsmiljö</h3>
<p>Jag har prövat olika varianter i hopp om att hitta något som fungerar bra. Jag använde en Win 8.1-dator och innan kursen använde jag i huvudsak WAMP, Notepad++ och FileZilla. Jag programmerade och testade lokalt och flyttade sedan filerna till driftsservern. Tankarna fanns redan då på något versionssystem för att effektivt kunna byta ut ändrade filer och även för att kunna gå tillbaka till en tidigare (fungerande) version. Notepad++ kändes också begränsad, då det var svårt att få en bra översikt av filstrukturen.<br/>
Så i kursen passade jag på att lägga ner lite tid på nya program. Jag startade upp Sublime Text 2 och gillar det redan skarpt. Det känns som det är ett program där man kan vara effektiv med hjälp av bl.a. kortkommandon, nu behöver jag lägga ner lite tid för att hitta dem. Katalogstrukturen känns överskådlig och programmet i allmänhet behagligt (stor skillnad att få från ljus till mörk bakgrund).
Det blev också ett strålande tillfälle att starta upp Git i kursen, vilket jag återkommer till senare. I samband med det använde jag mig av en SSH-klient, PuTTY. Det svåra med SSH är att jag har så svårt att komma ihåg kommandon. De är effektiva när man väl kan dem, men jag har fått börja från början med <code>cd</code>, <code>ls -a</code> och liknande. Det är många saker som vill in i huvudet nu...</p>
<h3>Kom i gång med PHP på 20 steg</h3>
<p>Innehållet hade jag hyfsad koll på tidigare. Men eftersom jag har enbart programmerat sporadiskt har jag lärt mig efter behov. Här fick jag mer samband och jämförelser om t.ex. <code>include()</code> och <code>require()</code>, <code>__DIR__</code> och <code>__FILE__</code>.</p>
<h3>Herbert</h3>
<p>Mitt Anax fick heta Herbert. Jag tänker på en gammal kollega som jobbade som speciallärare. Han var bra på att hålla ihop brokiga grupper och fick dem till att utvecklas och visa sina färdigheter tillsammans. Det är lite tanken med Herbert, hålla ihop strukturen och visa på sina delars fördelar. Dock lite osäker om han hette Herbert, men det är åt det hållet iaf.<br/>
Strukturen i stort gillar jag, men ser vissa begränsningar. Dynamiken blir begränsad när varje sida bygger på en egen php-fil. Varje fil är beroende av strukturen med <code>include()</code> och att <code>\$herbert</code>-arrayen namnges på rätt sätt. Dessutom måste länkarna kodas in i <code>config.php</code> med dess rätta namn. Detta fungerar bra på en mindre sida med ett fåtal sidor som inte behöver ändras så ofta. Fördelen är ju såklart att den genemsamma sidstrukturen går snabbt att ändra och det slår igenom på alla sidor samtidigt. Det som jag såg fördeln med strukten är att det är lätt att lägga till exempelvis en sidebar (se källkoden för <code>report.php</code>). Det jag fastnade på var att få till layouten med CSS med en kolumn till höger och eftersom jag inte hade något direkt innehåll lät jag det vara för stunden.</p>
<p><code>source.php</code> gick bra att lägga till, det var ju bra kod från början. Jag gjorde en klass (<code>CSource</code>) och använder den som en modul. Filen <code>source.php</code> bygger på Herbertmallen, inget svårt där. Jag fick även till det med att skicka en array till objektet med vilken baskatalog som ska visas.</p>
<h3>Git / GitHub</h3>
<p>Tanken på att använda Git och GitHub har funnits ett tag, perfekt tillfälle att komma igång. Instruktionerna för att komma igång var bra, det var inget svårt att komma igång. Däremot har jag inte riktigt koll på <code>clone</code>. Jag tänkte klona Herbert och göra ett nytt repository för Kmom01, men fick inte riktigt grepp på vad som händer 

</p>
EOD;

$herbert['sidebar'] = <<<EOD
Här kommer lite tilläggsinfo. Smaklig spis!
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
