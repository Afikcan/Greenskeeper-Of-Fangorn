CREATE DATABASE IF NOT EXISTS `VARIETES` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `VARIETES`;

CREATE TABLE `SEMANCIERS` (
  `nomsemancier` VARCHAR(42),
  `siteweb` VARCHAR(42),
  PRIMARY KEY (`nomsemancier`, `siteweb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `EST_PRODUITE` (
  `nomsemancier` VARCHAR(42),
  `siteweb` VARCHAR(42),
  `nomvariete` VARCHAR(42),
  `versionproduction` VARCHAR(42),
  PRIMARY KEY (`nomsemancier`, `siteweb`, `nomvariete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PLANTES` (
  `nomplante` VARCHAR(42),
  `nomlatin` VARCHAR(42),
  `catégorieplante` VARCHAR(42),
  `typeplante` VARCHAR(42),
  `soustypeplante` VARCHAR(42),
  PRIMARY KEY (`nomplante`, `nomlatin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SUBISSENT` (
  `nomplante` VARCHAR(42),
  `nomlatin` VARCHAR(42),
  `nommenace` VARCHAR(42),
  PRIMARY KEY (`nomplante`, `nomlatin`, `nommenace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `JARDINS_VERGER` (
  `hauteurmax` VARCHAR(42),
  PRIMARY KEY (`hauteurmax`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

CREATE TABLE `MISE_EN_PLACE` (
  `nomvariete` VARCHAR(42),
  `datedebut` VARCHAR(42),
  `datefin` VARCHAR(42),
  `descriptionsemis` VARCHAR(42),
  `descriptionplantation` VARCHAR(42),
  PRIMARY KEY (`nomvariete`, `datedebut`, `datefin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `VARIETES` (
  `nomvariete` VARCHAR(42),
  `annéemisesurmarché` VARCHAR(42),
  `précocité` VARCHAR(42),
  `descriptionentretien` VARCHAR(42),
  `nbjourslevée` VARCHAR(42),
  `commentairevariete` VARCHAR(42),
  `infosol` VARCHAR(42),
  `nomplante` VARCHAR(42),
  `nomlatin` VARCHAR(42),
  PRIMARY KEY (`nomvariete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MENACES` (
  `nommenace` VARCHAR(42),
  `descriptionmenace` VARCHAR(42),
  `listesolutions` VARCHAR(42),
  PRIMARY KEY (`nommenace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `JARDINS_POTAGER` (
  `typesol` VARCHAR(42),
  PRIMARY KEY (`typesol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

CREATE TABLE `PERIODE` (
  `datedebut` VARCHAR(42),
  `datefin` VARCHAR(42),
  PRIMARY KEY (`datedebut`, `datefin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `RECOLTE` (
  `nomvariete` VARCHAR(42),
  `datedebut` VARCHAR(42),
  `datefin` VARCHAR(42),
  `descriptionrecolte` VARCHAR(42),
  `quantitéproduite` VARCHAR(42),
  `qualitégustative` VARCHAR(42),
  `commentairerécolte` VARCHAR(42),
  PRIMARY KEY (`nomvariete`, `datedebut`, `datefin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `OCCUPE` (
  `nomvariete` VARCHAR(42),
  `latp` VARCHAR(42),
  `longp` VARCHAR(42),
  `numerorang` VARCHAR(42),
  `typemiseenplace` VARCHAR(42),
  `texteconsequences` VARCHAR(42),
  PRIMARY KEY (`nomvariete`, `latp`, `longp`, `numerorang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `JARDINS` (
  `idjardin` VARCHAR(42),
  `nomjardin` VARCHAR(42),
  `surface` VARCHAR(42),
  `estdornements` VARCHAR(42),
  `hauteurmax` VARCHAR(42),
  `typesol` VARCHAR(42),
  PRIMARY KEY (`idjardin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `INFESTATION` (
  `datedebut` VARCHAR(42),
  `datefin` VARCHAR(42),
  `latp` VARCHAR(42),
  `longp` VARCHAR(42),
  `numerorang` VARCHAR(42),
  `typeplantesauvage` VARCHAR(42),
  PRIMARY KEY (`datedebut`, `datefin`, `latp`, `longp`, `numerorang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `RANGS` (
  `latp` VARCHAR(42),
  `longp` VARCHAR(42),
  `numerorang` VARCHAR(42),
  `latr` VARCHAR(42),
  `longr` VARCHAR(42),
  PRIMARY KEY (`latp`, `longp`, `numerorang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PARCELLES` (
  `latp` VARCHAR(42),
  `longp` VARCHAR(42),
  `longueurp` VARCHAR(42),
  `largeurp` VARCHAR(42),
  `idjardin` VARCHAR(42),
  PRIMARY KEY (`latp`, `longp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `JARDINS_DORNEMENTS` (
  `estdornements` VARCHAR(42),
  PRIMARY KEY (`estdornements`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

ALTER TABLE `EST_PRODUITE` ADD FOREIGN KEY (`nomvariete`) REFERENCES `VARIETES` (`nomvariete`);
ALTER TABLE `EST_PRODUITE` ADD FOREIGN KEY (`nomsemancier`, `siteweb`) REFERENCES `SEMANCIERS` (`nomsemancier`, `siteweb`);
ALTER TABLE `SUBISSENT` ADD FOREIGN KEY (`nommenace`) REFERENCES `MENACES` (`nommenace`);
ALTER TABLE `SUBISSENT` ADD FOREIGN KEY (`nomplante`, `nomlatin`) REFERENCES `PLANTES` (`nomplante`, `nomlatin`);
ALTER TABLE `MISE_EN_PLACE` ADD FOREIGN KEY (`datedebut`, `datefin`) REFERENCES `PERIODE` (`datedebut`, `datefin`);
ALTER TABLE `MISE_EN_PLACE` ADD FOREIGN KEY (`nomvariete`) REFERENCES `VARIETES` (`nomvariete`);
ALTER TABLE `VARIETES` ADD FOREIGN KEY (`nomplante`, `nomlatin`) REFERENCES `PLANTES` (`nomplante`, `nomlatin`);
ALTER TABLE `RECOLTE` ADD FOREIGN KEY (`datedebut`, `datefin`) REFERENCES `PERIODE` (`datedebut`, `datefin`);
ALTER TABLE `RECOLTE` ADD FOREIGN KEY (`nomvariete`) REFERENCES `VARIETES` (`nomvariete`);
ALTER TABLE `OCCUPE` ADD FOREIGN KEY (`latp`, `longp`, `numerorang`) REFERENCES `RANGS` (`latp`, `longp`, `numerorang`);
ALTER TABLE `OCCUPE` ADD FOREIGN KEY (`nomvariete`) REFERENCES `VARIETES` (`nomvariete`);
-- ALTER TABLE `JARDINS` ADD FOREIGN KEY (`typesol`) REFERENCES `JARDINS_POTAGER` (`typesol`);
-- ALTER TABLE `JARDINS` ADD FOREIGN KEY (`hauteurmax`) REFERENCES `JARDINS_VERGER` (`hauteurmax`);
-- ALTER TABLE `JARDINS` ADD FOREIGN KEY (`estdornements`) REFERENCES `JARDINS_DORNEMENTS` (`estdornements`);
ALTER TABLE `INFESTATION` ADD FOREIGN KEY (`latp`, `longp`, `numerorang`) REFERENCES `RANGS` (`latp`, `longp`, `numerorang`);
ALTER TABLE `INFESTATION` ADD FOREIGN KEY (`datedebut`, `datefin`) REFERENCES `PERIODE` (`datedebut`, `datefin`);
ALTER TABLE `RANGS` ADD FOREIGN KEY (`latp`, `longp`) REFERENCES `PARCELLES` (`latp`, `longp`);
ALTER TABLE `PARCELLES` ADD FOREIGN KEY (`idjardin`) REFERENCES `JARDINS` (`idjardin`);