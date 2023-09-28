-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 04:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newstoday`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_desc` varchar(255) NOT NULL,
  `c_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_desc`, `c_status`) VALUES
(2, 'Politics', 'Politics Category', 1),
(3, 'Science', 'Science Category', 1),
(6, 'Education', 'Education Category', 1),
(7, 'Health', 'Health Category', 1),
(8, 'Entertainment', 'Entertainment Category', 0),
(9, 'Sports', 'Sports Category', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmnt_id` int(11) NOT NULL,
  `cmnt_author` int(11) NOT NULL,
  `cmnt_desc` text NOT NULL,
  `cmnt_date` date NOT NULL,
  `cmnt_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmnt_id`, `cmnt_author`, `cmnt_desc`, `cmnt_date`, `cmnt_post`) VALUES
(1, 5, 'This is my first comment.Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. ', '2021-08-31', 16),
(2, 8, 'This is my second comment.Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee.', '2021-08-11', 16),
(3, 7, 'This is my third comment.', '2021-08-28', 16),
(7, 8, 'This news is awesome', '2021-08-28', 15),
(8, 5, 'I like to specify correctly', '2021-08-28', 14),
(9, 7, 'Hello', '2021-08-28', 16);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_author` int(11) NOT NULL,
  `p_description` text NOT NULL,
  `p_date` date NOT NULL,
  `p_category` int(11) NOT NULL,
  `p_comment` int(11) NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_title`, `p_image`, `p_author`, `p_description`, `p_date`, `p_category`, `p_comment`, `p_status`) VALUES
(5, 'China\'s astronauts make spacewalk to upgrade robotic arm', 'post1.jpg', 7, 'Chinese astronauts edged into space on Friday to add the finishing touches to a robotic arm on the Tiangong space station.\r\n\r\nThe foray, the second spacewalk in two months and relayed on state television, is part of China\'s heavily promoted space programme which has already seen the nation land a rover on Mars and send probes to the moon.\r\n\r\nIn June, three crew arrived at the station, where they are set to remain in space for a total of three months in China\'s longest crewed mission to date.\r\nOn Friday, astronauts Nie Haisheng and Liu Boming successfully exited the Tianhe core module to install foot stops and a workbench on the station\'s robotic arm, said the China Manned Space Agency in a statement.', '2021-08-11', 3, 1, 1),
(6, 'Allah kept me alive for welfare of people: PM (Updated)', 'post2.jpg', 5, 'Prime Minister Sheikh Hasina has said Almighty Allah might have saved her from the heinous grenade attack on August 21, 2004 to allow her to carry out welfare activities for the people of Bangladesh and that is why He has kept her alive.\r\n\r\n The Premier expressed her feeling in an interview taken by her Speech Writer Md. Nazrul Islam marking the 17th anniversary of the gruesome August 21 grenade attack on a peace rally of the Awami League against terrorism.\r\n\r\nThe full interview was presented here.        \r\nQuestion: Hon\'ble Prime Minister, on August 21, 2004, more than a dozen grenades were hurled at an anti-terrorist rally of Awami League at Bangabandhu Avenue with the intention of assassinating you. Although you survived the attack, some 22 leaders of the party including Ivy Rahman were killed on that day. Around 500 people were injured. How do you feel when you look back?', '2021-08-20', 2, 1, 1),
(9, 'Global Covid cases near 211 million', '1067426783post4.jpg', 7, 'With the highly contagious Delta variant spreading rapidly across several countries, the global Covid-19 caseload is also fast approaching the grim milestone of 211 million.\r\n\r\nThe total caseload and fatalities stand at 210,820,517 and 4,414,840, respectively, as of Saturday morning, according to Johns Hopkins University (JHU).\r\n\r\nSo far, 4,867,004,474 vaccine doses have been administered across the globe.\r\n\r\nThe US, which is the worlds worst-hit country in terms of both cases and deaths, has so far logged 37,613,490 cases, according to JHU, while 627,843people have lost their lives to Covid to date.\r\n\r\nBrazil currently has the worlds second-highest pandemic death toll after the United States and the third-largest caseload after the United States and India.', '2021-08-22', 7, 0, 1),
(10, 'Afghanistan: US tells citizens to avoid Kabul airport', '1287661340post5.jpg', 7, 'The US has warned its citizens to avoid Kabul airport amid continued chaos outside the terminal.\r\n\r\nA security alert issued on Saturday told US citizens to stay away due to \"potential security threats outside the gates\".\r\n\r\nOnly those individually told to make the journey by a US government representative should do so, it said.\r\nThe advice comes as thousands try to escape from Afghanistan via the airport following the Taliban takeover, BBC reported.\r\n\r\nThe militant group swept across the country and captured the capital Kabul on August 15. Since then, tens of thousands of Afghans - as well as foreign nationals - have headed to the airport in a bid to flee the country.\r\n\r\nIn a briefing on Saturday, the US Department of Defense said 17,000 people have been flown out of the airport, including some 2,500 US citizens.\r\n\r\nOther countries have also warned about the situation on the ground.\r\n\r\nGermany\'s government issued a statement saying the airport remains \"extremely dangerous and access to the airport is often not possible\", while the Swiss foreign ministry announced the security situation had \"deteriorated significantly in the last few hours\" and postponed a chartered evacuation flight from Kabul.', '2021-08-22', 2, 0, 1),
(11, 'Akram positive about Tamim’s WT20 participation', '1256867507post7.jpg', 7, 'A Bangladesh Cricket Board official on Saturday expressed his confidence of getting the service of their star batsman Tamim Iqbal in the upcoming edition of ICC World T20, scheduled in UAE and Oman in October-November.\r\n\r\n“I don\'t see any doubt (regarding his participation in World T20),” BCB Cricket Operation Chairman Akram Khan told reporters in Mirpur.\r\n\r\n“Tamim is one of the best batsmen in the country and there is no question about it. He will play when he is fit and he will be with the team.\r\n“His problem is injury and the selectors are talking to the doctors and physio on the development and they are keeping a close eye on that,” he added.\r\n\r\nThe 32-year old, who is currently carrying a knee injury, opted for a long lay-off after the end of the ODI series against Zimbabwe in July in order to get completely recovered from the injury.\r\n\r\n', '2021-08-22', 8, 0, 1),
(12, 'HC orders probe into bullying death of a student in city', '804261989post8.jpg', 5, 'The High Court ordered investigation into alleged death of a Class 10 student of Banasree branch of Ideal School and College due to bullying by students and teachers.\r\n\r\nA division bench comprising Justice M Enayetur Rahim and Justice Md Mostafizur Rahman passed the order on Sunday following a writ petition filed by Supreme Court Advocate Tanvir Ahmed on August 16.\r\n\r\nThe HC directed Dhaka district education officials to hold the investigation and submit report within 60 working days.\r\nBesides, the court issued a rule asking the authorities concerned to explain why their inaction to protect students from bullying in the campus shall not be declared illegal. It also asked why educational institutions will not have anti-bullying policy.\r\n\r\nThe education secretary, the law secretary, the secretary to the ministry of women and children’s affairs, district education officials, Upazila education officials and the principal of Ideal School and College will have to reply to the rule in four weeks.', '2021-08-23', 6, 0, 1),
(13, 'Public universities to reopen in phases from October 17', '2061085823post9.jpg', 7, 'Public universities of the country will reopen in phases from October 17, according to a decision of the officials concerned.   \r\n\r\nThe decision was taken in a meeting of a technical committee along with the education ministry and the primary and mass education ministry on Thursday afternoon.\r\n\r\nThe universities, however, will have to send vaccine related information to the University Grant Commission (UGC) before that.\r\nState Minister for Primary and Mass Education Zakir Hossen, Deputy Education Minister Mohibul Hassan Chowdhury, high officials of Secondary and Higher Education Division, Technical and Madrasah Education Division, chairman and members of University Grants Commission attended the meeting while Education Minister Dipu Moni presided over it.\r\n\r\nChairman of the National Technical Advisory Committee on Covid-19, Vice Chancellors of public universities, high officials of Directorate of Secondary and Higher Education, Directorate of Primary Education, and education board chairmen were also present.', '2021-08-26', 2, 0, 1),
(14, 'Shots fired at Italian plane evacuating ex-Nato staff from Kabul', '1619532044post1.jpg', 7, 'Shots have been fired at an Italian military plane currently part of evacuation efforts in Afghanistan, according to Italian media reports.\r\n\r\nMilitary sources told Italian news agency ANSA that a C-130 transport carrying Afghan ex-Nato workers out of Kabul was fired on as it left the airport.\r\n\r\nNo damage or injuries have been reported.\r\nAn Italian journalist travelling on the flight told Sky 24 TG that the plane had been carrying almost 100 Afghan civilians when it came under fire minutes after take off.\r\n\r\n“The pilot reacted promptly and implemented manoeuvres to avoid being hit within minutes of taking off from Kabul. There was a bit of panic,” said the journalist.\r\n\r\nHowever, Reuters has reported that an Italian intelligence source now believes the shots were fired in the air as a means to disperse cvast crowds at the airport, rather than directly towards the plane departing.\r\n\r\nThe incident comes as growing tension builds in the Afghan capital as the US-led evacuation of foreign nationals and Afghans with visas enters its final days before a 31 August deadline.', '2021-08-26', 3, 0, 1),
(15, 'Billions of taka embezzled from int\'l incoming calls', '47070229post10.jpg', 7, 'Billions of taka from the government revenue have been embezzled by a syndicate of International Gateway (IGW) operators in collaboration with a section of officials of state-run BTCL and BTRC. \r\nThe IGW operators and some officials of Bangladesh Telecommunications Company Limited (BTCL) and Bangladesh Telecommunication Regulatory Commission (BTRC) misappropriated the money sharing the revenue generated by international incoming calls among themselves.\r\n\r\nThe Anti-Corruption Commission (ACC) has been investigating the issue as the government has lost huge revenues due to the anomalies.\r\n\r\nIn a letter issued on August 19, the ACC asked BTRC to provide related documents and information on the issue by August 31.\r\n\r\nTalking to the Daily Sun, ACC Deputy Director (money laundering) Jalal Uddin Ahammed confirmed the matter.\r\n\r\n“Yes, we are investigating the graft linked to the revenue of international incoming calls. And the investigation is in progress,” he said.', '2021-08-27', 3, 0, 1),
(16, 'ADB okays $1.78 billion for Dhaka-Sylhet trade corridor', '252910938post11.jpg', 7, 'The Asian Development Bank (ADB) on Friday approved a $1.78 billion multi-tranche financing facility (MFF) to improve mobility, road safety, and regional trade along the Dhaka-Sylhet trade corridor in Bangladesh.\r\n\r\nThe SASEC Dhaka-Sylhet Corridor Road Investment Project will be delivered in four tranches, according to the global lender.\r\n\r\nThe $400 million first tranche of the MFF will help finance the initial works of the major contracts for the widening of about 210 km of National Highway 2 along the Dhaka–Sylhet corridor from two to four lanes. It will include 60 km of footpath, 26 foot bridges, and 13 overpasses.\r\nIts design will have features responsive to the needs of the elderly, women, children, and the differently abled, as well as disaster and climate risks.\r\n\r\nThe government will fund $911 million of the total project cost of $2.69 billion. Apart from the MFF, ADB will also provide a $1 million technical assistance grant from its Technical Assistance Special Fund and an additional $2 million grant from the Japan Fund for Poverty Reduction, financed by the Government of Japan, to support capacity building of the Roads and Highways Department on road safety and maintenance, climate change, and gender equality and social inclusion.', '2021-08-27', 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_phone` int(11) NOT NULL,
  `u_dob` date NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `u_bio` text NOT NULL,
  `u_education` text NOT NULL,
  `u_role` int(11) NOT NULL,
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_image`, `u_email`, `u_password`, `u_address`, `u_phone`, `u_dob`, `u_gender`, `u_bio`, `u_education`, `u_role`, `u_status`) VALUES
(5, 'Hasnaina', '589704599hasnain.jpg', 'hasnaina@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Beach Road, UK.', 990349434, '1999-06-01', 'Female', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.', 0, 0),
(7, 'Akib Uddin Nayan', '865927702akib.png', 'akibnayan182@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '6 No Ward Satkania Pourashava, Satkania Chattogram., Bahaddarhat, Chattogram.', 1723195116, '1999-08-30', 'Male', 'I am a student.', 'BGC Trust University Bangladesh.', 2, 1),
(8, 'Majedul Hassan', '688779023abdullah.jpg', 'majedulhassan22@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Court Road, Cox\'s Bazar, Chattogram', 1723195116, '1999-08-07', 'Female', 'Lorem ipsum dolor\'s', 'Lorem ipsum\'s', 2, 1),
(10, 'Sabbir', '', 'sabbir@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '', 0, '0000-00-00', '', '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmnt_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
