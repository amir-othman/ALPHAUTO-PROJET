-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2022 at 06:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espritlocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `answerlocation`
--

CREATE TABLE `answerlocation` (
  `id` int(11) NOT NULL,
  `request_id` varchar(255) NOT NULL,
  `my_reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bloglist`
--

CREATE TABLE `bloglist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fulltxt` text NOT NULL,
  `datep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloglist`
--

INSERT INTO `bloglist` (`id`, `title`, `img`, `description`, `fulltxt`, `datep`) VALUES
(2, 'At vero eos et accusamus', 'assets/images/blog-img3.jpg', 'At vero eos et accusamus et iusto odiodig is simos blanditiis praesentium volup tatum deleniti atque corrupti quos...', 'At vero eos et accusamus et iusto odiodig is simos blanditiis praesentium volup tatum deleniti atque corrupti quos...', '2022-11-23'),
(3, 'At vero eos et accusamus', 'assets/images/blog-img4.jpg', 'At vero eos et accusamus et iusto odiodig is simos blanditiis praesentium volup tatum deleniti atque corrupti quos...', 'At vero eos et accusamus et iusto odiodig is simos blanditiis praesentium volup tatum deleniti atque corrupti quos...', '2022-11-23'),
(5, 'At vero eos et accusamus', 'assets/images/blog-img6.jpg', 'At vero eos et accusamus et iusto odiodig is simos blanditiis praesentium volup tatum ...\'', '<p><strong><em>We Are Working So hard</em></strong></p>', '2022-11-22'),
(36, 'Nouvelle Hyundai Ioniq 6', 'uploads/hyundai-ioniq-6.jpg', 'Nouvelle Hyundai Ioniq 6 : la berline électrique annonce son prix', '<div class=\"postbottom row\">\r\n<div class=\"content  col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3\">\r\n<p><em>Combien co&ucirc;te la nouvelle Ioniq 6 hors s&eacute;rie limit&eacute;e &laquo; First Edition &raquo; ? C&rsquo;est ce que nous voyons aujourd&rsquo;hui&hellip;</em><span id=\"more-27161\"></span></p>\r\n<h3><em><span style=\"color: rgb(230, 126, 35);\">Quel prix Ioniq 6 ?</span></em></h3>\r\n<p>Annonc&eacute;e cette ann&eacute;e dans la gamme&nbsp;<a href=\"https://voiture.kidioui.fr/hyundai/vente-hyundai.html\">achat Hyundai</a>,&nbsp;<span style=\"color: rgb(53, 152, 219);\"><strong>la berline &eacute;lectrique Ioniq 6</strong>&nbsp;</span>d&eacute;voile d&eacute;sormais son prix de vente. Cette grande-s&oelig;ur de la Ioniq 5 et rempla&ccedil;ante de la Ioniq premi&egrave;re du nom (2016-2022) d&eacute;marre &agrave;&nbsp;<span style=\"color: rgb(230, 126, 35);\"><strong>52 200 euros</strong></span>&nbsp;en finition Intuitive et motorisation 229 chevaux (environ 600 km d&rsquo;autonomie WLTP).</p>\r\n<p>Pour cette somme, la nouvelle Ioniq 6 est d&eacute;j&agrave;&nbsp;<span style=\"color: rgb(53, 152, 219);\"><strong>bien garnie</strong></span>&nbsp;: jantes 18 pouces, combin&eacute; num&eacute;rique, &eacute;cran tactile, climatisation bi-zone, feux LED, aides &agrave; la conduite, volant et si&egrave;ges chauffants, etc. En revanche, elle n&rsquo;a donc&nbsp;<span style=\"color: rgb(53, 152, 219);\"><strong>pas droit au bonus &eacute;cologique</strong></span>&nbsp;puisque le montant maximum d&rsquo;acc&egrave;s est de 47 000 &euro;.</p>\r\n<h2><em><span style=\"color: rgb(230, 126, 35);\">En dehors du bonus &eacute;cologique</span></em></h2>\r\n<p>Pour son&nbsp;<strong><span style=\"color: rgb(53, 152, 219);\">second palier de finition</span> &laquo;&nbsp;<span style=\"color: rgb(53, 152, 219);\">Creative</span>&nbsp;&raquo;</strong>, le prix de la&nbsp;<a href=\"https://voiture.kidioui.fr/electrique/neuf/\">voiture &eacute;lectrique neuve</a>&nbsp;passe &agrave;&nbsp;<strong><span style=\"color: rgb(230, 126, 35);\">56</span> <span style=\"color: rgb(230, 126, 35);\">800 &euro;</span></strong>. Aux &eacute;quipements de s&eacute;rie du palier inf&eacute;rieur s&rsquo;ajoutent les feux avant Matrix LED, la sellerie cuir, les si&egrave;ges avant ventil&eacute;s et arri&egrave;re chauffants ou encore la pompe &agrave; la chaleur pour l&rsquo;habitacle.</p>\r\n<p>Enfin, la troisi&egrave;me et derni&egrave;re configuration possible, c&rsquo;est la finition Executive. &Agrave;&nbsp;<span style=\"color: rgb(230, 126, 35);\"><strong>61 300 &euro;</strong></span>&nbsp;elle conserve le m&ecirc;me moteur, &agrave;&nbsp;<span style=\"color: rgb(230, 126, 35);\"><strong>65 200 &euro;</strong></span>&nbsp;elle s&rsquo;&eacute;quipe de deux blocs, un pour chaque essieu, pour une puissance totale de&nbsp;<span style=\"color: rgb(224, 62, 45);\"><strong>325 chevaux</strong></span>. La dotation s&rsquo;enrichit, entres autres, du toit ouvrant, du syst&egrave;me audio Bose, des jantes 20 pouces, de l&rsquo;affichage t&ecirc;te-haut et de la cam&eacute;ra 360 degr&eacute;s.</p>\r\n<p><em>Cr&eacute;dits photos : Hyundai</em></p>\r\n</div>\r\n</div>\r\n<div class=\"row ad-end\">\r\n<div class=\"col-md-offset-2 col-md-8\">&nbsp;</div>\r\n</div>', '2022-12-14'),
(37, 'Shell fournira les bornes de recharge à domicile aux clients VinFast', 'uploads/Vinfast_Showroom_Paris-4.webp', 'Pour son arrivée en Europe, VinFast a signé un partenariat avec Shell Recharge Solutions. Cela concerne la fourniture des bornes de recharge aux clients du constructeur.', '<p>Le constructeur vietnamien&nbsp;<span style=\"background-color: rgb(241, 196, 15);\"><a class=\"linkInArticle\" style=\"background-color: rgb(241, 196, 15);\" href=\"https://www.automobile-propre.com/reportage-cest-officiel-vinfast-est-en-france/\" data-gtm-vis-first-on-screen-6957018_123=\"18333\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">VinFast a fait ses d&eacute;buts en Europe en cette fin d&rsquo;ann&eacute;e</a></span>&nbsp;2022. Pour s&rsquo;approprier le march&eacute;, il souhaite offrir une offre &laquo;&nbsp;cl&eacute; en mains&nbsp;&raquo; avec installation de bornes de recharge.</p>\r\n<p>Pour cela, VinFast s&rsquo;associe avec Shell Recharge Solutions, qui aidera les clients &agrave; s&rsquo;&eacute;quiper. Gr&acirc;ce &agrave; l&rsquo;application VinFast, les clients pourront commander leurs installations de mani&egrave;re simple.</p>\r\n<p><em>&laquo;&nbsp;Ce partenariat entre VinFast et&nbsp;<span class=\"il\">Shell</span>&nbsp;Recharge Solutions est une d&eacute;claration d&rsquo;intention claire&nbsp;&raquo;</em>, a d&eacute;clar&eacute; Ho Thanh Huong. Le PDG de VinFast Europ&eacute; d&eacute;crit&nbsp;<em>&laquo;&nbsp;deux entreprises engag&eacute;es &agrave; influencer un changement environnemental positif, travaillant en &eacute;troite collaboration pour acc&eacute;l&eacute;rer la r&eacute;volution du v&eacute;hicule &eacute;lectrique en faisant de la technologie &agrave; faible &eacute;mission une r&eacute;alit&eacute; accessible.&nbsp;&raquo;</em></p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p><div class=\'blog-note\'><p> <em>Les offres cl&eacute;s en main propos&eacute;es par <span class=\"il\">Shell</span> Recharge Solutions permettront de b&eacute;n&eacute;ficier d&rsquo;une exp&eacute;rience de recharge &agrave; domicile optimis&eacute;e. Sa r&eacute;putation en mati&egrave;re de d&eacute;veloppement de la technologie de recharge contribuera &agrave; rassurer les nouveaux clients.&nbsp;</em></p><img width=\"42\" height=\"30\" src=\"assets/images/quote-icon.svg\" alt=\"Quote\"></div></p>\r\n<h2>La facilit&eacute; d&rsquo;utilisation est &laquo;&nbsp;l&rsquo;aspect le plus important&nbsp;&raquo;</h2>\r\n<p>De son c&ocirc;t&eacute;, Shell Recharge Solutions souhaite accompagner les nouveaux acc&eacute;dants &agrave; la voiture &eacute;lectrique. Pour cela, il mettra en place un accompagnement aux clients de VinFast qui installeront des bornes avec Shell.</p>\r\n<p>Parmi ces aides, on retrouve la charge programm&eacute;e et la gestion de charge &agrave; distance. Ainsi, le fournisseur de recharge souhaite d&eacute;velopper les fonctionnalit&eacute;s, de sorte &agrave; pr&eacute;voir les consommations de plus en plus importantes.</p>\r\n<p><em>&laquo;&nbsp;VinFast est un fabricant de VE innovant qui m&egrave;ne un d&eacute;ploiement rapide et ambitieux sur le march&eacute;. Cela contribuera &agrave; acc&eacute;l&eacute;rer la marche de l&rsquo;Europe vers la mobilit&eacute; &eacute;lectrique&nbsp;&raquo;</em>, a d&eacute;clar&eacute;&nbsp;Melanie Lane, CEO de&nbsp;<span class=\"il\">Shell</span>&nbsp;Recharge Solutions Europe.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_3\" class=\"Content_3 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_3\"></div>\r\n</div>\r\n<p><em>&laquo;&nbsp;Nous sommes fiers de ce partenariat avec VinFast pour permettre la recharge &agrave; domicile en Europe. Nous savons, gr&acirc;ce &agrave; notre &eacute;tude,&nbsp;</em><em>EV Driver Survey</em><em>, aupr&egrave;s des consommateurs, que la facilit&eacute; d&rsquo;utilisation est de loin l&rsquo;aspect le plus important lors du choix d&rsquo;un point de recharge.&nbsp;&raquo;</em></p>\r\n<p><em>&laquo;&nbsp;En int&eacute;grant l&rsquo;achat de la borne de recharge par l&rsquo;interm&eacute;diaire de l&rsquo;application VinFast, nous visons &agrave; rendre le voyage des conducteurs de VE encore plus fluide.&nbsp;&raquo;</em></p>', '2022-12-07'),
(38, 'Publicité du Mondial : quel est le nouveau traîneau électrique du Père Noël signé Audi ?', 'uploads/audi-grandsphere-0005.jpg', 'La pub Audi avec le Père Noël est de retour. Mais avec un nouveau traineau, qu’il n’a plus besoin de piloter !', '<p><strong>La pub Audi avec le P&egrave;re No&euml;l est de retour. Mais avec un nouveau traineau, qu&rsquo;il n&rsquo;a plus besoin de piloter !</strong></p>\r\n<p>Le P&egrave;re No&euml;l livre ses cadeaux en&nbsp;<span style=\"background-color: rgb(230, 126, 35);\"><a class=\"linkInArticle\" style=\"background-color: rgb(230, 126, 35);\" href=\"https://www.automobile-propre.com/marque/audi/\" data-gtm-vis-first-on-screen-6957018_123=\"31392\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Audi</a></span>&nbsp;! Mais si, souvenez-vous : il y a deux ans, on a vu le P&egrave;re No&euml;l&nbsp;prendre livraison d&rsquo;un nouveau traineau :&nbsp;<span style=\"background-color: rgb(230, 126, 35);\"><a class=\"linkInArticle\" style=\"background-color: rgb(230, 126, 35);\" href=\"https://www.automobile-propre.com/breves/audi-e-tron-gt-le-nouveau-traineau-du-pere-noel-2-0/\" data-gtm-vis-first-on-screen-6957018_123=\"31406\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">une e-tron GT</a></span>. Une belle publicit&eacute; de la firme aux anneaux pour souhaiter de bonnes f&ecirc;tes au public et pour annoncer l&rsquo;arriv&eacute;e de son nouveau porte-drapeau &eacute;lectrique, celui-ci &eacute;tant encore en tenue de camouflage, quelques semaines avant sa r&eacute;v&eacute;lation compl&egrave;te.</p>\r\n<p><div class=\'blog-note\'><p> Cette publicit&eacute; est de retour sur les &eacute;crans. Mais le tra&icirc;neau a encore chang&eacute;. D&eacute;cid&eacute;ment g&acirc;t&eacute;, le P&egrave;re No&euml;l a carr&eacute;ment le droit &agrave; un mod&egrave;le unique, un concept-car. Il n&rsquo;y a ainsi toujours pas de rennes&hellip; et plus de volant. Ou presque. Une fois install&eacute;, ce P&egrave;re No&euml;l affut&eacute; et bien sap&eacute; voit le cerceau s&rsquo;effacer dans la planche de bord. Le voici donc dans un traineau autonome, sans renne ni r&ecirc;nes &agrave; tenir. De quoi lib&eacute;rer le P&egrave;re No&euml;l de la conduite. Il peut ainsi mieux se concentrer sur la liste des enfants qui ont &eacute;t&eacute; sages. </p><img width=\"42\" height=\"30\" src=\"assets/images/quote-icon.svg\" alt=\"Quote\"></div></p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p>Mais quel est ce traineau du futur ? Il s&rsquo;agit du concept Grandsphere, une &eacute;tude de style d&eacute;voil&eacute;e en 2021. Le Grandsphere donne un avant go&ucirc;t du futur haut de gamme d&rsquo;Audi, qui devrait prendre la rel&egrave;ve de l&rsquo;A8. Pour ce prototype, Audi a invers&eacute; la logique de conception, en dessinant le v&eacute;hicule de l&rsquo;int&eacute;rieur vers l&rsquo;ext&eacute;rieur. Une priorit&eacute; donn&eacute;e &agrave; l&rsquo;int&eacute;rieur en raison de la conduite autonome, les si&egrave;ges avant n&rsquo;&eacute;tant plus r&eacute;serv&eacute;e &agrave; des fonctions de conduite. D&rsquo;ailleurs, la marque parle d&rsquo;une exp&eacute;rience &laquo;&nbsp;premi&egrave;re classe&nbsp;&raquo; d&eacute;plac&eacute;e &agrave; l&rsquo;avant et non plus r&eacute;serv&eacute;e aux passagers arri&egrave;re.</p>\r\n<p>Le P&egrave;re No&euml;l fera donc sa tourn&eacute;e en premi&egrave;re classe cette ann&eacute;e !</p>', '2022-12-18'),
(39, 'Lucid : de nouvelles cellules 2170 fournies par Panasonic', 'uploads/Lucid-Air-Tech-Moteur-Batterie-08.jpg', 'Pour continuer leur développement respectifs, Lucid Motors et Panasonic Energy ont conclu des accords industriels.', '<p><em><strong>Pour continuer leur d&eacute;veloppement respectifs, Lucid Motors et Panasonic Energy ont conclu des accords industriels.</strong></em></p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_1\" class=\"Content_1 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_1\"></div>\r\n</div>\r\n<p>Hormis l&rsquo;exclusive Lucid Air Dream Edition qui embarque une batterie de 118 kWh avec des cellules fournies par Samsung SDI, le reste de la gamme repose sur des unit&eacute;s de 113 et 88 kWh aliment&eacute;es par des cellules LG Chem. Mais tout cela pourrait bient&ocirc;t changer puisque la marque am&eacute;ricaine vient de signer un partenariat avec Panasonic Energy.</p>\r\n<p>Les deux entit&eacute;s ont sign&eacute; ensemble des accords pluriannuels afin de se d&eacute;velopper plus rapidement sur le plan commercial. Et c&rsquo;est notamment le cas de la marque de Kadoma au Japon, qui souhaite d&eacute;velopper ses activit&eacute;s en dehors de l&rsquo;archipel et installer une unit&eacute; de production au Kansas, aux &Eacute;tats-Unis.</p>\r\n<p>Panasonic fabriquera aux USA les cellules Lucid et Tesla</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p>Aucune pr&eacute;cision suppl&eacute;mentaire n&rsquo;a &eacute;t&eacute; avanc&eacute;e par les deux fabricants. Cependant, les Lucid Air pourraient tr&egrave;s rapidement recevoir des cellules en provenance du Japon dans un premier temps pour prendre place dans les modules des&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/breves/la-lucid-air-pure-tombe-les-prix-et-promet-des-modeles-encore-plus-abordables/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-recent-on-screen-6957018_123=\"45679\" data-gtm-vis-first-on-screen-6957018_123=\"45679\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Air Pure</a>&nbsp;et Air Touring. Lorsque Panasonic aura travers&eacute; le Pacifique, les cellules pourront prendre place &agrave; bord de toutes les Lucid Air, mais aussi dans&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/breves/lucid-gravity-le-suv-electrique-met-la-tete-dans-les-etoiles/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-recent-on-screen-6957018_123=\"45711\" data-gtm-vis-first-on-screen-6957018_123=\"45711\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">le Lucid Gravity</a>, le prochain SUV &eacute;lectrique am&eacute;ricain.</p>\r\n<p>De son c&ocirc;t&eacute;, Panasonic pr&eacute;voit une lente mont&eacute;e en r&eacute;gime avant d&rsquo;atteindre un rythme annuel de 30 GWh d&rsquo;ici &agrave; 2025. C&rsquo;est dans la ville de De Soto que le fabricant sortira des cha&icirc;nes les piles 21-700 destin&eacute;es aux Lucid, mais aussi&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/larrivee-des-cellules-4680-se-precise-le-prix-des-tesla-bientot-en-baisse/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-recent-on-screen-6957018_123=\"47045\" data-gtm-vis-first-on-screen-6957018_123=\"47045\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">les 4680 des prochaines Tesla</a>.</p>', '2022-12-08'),
(40, 'Neta E : maintenant, les chinois font aussi des sportives électriques !', 'uploads/2022_Neta-E_01.webp', 'Le marché chinois compte un nombre incroyable de marques et de modèles. Mais les coupés sont rares, très rares. Dopés par leurs succès sur l\'électrique, plusieurs constructeurs comptent investir ce segment. Voici l\'une des tous premiers, le Neta E.', '<p><strong>Le march&eacute; chinois compte un nombre incroyable de marques et de mod&egrave;les. Mais les coup&eacute;s sont rares, tr&egrave;s rares. Dop&eacute;s par leurs succ&egrave;s sur l\'&eacute;lectrique, plusieurs constructeurs comptent investir ce segment. Voici l\'une des tous premiers, le Neta E.</strong></p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_1\" class=\"Content_1 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_1\"></div>\r\n</div>\r\n<p>Historiquement, le march&eacute; chinois est un march&eacute; de berlines 4 portes. Les SUV dominent d&eacute;sormais les ventes &agrave; plus de 50%. Entre ces deux cat&eacute;gories, il reste bien peu de place pour le reste, et en particulier les coup&eacute;s ou cabriolets. C&rsquo;est simple, l&rsquo;offre n&rsquo;existe tout simplement pas chez les constructeurs chinois. Quelques un s&rsquo;y sont essay&eacute;s par le pass&eacute;, comme Geely (BEauty Leopard), ou plus r&eacute;cemment Qiantu (K50) et Leapmotor (S01). Aucun n&rsquo;a rencontr&eacute; le succ&egrave;s.&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/qiantu-k20-une-citadine-electrique-sportive-et-abordable/amp/\" data-gtm-vis-first-on-screen-6957018_123=\"4749\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Pour Qiantu</a>, le K50 a m&ecirc;me bien failli mener la start-up &agrave; la faillite et Leapmotor n&rsquo;a r&eacute;ellement d&eacute;marr&eacute; qu&rsquo;avec la T03.</p>\r\n<p>Mais les choses semblent &eacute;voluer. Pas forc&eacute;ment du c&ocirc;t&eacute; du march&eacute; pour le moment, mais plusieurs constructeurs sont bien d&eacute;cid&eacute;s &agrave; se doter d&rsquo;un mod&egrave;le sportif porteur d&rsquo;image. Certains ont des ambitions de supercars, comme&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/breves/la-supercar-hongqi-s9-chinoise-sera-presentee-a-la-design-week-de-milan/\" data-gtm-vis-first-on-screen-6957018_123=\"35033\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Hongqi</a>&nbsp;ou&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/la-supercar-electrique-aion-hyper-ssr-passe-de-0-a-100-km-h-en-19-s/\" data-gtm-vis-first-on-screen-6957018_123=\"35040\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Aion</a>, d&rsquo;autres de sportives un peu plus raisonnables comme SSC, BYD ou Neta.</p>\r\n<p>Avec le Neta E, Hozon Motors n&rsquo;a pas des ambitions d&eacute;mesur&eacute;es. Il se pr&eacute;sente comme une version coup&eacute; de&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/neta-s-les-constructeurs-chinois-misent-aussi-sur-les-berlines/\" data-gtm-vis-first-on-screen-6957018_123=\"38780\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">la berline Neta S tout juste commercialis&eacute;e</a>&nbsp;plus que comme une pure sportive. Il s&rsquo;agit n&eacute;anmoins d&rsquo;un coup&eacute; &agrave; 2 places long de 4715 mm, large de 1979 mm et haut de 1415 mm. La berline S mesure 4980 / 1980 / 1450 mm. L&rsquo;empattement est r&eacute;duit &agrave; 2770 mm (2980 mm pour la S). Le tout est habill&eacute; de formes qui ne font pas vraiment dans l&rsquo;originalit&eacute;.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p>Deux versions seront propos&eacute;es au lancement : propulsion de 170 kW avec une autonomie de 560 km, 4 roues motrices de 2 x 170 kW, avec autonomie de 580 km. Une version avec autonomie de 660 km semble envisag&eacute;e ult&eacute;rieurement.</p>\r\n<div class=\"tiled-gallery type-rectangular\" data-carousel-extra=\"{&quot;blog_id&quot;:1,&quot;permalink&quot;:&quot;https:\\/\\/www.automobile-propre.com\\/breves\\/neta-e-maintenant-les-chinois-font-aussi-des-sportives-electriques\\/&quot;}\" data-original-width=\"700\">\r\n<div class=\"gallery-row\">\r\n<div class=\"gallery-group images-1\">\r\n<div class=\"tiled-gallery-item tiled-gallery-item-large\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>', '2022-12-14'),
(41, 'Toyota imagine un pick-up Hilux électrique', 'uploads/Toyota-Hilux.jpg', 'Toyota vient de présenter en Thaïlande un concept de Hilux à moteur électrique. Mais la marque n’a pas dit grand chose sur le véhicule !', '<p><strong>Toyota vient de pr&eacute;senter en Tha&iuml;lande un concept de Hilux &agrave; moteur &eacute;lectrique. Mais la marque n&rsquo;a pas dit grand chose sur le v&eacute;hicule !</strong></p>\r\n<p>Lorsque&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/marque/toyota/\" data-gtm-vis-first-on-screen-6957018_123=\"35462\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Toyota</a>&nbsp;a pr&eacute;sent&eacute;, fin 2021, une armada de concepts pour illustrer ses grandes ambitions dans l&rsquo;&eacute;lectrique, il y avait un pick-up. Son d&eacute;bouch&eacute; en s&eacute;rie n&rsquo;est toutefois pas connu, et pourrait m&ecirc;me &ecirc;tre incertain, Toyota r&eacute;fl&eacute;chissant &agrave; nouveau sur sa strat&eacute;gie &eacute;lectrique. Le constructeur devrait faire des annonces sur des ajustements d&eacute;but 2023.</p>\r\n<p>Si ce concept de grand pick-up ne donne rien en s&eacute;rie, un autre projet pourrait prendre la rel&egrave;ve : une version &eacute;lectrique de l&rsquo;Hilux, le pick-up &laquo;&nbsp;midsize&nbsp;&raquo; international de Toyota. La marque vient ainsi de pr&eacute;senter un concept d&rsquo;Hilux branch&eacute;, lors d&rsquo;une conf&eacute;rence de presse en Tha&iuml;lande.</p>\r\n<p><div class=\'blog-note\'><p>Toyota f&ecirc;tait les 60 ans de sa filiale tha&iuml;landaise. Et si le Hilux est &agrave; l&rsquo;honneur l&agrave;-bas, c&rsquo;est parce que c&rsquo;est cette filiale qui s&rsquo;occupe de la production du pick-up pour une bonne partie du monde, dont l&rsquo;Europe.</p><img width=\"42\" height=\"30\" src=\"assets/images/quote-icon.svg\" alt=\"Quote\"></div></p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p>Akio Toyoda, patron du constructeur japonais, n&rsquo;a toutefois donn&eacute; aucun d&eacute;tail technique sur le v&eacute;hicule.&nbsp;On voit simplement que le concept est bas&eacute; sur la g&eacute;n&eacute;ration actuelle, en version cabine simple, avec une partie avant modifi&eacute;e. Le pick-up abandonne sa grosse calandre pour de fines ouvertures, typiques d&rsquo;un mod&egrave;le &eacute;lectrique. On devine sur le c&ocirc;t&eacute; conducteur la trappe pour la recharge.</p>\r\n<p>En Europe, Toyota est parti dans une autre direction, avec la pr&eacute;sentation d&rsquo;un prototype d&rsquo;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/breves/toyota-hilux-bientot-une-version-avec-pile-a-hydrogene/\" data-gtm-vis-recent-on-screen-6957018_123=\"45096\" data-gtm-vis-first-on-screen-6957018_123=\"45096\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Hilux fonctionnant &agrave; l&rsquo;hydrog&egrave;ne</a>.</p>', '2022-12-16'),
(42, 'Accélération – La Lucid Air Sapphire plie les Tesla Plaid, la Bugatti Chiron Pur Sport et plus encore', 'uploads/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-02.jpg', 'La nouvelle Lucid Air Sapphire veut se mettre tout en haut de la chaîne alimentaire automobile. Elle le prouve dans un premier face à face.', '<p><strong>La nouvelle Lucid Air Sapphire veut se mettre tout en haut de la cha&icirc;ne alimentaire automobile. Elle le prouve dans un premier face &agrave; face.</strong></p>\r\n<p>La Lucid Air est la concurrente toute naturelle de la Tesla Model S. Mais ce n&rsquo;est pas seulement qu&rsquo;une question de segmentation, puisque les deux hommes qui se cachent derri&egrave;re les deux entit&eacute;s ont des comptes &agrave; r&eacute;gler. Alors que la Tesla Model S Plaid vient de grimper encore d&rsquo;un cran, Lucid lance dans l&rsquo;ar&egrave;ne l&rsquo;Air Sapphire. Nos confr&egrave;res d&rsquo;Hagerty organisent une premi&egrave;re rencontre.</p>\r\n<p>Avant le top d&eacute;part, un bref rappel des forces en pr&eacute;sence. La Tesla Model S Plaid est&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/essai-video-tesla-model-s-plaid-accelerer-ou-discuter-il-faudra-choisir/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"99060\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">bien connue de nos services</a>, avec ses trois moteurs pour une puissance totale de 1 020 ch dans notre syst&egrave;me m&eacute;trique. En face se trouve la Sapphire,&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/lucid-air-sapphire-la-berline-la-plus-puissante-au-monde-entre-en-scene/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"107576\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">nouvelle signature performance de Lucid</a>, avec 1 216 ch produits l&agrave; aussi par trois moteurs. Soit un rapport poids/puissance pr&eacute;alable plus favorable pour la Lucid Air avec 2,01 kg/ch contre 2,15 kg/ch pour la Plaid. Reste que si la valeur n&rsquo;a pas &eacute;t&eacute; communiqu&eacute;e, la Sapphire d&eacute;velopperait bien plus de couple que sa rivale. Et pour mieux mettre en perspective la force de frappe de ces berlines &eacute;lectriques, Hagerty a d&eacute;cid&eacute; de poser sur la grille de d&eacute;part une Bugatti Chiron Pur Sport, dont les 16 gamelles d&eacute;livrent 1 500 ch (1,35 kg/ch).</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"video-container\"><iframe class=\"lazy-loaded\" title=\"The World\'s Quickest Cars: Lucid Air Sapphire v Bugatti Chiron v Tesla Plaid - Cammisa\'s Drag Race\" src=\"https://www.youtube.com/embed/EyDpQpcPpuc?feature=oembed&amp;enablejsapi=1&amp;origin=https://www.automobile-propre.com\" width=\"700\" height=\"394\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\" loading=\"lazy\" data-lazy-type=\"iframe\" data-src=\"https://www.youtube.com/embed/EyDpQpcPpuc?feature=oembed&amp;enablejsapi=1&amp;origin=https://www.automobile-propre.com\"></iframe></div>\r\n<p>&nbsp;</p>\r\n<h2>Un 400 m D.A en 9,1 s pour la Lucid Air Sapphire</h2>\r\n<p>D&egrave;s le d&eacute;part, les trois voitures r&eacute;agissent bien diff&eacute;remment. Perdue dans un patinage des quatre roues et subissant le temps de r&eacute;ponse de la m&eacute;canique qui para&icirc;t &ecirc;tre une &eacute;ternit&eacute; face aux deux &eacute;lectriques (on n&rsquo;aurait jamais os&eacute; dire &ccedil;a, avant), la Bugatti Chiron est clou&eacute;e sur place. Les berlines &eacute;lectriques, elles, sont au coude &agrave; coude, m&ecirc;me si dans sa mani&egrave;re d&rsquo;envoyer la puissance, la Tesla Model S Plaid prend un l&eacute;ger avantage. Mais, comme d&rsquo;habitude, elle perd vite son souffle. Ce qui n&rsquo;est pas le cas de la Lucid, aussi in&eacute;puisable que<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/essai-exclusif-lucid-air-grand-touring-california-dreamin/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"118144\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">&nbsp;la Grand Touring que nous avons essay&eacute;</a>, qui met dans le vent la Model S juste avant la ligne d&rsquo;arriv&eacute;e.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_3\" class=\"Content_3 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_3\"></div>\r\n</div>\r\n<p>Au final, c&rsquo;est la Lucid Air Sapphire qui l&rsquo;emporte au jeu des &laquo; petits &raquo; chiffres. La berline de Newark abat le 0-60 mph (0-96 km/h) en 2,1 s et passe la barre des 400 m en 9,1 s (&agrave; 251 km/h). La Tesla Model S Plaid est juste derri&egrave;re avec un chrono&rsquo; de 9,3 s (&agrave; 244 km/h), alors que la Bugatti Chiron parvient &agrave; resserrer l&rsquo;&eacute;cart avec un temps similaire (9,3 s &agrave; 251 km/h). Et pour bien mettre en lumi&egrave;re le niveau de performance de cette nouvelle Lucid Air Sapphire, Hagerty a d&eacute;cid&eacute; de lui opposer une Ducati Panigale V4 SP2 (0,91 kg/ch). Devinez qui gagne ?</p>\r\n<p><a class=\"imgInArticle\" href=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03.jpg\"><img class=\"alignnone size-full wp-image-166005 lazy-loaded\" src=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03.jpg\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03.jpg 1200w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-1024x683.jpg 1024w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-140x93.jpg 140w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-768x512.jpg 768w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-620x413.jpg 620w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-100x66.jpg 100w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-190x126.jpg 190w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03-600x400.jpg 600w\" alt=\"Lucid Air\" width=\"1200\" height=\"800\" loading=\"lazy\" data-lazy-type=\"image\" data-src=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-03.jpg\" data-srcset=\"\"></a></p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_4\" class=\"Content_4 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_4\"></div>\r\n</div>\r\n<h2>Une performance qui sert &agrave; tout, sauf &agrave; rien</h2>\r\n<p>Chacun appr&eacute;ciera ou non la performance, ces petits &eacute;carts &eacute;tant tout aussi inexplorables qu&rsquo;imperceptible pour le commun des mortels. Dans tous les cas, vous n&rsquo;irez pas plus vite avec l&rsquo;une ou l&rsquo;autre pour aller chercher le pain (bien que la Chiron ne soit pas aussi facilement utilisable au quotidien que les deux berlines &eacute;lectriques). Mais la prouesse est l&agrave;. Et c&rsquo;est ce jeu d&rsquo;apparence pu&eacute;ril qui fait avancer les technologie et permet d&rsquo;entretenir la passion automobile.</p>\r\n<p>Rappelons que la Tesla Model S Plaid est disponible chez nous au prix de 138 990 &euro;. La Lucid Air Sapphire ne verra pas le jour sur ses terres natales avant l&rsquo;ann&eacute;e prochaine, au prix de 249 000 $ (235 000 &euro;). Soit 100 000 &euro; de plus que sa concurrente, mais dix fois moins que la Bugatti&nbsp;!</p>\r\n<p><a class=\"imgInArticle\" href=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01.jpg\"><img class=\"alignnone size-full wp-image-166002 lazy-loaded\" src=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01.jpg\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01.jpg 1200w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-1024x683.jpg 1024w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-140x93.jpg 140w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-768x512.jpg 768w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-620x413.jpg 620w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-100x66.jpg 100w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-190x126.jpg 190w, https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01-600x400.jpg 600w\" alt=\"\" width=\"1200\" height=\"800\" loading=\"lazy\" data-lazy-type=\"image\" data-src=\"https://cdn.automobile-propre.com/uploads/2022/12/Lucid-Air-Sapphire-Tesla-Model-S-Plaid-Performance-01.jpg\" data-srcset=\"\"></a></p>\r\n<div class=\"optidigital-wrapper-div\">&nbsp;</div>', '2022-12-05');
INSERT INTO `bloglist` (`id`, `title`, `img`, `description`, `fulltxt`, `datep`) VALUES
(43, 'Essai – Skoda Enyaq iV 80 : les temps de recharge et de voyage de notre Supertest', 'uploads/Essai-Skoda-Enyaq-iV-80-Supertest-44.jpg', 'C’est le Skoda Enyaq iV 80 qui a la meilleure autonomie pour voyager. À cela s’ajoute des performances de recharge très satisfaisantes !', '<p><strong>C&rsquo;est le Skoda Enyaq iV 80 qui a la meilleure autonomie pour voyager. &Agrave; cela s&rsquo;ajoute des performances de recharge tr&egrave;s satisfaisantes !</strong></p>\r\n<p>Le Skoda Enyaq iV 80 a pr&eacute;sent&eacute; une autonomie confortable lors de notre long trajet de r&eacute;f&eacute;rence de 500 km : avec sa consommation moyenne de 24,1 kWh/100 km, nous avons enregistr&eacute; une valeur totale de 320 km, soit 224 km sur un plein utile entre 80 et 10 % de charge. Malgr&eacute; les temp&eacute;ratures fra&icirc;ches rencontr&eacute;es lors de cet essai en fin d&rsquo;ann&eacute;e (10 &deg;C en moyenne), il entre dans le club ferm&eacute; des v&eacute;hicules &eacute;lectriques avec plus de 300 km sur ce parcours. On met d&eacute;sormais &agrave; l&rsquo;&eacute;preuve ses performances de recharge pour savoir s&rsquo;il est &agrave; la hauteur de sa polyvalence.</p>\r\n<h2>Courbe de recharge du Skoda Enyaq iV 80&nbsp;: un plein utile en 27 minutes</h2>\r\n<p>D&egrave;s sa sortie, le Skoda Enyaq IV annon&ccedil;ait une puissance de recharge maximale de 125 kW. Pire encore, il fallait mettre la main &agrave; la poche (525 &euro; en option) pour en b&eacute;n&eacute;ficier ! Mais Skoda a visiblement compris les critiques formul&eacute;es et propose dor&eacute;navant la pleine puissance en s&eacute;rie, qui grimpe &agrave; pr&eacute;sent &agrave; 135 kW. Cela permet au SUV d&rsquo;indiquer un temps de recharge (10-80 %) en 29 minutes.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_2\" class=\"Content_2 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_2\"></div>\r\n</div>\r\n<p>Et notre premier test sur une borne Ionity a &eacute;t&eacute; le bon : l&rsquo;Enyaq a pu faire son plein utile en seulement 27 minutes. Et ce gr&acirc;ce &agrave; une copieuse courbe de recharge qui lui permet de revendiquer une puissance moyenne de 124,4 kW ! &Agrave; notre petit jeu de<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/recharge-rapide-pourquoi-il-ne-faut-pas-se-fier-a-la-puissance-annoncee-et-quelles-voitures-electriques-sont-vraiment-les-meilleures/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"255231\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">&nbsp;l&rsquo;&eacute;cart entre la puissance promise et la moyenne constat&eacute;</a>, il prend la t&ecirc;te du classement avec une variation de seulement 8 %.</p>\r\n<p>Apr&egrave;s une courte mise en puissance, le SUV &eacute;lectrique a rapidement atteint sa puissance maximale annonc&eacute;e, conserv&eacute;e jusqu&rsquo;&agrave; pr&egrave;s de 40 % de charge. Nous avons m&ecirc;me pu observer lors de cet exercice un pic &agrave; 139 kW &agrave; 26 %. Toujours correcte, la puissance est maintenue jusqu&rsquo;&agrave; 60 %, avant de voir arriver la chute de courbe jusqu&rsquo;&agrave; 80 % de charge, o&ugrave; la puissance est toujours de 78 kW. Soit 43,9 % de moins que le pic observ&eacute; ce jour-l&agrave;. C&rsquo;est tr&egrave;s correct, tant en relatif qu&rsquo;en absolu : seuls les&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/essai-nissan-ariya-87-kwh-les-temps-de-recharge-et-de-voyage-de-notre-supertest/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"256401\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Nissan Ariya</a>&nbsp;(82 kW &agrave; 80 %) et&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/essai-hyundai-ioniq-5-htrac-les-temps-de-recharge-et-de-voyage-de-notre-supertest/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"256405\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">Hyundai Ioniq 5</a>&nbsp;(114 kW &agrave; 80 %) ont fait mieux.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_3\" class=\"Content_3 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_3\"></div>\r\n</div>\r\n<div id=\"ig-7cdeaee1-477c-ebdc-af0b-1a4932121eea\" class=\"infogram-embed\" data-id=\"recharge-rapide-skoda-enyaq-1h9j6qgejzpz54g?live\" data-type=\"interactive\" data-processed=\"1\"><iframe src=\"https://e.infogram.com/recharge-rapide-skoda-enyaq-1h9j6qgejzpz54g?live?parent_url=https%3A%2F%2Fwww.automobile-propre.com%2Fessai-skoda-enyaq-iv-80-les-temps-de-recharge-et-de-voyage-de-notre-supertest%2F&amp;src=embed#async_embed\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n<p>Au final, le Skoda Enyaq iV 80 d&eacute;passe les annonces du constructeur. Il faut ensuite compter 11 minutes pour atteindre les 90 %, et 18 minutes de plus pour faire le plein &agrave; 100 %. Au final, l&rsquo;exercice (10 &agrave; 100 %) r&eacute;clame 56 minutes. Il se met en deuxi&egrave;me position derri&egrave;re la Hyundai Ioniq 5 (un temps total de 46 minutes).</p>\r\n<p>Pr&eacute;cisons que lors de cet exercice, la temp&eacute;rature ext&eacute;rieure &eacute;tait de 7 &deg;C comme l&rsquo;indiquait le thermom&egrave;tre de la voiture. Cependant, au bout de presque une heure de recharge, la chaleur d&eacute;gag&eacute;e par la batterie &eacute;tait telle que la voiture captait une temp&eacute;rature environnante de 20 &deg;C ! Un dr&ocirc;le de ph&eacute;nom&egrave;ne que nous n&rsquo;avons jamais observ&eacute; auparavant.</p>\r\n<p>Enfin, ajoutons &agrave; ce chapitre que lors de nos autres tests avec des op&eacute;rateurs diff&eacute;rents, la courbe n&rsquo;&eacute;tait pas aussi constante. Nous avons toujours observ&eacute; un profil en pyramide, &agrave; l&rsquo;image de&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/comparatif-que-vaut-la-recharge-rapide-low-cost-des-bornes-lidl-face-a-ionity/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"260881\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">celle que nous avons rencontr&eacute;e sur une borne Lidl :</a>&nbsp;la mont&eacute;e en puissance &eacute;tait lin&eacute;aire jusqu&rsquo;&agrave; 40-45 % (128 kW de puissance &agrave; ce moment) avant de redescendre, et nous n&rsquo;avons jamais vu la couleur des 135 kW promis en dehors des bornes Ionity. En tout &eacute;tat de cause, nous avons chronom&eacute;tr&eacute; un temps de recharge en 28 minutes sur ces autres bornes, la diff&eacute;rence entre elles se jouant &agrave; quelques dizaines de secondes.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_4\" class=\"Content_4 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_4\"></div>\r\n</div>\r\n<div class=\"table-responsive\">\r\n<table><caption><strong>Courbe de recharge type</strong></caption>\r\n<tbody>\r\n<tr>\r\n<td width=\"230\">&nbsp;</td>\r\n<td width=\"180\"><strong>10 &agrave; 80&nbsp;%</strong></td>\r\n<td width=\"180\"><strong>&nbsp;80 &agrave; 100&nbsp;%</strong></td>\r\n<td width=\"180\"><strong>&nbsp;10 &agrave; 100&nbsp;%</strong></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Temps de recharge (en min)</strong></td>\r\n<td>27</td>\r\n<td>29</td>\r\n<td>56</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Autonomie gagn&eacute;e (en km)</strong></td>\r\n<td>224</td>\r\n<td>64</td>\r\n<td>288</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<h2>Autonomie r&eacute;cup&eacute;r&eacute;e&nbsp;: 233 km en 30 minutes</h2>\r\n<p>Rappelons que nous avons mesur&eacute; une autonomie moyenne de 320 km sur notre parcours de r&eacute;f&eacute;rence, soit 224 km d&rsquo;autonomie utile. L&rsquo;autonomie rapport&eacute;e &agrave; ses excellentes performances de recharge lui permet d&rsquo;afficher des ratios particuli&egrave;rement int&eacute;ressants : il peut r&eacute;cup&eacute;rer 233 km d&rsquo;autonomie en 30 minutes, ce qui le place ex aequo avec&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/essai-tesla-model-y-performance-les-temps-de-recharge-et-de-voyage-de-notre-supertest/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"263299\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">le Tesla Model Y Performance</a>.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_5\" class=\"Content_5 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_5\"></div>\r\n</div>\r\n<div class=\"table-responsive\">\r\n<table><caption><strong>Autonomie r&eacute;cup&eacute;r&eacute;e</strong></caption>\r\n<tbody>\r\n<tr>\r\n<td><strong>Temps de recharge (en min)</strong></td>\r\n<td><strong>15</strong></td>\r\n<td><strong>30</strong></td>\r\n<td><strong>45</strong></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Autonomie gagn&eacute;e (en km)</strong></td>\r\n<td>134</td>\r\n<td>233</td>\r\n<td>269</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<h2>Co&ucirc;t des recharges du Skoda Enyaq iV 80</h2>\r\n<p>Lors de nos diff&eacute;rentes recharges, nous avons mesur&eacute; une moyenne de 55,84 kWh d&eacute;livr&eacute;s par les bornes entre 10 et 80 %. Profitant d&rsquo;un partenariat avec Ionity, Skoda propose des tarifs plus attractifs : contre un abonnement mensuel de 9,99 &euro;/mois, l&rsquo;utilisateur peut profiter d&rsquo;un prix unitaire de 0,35 &euro;/kWh. Cela porte le co&ucirc;t de la recharge &agrave; pr&egrave;s de 19,5 &euro;, soit 8,7 &euro;/100 km lors d&rsquo;un trajet sur autoroute en moyenne.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_6\" class=\"Content_6 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_6\"></div>\r\n</div>\r\n<p>&Agrave; noter qu&rsquo;au tarif public Ionity, cela repr&eacute;sente un co&ucirc;t de revient de 17,2 &euro;/100 km. &Agrave; l&rsquo;inverse,&nbsp;<a class=\"linkInArticle\" href=\"https://www.automobile-propre.com/automobile-propre-a-assiste-au-lancement-de-la-recharge-rapide-et-pas-chere-de-lidl/\" target=\"_blank\" rel=\"noopener\" data-gtm-vis-first-on-screen-6957018_123=\"263450\" data-gtm-vis-total-visible-time-6957018_123=\"100\" data-gtm-vis-has-fired-6957018_123=\"1\">chez Lidl</a>, ce dernier pourrait tomber &agrave; pr&egrave;s de 10 &euro;/100 km sur l&rsquo;autoroute, soit autant qu&rsquo;avec une sobre thermique. Mais il faudrait pour cela attendre le d&eacute;veloppement du r&eacute;seau et un maintien des prix avant de tirer de jolies conclusions.</p>\r\n<div class=\"table-responsive\">\r\n<table><caption><strong>Co&ucirc;t des recharges par op&eacute;rateur</strong></caption>\r\n<tbody>\r\n<tr>\r\n<td width=\"230\">&nbsp;</td>\r\n<td width=\"180\"><strong>Ionity (offre Skoda)</strong></td>\r\n<td width=\"180\"><strong>Ionity</strong></td>\r\n<td width=\"180\"><strong>Fastned</strong></td>\r\n<td width=\"180\"><strong>Electra</strong></td>\r\n<td width=\"180\"><strong>Lidl</strong></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Prix unitaire (&euro;/kWh)</strong></td>\r\n<td>0,35</td>\r\n<td>0,69</td>\r\n<td>0,59</td>\r\n<td>0,44</td>\r\n<td>0,40</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Prix total (10-80 %)</strong></td>\r\n<td>19,5</td>\r\n<td>38,5</td>\r\n<td>32,9</td>\r\n<td>24,6</td>\r\n<td>22,3</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Co&ucirc;t de revient (&euro;/100 km)</strong></td>\r\n<td>8,7</td>\r\n<td>17,2</td>\r\n<td>14,7</td>\r\n<td>11,0</td>\r\n<td>10,0</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"tiled-gallery type-rectangular\" data-carousel-extra=\"{&quot;blog_id&quot;:1,&quot;permalink&quot;:&quot;https:\\/\\/www.automobile-propre.com\\/essai-skoda-enyaq-iv-80-les-temps-de-recharge-et-de-voyage-de-notre-supertest\\/&quot;}\" data-original-width=\"700\">\r\n<div class=\"gallery-row\">\r\n<div class=\"gallery-group images-1\">\r\n<div class=\"tiled-gallery-item tiled-gallery-item-large\"><a class=\"imgInArticle\" href=\"https://www.automobile-propre.com/essai-skoda-enyaq-iv-80-supertest-45/\"><img class=\"lazy-loaded\" title=\"Essai-Skoda-Enyaq-iV-80-Supertest-45\" src=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-45-460x307.jpg\" width=\"460\" height=\"307\" align=\"left\" data-attachment-id=\"164486\" data-orig-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-45.jpg\" data-orig-size=\"1200,800\" data-comments-opened=\"1\" data-image-meta=\"{&quot;aperture&quot;:&quot;1.73&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;Pixel 4&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;1669316743&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;4.38&quot;,&quot;iso&quot;:&quot;65&quot;,&quot;shutter_speed&quot;:&quot;0.039967&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;1&quot;}\" data-image-title=\"Essai-Skoda-Enyaq-iV-80-Supertest-45\" data-image-description=\"\" data-medium-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-45.jpg\" data-large-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-45-1024x683.jpg\" data-lazy-type=\"image\" data-src=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-45-460x307.jpg\"></a></div>\r\n</div>\r\n<div class=\"gallery-group images-2\">\r\n<div class=\"tiled-gallery-item tiled-gallery-item-small\"><a class=\"imgInArticle\" href=\"https://www.automobile-propre.com/essai-skoda-enyaq-iv-80-supertest-35/\"><img class=\"lazy-loaded\" title=\"Essai-Skoda-Enyaq-iV-80-Supertest-35\" src=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-35-227x152.jpg\" width=\"227\" height=\"152\" align=\"left\" data-attachment-id=\"164476\" data-orig-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-35.jpg\" data-orig-size=\"1200,800\" data-comments-opened=\"1\" data-image-meta=\"{&quot;aperture&quot;:&quot;4&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;Canon EOS 5D Mark III&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;1669647317&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;35&quot;,&quot;iso&quot;:&quot;200&quot;,&quot;shutter_speed&quot;:&quot;0.00625&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;1&quot;}\" data-image-title=\"Essai-Skoda-Enyaq-iV-80-Supertest-35\" data-image-description=\"\" data-medium-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-35.jpg\" data-large-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-35-1024x683.jpg\" data-lazy-type=\"image\" data-src=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-35-227x152.jpg\"></a></div>\r\n<div class=\"tiled-gallery-item tiled-gallery-item-small\"><a class=\"imgInArticle\" href=\"https://www.automobile-propre.com/essai-skoda-enyaq-iv-80-supertest-37/\"><img class=\"lazy-loaded\" title=\"Essai-Skoda-Enyaq-iV-80-Supertest-37\" src=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-37-227x151.jpg\" width=\"227\" height=\"151\" align=\"left\" data-attachment-id=\"164478\" data-orig-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-37.jpg\" data-orig-size=\"1200,800\" data-comments-opened=\"1\" data-image-meta=\"{&quot;aperture&quot;:&quot;4&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;Canon EOS 5D Mark III&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;1669647406&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;70&quot;,&quot;iso&quot;:&quot;200&quot;,&quot;shutter_speed&quot;:&quot;0.00625&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;1&quot;}\" data-image-title=\"Essai-Skoda-Enyaq-iV-80-Supertest-37\" data-image-description=\"\" data-medium-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-37.jpg\" data-large-file=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-37-1024x683.jpg\" data-lazy-type=\"image\" data-src=\"https://cdn.automobile-propre.com/uploads/2022/11/Essai-Skoda-Enyaq-iV-80-Supertest-37-227x151.jpg\"></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n<h2>Temps de trajet pour 500 km : 5 h 05</h2>\r\n<p>Avec son autonomie utile moyenne de 224 km, le Skoda Enyaq iV 80 aurait pu effectuer le trajet avec un seul arr&ecirc;t recharge. Mais cela aurait n&eacute;cessit&eacute; de faire un plein complet jusqu&rsquo;&agrave; 100 % &agrave; presque mi-parcours avant de reprendre la route, et passer la ligne d&rsquo;arriv&eacute;e avec 20 % de charge restante. Peu rentable en raison du temps d&rsquo;immobilisation en fin de charge, comme avec toutes les voitures &eacute;lectriques.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_7\" class=\"Content_7 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_7\"></div>\r\n</div>\r\n<p>D&egrave;s lors, nous avons planifi&eacute; deux recharges, avec un premier arr&ecirc;t &agrave; l&rsquo;aire des Loch&egrave;res non sans &ecirc;tre inquiets (nous y sommes arriv&eacute;s avec 4 % de charge restante) et un second &agrave; l&rsquo;aire de Darvault. Ceci nous a permis d&rsquo;&eacute;courter la recharge pour atteindre la barre des 70 %, qui sera suffisante pour atteindre la prochaine aire situ&eacute;e 182 km plus loin. C&rsquo;est l&agrave; que nous ferons un appoint de 30 % pour nous permettre d&rsquo;atteindre la ligne d&rsquo;arriv&eacute;e avec 19 % au final. Nous avons d&ucirc; patienter 24 minutes lors de la premi&egrave;re recharge et 13 minutes &agrave; la seconde. Soit une somme de 37 minutes qui, ajout&eacute;e au temps de parcours habituel, porte le total &agrave; 5 h 05. L&rsquo;Enyaq se place ainsi au niveau du Nissan Ariya 87, qui de son c&ocirc;t&eacute; a &eacute;conomis&eacute; un arr&ecirc;t gr&acirc;ce &agrave; son autonomie un peu plus confortable.</p>\r\n<p>&Agrave; noter que pour faciliter les trajets, le Skoda Enyaq iV (comme la plupart des autres v&eacute;hicules &eacute;lectriques du groupe) propose d&eacute;sormais un planificateur d&rsquo;itin&eacute;raire complet. Il pr&eacute;voit alors automatiquement les pauses et donne une indication sur les temps de recharge &agrave; respecter avant de reprendre la route. Pour y voir plus clair, la carte affiche aussi une zone isodistance avec l&rsquo;autonomie restante. Cependant, ces pr&eacute;dictions, qui ont le m&eacute;rite d&rsquo;exister (on peut visualiser le taux de charge &agrave; l&rsquo;arriv&eacute;e par exemple), reposent sur les moyennes de consommations pr&eacute;c&eacute;dentes sans tenir compte du trajet &agrave; venir. Attention &agrave; ne pas vous faire surprendre au moment d&rsquo;entrer sur l&rsquo;autoroute.</p>\r\n<div class=\"optidigital-wrapper-div\">\r\n<div id=\"optidigital-adslot-Content_8\" class=\"Content_8 optidigital-ad-center-sticky\" data-adslot-id=\"optidigital-adslot-Content_8\"></div>\r\n</div>\r\n<p>Avec l&rsquo;apparition de ce nouveau planificateur d&rsquo;itin&eacute;raire et d&rsquo;une puissance de recharge accrue par une simple mise &agrave; jour, le Skoda Enyaq iV se met au niveau de la concurrence actuelle et n&rsquo;a pas &agrave; rougir face aux t&eacute;nors de la cat&eacute;gorie que nous avons d&eacute;j&agrave; mesur&eacute;s cette ann&eacute;e. Reste qu&rsquo;il suit aussi la tendance en mati&egrave;re de tarification malheureusement : cette version 80 d&eacute;marre &agrave; 51 820 &euro; et s&rsquo;affiche &agrave; 59 100 &euro; en finition Sportline.</p>\r\n<div>&nbsp;</div>', '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `carslouer`
--

CREATE TABLE `carslouer` (
  `idVehicule` int(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `nb_place` int(50) NOT NULL,
  `ac` varchar(50) NOT NULL,
  `boite` varchar(255) NOT NULL,
  `carburant` varchar(255) NOT NULL,
  `id_c` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carslouer`
--

INSERT INTO `carslouer` (`idVehicule`, `img`, `marque`, `model`, `prix`, `reviews`, `nb_place`, `ac`, `boite`, `carburant`, `id_c`) VALUES
(4, 'assets/images/ford-ranger-raptor-2.0-l-diesel-bi-turbo-bva-10-46980.jpg', 'Ford', 'Raptor', 20, '10', 5, '0', 'manuelle', 'Mazot', 1),
(5, 'assets/images/toyota.jfif', 'Toyota', 'land cruiser', 85.665, '10', 5, '0', 'manuelle', 'Eccence', 1),
(7, 'assets/images/golf.jfif', 'Volkswagen', 'goolf 8', 53.195, '10', 4, '1', 'automatique', 'Eccence', 1),
(8, 'assets/images/marc.jfif', 'Mercedes-Benz', 'gle coupé', 80, '10', 4, '1', 'automatique', 'Eccence', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorypiece`
--

CREATE TABLE `categorypiece` (
  `idCategory` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorypiece`
--

INSERT INTO `categorypiece` (`idCategory`, `nom_cat`) VALUES
(3, 'Batteries'),
(4, 'Injection carburation'),
(5, 'Support moteur'),
(7, 'Freinage'),
(8, 'Filtration et Huile'),
(9, 'Embrayage et Boîte de Vitesse');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blogid` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `sitename`, `logo`, `email`, `phonenumber`, `address`, `fb`, `insta`, `yt`) VALUES
(1, 'ALPHAUTO', 'assets/images/logo.png', 'support@alphacars.tn', '+21650034045', '$$Av. Fethi Zouhir, Cebalat Ben Ammar 2083', 'https://www.facebook.com/esprit.tn/', 'https://www.instagram.com/esprit_ingenieur/', 'https://www.youtube.com/esprit_ingenieur');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ligne_panier`
--

CREATE TABLE `ligne_panier` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `id_panier` int(11) NOT NULL,
  `id_vehicule` int(11) DEFAULT NULL,
  `id_piece` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ligne_panier`
--

INSERT INTO `ligne_panier` (`id`, `quantite`, `id_panier`, `id_vehicule`, `id_piece`) VALUES
(125, 1, 173, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `listpiece`
--

CREATE TABLE `listpiece` (
  `idp` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nompiece` varchar(255) NOT NULL,
  `prixpiece` decimal(6,0) NOT NULL,
  `poidspiece` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `etatp` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listpiece`
--

INSERT INTO `listpiece` (`idp`, `img`, `nompiece`, `prixpiece`, `poidspiece`, `pays`, `etatp`, `category`) VALUES
(1, 'uploads/b1.jpg', 'NPS U540L03B', '45', '500g', 'Italie', 'utilisé', 3),
(2, 'uploads/logoblack.png', 'NPS U540L03B', '45', '500g', 'Italie', 'utilisé', 6),
(3, 'uploads/logoblack.png', 'NPS U540L03B', '45', '500g', 'Italie', 'utilisé', 6),
(4, 'uploads/logoblack.png', 'NPS U540L03B', '45', '500g', 'Italie', 'utilisé', 6),
(7, 'uploads/logoblack.png', 'NPS U540L03B', '45', '500g', 'Italie', 'utilisé', 6);

-- --------------------------------------------------------

--
-- Table structure for table `list_categ`
--

CREATE TABLE `list_categ` (
  `id` int(11) NOT NULL,
  `lista` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_categ`
--

INSERT INTO `list_categ` (`id`, `lista`) VALUES
(1, 'Sports'),
(2, 'pickup'),
(3, 'Confort'),
(4, 'Fancy'),
(5, 'okokl');

-- --------------------------------------------------------

--
-- Table structure for table `myreplies`
--

CREATE TABLE `myreplies` (
  `id` int(11) NOT NULL,
  `idfeed` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `paye` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `date_creation`, `paye`, `id_user`) VALUES
(169, '2022-12-18 17:52:14', 0, NULL),
(170, '2022-12-18 17:52:14', 0, NULL),
(171, '2022-12-18 17:52:14', 0, NULL),
(172, '2022-12-18 17:52:14', 0, NULL),
(173, '2022-12-18 17:52:34', 0, NULL),
(174, '2022-12-18 17:52:34', 0, NULL),
(175, '2022-12-18 17:52:34', 0, NULL),
(176, '2022-12-18 17:52:34', 0, NULL),
(177, '2022-12-18 17:52:34', 0, NULL),
(178, '2022-12-18 17:52:34', 0, NULL),
(179, '2022-12-18 17:52:34', 0, NULL),
(180, '2022-12-18 17:52:34', 0, NULL),
(181, '2022-12-18 17:52:34', 0, NULL),
(182, '2022-12-18 17:52:49', 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `rentcars`
--

CREATE TABLE `rentcars` (
  `id` int(11) NOT NULL,
  `carid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `debut` varchar(255) NOT NULL,
  `fin` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `done` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pasw` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `gender`, `email`, `pasw`, `phonenumber`, `type`, `verified`, `ip`) VALUES
(1, 'Amir', 'othman', 'male', 'amir.othman@esprit.tn', '21232f297a57a5a743894a0e4a801fc3', '+21650034045', '0', '1', '192.169.0.1'),
(21, 'Amir', 'othman', 'male', 'joseph.gatti@Outlook.com', '21232f297a57a5a743894a0e4a801fc3', '+21650034045', '1', '1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE `vehicule` (
  `idVehicule` int(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `nb_place` int(50) NOT NULL,
  `ac` varchar(50) NOT NULL,
  `boite` varchar(255) NOT NULL,
  `carburant` varchar(255) NOT NULL,
  `id_c` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`idVehicule`, `img`, `marque`, `model`, `prix`, `reviews`, `nb_place`, `ac`, `boite`, `carburant`, `id_c`) VALUES
(7, 'assets/images/golf.jfif', 'Volkswagen', 'goolf 8', 53.195, '10', 4, '1', 'automatique', 'Mazot', 1),
(8, 'assets/images/marc.jfif', 'Mercedes-Benz', 'gle coupé', 133.3, '10', 4, '1', 'automatique', 'Eccence', 1),
(26, 'uploads/7359683232ee4dcfd64944fed1ac3a5b0b7fcae3.webp', 'Pontiac', 'Carrera GT', 570, '10', 2, '0', 'automatique', 'Eccence', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verificationmail`
--

CREATE TABLE `verificationmail` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `done` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerlocation`
--
ALTER TABLE `answerlocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloglist`
--
ALTER TABLE `bloglist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carslouer`
--
ALTER TABLE `carslouer`
  ADD PRIMARY KEY (`idVehicule`),
  ADD KEY `id_c` (`id_c`);

--
-- Indexes for table `categorypiece`
--
ALTER TABLE `categorypiece`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_id` (`id_panier`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_panier` (`id_panier`),
  ADD KEY `id_vehicule` (`id_vehicule`),
  ADD KEY `id_panier_p` (`id_piece`);

--
-- Indexes for table `listpiece`
--
ALTER TABLE `listpiece`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `list_categ`
--
ALTER TABLE `list_categ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myreplies`
--
ALTER TABLE `myreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentcars`
--
ALTER TABLE `rentcars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idVehicule`),
  ADD KEY `id_c` (`id_c`);

--
-- Indexes for table `verificationmail`
--
ALTER TABLE `verificationmail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answerlocation`
--
ALTER TABLE `answerlocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bloglist`
--
ALTER TABLE `bloglist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `carslouer`
--
ALTER TABLE `carslouer`
  MODIFY `idVehicule` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categorypiece`
--
ALTER TABLE `categorypiece`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `listpiece`
--
ALTER TABLE `listpiece`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `list_categ`
--
ALTER TABLE `list_categ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `myreplies`
--
ALTER TABLE `myreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `rentcars`
--
ALTER TABLE `rentcars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idVehicule` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `verificationmail`
--
ALTER TABLE `verificationmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `panier_id` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
