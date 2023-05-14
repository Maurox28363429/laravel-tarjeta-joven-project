-- MariaDB dump 10.19  Distrib 10.6.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: app_tarjeta_joven
-- ------------------------------------------------------
-- Server version	10.6.11-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `cliente_data`
--

DROP TABLE IF EXISTS `cliente_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_data`
--

LOCK TABLES `cliente_data` WRITE;
/*!40000 ALTER TABLE `cliente_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (2,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Alcib\\u00edades\",\"Apellido\":\"V\\u00edquez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(3,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Ana\",\"Apellido\":\"Rodr\\u00edguez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(4,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Anglea\",\"Apellido\":\"Allen\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(5,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Evelyn\",\"Apellido\":\"Dom\\u00ednguez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(6,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Gabriel\",\"Apellido\":\"B\\u00e1rcenas\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(7,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"G\\u00e9nesis\",\"Apellido\":\"Gongora\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"estudios\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(8,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Irving\",\"Apellido\":\"Becerra\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(9,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Nicole\",\"Apellido\":\"Becerra\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"estudios\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(10,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Ivanis\",\"Apellido\":\"Rodr\\u00edguez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"estudios\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(11,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Jashira\",\"Apellido\":\"De Gonz\\u00e1lez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(12,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Jeanette\",\"Apellido\":\"Anderson\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(13,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Jonathan\",\"Apellido\":\"Rivera\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(14,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Juan\",\"Apellido\":\"Pascual\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(15,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Edwin\",\"Apellido\":\"Salazar\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(16,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Eustasio\",\"Apellido\":\"Arosemena\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(17,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Leopoldo\",\"Apellido\":\"Lester Caballero\",\"Cedula\":\"3-97-277\",\"Telefono\":\"66257124\",\"Correo\":\"llesterc1955@yahoo.es\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(18,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Anthony\",\"Apellido\":\"Ramos\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"estudios\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(19,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Yariatna\",\"Apellido\":\"Yearwood\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"estudios\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(20,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Elideth\",\"Apellido\":\"Camarena\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(21,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Javier\",\"Apellido\":\"Arauz\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(22,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Julio\",\"Apellido\":\"Aponte\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(23,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Lenny\",\"Apellido\":\"Acosta\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(24,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Lorenza\",\"Apellido\":\"Valderrama\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(25,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Luis\",\"Apellido\":\"Centeno\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(26,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Maditzel\",\"Apellido\":\"Hernandez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(27,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Mainol\",\"Apellido\":\"Whenham\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(28,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Manuel\",\"Apellido\":\"Lasso\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(29,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Manuel\",\"Apellido\":\"Gracia\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"false\",\"concurso\":\"false\",\"recomendar\":\"false\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(30,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Agust&iacute;n\",\"Apellido\":\"Martinez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(31,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Margarita\",\"Apellido\":\"Palacios\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\",\"descuentos\":[]}','2023-01-26 17:26:56'),(32,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Mar&iacute;a\",\"Apellido\":\"Gonz&aacute;lez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(33,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Mauricio\",\"Apellido\":\"Mendoza\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(34,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Mois&eacute;s\",\"Apellido\":\"Urriola\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(35,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Odys\",\"Apellido\":\"Castro\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(36,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Gabriela\",\"Apellido\":\"Martinez\",\"Cedula\":\"8-814-2000\",\"Telefono\":\"69557216\",\"Correo\":\"gm065051@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(37,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #2\",\"Nombre\":\"Crescencia\",\"Apellido\":\"Palomino\",\"Cedula\":\"5-10-0420\",\"Telefono\":\"66878484\",\"Correo\":\"cres_47@hotmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(38,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #2\",\"Nombre\":\"Eduardo\",\"Apellido\":\"Caballero\",\"Cedula\":\"8-153-2073\",\"Telefono\":\"62649916\",\"Correo\":\"caballeroe1945@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No por ahora\"}','2023-01-26 17:26:56'),(39,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Dayarelys\",\"Apellido\":\"Barnabas Ruiz\",\"Cedula\":\"8-750-376\",\"Telefono\":\"61041910\",\"Correo\":\"dbarnab0924@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(40,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Tomas\",\"Apellido\":\"De gracia\",\"Cedula\":\"8-773-2034\",\"Telefono\":\"63720833\",\"Correo\":\"degracia221984@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\"],\"menbresia\":\"false\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"Gracias\"}','2023-01-26 17:26:56'),(41,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Paskinel\",\"Apellido\":\"Saenz\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(42,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Raul\",\"Apellido\":\"Con\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"estudios\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(43,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Ricardo\",\"Apellido\":\"Gonz&aacute;lez\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(44,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Yelmira\",\"Apellido\":\"Urrutia\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(45,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Yerania\",\"Apellido\":\"Vargas\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(46,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Zuyitza\",\"Apellido\":\"Estrada\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(47,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Juan\",\"Apellido\":\"Barsallo\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(48,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Anthony\",\"Apellido\":\"Cam\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(49,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Nelson\",\"Apellido\":\"Ortega\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(50,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Luis\",\"Apellido\":\"Peralta\",\"Cedula\":\"8-1058-1608\",\"Telefono\":\"68668580\",\"Correo\":\"luisamadodr1101@gmail.com\",\"edad\":\"18 a 15\",\"descuentos\":[\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(51,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Stephanie\",\"Apellido\":\"Caicedo\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"diversion\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(52,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Xavier\",\"Apellido\":\"Moore\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(53,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Gael\",\"Apellido\":\"Bethancourt\",\"Cedula\":\"13-11-1334\",\"Telefono\":\"691116481\",\"Correo\":\"alexisyinyo11@gmail.com\",\"edad\":\"18 a 15\",\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\",\"descuentos\":[]}','2023-01-26 17:26:56'),(54,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Katherin\",\"Apellido\":\"De S&aacute;nchez\",\"Cedula\":\"8-837-716\",\"Telefono\":\"68491120\",\"Correo\":\"no@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"estudios\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(55,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Alexis\",\"Apellido\":\"Bethancourt\",\"Cedula\":\"8-841-692\",\"Telefono\":\"69116481\",\"Correo\":\"alexisyinyo11@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"estudios\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"Muy buena la encuesta\"}','2023-01-26 17:26:56'),(56,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Karen\",\"Apellido\":\"Vega\",\"Cedula\":\"8-854-305\",\"Telefono\":\"3960197\",\"Correo\":\"vegakaren.b@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(57,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Sof&iacute;a\",\"Apellido\":\"B&aacute;rcenas\",\"Cedula\":\"8-1086-2000\",\"Telefono\":\"67500388\",\"Correo\":\"sofiabarcenas501@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(58,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Lorenis\",\"Apellido\":\"Barcenas\",\"Cedula\":\"8-1072-2061\",\"Telefono\":\"68275849\",\"Correo\":\"barcenaskristel2@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(59,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Gesury\",\"Apellido\":\"Avila\",\"Cedula\":\"8-766-286\",\"Telefono\":\"67494232\",\"Correo\":\"gesu_06@hotmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"estudios\",\"diversion\"],\"menbresia\":\"false\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(60,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Sulay\",\"Apellido\":\"Morales\",\"Cedula\":null,\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(61,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Adam Sebastian\",\"Apellido\":\"Rios Barria\",\"Cedula\":\"8-1171-2307\",\"Telefono\":\"69021096\",\"Correo\":\"sindybarria1983@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"Pueden tambien ofrecer recargas de celular\"}','2023-01-26 17:26:56'),(62,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Susan Nicole\",\"Apellido\":\"Reese\",\"Cedula\":null,\"Telefono\":\"61491150\",\"Correo\":\"no@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"estudios\",\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(63,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Marta\",\"Apellido\":\"Madri&ntilde;an\",\"Cedula\":\"8-65-612\",\"Telefono\":null,\"Correo\":\"no@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(64,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Silvia\",\"Apellido\":\"Lecky\",\"Cedula\":\"8-734-2451\",\"Telefono\":\"69486954\",\"Correo\":\"silvia_lecky@hotmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(65,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Marlenis del Carmen\",\"Apellido\":\"Aviles\",\"Cedula\":\"2-726-1583\",\"Telefono\":\"67539901\",\"Correo\":\"marlenisaviles08@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(66,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Ashnabell\",\"Apellido\":\"Durango\",\"Cedula\":\"8-807-447\",\"Telefono\":\"65051293\",\"Correo\":\"ashnabelldegideon@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(67,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Kenia\",\"Apellido\":\"Pinzon\",\"Cedula\":\"8757295\",\"Telefono\":\"66786553\",\"Correo\":\"kep1425@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"estudios\",\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(68,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Ahisar\",\"Apellido\":\"Martinez\",\"Cedula\":null,\"Telefono\":\"61491150\",\"Correo\":\"martafidelis09@gmail.com\",\"edad\":\"18 a 15\",\"descuentos\":[\"salud\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(69,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #2\",\"Nombre\":\"Thelmarys\",\"Apellido\":\"Santos\",\"Cedula\":\"8-741-1849\",\"Telefono\":\"64668799\",\"Correo\":\"santosthelmarys@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"estudios\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(70,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #2\",\"Nombre\":\"Jaime\",\"Apellido\":\"Gibbs\",\"Cedula\":\"8-457-769\",\"Telefono\":\"6738-6599\",\"Correo\":\"jaimegibbs17@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"turismo\",\"estudios\",\"salud\"],\"menbresia\":\"false\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(71,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #2\",\"Nombre\":\"Taira\",\"Apellido\":\"De Olmedo\",\"Cedula\":\"8-306-17\",\"Telefono\":\"64668799\",\"Correo\":\"tairaolm12@gmail.com\",\"edad\":\"36 o mas\",\"descuentos\":[\"estudios\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"false\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(72,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Gabriel\",\"Apellido\":\"Osto\",\"Cedula\":\"E-9-191397\",\"Telefono\":\"63669221\",\"Correo\":\"ostogabriel@gmail.com\",\"edad\":\"18 o menos\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(73,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #7\",\"Nombre\":\"Gabriel\",\"Apellido\":\"Osto\",\"Cedula\":\"E-8-191397\",\"Telefono\":\"63669221\",\"Correo\":\"ostogabriel@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"diversion\",\"gastronom\\u00eda\"],\"menbresia\":\"true\",\"concurso\":\"true\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(74,'{\"rating-2\":\"5\",\"dni_vendedor\":\"Vendedor #7\",\"Nombre\":\"Luis\",\"Apellido\":\"Yanis\",\"Cedula\":\"8-958-1414\",\"Telefono\":\"62516410\",\"Correo\":\"Luisyanis03@gmail.com\",\"edad\":\"18 a 15\",\"descuentos\":[\"diversion\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No definido\"}','2023-01-26 17:26:56'),(75,'{\"rating-2\":\"1\",\"dni_vendedor\":\"Vendedor #1\",\"Nombre\":\"Cecilia\",\"Apellido\":\"Chao\",\"Cedula\":\"8-911-747\",\"Telefono\":\"67913729\",\"Correo\":\"cecisoraya@gmail.com\",\"edad\":\"26 a 35\",\"descuentos\":[\"turismo\",\"gastronom\\u00eda\",\"salud\"],\"menbresia\":\"true\",\"concurso\":\"false\",\"recomendar\":\"true\",\"comentario\":\"No s\\u00e9 si esta membres\\u00eda puede usarse en el extranjero, en caso que no lo sea, ser\\u00eda favorable que se pueda utilizar ya que as\\u00ed se amplia el programa y el benefactor sigue teniendo los beneficios.\"}','2023-01-26 17:26:56');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_data`
--

DROP TABLE IF EXISTS `empresa_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_data`
--

LOCK TABLES `empresa_data` WRITE;
/*!40000 ALTER TABLE `empresa_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membresias`
--

DROP TABLE IF EXISTS `membresias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membresias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membresias`
--

LOCK TABLES `membresias` WRITE;
/*!40000 ALTER TABLE `membresias` DISABLE KEYS */;
/*!40000 ALTER TABLE `membresias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_11_000000_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_01_17_154207_create_empresa_data_table',1),(7,'2023_01_17_154224_create_cliente_data_table',1),(8,'2023_01_17_154234_create_orders_table',1),(9,'2023_01_17_154310_create_membresias_table',1),(10,'2023_01_17_154350_create_notifies_table',1),(11,'2023_01_23_203715_user_recovery',2),(12,'2023_01_26_164333_add_timestap',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifies`
--

DROP TABLE IF EXISTS `notifies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `body` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifies`
--

LOCK TABLES `notifies` WRITE;
/*!40000 ALTER TABLE `notifies` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2023-01-17 20:00:50','2023-01-17 20:00:50'),(2,'empresa','2023-01-17 20:00:50','2023-01-17 20:00:50'),(3,'cliente','2023-01-17 20:00:50','2023-01-17 20:00:50');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recovery_cod` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin124','admin@gmail.com',NULL,'$2y$10$9Kmb9btbwcPudmj6yjWGMuaSkd8jq2ntPJ086xjHA8QE9MIUayEy2',0,1,NULL,'2023-01-17 20:14:09','2023-01-19 22:17:48',NULL),(4,'mau2','correo@gmail.com',NULL,'$2y$10$OvtB9RDT/6jF9SwgHkHVCe08EBVssdzb2qchIls7WLSrbhVsD7i32',0,1,NULL,'2023-01-18 00:42:22','2023-01-19 21:19:25',NULL),(6,'mau2','oscar@gmail.com',NULL,'$2y$10$rLXRBoHoQxGTVib620DSPuYjwkvMuBxD7VEkI5Yxop1dYQZUL6DiC',0,1,NULL,'2023-01-19 21:21:09','2023-01-19 21:22:14',NULL),(7,'Clientetest','cliente@gmail.com',NULL,'$2y$10$XQuoYgcWbs7Cl/snkZUqluio0HhYOABmDovp2yiTGIw5CIXkRBazu',0,3,NULL,'2023-01-23 19:02:59','2023-01-23 19:09:10',NULL),(8,'oscar','desarrolladormau@gmail.com',NULL,'$2y$10$dJQ19WWX4bhkZbIL/f.MaOSW0ZE3PPw9Qgrl8DIVtJ4drE3o3/KXi',0,1,NULL,'2023-01-24 00:08:38','2023-01-24 00:11:14','9461944');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-02 12:53:47
