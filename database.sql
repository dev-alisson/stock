/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100414
Source Host           : localhost:3306
Source Database       : stock

Target Server Type    : MYSQL
Target Server Version : 100414
File Encoding         : 65001

Date: 2022-10-10 05:43:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `items_order_id_foreign` (`order_id`),
  KEY `items_product_id_foreign` (`product_id`),
  CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', '1', '1', '19.00', '1', null, '2022-10-06 11:21:34', '2022-10-06 11:21:34');
INSERT INTO `items` VALUES ('2', '1', '2', '59.00', '1', null, '2022-10-06 11:21:34', '2022-10-06 11:21:34');
INSERT INTO `items` VALUES ('3', '2', '3', '49.00', '1', null, '2022-10-06 11:23:09', '2022-10-06 11:23:09');
INSERT INTO `items` VALUES ('4', '2', '4', '39.00', '1', null, '2022-10-06 11:23:09', '2022-10-06 11:23:09');
INSERT INTO `items` VALUES ('5', '3', '5', '119.00', '1', null, '2022-10-06 11:24:20', '2022-10-06 11:24:20');
INSERT INTO `items` VALUES ('6', '3', '6', '69.00', '1', null, '2022-10-06 11:24:20', '2022-10-06 11:24:20');
INSERT INTO `items` VALUES ('7', '4', '7', '79.00', '1', null, '2022-10-06 11:25:48', '2022-10-06 11:25:48');
INSERT INTO `items` VALUES ('8', '4', '8', '122.00', '1', null, '2022-10-06 11:25:48', '2022-10-06 11:25:48');
INSERT INTO `items` VALUES ('9', '5', '2', '59.00', '1', null, '2022-10-06 11:27:08', '2022-10-06 11:27:08');
INSERT INTO `items` VALUES ('10', '5', '8', '122.00', '1', null, '2022-10-06 11:27:08', '2022-10-06 11:27:08');
INSERT INTO `items` VALUES ('11', '6', '5', '119.90', '1', null, '2022-10-07 23:45:30', '2022-10-07 23:45:30');
INSERT INTO `items` VALUES ('12', '6', '7', '79.00', '1', null, '2022-10-07 23:45:30', '2022-10-07 23:45:30');
INSERT INTO `items` VALUES ('13', '7', '1', '19.90', '1', null, '2022-10-08 17:43:22', '2022-10-08 17:43:22');
INSERT INTO `items` VALUES ('14', '7', '3', '49.00', '1', null, '2022-10-08 17:43:22', '2022-10-08 17:43:22');
INSERT INTO `items` VALUES ('15', '7', '6', '69.00', '1', null, '2022-10-08 17:43:22', '2022-10-08 17:43:22');
INSERT INTO `items` VALUES ('16', '7', '7', '79.00', '1', null, '2022-10-08 17:43:22', '2022-10-08 17:43:22');
INSERT INTO `items` VALUES ('17', '8', '1', '19.90', '1', null, '2022-10-08 18:29:45', '2022-10-08 18:29:45');
INSERT INTO `items` VALUES ('18', '8', '3', '49.00', '1', null, '2022-10-08 18:29:45', '2022-10-08 18:29:45');
INSERT INTO `items` VALUES ('19', '8', '5', '119.90', '1', null, '2022-10-08 18:29:45', '2022-10-08 18:29:45');
INSERT INTO `items` VALUES ('20', '8', '8', '122.00', '1', null, '2022-10-08 18:29:45', '2022-10-08 18:29:45');
INSERT INTO `items` VALUES ('21', '9', '1', '19.90', '1', null, '2022-10-08 18:30:34', '2022-10-08 18:30:34');
INSERT INTO `items` VALUES ('22', '9', '2', '59.90', '1', null, '2022-10-08 18:30:34', '2022-10-08 18:30:34');
INSERT INTO `items` VALUES ('23', '10', '3', '49.00', '1', null, '2022-10-08 18:30:42', '2022-10-08 18:30:42');
INSERT INTO `items` VALUES ('24', '10', '4', '39.00', '1', null, '2022-10-08 18:30:42', '2022-10-08 18:30:42');
INSERT INTO `items` VALUES ('25', '11', '5', '119.90', '1', null, '2022-10-08 18:30:52', '2022-10-08 18:30:52');
INSERT INTO `items` VALUES ('26', '11', '6', '69.00', '1', null, '2022-10-08 18:30:52', '2022-10-08 18:30:52');
INSERT INTO `items` VALUES ('27', '12', '5', '119.90', '1', null, '2022-10-08 18:31:12', '2022-10-08 18:31:12');
INSERT INTO `items` VALUES ('28', '12', '6', '69.00', '1', null, '2022-10-08 18:31:12', '2022-10-08 18:31:12');
INSERT INTO `items` VALUES ('29', '13', '8', '122.00', '1', null, '2022-10-08 18:31:21', '2022-10-08 18:31:21');
INSERT INTO `items` VALUES ('30', '14', '7', '79.00', '1', null, '2022-10-08 18:31:35', '2022-10-08 18:31:35');
INSERT INTO `items` VALUES ('31', '14', '8', '122.00', '1', null, '2022-10-08 18:31:35', '2022-10-08 18:31:35');
INSERT INTO `items` VALUES ('32', '15', '5', '119.90', '1', null, '2022-10-08 18:31:46', '2022-10-08 18:31:46');
INSERT INTO `items` VALUES ('33', '15', '6', '69.00', '1', null, '2022-10-08 18:31:46', '2022-10-08 18:31:46');
INSERT INTO `items` VALUES ('34', '15', '7', '79.00', '1', null, '2022-10-08 18:31:46', '2022-10-08 18:31:46');
INSERT INTO `items` VALUES ('35', '15', '8', '122.00', '1', null, '2022-10-08 18:31:46', '2022-10-08 18:31:46');
INSERT INTO `items` VALUES ('36', '16', '1', '19.90', '1', null, '2022-10-08 18:31:59', '2022-10-08 18:31:59');
INSERT INTO `items` VALUES ('37', '16', '2', '59.90', '1', null, '2022-10-08 18:31:59', '2022-10-08 18:31:59');
INSERT INTO `items` VALUES ('38', '16', '7', '79.00', '1', null, '2022-10-08 18:31:59', '2022-10-08 18:31:59');
INSERT INTO `items` VALUES ('39', '16', '8', '122.00', '1', null, '2022-10-08 18:31:59', '2022-10-08 18:31:59');
INSERT INTO `items` VALUES ('40', '17', '5', '119.90', '1', null, '2022-10-08 18:32:08', '2022-10-08 18:32:08');
INSERT INTO `items` VALUES ('41', '17', '6', '69.00', '1', null, '2022-10-08 18:32:08', '2022-10-08 18:32:08');
INSERT INTO `items` VALUES ('42', '17', '7', '79.00', '1', null, '2022-10-08 18:32:08', '2022-10-08 18:32:08');
INSERT INTO `items` VALUES ('43', '17', '8', '122.00', '1', null, '2022-10-08 18:32:08', '2022-10-08 18:32:08');
INSERT INTO `items` VALUES ('44', '18', '1', '19.90', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('45', '18', '2', '59.90', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('46', '18', '3', '49.00', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('47', '18', '4', '39.00', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('48', '18', '5', '119.90', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('49', '18', '6', '69.00', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('50', '18', '7', '79.00', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('51', '18', '8', '122.00', '1', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `items` VALUES ('52', '19', '2', '59.90', '1', null, '2022-10-10 07:25:39', '2022-10-10 07:25:39');
INSERT INTO `items` VALUES ('53', '19', '4', '39.00', '1', null, '2022-10-10 07:25:39', '2022-10-10 07:25:39');
INSERT INTO `items` VALUES ('54', '19', '5', '119.90', '1', null, '2022-10-10 07:25:39', '2022-10-10 07:25:39');
INSERT INTO `items` VALUES ('55', '19', '6', '69.00', '1', null, '2022-10-10 07:25:39', '2022-10-10 07:25:39');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `logs_user_id_foreign` (`user_id`),
  CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('1', '1', 'Remoção', 'Limpeza de logs', 'danger', null, '2022-10-10 08:18:40', '2022-10-10 08:18:40');
INSERT INTO `logs` VALUES ('2', '1', 'Acesso', 'Acessou listagem de usuários', 'info', null, '2022-10-10 08:18:59', '2022-10-10 08:18:59');
INSERT INTO `logs` VALUES ('3', '1', 'Acesso', 'Acessou listagem de usuários', 'info', null, '2022-10-10 08:19:09', '2022-10-10 08:19:09');
INSERT INTO `logs` VALUES ('4', '1', 'Acesso', 'Acessou listagem de usuários', 'info', null, '2022-10-10 08:19:31', '2022-10-10 08:19:31');
INSERT INTO `logs` VALUES ('5', '1', 'Acesso', 'Acessou listagem de usuários', 'info', null, '2022-10-10 08:19:34', '2022-10-10 08:19:34');
INSERT INTO `logs` VALUES ('6', '1', 'Acesso', 'Acessou listagem de usuários', 'info', null, '2022-10-10 08:19:38', '2022-10-10 08:19:38');
INSERT INTO `logs` VALUES ('7', '1', 'Acesso', 'Acessou o usuário ID :: 5', 'info', null, '2022-10-10 08:20:09', '2022-10-10 08:20:09');
INSERT INTO `logs` VALUES ('8', '1', 'Acesso', 'Acessou o usuário ID :: 5', 'info', null, '2022-10-10 08:20:20', '2022-10-10 08:20:20');
INSERT INTO `logs` VALUES ('9', '1', 'Acesso', 'Acessou o usuário ID :: 5', 'info', null, '2022-10-10 08:21:39', '2022-10-10 08:21:39');
INSERT INTO `logs` VALUES ('10', '1', 'Acesso', 'Acessou o usuário ID :: 1', 'info', null, '2022-10-10 08:21:58', '2022-10-10 08:21:58');
INSERT INTO `logs` VALUES ('11', '1', 'Atualização', 'Atualizou o usuário ID :: 1', 'warning', null, '2022-10-10 08:22:01', '2022-10-10 08:22:01');
INSERT INTO `logs` VALUES ('12', '1', 'Acesso', 'Acessou o usuário ID :: 2', 'info', null, '2022-10-10 08:22:07', '2022-10-10 08:22:07');
INSERT INTO `logs` VALUES ('13', '1', 'Atualização', 'Atualizou o usuário ID :: 2', 'warning', null, '2022-10-10 08:22:55', '2022-10-10 08:22:55');
INSERT INTO `logs` VALUES ('14', '1', 'Atualização', 'Atualizou o usuário ID :: 2', 'warning', null, '2022-10-10 08:23:18', '2022-10-10 08:23:18');
INSERT INTO `logs` VALUES ('15', '1', 'Atualização', 'Atualizou o usuário ID :: 2', 'warning', null, '2022-10-10 08:23:26', '2022-10-10 08:23:26');
INSERT INTO `logs` VALUES ('16', '1', 'Acesso', 'Acessou o usuário ID :: 2', 'info', null, '2022-10-10 08:23:35', '2022-10-10 08:23:35');
INSERT INTO `logs` VALUES ('17', '1', 'Atualização', 'Atualizou o usuário ID :: 2', 'warning', null, '2022-10-10 08:23:41', '2022-10-10 08:23:41');
INSERT INTO `logs` VALUES ('18', '1', 'Acesso', 'Acessou o usuário ID :: 2', 'info', null, '2022-10-10 08:23:45', '2022-10-10 08:23:45');
INSERT INTO `logs` VALUES ('19', '1', 'Acesso', 'Acessou listagem de vendedores', 'info', null, '2022-10-10 08:23:49', '2022-10-10 08:23:49');
INSERT INTO `logs` VALUES ('20', '1', 'Acesso', 'Acessou o vendedor ID :: 2', 'info', null, '2022-10-10 08:23:52', '2022-10-10 08:23:52');
INSERT INTO `logs` VALUES ('21', '1', 'Atualização', 'Atualizou o usuário ID :: 2', 'warning', null, '2022-10-10 08:23:56', '2022-10-10 08:23:56');
INSERT INTO `logs` VALUES ('22', '1', 'Acesso', 'Acessou listagem de vendedores', 'info', null, '2022-10-10 08:24:00', '2022-10-10 08:24:00');
INSERT INTO `logs` VALUES ('23', '1', 'Acesso', 'Acessou formulário de cadastro de vendedores', 'info', null, '2022-10-10 08:24:06', '2022-10-10 08:24:06');
INSERT INTO `logs` VALUES ('24', '1', 'Cadastro', 'Cadastrou vendedor ID :: 5', 'info', null, '2022-10-10 08:25:37', '2022-10-10 08:25:37');
INSERT INTO `logs` VALUES ('25', '1', 'Acesso', 'Acessou o vendedor ID :: 5', 'info', null, '2022-10-10 08:25:40', '2022-10-10 08:25:40');
INSERT INTO `logs` VALUES ('26', '1', 'Atualização', 'Atualizou o usuário ID :: 5', 'warning', null, '2022-10-10 08:25:53', '2022-10-10 08:25:53');
INSERT INTO `logs` VALUES ('27', '1', 'Logout', 'Usuário ID :: 1 efetuou logout', 'info', null, '2022-10-10 08:25:57', '2022-10-10 08:25:57');
INSERT INTO `logs` VALUES ('28', null, 'Acesso', 'Acessou formulário de login', 'info', null, '2022-10-10 08:25:58', '2022-10-10 08:25:58');
INSERT INTO `logs` VALUES ('29', '7', 'Login', 'Usuário ID :: 7 efetuou login', 'info', null, '2022-10-10 08:26:08', '2022-10-10 08:26:08');
INSERT INTO `logs` VALUES ('30', '7', 'Acesso', 'Acessou a dashboard', 'info', null, '2022-10-10 08:26:10', '2022-10-10 08:26:10');
INSERT INTO `logs` VALUES ('31', '7', 'Acesso', 'Buscou os dados do relatório de vendas da dashboard', 'info', null, '2022-10-10 08:26:14', '2022-10-10 08:26:14');
INSERT INTO `logs` VALUES ('32', '7', 'Acesso', 'Acessou listagem de vendedores', 'info', null, '2022-10-10 08:26:18', '2022-10-10 08:26:18');
INSERT INTO `logs` VALUES ('33', '7', 'Acesso', 'Acessou o vendedor ID :: 5', 'info', null, '2022-10-10 08:26:21', '2022-10-10 08:26:21');
INSERT INTO `logs` VALUES ('34', '7', 'Atualização', 'Atualizou o usuário ID :: 5', 'warning', null, '2022-10-10 08:26:24', '2022-10-10 08:26:24');
INSERT INTO `logs` VALUES ('35', '7', 'Acesso', 'Acessou listagem de vendedores', 'info', null, '2022-10-10 08:26:26', '2022-10-10 08:26:26');
INSERT INTO `logs` VALUES ('36', '7', 'Remoção', 'Removeu o usuário ID :: 5', 'danger', null, '2022-10-10 08:26:30', '2022-10-10 08:26:30');
INSERT INTO `logs` VALUES ('37', '7', 'Acesso', 'Acessou a dashboard', 'info', null, '2022-10-10 08:27:29', '2022-10-10 08:27:29');
INSERT INTO `logs` VALUES ('38', '7', 'Acesso', 'Buscou os dados do relatório de vendas da dashboard', 'info', null, '2022-10-10 08:27:32', '2022-10-10 08:27:32');
INSERT INTO `logs` VALUES ('39', '7', 'Acesso', 'Acessou a dashboard', 'info', null, '2022-10-10 08:27:39', '2022-10-10 08:27:39');
INSERT INTO `logs` VALUES ('40', '7', 'Acesso', 'Buscou os dados do relatório de vendas da dashboard', 'info', null, '2022-10-10 08:27:41', '2022-10-10 08:27:41');
INSERT INTO `logs` VALUES ('41', '7', 'Acesso', 'Acessou listagem de produtos', 'info', null, '2022-10-10 08:28:10', '2022-10-10 08:28:10');
INSERT INTO `logs` VALUES ('42', '7', 'Acesso', 'Acessou listagem de usuários', 'info', null, '2022-10-10 08:28:14', '2022-10-10 08:28:14');
INSERT INTO `logs` VALUES ('43', '7', 'Acesso', 'Acessou listagem de vendedores', 'info', null, '2022-10-10 08:28:16', '2022-10-10 08:28:16');
INSERT INTO `logs` VALUES ('44', '7', 'Acesso', 'Acessou listagem de pedidos', 'info', null, '2022-10-10 08:28:18', '2022-10-10 08:28:18');
INSERT INTO `logs` VALUES ('45', '7', 'Acesso', 'Acessou formulário de cadastro de pedidos', 'info', null, '2022-10-10 08:28:20', '2022-10-10 08:28:20');
INSERT INTO `logs` VALUES ('46', '7', 'Acesso', 'Acessou a dashboard', 'info', null, '2022-10-10 08:28:26', '2022-10-10 08:28:26');
INSERT INTO `logs` VALUES ('47', '7', 'Acesso', 'Buscou os dados do relatório de vendas da dashboard', 'info', null, '2022-10-10 08:28:28', '2022-10-10 08:28:28');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2022_10_06_143905_create_sellers_table', '1');
INSERT INTO `migrations` VALUES ('6', '2022_10_06_143923_create_products_table', '1');
INSERT INTO `migrations` VALUES ('7', '2022_10_06_143937_create_orders_table', '1');
INSERT INTO `migrations` VALUES ('8', '2022_10_06_143946_create_items_table', '1');
INSERT INTO `migrations` VALUES ('9', '2022_10_08_144004_create_logs_table', '1');
INSERT INTO `migrations` VALUES ('10', '2022_10_08_194922_create_sessions_table', '1');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1', '78.00', null, '2022-10-06 11:20:42', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('2', '2', '88.00', null, '2022-10-06 11:22:43', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('3', '3', '188.00', null, '2022-10-06 11:23:49', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('4', '4', '201.00', null, '2022-10-06 11:25:31', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('5', '5', '181.00', null, '2022-10-06 11:26:43', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('6', '1', '198.90', null, '2022-10-07 23:45:30', '2022-10-09 16:37:32');
INSERT INTO `orders` VALUES ('7', '1', '216.90', null, '2022-10-08 17:43:22', '2022-10-09 16:37:31');
INSERT INTO `orders` VALUES ('8', '3', '310.80', null, '2022-10-08 18:29:45', '2022-10-08 18:29:45');
INSERT INTO `orders` VALUES ('9', '1', '79.80', null, '2022-10-08 18:30:34', '2022-10-08 18:30:34');
INSERT INTO `orders` VALUES ('10', '2', '88.00', null, '2022-10-08 18:30:42', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('11', '3', '188.90', null, '2022-10-08 18:30:52', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('12', '3', '188.90', null, '2022-10-08 18:31:12', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('13', '4', '122.00', null, '2022-10-08 18:31:21', '2022-10-08 18:31:21');
INSERT INTO `orders` VALUES ('14', '4', '201.00', null, '2022-10-08 18:31:35', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('15', '5', '389.90', null, '2022-10-08 18:31:46', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('16', '7', '280.80', null, '2022-10-08 18:31:59', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('17', '8', '389.90', null, '2022-10-08 18:32:08', '2022-10-09 16:31:36');
INSERT INTO `orders` VALUES ('18', '4', '557.70', null, '2022-10-10 02:32:09', '2022-10-10 02:32:09');
INSERT INTO `orders` VALUES ('19', '3', '287.80', null, '2022-10-10 07:25:39', '2022-10-10 07:25:39');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `products_seller_id_foreign` (`seller_id`),
  CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'Marketing', 'marketing', '/uploads/products/1665106393.jpg', '19.90', '75', null, '2022-10-06 10:28:36', '2022-10-10 04:19:35');
INSERT INTO `products` VALUES ('2', '1', 'E-commerce', 'e-commerce', '/uploads/products/1665100040.jpg', '59.90', '45', null, '2022-10-06 10:28:45', '2022-10-06 23:47:20');
INSERT INTO `products` VALUES ('3', '2', 'Aplicativos', 'aplicativos', '/uploads/products/1665100050.jpg', '49.00', '29', null, '2022-10-06 10:28:51', '2022-10-06 23:47:30');
INSERT INTO `products` VALUES ('4', '2', 'EAD', 'ead', '/uploads/products/1665100062.jpg', '39.00', '23', null, '2022-10-06 10:28:55', '2022-10-06 23:47:42');
INSERT INTO `products` VALUES ('5', '3', 'Hotelaria', 'hotelaria', '/uploads/products/1665100075.jpg', '119.90', '47', null, '2022-10-06 10:29:03', '2022-10-06 23:47:55');
INSERT INTO `products` VALUES ('6', '3', 'Blog', 'blog', '/uploads/products/1665100142.jpg', '69.00', '12', null, '2022-10-06 10:29:06', '2022-10-06 23:49:02');
INSERT INTO `products` VALUES ('7', '4', 'Sob Demanda', 'sob-demanda', '/uploads/products/1665100155.jpg', '79.00', '45', null, '2022-10-06 10:29:09', '2022-10-06 23:49:15');
INSERT INTO `products` VALUES ('8', '4', 'ERP', 'erp', '/uploads/products/1665100172.jpg', '122.00', '16', null, '2022-10-06 10:29:13', '2022-10-06 23:49:32');

-- ----------------------------
-- Table structure for sellers
-- ----------------------------
DROP TABLE IF EXISTS `sellers`;
CREATE TABLE `sellers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`email`),
  UNIQUE KEY `sellers_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sellers
-- ----------------------------
INSERT INTO `sellers` VALUES ('1', 'Riachuelo', '86.713.216/0001-10', 'contato@riachuelo.com.br', '(97) 2491-7745', '/uploads/sellers/1665108064.png', null, '2022-10-06 10:40:34', '2022-10-07 02:01:50');
INSERT INTO `sellers` VALUES ('2', 'Renner', '48.445.564/0001-64', 'contato@renner.com.br', '(95) 3112-7374', '/uploads/sellers/1665107652.png', null, '2022-10-06 10:40:35', '2022-10-07 01:54:12');
INSERT INTO `sellers` VALUES ('3', 'Marisa', '24.861.424/0001-09', 'contato@marisa.com.br', '(15) 3185-0955', '/uploads/sellers/1665107665.png', null, '2022-10-06 10:42:51', '2022-10-07 01:54:25');
INSERT INTO `sellers` VALUES ('4', 'Kaisan', '32.214.832/0001-05', 'contato@kaisan.com.br', '(82) 2428-0478', '/uploads/sellers/1665107677.png', null, '2022-10-06 10:44:17', '2022-10-07 01:54:37');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('cKwOuCaoNZ94YiYNV3ZEQlz0DJhDgNDuePDgVDYk', '7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRUJmbnIwTWltWldVSm1uWkpZMFdvbWpOM0gycHNvcHZOVnE0UGNFaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3NlbGxlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Nzt9', '1665390508');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Alisson', 'Pereira Santana', '148.343.557-13', 'male', 'alissonpereira1993@gmail.com', '(96) 3621-8704', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665150997.png', 'TDC6f8Fvv3VEl7OvkQiTwbUEyLTvjufz1RlDFYeWpmXNB10HxsXSs4Xlz4vB', null, '2022-10-06 11:08:52', '2022-10-10 05:25:57');
INSERT INTO `users` VALUES ('2', 'Benedito', 'Rodrigues Santana', '808.026.500-31', 'male', 'beneditorodrigues1965@gmail.com', '(62) 2861-3156', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665390221.png', null, null, '2022-10-06 11:08:41', '2022-10-10 08:23:41');
INSERT INTO `users` VALUES ('3', 'Gerlane', 'Pereira Santana', '216.271.340-34', 'female', 'gerlanepereira1971@gmail.com', '(95) 3323-2553', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665151250.png', null, null, '2022-10-06 11:09:08', '2022-10-06 11:09:08');
INSERT INTO `users` VALUES ('4', 'Alami', 'Pereira Santana', '245.763.310-94', 'male', 'alami1991@gmail.com', '(95) 2627-8811', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665151294.png', null, null, '2022-10-06 11:12:02', '2022-10-06 11:12:02');
INSERT INTO `users` VALUES ('5', 'Arley', 'Pereira Santana', '277.516.720-99', 'male', 'arleypereira1995@gmail.com', '(82) 2301-9918', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665152972.png', null, null, '2022-10-06 11:12:45', '2022-10-06 11:12:45');
INSERT INTO `users` VALUES ('6', 'Isabelly', 'Pereira Santana', '886.972.350-06', 'female', 'isabellypereira2013@gmail.com', '(81) 2191-1125', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665153306.png', null, null, '2022-10-07 14:35:06', '2022-10-07 14:35:06');
INSERT INTO `users` VALUES ('7', 'Paolla', 'Firmino', '106.225.364-78', 'female', 'escarllitypaolla@gmail.com', '(55) 3907-7345', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665153370.png', 'rgv13GHsvaniFUXa0AS1iODoCMA5ep9544fOAe7e6jo7vetWrTcR5sHiwtMm', null, '2022-10-07 14:36:10', '2022-10-10 05:26:08');
INSERT INTO `users` VALUES ('8', 'Gabriel', 'Pereira Santana', '611.912.240-07', 'male', 'gabrielpereira2022@gmail.com', '(64) 3720-3155', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '/uploads/users/1665153421.png', null, null, '2022-10-07 14:37:01', '2022-10-07 14:37:01');
