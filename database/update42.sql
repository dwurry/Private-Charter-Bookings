connect lyfft_db;

-- update on 1/28/15 -----------------

ALTER TABLE `user` ADD `weight` DECIMAL(9,2) NOT NULL AFTER `phone`;

--
-- Table structure for table `crm_link`
--

DROP TABLE IF EXISTS `crm_link`;
CREATE TABLE IF NOT EXISTS `crm_link` (
`id` int(11) NOT NULL,
  `biz_id` int(11) NOT NULL,
  `biz_type` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for table `crm_link`
--
ALTER TABLE `crm_link`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `crm_link` ADD INDEX( `biz_id`, `biz_type`, `user_type`);
 
ALTER TABLE `crm_link` ADD INDEX( `biz_id`, `biz_type`, `user_id`);

ALTER TABLE `crm_link` ADD INDEX( `biz_id`, `biz_type`, `user_id`, `user_type`);

ALTER TABLE `crm_link` ADD UNIQUE( `biz_id`, `biz_type`, `user_id`, `user_type`); 

ALTER TABLE `crm_link`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
