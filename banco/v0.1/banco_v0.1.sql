create database db_gestor_de_armarios CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

use db_gestor_de_armarios;

create table tb_curso(
	cd_curso int not null auto_increment,
    sg_curso varchar(5) not null,
    nm_curso varchar(60) not null,
    st_curso boolean not null default 1,
    primary key(cd_curso),
    constraint curso_sg_curso_unico unique(sg_curso),
    constraint curso_nm_curso_unico unique(nm_curso)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create table tb_aluno(
	cd_aluno int not null auto_increment,
    nm_aluno varchar(150) not null,
    nr_ano int(1) not null default 1,
    st_aluno boolean not null default 1,
    id_curso int not null,
    primary key(cd_aluno),
    constraint aluno_fk_id_curso foreign key(id_curso) references tb_curso(cd_curso)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create table tb_local(
	cd_local int not null auto_increment,
    nm_local varchar(60) not null,
    st_local boolean not null default 1,
    primary key(cd_local),
    constraint local_nm_local_unico unique(nm_local)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create table tb_armario(
	cd_armario int not null auto_increment,
    st_armario boolean not null default 1,
    id_local int not null,
    primary key(cd_armario),
    constraint armario_fk_id_local foreign key(id_local) references tb_local(cd_local)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create table tb_aluguel(
	cd_aluguel int not null auto_increment,
    id_aluno int not null,
    id_armario int not null,
    primary key(cd_aluguel),
    constraint aluguel_fk_id_aluno foreign key(id_aluno) references tb_aluno(cd_aluno),
    constraint aluguel_fk_id_armario foreign key(id_armario) references tb_armario(cd_armario)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create table tb_login(
	cd_login int not null auto_increment,
    nm_user varchar(150) not null,
    tx_login varchar(60) not null,
    tx_pass varchar(256) not null,
    primary key(cd_login),
    constraint login_tx_login_unico unique(tx_login)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
