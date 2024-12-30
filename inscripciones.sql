/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.27-MariaDB : Database - inscripciones
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inscripciones` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `inscripciones`;

/*Table structure for table `aspirantes` */

DROP TABLE IF EXISTS `aspirantes`;

CREATE TABLE `aspirantes` (
  `id_aspirante` int(11) NOT NULL AUTO_INCREMENT,
  `id_pantel` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nombre_general` varchar(255) DEFAULT NULL,
  `inicio_clases` date DEFAULT NULL,
  `nombre_aspirante` varchar(255) DEFAULT NULL,
  `condicion_medica` varchar(255) DEFAULT NULL,
  `alergias_alimentos` varchar(255) DEFAULT NULL,
  `otras_alergias` varchar(255) DEFAULT NULL,
  `foto_aspirante` text DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `domicilio_aspirante` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `persona_autorizada` varchar(255) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `indicaciones_cuidados` int(11) DEFAULT 0,
  `ciclo_escolar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aspirante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `aspirantes` */

LOCK TABLES `aspirantes` WRITE;

insert  into `aspirantes`(`id_aspirante`,`id_pantel`,`fecha_nacimiento`,`nombre_general`,`inicio_clases`,`nombre_aspirante`,`condicion_medica`,`alergias_alimentos`,`otras_alergias`,`foto_aspirante`,`genero`,`domicilio_aspirante`,`numero`,`colonia`,`localidad`,`id_grado`,`curp`,`fecha_registro`,`persona_autorizada`,`activo`,`indicaciones_cuidados`,`ciclo_escolar`) values (1,3,'2024-05-16','Yareli Reyes','2024-11-05','Yareli Reyes','Saludable','Nuez','Polvo','20241011_200932_LLd0UMr.jpg','F','5 de mayo','162','Santiago','Metepec',3,'SDSLKLKMLK43ML4K3M','2024-10-11',NULL,NULL,0,2);

UNLOCK TABLES;

/*Table structure for table `autorizados` */

DROP TABLE IF EXISTS `autorizados`;

CREATE TABLE `autorizados` (
  `id_autorizado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_autorizado` varchar(255) DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `foto_pariente` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_autorizado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `autorizados` */

LOCK TABLES `autorizados` WRITE;

insert  into `autorizados`(`id_autorizado`,`nombre_autorizado`,`parentesco`,`foto_pariente`) values (1,'Araceli diaz','Hermana','20241011_200932_E3IfXIj.jpg'),(2,'Monica Murillo','Prima','20241011_200932_4PsVUwk.jpg');

UNLOCK TABLES;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

LOCK TABLES `cache` WRITE;

UNLOCK TABLES;

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

LOCK TABLES `cache_locks` WRITE;

UNLOCK TABLES;

/*Table structure for table `ciclo_escolar` */

DROP TABLE IF EXISTS `ciclo_escolar`;

CREATE TABLE `ciclo_escolar` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciclo` varchar(255) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ciclo_escolar` */

LOCK TABLES `ciclo_escolar` WRITE;

insert  into `ciclo_escolar`(`id_ciclo`,`nombre_ciclo`,`activo`) values (1,'2023-2024',1),(2,'2024-2025',1),(3,'2025-2026',1),(4,'2026-2027',1),(5,'2027-2028',1),(6,'2028-2029',1),(7,'2029-2030',1);

UNLOCK TABLES;

/*Table structure for table `condiciones_fisicas_tutores` */

DROP TABLE IF EXISTS `condiciones_fisicas_tutores`;

CREATE TABLE `condiciones_fisicas_tutores` (
  `id_condiciones_fisicas_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `vacuna_covid` int(11) DEFAULT 0,
  `condiciones_fisicas` text DEFAULT NULL,
  `otra_condicion` varchar(255) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_condiciones_fisicas_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=551 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `condiciones_fisicas_tutores` */

LOCK TABLES `condiciones_fisicas_tutores` WRITE;

insert  into `condiciones_fisicas_tutores`(`id_condiciones_fisicas_tutor`,`nombre`,`parentesco`,`ocupacion`,`vacuna_covid`,`condiciones_fisicas`,`otra_condicion`,`id_tutor`,`id_aspirante`) values (549,'Mireya Morales Rosas','Mamá','Nutriologa',1,'[{\"migrana\":\"Migra\\u00f1a\",\"hipertension\":\"\",\"embarazo\":\"\",\"diabetes\":\"\",\"obesidad\":\"\",\"miopia\":\"Miopia\",\"astigmatismo\":\"\",\"epilepsia\":\"\",\"fumador\":\"\",\"otro\":\"\",\"ninguno\":\"\"}]','',1,1),(550,'Daniel Reyes Aragon','Papá','Arquitecto',1,'[{\"migrana\":\"\",\"hipertension\":\"Hipertension\",\"embarazo\":\"\",\"diabetes\":\"\",\"obesidad\":\"\",\"miopia\":\"\",\"astigmatismo\":\"\",\"epilepsia\":\"\",\"fumador\":\"\",\"otro\":\"\",\"ninguno\":\"\"}]','',2,1);

UNLOCK TABLES;

/*Table structure for table `contacto_emergencias` */

DROP TABLE IF EXISTS `contacto_emergencias`;

CREATE TABLE `contacto_emergencias` (
  `id_contacto_emergencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_persona` varchar(45) DEFAULT NULL,
  `telefono_casa` varchar(45) DEFAULT NULL,
  `telefono_trabajo` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `contacto_diferente_padres` int(1) DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  `activo` int(1) DEFAULT 1,
  PRIMARY KEY (`id_contacto_emergencia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `contacto_emergencias` */

LOCK TABLES `contacto_emergencias` WRITE;

insert  into `contacto_emergencias`(`id_contacto_emergencia`,`nombre_persona`,`telefono_casa`,`telefono_trabajo`,`celular`,`contacto_diferente_padres`,`parentesco`,`id_aspirante`,`activo`) values (1,'Daniela Reyes Diaz','3223323223','2332322332','2323323232',NULL,'Prima',1,1);

UNLOCK TABLES;

/*Table structure for table `datos_medicos_aspirante` */

DROP TABLE IF EXISTS `datos_medicos_aspirante`;

CREATE TABLE `datos_medicos_aspirante` (
  `id_medicos_aspirante` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_sangre` varchar(255) DEFAULT NULL,
  `alergia_alimento` varchar(45) DEFAULT NULL,
  `alergia_medicamentos` varchar(45) DEFAULT NULL,
  `alergia_otro` varchar(45) DEFAULT NULL,
  `alergia_animales` varchar(45) DEFAULT NULL,
  `alergia_ambiente` varchar(45) DEFAULT NULL,
  `medicamentos_cronicos` int(1) DEFAULT 0,
  `nombre_medicamento` varchar(255) DEFAULT NULL,
  `cartilla_vacunacion` int(11) DEFAULT 0,
  `vacunas_pendientes` varchar(45) DEFAULT NULL,
  `vacuna_covid` varchar(45) DEFAULT NULL,
  `condicion_fisica` text DEFAULT NULL,
  `otra_condicion` varchar(45) DEFAULT NULL,
  `discapacidad` text DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_medicos_aspirante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `datos_medicos_aspirante` */

LOCK TABLES `datos_medicos_aspirante` WRITE;

insert  into `datos_medicos_aspirante`(`id_medicos_aspirante`,`tipo_sangre`,`alergia_alimento`,`alergia_medicamentos`,`alergia_otro`,`alergia_animales`,`alergia_ambiente`,`medicamentos_cronicos`,`nombre_medicamento`,`cartilla_vacunacion`,`vacunas_pendientes`,`vacuna_covid`,`condicion_fisica`,`otra_condicion`,`discapacidad`,`id_aspirante`) values (1,'O+',NULL,'Paracetamol',NULL,NULL,NULL,0,NULL,1,NULL,'Si','[{\"migrana\":\"\",\"hipertension\":\"\",\"diabetes\":\"\",\"obesidad\":\"\",\"miopia\":\"\",\"astigmatismo\":\"Astigmatismo\",\"epilepsia\":\"\",\"otro\":\"\",\"ninguno\":\"\"}]',NULL,'[{\"motriz\":\"\",\"visual\":\"Visual\",\"ninguna\":\"\",\"neurologica\":\"\",\"auditiva\":\"\",\"otra\":\"\"}]',1);

UNLOCK TABLES;

/*Table structure for table `detalle_aspirante_tutores` */

DROP TABLE IF EXISTS `detalle_aspirante_tutores`;

CREATE TABLE `detalle_aspirante_tutores` (
  `id_detalle_aspirante_tutores` int(11) NOT NULL AUTO_INCREMENT,
  `id_tutor` int(11) DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_aspirante_tutores`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `detalle_aspirante_tutores` */

LOCK TABLES `detalle_aspirante_tutores` WRITE;

insert  into `detalle_aspirante_tutores`(`id_detalle_aspirante_tutores`,`id_tutor`,`id_aspirante`,`token`) values (1,1,1,'1/1/1'),(2,2,1,'1/1/2');

UNLOCK TABLES;

/*Table structure for table `detalle_autorizados_aspirantes` */

DROP TABLE IF EXISTS `detalle_autorizados_aspirantes`;

CREATE TABLE `detalle_autorizados_aspirantes` (
  `id_detalle_autorizados_aspirantes` int(11) NOT NULL AUTO_INCREMENT,
  `id_autorizado` varchar(255) DEFAULT NULL,
  `id_aspirante` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_autorizados_aspirantes`)
) ENGINE=InnoDB AUTO_INCREMENT=709 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `detalle_autorizados_aspirantes` */

LOCK TABLES `detalle_autorizados_aspirantes` WRITE;

insert  into `detalle_autorizados_aspirantes`(`id_detalle_autorizados_aspirantes`,`id_autorizado`,`id_aspirante`,`token`) values (691,'1','1','1/2/1'),(692,'2','1','1/2/2');

UNLOCK TABLES;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

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

/*Data for the table `failed_jobs` */

LOCK TABLES `failed_jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `grados` */

DROP TABLE IF EXISTS `grados`;

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `edad` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` int(1) DEFAULT 1,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `grados` */

LOCK TABLES `grados` WRITE;

insert  into `grados`(`id_grado`,`clave`,`nombre`,`edad`,`descripcion`,`activo`) values (1,'LAC-A','LACTANTES A','3-10 meses','PRUEBA 1',1),(2,'LAC-B','LACTANTES B','1 año y medio',NULL,1),(3,'CAM','CAMINADORES','2 Años','Niños y Niñas de 2 a 3 años',1),(4,'MAT-1','MATERNAL 1','2-3 años',NULL,1),(5,'MAT-2','MATERNAL 2','3-4 años',NULL,1),(6,'K-2','KINDER 2','4-5 años',NULL,1),(7,'K-3','KINDER 3','5-6 años',NULL,1),(8,'PF','PREFIRST','6-7 años',NULL,1);

UNLOCK TABLES;

/*Table structure for table `indicaciones_cuidados_caminadores` */

DROP TABLE IF EXISTS `indicaciones_cuidados_caminadores`;

CREATE TABLE `indicaciones_cuidados_caminadores` (
  `id_indicacion_cuidado_caminadores` int(11) NOT NULL AUTO_INCREMENT,
  `sobrenombre` varchar(255) DEFAULT NULL,
  `fecha_cuidados` date DEFAULT NULL,
  `edad_ingreso` varchar(255) DEFAULT NULL,
  `horario_estancia` varchar(255) DEFAULT NULL,
  `condicion_medica` varchar(255) DEFAULT NULL,
  `dato_salud` varchar(255) DEFAULT NULL,
  `leche_vaso` varchar(255) DEFAULT NULL,
  `leche_caja` varchar(255) DEFAULT NULL,
  `tiempo_calentamiento` varchar(255) DEFAULT NULL,
  `formula_onzas` varchar(255) DEFAULT NULL,
  `onzas_agua` varchar(255) DEFAULT NULL,
  `temperatura` varchar(255) DEFAULT NULL,
  `alimento_prohibido` varchar(255) DEFAULT NULL,
  `limitar_motivar` varchar(255) DEFAULT NULL,
  `cambio_panal` varchar(255) DEFAULT NULL,
  `indicaciones_panal` varchar(255) DEFAULT NULL,
  `siesta_horario` varchar(255) DEFAULT NULL,
  `tiempo_siesta` varchar(255) DEFAULT NULL,
  `forma_dormir` varchar(255) DEFAULT NULL,
  `usa_chupon` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  `toma_agua` varchar(255) DEFAULT NULL,
  `horario_toma_agua` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_indicacion_cuidado_caminadores`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `indicaciones_cuidados_caminadores` */

LOCK TABLES `indicaciones_cuidados_caminadores` WRITE;

insert  into `indicaciones_cuidados_caminadores`(`id_indicacion_cuidado_caminadores`,`sobrenombre`,`fecha_cuidados`,`edad_ingreso`,`horario_estancia`,`condicion_medica`,`dato_salud`,`leche_vaso`,`leche_caja`,`tiempo_calentamiento`,`formula_onzas`,`onzas_agua`,`temperatura`,`alimento_prohibido`,`limitar_motivar`,`cambio_panal`,`indicaciones_panal`,`siesta_horario`,`tiempo_siesta`,`forma_dormir`,`usa_chupon`,`otro`,`id_aspirante`,`toma_agua`,`horario_toma_agua`) values (1,'Yare','2024-10-23','10 meses','Matutino','Saludable','Ninguno','Vasito','No','5 minutos','2 cucharadas','media taza','5 minutos','Ninguno','No','Que lo requiera','Ninguno','no','Ninguno','boca arriba','no','Ninguno',1,'si','Mañana');

UNLOCK TABLES;

/*Table structure for table `indicaciones_cuidados_lactantes` */

DROP TABLE IF EXISTS `indicaciones_cuidados_lactantes`;

CREATE TABLE `indicaciones_cuidados_lactantes` (
  `id_indicacion_cuidado_lactentes` int(11) NOT NULL AUTO_INCREMENT,
  `sobrenombre` varchar(255) DEFAULT NULL,
  `fecha_cuidados` date DEFAULT NULL,
  `edad_ingreso` varchar(255) DEFAULT NULL,
  `horario_estancia` varchar(255) DEFAULT NULL,
  `condicion_medica` varchar(255) DEFAULT NULL,
  `dato_salud` varchar(255) DEFAULT NULL,
  `toma_leche` varchar(255) DEFAULT NULL,
  `leche_materna` varchar(255) DEFAULT NULL,
  `tiempo_calentamiento` varchar(255) DEFAULT NULL,
  `formula_onzas` varchar(255) DEFAULT NULL,
  `onzas_agua` varchar(255) DEFAULT NULL,
  `temperatura` varchar(255) DEFAULT NULL,
  `forma_tomar` varchar(255) DEFAULT NULL,
  `come_papilla` varchar(255) DEFAULT NULL,
  `limitar_comer` varchar(255) DEFAULT NULL,
  `indicacion_alimentos` varchar(255) DEFAULT NULL,
  `alimento_prohibido` varchar(255) DEFAULT NULL,
  `agua_natural` varchar(255) DEFAULT NULL,
  `horario_colegio` varchar(255) DEFAULT NULL,
  `cambio_panal` varchar(255) DEFAULT NULL,
  `indicacion_panal` varchar(255) DEFAULT NULL,
  `duerme_siesta` varchar(255) DEFAULT NULL,
  `forma_dormir` varchar(255) DEFAULT NULL,
  `usa_chupon` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_indicacion_cuidado_lactentes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `indicaciones_cuidados_lactantes` */

LOCK TABLES `indicaciones_cuidados_lactantes` WRITE;

UNLOCK TABLES;

/*Table structure for table `indicaciones_cuidados_maternal` */

DROP TABLE IF EXISTS `indicaciones_cuidados_maternal`;

CREATE TABLE `indicaciones_cuidados_maternal` (
  `id_indicacion_cuidado_maternal` int(11) NOT NULL AUTO_INCREMENT,
  `sobrenombre` varchar(255) DEFAULT NULL,
  `fecha_cuidados` date DEFAULT NULL,
  `edad_ingreso` varchar(255) DEFAULT NULL,
  `horario_estancia` varchar(255) DEFAULT NULL,
  `condicion_medica` varchar(255) DEFAULT NULL,
  `dato_salud` varchar(255) DEFAULT NULL,
  `alimento_prohibido` varchar(255) DEFAULT NULL,
  `toma_agua` varchar(255) DEFAULT NULL,
  `horario_colegio` varchar(255) DEFAULT NULL,
  `limitar_motivar` varchar(255) DEFAULT NULL,
  `cambio_panal` varchar(255) DEFAULT NULL,
  `indicaciones_panal` varchar(255) DEFAULT NULL,
  `siesta_horario` varchar(255) DEFAULT NULL,
  `tiempo_siesta` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_indicacion_cuidado_maternal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `indicaciones_cuidados_maternal` */

LOCK TABLES `indicaciones_cuidados_maternal` WRITE;

UNLOCK TABLES;

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

LOCK TABLES `job_batches` WRITE;

UNLOCK TABLES;

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

LOCK TABLES `jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1);

UNLOCK TABLES;

/*Table structure for table `notifiaciones_aspirante` */

DROP TABLE IF EXISTS `notifiaciones_aspirante`;

CREATE TABLE `notifiaciones_aspirante` (
  `id_notificacion_aspirante` int(11) NOT NULL AUTO_INCREMENT,
  `id_aspirante` int(11) DEFAULT NULL,
  `id_plantel` int(11) DEFAULT NULL,
  `nombre_aspirante` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `color` varchar(255) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_notificacion_aspirante`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `notifiaciones_aspirante` */

LOCK TABLES `notifiaciones_aspirante` WRITE;

UNLOCK TABLES;

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

LOCK TABLES `password_reset_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `plantel` */

DROP TABLE IF EXISTS `plantel`;

CREATE TABLE `plantel` (
  `id_pantel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono1` varchar(11) DEFAULT NULL,
  `telefono2` varchar(11) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `activo` int(1) DEFAULT 1,
  PRIMARY KEY (`id_pantel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `plantel` */

LOCK TABLES `plantel` WRITE;

insert  into `plantel`(`id_pantel`,`nombre`,`direccion`,`telefono1`,`telefono2`,`correo`,`activo`) values (1,'Plantel Toluca','hhhhhhhhhhhhhhhhhhhh','3434344343','65656556','toluca@gmail.com.mx',1),(2,'Plantel Santa Fe','hheeeeeeeeeeeeeeeeeee','7676766767','65565665','santafe@gmail.com.mx',1),(3,'Plantel Metepec','435eeeeeeeeeee','6754634','43564536','metepec@gmail.com.mx',1),(4,'Plantel Zibatá','weeeeeeeww','4356','43564356','metepec@gmail.com.mx',1);

UNLOCK TABLES;

/*Table structure for table `portafolios_inscripciones` */

DROP TABLE IF EXISTS `portafolios_inscripciones`;

CREATE TABLE `portafolios_inscripciones` (
  `id_portafolio` int(11) NOT NULL AUTO_INCREMENT,
  `id_aspirante` int(11) DEFAULT NULL,
  `pdf_inscripcion` varchar(255) DEFAULT NULL,
  `pdf_translado` varchar(255) DEFAULT NULL,
  `pdf_indicaciones` varchar(255) DEFAULT NULL,
  `pdf_medicos` varchar(255) DEFAULT NULL,
  `pdf_conformidad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_portafolio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `portafolios_inscripciones` */

LOCK TABLES `portafolios_inscripciones` WRITE;

insert  into `portafolios_inscripciones`(`id_portafolio`,`id_aspirante`,`pdf_inscripcion`,`pdf_translado`,`pdf_indicaciones`,`pdf_medicos`,`pdf_conformidad`) values (1,1,'20241011_200932_ficha_inscripcion.pdf','20241015_204039_traslado.pdf','20241023_173230_indicaciones_y_cuidados_lactantes.pdf','20241015_225452_cuestionario_salud.pdf',NULL);

UNLOCK TABLES;

/*Table structure for table `preregistros` */

DROP TABLE IF EXISTS `preregistros`;

CREATE TABLE `preregistros` (
  `id_preregistro` int(11) NOT NULL AUTO_INCREMENT,
  `id_aspirante` int(11) DEFAULT NULL,
  `cuenta_beca` int(1) DEFAULT 0,
  `porcentaje` float DEFAULT 0,
  `matricula` varchar(45) DEFAULT NULL,
  `id_grado` varchar(10) DEFAULT NULL,
  `acta_nacimiento` text DEFAULT NULL,
  `acta_nacimiento_t1` text DEFAULT NULL,
  `acta_nacimiento_t2` text DEFAULT NULL,
  `certificado_medico` text DEFAULT NULL,
  `cartilla_vacunacion` text DEFAULT NULL,
  `identificacion_oficial_t2` text DEFAULT NULL,
  `identificacion_oficial_t1` text DEFAULT NULL,
  `curp` text DEFAULT NULL,
  `curp_t1` text DEFAULT NULL,
  `curp_t2` text DEFAULT NULL,
  `fotografia_digital` text DEFAULT NULL,
  `finalizo_proceso` int(1) DEFAULT 0,
  `pago_anual` int(1) DEFAULT NULL,
  `tipo_beca` int(11) DEFAULT 0,
  `otro` text DEFAULT NULL,
  PRIMARY KEY (`id_preregistro`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `preregistros` */

LOCK TABLES `preregistros` WRITE;

insert  into `preregistros`(`id_preregistro`,`id_aspirante`,`cuenta_beca`,`porcentaje`,`matricula`,`id_grado`,`acta_nacimiento`,`acta_nacimiento_t1`,`acta_nacimiento_t2`,`certificado_medico`,`cartilla_vacunacion`,`identificacion_oficial_t2`,`identificacion_oficial_t1`,`curp`,`curp_t1`,`curp_t2`,`fotografia_digital`,`finalizo_proceso`,`pago_anual`,`tipo_beca`,`otro`) values (1,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL);

UNLOCK TABLES;

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

LOCK TABLES `sessions` WRITE;

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('0mGHJ68q5XigrWkcRLZxXmQiaciEjud60wPgwTRh',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZHVHWHU4V2l4elA3VnJQa25qQ2xDcHBiM21QUnl5bGFGdDVVN0JXMyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYwOiJodHRwOi8vbG9jYWxob3N0L2luc2NyaXBjaW9uL3B1YmxpYy9yZXF1aXNpdG9zX2luc2NyaXBjaW9uLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1729729770),('56fLfBOKbRqDhvsOW1mMDw3Hoe9b7QXk6fuCiwss',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUNZc2ZpT01KVjJwTURpbUdSRHZoTnFncFpta29BY0tFdHBBam1xQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3QvaW5zY3JpcGNpb24vcHVibGljL2luaWNpb19hc3BpcmFudGUvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1729032904),('H7wiIkzN9Kte159whwYxd2a3n4Sva6qqrqObgEus',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMVQyMktNdGdOVzhJRUtqQXZVeDhOdTVpeGZ5dE40bnpwZkI0STZEciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvaW5zY3JpcGNpb24vcHVibGljL2luaWNpbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1729016726),('hOMBajNAnwmDJu9ryMIujHa01aRZW10J1ELfzJlS',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZTZCNlBReUx0YjhoYm5pRExqUEhqc1Q4cXg0U3FZWVRBUThxRlg1eSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3QvaW5zY3JpcGNpb24vcHVibGljL2luaWNpb19hc3BpcmFudGUvMSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1728942087),('jy3JEoSa5kvz2988V0yuX8TuLmAM99uvf7QEEhLM',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTlYNzllWHlUZVA5NUdHUjN4azYxNFFRWmZScnllaUhuMWxpY2RKeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9sb2NhbGhvc3QvaW5zY3JpcGNpb24vcHVibGljL2luZGljYWNpb25lc19jdWlkYWRvcy8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1729630013),('KYmAXFc4BejTRslAE9Qq1Iw8oGmCNMofVTu2MxUd',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVXhNdEx2OW1XTmtxVDhBd2Ruc0JKbTJaRE01ejJDUzJ0TFZ0TGgzZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYwOiJodHRwOi8vbG9jYWxob3N0L2luc2NyaXBjaW9uL3B1YmxpYy9yZXF1aXNpdG9zX2luc2NyaXBjaW9uLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1729713078),('MH1q5eU3GIiVnPoLdpflLcfdMK9OixgY25mopmQE',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMUl0YXZjVVBCVTRLTXBwVzJ4YU1COGtITmZqM2hralZINHRXSDVDMiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU0OiJodHRwOi8vbG9jYWxob3N0L2luc2NyaXBjaW9uL3B1YmxpYy9pbmljaW9fYXNwaXJhbnRlLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1729207936),('YYBLTxTxfpw5mn8SG5oMRLWDLLFJGM76HNM1JHC5',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUVZPQ1RrS01KVlVQc0E2aDZJRk9nemo3V3hid3pqcXZOWUZ5MVhMSCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU5OiJodHRwOi8vbG9jYWxob3N0L2luc2NyaXBjaW9uL3B1YmxpYy9pbmRpY2FjaW9uZXNfY3VpZGFkb3MvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1729094583);

UNLOCK TABLES;

/*Table structure for table `tutores` */

DROP TABLE IF EXISTS `tutores`;

CREATE TABLE `tutores` (
  `id_tutor_padre` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tutor` varchar(255) DEFAULT NULL,
  `telefono_casa_tutor` varchar(255) DEFAULT NULL,
  `telefono_trabajo_tutor` varchar(255) DEFAULT NULL,
  `celular_tutor` varchar(255) DEFAULT NULL,
  `direccion_tutor` varchar(255) DEFAULT NULL,
  `email_tutor` varchar(255) DEFAULT NULL,
  `foto_tutor` varchar(255) DEFAULT NULL,
  `finalizo_inscripcion` int(1) DEFAULT 0,
  `sexo` int(1) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `grado_estudios` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_tutor_padre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tutores` */

LOCK TABLES `tutores` WRITE;

insert  into `tutores`(`id_tutor_padre`,`nombre_tutor`,`telefono_casa_tutor`,`telefono_trabajo_tutor`,`celular_tutor`,`direccion_tutor`,`email_tutor`,`foto_tutor`,`finalizo_inscripcion`,`sexo`,`edad`,`ocupacion`,`grado_estudios`,`curp`,`fecha_nacimiento`,`parentesco`,`activo`) values (1,'Mireya Morales Rosas','32322332','32232332','2332323232','5 de mayo','correo11@gob-ti.com','20241011_200932_fvDMxK7.jpg',1,2,33,'Nutriologa','Licenciatura','KJNKJN45KJN54KJN54','1991-10-10','Mamá',1),(2,'Daniel Reyes Aragon','2332232323','3223323223','2323322323','5 de mayo','correo12@gob-ti.com','20241011_200932_wkD0Vk1.jpg',1,1,33,'Arquitecto','Ingeniero','IJ43NKJ34NKJ34K4J3','1991-04-20','Papá',1);

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `id_plantel` int(11) DEFAULT NULL,
  `tipo_user` int(11) DEFAULT 3,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`id_tutor`,`id_plantel`,`tipo_user`,`created_at`,`updated_at`) values (1,'Osvaldo','osvaldosv.gobti@gmail.com',NULL,'$2y$12$/u6MkNn8U6//tTkzfUTfk.AgWdvzeIzDfr7DwPZAmFZcN7hp2Gx/O',NULL,NULL,NULL,3,'2024-10-02 19:54:00','2024-10-02 19:54:00');

UNLOCK TABLES;

/*Table structure for table `usuario_registro` */

DROP TABLE IF EXISTS `usuario_registro`;

CREATE TABLE `usuario_registro` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_aspirante` int(11) DEFAULT NULL,
  `id_usuario_registro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usuario_registro` */

LOCK TABLES `usuario_registro` WRITE;

insert  into `usuario_registro`(`id_registro`,`id_aspirante`,`id_usuario_registro`) values (1,1,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
