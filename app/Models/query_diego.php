<!-- 
    
CREATE TABLE `projeto`.`projeto_usuarios`(     `usuario_id` INT(7) NOT NULL AUTO_INCREMENT COMMENT 'ID do usuário',     `usuario_nome` TEXT(64) NOT NULL COMMENT 'Nome do usuário',     `usuario_email` TEXT(64) NOT NULL COMMENT 'E-mail do usuário',     `usuario_senha` TEXT(64) NOT NULL COMMENT 'Senha do usuário',     PRIMARY KEY (`usuario_id`)  );

ALTER TABLE `projeto`.`projeto_usuarios`     CHANGE `usuario_nome` `usuario_nome` VARCHAR(64) NULL  COMMENT 'Nome do usuário',     CHANGE `usuario_email` `usuario_email` VARCHAR(64) NULL  COMMENT 'E-mail do usuário',     CHANGE `usuario_senha` `usuario_senha` VARCHAR(64) NULL  COMMENT 'Senha do usuário';

ALTER TABLE `projeto`.`projeto_usuarios`     ADD COLUMN `usuario_cpf` VARCHAR(14) NULL AFTER `usuario_senha`;

 -->