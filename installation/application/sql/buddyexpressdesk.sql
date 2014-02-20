-- BSERVER
-- version 2.0.9
-- http://www.buddyexpress.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table structure for table `bdesk_articles`
--

CREATE TABLE IF NOT EXISTS `bdesk_articles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `owner_id` bigint(20) NOT NULL,
  `article` longtext CHARACTER SET utf8 NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bdesk_articles`
--

INSERT INTO `bdesk_articles` (`id`, `owner_id`, `article`, `time`, `title`) VALUES
(9, 1, '&lt;p&gt;BuddyexpressDesk or BuddyDesk is a web application project started by buddyexpress.net core development team in Desember 2013, this project help&amp;rsquo;s the people to create their website easily.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;A person using BuddyexpressDesk don&#039;t need to write any code for develop their website.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '04-12-13 07:12:00 PM', 'What is BuddyexpressDesk ?'),
(10, 1, '&lt;p&gt;&lt;span style=&quot;font-family: &#039;PT Sans&#039;, sans-serif; font-size: small;&quot;&gt;&lt;span style=&quot;line-height: 19px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '04-12-13 07:12:21 PM', 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Table structure for table `bdesk_components`
--

CREATE TABLE IF NOT EXISTS `bdesk_components` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `com_id` text NOT NULL,
  `active` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bdesk_components`
--

INSERT INTO `bdesk_components` (`id`, `com_id`, `active`) VALUES
(10, 'bdesk_search', '1'),
(9, 'besk_editor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bdesk_components_settings`
--

CREATE TABLE IF NOT EXISTS `bdesk_components_settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `com_id` text NOT NULL,
  `field` text NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bdesk_custom_photos`
--

CREATE TABLE IF NOT EXISTS `bdesk_custom_photos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `store` text NOT NULL,
  `name` text NOT NULL,
  `mime` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bdesk_site`
--

CREATE TABLE IF NOT EXISTS `bdesk_site` (
  `id` int(1) NOT NULL,
  `template` text NOT NULL,
  `site` text NOT NULL,
  `default_lang` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bdesk_site`
--

INSERT INTO `bdesk_site` (`id`, `template`, `site`, `default_lang`) VALUES
(1, 'default', '', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `bdesk_users`
--

CREATE TABLE IF NOT EXISTS `bdesk_users` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `active` text CHARACTER SET utf8 NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bdesk_users`
--

INSERT INTO `bdesk_users` (`uid`, `name`, `email`, `type`, `active`, `password`) VALUES
(1, 'Administrator', 'buddydesk@buddyexpress.net', 'admin', '1', '200ceb26807d6bf99fd6f4f0d1ca54d4');
