-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2025 at 08:26 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamb_prep`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` varchar(2500) NOT NULL,
  `options` varchar(2500) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `options`, `subject`) VALUES
(1, 'If M represents the median and D the mode of the measurements 5, 9, 3, 5, 8 then (M,D) is\r\n', 'A. (6,5) B. (5,8) C. (5,7)\r\nD. (5,5) E. (7,5)', 'Mathematics'),
(2, 'A construction company is owned by two partners X and Yand it is agreed that their profit will be divided in the ratio 4:5. at the end of the year. Y received #5,000 more than x. what is the total profit of the company for the year?\r\n', 'A. #20,000.00 B. #25,000.00 C. #30,000.00\r\nD. #15,000.003 E. #45,000.00\r\n', 'Mathematics'),
(6, 'If x is jointly proportional to the cube of y and the fourth power of z. In what ratio is x increased or decreased when y is halved and z is doubled?\r\n', 'A. 4:1 increase B. 2:1 increase C. 1:4 decrease\r\nD. 1: 1 nochange E. 3: 4 decrease\r\n', 'Mathematics'),
(5, 'Solve the simultaneous equations for x:\r\nx2 + y - 8 = 0\r\ny + 5x - 2 = 0', 'A. -28,7 B. 6,-28 C. 6,-1 D. -1,7 E. 3,2\r\n\r\n', 'Mathematics'),
(7, 'The scores of 16 students in a Mathematics test are 65,65,55,60,60,65,60,70,75,70,65,70,60,65,65,70. What is the sum of the median and modal scores?\r\n', 'A. 125 B. 130 C. 140\r\nD. 150 E. 137.5\r\n', 'Mathematics'),
(8, 'The letters of the word MATRICULATION are cut and put into a box. One of the letter is drawn at random from the box. Find the probability of drawing a vowel.\r\n', 'A. 2/13 B. 5/13 C. 6/13 D. 8/13 E. 4/13\r\n', 'Mathematics'),
(9, 'Correct each of the number 59.81789 and 0.0746829 to three significant figures and multiply them, giving your answer to three significant figures.\r\n', 'A. 4.46 B. 4.48 C. 4.47 D. 4.49 E. 4.50\r\n', 'Mathematics'),
(10, 'If a rod of length 250cm is measured as 255cm longer in error, what is the percentage error in measurement?\r\n', 'A. 55 B. 10 C. 5 D. 4 E. 2\r\n', 'Mathematics'),
(11, 'Solve the following equations\r\n4x - 3 = 3x + y = 2y + 5x - 12\r\n', 'A. 4x=5, y= 2 B. x=2, y=5 C. x=-2, y=-5 D. x=5, y=-2 E. x=-5, y=-2\r\n', 'Mathematics'),
(14, 'The scores of a set of a final year students in the first semester examination in a paper are\r\n41,29,55,21,47,70,70,40,43,56,73,23,50,50. find the median of the scores.\r\n\r\n', 'A. 47 B. 481/2 C. 50\r\n\r\nD. 48 E. 49', 'Mathematics'),
(15, 'Read the passage carefully and answer the question that follows\\n\r\n\r\nPASSAGE\\n\r\n\r\nAll over the world till lately and in most of the world till today, mankind has been following the course of nature: that is to say, it has been breeding up to the maximum. To let nature, take her course in the reproduction of the human race may have made sense in an age in which we were also letting her take her course in decimating mankind by the casualties of war, pestilence, and famine. Being human, we have at least revolted against that senseless waste. We have started to impose on nature\'s heartless play a humane new order of our own. But when once man has begun to interfere with nature, he cannot afford to stop half way. We cannot, with impunity, cut down the death-rate and at the same time, allow the birthrate to go on taking nature\'s course. We must consciously try to establish an equilibrium, or sooner or later, famine will stalk abroad again.\\n\r\n\r\n\r\n\r\nQuestion 1: The author observes that:\r\n\r\n\r\n\r\n\r\n\r\n', 'A. war, pestilence and famine were caused by taiko the extravagance of nature\r\nB. Nature was heartless and senseless\r\nC. there was a time when uncontrolled birth made sense\r\nD. It was wise at a time when mankind did not interfere with normal reproduction\r\nE. nature was heartless in its reproductive process.', 'Use of English'),
(16, 'In the match against the uplanders team, the sub mariners turned out to be the dark horse. Choose the option that best conveys the meaning of the dark horse in the following sentence;', 'A. played most brilliantly\r\nB. played below their usual form\r\nC. won unexpectedly\r\nD. lost as expected\r\nE. won as expected', 'Use of English'),
(17, 'Only the small fry get punished for such social misdemeanors.\r\nChoose the option that best conveys the meaning of the small fry in the following sentence;', 'A. small boys\r\nB. unimportant people\r\nC. frightened people\r\nD. frivolous people\r\nE. inexperienced people', 'Use of English'),
(18, 'He spoke with his heart in his mouth.\r\nChoose the option that best conveys the meaning of the \'heart in his mouth\' in the following sentence;\r\n\r\n', 'A. courageously\r\nB. with such unusual cowardice\r\nC. with a lot of confusion in his speech\r\nD. without being able to make up his mind\r\nE. with fright and agitation', 'Use of English'),
(19, 'Mrs. Dada has been deserted by her husband because he feels she has a heart of stone. Choose the option that best conveys the meaning of the heart of stone in the following sentence;\r\n\r\n', 'A. she has a heavy heart\r\nB. she has little warmth of feeling\r\nC. she has a hard heart\r\nD. she is hard hearted\r\nE. she has a strong heart', 'Use of English'),
(20, 'When the beggar was tired, he ..... down by the roadside. \r\nComplete the sentence by choosing the option that most suitably fills the space;\r\n\r\n', 'A. lied\r\nB. laid\r\nC. layed\r\nD. lay\r\nE. lain', 'Use of English'),
(21, 'The employer, not the salesman and his representative ..... responsible for the loss.\r\nComplete the sentence by choosing the option that most suitably fills the space;\r\n', 'A. are\r\nB. are being\r\nC. are never\r\nD. have been\r\nE. is\r\n', 'Use of English'),
(22, 'The dog was limping. It appeared that one of its legs might have been injured.\r\nChoose the option which is nearest in meaning to the sentence above in the following options:\r\n', 'A. The dog was limping as if it had an injured leg\r\nB. The dog was limping as it had an injured leg\r\nC. The dog was limping so it had an injured leg\r\nD. The dog was limping so as it had an injured leg\r\nE. The dog was limping for it had an injured leg\r\n', 'Use of English'),
(23, 'I can walk that distance and have done so many times.\r\nChoose the option which is nearest in meaning to the sentence above in the following options:\r\n', 'A. I am used to walk that distance\r\nB. I used to walk that distance\r\nC. I used to walking that distance\r\nD. I am used to walking that distance\r\nE. I will walk that distance\r\n', 'Use of English'),
(24, 'The member of the panel were .....\r\nChoose the expression which best complete the sentence: \r\n', 'A. discussing about it\r\nB. discussing on it\r\nC. discussing upon it\r\nD. discussing it\r\nE. discussing around it', 'Use of English'),
(25, 'Which of the following elements are necessary for the formation of chlorophyll in a plant?\r\n', 'A. Magnesium and iron B. Calcium and potassium C. Calcium and sulphur D. Potassium and sulphur E. Phosphorus and potassium.\r\n', 'Biology'),
(26, 'Which of the following statements is NOT true of mammalian erythrocytes?\r\n', 'A. They have haemoglobin B. They appear yellow when looked at singly C. They are disc-shaped D. The cells are more numerous than leucocytes E. They have nuclei at maturity.\r\n\r\n', 'Biology'),
(27, 'In woody plants, gases and water vapour are transported across the stems by the:\r\n', 'A. xylem fibres B. medullary fibres C. medullary rays D. phloem fibres E. phloem parenchyma\r\n', 'Biology'),
(28, 'Which of the following substances is NOT found in urine?\r\n', 'A. Water B. Sodiumc hloride C. Nitrogenous compounds D. Calcium chloride E. Nitrogenous salts.\r\n', 'Biology'),
(29, 'The kidneys of all vertebrates act as osmo-regulators. This means that they\r\n', 'A. keep the composition of the plasma constant B. regulate osmotic processes C. Control the volume of blood entering the kidneys D. decrease the osmotic pressure of blood E. increase the osmotic pressure of blood.\r\n', 'Biology'),
(30, 'The part of the mammalian brain responsible for maintaining balance is the\r\n', 'A. medulla oblongata B. olfactory lobe C. cerebellum, D. cerebrum E. frontal lobe.\r\n', 'Biology'),
(31, 'Which of the following diseases is NOT caused by a virus?\r\n', 'A. Rinderpest B. Maize rust C. Newcastle disease D. Swine fever E. Cassava mosaic disease.\r\n', 'Biology'),
(32, 'A centipede differs from a millipede by its\r\n', 'A. colour B. numerous abdominal segments C. paired legs on each abdominal segment D. poison claws E. cylindrical body.\r\n', 'Biology'),
(33, 'Plants which can survive in places where the water supply is limited are\r\n', 'A. bryophytes B. mesophytes C. xerophytes D. hydrophytes E. pteridophytes.\r\n', 'Biology'),
(34, 'Banana, plantain and pineapple can be grouped together because they\r\n', 'A. produce small seeds B. are multiple fruits C. produce suckers D. have runners E. have bulbils\r\n', 'Biology'),
(35, 'Which of the following statements about friction it NOT correct?\r\n', 'A. The force of kinetic friction is less than the force of static friction.\r\nB. The force of kinetic friction between two surfaces is independent of the areas in contact provided the normal reaction is unchanged.\r\nC. The force of rolling friction between two surfaces is less than the force of sliding friction.\r\nD. The angle of friction is the angle between the normal reaction and the force friction.\r\nE. Friction may be reduced by lubrication', 'Physics'),
(36, 'A ship traveling towards a cliff receives the echo of its whistle after 3.5 seconds. A short while later, it receives the echo after 2.5 seconds. If the speed of sound in air under the prevailing conditions is 250m s-1, how much closer is the ship to the cliff?\r\n\r\n', 'A. 10m B. 125 m C. 175m D. 350 m E. 1,000 m\r\n', 'Physics'),
(37, 'Which of the following is NOT correct?\r\nI. The pitch of a sound note depends on the frequency of vibrations.\r\nII. The intensity of a sound note is proportional to the amplitude of vibrations.\r\nIII. Beats are produces by two sources of sound because one wave is travelling faster than the other.\r\nIV. When two sources of sound of frequencies 500 Hz and 502 Hz are sounded together, a neat frequency of 2Hz is observed.\r\nV. The first harmonic of a note has double the frequency of the fundamental note.\r\n\r\n', 'A. I and II B. II and III C. I and II D. III and IV E. IV and V.\r\n', 'Physics'),
(38, 'Which of the following statements about defects of vision is/are CORRECT\r\nI. For a long sighted person, close objects appear blurred.\r\nII. For a sort sighted person, distant objects appear blurred.\r\nIII. Short sight is corrected by using a pair of converging lenses.\r\n\r\n', 'A. I only B. II only C. I and II only D. II and III only E. I, II and III.\r\n', 'Physics'),
(39, 'A man of mass 50kg ascends a flight of stairs 5m high in 5 seconds. If acceleration due to gravity is 10m s-2(s raised to the power of -2), the power expended is', 'A. 100W B. 300W C. 250W D. 400W E. 500W\r\n', 'Physics'),
(40, 'Which of the following is primarily responsible for converting source code into machine-readable code?\r\n', 'A. Interpreter B. Debugger C. Linker D. Assembler D. Compiler\r\n', 'ICT'),
(41, 'What is the main function of a router in a network?', 'A. To assign IP addresses to devices automatically. B. To convert digital signals to analog signals for transmission. C. To provide wireless connectivity to devices. D. To filter network traffic based on predefined rules.', 'ICT'),
(42, 'Which of the following describes a denial-of-service (DoS) attack?\r\n', 'A. Flooding a system or network with excessive traffic to make it unavailable to legitimate users. B. Gaining unauthorized access to a system to steal data. C. Sending fraudulent emails to trick recipients into revealing personal information. D. Encrypting a user\'s files and demanding ransom for their release. E. Introducing malicious software to monitor user activities covertly.', 'ICT'),
(43, 'What is the purpose of an operating system (OS)?\r\n', 'A. To convert high-level programming languages into machine code. B. To design and build computer applications. C. To connect multiple computers in a network. D. To store and retrieve large amounts of data permanently. E. To manage hardware and software resources and provide a user interface.', 'ICT'),
(44, 'Which component of a CPU executes arithmetic and logical operations?\r\n', 'A. Control Unit (CU)\r\nB. Cache Memory\r\nC. Registers\r\nD. Arithmetic Logic Unit (ALU)\r\nE. Bus Interface Unit (BIU)', 'ICT'),
(45, 'In data processing, what is the primary purpose of data validation?\r\n', 'A. To sort data into a specific order. B. To remove duplicate records from a dataset.\r\nC. To generate reports from processed data. D. To convert data from one format to another. E. To ensure the accuracy and consistency of data.', 'Data Processing'),
(46, 'Which of the following best describes batch processing?\r\n', 'A. Processing data as soon as it is entered into the system.\r\nB. Processing data in a distributed network environment.\r\nC. Processing data in large groups or batches, typically at a later time.\r\nD. Processing data concurrently on multiple processors.\r\nE. Processing data interactively with immediate user feedback.', 'Data Processing'),
(47, 'What is the function of a primary key in a database table?\r\n', 'A. To uniquely identify each record (row) in a table.\r\nB. To improve the speed of data retrieval operations.\r\nC. To define the data type of each column in the table.\r\nD. To store large text documents and multimedia files.\r\nE. To establish a relationship between two different tables.', 'Data Processing'),
(48, 'Which of the following stages in data processing involves converting raw data into a structured format for analysis?\r\n', 'A. Data Processing/Preparation B. Data Collection C. Data Output D. Data Distribution E. Data Storage', 'Data Processing'),
(49, 'What is the main advantage of using a database management system (DBMS)?\r\n', 'A. To make data completely secure from all forms of cyber threats. B. To replace programming languages for software development. C. To provide instant internet access globally. D. To eliminate the need for computer hardware. E. To allow multiple users to access and manipulate data concurrently and in a controlled manner.', 'Data Processing');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
