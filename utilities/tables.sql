/*tables for new teachers*/

CREATE TABLE `scms`.`teachers` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , 
`first_name` TEXT NOT NULL , 
`mid_name` TEXT NOT NULL , 
`last_name` TEXT NOT NULL , 
`email` VARCHAR(100) NOT NULL , 
`phone_number` INT(10) NOT NULL , 
`gender` TEXT NOT NULL , 
`photo` VARCHAR(255) NOT NULL , 
`subjects` TEXT NOT NULL , 
`role` TEXT NULL DEFAULT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'This is for adding new teachers.';

/*tables for subjects*/
CREATE TABLE `scms`.`subjects` 
( `id` INT(100) NOT NULL AUTO_INCREMENT , 
`name` TEXT NOT NULL , 
`dpt` TEXT NOT NULL , 
`type` TEXT NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB COMMENT = 'New subjects';