CREATE TABLE `session` (
  `session_id` varbinary(192) NOT NULL COMMENT 'session id yang digunakan',
  `created` int(11) NOT NULL DEFAULT '0' COMMENT 'waktu dibuat',
  `session_data` longtext NOT NULL COMMENT 'data session variabel',
  `session_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);
