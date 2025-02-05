-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: telegram_bot
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `callback_query`
--

DROP TABLE IF EXISTS `callback_query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `callback_query` (
  `id` bigint unsigned NOT NULL COMMENT 'Unique identifier for this query',
  `user_id` bigint DEFAULT NULL COMMENT 'Unique user identifier',
  `chat_id` bigint DEFAULT NULL COMMENT 'Unique chat identifier',
  `message_id` bigint unsigned DEFAULT NULL COMMENT 'Unique message identifier',
  `inline_message_id` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Identifier of the message sent via the bot in inline mode, that originated the query',
  `chat_instance` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent',
  `data` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Data associated with the callback button',
  `game_short_name` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Short name of a Game to be returned, serves as the unique identifier for the game',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `chat_id` (`chat_id`),
  KEY `message_id` (`message_id`),
  KEY `chat_id_2` (`chat_id`,`message_id`),
  CONSTRAINT `callback_query_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `callback_query_ibfk_2` FOREIGN KEY (`chat_id`, `message_id`) REFERENCES `message` (`chat_id`, `id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `callback_query`
--

LOCK TABLES `callback_query` WRITE;
/*!40000 ALTER TABLE `callback_query` DISABLE KEYS */;
/*!40000 ALTER TABLE `callback_query` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` bigint NOT NULL COMMENT 'Unique identifier for this chat',
  `type` enum('private','group','supergroup','channel') COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Type of chat, can be either private, group, supergroup or channel',
  `title` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '' COMMENT 'Title, for supergroups, channels and group chats',
  `username` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Username, for private chats, supergroups and channels if available',
  `first_name` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'First name of the other party in a private chat',
  `last_name` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Last name of the other party in a private chat',
  `is_forum` tinyint(1) DEFAULT '0' COMMENT 'True, if the supergroup chat is a forum (has topics enabled)',
  `all_members_are_administrators` tinyint(1) DEFAULT '0' COMMENT 'True if a all members of this group are admins',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date update',
  `old_id` bigint DEFAULT NULL COMMENT 'Unique chat identifier, this is filled when a group is converted to a supergroup',
  PRIMARY KEY (`id`),
  KEY `old_id` (`old_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_boost_removed`
--

DROP TABLE IF EXISTS `chat_boost_removed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_boost_removed` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint DEFAULT NULL COMMENT 'Chat which was boosted',
  `boost_id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Unique identifier of the boost',
  `remove_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Point in time (Unix timestamp) when the boost was removed',
  `source` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Source of the removed boost',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  CONSTRAINT `chat_boost_removed_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_boost_removed`
--

LOCK TABLES `chat_boost_removed` WRITE;
/*!40000 ALTER TABLE `chat_boost_removed` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_boost_removed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_boost_updated`
--

DROP TABLE IF EXISTS `chat_boost_updated`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_boost_updated` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint DEFAULT NULL COMMENT 'Chat which was boosted',
  `boost` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Information about the chat boost',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  CONSTRAINT `chat_boost_updated_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_boost_updated`
--

LOCK TABLES `chat_boost_updated` WRITE;
/*!40000 ALTER TABLE `chat_boost_updated` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_boost_updated` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_join_request`
--

DROP TABLE IF EXISTS `chat_join_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_join_request` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint NOT NULL COMMENT 'Chat to which the request was sent',
  `user_id` bigint NOT NULL COMMENT 'User that sent the join request',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date the request was sent in Unix time',
  `bio` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. Bio of the user',
  `invite_link` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. Chat invite link that was used by the user to send the join request',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `chat_join_request_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  CONSTRAINT `chat_join_request_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_join_request`
--

LOCK TABLES `chat_join_request` WRITE;
/*!40000 ALTER TABLE `chat_join_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_join_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_member_updated`
--

DROP TABLE IF EXISTS `chat_member_updated`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_member_updated` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint NOT NULL COMMENT 'Chat the user belongs to',
  `user_id` bigint NOT NULL COMMENT 'Performer of the action, which resulted in the change',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date the change was done in Unix time',
  `old_chat_member` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Previous information about the chat member',
  `new_chat_member` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'New information about the chat member',
  `invite_link` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Chat invite link, which was used by the user to join the chat; for joining by invite link events only',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `chat_member_updated_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  CONSTRAINT `chat_member_updated_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_member_updated`
--

LOCK TABLES `chat_member_updated` WRITE;
/*!40000 ALTER TABLE `chat_member_updated` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_member_updated` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chosen_inline_result`
--

DROP TABLE IF EXISTS `chosen_inline_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chosen_inline_result` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `result_id` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'The unique identifier for the result that was chosen',
  `user_id` bigint DEFAULT NULL COMMENT 'The user that chose the result',
  `location` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Sender location, only for bots that require user location',
  `inline_message_id` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Identifier of the sent inline message',
  `query` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'The query that was used to obtain the result',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `chosen_inline_result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chosen_inline_result`
--

LOCK TABLES `chosen_inline_result` WRITE;
/*!40000 ALTER TABLE `chosen_inline_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `chosen_inline_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `user_id` bigint DEFAULT NULL COMMENT 'Unique user identifier',
  `chat_id` bigint DEFAULT NULL COMMENT 'Unique user or chat identifier',
  `status` enum('active','cancelled','stopped') COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'active' COMMENT 'Conversation state',
  `command` varchar(160) COLLATE utf8mb4_unicode_520_ci DEFAULT '' COMMENT 'Default command to execute',
  `notes` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Data stored from command',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date update',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `chat_id` (`chat_id`),
  KEY `status` (`status`),
  CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation`
--

LOCK TABLES `conversation` WRITE;
/*!40000 ALTER TABLE `conversation` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edited_message`
--

DROP TABLE IF EXISTS `edited_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edited_message` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint DEFAULT NULL COMMENT 'Unique chat identifier',
  `message_id` bigint unsigned DEFAULT NULL COMMENT 'Unique message identifier',
  `user_id` bigint DEFAULT NULL COMMENT 'Unique user identifier',
  `edit_date` timestamp NULL DEFAULT NULL COMMENT 'Date the message was edited in timestamp format',
  `text` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, the actual UTF-8 text of the message max message length 4096 char utf8',
  `entities` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text',
  `caption` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For message with caption, the actual UTF-8 text of the caption',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  KEY `message_id` (`message_id`),
  KEY `user_id` (`user_id`),
  KEY `chat_id_2` (`chat_id`,`message_id`),
  CONSTRAINT `edited_message_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  CONSTRAINT `edited_message_ibfk_2` FOREIGN KEY (`chat_id`, `message_id`) REFERENCES `message` (`chat_id`, `id`),
  CONSTRAINT `edited_message_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edited_message`
--

LOCK TABLES `edited_message` WRITE;
/*!40000 ALTER TABLE `edited_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `edited_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inline_query`
--

DROP TABLE IF EXISTS `inline_query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inline_query` (
  `id` bigint unsigned NOT NULL COMMENT 'Unique identifier for this query',
  `user_id` bigint DEFAULT NULL COMMENT 'Unique user identifier',
  `location` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Location of the user',
  `query` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Text of the query',
  `offset` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Offset of the result',
  `chat_type` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Optional. Type of the chat, from which the inline query was sent.',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `inline_query_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inline_query`
--

LOCK TABLES `inline_query` WRITE;
/*!40000 ALTER TABLE `inline_query` DISABLE KEYS */;
/*!40000 ALTER TABLE `inline_query` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `chat_id` bigint NOT NULL COMMENT 'Unique chat identifier',
  `sender_chat_id` bigint DEFAULT NULL COMMENT 'Sender of the message, sent on behalf of a chat',
  `id` bigint unsigned NOT NULL COMMENT 'Unique message identifier',
  `message_thread_id` bigint DEFAULT NULL COMMENT 'Unique identifier of a message thread to which the message belongs; for supergroups only',
  `user_id` bigint DEFAULT NULL COMMENT 'Unique user identifier',
  `sender_boost_count` bigint DEFAULT NULL COMMENT 'If the sender of the message boosted the chat, the number of boosts added by the user',
  `date` timestamp NULL DEFAULT NULL COMMENT 'Date the message was sent in timestamp format',
  `forward_from` bigint DEFAULT NULL COMMENT 'Unique user identifier, sender of the original message',
  `forward_from_chat` bigint DEFAULT NULL COMMENT 'Unique chat identifier, chat the original message belongs to',
  `forward_from_message_id` bigint DEFAULT NULL COMMENT 'Unique chat identifier of the original message in the channel',
  `forward_signature` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For messages forwarded from channels, signature of the post author if present',
  `forward_sender_name` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Sender''s name for messages forwarded from users who disallow adding a link to their account in forwarded messages',
  `forward_date` timestamp NULL DEFAULT NULL COMMENT 'date the original message was sent in timestamp format',
  `is_topic_message` tinyint(1) DEFAULT '0' COMMENT 'True, if the message is sent to a forum topic',
  `is_automatic_forward` tinyint(1) DEFAULT '0' COMMENT 'True, if the message is a channel post that was automatically forwarded to the connected discussion group',
  `reply_to_chat` bigint DEFAULT NULL COMMENT 'Unique chat identifier',
  `reply_to_message` bigint unsigned DEFAULT NULL COMMENT 'Message that this message is reply to',
  `external_reply` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. Information about the message that is being replied to, which may come from another chat or forum topic',
  `quote` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. For replies that quote part of the original message, the quoted part of the message',
  `reply_to_story` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. For replies to a story, the original story',
  `via_bot` bigint DEFAULT NULL COMMENT 'Optional. Bot through which the message was sent',
  `link_preview_options` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. Options used for link preview generation for the message, if it is a text message and link preview options were changed',
  `edit_date` timestamp NULL DEFAULT NULL COMMENT 'Date the message was last edited in Unix time',
  `has_protected_content` tinyint(1) DEFAULT '0' COMMENT 'True, if the message can''t be forwarded',
  `media_group_id` text COLLATE utf8mb4_unicode_520_ci COMMENT 'The unique identifier of a media message group this message belongs to',
  `author_signature` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Signature of the post author for messages in channels',
  `text` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, the actual UTF-8 text of the message max message length 4096 char utf8mb4',
  `entities` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text',
  `caption_entities` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption',
  `audio` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Audio object. Message is an audio file, information about the file',
  `document` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Document object. Message is a general file, information about the file',
  `animation` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Message is an animation, information about the animation',
  `game` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Game object. Message is a game, information about the game',
  `photo` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Array of PhotoSize objects. Message is a photo, available sizes of the photo',
  `sticker` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Sticker object. Message is a sticker, information about the sticker',
  `story` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Story object. Message is a forwarded story',
  `video` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Video object. Message is a video, information about the video',
  `voice` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Voice Object. Message is a Voice, information about the Voice',
  `video_note` text COLLATE utf8mb4_unicode_520_ci COMMENT 'VoiceNote Object. Message is a Video Note, information about the Video Note',
  `caption` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For message with caption, the actual UTF-8 text of the caption',
  `has_media_spoiler` tinyint(1) DEFAULT '0' COMMENT 'True, if the message media is covered by a spoiler animation',
  `contact` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Contact object. Message is a shared contact, information about the contact',
  `location` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Location object. Message is a shared location, information about the location',
  `venue` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Venue object. Message is a Venue, information about the Venue',
  `poll` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Poll object. Message is a native poll, information about the poll',
  `dice` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Message is a dice with random value from 1 to 6',
  `new_chat_members` text COLLATE utf8mb4_unicode_520_ci COMMENT 'List of unique user identifiers, new member(s) were added to the group, information about them (one of these members may be the bot itself)',
  `left_chat_member` bigint DEFAULT NULL COMMENT 'Unique user identifier, a member was removed from the group, information about them (this member may be the bot itself)',
  `new_chat_title` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'A chat title was changed to this value',
  `new_chat_photo` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Array of PhotoSize objects. A chat photo was change to this value',
  `delete_chat_photo` tinyint(1) DEFAULT '0' COMMENT 'Informs that the chat photo was deleted',
  `group_chat_created` tinyint(1) DEFAULT '0' COMMENT 'Informs that the group has been created',
  `supergroup_chat_created` tinyint(1) DEFAULT '0' COMMENT 'Informs that the supergroup has been created',
  `channel_chat_created` tinyint(1) DEFAULT '0' COMMENT 'Informs that the channel chat has been created',
  `message_auto_delete_timer_changed` text COLLATE utf8mb4_unicode_520_ci COMMENT 'MessageAutoDeleteTimerChanged object. Message is a service message: auto-delete timer settings changed in the chat',
  `migrate_to_chat_id` bigint DEFAULT NULL COMMENT 'Migrate to chat identifier. The group has been migrated to a supergroup with the specified identifier',
  `migrate_from_chat_id` bigint DEFAULT NULL COMMENT 'Migrate from chat identifier. The supergroup has been migrated from a group with the specified identifier',
  `pinned_message` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Message object. Specified message was pinned',
  `invoice` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Message is an invoice for a payment, information about the invoice',
  `successful_payment` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Message is a service message about a successful payment, information about the payment',
  `users_shared` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. Service message: users were shared with the bot',
  `chat_shared` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Optional. Service message: a chat was shared with the bot',
  `connected_website` text COLLATE utf8mb4_unicode_520_ci COMMENT 'The domain name of the website on which the user has logged in.',
  `write_access_allowed` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: the user allowed the bot added to the attachment menu to write messages',
  `passport_data` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Telegram Passport data',
  `proximity_alert_triggered` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message. A user in the chat triggered another user''s proximity alert while sharing Live Location.',
  `boost_added` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: user boosted the chat',
  `forum_topic_created` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: forum topic created',
  `forum_topic_edited` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: forum topic edited',
  `forum_topic_closed` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: forum topic closed',
  `forum_topic_reopened` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: forum topic reopened',
  `general_forum_topic_hidden` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: the General forum topic hidden',
  `general_forum_topic_unhidden` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: the General forum topic unhidden',
  `video_chat_scheduled` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: video chat scheduled',
  `video_chat_started` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: video chat started',
  `video_chat_ended` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: video chat ended',
  `video_chat_participants_invited` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: new participants invited to a video chat',
  `web_app_data` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Service message: data sent by a Web App',
  `reply_markup` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Inline keyboard attached to the message',
  PRIMARY KEY (`chat_id`,`id`),
  KEY `user_id` (`user_id`),
  KEY `forward_from` (`forward_from`),
  KEY `forward_from_chat` (`forward_from_chat`),
  KEY `reply_to_chat` (`reply_to_chat`),
  KEY `reply_to_message` (`reply_to_message`),
  KEY `via_bot` (`via_bot`),
  KEY `left_chat_member` (`left_chat_member`),
  KEY `migrate_from_chat_id` (`migrate_from_chat_id`),
  KEY `migrate_to_chat_id` (`migrate_to_chat_id`),
  KEY `reply_to_chat_2` (`reply_to_chat`,`reply_to_message`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  CONSTRAINT `message_ibfk_3` FOREIGN KEY (`forward_from`) REFERENCES `user` (`id`),
  CONSTRAINT `message_ibfk_4` FOREIGN KEY (`forward_from_chat`) REFERENCES `chat` (`id`),
  CONSTRAINT `message_ibfk_5` FOREIGN KEY (`reply_to_chat`, `reply_to_message`) REFERENCES `message` (`chat_id`, `id`),
  CONSTRAINT `message_ibfk_6` FOREIGN KEY (`via_bot`) REFERENCES `user` (`id`),
  CONSTRAINT `message_ibfk_7` FOREIGN KEY (`left_chat_member`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_reaction`
--

DROP TABLE IF EXISTS `message_reaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_reaction` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint DEFAULT NULL COMMENT 'The chat containing the message the user reacted to',
  `message_id` bigint DEFAULT NULL COMMENT 'Unique identifier of the message inside the chat',
  `user_id` bigint DEFAULT NULL COMMENT 'Optional. The user that changed the reaction, if the user isn''t anonymous',
  `actor_chat_id` bigint DEFAULT NULL COMMENT 'Optional. The chat on behalf of which the reaction was changed, if the user is anonymous',
  `old_reaction` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Previous list of reaction types that were set by the user',
  `new_reaction` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'New list of reaction types that have been set by the user',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  KEY `user_id` (`user_id`),
  KEY `actor_chat_id` (`actor_chat_id`),
  CONSTRAINT `message_reaction_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  CONSTRAINT `message_reaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `message_reaction_ibfk_3` FOREIGN KEY (`actor_chat_id`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_reaction`
--

LOCK TABLES `message_reaction` WRITE;
/*!40000 ALTER TABLE `message_reaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_reaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_reaction_count`
--

DROP TABLE IF EXISTS `message_reaction_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_reaction_count` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` bigint DEFAULT NULL COMMENT 'The chat containing the message',
  `message_id` bigint DEFAULT NULL COMMENT 'Unique message identifier inside the chat',
  `reactions` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'List of reactions that are present on the message',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  CONSTRAINT `message_reaction_count_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_reaction_count`
--

LOCK TABLES `message_reaction_count` WRITE;
/*!40000 ALTER TABLE `message_reaction_count` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_reaction_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2024_06_07_191257_add_column_from_users',1),(5,'2024_06_07_194628_create_sales_reps_table',1),(6,'2024_06_07_224727_update_sales_reps_column',2),(7,'2020_10_04_115514_create_moonshine_roles_table',3),(8,'2020_10_05_173148_create_moonshine_tables',3),(9,'2022_12_19_115549_create_moonshine_socialites_table',3),(10,'9999_12_20_173629_create_notifications_table',3),(11,'2024_06_08_103813_add_qr_code_path_to_sales_reps_table',4),(12,'2024_06_08_134846_create_settings_table',5),(13,'2024_06_08_135124_add_item_from_settings',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_socialites`
--

DROP TABLE IF EXISTS `moonshine_socialites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moonshine_socialites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_id` bigint unsigned NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_socialites_driver_identity_unique` (`driver`,`identity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_socialites`
--

LOCK TABLES `moonshine_socialites` WRITE;
/*!40000 ALTER TABLE `moonshine_socialites` DISABLE KEYS */;
/*!40000 ALTER TABLE `moonshine_socialites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_user_roles`
--

DROP TABLE IF EXISTS `moonshine_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moonshine_user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_user_roles`
--

LOCK TABLES `moonshine_user_roles` WRITE;
/*!40000 ALTER TABLE `moonshine_user_roles` DISABLE KEYS */;
INSERT INTO `moonshine_user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'Admin','2024-06-08 03:21:49','2024-06-08 03:21:49');
/*!40000 ALTER TABLE `moonshine_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_users`
--

DROP TABLE IF EXISTS `moonshine_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moonshine_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_role_id` bigint unsigned NOT NULL DEFAULT '1',
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_users_email_unique` (`email`),
  KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`),
  CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_users`
--

LOCK TABLES `moonshine_users` WRITE;
/*!40000 ALTER TABLE `moonshine_users` DISABLE KEYS */;
INSERT INTO `moonshine_users` (`id`, `moonshine_user_role_id`, `email`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES (1,1,'admin@admin.com','$2y$10$aBBRvOV12SxTP2FZsQFvquWZ.Kck8uQXKN04T3lpXK/kZKWM4LLy6','admin',NULL,'DDkVVsWE2z9VdFOhnq6ia9xkEFTRhV69FOkMB2SQ6bmN9MxVVRAgoDi4rQFF','2024-06-08 03:22:13','2024-06-08 03:22:13');
/*!40000 ALTER TABLE `moonshine_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES ('05b35ae4-37e8-4809-856a-a9db496936cb','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:36:32','2024-06-10 20:36:32'),('0bc9dfe3-354d-4349-9a75-69b3aecf399a','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.csv\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:44:32','2024-06-10 19:44:32'),('101ce77c-b892-4210-8896-264b8be98aff','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/outlets-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:05:21','2024-06-10 20:05:21'),('279941b4-011b-475d-af45-8ca6c7405c7d','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:47:31','2024-06-10 19:47:31'),('29d7b1d2-5392-4f85-9e88-3515d91b6074','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:01:11','2024-06-10 20:01:11'),('2b69ce55-7310-4757-b19d-7fdd313f8eeb','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:53:37','2024-06-10 19:53:37'),('357c758b-224b-4a1e-8319-28ef491124b1','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:59:59','2024-06-10 19:59:59'),('38ba9769-bb91-474b-8c5e-fb3738c7d961','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/outlets-resource.csv\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:01:45','2024-06-10 20:01:45'),('3ee556ed-9aee-4889-9ea4-cd0298cb2b2a','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:48:59','2024-06-10 19:48:59'),('71911a6a-e87e-499c-b469-9094ce3ead9d','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:27:43','2024-06-10 20:27:43'),('7fff2870-59d2-42c2-aac6-1b2e11f4186c','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:29:33','2024-06-10 20:29:33'),('8f5b3f82-a878-4d4e-abd2-d4e1fd6ff973','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 20:28:04','2024-06-10 20:28:04'),('b3c8871d-80e2-4e0a-99a0-94430b6beca4','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:46:49','2024-06-10 19:46:49'),('c8eff3ae-01b5-4e09-a0f6-612ad26ad65e','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:58:00','2024-06-10 19:58:00'),('cb59f25d-cd9a-4f8e-96cd-47feb46ef9f7','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"File exported\",\"button\":{\"link\":\"https:\\/\\/ade4-178-88-72-72.ngrok-free.app\\/storage\\/outlets-resource.csv\",\"label\":\"Download\"},\"color\":null}',NULL,'2024-06-08 03:59:27','2024-06-08 03:59:27'),('e297c7f8-e410-4d80-ac59-506ae9104ded','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"https:\\/\\/6404-178-88-72-72.ngrok-free.app\\/storage\\/sales-rep-resource.xlsx\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"},\"color\":null}',NULL,'2024-06-10 19:49:40','2024-06-10 19:49:40');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll`
--

DROP TABLE IF EXISTS `poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll` (
  `id` bigint unsigned NOT NULL COMMENT 'Unique poll identifier',
  `question` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Poll question',
  `options` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'List of poll options',
  `total_voter_count` int unsigned DEFAULT NULL COMMENT 'Total number of users that voted in the poll',
  `is_closed` tinyint(1) DEFAULT '0' COMMENT 'True, if the poll is closed',
  `is_anonymous` tinyint(1) DEFAULT '1' COMMENT 'True, if the poll is anonymous',
  `type` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Poll type, currently can be “regular” or “quiz”',
  `allows_multiple_answers` tinyint(1) DEFAULT '0' COMMENT 'True, if the poll allows multiple answers',
  `correct_option_id` int unsigned DEFAULT NULL COMMENT '0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.',
  `explanation` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters',
  `explanation_entities` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Special entities like usernames, URLs, bot commands, etc. that appear in the explanation',
  `open_period` int unsigned DEFAULT NULL COMMENT 'Amount of time in seconds the poll will be active after creation',
  `close_date` timestamp NULL DEFAULT NULL COMMENT 'Point in time (Unix timestamp) when the poll will be automatically closed',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll`
--

LOCK TABLES `poll` WRITE;
/*!40000 ALTER TABLE `poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll_answer`
--

DROP TABLE IF EXISTS `poll_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll_answer` (
  `poll_id` bigint unsigned NOT NULL COMMENT 'Unique poll identifier',
  `user_id` bigint NOT NULL COMMENT 'The user, who changed the answer to the poll',
  `option_ids` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`poll_id`,`user_id`),
  CONSTRAINT `poll_answer_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `poll` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_answer`
--

LOCK TABLES `poll_answer` WRITE;
/*!40000 ALTER TABLE `poll_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `poll_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_checkout_query`
--

DROP TABLE IF EXISTS `pre_checkout_query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_checkout_query` (
  `id` bigint unsigned NOT NULL COMMENT 'Unique query identifier',
  `user_id` bigint DEFAULT NULL COMMENT 'User who sent the query',
  `currency` char(3) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Three-letter ISO 4217 currency code',
  `total_amount` bigint DEFAULT NULL COMMENT 'Total price in the smallest units of the currency',
  `invoice_payload` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Bot specified invoice payload',
  `shipping_option_id` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Identifier of the shipping option chosen by the user',
  `order_info` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Order info provided by the user',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pre_checkout_query_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_checkout_query`
--

LOCK TABLES `pre_checkout_query` WRITE;
/*!40000 ALTER TABLE `pre_checkout_query` DISABLE KEYS */;
/*!40000 ALTER TABLE `pre_checkout_query` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_limiter`
--

DROP TABLE IF EXISTS `request_limiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_limiter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for this entry',
  `chat_id` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Unique chat identifier',
  `inline_message_id` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Identifier of the sent inline message',
  `method` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Request method',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_limiter`
--

LOCK TABLES `request_limiter` WRITE;
/*!40000 ALTER TABLE `request_limiter` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_limiter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_reps`
--

DROP TABLE IF EXISTS `sales_reps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_reps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iin_bin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qr_code_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_reps_email_unique` (`email`),
  UNIQUE KEY `sales_reps_phone_number_unique` (`phone_number`),
  UNIQUE KEY `sales_reps_iin_bin_unique` (`iin_bin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_reps`
--

LOCK TABLES `sales_reps` WRITE;
/*!40000 ALTER TABLE `sales_reps` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_reps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `value`, `key`, `description`, `created_at`, `updated_at`) VALUES (1,'Условия использования телеграм бота','public/DJ7sngevQG2P7cuHs16sRB6mTgXHXqobftPatLtu.pdf','terms_telegram_bot',NULL,'2024-06-08 13:57:04','2024-06-10 22:37:16'),(2,'Инструкция по системе Договор 24','public/hK5htpdsvhyAKz8nBfL4aSwwcm2ZrpB38YEbyhvc.xlsx','instructions_dogovor_24',NULL,'2024-06-08 13:57:04','2024-06-08 13:57:04'),(3,'Переход на сайт Договор 24','https://google.com','register_link_dogovor_24','https://google.com','2024-06-08 13:57:04','2024-06-11 16:47:37');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_query`
--

DROP TABLE IF EXISTS `shipping_query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_query` (
  `id` bigint unsigned NOT NULL COMMENT 'Unique query identifier',
  `user_id` bigint DEFAULT NULL COMMENT 'User who sent the query',
  `invoice_payload` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Bot specified invoice payload',
  `shipping_address` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'User specified shipping address',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `shipping_query_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_query`
--

LOCK TABLES `shipping_query` WRITE;
/*!40000 ALTER TABLE `shipping_query` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_query` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telegram_update`
--

DROP TABLE IF EXISTS `telegram_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telegram_update` (
  `id` bigint unsigned NOT NULL COMMENT 'Update''s unique identifier',
  `chat_id` bigint DEFAULT NULL COMMENT 'Unique chat identifier',
  `message_id` bigint unsigned DEFAULT NULL COMMENT 'New incoming message of any kind - text, photo, sticker, etc.',
  `edited_message_id` bigint unsigned DEFAULT NULL COMMENT 'New version of a message that is known to the bot and was edited',
  `channel_post_id` bigint unsigned DEFAULT NULL COMMENT 'New incoming channel post of any kind - text, photo, sticker, etc.',
  `edited_channel_post_id` bigint unsigned DEFAULT NULL COMMENT 'New version of a channel post that is known to the bot and was edited',
  `message_reaction_id` bigint unsigned DEFAULT NULL COMMENT 'A reaction to a message was changed by a user',
  `message_reaction_count_id` bigint unsigned DEFAULT NULL COMMENT 'Reactions to a message with anonymous reactions were changed',
  `inline_query_id` bigint unsigned DEFAULT NULL COMMENT 'New incoming inline query',
  `chosen_inline_result_id` bigint unsigned DEFAULT NULL COMMENT 'The result of an inline query that was chosen by a user and sent to their chat partner',
  `callback_query_id` bigint unsigned DEFAULT NULL COMMENT 'New incoming callback query',
  `shipping_query_id` bigint unsigned DEFAULT NULL COMMENT 'New incoming shipping query. Only for invoices with flexible price',
  `pre_checkout_query_id` bigint unsigned DEFAULT NULL COMMENT 'New incoming pre-checkout query. Contains full information about checkout',
  `poll_id` bigint unsigned DEFAULT NULL COMMENT 'New poll state. Bots receive only updates about polls, which are sent or stopped by the bot',
  `poll_answer_poll_id` bigint unsigned DEFAULT NULL COMMENT 'A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.',
  `my_chat_member_updated_id` bigint unsigned DEFAULT NULL COMMENT 'The bot''s chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.',
  `chat_member_updated_id` bigint unsigned DEFAULT NULL COMMENT 'A chat member''s status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.',
  `chat_join_request_id` bigint unsigned DEFAULT NULL COMMENT 'A request to join the chat has been sent',
  `chat_boost_updated_id` text COLLATE utf8mb4_unicode_520_ci,
  `chat_boost_removed_id` text COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`),
  KEY `chat_message_id` (`chat_id`,`message_id`),
  KEY `edited_message_id` (`edited_message_id`),
  KEY `channel_post_id` (`channel_post_id`),
  KEY `edited_channel_post_id` (`edited_channel_post_id`),
  KEY `inline_query_id` (`inline_query_id`),
  KEY `chosen_inline_result_id` (`chosen_inline_result_id`),
  KEY `callback_query_id` (`callback_query_id`),
  KEY `shipping_query_id` (`shipping_query_id`),
  KEY `pre_checkout_query_id` (`pre_checkout_query_id`),
  KEY `poll_id` (`poll_id`),
  KEY `poll_answer_poll_id` (`poll_answer_poll_id`),
  KEY `my_chat_member_updated_id` (`my_chat_member_updated_id`),
  KEY `chat_member_updated_id` (`chat_member_updated_id`),
  KEY `chat_join_request_id` (`chat_join_request_id`),
  KEY `chat_id` (`chat_id`,`channel_post_id`),
  CONSTRAINT `telegram_update_ibfk_1` FOREIGN KEY (`chat_id`, `message_id`) REFERENCES `message` (`chat_id`, `id`),
  CONSTRAINT `telegram_update_ibfk_10` FOREIGN KEY (`poll_id`) REFERENCES `poll` (`id`),
  CONSTRAINT `telegram_update_ibfk_11` FOREIGN KEY (`poll_answer_poll_id`) REFERENCES `poll_answer` (`poll_id`),
  CONSTRAINT `telegram_update_ibfk_12` FOREIGN KEY (`my_chat_member_updated_id`) REFERENCES `chat_member_updated` (`id`),
  CONSTRAINT `telegram_update_ibfk_13` FOREIGN KEY (`chat_member_updated_id`) REFERENCES `chat_member_updated` (`id`),
  CONSTRAINT `telegram_update_ibfk_14` FOREIGN KEY (`chat_join_request_id`) REFERENCES `chat_join_request` (`id`),
  CONSTRAINT `telegram_update_ibfk_2` FOREIGN KEY (`edited_message_id`) REFERENCES `edited_message` (`id`),
  CONSTRAINT `telegram_update_ibfk_3` FOREIGN KEY (`chat_id`, `channel_post_id`) REFERENCES `message` (`chat_id`, `id`),
  CONSTRAINT `telegram_update_ibfk_4` FOREIGN KEY (`edited_channel_post_id`) REFERENCES `edited_message` (`id`),
  CONSTRAINT `telegram_update_ibfk_5` FOREIGN KEY (`inline_query_id`) REFERENCES `inline_query` (`id`),
  CONSTRAINT `telegram_update_ibfk_6` FOREIGN KEY (`chosen_inline_result_id`) REFERENCES `chosen_inline_result` (`id`),
  CONSTRAINT `telegram_update_ibfk_7` FOREIGN KEY (`callback_query_id`) REFERENCES `callback_query` (`id`),
  CONSTRAINT `telegram_update_ibfk_8` FOREIGN KEY (`shipping_query_id`) REFERENCES `shipping_query` (`id`),
  CONSTRAINT `telegram_update_ibfk_9` FOREIGN KEY (`pre_checkout_query_id`) REFERENCES `pre_checkout_query` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telegram_update`
--

LOCK TABLES `telegram_update` WRITE;
/*!40000 ALTER TABLE `telegram_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `telegram_update` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint NOT NULL COMMENT 'Unique identifier for this user or bot',
  `is_bot` tinyint(1) DEFAULT '0' COMMENT 'True, if this user is a bot',
  `first_name` char(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'User''s or bot''s first name',
  `last_name` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'User''s or bot''s last name',
  `username` char(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'User''s or bot''s username',
  `language_code` char(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'IETF language tag of the user''s language',
  `is_premium` tinyint(1) DEFAULT '0' COMMENT 'True, if this user is a Telegram Premium user',
  `added_to_attachment_menu` tinyint(1) DEFAULT '0' COMMENT 'True, if this user added the bot to the attachment menu',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date creation',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Entry date update',
  `iin_bin` bigint(12) unsigned zerofill NOT NULL DEFAULT '000000000000',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'Номер телефона',
  `sales_reps_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_chat`
--

DROP TABLE IF EXISTS `user_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_chat` (
  `user_id` bigint NOT NULL COMMENT 'Unique user identifier',
  `chat_id` bigint NOT NULL COMMENT 'Unique user or chat identifier',
  PRIMARY KEY (`user_id`,`chat_id`),
  KEY `chat_id` (`chat_id`),
  CONSTRAINT `user_chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_chat_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_chat`
--

LOCK TABLES `user_chat` WRITE;
/*!40000 ALTER TABLE `user_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_chat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-12 22:00:03
