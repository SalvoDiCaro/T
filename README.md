DOMANDE:
● Cosa si intende per API REST ?
- API sta per Application Program Interface, è un insieme di funzionalità che un sistema mette a disposizione verso l’esterno per esportare informazioni che possono essere utili ad utilizzatori fuori dal sistema di origine. REST, invece, è l’acronimo di REpresentational State Transfer e si tratta di un insieme di principi di strutturazione di dati per richieste effettuate a servizi web. Le API REST sono API che aderiscono a dei vincoli di architettura e che seguono determinate regole per essere utilizzate. Uno dei vincoli principali del REST è l’utilizzo di architettura client-server, che garantisce un sistema portatile su più tipi di dispositivi e diverse piattaforme. Le richieste di API si basano sul protocollo HTTP e queste devono essere accessibili tramite un endpoint URL utilizzando i metodi GET, POST, PUT/PATCH e DELETE. L’esito della richiesta fornirà un risultato in formato JSON o XML insieme ad altre informazioni, tra le quali troviamo una delle più importanti che è il codice di stato. Quest’ultimo ci consente di conoscere l’esito della nostra richiesta attraverso dei numeri suddivisi in livelli di tipologia da 1xx a 5xx.

● Cosa si intende per servizio SOAP ?
- SOAP (Simple Object Access Protocol) è un protocollo basato su XML che permette di scambiare informazioni tra sistemi in modo strutturato. Di solito utilizza HTTP per trasportare i dati, ma può essere usato anche con SMTP. REST viene ormai preferito a SOAP perché risolve alcune criticità di questo metodo più datato che però continua ad essere utilizzato in alcuni sistemi dove è necessaria sicurezza e complessità delle transazioni come ad esempio nelle applicazioni bancarie o contabili.

● Cos'è un database relazionale ?
- I database relazionali si basano sulla memorizzazione delle informazioni del mondo reale in una serie di tabelle di dati bidimensionali, chiamate relazioni. Queste tabelle sono organizzate in una serie di celle, divise in righe (che definiscono un record) e colonne (attributi o campi).

● Cos'è un database NoSQL ?
- I database non relazionali sono una collezione di dati memorizzati nei documenti, non nelle tabelle, quindi la prima differenza dal DB relazionale è il fatto che le informazioni non sono distribuite in diverse strutture logiche, ma sono aggregate da oggetti nei documenti. La natura di questi ultimi può essere di tipo Key-Value, basati sulla semantica JSON o sull'archiviazione di documenti. Ogni documento aggregato raccoglie tutti i dati associati a un'entità, quindi qualsiasi applicazione può trattare l'entità come un oggetto e valutare tutte le informazioni relative a tale entità in una volta sola. In questo modo, essendo già disponibili tutti i dati necessari corrispondenti allo stesso oggetto in un unico documento, si evita anche il carico computazionale dovuto alla fase di aggregazione delle informazioni tipica del linguaggio SQL.

● Cos'è un ORM ? Fai almeno un esempio.
- ORM (Object-Relational Mapping) è una tecnica che applica la programmazione ad oggetti su un database relazionale. Questo permette di avere una rappresentazione dei dati strutturati come uno schema ad oggetti con i relativi vantaggi di accessibilità ai dati dati dalla OOP. Un esempio di ORM è eloquent, in Laravel che consente di lavorare sulla modellazione dei dati attraverso Models utilizzando il inguaggio PHP ad oggetti.

● Cos'è la SQL Injection ?
- La SQL Injection è una tecnica di attacco sulla  sicurezza informatica. Si base sull'utilizzo di una stringa di codice sql inserita in fase di invio dati al server da un client per il quale si aspetta l'invio di dati. Basta pensare ad un semplice form di inserimento dati dove, al posto della stringa con il corretto dato da inserire, venga inserita una parte di query SQL (ad esempio un WHERE in OR sempre verificato) che permetta di richiedere al server informazioni a cui non si sarebbe potuti accedere.

● Cos'è l'autenticazione a 2 fattori? Descrivi brevemente un esempio.
- L'autenticazione a 2 fattori è una tecnica di autenticazione che sfrutta un secondo livello di sicurezza oltre il classico inserimento delle credenziali quali comunemente username e password. Di solito si utilizza per il secondo fattore di autenticazione uno strumento di generazione di OTP (One time password) come una chiavetta in possesso dell'utente da autenticare. L'unione delle credenziali che solo l'utente dovrebbe conoscere, e del codice generato dalla chiavetta di cui solo lui è in possesso, permettono un livello di sicurezza molto più complesso da violare. Il generatore di OTP spesso si trova a essere  realizzato semplicemente con un SMS inviato al numero di cellulare del cliente, o a volte con app addette alla generazione di codice OTP dopo una convalida dell'utente.

● Descrivi brevemente un metodo sicuro per salvare le password degli utenti sul DB.
- Un metodo di memorizzazione di password sicure in un DB è l'utilizzo dell'hash con il salt. Alla password va aggiunto un numero random chiamato salt e viene fatto l'hash di questa unione. Al server sarà inviata la coppia dell'hash sull'unione password e salt, insieme al salt che salverà nel DB. Al momento del login, alla password inviata da verificare verrà aggiunto il salt e si calcolerà l'hash, così non resta che verificare la coincidenza tra questo hash e quello salvato nel DB. 

● Cos'è una Sticky Session in un sistema con Load Balancing?
- La sticky session è una funzione che permette al load balancer di identificare una sessione utente attraverso una sua caratteristica, come l'IP, così da poter inviare le richieste tutte allo stesso server che gestira l'intera istanza.

ESERCIZIO:
SPIEGAZIONE DATABASE:
Il file "excercise01.sqlite" contiene un DB SQLite contenente diverse tabelle.
La tabella principale è "records", la quale contiene numerosi record estratti da un
censimento americano.
Ecco i campi della tabella:
● id: a unique id number for each record
● age: a continuous variable representing an individual's age
● workclass_id: foreign key to the workclasses table, representing the broad class of
occupation of an individual
● education_level_id: foreign key to the education_levels table, representing the
highest level of education an individual received
● education_num: a continuous variable representing an individual's current education
level
● marital_status_id: foreign key to the marital_statuses table, representing an
individual's marital status
● occupation_id: foreign key to the occupations table, representing an individual's
occupation
● race_id: foreign key to the races table, representing an individual's race
● sex_id: foreign key to the sexes table, representing an individual's sex
● capital_gain: a continuous variable representing post-social insurance income, in
the form of capital gains.
● capital_loss: a continuous variable representing post-social insurance losses, in the
form of capital losses.
● hours_week: a continuous variable representing the number of hours per week an
individual worked.
● country_id: foreign key to the countries table, representing an individual's native
country
● over_50k: a boolean variable representing whether the individual makes over
$50,000/year. A value of 1 means that the person makes greater than $50,000/year
and a value of 0 means that the person makes less than or equal to $50,000/year.
Tutti i campi che finiscono con "_id" fanno riferimento ad altre tabella contenute nel
database.

ESERCIZI:
1) Scrivi una query che estragga il numero di persone con meno di 30 anni che
guadagnano più di 50.000 dollari l'anno

- SELECT COUNT(*) [Numero di persone con meno di 30 anni che guadagna più di 50.000 dollari annui]
	FROM records
	WHERE age < 30 AND over_50k = true;

2) Scrivi una query che riporti il guadagno di capitale medio per ogni categoria
lavorativa

- SELECT w.name [Categoria lavorativa]
	, AVG(capital_gain-capital_loss) [Guadagno capitale medio]
	FROM records r 
	JOIN workclasses w on r.workclass_id = w.id 
	GROUP BY w.name;

3) Scegli la tecnologia che preferisci tra .NET Core, Node.js, PHP, Java e APEX,
realizza quindi un servizio web che legga i dati dall'SQLite ed esponga le seguenti
Web API in JSON:
● Lista dei record denormalizzati, cioè ogni entità deve contenere anche tutte
le informazioni derivanti dalle tabelle secondarie del DB.
L'API deve essere realizzata in GET e avere una paginazione parametrica
(cioè tramite l'url è possibile definire offset e count)

- GET /api/denormalized.php?offset=<offsetValue>&count=<countValue>

● Statistiche aggregate filtrate in base ad alcuni parametri significativi.
L'API, realizzabile in GET o in POST, deve soddisfare questa
documentazione fornita dal cliente:
INPUT: {
● aggregationType: "age", "education_level_id", "occupation_id
● aggregationValue: int
}
OUTPUT:{
● "aggregationType": "string",
● "aggregationFilter": int,
● "capital_gain_sum": float,
● "capital_gain_avg": float,
● "capital_loss_sum": float,
● "capital_loss_avg": float,
● "over_50k_count": int,
● "under_50k_count": int
}
ESEMPIO:
Passando i parametri "aggregationType" = "age" e "aggregationValue" = 30 si ottengono
le statistiche per tutti coloro che hanno 30 anni

- GET /api/aggregation.php?aggregationType=<aggregationValue>

4) Esponi inoltre, tramite il medesimo servizio web, un endpoint che faccia il download
in formato CSV di tutti i dati denormalizzati
(cioè ogni riga deve contenere sia il record che tutti i dati relazionati dalle altre
tabelle)

- GET /api/csv.php

PER LA CONSEGNA:
- Repository GIT su GitHub (o qualsiasi sistema alternativo) dal quale poter scaricare l’intero
progetto e visionare lo storico dei commit
