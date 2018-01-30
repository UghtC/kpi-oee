CREATE TABLE IF NOT EXISTS `emp` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `emp_name` varchar(255) NOT NULL COMMENT 'employee name',
  `emp_email` varchar(100) NOT NULL,
  `emp_salary` double NOT NULL COMMENT 'employee salary',
  `emp_age` int(11) NOT NULL COMMENT 'employee age',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
