CREATE DATABASE `file` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `file_importer` (
  `id` int(11) NOT NULL,
  `file_name` varchar(64) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `active` varchar(2) DEFAULT NULL,
  `img_data` longblob,
  `import_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This contains details of files imported.';


CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `import_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `import` VALUES (1,'http://samplecsvs.s3.amazonaws.com/SalesJan2009.csv');
INSERT INTO `import` VALUES (2,'https://www.sss.gov.ph/sss/DownloadContent?fileName=SSSForms_Sickness_Reimbursement.pdf');
INSERT INTO `import` VALUES (3, 'http://www.dlsu.edu.ph/offices/registrar/deans_list/deans_list_1415_3rd_term.pdf');
