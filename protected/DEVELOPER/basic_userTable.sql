CREATE  TABLE IF NOT EXISTS `baseapp`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(200) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `gender` ENUM('0','1') NULL ,
  `power` ENUM('0','1') NULL ,
  `created_on` DATETIME NULL ,
  `updated_on` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB