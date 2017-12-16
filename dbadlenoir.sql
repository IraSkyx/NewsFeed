-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 déc. 2017 à 22:38
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbadlenoir`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flux`
--

INSERT INTO `flux` (`id`, `name`, `link`) VALUES
(3, 'Engadget', 'https://www.engadget.com/rss.xml'),
(9, 'abcnews', 'http://abcnews.go.com/abcnews/worldnewsheadlines');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `link` varchar(200) NOT NULL,
  `guid` varchar(200) NOT NULL,
  `pubdate` datetime NOT NULL,
  `category` varchar(1000) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`title`, `description`, `link`, `guid`, `pubdate`, `category`) VALUES
('WATCH:  David Muir discusses fake news with Jimmy Kimmel', 'World News Tonight Anchor David Muir on Feb. 15, 2017, tells Jimmy Kimmel if you underestimate the audience, you do so at your own peril.', 'http://abcnews.go.com/Entertainment/video/david-muir-discusses-fake-news-jimmy-kimmel-45549891', 'http://abcnews.go.com/Entertainment/video/david-muir-discusses-fake-news-jimmy-kimmel-45549891', '2017-02-17 01:17:21', 'Entertainment'),
('WATCH:  David Muir\'s full interview on \'Jimmy Kimmel Live\'', 'Jimmy Kimmel interviews \"World News Tonight\" Anchor David Muir on \"Jimmy Kimmel Live,\" Feb. 15. 2017.', 'http://abcnews.go.com/Entertainment/video/david-muirs-full-interview-jimmy-kimmel-live-45550323', 'http://abcnews.go.com/Entertainment/video/david-muirs-full-interview-jimmy-kimmel-live-45550323', '2017-02-17 01:42:32', 'Entertainment'),
('Biden, Meghan McCain get emotional talking about her father\'s cancer diagnosis', 'The former vice president was interviewed on &quot;The View.&quot;', 'http://abcnews.go.com/Politics/biden-praises-doug-jones-alabama-upset-rejecting-trump/story?id=51764810', 'http://abcnews.go.com/Politics/biden-praises-doug-jones-alabama-upset-rejecting-trump/story?id=51764810', '2017-12-13 18:48:44', 'Politics'),
('President Trump: Construction of border wall will begin in months', 'President Trump speaks with ABC News anchor David Muir in his first one-on-one interview as commander in chief of the U.S.', 'http://abcnews.go.com/Politics/president-trump-tells-abc-news-david-muir-construction/story?id=45007943', 'http://abcnews.go.com/Politics/president-trump-tells-abc-news-david-muir-construction/story?id=45007943', '2017-02-13 14:47:25', 'Politics'),
('Sen. Gillibrand says she took Trump\'s \'do anything\' remark as sexual innuendo', '&quot;Well, certainly that\'s how I and many people read it.&quot;', 'http://abcnews.go.com/Politics/sen-kirsten-gillibrand-trump-sexual-innuendo-stifle-voice/story?id=51762607', 'http://abcnews.go.com/Politics/sen-kirsten-gillibrand-trump-sexual-innuendo-stifle-voice/story?id=51762607', '2017-12-13 17:04:18', 'Politics'),
('TRANSCRIPT: ABC News anchor David Muir interviews President Trump', 'This is a transcript of ABC News anchor David Muirâ€™s interview with President Trump on Jan. 25, 2017.', 'http://abcnews.go.com/Politics/transcript-abc-news-anchor-david-muir-interviews-president/story?id=45047602', 'http://abcnews.go.com/Politics/transcript-abc-news-anchor-david-muir-interviews-president/story?id=45047602', '2017-02-13 14:20:48', 'Politics'),
('TRANSCRIPT: ABC News Anchor David Muir Speaks With President Trump', 'This is a second transcript of ABC News anchor David Muirâ€™s interview with President Trump on Jan. 25, 2017, as they walked the White House grounds.', 'http://abcnews.go.com/Politics/transcript-abc-news-anchor-david-muir-speaks-president/story?id=45096081', 'http://abcnews.go.com/Politics/transcript-abc-news-anchor-david-muir-speaks-president/story?id=45096081', '2017-01-28 12:14:03', 'Politics'),
('Trump adviser Omarosa Manigault resigning, White House says', 'Manigault, a high-profile member of Trump\'s team, resigned Tuesday.', 'http://abcnews.go.com/Politics/trump-adviser-omarosa-manigault-resigning-post-white-house/story?id=51766259', 'http://abcnews.go.com/Politics/trump-adviser-omarosa-manigault-resigning-post-white-house/story?id=51766259', '2017-12-14 19:10:20', 'Politics'),
('Coldest air of season grips Northeast with bitter wind chills', 'The Northeast is expecting single-digit wind chills on Wednesday.', 'http://abcnews.go.com/US/coldest-air-season-grips-northeast-bitter-wind-chills/story?id=51760867', 'http://abcnews.go.com/US/coldest-air-season-grips-northeast-bitter-wind-chills/story?id=51760867', '2017-12-13 13:57:39', 'US'),
('Las Vegas massacre survivor leaves hospital: \'I still got a lot of living to do\'', 'A survivor of the Las Vegas music festival shooting expresses thanks to his girlfriend for saving his life and says they\'re both ready for the next chapter.', 'http://abcnews.go.com/US/las-vegas-massacre-survivor-leaves-hospital-lot-living/story?id=51768702', 'http://abcnews.go.com/US/las-vegas-massacre-survivor-leaves-hospital-lot-living/story?id=51768702', '2017-12-14 02:32:43', 'US'),
('WATCH:  Blind triplets credit their father with helping them earn highest rank in Boy Scouts', 'Nick, Leo and Steven Cantos thanked father Ollie Cantos for his encouragement.', 'http://abcnews.go.com/WNT/video/blind-triplets-credit-father-helping-earn-highest-rank-51523166', 'http://abcnews.go.com/WNT/video/blind-triplets-credit-father-helping-earn-highest-rank-51523166', '2017-12-04 16:59:46', 'WNT'),
('WATCH:  2 mariners rescued after being adrift in the Pacific for 5 months', 'The two women and their dogs were rescued by the Navy after being spotted 900 miles off the coast of Japan.', 'http://abcnews.go.com/WNT/video/mariners-rescued-adrift-pacific-months-50771893', 'http://abcnews.go.com/WNT/video/mariners-rescued-adrift-pacific-months-50771893', '2017-10-28 00:22:51', 'WNT'),
('WATCH:  World News 12/09/17: Students Lend Helping Hand to Beloved Bus Driver', 'Tensions build between Trump, civil rights activist John Lewis; Potential hazards of Christmas light decorations', 'http://abcnews.go.com/WNT/video/weekend-world-news-120917-students-lend-helping-hand-51694807', 'http://abcnews.go.com/WNT/video/weekend-world-news-120917-students-lend-helping-hand-51694807', '2017-12-12 17:58:19', 'WNT'),
('WATCH:  World News 12/04/17: Families With the Best Christmas Light Displays', 'Trump\'s new tax plan would provide top 1% with 62% of tax benefit; Parents settle lawsuit with dentist over death of their daughter', 'http://abcnews.go.com/WNT/video/world-news-120417-families-best-christmas-light-displays-51578134', 'http://abcnews.go.com/WNT/video/world-news-120417-families-best-christmas-light-displays-51578134', '2017-12-05 04:36:40', 'WNT'),
('WATCH:  World News 12/05/17: Russia Barred from Participating in the 2018 Winter Olympics', 'California governor declares a state of emergency due to wildfires in Ventura County; Body camera captures Georgia cop saving infant in distress', 'http://abcnews.go.com/WNT/video/world-news-120517-russia-barred-participating-2018-winter-51603510', 'http://abcnews.go.com/WNT/video/world-news-120517-russia-barred-participating-2018-winter-51603510', '2017-12-06 04:32:46', 'WNT'),
('WATCH:  World News 12/06/17: Trump Recognizes Jerusalem as the Capital of Israel and Plans to Move US Embassy from Tel Aviv', 'At least 38 senators call on Al Franken to resign; 4 major fires continue to burn and endanger residents in California', 'http://abcnews.go.com/WNT/video/world-news-120617-trump-recognizes-jerusalem-capital-israel-51634433', 'http://abcnews.go.com/WNT/video/world-news-120617-trump-recognizes-jerusalem-capital-israel-51634433', '2017-12-07 04:13:32', 'WNT'),
('WATCH:  World News 12/07/17: Sen. Al Franken to Resign from Senate Amid Sexual Misconduct Allegations', 'Ex-cop sentenced for shooting death of Walter Scott, People scrambling to escape the flames but not their humanity', 'http://abcnews.go.com/WNT/video/world-news-120717-sen-al-franken-resign-senate-51659384', 'http://abcnews.go.com/WNT/video/world-news-120717-sen-al-franken-resign-senate-51659384', '2017-12-08 19:57:40', 'WNT'),
('WATCH:  World News 12/08/17: First Responders Work Around the Clock Saving Lives', 'Misconduct crisis grows on Capitol Hill; FBI interviewed 21-year-old gunman back in 2016', 'http://abcnews.go.com/WNT/video/world-news-120817-responders-work-clock-saving-lives-51683747', 'http://abcnews.go.com/WNT/video/world-news-120817-responders-work-clock-saving-lives-51683747', '2017-12-09 04:45:48', 'WNT'),
('WATCH:  World News 12/10/17: California\'s Thomas Fire Intensifying', 'Moore denies allegations in new TV interview; 8-year-old New Jersey boy in spirit of giving back to Puerto Rico', 'http://abcnews.go.com/WNT/video/world-news-121017-californias-thomas-fire-intensifying-51709497', 'http://abcnews.go.com/WNT/video/world-news-121017-californias-thomas-fire-intensifying-51709497', '2017-12-11 03:17:42', 'WNT'),
('WATCH:  World News 12/11/17: New York City on Heightened Alert after ISIS-Inspired Attack', 'Women accusing Trump of sexual misconduct urge Congress to investigate; Detroit police hunt for gunman taking aim along Michigan highways', 'http://abcnews.go.com/WNT/video/world-news-121117-york-city-heightened-alert-isis-51730539', 'http://abcnews.go.com/WNT/video/world-news-121117-york-city-heightened-alert-isis-51730539', '2017-12-12 05:03:37', 'WNT'),
('WATCH:  World News 12/12/17: 6 Democratic Senators Call on Trump to Resign Over Sexual Misconduct Claims', 'Alabama voters head to polls for divisive Senate race; Authorities reveal more details on NYC subway bomber Akayed Ullah', 'http://abcnews.go.com/WNT/video/world-news-121217-democratic-senators-call-trump-resign-51754679', 'http://abcnews.go.com/WNT/video/world-news-121217-democratic-senators-call-trump-resign-51754679', '2017-12-13 10:05:53', 'WNT'),
('WATCH:  World News 12/13/17: Trump Responds After Doug Jones Wins Alabama Senate Race', '11-year-old girl wrongfully handcuffed by police in front of mother and aunt; Las Vegas shooting victim paralyzed after protecting girlfriend', 'http://abcnews.go.com/WNT/video/world-news-121317-trump-responds-doug-jones-wins-51780237', 'http://abcnews.go.com/WNT/video/world-news-121317-trump-responds-doug-jones-wins-51780237', '2017-12-14 04:39:23', 'WNT'),
('WATCH:  World News 12/14/17: Omarosa Manigault Talks About Her Resignation', 'Americans across the country share their holiday baking traditions; Disney makes $52.4 billion deal to expand its universe', 'http://abcnews.go.com/WNT/video/world-news-121417-omarosa-manigault-talks-resignation-51803280', 'http://abcnews.go.com/WNT/video/world-news-121417-omarosa-manigault-talks-resignation-51803280', '2017-12-15 04:10:45', 'WNT'),
('WATCH:  World News 12/15/17: More Than Half a Dozen Women Accuse Dustin Hoffman of Sexual Harassment', 'Soldier returns and surprises his daughter at daycare; Federal judge nominee Matthew Peterson struggles under questioning', 'http://abcnews.go.com/WNT/video/world-news-121517-half-dozen-women-accuse-dustin-51827022', 'http://abcnews.go.com/WNT/video/world-news-121517-half-dozen-women-accuse-dustin-51827022', '2017-12-16 03:44:21', 'WNT'),
('David Muir on reporting to a \'divided America\' to Jimmy Kimmel', 'Muir discusses the presidential election and why all voices should be heard.', 'http://abcnews.go.com/WNT/WNT/world-news-tonights-david-muir-jimmy-kimmel-live/story?id=45550187', 'http://abcnews.go.com/WNT/WNT/world-news-tonights-david-muir-jimmy-kimmel-live/story?id=45550187', '2017-03-09 21:38:37', 'WNT'),
('Apple Music\'s next exclusives come from Noel Gallagher and Sam Smith', 'Apple isn&#039;t slowing down on exclusives any time soon.  It&#039;s releasing Apple Music-only concert films from two British superstars, Noel Gallagher and Sam Smith.  Gallagher&#039;s Who Built the Moon Live recaptures an early November gig at London&#039;s York Hal...', 'https://www.engadget.com/2017/12/15/apple-music-video-exclusives-from-noel-gallagher-sam-smith/', 'https://www.engadget.com/2017/12/15/apple-music-video-exclusives-from-noel-gallagher-sam-smith/', '2017-12-15 20:59:00', 'apple, applemusic, concert, entertainment, gear, internet, noelgallagher, samsmith, services, streaming, video'),
('Apple signs â€˜Battlestar Galacticaâ€™ developer for new space drama', 'Apple has ordered yet another TV series to add to its growing list of star-backed original productions. The company signed network sci-fi luminary Ronald D. Moore, veteran of several Star Trek series and developer of the Battlestar Galactica reboot,...', 'https://www.engadget.com/2017/12/15/apple-signs-battlestar-galactica-developer-for-new-space-drama/', 'https://www.engadget.com/2017/12/15/apple-signs-battlestar-galactica-developer-for-new-space-drama/', '2017-12-15 19:12:00', 'apple, av, battlestargalactica, entertainment, scifi, services, television'),
('As online ads fail, sites mine cryptocurrency', 'Between the incessant headlines and chatter on social media, it feels like everywhere we go some libertarian evangelist appears asking us if we have a second to talk about the blockchain -- like a religious wingnut lurking outside the grocery store.', 'https://www.engadget.com/2017/12/15/as-online-ads-fail-sites-mine-cryptocurrency/', 'https://www.engadget.com/2017/12/15/as-online-ads-fail-sites-mine-cryptocurrency/', '2017-12-15 20:00:00', 'badpassword, bitcoin, blockchain, coinhive, cryptocurrency, editorial, gear, mining, monero, opinion, security, starbucks'),
('BlackBerry will shutter its app store on December 31st, 2019', 'While there&#039;s little doubt that BlackBerry&#039;s in-house mobile platforms are finished (the last BB10 device shipped over 2 years ago), it&#039;s now giving holdouts some not-so-subtle hints that it&#039;s time to move on. The company has announced that it&#039;s shut...', 'https://www.engadget.com/2017/12/15/blackberry-app-store-closes-in-2019/', 'https://www.engadget.com/2017/12/15/blackberry-app-store-closes-in-2019/', '2017-12-15 19:44:00', 'blackberry, blackberry10, blackberryos, blackberryplaybook, blackberrytravel, blackberryworld, gear, mobile, playbook, smartphone'),
('Eve V review: The wisdom of the crowd mostly pays off', 'If you&#039;ve never heard of Eve, I like to think of it as the OnePlus of computers: By ditching middlemen, this 11-person startup found a way to build and sell premium computers at a significant discount. The difference is, the people in charge didn&#039;t d...', 'https://www.engadget.com/2017/12/15/eve-v-review/', 'https://www.engadget.com/2017/12/15/eve-v-review/', '2017-12-15 19:30:00', 'convertible, eve, evev, gear, hybrid, laptop, pc, personal computing, personalcomputing, review, video, windows, windows10'),
('Facebook tests option to bypass profiles and only post to News Feed', 'Facebook appears to be testing different options for how users share posts. The Next Web&#039;s Matt Navarra tweeted tests of two new ways to post content that let you bypass posting to your profile.', 'https://www.engadget.com/2017/12/15/facebook-bypass-profiles-post-to-news-feed/', 'https://www.engadget.com/2017/12/15/facebook-bypass-profiles-post-to-news-feed/', '2017-12-15 18:51:00', 'av, facebook, facebookprofile, gear, internet, mobile, mute, newsfeed'),
('Facebook tackles the question of whether social media is bad for us', 'As part of its &quot;Hard Questions&quot; series, Facebook took on the question of whether social media is good or bad for us. Citing a handful of academic studies, some done by Facebook researchers, Facebook Director of Research David Ginsberg and research sc...', 'https://www.engadget.com/2017/12/15/facebook-tackles-whether-social-media-is-bad/', 'https://www.engadget.com/2017/12/15/facebook-tackles-whether-social-media-is-bad/', '2017-12-15 20:41:00', 'av, facebook, gear, internet, markzuckerberg, mentalhealth, mobile, psychology, research, seanparker, socialmedia, socialnetwork, video'),
('Google Chrome beta delivers mute tool for autoplay videos', 'Months ago, a blog post by the good developers of Chrome let its users know that come January, users would be free of audio from autoplaying videos. As far as we know, those upgrades is still on track to arrive in early 2018 for all users, but you ca...', 'https://www.engadget.com/2017/12/15/google-chrome-64-beta-delivers-mute-autoplay-video-muting/', 'https://www.engadget.com/2017/12/15/google-chrome-64-beta-delivers-mute-autoplay-video-muting/', '2017-12-15 22:01:00', 'autoplay, chrome, chromebeta, google, internet'),
('Google ends Tango support to fully focus on ARCore', 'Google began delving into the world of AR with its 2014 venture Project Tango, or just Tango as of last year, and its AR work has grown quite a bit since then. Earlier this year, it unveiled ARCore, an augmented reality platform that differs from Tan...', 'https://www.engadget.com/2017/12/15/google-ends-tango-support-focus-arcore/', 'https://www.engadget.com/2017/12/15/google-ends-tango-support-focus-arcore/', '2017-12-15 22:16:00', 'ar, arcore, arstickers, av, gear, google, mobile, pixel2, projecttango'),
('Google Inbox will remind you to unsubscribe from unread promo emails', 'Google has made email a much less tedious, junky affair for a lot of us, and it&#039;s about to take another step to helping us clean out our inboxes. According to a report over at Android Police, users of Google&#039;s Inbox app will start seeing new tips tha...', 'https://www.engadget.com/2017/12/15/google-inbox-remind-unsubscribe-unread-promo-email/', 'https://www.engadget.com/2017/12/15/google-inbox-remind-unsubscribe-unread-promo-email/', '2017-12-15 23:56:00', 'android, app, gear, google, inbox, internet, mobile, unsubscribe, web'),
('Google Maps will now tell you when to get off the bus or train', 'A mass transit feature for the Android version of Google Maps that notifies you when you need to get off the bus is finally live. It also includes step-by-step navigation, departure times and ETAs for your next public transportation ride. You can als...', 'https://www.engadget.com/2017/12/15/google-maps-will-tell-when-to-get-off-bus-train/', 'https://www.engadget.com/2017/12/15/google-maps-will-tell-when-to-get-off-bus-train/', '2017-12-15 21:20:00', 'gear, google, googlemaps, maps, masstransit, mobile, navigation, publictransportation, stepbystep, transit'),
('iTunes isn\'t coming to the Windows Store this year after all', 'iTunes for Windows users are going to be disappointed. Despite the promises of both Apple and Microsoft to bring the popular music and app software to the Microsoft Store this year, it appears as if we&#039;ll all have to wait a little longer.', 'https://www.engadget.com/2017/12/15/itunes-for-windows-store-delayed/', 'https://www.engadget.com/2017/12/15/itunes-for-windows-store-delayed/', '2017-12-15 21:41:00', 'apple, gear, itunes, microsoft, microsoftstore, personal computing, personalcomputing'),
('\'Jacobs letter\' unsealed, accuses Uber of spying, hacking', 'Waymo&#039;s lawsuit against Uber for allegedly stealing technology for self-driving cars hasn&#039;t gone to trial yet, because the judge received a letter from the Department of Justice suggesting Uber withheld crucial evidence. That letter, with some redact...', 'https://www.engadget.com/2017/12/15/jacobs-letter-unsealed-accuses-uber-of-spying-hacking/', 'https://www.engadget.com/2017/12/15/jacobs-letter-unsealed-accuses-uber-of-spying-hacking/', '2017-12-16 02:33:00', 'alphabet, anthonylevandowski, business, gear, judgealsup, otto, richardjacobs, self-drivingcar, ssg, tradesecrets, transportation, uber, waymo'),
('\'L.A. Noire: The VR Case Files\' is available now for HTC Vive', 'We were excited to hear that 2011 detective simulator L.A. Noire was headed to modern consoles and the HTC Vive for some VR action. The title received some visual upgrades, too, making the jump to PS4, Xbox One and the Switch a bit more graphically a...', 'https://www.engadget.com/2017/12/15/l-a-noire-the-vr-case-files-available-for-htc-vive/', 'https://www.engadget.com/2017/12/15/l-a-noire-the-vr-case-files-available-for-htc-vive/', '2017-12-16 01:27:00', 'av, gaming, htc, htcvive, lanoire, lanoirevr, rockstar, rockstargames, steam, video, vr'),
('\'PUBG\' tests a replay feature as it creeps toward v1.0', 'Now that PlayerUnknown&#039;s Battlegrounds has launched in Early Access on Xbox One, its next milestone is an official retail release out of beta on the PC. That&#039;s expected to happen next week, but players who can&#039;t wait have a few new tweaks to try out...', 'https://www.engadget.com/2017/12/15/pubg-tests-a-replay-feature-as-it-creeps-toward-v1-0/', 'https://www.engadget.com/2017/12/15/pubg-tests-a-replay-feature-as-it-creeps-toward-v1-0/', '2017-12-16 04:58:00', 'av, gaming, map, personal computing, personalcomputing, playerunknownsbattlegrounds, pubg, replay, steam, video'),
('Set sail with your pals in a new â€˜Adventure Timeâ€™ game', 'A new Adventure Time game is in the works and it features some maritime fun, a nameable boat and pirates. Adventure Time: Pirates of the Enchiridion begins with a flooded Land of Ooo and Adventure Time characters have to set off to figure out what&#039;s...', 'https://www.engadget.com/2017/12/15/set-sea-new-adventure-time-game/', 'https://www.engadget.com/2017/12/15/set-sea-new-adventure-time-game/', '2017-12-15 22:47:00', 'adventuretime, adventuretime:piratesoftheenchiridion, av, gaming, microsoft, nintendo, nintendo3ds, nintendoswitch, outrightgames, playstation4, sony, xboxone'),
('Researchers use sperm to deliver cancer drugs to tumors', 'Chemotherapy has a lot of terrible side effects and that&#039;s partly because the drugs being used to fight cancer also attack healthy cells. Figuring out a way to deliver drugs to tumors without affecting healthy tissue is a challenge and a problem that...', 'https://www.engadget.com/2017/12/15/sperm-deliver-cancer-drugs-tumors/', 'https://www.engadget.com/2017/12/15/sperm-deliver-cancer-drugs-tumors/', '2017-12-16 03:42:00', 'cancer, chemotherapy, drugdelivery, gear, medicine, research, sperm, tomorrow, tumor, video'),
('Buy an Xbox One X and get \'PUBG\' free for a limited time', 'From December 17th through the 31st, Microsoft will give everyone who purchases an Xbox One X a copy of PlayerUnknown&#039;s Battlegrounds. A post on Xbox Wire says that over a million people played the battle royale game within 48 hours of being availabl...', 'https://www.engadget.com/2017/12/15/xbox-one-x-free-pubg-promo/', 'https://www.engadget.com/2017/12/15/xbox-one-x-free-pubg-promo/', '2017-12-15 20:19:00', 'business, gaming, microsoft, playerunknownsbattlegrounds, promo, pubg, xbox, xboxone, xboxonex'),
('California advises against keeping your phone in your pocket', 'The jury is still out on whether or not cellphone radiation is bad for you, but California&#039;s Department of Public Health isn&#039;t taking any chances.  The agency just issued an advisory that suggests residents should take steps to limit their exposure t...', 'https://www.engadget.com/2017/12/16/california-advises-against-keeping-your-phone-in-your-pocket/', 'https://www.engadget.com/2017/12/16/california-advises-against-keeping-your-phone-in-your-pocket/', '2017-12-16 19:02:00', 'california, californiadepartmentofpublichhealth, cdph, cellphone, gear, health, medicine, mobile, radiation, safety, smartphone'),
('CDC barred from using \'science-based\' in budget documents', 'We can just imagine CDC personnel still shaking their heads after finding out that they can&#039;t use certain terms in official documents for next year&#039;s budget. According to The Washington Post, the Trump administration has prohibited the CDC from using...', 'https://www.engadget.com/2017/12/16/cdc-banned-words-evidence-science/', 'https://www.engadget.com/2017/12/16/cdc-banned-words-evidence-science/', '2017-12-16 22:06:00', 'bannedwords, cdc, gear, politics'),
('Firefox faces backlash for auto-installing \'Mr. Robot\' add-on', 'A curious add-on called &quot;Looking Glass&quot; started popping up on Firefox for a number of users this past week -- even if they didn&#039;t give the browser permission to install it. Due to its nebulous nature and creepy description that only said &quot;MY REALITY...', 'https://www.engadget.com/2017/12/16/firefox-mr-robot-extension/', 'https://www.engadget.com/2017/12/16/firefox-mr-robot-extension/', '2017-12-16 17:35:00', 'entertainment, firefox, mozilla, mrrobot, security, tvshow'),
('Google won\'t show news from sites that hide their country of origin', 'Google&#039;s ongoing quest to curb fake news now includes sites that are less than honest about their home turf.  The company has updated its Google News guidelines to forbid sites that &quot;misrepresent or conceal their country of origin&quot; or otherwise are a...', 'https://www.engadget.com/2017/12/16/google-bans-news-sites-which-hide-country-of-origin/', 'https://www.engadget.com/2017/12/16/google-bans-news-sites-which-hide-country-of-origin/', '2017-12-16 20:33:00', 'fakenews, gear, google, googlenews, internet, news, russia, search, web'),
('Netflix may run Watergate series developed by George Clooney', 'Netflix&#039;s ability to reel in big-name stars may have just secured a very topical political drama. Sources for Hollywood Reporter and Variety have learned that George Clooney and Bridge of Spies writer Matt Charman are working on Watergate, an eight-e...', 'https://www.engadget.com/2017/12/16/netflix-may-run-watergate-series-developed-by-george-clooney/', 'https://www.engadget.com/2017/12/16/netflix-may-run-watergate-series-developed-by-george-clooney/', '2017-12-16 16:06:00', 'entertainment, georgeclooney, internet, netflix, richardnixon, services, streaming, television, tv, watergate'),
('The Morning After: Weekend Edition', 'Hey, good morning! You look fabulous.\n\nWelcome to the weekend. If you&#039;re still holiday shopping (or haven&#039;t started yet), then this might be a good time to mention that Amazon extended its free shipping before Christmas deadline through today. Now, f...', 'https://www.engadget.com/2017/12/16/the-morning-after-weekend-edition/', 'https://www.engadget.com/2017/12/16/the-morning-after-weekend-edition/', '2017-12-16 13:00:00', 'entertainment, food and drink, gadgetry, gadgets, gaming, gear, themorningafter'),
('Uber Eats offers insurance for its European couriers', 'Uber Eats only just turned two years old, but like other &quot;gig economy&quot; businesses, it&#039;s facing scrutiny over how it classifies workers. In Europe, the company is partnering with Axa to offer couriers an insurance package that covers accidents, hospit...', 'https://www.engadget.com/2017/12/16/uber-eats-offers-insurance-for-its-european-couriers/', 'https://www.engadget.com/2017/12/16/uber-eats-offers-insurance-for-its-european-couriers/', '2017-12-16 09:57:00', 'business, eu, europe, gear, gigeconomy, insurance, uber, ubereats, uk');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
