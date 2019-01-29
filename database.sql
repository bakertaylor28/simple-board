CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL auto_increment,
  `date`  varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
INSERT INTO `data` (`id`, `date`,  `name`, `comment`, ) VALUES
(1, '01-01-2019',  'JohnDoe', 'This Is a Test Message');