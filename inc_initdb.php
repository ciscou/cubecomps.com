<?
require_once "lib.php";

if (SQL_DBTYPE != DBTYPE_H2)
	$charset = " DEFAULT CHARSET=utf8";
else
	$charset = "";
	
$query = <<<EOT
CREATE TABLE IF NOT EXISTS $eventstable (
  `id` tinyint(2) NOT NULL,
  `timelimit` varchar(9) default NULL,
  `r1` tinyint(1) NOT NULL,
  `r1_format` tinyint(1) NOT NULL,
  `r1_groupsize` smallint(3) NOT NULL,
  `r1_open` tinyint(1) NOT NULL,
  `r2` tinyint(1) NOT NULL,
  `r2_format` tinyint(1) NOT NULL,
  `r2_groupsize` smallint(3) NOT NULL,
  `r2_open` tinyint(1) NOT NULL,
  `r3` tinyint(1) NOT NULL,
  `r3_format` tinyint(1) NOT NULL,
  `r3_groupsize` smallint(3) NOT NULL,
  `r3_open` tinyint(1) NOT NULL,
  `r4` tinyint(1) NOT NULL,
  `r4_format` tinyint(1) NOT NULL,
  `r4_groupsize` smallint(3) NOT NULL,
  `r4_open` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
)
EOT;
$result = strict_query($query.$charset);

$query = <<<EOT
CREATE TABLE IF NOT EXISTS $compstable (
  `id` SMALLINT( 3 ) NOT NULL AUTO_INCREMENT ,
  `WCAid` VARCHAR( 10 ) ,
  `name` VARCHAR( 80 ) ,
  `country_id` VARCHAR( 2 ) ,
  `birthday` DATE NOT NULL ,
  `gender` VARCHAR( 1 ) ,
  PRIMARY KEY ( `id` ) ,
  INDEX ( `WCAid` , `name` )
)
EOT;
$result = strict_query($query.$charset);

$query = <<<EOT
CREATE TABLE IF NOT EXISTS $regstable (
  `cat_id` tinyint(2) NOT NULL,
  `round` tinyint(1) NOT NULL,
  `comp_id` smallint(3) NOT NULL,
  PRIMARY KEY  (`cat_id`,`round`,`comp_id`)
)
EOT;
$result = strict_query($query.$charset);

$query = <<<EOT
CREATE TABLE IF NOT EXISTS $timestable (
  `cat_id` tinyint(2) NOT NULL,
  `round` tinyint(1) NOT NULL,
  `comp_id` smallint(3) NOT NULL,
  `t1` varchar(15) NOT NULL,
  `t2` varchar(15) default NULL,
  `t3` varchar(15) default NULL,
  `t4` varchar(15) default NULL,
  `t5` varchar(15) default NULL,
  `average` varchar(15) default NULL,
  `best` varchar(15) NOT NULL,
  PRIMARY KEY  (`cat_id`,`round`,`comp_id`)
)
EOT;
$result = strict_query($query.$charset);

?>
