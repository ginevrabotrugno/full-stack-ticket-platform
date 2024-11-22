# Full Stack Ticket Platform

## Descrizione del Progetto

Il progetto **Full Stack Ticket Platform** è un'applicazione web sviluppata in **Laravel** che permette la gestione e visualizzazione di **Ticket di supporto**. La piattaforma è destinata ad un **Amministratore** che può gestire ticket, operatori e categorie assegnabili ai ticket.

![image](https://github.com/user-attachments/assets/3c99372f-e130-4e98-bb38-3c1f8e6da4c0)

### Funzionalità principali

1. **Gestione dei Ticket**
   - Creazione dei ticket: Ogni ticket deve essere creato con una categoria e assegnato ad un operatore disponibile.
   - Aggiornamento dello stato dei ticket: Lo stato dei ticket può essere aggiornato.
    ![image](https://github.com/user-attachments/assets/7a796e66-c135-4571-aba2-a9432713ce43)
   - Assegnazione dei ticket: I ticket devono essere obbligatoriamente assegnati ad un operatore disponibile al momento della creazione.

2. **Gestione degli Operatori**
   - Visualizzazione della lista degli operatori disponibili.
   - Assegnazione di ticket agli operatori disponibili.

3. **Gestione delle Categorie**
   - Le categorie dei ticket sono visualizzabili e associate ai ticket.
   - Ogni ticket deve appartenere a una categoria specifica.

4. **Backoffice Admin**
   - Un'unica tipologia di utente (Admin) che ha accesso alla lista degli operatori, dei ticket e delle relative categorie.
   - Operazioni di gestione e aggiornamento dei ticket sono eseguite all’interno di un semplice backoffice.

   ![image](https://github.com/user-attachments/assets/63a032ca-09e3-47cb-86b8-80a706031725)

### Come Funziona

- L'amministratore può **creare** un ticket, scegliendo una **categoria** e assegnando il ticket ad un **operatore disponibile**.
- I ticket vengono visualizzati in una **lista** semplice.
- L'amministratore può **aggiornare lo stato** dei ticket.

![image](https://github.com/user-attachments/assets/f4f22d73-7453-465b-a217-5edd672c497e)


## Struttura delle Tables del Database

### 1. **Tickets**
   - **id**: Identificatore univoco del ticket.
   - **status**: Stato del ticket (e.g., "Nuovo", "In corso", "Chiuso").
   - **operator_id**: ID dell'operatore assegnato al ticket.
   - **category_id**: ID della categoria del ticket.
   - **description**: Descrizione del ticket.

### 2. **Categories**
   - **id**: Identificatore univoco della categoria.
   - **name**: Nome della categoria (e.g., "Supporto Tecnico").
   - **description**: Descrizione della categoria.

### 3. **Operators**
   - **id**: Identificatore univoco dell'operatore.
   - **name**: Nome dell'operatore.
   - **email**: Email dell'operatore.
   - **status**: Stato dell'operatore (e.g., "Disponibile", "Non disponibile").

![drawSQL-image-export-2024-11-22](https://github.com/user-attachments/assets/dae0d3fe-9609-4a15-a581-8cd77a54458d)

## Tecnologie Utilizzate

- **Backend**: Laravel (PHP)
  - Sistema di gestione dei ticket
  - Gestione utenti e autenticazione
  - Gestione delle categorie e operatori

- **Frontend**: Blade, Bootstrap
  - Interfaccia utente semplice e reattiva
  - Visualizzazione dei ticket e operazioni di gestione

- **Database**: MySQL
  - Archiviazione delle informazioni sui ticket, categorie e operatori.

## Funzionalità

1. **Dashboard Admin**:
   - Visualizzazione della lista dei ticket.
   - Creazione di nuovi ticket e assegnazione agli operatori.
   - Aggiornamento dello stato dei ticket.

2. **Assegnazione e gestione degli operatori**:
   - L'amministratore può visualizzare gli operatori disponibili.
   - I ticket devono essere assegnati ad un operatore disponibile.

3. **Gestione delle categorie**:
   - Le categorie sono visualizzabili e gestibili tramite il backoffice.
   - Ogni ticket deve essere associato ad una categoria esistente.

