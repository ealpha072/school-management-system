/*tables for new teachers*/

CREATE TABLE `scms`.`teachers` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , 
`first_name` TEXT NOT NULL , `mid_name` TEXT NOT NULL , 
`last_name` TEXT NOT NULL , `email` VARCHAR(100) NOT NULL , 
`phone_number` INT(10) NOT NULL , `gender` TEXT NOT NULL , 
`photo` VARCHAR(255) NOT NULL , `subjects` TEXT NOT NULL , `role` TEXT NULL DEFAULT NULL , PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'This is for adding new teachers.';

ALTER TABLE `teachers`
DROP `subjects`;

ALTER TABLE `teachers` 
CHANGE `role` `role` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

ALTER TABLE `teachers` 
ADD `subject_1` TEXT NOT NULL AFTER `role`, 
ADD `subject_2` TEXT NOT NULL AFTER `subject_1`;

/*tables for subjects*/
CREATE TABLE `scms`.`subjects` 
( `id` INT(100) NOT NULL AUTO_INCREMENT , 
`name` TEXT NOT NULL , `dpt` TEXT NOT NULL , `type` TEXT NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'New subjects';


/*table for new support staff*/
CREATE TABLE `scms`.`staff` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , 
`first_name` TEXT NOT NULL , `mid_name` TEXT NOT NULL , `last_name` TEXT NOT NULL , 
`email` VARCHAR(255) NOT NULL , `phone_number` INT(10) NOT NULL , `photo` INT(255) NOT NULL , 
`date_employed` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `role` TEXT NOT NULL , PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'Table for new support staff';

/*table for new parents*/
CREATE TABLE `scms`.`parents` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , `first_name` TEXT NOT NULL , 
`mid_name` TEXT NOT NULL , `last_name` TEXT NOT NULL , 
`email` VARCHAR(100) NOT NULL , `phone_number` INT(10) NOT NULL , 
`photo` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'Table for new parents';

/*table for streams*/
CREATE TABLE `scms`.`streams` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'Streams Tables';

/*table for classes*/
CREATE TABLE `scms`.`forms` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'Table For new Classes/Forms';

/*table for teacher roles*/
CREATE TABLE `scms`.`teacher_roles` 
( `id` INT(100) NOT NULL , `role_name` TEXT NOT NULL , `teacher` TEXT NOT NULL ) 
ENGINE = InnoDB COMMENT = 'Table displaying roles of teachers';

/*table for support staff role*/
CREATE TABLE `scms`.`staff_roles` 
( `id` INT(100) NOT NULL AUTO_INCREMENT , `role_name` TEXT NOT NULL , 
`staff_incharge` TEXT NOT NULL COMMENT 'name of staff incharge of this role' , PRIMARY KEY (`id`)) 
ENGINE = InnoDBm COMMENT = 'Table for roles of support staff';
