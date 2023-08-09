
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `newsapplication` (
  `test` int(5) NOT NULL,
  `a` int(5) NOT NULL,
  `b` int(5) NOT NULL,
  `c` int(5) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `newsapplication` (`test`,`a`, `b`, `c`) VALUES
(0, 0, 0, 0);

ALTER TABLE `newsapplication`
  ADD PRIMARY KEY (`test`);


ALTER TABLE `newsapplication`
  MODIFY `test` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;