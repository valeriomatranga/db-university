<!-- 
Modellizzare la struttura di una tabella per memorizzare tutti i dati riguardanti una università:
- sono presenti diversi dipartimenti, ciascuno con i propri corsi di laurea;
- ogni corso di laurea è formato da diversi corsi;
- ogni corso può essere tenuto da diversi insegnanti e prevede più appelli d'esame;
- ogni studente è iscritto ad un corso di laurea;
- per ogni appello d'esame a cui lo studente ha partecipato, è necessario memorizzare il voto ottenuto, anche se non sufficiente
-->

# universita

## (table) Dipartimento:
- id
- facolta
- modalita_di_accesso
- sede

## (table) corsi:
- id
- nome 
- classe
- date
- orario

## (table) insegnanti:
- id
- nome
- cognome
- materia

## (table) appelli:
- appelli_del_giorno
- appelli_del_mese
- tutti_gli_appelli_programmati

## (table) alunni:
- id
- nome 
- cognome
- recapiti
- materie_conseguite
- materie_da_conseguire

## (table) esami:
- id
- nome_appello
- partecipanti
- votazioni
