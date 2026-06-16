-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Jun 14, 2026 at 07:15 PM
-- Server version: 9.7.0
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektni`
--
CREATE DATABASE IF NOT EXISTS `projektni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `projektni`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Muzika'),
(3, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `id` int NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `password`, `razina`) VALUES
(1, 'Ide', 'Gas', 'idegas', '$2y$12$yQvE2WJ8iapFsB.Z4QROrupyDVB5vn9R5lGkk9zfMy0vbdZ1vFCRS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(355) NOT NULL,
  `date` date NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `date`, `archive`, `id_category`) VALUES
(14, ' Europa tog nema, a uskoro neće niti Amerika. Šteta što nisam odselio u Teksas dok sam bio mlad i zdrav', 'Teksašanin Paul Cauthen mogao bi zauzeti mjesto koje je donedavno okupirao prije koji tjedan preminuli country odmetnik David Allan Coe (1939.-2026.). Jest da Paul, za razliku od Davida, još nije bio po zatvorima i bankrotirao, ali Cauthenove pjesme donose sličan odmetnički narativ dok mu je glas nalik na mješavinu vokala Waylona Jenningsa i Johnnyja Casha. Njegovi raniji albumi, kao i oni sastava Sons Of Fathers, nisu bili na razini na kojoj je \"Book Of Paul\", na čijoj se naslovnici ukazuje poput vestern junaka iz filmova Clinta Eastwooda.\r\n\r\nTeksaško šepirenje, priče s ceste i iz barova, natopljene viskijem i duhanskim dimom, tutnjavom kamiona i divljih konja, traženjem kavge i zagrljaja lakih žena ne samo da u sjećanje prizivaju starinski honky tonk nego su i potraga za životom lišenim stega. Za takvu su slobodu potrebna prostranstva bez granica, jeftini automobili, gorivo, moteli i restorani, odnosno priuštivi \"gas, food & lodging\", kako je prije četrdesetak godina svoj antologijski album nazvala grupa Green On Red. To je ono što Europa nema, a bez čega će uskoro ostati i Amerika. Jebeš moderna vremena, rekao bi potpisnik ovih redaka, žaleći što se nije odselio u Teksas dok je bio mlad i zdrav.', 'uploads/_europa_tog_nema,_a_uskoro_neće_niti_amerika._Šteta_što_nisam_odselio_u_teksas_dok_sam_bio_mlad_i_zdrav.jpg', '2026-06-11', 0, 1),
(15, 'Nina Badrić otkrila neočekivane navike i što nosi u torbici: ‘Tako je to kod nas cura‘', 'Jedna od najomiljenijih pop-zvijezda, Nina Badrić, gostovala je u emisiji \"Velika pitanja malih ljudi\" na Bravo Kids radiju, gdje ju je ugostila najmlađa radijska voditeljica u Hrvatskoj – Maša Gavranić.\r\n\r\n\"Drago mi je da si me pozvala. Jako sam se radovala. Čula sam da si fantastična, pravi profesionalac, ali nisam znala da si tako lijepa. Dovela sam ti i Tota\", rekla je Nina kroz osmijeh.\r\n\r\nPrisjećajući se svojih početaka, otkrila je da je vrlo rano znala čime se želi baviti u životu.\r\n\r\n\"Imala sam devet godina kad sam se upisala u zbor Zvjezdice, ali sam i ranije znala da ću biti pjevačica kad narastem. Pravila sam se da sam najbolja, mikrofon bi mi bio lak za kosu ili četka. Kad bi me roditelji poveli na svadbu ili feštu, onda bih ukrala pjevačici mikrofon dok je na pauzi\", ispričala je.\r\nNa Mašino pitanje koja joj je omiljena pjesma koju je otpjevala, Nina je rekla: \"Možda ‘Čarobno jutro‘. Mislim da je to pjesma koja će ostati za sva vremena.\"\r\n\r\nIako joj je glazba obilježila cijeli život, priznaje da postoje trenuci kada joj je potrebna tišina.\r\n\"Nećeš vjerovati, ali nikad ne pjevam pod tušem. Čak nekad ne slušam glazbu dok sam u autu. Stalno sam u studiju, na koncertima, život mi je obilježen glazbom, tako da se nekad odmorim kad mogu. Na moru su mi cvrčci glazba\", rekla je Nina, otkrivši i koliko voli boraviti uz more: \"Tamo mi je sve super. Tamo ništa ne raditi mi je zakon.\"\r\nU razgovoru nije nedostajalo ni zabavnih pitanja. Kada bi se na jedan dan mogla zamijeniti s nekim drugim zanimanjem, izbor bi bio vrlo jednostavan.\r\n\r\n\"Zamijenila bih se s nekom kuharicom da uvijek mogu jesti finu hranu\", kroz smijeh je priznala glazbena diva.\r\n\r\nOtkrila je i da je privatno najčešće možemo vidjeti u opuštenim izdanjima: \"Više volim trenirku privatno. Evo, danas imam tenisice. Ali mi je lijepo i kad me drugi srede za nastup, naprave mi neku lijepu haljinu poput tvoje sada.\" Na kraju je Maši dopustila i mali uvid u svoju torbicu.\r\n\r\n\"Ti možeš slobodno zaviriti u moju torbicu. Imam mobitel, novčanik i nosim vrećice za psa i neke grickalice za njega. Torba mi je kao i svaka druga, prepuna beskorisnih stvari. Ova je sad mala, a na put uglavnom nosim veliku torbu u kojoj ništa ne mogu naći. Tako je to kod nas cura\", zaključila je Nina.', 'uploads/nina_badrić_otkrila_neočekivane_navike_i_što_nosi_u_torbici:_‘tako_je_to_kod_nas_cura‘.jpg', '2026-06-10', 0, 1),
(16, 'Ovaj nevjerojatni album poslušao sam barem 5 puta, a sada više ne postoji. Možda ga više nikada nećemo čuti', 'Bacite li pogled na ovotjednu Billboardovu ljestvicu \"najtiražnijih\" albuma SAD-a, uvidjet ćete da trećinu prvih trideset tvore recentni albumi Morgana Wallena, Noe Kahana, Lukea Combsa, Kacey Musgraves, Elle Langley kojoj predviđaju popularnost nalik na onu Taylor Swift i Post Malonea koji stvara hibride countryja, trapa, rocka i popa. Country je opet u sedlu, zahvaljujući i popularnosti serija poput \"Yellowstonea\", \"Marshallsa\", \"Dutton Rancha\" i ostalih iz produkcije američkog kralja televizijskih serija Taylora Sheridana, ali i zbog toga što country pjevači i pjevačice, često autori svojih pjesama, pjevaju o stvarnim problemima stvarnih ljudi.\r\n\r\nuspomene\r\nNedavno objavljeni \"Dandelion\" Elle Langley i \"Middle Of Nowhere\" Kacey Musgraves nisu samo dobri country nego i efektni pop albumi,...', 'uploads/ovaj_nevjerojatni_album_poslušao_sam_barem_5_puta,_a_sada_više_ne_postoji._možda_ga_više_nikada_nećemo_čuti.jpg', '2026-03-21', 0, 1),
(17, 'Život mu je kao iz starih country pjesama, a glas nalik Elvisovom. Bila mi je čast zapiti se s njim u Ljubljani, Zagrebu i Austinu', 'Moj dobar poznanik Dale Watson već nekoliko godina nažalost nije posjetio Zagreb iako mu je sadašnja životna družica Cecil porijeklom s Brača, a i njegov pedal-steel gitarist ima rodbinu u Gorskom kotaru. Šteta, jer taj country \"gospodin ugodnog baritona\", kako je Goran Bare nazivao Merlea Haggarda dok sam menadžerirao Majke, postojano niže kvalitetne albume na kojima, kao i na nastupima, plijeni pažnju i fingerpickingom te pričama o \"životu poput pjesme\".\r\nDale gleda u retrovizor znajući da je prije bilo bolje, no prava je šteta što, unatoč tristotinjak koncerata koliko ih godišnje odradi, ne uspijeva ni u Americi dosegnuti popularnost Willieja ili Waylona iz sedamdesetih o kojima uz viski pjeva u uvodnoj pjesmi. Vraški je zabavan, ali i u pravu kad se pita što se dovraga dogodilo s Cadillacom, radiom i američkom ljubaznošću, ali i potresan kad pjeva \"ako me zaista voliš, nadživi me\". Naime, njegova djevojka prije više od četvrt stoljeća poginula je u prometnoj nesreći nakon čega je Dalea od samoubojstva tabletama za spavanje spasio njegov menadžer. Daleov život je kao iz starih country pjesama, a on poput mitskog lika s glasom nalik na Elvisov, i baš mi se iz tog razloga bila čast u Ljubljani, Zagrebu i Austinu zapiti s njim.', 'uploads/Život_mu_je_kao_iz_starih_country_pjesama,_a_glas_nalik_elvisovom._bila_mi_je_čast_zapiti_se_s_njim_u_ljubljani,_zagrebu_i_austinu.jpg', '2026-06-12', 0, 1),
(19, 'Parking 175 dolara, vlak 80, autobus 95... izvodi li se upravo završni čin ubijanja nogometa', 'Bila je to scena koja idealno ilustrira kako funkcionira sportski biznis na najvišoj razini u eri karizmatičnih autokrata, prizor toliko groteskan da je odmah ušao u \"hall of fame\" memeova. Bio je srpanj 2025., finale Klupskog svjetskog prvenstva u New Jerseyju. Donald Trump, koji je sebe netom prije proglasio predsjednikom organizacijskog odbora Mundijala 2026., pristupa pobjedničkom peharu, podiže ga u zrak i širi ruke kao da je upravo on zabio pobjednički gol.\r\n\r\nGianni Infantino, predsjednik Fife, ni ne pokušava ga ukloniti s pozornice - možda je znao da se ovaj ne bi ni dao potjerati. Vrhunac svega jest to da Trump odlazi s trofejom u Bijelu kuću, gdje ga izlaže kao ukras, a za igrače Chelseaja morali su napraviti novi.', 'uploads/parking_175_dolara,_vlak_80,_autobus_95..._izvodi_li_se_upravo_završni_čin_ubijanja_nogometa.jpg', '2026-02-14', 0, 3),
(20, 'U Fifu stigao šokantan zahtjev Trumpovog izaslanika: Želim Italiju na SP-u, neka zamijene Iran', 'Italija je doživjela šok kad je nacionalna reprezentacija treći put zaredom propustila Svjetsko prvenstvo nakon poraza od Bosne i Hercegovine, no čini se da nije sve gotovo...\r\n\r\n\r\nIzaslanik američkog predsjednika Donalda Trumpa zatražio je od Fife da zamijeni Iran Italijom na nadolazećem Svjetskom prvenstvu, otkriva Financial Times.\r\n\r\nPlan je dio pokušaja popravka odnosa između Trumpa i talijanske premijerke Giorgie Meloni, tvrde izvori FT-a, nakon nesuglasica koje su se stvorile kad je američki predsjednik napao papu Lava XIV. zbog rata u Iranu. - Potvrđujem da sam Trumpu i predsjedniku FIFA-e Gianniju Infantinu predložio da Italija zamijeni Iran na Svjetskom prvenstvu. Talijanskog sam podrijetla i san mi je vidjeti Azzurre na turniru koji organiziraju SAD. S četiri naslova imaju predispozicije da opravdaju sudjelovanje - rekao je američki posebni izaslanik Paolo Zampolli za FT.\r\n\r\nItalija je u ožujku doživjela šok kad je nacionalna reprezentacija treći put zaredom propustila Svjetsko prvenstvo nakon poraza od Bosne i Hercegovine. Iz Irana su u srijedu priopćili da su spremni za turnir i potvrdili da planiraju sudjelovati, piše The Guardian.', 'uploads/u_fifu_stigao_šokantan_zahtjev_trumpovog_izaslanika:_Želim_italiju_na_sp-u,_neka_zamijene_iran.jpg', '2026-05-14', 0, 3),
(21, 'Kako je bivši vojni pilot i zapovjednik eskadrile stvorio najveću senzaciju europskog nogometa', 'Norveški klub s ruba Arktika pobjeđuje velikane oslonjen na neočekivanu mentalnu revoluciju bivšeg pilota\r\n\r\n\r\nNajveća senzacija sezone u europskom nogometu je norveški klub Bodø/Glimt. I to ne samo zato što su prošle srijede u osmini finala Lige prvaka pomeli Sporting iz Lisabona s uvjerljivih 3:0, nego zato što je Bodø, smješten u Arktičkom krugu, u gotovo svemu jedinstvena pojava u današnjem nogometu.\r\n\r\nPsihološke metode\r\nOd toga da je etnički gotovo homogen, a igrači su dvadesetorica Norvežana, četvorica Danaca, ruski golman (koji je podnio zahtjev za norveško državljanstvo) i jedan Nigerijac, do toga da se svi slažu kako su za uspjehe najzaslužnije psihološke metode koje provodi nekadašnji vojni pilot.Najveća senzacija sezone u europskom nogometu je norveški klub Bodø/Glimt. I to ne samo zato što su prošle srijede u osmini finala Lige prvaka pomeli Sporting iz Lisabona s uvjerljivih 3:0, nego zato što je Bodø, smješten u Arktičkom krugu, u gotovo svemu jedinstvena pojava u današnjem nogometu.\r\n\r\n\r\n', 'uploads/kako_je_bivši_vojni_pilot_i_zapovjednik_eskadrile_stvorio_najveću_senzaciju_europskog_nogometa.jpg', '2026-07-20', 0, 3),
(22, 'Sopić je promašio s terapijom, a Kovačević dobio nove adute među igračima s ruba rostera', '\r\nOsijekov strateg ušao je u utakmicu spuštenog garda, očito uvjeren u kvalitetu novih igrača, ali plan mu se raspao\r\n\r\n\r\nPlan Željka Sopića da s pucnjem izleti iz startnog bloka SHNL-a u nedjelju je trajao svega trideset minuta. Zgužvao ga je Luka Stojković, kojem polako prelazi u naviku na Opus Areni zakucavati loptu pod gredu iz peterca. Učinio je to ljetos na početku prvenstva (2-0, strijelci Stojković i Kulenović), a onda se na isti način ‘prijavio‘ i u šest mjeseci kasnije i to nakon samo sedam minuta provedenih na travnjaku (ušao u 23. minuti umjesto ozlijeđenog Bennnacera). Njegov gol je razoružao i demoralizirao domaćina. Kako je utakmica odmicala, Osijek je sve jasnije patio. Sopićeva strategija bila je ambiciozna, a vjerojatno i prerizična s obzirom na klasu suparničkih igrača: odlučio je Osijekov trener visoko napasti Dinamo, očito uvjeren u kvalitetu nogometaša koje je zimus dao.', 'uploads/sopić_je_promašio_s_terapijom,_a_kovačević_dobio_nove_adute_među_igračima_s_ruba_rostera.jpg', '2026-05-28', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
