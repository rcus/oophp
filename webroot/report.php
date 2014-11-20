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


<h2>Kmom06: Bildbearbetning och galleri</h2>
<p>Det fungerade bra. Lite pill, som vanligt, men det brukar gå ihop sig rätt bra. Känslan var också att jag har mer koll på läget under själva arbetsgången, vilket känns gott. Stötte dock på ett, för mig, skumt problem. Om jag kallar på galleriinnehållet före breadcrumb, så får jag felmeddelande. Men tvärtom är det inga problem. Anar att det har något att göra med parametern som jag skickar iväg och funktionen glob(). Men jag har inte satt mig in mer i det hela, det funkar ju nu :)</p>
<h3>Tidigare erfarenheter av bildhantering</h3>
<p>I den här formen har jag inte arbetat med bildhantering tidigare. Att det var möjligt, och att det blev en punkt på min det-här-kanske-jag-ska-pilla-med-någon-dag-lista, visste jag då jag har sett funktionen av detta i exempelvis Wordpress. Kul att testa på!</p>
<h3>PHP GD</h3>
<p>Biblioteket känns lätt att komma igång med och verkar vara rätt innehållsrikt. Det jag använde fungerade smidigt, men jag kan tänka mig att det finns rätt mycket mer att använda sig av. Så det är bara att kika vidare i PHP's manual...</p>
<h3>img.php</h3>
<p>Det kan absolut vara ett bra verktyg. Dels eftersom man kan redigera bilden på flera olika sätt, dels för att resultatet sparas i cachen så att det inte behövs renderas på nytt. Nu har jag inte använt så mycket bilder ännu, men fördelen är att man kan få till en bättre och mer mångsidig användning av bilder.</p>
<h3>Herbert</h3>
<p>Roligt att se att Herbert växer. Jag vet ännu till vilken användning jag ska ha det till, därför är det svårt att se vad som saknas. Det som jag vill få till bättre är användningen av innehåll, att lägga till och bearbeta. Det är begränsat i nuläget, men grunden är väldigt god. Därför går det, om man vill, jobba vidare mycket med funktionerna.</p>





<h2>Kmom05: Lagra innehåll i databasen</h2>
<h3>Moduler i Herbert</h3>
<p>Det känns gott att Herbert växer. Även om nuvarande moduler är begränsade (jag har t.ex. inte integrerat CContent med tidigare innehåll) så känns det som att Herbert skulle kunna bli något som kan användas framöver. Kanske inte i just denna form, men med upplägget med moduler och klasser. Att nu kunna lagra information i databas gör att innehållet kan växa fortare.</p>
<h3>Struktur och kontroller</h3>
<p>Jag försökte flytta det mesta av funktionerna till klasserna och kalla på dem från sidkontrollerna. Det fanns även en tanke på att hålla funktionerna så generella som möjligt för att kunna återanvända dem i olika sammanhang, kanske även kommande.</p>
<h3>Känsla för struktur</h3>
<p>Känslan växer sig starkare ju mer jag jobbar med strukturen. Det är lättare att hitta det som jag är ute efter när jag behöver göra någon ändring. Det svåra är bara att hålla isär strukturerna. Herbert har en struktur, Anax-MVC (japp, läser phpmvc parallellt) en annan, Wordpress har en tredje och sen finns det ju andra som jag kikar på lite då och då.</p>
<h3>Viktiga moduler</h3>
<p>Modultänket innebär att det skulle kunna gå att lägga in i princip vad som helst. Så frågan är egentligen till vad man ska använda Herbert till. Det som jag skulle vilja jobba igenom mer är innehållsbiten, att kunna redigera sidor front-end för att slippa redigera enskilda filer. Det i sin tur skulle kräva fungerande användarstruktur, vilket har några bitar kvar i nuvarande utformning. Det som jag helt har släppt i Herbert är layouten, jag har valt att fokusera på funktionaliteten. Men det skulle vara ett viktigt steg framöver.</p>

<h2>Kmom04: PHP PDO och MySQL</h2>
<h3>PHP PDO</h3>
<p>PDO är en ny bekantskap för mig. Poängen, om jag har fattat det rätt, är att man ska kunna koda på samma sätt oavsett vilken databasmotor man har. Om nu PDO stödjer den typen, såklart. Jag ser genast en klar fördel. Jag har kört MySQL, men steget till en annan databas skulle vara väldigt litet. Men sen är jag inte riktigt med i alla steg med för att skicka iväg sin query. Nu har jag lärt mig att kunna binda variabler på sett bra sätt, förutom att det inte gick för ORDER BY. Tre timmar extra bara på att komma på hur man ska använda det på ett bra sätt! Till slut fick jag hårdkoda in variablerna, när jag till slut hittade en länk om att just dem går inte att ha som referenser. Suck!</p>
<h3>Guiden</h3>
<p>Jag började med att följa guiden och gjorde de olika sökversionerna var för sig. Designen har jag inte brytt mig om utan fokuserat helt på funktion. Efter några steg tänkte jag att jag vill samla ihop kod, så jag skapade en movies_functions.php med funktioner och variabler. Men sen jobbade jag vidare och försökte få alla SQL-frågor samlade och bygga på allt eftersom söktermer tillkom. Tanken gick då till att göra en klass. Vilket det också blev. Den innehåll både hanteringen av databaskopplingen och filminnehållet. Nästa steg var att dela på dem, det som tillhörde databashanteringen blev en egen klass och allt som hade med filmhanteringen fick bli en annan klass som förlängde (extends) databasklassen. Det funkade rätt smidigt, men jag fick lägga ner lite tid på att få ihop det på ett smidigt sätt (speciellt ORDER BY-"buggen"). Jag hade dock ett problem till som tog mycket tid, kopplingen mellan CUser och CDatabase. Jag fick återkommande fel, PDOExceptions gick inte bra ihop med sessionen. Lösningen på sena nattimmen blev att göra en privat funktion i CUser som skapade koppling till databasen vid inloggning. I övrigt behöver inte sessionen spara en koppling till databasen. Jag fick överge tanken att använda mig av CDatabase, vilket jag försökte få ihop på ett snyggt sätt.</p>
<h3>Klasser i Herbert (Anax)</h3>
<p>Jag tycker det funkar bra med att använda mig av klasser, det gör Herbert dynamiskt. Det går smidigt att komma åt funktioner oavsett var man befinner sig. Jag har fått lära mig en hel del om klasser under tiden. Däremot vet jag inte hur smidigt det är att jobba mellan klasser om de inte förlängs (extends), vilket kanske blir nästa steg. Kan en klass skapa ett objekt av en annan klass? Det kanske var så jag skulle jobbat med CUser och CDatabase?? Eller ja, det går ju... CDatabase skapar ju 'new PDO'... Det får undersökas mer vid ett annat tillfälle, nu får jag vara klar med detta. Risken för min del är att jag vill hela tiden göra det bättre, vilket gör att tiden ibland springer iväg. Nu återstår momentet att flytta allt till studentservern (vilket är klart när du läser detta).</p>

<h2>Kmom03: SQL och databasen MySQL</h2>
<h3>Tidigare bekantskap</h3>
<p>Första tanken är "nej, databaser har jag inte hållt på med". Men sen inser jag att det har jag gjort till viss del ändå. Vid tidigare webb-programmering på hobbynivå har det smugit sig in lite databaser när olika innehållsverktyg kom, som Joomla och Wordpress. Ja, det mesta är ganska uppstyrt där, men jag har letat efter information direkt i databaserna, vilket oftast har varit i MySQL med hjälp av phpMyAdmin. När jag tänker efter, så försökte jag bygga mina egna hemsidor med hjälp av egenskapade mallar där jag sparade informationen i MySQL. Jag skulle inte vilja påstå såhär i efterhand att det underlättade mitt webbsnickrande eftersom jag fick koda in allt direkt i databasen. Men mitt mål var att inte upprepa koden, därför blev det en template som hämtade info från MySQL. Sen gick det som det gick, sidan blev inte långlivad. Det slog mig nu att ännu tidigare hjälpte jag en organisation med att skapa medlemsregister i Microsoft Access. Det var tider det! Jag hade andra uppgifter där, men tog med stort intresse tag i att migrera deras databas från ???? (textbaserad databas i DOS) till MS Access. Det blev lite utmaningar att få till familjekopplingar, elever i folkhögskolan, stödmedlemmar mm. Frågan är om det var jag eller dem som hade störst glädje av det?</p>
<h3>MySQL och miljöer</h3>
<p>När jag tidigare har använt MySQL har jag lärt mig efter behov. Det känns därför bra att lära sig i ett mer strukturerat sammanhang. phpMyAdmin är ju som sagt inte något nytt. Men jag uppskattar MySQL Workbench! Jag ser användningsområdet och styrkan i programmet och tänker mig att jag kommer att använda mig av programmet framöver. Smidigt att kunna ansluta till olika servrar, lokalt, BTH och webbhotell. Jag tänker mig att den grafiska delen för ER-diagram kommer till nytta. Ska även testa Reverse Engineering mer framöver. När det gäller MySQL CLU har jag bara startat upp det och testat lite lätt. Detta i samband med att jag har börjat använda mig av Ubuntu Server, nu är det tydligen terminalbaserat som gäller för mig :)</p>
<h3>Övningen</h3>
<p>Övningen gick som förväntat, det var inte någon större märkvärdighet. Jag var med på stegen, fick några nya lärdomar (ex. views), men det mesta kändes igen.</p>

<h2>Kmom02: Objektorienterad programmering i PHP</h2>
<h3>Objektorienterat</h3>
<p>När jag tidigare har sett :: i php-kod, har jag bara suckat lite, tänkt att det där med objekt i php borde jag lära mig och sen bara gått vidare. Därför har jag sett fram mot denna kurs så att jag kan få koll på det där med objekt och php. Objektorienterad programmering är inte helt nytt för mig, jag har tidigare läst objektorienterad Java. Men jag har inte använt det mer än i kursen, så det var verkligen dags att komma igång med det mer. Jag tycker att jag har fått hyfsat klämm på det. Dock använde jag mig inte av interface eller trait, vilket jag gissar att jag kunde ha gjort i mitt tärningsspel.</p>
<p>Guiden <em>20 steg...</em> läste jag igenom ordentligt. Men jag jobbade inte genom den (alltså skrev kod själv), då jag tyckte att jag förstod vad jag läste. Det tackar vi Java-kursen för! Sen var den bra att gå tillbaka till när jag behövde mer hjälp under tiden jag gjorde tärningsspelet. Den och Google, där php.net's manual och Stack Overflow blev flitigt använda.</p>
<h3>Tärningsspelet 100 (Kasta gris)</h3>
<p>Jag valde att jobba med tärningsspelet, då jag förstod att det fanns många logiska knäckbitar att lösa. Såhär i efterhand kände jag att det gick bra, men visst var det tvärstopp ibland. Det blev många försök och kodningen gick fram med små eller stora steg. Inledningsvis var taktiken lite grumlig, jag försökte med att snabbt få in vilka variabler jag behövde och hur jag skulle kunna hämta och ändra dem. Jag försökte även att begränsa dem, så att jag inte behövde skapa fler variabler än nödvändigt. Exempelvis så använde jag en metod baserad på två variabler (spela-mot-vän och spela-mot-dator) för att returnera sant/falsk om det behövs två spelplaner, i stället för att skapa en tredje variabel som måste ändras om någon av de två första ändras. Dessutom höll jag dessa två till sant/falskt för att lättare kunna jobba med dem i if-satser. Klasserna blev uppdelade efter ett tärningsslag (CPigDice), en runda (CPigRound) och spelet i helhet (CPigGame). CPigDice känns lite överflödig, men finns kvar då det står så i uppgiften. Det är här jag tänker mig att klass kanske inte är det bästa systemet, utan interface eller trait skulle kunna användas. Ja, inte till CPigGame eftersom det skall "objektificeras".<br />
Jag har fått med mig flera lärdomar från uppgiften. Bland annat kopplingen mellan olika scope bland olika metoder i de olika klasserna och hur man kallar på varandra. Äntligen har jag fått användning av ::! <em>Shorthand if</em> har jag fått nytta av många gånger och har blivit mer säker på det. Men det klurigaste har nog varit logiken. Jag känner mig nöjd över att kunna koda för att syfta på den andra användaren (jag kallar dem för 0 och 1) på ett smidigt sätt, nämligen <code>abs(\$player-1)</code>.</p>

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
<p>Tanken på att använda Git och GitHub har funnits ett tag, perfekt tillfälle att komma igång. Instruktionerna för att komma igång var bra, det var inget svårt att komma igång.  Däremot har jag inte riktigt koll på <code>clone</code>. Jag tänkte klona Herbert och göra ett nytt repository för Kmom01, sen nya för varje kursmoment. Min tanke var att jag skulle ha ett gäng filer från Herbert och jobba vidare med dem. Smidigt att få hem en lokal kopia för Kmom01, men jag hade tänkt mig att första commiten och pushen skulle vara en ny start på det nya repositoryt. Jag tog helt enkelt bort de gamla taggarna och började om. Då kom jag även på att använda hela repositoryt för alla kursmoment och tagga dem vid varje moment. Det kommer ju helt enkelt bli nya versioner av min me-sida!<br/>
Men frågan kvarstår, någon som vet hur jag kan "klona" Herbert och sedan använda filerna som nya i det nya repositoryt? (Kom precis på att man kan "fulhacka" lite, bara att ta bort <code>.git</code>-mappen. Men det känns inte som en korrekt lösning.)</p>
EOD;

$herbert['sidebar'] = <<<EOD
Här kommer lite tilläggsinfo. Smaklig spis!
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
