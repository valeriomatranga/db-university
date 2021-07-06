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
- WHERE HOUR(`hour`) >= 14 
- AND `date` = '2020-06-20'

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

## GROUP BY:

## Contare quanti iscritti ci sono stati ogni anno
- SELECT COUNT(*) AS 'iscritti', YEAR(`enrolment_date`) AS 'anno di iscrizione'
- FROM `students`
- GROUP BY YEAR(`enrolment_date`);

## Contare gli insegnanti che hanno l'ufficio nello stesso edificio
- SELECT COUNT(*) AS 'N.Insegnanti', `office_number` AS 'Ufficio N.' 
- FROM `teachers`
- GROUP BY `office_number`;

## Calcolare la media dei voti di ogni appello d'esame
- SELECT AVG(`vote`) AS 'voto medio esame', `exam_id` AS 'esame'
- FROM `exam_student`
- GROUP BY `exam_id`;

## Contare quanti corsi di laurea ci sono per ogni dipartimento
- SELECT COUNT(*) AS 'numero corsi', `department_id` AS 'dipartimento'
- FROM `degrees`
- GROUP BY `department_id`;


## JOINS:

## Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia
- SELECT `students`.`id`,`students`.`degree_id` as 'laurea in economia',`students`.`name`, `students`.`surname`,`students`.`date_of_birth`,`students`.`fiscal_code`,   `students`.`enrolment_date`,`students`.`registration_number`,`students`.`email`
- FROM `students`
- JOIN `degrees`
- ON `students` . `degree_id` = `degree_id`
- WHERE degrees.name = 'Corso di Laurea in Economia';

## Selezionare tutti i Corsi di Laurea del Dipartimento di Neuroscienze
- SELECT `degrees`.`id` AS 'ID: Laurea',`degrees`.`department_id` AS 'ID: dipartimento',`degrees`.`name`,`degrees`.`level`,`degrees`.`address`,`degrees`.`email`,`degrees`.`website`
- FROM `degrees`
- JOIN `departments`
- ON `degrees`.`department_id` = `department_id`
- WHERE departments.name = 'Dipartimento di Neuroscienze';

## Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44)
- SELECT `course_teacher`.`course_id`,`course_teacher`.`teacher_id`,`teachers`.`name`,`teachers`.`surname`,`teachers`.`phone`,`teachers`.`email`,`teachers`.`office_address`,`teachers`.`office_number`
- FROM `course_teacher`
- JOIN `teachers`
- ON `course_teacher`.`teacher_id`= `teacher_id`
- WHERE `teachers`.`id`= 44;

## Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e nome
- SELECT `students`.`id` AS 'ID Studente',`students`.`degree_id`,`students`.`name`,`students`.`surname`,`degrees`.`department_id`,`degrees`.`name`,`degrees`.`level`
- FROM `students`
- JOIN `degrees`
- ON `students`.`degree_id`= `degree_id`
- JOIN `departments`
- ON `degrees`.`department_id`= department_id
- ORDER by `students`.`surname` ASC;
