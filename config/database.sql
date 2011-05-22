-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `sjstyleswitcher_fontsizes` blob NULL,
  `sjstyleswitcher_styles` blob NULL,
  `sjstyleswitcher_cookielifetime` int(10) NOT NULL default '0',
  `sjstyleswitcher_alternatestyles` char(1) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;