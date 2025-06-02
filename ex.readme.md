__DESCRIZIONE__
Progetto portfolio laravel

__MILESTONE__
# Milestone 1
- Avviamo l'installazione di Laravel√
- Installiamo Breeze e Bootstrap √
- Verifichiamo che l'autenticazione funzioni√
- Creiamo un layout per la nostra area admin

# Milestone 2
- Creiamo il modello Project√
- Creiamo la migrazione√
- Creiamo un seeder per inserire inizialmente alcuni progetti nel Database√
- Prepariamo un Resource Controller (Admin/ProjectController) incaricato di gestire tutte le operazioni CRUD sui progetti. √
- Creiamo una rotta index e mostriamo le card a schermo, le card devono avere:√
    1. titolo√
    2. cliente√
    3. data di inizio√ 
    4. data di fine√
    5. stato del progetto√
    6. link al singolo progetto√
- Creiamo una rotta show e mostriamo la singola card a schermo.√

- Creiamo le rotte per i nostri progetti e prepariamo un layout per mostrare i  nostri progetti in tabella nella rotta index.√ Inventiamo anche uno stile per la pagina di show, che dovrà mostrare un singolo progetto. √

# Milestone 3

Procediamo al completamento delle operazioni CRUD sul modello Project:

1. Prepariamo le rotte per le pagine di creazione e modifica dei progetti√
2. All'interno delle pagine, prepariamo i rispettivi form√
3. Nella pagina di dettaglio del progetto, mostriamo il Type a cui il progetto appartiene. Volendo, potremmo anche aggiungere una colonna che indica il tipo nella tabella della pagina Index dei progetti.√
4. Nel controller, inseriamo la logica per il salvataggio di un nuovo progetto, per la sua modifica e per l'eliminazione√
5. Nella tabella della pagina index, dovremo inserire i pulsanti su ciascuna riga, per permettere l'eliminazione e la modifica del singolo progetto. Inoltre, potremmo avere un singolo tasto in cima che ci porti alla pagina di creazione del progetto.

- Bonus
Proviamo ad aggiungere un controllo: quando l'utente clicca sul pulsante "delete", chiediamo conferma della cancellazione, prima di eliminare l'elemento. Questa operazione possiamo farla a mano con JavaScript o aiutarci con i componenti Bootstrap.√

# Milestone 4
1. Creiamo il modello Type, con relativa migrazione ed un seeder per inserire i types nel Database;√
2. Creiamo anche la migration per modificare la tabella projects, che dovrà ora contenere la chiave esterna type_id;√
3. Nei modelli Type e Project, aggiungiamo i metodi per definire la relazione one-to-many;√
4. Nella pagina di dettaglio del progetto, mostriamo il Type a cui il progetto appartiene. Volendo, potremmo anche aggiungere una colonna che indica il tipo nella tabella della pagina Index dei progetti;√
5. Nei form di creazione e modifica dei progetti, dobbiamo permettere di associare un type al progetto stesso. Gestiamo inoltre il salvataggio di questa associazione progetto-tipologia nel controller ProjectController;√

- Bonus
Aggiungere le operazioni CRUD anche per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.

# Milestone 5
1. Creiamo il modello Technology, la migration per la sua tabella ed un seeder.√
2. Sarà inoltre necessario creare la tabella pivot project_technology, per gestire la relazione molti a molti√
3. Nei modelli Technology e Project, dovremo aggiungere i metodi corretti per rappresentare la relazione molti a molti√
4. Nei form di creazione e modifica dei progetti, dobbiamo permettere di associare una o più tecnologie al progetto stesso. Gestiamo inoltre il salvataggio di queste associazioni progetto-tecnologie nel controller ProjectController√
5. All'interno della pagina di dettaglio di un modello, dovremo visualizzare in qualche modo la lista delle tecnologie utilizzate nel singolo progetto.√

# Bonus

    Aggiungere le operazioni CRUD anche per il modello Technology, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.

    Potremmo modificare i seeder in modo tale da creare già le associazioni tra tecnologia e progetti quando viene popoliamo il database.

# Milestone 6
1. Innanzitutto, pubblichiamo il file routes/api.php col comando php artisan route:publish api
2. Creiamo poi un controller dedicato alle API dei progetti, col comando php artisan make:controller Api/ProjectController e inseriamo all'interno i metodi per restituire l'elenco dei progetti ed un singolo progetto, in formato JSON
3. Testiamo su Postman le nostre due rotte per verificare che restituiscano correttamente i JSON che abbiamo predisposto
4. Predisponiamo le configurazioni CORS di Laravel nel file cors.php per autorizzare l'applicazione esterna ad effettuare delle chiamate al nostro backend. 

# Bonus
Nome repo: laravel-portfolio-bonus
Prepariamo (in un repo a parte) una piccola applicazione frontend con React, che  permetta ad un utente non loggato di vedere la lista dei nostri progetti in Home e di poter poi andare a visualizzare il singolo progetto in una pagina di dettaglio, sfruttando le  API prodotte in Laravel!

Non dimentichiamo di predisporre le configurazioni CORS di Laravel nel file cors.php per autorizzare l'applicazione esterna ad effettuare delle chiamate al nostro backend!