-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 07:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lyfft_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE IF NOT EXISTS `airport` (
`id` int(11) NOT NULL,
  `site_number` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location_id` varchar(6) NOT NULL,
  `effective_date` date NOT NULL,
  `region` varchar(3) NOT NULL,
  `district_office` varchar(4) NOT NULL,
  `state` varchar(2) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `county` varchar(30) NOT NULL,
  `county_state` varchar(2) NOT NULL,
  `city` varchar(40) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `ownership` varchar(2) NOT NULL,
  `use` varchar(2) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `owner_address` varchar(100) NOT NULL,
  `owner_csz` varchar(100) NOT NULL,
  `owner_phone` varchar(20) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `manager_address` varchar(100) NOT NULL,
  `manager_csz` varchar(100) NOT NULL,
  `manager_phone` varchar(20) NOT NULL,
  `arp_latitude` varchar(20) NOT NULL,
  `arp_latitude_s` varchar(20) NOT NULL,
  `arp_longitude` varchar(20) NOT NULL,
  `arp_longitude_s` varchar(20) NOT NULL,
  `arp_method` varchar(1) NOT NULL,
  `arp_elevation` int(11) NOT NULL,
  `arp_elevation_method` varchar(1) NOT NULL,
  `magnetic_variation` varchar(3) NOT NULL,
  `magnetic_variation_year` int(11) NOT NULL,
  `traffic_pattern_altitude` int(11) NOT NULL,
  `chart_name` varchar(50) NOT NULL,
  `distance_from_cbd` int(11) NOT NULL,
  `direction_from_cbd` varchar(3) NOT NULL,
  `land_area_covered_by_airport` int(11) NOT NULL,
  `boundary_art_cc_id` varchar(3) NOT NULL,
  `boundary_art_cc_computer_id` varchar(3) NOT NULL,
  `boundary_art_cc_name` varchar(50) NOT NULL,
  `responsible_art_cc_id` varchar(3) NOT NULL,
  `responsible_art_cc_computer_id` varchar(3) NOT NULL,
  `responsible_art_cc_name` varchar(50) NOT NULL,
  `tie_in_fss` varchar(1) NOT NULL,
  `tie_in_fss_id` varchar(3) NOT NULL,
  `tie_in_fss_name` varchar(50) NOT NULL,
  `airport_to_fss_phone_number` varchar(30) NOT NULL,
  `tie_in_fss_toll_free_number` varchar(30) NOT NULL,
  `alternate_fss_id` varchar(3) NOT NULL,
  `alternate_fss_name` varchar(50) NOT NULL,
  `alternate_fss_toll_free_number` varchar(30) NOT NULL,
  `notam_facility_id` varchar(4) NOT NULL,
  `notam_service` varchar(1) NOT NULL,
  `activiation_date` date NOT NULL,
  `airport_status_code` varchar(2) NOT NULL,
  `certification_type_date` varchar(50) NOT NULL,
  `federal_agreements` varchar(25) NOT NULL,
  `airspace_determination` varchar(50) NOT NULL,
  `customs_airport_of_entry` varchar(1) NOT NULL,
  `customs_landing_rights` varchar(1) NOT NULL,
  `military_joint_use` varchar(1) NOT NULL,
  `military_landing_rights` varchar(1) NOT NULL,
  `inspection_method` varchar(1) NOT NULL,
  `inspection_group` varchar(1) NOT NULL,
  `last_inspection_date` varchar(8) NOT NULL,
  `last_owner_information_date` varchar(8) NOT NULL,
  `fuel_types` varchar(50) NOT NULL,
  `airframe_repair` varchar(10) NOT NULL,
  `power_plant_pepair` varchar(10) NOT NULL,
  `bottled_oxygen_type` varchar(25) NOT NULL,
  `bulk_oxygen_type` varchar(25) NOT NULL,
  `lighting_schedule` varchar(25) NOT NULL,
  `beacon_schedule` varchar(25) NOT NULL,
  `atct` varchar(1) NOT NULL,
  `unicom_frequencies` varchar(50) NOT NULL,
  `ctaf_frequency` decimal(6,3) NOT NULL,
  `segmented_circle` varchar(4) NOT NULL,
  `beacon_color` varchar(3) NOT NULL,
  `non_commercial_landing_fee` varchar(1) NOT NULL,
  `medical_use` varchar(1) NOT NULL,
  `single_engine_ga` int(11) NOT NULL,
  `multi_engine_ga` int(11) NOT NULL,
  `jet_engine_ga` int(11) NOT NULL,
  `helicopters_ga` int(11) NOT NULL,
  `gliders_operational` int(11) NOT NULL,
  `military_operational` int(11) NOT NULL,
  `ultralights` int(11) NOT NULL,
  `operations_commercial` int(11) NOT NULL,
  `operations_commuter` int(11) NOT NULL,
  `operations_air_taxi` int(11) NOT NULL,
  `operations_ga_local` int(11) NOT NULL,
  `operations_ga_itin` int(11) NOT NULL,
  `operations_military` int(11) NOT NULL,
  `operations_date` date NOT NULL,
  `airport_position_source` varchar(50) NOT NULL,
  `airport_position_source_date` date NOT NULL,
  `airport_elevation_source` varchar(50) NOT NULL,
  `airport_elevation_source_date` date NOT NULL,
  `contract_fuel_available` varchar(1) NOT NULL,
  `transient_storage` varchar(50) NOT NULL,
  `other_services` varchar(100) NOT NULL,
  `wind_indicator` varchar(10) NOT NULL,
  `icao_identifier` varchar(4) NOT NULL,
  `beacon_schedule_alt` varchar(25) NOT NULL,
  `latitude_dd` decimal(9,6) NOT NULL,
  `longitude_dd` decimal(9,6) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19459 ;

-- --------------------------------------------------------

--
-- Table structure for table `broker_detail`
--

CREATE TABLE IF NOT EXISTS `broker_detail` (
`id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `percent` decimal(4,2) NOT NULL,
  `percent_fee` decimal(9,2) NOT NULL,
  `fixed_fee` decimal(9,2) NOT NULL,
  `agree` tinyint(1) NOT NULL,
  `contract_acceptance` datetime NOT NULL,
  `contract` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2024 ;

-- --------------------------------------------------------

--
-- Table structure for table `broker_settings`
--

CREATE TABLE IF NOT EXISTS `broker_settings` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `address_street` varchar(45) NOT NULL,
  `address_2nd_line` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `percent_commision` decimal(4,2) NOT NULL,
  `added_fee` decimal(9,2) NOT NULL,
  `contract` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `op_quote`
--

CREATE TABLE IF NOT EXISTS `op_quote` (
`id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `flight_mins` int(11) NOT NULL,
  `overnights` int(11) NOT NULL,
  `flight_cost` decimal(9,2) NOT NULL,
  `overnight_fees` decimal(9,2) NOT NULL,
  `margin` decimal(9,2) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `fet` decimal(9,2) NOT NULL,
  `total_cost` decimal(9,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'see STATUS* constants in model for value settings.',
  `origin_ts` int(11) NOT NULL,
  `final_ts` int(11) NOT NULL,
  `total_dist` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=587 ;

-- --------------------------------------------------------

--
-- Table structure for table `contract_text`
--

CREATE TABLE IF NOT EXISTS `contract_text` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FAA_aircraft_master`
--

CREATE TABLE IF NOT EXISTS `FAA_aircraft_master` (
`id` int(11) NOT NULL,
  `n_number` varchar(5) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `mfr_mdl_code` varchar(7) NOT NULL,
  `eng_mfr_mdl` varchar(5) NOT NULL,
  `year_mfr` int(11) NOT NULL,
  `type_registrant` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(33) NOT NULL,
  `street2` varchar(33) NOT NULL,
  `city` varchar(18) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `region` varchar(1) NOT NULL,
  `county` varchar(3) NOT NULL,
  `country` varchar(2) NOT NULL,
  `last_action_date` date NOT NULL,
  `cert_issue_date` date NOT NULL,
  `certification` varchar(10) NOT NULL,
  `type_aircraft` tinyint(4) NOT NULL,
  `type_engine` tinyint(4) NOT NULL,
  `status_code` varchar(2) NOT NULL,
  `mode_s_code` varchar(8) NOT NULL,
  `fract_owner` varchar(1) NOT NULL,
  `air_worth_date` date NOT NULL,
  `other_names_1` varchar(50) NOT NULL,
  `other_names_2` varchar(50) NOT NULL,
  `other_names_3` varchar(50) NOT NULL,
  `other_names_4` varchar(50) NOT NULL,
  `other_names_5` varchar(50) NOT NULL,
  `expiration_date` date NOT NULL,
  `unique_id` varchar(8) NOT NULL,
  `kit_mfr` varchar(30) NOT NULL,
  `kit_model` varchar(20) NOT NULL,
  `mode_s_code_hex` varchar(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=317866 ;

-- --------------------------------------------------------

--
-- Table structure for table `FAA_aircraft_ref`
--

CREATE TABLE IF NOT EXISTS `FAA_aircraft_ref` (
`id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `mfr` varchar(30) NOT NULL,
  `model` varchar(20) NOT NULL,
  `type_acft` tinyint(4) NOT NULL,
  `type_eng` tinyint(4) NOT NULL,
  `ac_cat` tinyint(4) NOT NULL,
  `build_cert_ind` tinyint(4) NOT NULL,
  `no_eng` tinyint(4) NOT NULL,
  `no_seats` int(11) NOT NULL,
  `ac_weight` varchar(7) NOT NULL,
  `speed` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77379 ;

-- --------------------------------------------------------

--
-- Table structure for table `FAA_engine_ref`
--

CREATE TABLE IF NOT EXISTS `FAA_engine_ref` (
`id` int(11) NOT NULL,
  `e_code` varchar(5) NOT NULL,
  `e_mfr` varchar(10) NOT NULL,
  `e_model` varchar(13) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `thrust` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4165 ;

-- --------------------------------------------------------

--
-- Table structure for table `flyer_data`
--

CREATE TABLE IF NOT EXISTS `flyer_data` (
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_price`
--

CREATE TABLE IF NOT EXISTS `fuel_price` (
  `airport_id` varchar(6) NOT NULL,
  `ppg` decimal(3,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `year_est` int(11) NOT NULL,
  `fleet` int(11) NOT NULL,
  `full_time_pilots` int(11) NOT NULL,
  `part_time_pilots` int(11) NOT NULL,
  `certificate` varchar(100) NOT NULL,
  `designator` varchar(4) NOT NULL,
  `where_licensed` varchar(100) NOT NULL,
  `operated_by` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `source_url` varchar(300) NOT NULL,
  `claimed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5069 ;

-- --------------------------------------------------------

--
-- Table structure for table `operator_aircraft`
--

CREATE TABLE IF NOT EXISTS `operator_aircraft` (
`id` int(11) NOT NULL,
  `n_number` varchar(5) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `mfr_mdl_code` varchar(7) NOT NULL,
  `eng_mfr_mdl` varchar(5) NOT NULL,
  `year_mfr` int(11) NOT NULL,
  `type_registrant` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(33) NOT NULL,
  `street2` varchar(33) NOT NULL,
  `city` varchar(18) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `region` varchar(1) NOT NULL,
  `county` varchar(3) NOT NULL,
  `country` varchar(2) NOT NULL,
  `last_action_date` date NOT NULL,
  `cert_issue_date` date NOT NULL,
  `certification` varchar(10) NOT NULL,
  `type_aircraft` tinyint(4) NOT NULL,
  `type_engine` tinyint(4) NOT NULL,
  `status_code` varchar(2) NOT NULL,
  `mode_s_code` varchar(8) NOT NULL,
  `fract_owner` varchar(1) NOT NULL,
  `air_worth_date` date NOT NULL,
  `other_names_1` varchar(50) NOT NULL,
  `other_names_2` varchar(50) NOT NULL,
  `other_names_3` varchar(50) NOT NULL,
  `other_names_4` varchar(50) NOT NULL,
  `other_names_5` varchar(50) NOT NULL,
  `expiration_date` date NOT NULL,
  `unique_id` varchar(8) NOT NULL,
  `kit_mfr` varchar(30) NOT NULL,
  `kit_model` varchar(20) NOT NULL,
  `mode_s_code_hex` varchar(10) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `home_airport` varchar(6) NOT NULL,
  `cost_per_hour` int(11) NOT NULL,
  `range` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10372 ;

-- --------------------------------------------------------

--
-- Table structure for table `operator_aircraft_engref`
--

CREATE TABLE IF NOT EXISTS `operator_aircraft_engref` (
`id` int(11) NOT NULL,
  `e_code` varchar(5) NOT NULL,
  `e_mfr` varchar(10) NOT NULL,
  `e_model` varchar(13) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `thrust` int(11) NOT NULL,
  `operator_aircraft_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9607 ;

-- --------------------------------------------------------

--
-- Table structure for table `operator_aircraft_ref`
--

CREATE TABLE IF NOT EXISTS `operator_aircraft_ref` (
`id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `mfr` varchar(30) NOT NULL,
  `model` varchar(20) NOT NULL,
  `type_acft` tinyint(4) NOT NULL,
  `type_eng` tinyint(4) NOT NULL,
  `ac_cat` tinyint(4) NOT NULL,
  `build_cert_ind` tinyint(4) NOT NULL,
  `no_eng` tinyint(4) NOT NULL,
  `no_seats` int(11) NOT NULL,
  `ac_weight` varchar(7) NOT NULL,
  `speed` int(11) NOT NULL,
  `derating` decimal(4,2) NOT NULL,
  `operator_aircraft_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10372 ;

-- --------------------------------------------------------

--
-- Table structure for table `operator_data`
--

CREATE TABLE IF NOT EXISTS `operator_data` (
  `operator_id` int(11) NOT NULL,
  `default_margin` decimal(6,4) NOT NULL,
  `default_route_buffer` decimal(6,4) NOT NULL,
  `overnight_fee` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
`id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `broker_id` int(11) NOT NULL,
  `auth_level` int(11) NOT NULL COMMENT 'Determines who created quote (op, broker, customer)',
  `status` int(11) NOT NULL COMMENT 'See constants in /model/Quotes.php for values'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote_arp_codes`
--

CREATE TABLE IF NOT EXISTS `quote_arp_codes` (
  `quote_id` int(11) NOT NULL,
  `arp_code` varchar(6) NOT NULL,
  `type` varchar(1) NOT NULL COMMENT 'd=dep, a=arr'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leg`
--

CREATE TABLE IF NOT EXISTS `leg` (
`id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `dep_arp` varchar(6) CHARACTER SET utf8 NOT NULL,
  `dep_time` varchar(45) CHARACTER SET utf8 NOT NULL,
  `dep_ts` int(11) NOT NULL,
  `dep_tz` varchar(45) CHARACTER SET utf8 NOT NULL,
  `dep_lat` decimal(9,6) NOT NULL,
  `dep_lng` decimal(9,6) NOT NULL,
  `dep_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `arr_arp` varchar(6) CHARACTER SET utf8 NOT NULL,
  `arr_tz` varchar(45) CHARACTER SET utf8 NOT NULL,
  `arr_lat` decimal(9,6) NOT NULL,
  `arr_lng` decimal(9,6) NOT NULL,
  `arr_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dist` int(11) NOT NULL,
  `num_trav` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `subject` char(100) NOT NULL,
  `Form` varchar(45) NOT NULL COMMENT 'Name of the php file in templates used as the template.',
  `template` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL COMMENT 'This is op_quote_id',
  `user_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `type` tinyint(10) NOT NULL COMMENT '0 = ACH, 1 = Credit, 2 = debit, 3 = pay pal, 4 = bill me later...',
  `timestamp` timestamp NOT NULL,
  `amount` varchar(12) NOT NULL,
  `charge_account_name` varchar(50) NOT NULL,
  `bank_routing_number` varchar(25) NOT NULL,
  `checking_account` varchar(25) NOT NULL,
  `drivers_license_number` varchar(25) NOT NULL,
  `drivers_license_state` text NOT NULL,
  `credit_card` varchar(30) NOT NULL,
  `credit_card_exparation_date` text NOT NULL,
  `credit_card_security_code` text NOT NULL,
  `credit_card_name` varchar(20) NOT NULL COMMENT 'visa, master card, amex',
  `aproval_stage` tinyint(10) NOT NULL COMMENT '0=entered, 1=verified, 2=billed, 3=cleared, 4=disputed, 5=canceled ',
  `electronic_signature_name` varchar(50) NOT NULL,
  `electronic_sinature_password` int(11) NOT NULL,
  `contract_acceptance` timestamp NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `company` varchar(100) NOT NULL,
  `charter_num` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `auth_level` int(11) NOT NULL,
  `activation_code` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
 ADD PRIMARY KEY (`id`), ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `broker_detail`
--
ALTER TABLE `broker_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `quote_id` (`quote_id`), ADD KEY `bid_id` (`bid_id`);

--
-- Indexes for table `broker_settings`
--
ALTER TABLE `broker_settings`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `op_quote`
--
ALTER TABLE `op_quote`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_text`
--
ALTER TABLE `contract_text`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FAA_aircraft_master`
--
ALTER TABLE `FAA_aircraft_master`
 ADD PRIMARY KEY (`id`), ADD KEY `n_number` (`n_number`);

--
-- Indexes for table `FAA_aircraft_ref`
--
ALTER TABLE `FAA_aircraft_ref`
 ADD PRIMARY KEY (`id`), ADD KEY `code` (`code`);

--
-- Indexes for table `FAA_engine_ref`
--
ALTER TABLE `FAA_engine_ref`
 ADD PRIMARY KEY (`id`), ADD KEY `e_code` (`e_code`);

--
-- Indexes for table `fuel_price`
--
ALTER TABLE `fuel_price`
 ADD UNIQUE KEY `airport_id` (`airport_id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
 ADD PRIMARY KEY (`id`), ADD KEY `designator` (`designator`);

--
-- Indexes for table `operator_aircraft`
--
ALTER TABLE `operator_aircraft`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_aircraft_engref`
--
ALTER TABLE `operator_aircraft_engref`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_aircraft_ref`
--
ALTER TABLE `operator_aircraft_ref`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_data`
--
ALTER TABLE `operator_data`
 ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_arp_codes`
--
ALTER TABLE `quote_arp_codes`
 ADD KEY `quote_id-type` (`quote_id`,`type`);

--
-- Indexes for table `leg`
--
ALTER TABLE `leg`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`), ADD KEY `level` (`level`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`), ADD KEY `bid_id` (`bid_id`), ADD KEY `quote_id` (`quote_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19459;
--
-- AUTO_INCREMENT for table `broker_detail`
--
ALTER TABLE `broker_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2024;
--
-- AUTO_INCREMENT for table `broker_settings`
--
ALTER TABLE `broker_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `op_quote`
--
ALTER TABLE `op_quote`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=587;
--
-- AUTO_INCREMENT for table `FAA_aircraft_master`
--
ALTER TABLE `FAA_aircraft_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=317866;
--
-- AUTO_INCREMENT for table `FAA_aircraft_ref`
--
ALTER TABLE `FAA_aircraft_ref`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77379;
--
-- AUTO_INCREMENT for table `FAA_engine_ref`
--
ALTER TABLE `FAA_engine_ref`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4165;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5069;
--
-- AUTO_INCREMENT for table `operator_aircraft`
--
ALTER TABLE `operator_aircraft`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10372;
--
-- AUTO_INCREMENT for table `operator_aircraft_engref`
--
ALTER TABLE `operator_aircraft_engref`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9607;
--
-- AUTO_INCREMENT for table `operator_aircraft_ref`
--
ALTER TABLE `operator_aircraft_ref`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10372;
--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `leg`
--
ALTER TABLE `leg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
