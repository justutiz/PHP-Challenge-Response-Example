CREATE TABLE `user_accounts` (
  `userid`   INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(64)      NOT NULL DEFAULT '',
  `password` VARCHAR(64)      NOT NULL DEFAULT '',
  UNIQUE KEY `userid` (`userid`)
);


CREATE TABLE `challenge_record` (
  `challenge` VARCHAR(64) NOT NULL DEFAULT '',
  `sess_id`   VARCHAR(64) NOT NULL DEFAULT '',
  `timestamp` INT(11)     NOT NULL DEFAULT '0'
);

INSERT INTO `user_accounts` VALUES (1, 'justas', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');