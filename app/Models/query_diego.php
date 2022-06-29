<!-- 
    
CREATE TABLE `projeto`.`projeto_usuarios`(     `usuario_id` INT(7) NOT NULL AUTO_INCREMENT COMMENT 'ID do usuário',     `usuario_nome` TEXT(64) NOT NULL COMMENT 'Nome do usuário',     `usuario_email` TEXT(64) NOT NULL COMMENT 'E-mail do usuário',     `usuario_senha` TEXT(64) NOT NULL COMMENT 'Senha do usuário',     PRIMARY KEY (`usuario_id`)  );

ALTER TABLE `projeto`.`projeto_usuarios`     CHANGE `usuario_nome` `usuario_nome` VARCHAR(64) NULL  COMMENT 'Nome do usuário',     CHANGE `usuario_email` `usuario_email` VARCHAR(64) NULL  COMMENT 'E-mail do usuário',     CHANGE `usuario_senha` `usuario_senha` VARCHAR(64) NULL  COMMENT 'Senha do usuário';

ALTER TABLE `projeto`.`projeto_usuarios`     ADD COLUMN `usuario_cpf` VARCHAR(14) NULL AFTER `usuario_senha`;

CREATE TABLE `projeto`.`projeto_usuario_nota_importada`(     `usuarionotaimportada_id` INT(7) NOT NULL AUTO_INCREMENT ,     `usuarionotaimportada_data` DATE ,     `usuarionotaimportada_numero` INT(64) ,     `usuarionotaimportada_valor` BOOLEAN ,     `usuarionotaimportada_usuario_id` INT ,     `usuarionotaimportada_arquivo` TEXT DEFAULT '(NULL)' ,     PRIMARY KEY (`usuarionotaimportada_id`)  );

ALTER TABLE `projeto`.`projeto_usuario_nota_importada`     CHANGE `usuarionotaimportada_data` `usuarionotaimportada_data` TEXT(12) NULL ,     CHANGE `usuarionotaimportada_valor` `usuarionotaimportada_valor` BOOLEAN NULL ;

ALTER TABLE `projeto`.`projeto_usuario_nota_importada`     CHANGE `usuarionotaimportada_data` `usuarionotaimportada_data` VARCHAR(12) DEFAULT '(NULL)' NULL ,     CHANGE `usuarionotaimportada_numero` `usuarionotaimportada_numero` VARCHAR(9) DEFAULT '(NULL)' NULL ,     CHANGE `usuarionotaimportada_valor` `usuarionotaimportada_valor` VARCHAR(24) DEFAULT '(NULL)' NULL ,     CHANGE `usuarionotaimportada_usuario_id` `usuarionotaimportada_usuario_id` VARCHAR(9) DEFAULT '(NULL)' NULL ,     CHANGE `usuarionotaimportada_arquivo` `usuarionotaimportada_arquivo` VARCHAR(255) DEFAULT '(NULL)' NULL ;

ALTER TABLE `projeto`.`projeto_usuario_nota_importada`     CHANGE `usuarionotaimportada_usuario_id` `usuarionotaimportada_usuario_id` INT(7) NULL ;

ALTER TABLE `projeto`.`projeto_usuario_nota_importada` ADD CONSTRAINT `FK_projeto_usuario_nota_importada` FOREIGN KEY (`usuarionotaimportada_usuario_id`) REFERENCES `projeto_usuarios` (`usuario_id`)

 -->