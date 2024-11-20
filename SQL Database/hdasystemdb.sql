-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 09:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hdasystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pswd` varchar(225) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `name`, `username`, `pswd`, `regDate`) VALUES
(1, 'admin', 'admin', 'admin', '2024-10-25 15:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `dutyallocation`
--

CREATE TABLE `dutyallocation` (
  `allocation_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `month` varchar(20) NOT NULL,
  `week` int(11) DEFAULT NULL CHECK (`week` between 1 and 4),
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `pswd` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `role`, `contact_info`, `pswd`, `start_date`) VALUES
(1, 'Saheed Olayemi Olayinka', 'Resident Advisor', 'saheed@gmail.com', 'olayiwola', '2024-01-15'),
(2, 'John Doe', 'Front Desk', 'johndoe@example.com', 'password123', '2023-12-01'),
(3, 'Jane Smith', 'Housekeeping', 'janesmith@example.com', 'mypassword123', '2024-02-20'),
(4, 'Mr. Oni Mathew Taiwo', 'Clearner', '07909987745', 'ola', '2024-05-21'),
(6, 'Seun Dairo', 'Supervisor', '07909987745', 'dairo', '2024-10-01'),
(8, 'Alice Johnson', 'Maintenance Technician', 'alicej@example.com', 'techpass789', '2023-11-05'),
(9, 'Bob Brown', 'Security Personnel', 'bobbrown@example.com', 'securepass456', '2024-03-12'),
(10, 'Claire White', 'Inventory and Supply Manager', 'clairew@example.com', 'inventory123', '2023-10-22'),
(11, 'David Green', 'Cleaning Supervisor', 'davidg@example.com', 'cleanpass456', '2024-04-01'),
(12, 'Emily Black', 'Front Desk', 'emilyb@example.com', 'frontdesk789', '2023-09-14'),
(13, 'Frank Moore', 'Resident Advisor', 'frankm@example.com', 'advisor123', '2024-01-03'),
(14, 'Grace Lee', 'Housekeeping', 'gracel@example.com', 'housepass321', '2024-02-25'),
(15, 'Henry Adams', 'Maintenance Technician', 'henrya@example.com', 'maintainpass456', '2023-12-17'),
(16, 'Isabel Torres', 'Security Personnel', 'isabelt@example.com', 'secure1234', '2024-03-18'),
(17, 'Jack Brown', 'Inventory and Supply Manager', 'jackb@example.com', 'inventory789', '2024-01-09'),
(18, 'Kathy Wilson', 'Cleaning Supervisor', 'kathyw@example.com', 'clean321', '2024-02-11'),
(19, 'Leo Garcia', 'Resident Advisor', 'leog@example.com', 'advisor789', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `description`) VALUES
(1, 'Front Desk', '- Handles check-ins and check-outs\n   - Maintains records of guests and students\n   - Addresses inquiries and provides information about the hostel\n   - Manages bookings and reservations.'),
(2, 'Housekeeping', '- Cleans rooms, hallways, common areas, and bathrooms\n   - Ensures clean bedding, towels, and other supplies\n   - Reports maintenance issues in the rooms or common areas\n'),
(3, 'Maintenance Technician', '- Repairs plumbing, electrical systems, and other fixtures\n   - Performs regular inspections for wear and tear\n   - Coordinates with outside contractors for major repairs\n'),
(4, 'Security Personnel', '- Monitors entry and exit points for safety\n   - Conducts regular security checks around the hostel\n   - Ensures that hostel rules and regulations are followed\n'),
(5, 'Resident Advisor', '- Acts as a point of contact for student concerns or emergencies\n   - Mediates conflicts between residents when needed\n   - Organizes student events and ensures hostel rules are followed'),
(6, 'Inventory and Supply Manager', '- Manages stock of cleaning supplies, linens, toiletries, etc.\n   - Orders and refills supplies as needed\n'),
(7, 'Cleaning Supervisor', '- Supervises housekeeping staff and inspects cleanliness standards\n   - Organizes cleaning schedules and assigns tasks to the team\n   - Ensures all cleaning protocols are followed, especially in shared spaces');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dutyallocation`
--
ALTER TABLE `dutyallocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dutyallocation`
--
ALTER TABLE `dutyallocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dutyallocation`
--
ALTER TABLE `dutyallocation`
  ADD CONSTRAINT `dutyallocation_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dutyallocation_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
