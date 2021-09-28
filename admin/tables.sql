/*code for creating the add student section goes here

CREATE TABLE `scms`.`students` 
( `id` INT(10) NOT NULL AUTO_INCREMENT , `adm_num` VARCHAR(100) NOT NULL , 
`form` INT(10) NOT NULL , `stream` TEXT NOT NULL , `hostel` TEXT NOT NULL , 
`first_name` TEXT NOT NULL , `mid_name` TEXT NOT NULL , `last_name` TEXT NOT NULL , 
`county` TEXT NOT NULL , `gender` TEXT NOT NULL , `nationality` TEXT NOT NULL , 
`photo` VARCHAR(255) NOT NULL , `p_first_name` TEXT NOT NULL , 
`p_mid_name` TEXT NOT NULL , `p_last_name` TEXT NOT NULL , 
`p_email` VARCHAR(100) NOT NULL , `p_phone_num` INT(10) NOT NULL , 
`adm_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) 
ENGINE = InnoDB;
