/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : spm

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-11-20 07:57:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `core_company`
-- ----------------------------
DROP TABLE IF EXISTS `core_company`;
CREATE TABLE `core_company` (
  `idCompany` int(1) NOT NULL DEFAULT '1',
  `company` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `updateDate` datetime NOT NULL,
  PRIMARY KEY (`idCompany`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_company
-- ----------------------------
INSERT INTO `core_company` VALUES ('1', 'Poltek Krakatau', 'muha-assets/img/logo.png', '', '', 'Jl. Raya Anyer', 'kit@test.com', '+62 254-000-000', '2017-11-16 18:07:03');

-- ----------------------------
-- Table structure for `core_level`
-- ----------------------------
DROP TABLE IF EXISTS `core_level`;
CREATE TABLE `core_level` (
  `idLevel` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`idLevel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_level
-- ----------------------------
INSERT INTO `core_level` VALUES ('1', 'Superadmin');
INSERT INTO `core_level` VALUES ('2', 'Administrator');
INSERT INTO `core_level` VALUES ('3', 'Entry User');

-- ----------------------------
-- Table structure for `core_log`
-- ----------------------------
DROP TABLE IF EXISTS `core_log`;
CREATE TABLE `core_log` (
  `idLog` bigint(19) NOT NULL,
  `idUser` int(11) NOT NULL,
  `logdate` date NOT NULL,
  `desc` varchar(30) NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_log
-- ----------------------------

-- ----------------------------
-- Table structure for `front_contents`
-- ----------------------------
DROP TABLE IF EXISTS `front_contents`;
CREATE TABLE `front_contents` (
  `shortcutURL` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `template` int(2) NOT NULL,
  `lastUpdated` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`shortcutURL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of front_contents
-- ----------------------------
INSERT INTO `front_contents` VALUES ('home', 'Selamat Datang', 'Dalam rangka membangun budaya mutu di perguruan tinggi melalui implementasi Sistem Penjaminan Mutu Internal (SPMI) sebagaimana diamanatkan pada Bab III Undang-Undang No. 12 Tahun 2012 tentang Pendidikan Tinggi, Direktorat Jenderal Pembelajaran dan Kemahasiswaan melalui Direktorat Penjaminan Mutu, mulai tahun 2016 telah menjalankan berbagai program penguatan SPMI di perguruan tinggi. Agar berbagai program tersebut berjalan dengan kondisi perguruan tinggi dalam mengimplementasikan SPMI, maka perlu dilakukan pemetaan tentang kondisi implementasi SPMI pada saat ini di perguruan tinggi masing-masing.\r\n<br>Sumber : RISTEKDIKTI', '1', '2017-11-16 17:23:18', '1');
INSERT INTO `front_contents` VALUES ('visi-dan-misi-spm', 'Visi dan Misi SPM', 'Visi:\r\n<br>\r\nMenjadi sebuah lembaga penjaminan mutu yang konsisten dan terpercaya dalam memfasilitasi pelaksanaan siklus sistem penjaminan mutu internal secara sinergis.\r\n<br><br>\r\nMisi :\r\n<br>\r\n1. Membangun sistem dokumen mutu yang sesuai dengan kebutuhan stakeholders,<br>\r\n2. Memfasilitasi Implementasi dokumen mutu,<br>\r\n3. Mendorong peningkatan kinerja akademik dan non akademik dalam melaksanakan penjaminan mutu internal,<br>\r\n4. Meningkatkan budaya mutu organisasi seluruh stakeholders.\r\n', '2', '2017-11-16 10:27:39', '1');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `idImages` int(11) NOT NULL AUTO_INCREMENT,
  `shortcutURL` varchar(255) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idImages`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', 'home', 'muha-assets/img/contents/logo.png', 'Tersedianya dokumen mutu yang memadai');
INSERT INTO `images` VALUES ('2', 'home', 'muha-assets/img/contents/logo.png', 'Terlaksananya siklus penjaminan mutu internal secara periodik dan berkelanjutan');
INSERT INTO `images` VALUES ('3', 'home', 'muha-assets/img/contents/logo.png', 'Terlaksananya sistim monitoring, evaluasi dan audit internal dan eksternal');
INSERT INTO `images` VALUES ('4', 'home', 'muha-assets/img/contents/logo.png', 'Meningkatnya kinerja unit pelaksana akademik dalam pelaksanaan Tridarma');
INSERT INTO `images` VALUES ('5', 'home', 'muha-assets/img/contents/logo.png', 'Meningkatnya kinerja unit kerja non akademik dalam mendukung pelaksanaan Tridarma');
INSERT INTO `images` VALUES ('6', 'home', 'muha-assets/img/contents/logo.png', 'Terwujudnya kesadaran dan tanggungjawab stakeholders dalam berperilaku organisasi untuk menuju budaya mutu');

-- ----------------------------
-- Table structure for `master_deskriptor`
-- ----------------------------
DROP TABLE IF EXISTS `master_deskriptor`;
CREATE TABLE `master_deskriptor` (
  `idDeskriptor` int(11) NOT NULL AUTO_INCREMENT,
  `idElemen` int(11) NOT NULL,
  `noUrut` double(5,1) NOT NULL,
  `deskriptor` text NOT NULL,
  `response` text NOT NULL,
  `skor` double(5,1) NOT NULL,
  `bobot` double(5,1) NOT NULL,
  `empat` text NOT NULL,
  `tiga` text NOT NULL,
  `dua` text NOT NULL,
  `satu` text NOT NULL,
  `nol` text NOT NULL,
  PRIMARY KEY (`idDeskriptor`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_deskriptor
-- ----------------------------
INSERT INTO `master_deskriptor` VALUES ('1', '1', '1.0', 'Kejelasan, kerealistikan, dan keterkaitan antar visi, misi, tujuan, dan sasaran program studi.\r\n', 'test', '4.0', '1.5', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('2', '1', '2.0', 'Strategi pencapaian sasaran dengan rentang waktu yang jelas dan didukung oleh dokumen.\r\n', '', '0.0', '3.0', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('3', '2', '0.0', 'Tingkat pemahaman sivitas akademika dan tenaga kependidikan terhadap visi, misi, tujuan dan sasaran unit pengelola program studi.\r\n', '', '0.0', '1.5', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('4', '3', '0.0', 'Tata pamong menjamin terwujudnya visi, terlaksananya misi, tercapainya tujuan, berhasilnya strategi yang digunakan secara kredibel, transparan, akuntabel, bertanggung jawab, dan adil.\r\n', '', '0.0', '2.3', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('5', '4', '0.0', 'Efisiensi dalam struktur organisasi.\r\n', '', '0.0', '1.1', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('6', '5', '0.0', 'Kepemimpinan yang efektif (kepemimpinan operasional, kepemimpinan organisasi, dan kepemimpinan publik).\r\n', '', '0.0', '2.3', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('7', '6', '0.0', 'Sistem pengelolaan fungsional dan operasional unit pengelola program studi diploma mencakup: Perencanaan, pengorganisasian, pengembangan staf, pengawasan, pengarahan, representasi, dan penganggaran yang efektif dilaksanakan.\nHal ini dicirikan dengan adanya dokumen:\n(4)  Renstra dan Renop Fakultas/ PT \n(5)  Rencana pengembangan unit pengelola program studi\n(6)  Organisasi yang mendukung\n(7)  Sistem pengawasan\n(8)  Standard Operating Procedure (SOP)\"\r\n', '', '0.0', '2.3', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('8', '7', '1.0', 'Keberadaan dan efektivitas unit pelaksana penjaminan mutu.\r\n', '', '0.0', '3.5', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('9', '7', '2.0', 'Ketersediaan dan pelaksanaan standar mutu.\r\n', '', '0.0', '3.5', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('10', '8', '1.0', 'Ketersediaan dokumen tentang penerimaan mahasiswa baru dan pelaksanaannya. Dokumen sistem penerimaan mahasiswa baru mencakup: \n(1)  kebijakan penerimaan mahasiswa baru\n(2)  kriteria penerimaan mahasiswa baru\n(3)  prosedur penerimaan mahasiswa baru\n(4)  instrumen penerimaan mahasiswa baru\n(5)  sistem pengambilan keputusan\"\r\n', '', '0.0', '2.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('11', '8', '2.0', 'Rasio mahasiswa baru transfer terhadap mahasiswa baru reguler.\n\nPenilaian butir ini dihitung dengan cara berikut:\n\nRM =  TMBT \nTMB\n\ndengan\nRM = rasio total mahasiswa baru transfer terhadap total mahasiswa baru bukan\ntransfer\nTMBT = total mahasiswa baru transfer dalam unit pengelola program diploma\nTMB = total mahasiswa baru bukan transfer dalam unit pengelola program diploma\"\r\n', '', '0.0', '2.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('12', '8', '3.0', 'Tujuan, proses penerimaan, dan mutu\nmahasiswa transfer.\n\nAlasan menerima mahasiswa transfer seharusnya untuk meningkatkan layanan pendidikan. Penerimaan mahasiswa transfer dilakukan dengan proses seleksi yang baik/ketat dalam upaya tetap menjaga mutu, tidak hanya karena pertimbangan ekonomi semata.\"\r\n', '', '0.0', '2.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('13', '9', '1.1', 'Rata-rata masa studi lulusan\nPenilaian butir ini dihitung dengan cara berikut:\nSkor akhir = Jumlah skor seluruh PS diploma sejenjang\nBanyaknya PS diploma sejenjang\nPerhitungan skor rata-rata masa studi:\n?     Skor untuk PS D4:\n1:  MS ? 5.5 tahun\n2: 5 ? MS < 5.5 tahun\n3: 4.5 ? MS < 5 tahun\n4: MS < 4.5 tahun\n?     Skor untuk PS D3:\n1:  MS ? 4.5 tahun\n2: 4 ? MS < 4.5 tahun\n3: 3.5 ? MS < 4 tahun\n4: MS < 3.5 tahun\n?     Skor untuk PS D2:\n1:  MS ? 3.5 tahun\n2: 3 ? MS < 3.5 tahun\n3: 2.5 ? MS < 3 tahun\n4: MS < 2.5 tahun\n?     Skor untuk PS D1:\n1:  MS ? 2.5 tahun\n2: 2 ? MS < 2.5 tahun\n3: 1.5 ? MS < 2 tahun\n4: MS < 1.5 tahun\"\r\n', '', '0.0', '2.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('14', '9', '1.2', 'Rata-rata IPK lulusan\nPenilaian butir ini dihitung dengan cara berikut:\nSkor akhir = Jumlah skor seluruh PS diploma sejenjang\nBanyaknya PS diploma sejenjang\nPerhitungan skor rata-rata IPK:\n1: 2.00 ? IPK ? 2.25\n2: 2.25 < IPK ? 2.50\n3: 2.50 < IPK ? 2.75\n4: IPK > 2.75\"\r\n', '', '0.0', '2.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('15', '9', '2.0', 'Upaya pengembangan dan peningkatan mutu lulusan: jenis program yang dilakukan dan efektivitas pelaksanaannya.\r\n', '', '0.0', '2.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('16', '10', '1.0', 'Kecukupan dan kualifikasi dosen tetap pada unit pengelola program studi diploma.\nSkor butir ini dihitung dengan cara berikut: Skor akhir = Jumlah skor seluruh program  studi \nBanyaknya program  studi\nKeterangan:\nPerhitungan skor untuk masing-masing program studi yang dikelola, sebagai berikut:\n2 : Memenuhi standar pelayanan minimum.\n3 : Dosen tetap sesuai dalam jumlah dan kualifikasi, dengan rasio mahasiswa: dosen kurang dari 17 atau lebih dari 23 untuk PS non-IPS; kurang dari 26 atau lebih dari 34 untuk PS IPS\n4 : Dosen tetap sesuai dalam jumlah dan kualifikasi, dengan rasio mahasiswa:dosen antara 17 s.d. 23 untuk PS non-IPS; antara 26 s.d. 34 untuk PS IPS\"\r\n', '', '0.0', '6.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('17', '10', '2.0', 'Dosen yang tugas belajar\nPerhitungan skor sebagai berikut: Apabila dosen tetap di unit pengelola program studi diploma yang berpendidikan (terakhir) S2/Profesi/Sp-1 dan S3/Sp-2 > 90%, maka skor pada butir ini = 4.\nJika tidak, skor butir ini dihitung dengan cara berikut:\nN2 = Jumlah dosen tetap unit pengelola program studi diploma yang mengikuti tugas belajar jenjang S2/Profesi/Sp-1\nN3 = Jumlah dosen tetap unit pengelola program studi diploma yang mengikuti tugas belajar jenjang S3/Sp-2\nN = Banyaknya program studi\nSD = 0.75 N2 +  1.25 N3 N\"\r\n', '', '0.0', '3.5', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('18', '10', '3.0', 'Upaya unit pengelola program studi diploma dalam mengembangkan tenaga dosen tetap.\nPenilaian butir ini dihitung dengan cara berikut:\nJika dosen tetap berpendidikan (terakhir) S2/Profesi/Sp-1 dan S3/Sp-2 > 90%, maka skor pada butir ini sama dengan 4.\nJika tidak, maka penentuan skor gunakan kolom di sebelah kanan.\"\r\n', '', '0.0', '3.5', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('19', '10', '4.0', 'Kecukupan, kompetensi, dan kualifikasi tenaga kependidikan.\r\n', '', '0.0', '5.2', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('20', '11', '0.0', 'Bentuk dukungan unit pengelola program studi diploma dalam penyusunan, implementasi, dan pengembangan kurikulum antara lain dalam bentuk penyediaan fasilitas, pengorganisasian kegiatan, serta bantuan pendanaan.\r\n', '', '0.0', '1.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('21', '12', '0.0', 'Unit pengelola program studi diploma melakukan monitoring dan evaluasi secara bersistem dan hasilnya digunakan untuk perbaikan proses pembelajaran.\r\n', '', '0.0', '1.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('22', '13', '0.0', 'Dukungan unit pengelola program studi diploma dalam penciptaan suasana akademik.\nDukungan dapat berupa: \n(1) kejelasan kebijakan tentang suasana akademik,\n(2) penyediaan sarana dan prasarana\n(3) dukungan dana yang cukup\n(4) kegiatan akademik di dalam dan di luar kelas yang mendorong interaksi akademik antara dosen dan mahasiswa untuk pengembangan perilaku kecendekiawanan. Setiap subbutir dinilai dengan gradasi: 4: sangat baik, 3: baik, 2: cukup, 1: kurang\nSkor akhir = Jumlah nilai subbutir dibagi 4.\"\r\n', 'test', '2.0', '1.7', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('23', '14', '1.1', 'Persentase perolehan dana dari mahasiswa dibandingkan dengan total penerimaan dana (= PDMHS)\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('24', '14', '1.2', 'Biaya satuan pendidikan per mahasiswa per tahun.\nBSP = Biaya satuan pendidikan per mahasiswa per tahun.\"\r\n', '', '0.0', '2.8', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('25', '14', '1.3', 'Dana penelitian dalam tiga tahun terakhir.\nRata-rata dana penelitian/dosen tetap/tahun (=RPD)\"\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('26', '14', '1.4', 'Dana yang diperoleh dalam rangka pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir.\nRata-rata dana pengabdian/dosen tetap/tahun (=RPKM)\"\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('27', '14', '2.1', 'Kecukupan dana yang diperoleh unit pengelola program studi diploma.\nKet: Dana operasional dikatakan cukup jika dana yang diperoleh lebih dari Rp 15 juta/mahasiswa.\"\r\n', '', '0.0', '0.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('28', '14', '2.2', 'Upaya pengembangan dana.\nJika skor pada butir 6.1.2.1 = 4, maka skor pada butir ini = 4. Jika tidak, gunakan aturan di sebelah kanan.\"\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('29', '15', '1.0', 'Investasi untuk pengadaan sarana dalam tiga tahun terakhir dibandingkan dengan kebutuhan saat ini.\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('30', '15', '2.0', 'Rencana investasi untuk pengadaan sarana dalam lima tahun ke depan. \nCatatan: Jika sarana dinilai sangat lengkap, maka skor butir ini sama dengan empat.\"\r\n', '', '0.0', '0.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('31', '16', '1.0', 'Mutu dan kecukupan akses prasarana yang dikelola unit pengelola program studi diploma untuk keperluan PS.\nKelengkapan prasarana mencakup prasarana akademik (pendukung kegiatan tridarma) dan non-akademik (fasilitas pengembangan minat, bakat dan kesejahteraan).\"\r\n', '', '0.0', '2.8', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('32', '16', '2.0', 'Rencana pengembangan prasarana oleh unit pengelola program studi diploma.\nJika prasarana dikelola di tingkat perguruan tinggi, maka informasi tentang prasarana mesti digali pada tingkat tersebut.\"\r\n', '', '0.0', '0.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('33', '17', '1.1', 'Pemanfaatan teknologi komunikasi dan informasi untuk proses pembelajaran, termasuk e-learning.\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('34', '17', '1.2', 'Pemanfaatan teknologi komunikasi dan informasi untuk penyelenggaraan administrasi (misalkan SIAKAD, SIMKEU, SIMAWA, SIMFA, SIMPEG).\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('35', '17', '1.3', 'Pemanfaatan teknologi komunikasi dan informasi untuk proses pengambilan keputusan dalam pengembangan institusi (antara lain informasi berupa deskripsi, ringkasan, dan trend berbagai jenis data).\r\n', '', '0.0', '0.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('36', '17', '2.0', 'Aksesibilitas data dalam sistem informasi dan komunikasi.\nNilai butir ini didasarkan pada hasil penilaian 12 jenis data (lihat kolom 1 pada tabel butir 6.4.2) dengan cara berikut:\nSkor akhir = Jumlah keseluruhan skor dari 12 jenis data 12\nSedang Untuk setiap jenis data, penilaian didasarkan atas aturan berikut:\n1: Data ditangani secara manual\n2: Data ditangani dengan komputer tanpa jaringan\n3: Data ditangani dengan komputer, serta dapat diakses melalui jaringan lokal (Local Area Network, LAN)\n4: Data ditangani dengan komputer, serta dapat diakses melalui jaringan luas (Wide Area Network, WAN)\"\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('37', '17', '3.0', 'Media/cara penyebaran informasi/kebijakan untuk sivitas akademika dan tenaga kependidikan di unit pengelola program studi diploma dapat dilakukan melalui enam jenis media:\n1.   Rapat/pertemuan\n2.   Surat\n3.   Faksimili/telepon/SMS\n4.   e-mail\n5.   Mailing list\n6.   Buletin\n7.   Lainnya\"\r\n', '', '0.0', '1.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('38', '17', '4.0', 'Rencana strategis pengembangan sistem informasi jangka panjang: mempertimbangkan perkembangan teknologi informasi, dan komitmen unit pengelola program studi diploma dalam hal pendanaan.\r\n', '', '0.0', '0.9', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('39', '18', '1.1', 'Banyaknya kegiatan penelitian dosen tetap program studi diploma sejenjang.\nPenilaian butir ini dihitung dengan cara berikut: Skor akhir = Jumlah skor seluruh program  studi diploma  sejenjang\nBanyaknya program  studi diploma  sejenjang\nSedangkan penghitungan skor untuk masing-masing program studi diploma sejenjang yang dikelola unit pengelola program studi diploma adalah sebagai berikut:\nRJP = rata-rata jumlah penelitian per dosen tetap per tiga tahun\n0: Tidak ada penelitian.\n1: 0 < RJP < 0.2\n2: 0.2 ? RJP < 0.6\n3: 0.6 ? RJP < 1.0\n4: RJP ?  1.0\"\r\n', '', '0.0', '1.6', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('40', '18', '1.2', 'Besar dana penelitian dosen tetap program studi diploma sejenjang.\nPenilaian butir ini dihitung dengan cara berikut: Skor akhir = Jumlah skor seluruh program  studi diploma  sejenjang\nBanyaknya program  studi diploma  sejenjang. Sedangkan penghitungan skor untuk masing-masing program studi diploma yang dikelola unit pengelola program studi diploma adalah sebagai berikut:\n0: Tidak ada dana penelitian.\n1: Ada dana penelitian, namun rata-rata dana penelitian < Rp 0.5 juta per dosen tetap per tahun.\n2: Rata-rata dana penelitian lebih atau sama dengan Rp 0.5 juta tapi kurang dari Rp 1 juta per dosen tetap per tahun.\n3: Rata-rata dana penelitian lebih atau sama dengan Rp 1 juta tapi kurang dari Rp 2 juta per dosen tetap per tahun\n4: Rata-rata dana penelitian lebih atau sama dengan Rp 2 juta per dosen tetap per tahun.\"\r\n', '', '0.0', '1.6', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('41', '18', '2.0', 'Upaya pengembangan kegiatan penelitian oleh unit pengelola program studi diploma.\r\n', '', '0.0', '0.8', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('42', '19', '1.1', 'Banyak kegiatan PkM dosen tetap seluruh program studi diploma sejenjang.\nPenilaian butir ini dihitung dengan cara berikut: Skor akhir = Jumlah skor seluruh PS diploma sejenjangBanyaknya PS diploma sejenjang \nSedangkan penghitungan skor untuk masing-masing program studi diploma yang dikelola unit pengelola program studi diploma adalah sebagai berikut: RPkM = rata-rata banyaknya kegiatan PkM per dosen per 3 tahun.\n0: Tidak ada kegiatan PkM\n1: 0 < RPkM < 0.5\n2: 0.5 ? RPkM < 1.0\n3: 1.0 ? RPkM < 2.0\n4: RPkM ? 2\"\r\n', '', '0.0', '2.4', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('43', '19', '1.2', 'Besar dana PkM dosen tetap seluruh program studi diploma sejenjang.\nPenilaian butir ini dihitung dengan cara berikut: Skor akhir = Jumlah skor seluruh PS diploma sejenjang\nBanyaknya PS  diploma sejenjang\nSedangkan penghitungan skor untuk masing-masing program studi diploma yang dikelola unit pengelola program studi diploma adalah sebagai berikut:\n0: Tidak ada dana PkM\n1: Ada dana PkM, namun rata-rata dana PkM < Rp 1 juta per dosen tetap per tahun.\n2: Rata-rata dana PkM lebih lebih atau sama dengan Rp 1 juta tapi kurang dari Rp 2.5 juta per dosen tetap per tahun.\n3: Rata-rata dana PkM lebih atau sama dengan Rp 2.5 juta tapi kurang dari Rp 4 juta per dosen tetap per tahun.\n4: Rata-rata dana PkM lebih atau sama dengan Rp 4 juta per dosen tetap per tahun.\"\r\n', '', '0.0', '1.6', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('44', '19', '2.0', 'Upaya pengembangan kegiatan PkM oleh unit pengelola program studi diploma.\r\n', '', '0.0', '1.6', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('45', '20', '1.0', 'Kegiatan kerjasama dengan instansi di dalam negeri dalam tiga tahun terakhir\nCatatan; Tingkat kecukupan bergantung pada jumlah dosen tetap unit pengelola program studi diploma\"\r\n', '', '0.0', '1.6', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');
INSERT INTO `master_deskriptor` VALUES ('46', '20', '2.0', 'Kegiatan kerjasama dengan instansi di luar negeri dalam tiga tahun terakhir.\nCatatan; Tingkat kecukupan bergantung pada jumlah dosen tetap unit pengelola program studi diploma\"\r\n', '', '0.0', '0.8', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Sangat jelas\r\n(2)  Sangat realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Jelas\r\n(2)  Realistik\r\n(3)  Saling terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang:\r\n(1)  Cukup jelas\r\n(2)  Cukup realistik\r\n(3)  Kurang terkait satu sama lain\r\n', 'Memiliki visi, misi, tujuan, dan sasaran yang: \r\n(1)  Tidak jelas\r\n(2)  Tidak realistik\r\n(3)  Tidak terkait satu sama lain.\r\n', '(Tidak ada skor = 0)');

-- ----------------------------
-- Table structure for `master_elemen`
-- ----------------------------
DROP TABLE IF EXISTS `master_elemen`;
CREATE TABLE `master_elemen` (
  `idElemen` int(11) NOT NULL AUTO_INCREMENT,
  `standar` int(3) NOT NULL,
  `noUrut` int(3) NOT NULL,
  `elemen` text NOT NULL,
  `idKategori` int(2) NOT NULL,
  PRIMARY KEY (`idElemen`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_elemen
-- ----------------------------
INSERT INTO `master_elemen` VALUES ('1', '1', '1', 'Visi, misi, tujuan, dan sasaran, serta strategi pencapaian sasaran unit pengelola program studi diploma.', '2');
INSERT INTO `master_elemen` VALUES ('2', '1', '2', 'Pemahaman visi, misi, tujuan, dan sasaran unit pengelola program studi diploma oleh seluruh pemangku kepentingan internal (internal stakeholders): sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan.', '2');
INSERT INTO `master_elemen` VALUES ('3', '2', '1', 'Tata pamong adalah sistem yang bisa menjamin terlaksananya lima pilar tata pamong yaitu: (1)  kredibel, (2)  transparan, (3)  akuntabel, (4) bertanggung jawab, (5)  adil', '2');
INSERT INTO `master_elemen` VALUES ('4', '2', '2', 'Struktur organisasi.Kelengkapan dan efisiensi dalam struktur organisasi, serta dukungan struktur organisasi terhadap pengelolaan program- program studi di bawahnya.', '2');
INSERT INTO `master_elemen` VALUES ('5', '2', '3', 'Kepemimpinan unit pengelola program studi diploma.', '2');
INSERT INTO `master_elemen` VALUES ('6', '2', '4', 'Sistem pengelolaan fungsional dan operasional unit pengelola program studi diploma.', '2');
INSERT INTO `master_elemen` VALUES ('7', '2', '5', 'Unit pelaksana penjaminan mutu.', '2');
INSERT INTO `master_elemen` VALUES ('8', '3', '1', 'Mahasiswa. Sistem rekrutmen dan seleksi mahasiswa baru dan efektivitas implementasinya.', '2');
INSERT INTO `master_elemen` VALUES ('9', '3', '2', 'Lulusan: Rata-rata masa studi lulusan dan IPK rata-rata, upaya pengembangan dan peningkatan mutu lulusan.', '2');
INSERT INTO `master_elemen` VALUES ('10', '4', '1', 'Dosen tetap: Kecukupan dan kualifikasi dosen tetap, jumlah penggantian, perekrutan serta pengembangan dosen tetap, serta upaya unit pengelola program studi diploma dalam mengembangkan tenaga dosen tetap. Catatan: Jika penyelenggaraan program studi tidak memenuhi Standar Pelayanan Minimum, maka proses akreditasi tidak dapat dilanjutkan (ditangguhkan)', '2');
INSERT INTO `master_elemen` VALUES ('11', '5', '1', 'Peran unit pengelola program studi diploma dalam penyusunan, implementasi, dan pengembangan kurikulum untuk program studi yang dikelola.', '2');
INSERT INTO `master_elemen` VALUES ('12', '5', '2', 'Peran unit pengelola program studi diploma dalam memonitor dan mengevaluasi proses pembelajaran', '2');
INSERT INTO `master_elemen` VALUES ('13', '5', '3', 'Peran Unit pengelola program studi diploma dalam penciptaan suasana akademik yang kondusif.', '2');
INSERT INTO `master_elemen` VALUES ('14', '6', '1', 'Pembiayaan: Sumber dan kecukupan dana, upaya institusi dalam menyikapi kondisi pendanaan saat ini dan upaya- upaya penanggulangannya jika terdapat kekurangan.', '2');
INSERT INTO `master_elemen` VALUES ('15', '6', '2', 'Sarana: nilai investasi yang telah dilakukan dalam tiga tahun terakhir serta rencana investasi dalam lima tahun ke depan.', '2');
INSERT INTO `master_elemen` VALUES ('16', '6', '3', 'Prasarana: mutu dan kecukupan akses serta rencana pengembangannya', '2');
INSERT INTO `master_elemen` VALUES ('17', '6', '4', 'Sistem informasi: jenis sistem informasi yang digunakan dalam proses pembelajaran dan administrasi (akademik, keuangan, kepegawaian), aksesibilitas data dalam sistem informasi, media/cara penyebaran informasi/kebijakan untuk sivitas akademika, serta rencana strategis pengembangan sistem informasi jangka panjang.', '2');
INSERT INTO `master_elemen` VALUES ('18', '7', '1', 'Kegiatan penelitian: banyaknya kegiatan, total dana penelitian, dan upaya pengembangan kegiatan penelitian', '2');
INSERT INTO `master_elemen` VALUES ('19', '7', '2', 'Kegiatan pelayanan/pengabdian kepada masyarakat (PkM): banyaknya kegiatan, total dana PkM, dan upaya pengembangan kegiatan pelayanan/pengabdian kepada masyarakat', '2');
INSERT INTO `master_elemen` VALUES ('20', '7', '3', 'Jumlah dan mutu kerjasama yang efektif yang mendukung pelaksanaan misi unit pengelola program studi diploma dan dampak kerjasama untuk penyelenggaraan dan pengembangan program studi', '2');

-- ----------------------------
-- Table structure for `master_gender`
-- ----------------------------
DROP TABLE IF EXISTS `master_gender`;
CREATE TABLE `master_gender` (
  `idGender` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(20) NOT NULL,
  PRIMARY KEY (`idGender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_gender
-- ----------------------------
INSERT INTO `master_gender` VALUES ('1', 'Pria');
INSERT INTO `master_gender` VALUES ('2', 'Wanita');

-- ----------------------------
-- Table structure for `master_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `master_kategori`;
CREATE TABLE `master_kategori` (
  `idKategori` int(2) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`idKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kategori
-- ----------------------------
INSERT INTO `master_kategori` VALUES ('1', 'Borang Program Studi');
INSERT INTO `master_kategori` VALUES ('2', 'Borang Institusi');

-- ----------------------------
-- Table structure for `master_user`
-- ----------------------------
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user` (
  `idUser` int(11) NOT NULL,
  `identityNo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `idGender` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `regdate` date NOT NULL,
  `modifyDate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `statNote` varchar(50) NOT NULL,
  `statUpdate` date NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('2017110001', '123456789101', 'ibnumuha12@gmail.com', 'admin', 'waduh', 'Administrator', 'Cilegon', 'Administrator', '1', '1', '2017-11-13', '2017-11-13', '1', '', '2017-11-13');

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `idTemplate` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`idTemplate`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('1', 'Konten Standar Dengan Carrousel', 'muha-assets/img/template/template1.PNG');
INSERT INTO `template` VALUES ('2', 'Konten Standar Tanpa Carrousel', 'muha-assets/img/template/template2.PNG');
INSERT INTO `template` VALUES ('3', 'Konten Dua Kolom Dengan Carrousel', 'muha-assets/img/template/template3.PNG');
INSERT INTO `template` VALUES ('4', 'Konten Dua Kolom Tanpa Carrousel', 'muha-assets/img/template/template4.PNG');
