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

INSERT INTO homestead.urls VALUES (1,'http://www.omig.ny.gov/data/gensplistns.php',NOW(),NOW());
INSERT INTO homestead.urls VALUES (2,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/new-jersey/nj.txt',NOW(),NOW());
INSERT INTO homestead.urls VALUES (3,'http://services.dpw.state.pa.us/dhs/medicheck.txt',NOW(),NOW());
INSERT INTO homestead.urls VALUES (4,'http://medicaid.ohio.gov/Portals/0/Providers/Enrollment%20and%20Support/ExclusionSuspensionList.xlsx',NOW(),NOW());
INSERT INTO homestead.urls VALUES (5,'https://www.scdhhs.gov/sites/default/files/Exclusion%20Provider%20List%20for%20DHHS%20Website_15.xls',NOW(),NOW());
INSERT INTO homestead.urls VALUES (6,'http://www.ct.gov/dss/cwp/view.asp?a=2349&q=310706',NOW(),NOW());
INSERT INTO homestead.urls VALUES (7,'https://ardhs.sharepointsite.net/ExcludedProvidersList/Excluded%20Provider%20List.html',NOW(),NOW());
INSERT INTO homestead.urls VALUES (8,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/west-virginia/wv2.xlsx',NOW(),NOW());
INSERT INTO homestead.urls VALUES (9,'http://www.health.wyo.gov/Media.aspx?mediaId=18045',NOW(),NOW());
INSERT INTO homestead.urls VALUES (10,'http://www.tn.gov/assets/entities/tenncare/attachments/terminatedproviderlist.pdf',NOW(),NOW());
INSERT INTO homestead.urls VALUES (11,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/alaska/aklist.xlsx',NOW(),NOW());
INSERT INTO homestead.urls VALUES (12,'https://www.medicaid.ms.gov/wp-content/uploads/2014/03/SanctionedProvidersList.pdf',NOW(),NOW());
INSERT INTO homestead.urls VALUES (13,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/missouri/Missouri.xls',NOW(),NOW());
INSERT INTO homestead.urls VALUES (14,'http://www.hca.wa.gov/medicaid/provider/documents/termination_exclusion.pdf',NOW(),NOW());
INSERT INTO homestead.urls VALUES (15,'https://adverseactions.dhh.la.gov/SelSearch/GetCsv',NOW(),NOW());
INSERT INTO homestead.urls VALUES (16,'http://www.nd.gov/dhs/services/medicalserv/medicaid/docs/pro-exclusion-list.xlsx',NOW(),NOW());
INSERT INTO homestead.urls VALUES (17,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/montana/mt.xlsx',NOW(),NOW());
INSERT INTO homestead.urls VALUES (18,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/iowa/ia.csv',NOW(),NOW());
INSERT INTO homestead.urls VALUES (19,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/georgia/Georgia.xlsx',NOW(),NOW());
INSERT INTO homestead.urls VALUES (20,'https://mainecare.maine.gov/PrvExclRpt/November 2015/PI0008-PM_Monthly_Exclusion_Report (csv.csv',NOW(),NOW());
INSERT INTO homestead.urls VALUES (21,'https://s3.amazonaws.com/StreamlineVerify-Storage/exclusion-lists/custom-debar-list/Cume0630.csv',NOW(),NOW());
