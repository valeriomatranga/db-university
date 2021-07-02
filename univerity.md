# university

## Seleziona tutti gli studenti nati nel 1990 (160)
- SELECT *
- FROM `students`
- WHERE YEAR(`date_of_birth`)=1990

## Seleziona tutti i corsi che valgono piu di 10 crediti (479)
- SELECT *
- FROM `courses` 
- WHERE `cfu` > 10

## Seleziona tutti gli studenti che hanno piu di 30 anni
- SELECT *
- FROM `students`
- WHERE 2021 - Year(`date_of_birth`) > 30

## Seleziona tutti i corsi del primo semestre del primo anno di un qualsiasi corso di laurea (286)
- SELECT *
- FROM `courses`
- WHERE `year`=1
- AND `period`= 'I semestre'

## Seleziona tutti gli appelli d'esame che avvengono nel pomeriggio (dopo le 14) del 20/06/2020 (21)
- SELECT *
- FROM `exams`
- WHERE HOUR(`hour`) > 14 AND `date` = '2020-06-20'

## Seleziona tutti i corsi di laurea magistrale (38)
- SELECT *
- FROM `degrees`
- WHERE `level` = 'magistrale'

## Da quanti dipartimenti e composta L'universita? (12)
- SELECT COUNT(*)
- FROM `departments`

## Quanti sono gli insegnanti che non hanno un numero di telefono? (50)
- SELECT COUNT(*)
- FROM `teachers`
- WHERE `phone`
- IS null