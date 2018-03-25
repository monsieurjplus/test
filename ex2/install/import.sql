CREATE TABLE `foodmeup`.`categories` ( `id` INT(11) UNSIGNED NOT NULL , `name` VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , `path` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , `lft` INT(11) UNSIGNED NOT NULL , `lvl` INT(11) UNSIGNED NOT NULL , `rgt` INT(11) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `categories` ADD `tree_root` INT(11) UNSIGNED NOT NULL AFTER `rgt`, ADD `parent_id` INT(11) UNSIGNED NOT NULL AFTER `tree_root`;
