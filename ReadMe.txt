Download zip van github onder het pijltje van code
Download xampp 8.1.5 van het internet en installeer deze op je computer
Na het installeren, restart computer
Navigeer met Windows verkenner naar de map C:/xampp/htdocs
Maak een nieuwe map aan genaamd dataprocessing
Navigeer naar downloads en kopieer de zip file naar deze nieuwe map
Pak de zip uit door rechtermuisknop op te doen en druk op alles uitpakken
Verwijder de oude zip
Open de map en Kopieer alle bestanden(public, schemes, src, vendor, vue, .gitattributes, composer, composer.lock, readme, world) en plak deze in de map dataprocessing
Verwijder de map dataprocessing-master
Open xampp en start mysql en apache
Druk op admin naast mysql
Nieuwe database maken genaamd world en dan naar importeren en bestand kiezen
Navigeer naar C:/xampp/htdocs/dataprocessing en kies voor world.sql
Download en instaleer node.js versie 18.1.0 vanaf het internet
Restart computer
Open xampp en start mysql en apache
Open cmd en type in:cd .. en druk dan enter. herhaal dit tot je bij c:\ bent
Type nu:cd xampp\htdocs\dataprocessing\vue\vcountrys en druk op enter
Gebruik nu de volgende commands: 
npm install -g @vue/cli
npm install
npm run dev
Open de browser en ga naar deze url: localhost:8080
