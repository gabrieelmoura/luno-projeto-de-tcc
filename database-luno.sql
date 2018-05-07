use luno;

-- ####################################################################################################
-- # Criação 29/03/2018
-- ####################################################################################################

-- users(id, user_name, birthdate, email, user_password, avatar_id)

create table luno_users(
	id int primary key auto_increment,
    user_name varchar(128) not null,
    birthdate date not null,
    email varchar(128) not null,
    user_password varchar(256) not null,
    avatar_id int,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- institutions(id, institution_name, description)

create table luno_institutions(
	id int primary key auto_increment,
    institution_name varchar(128) not null,
    description text,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- courses(id, course_name, institution_id, creator_id)

create table luno_courses(
	id int primary key auto_increment,
    course_name varchar(128) not null,
    institution_id int,
    creator_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- classrooms(id, start_date, end_date, hidden, invite_only, course_id, creator_id)

create table luno_classrooms(
	id int primary key auto_increment,
    start_date date not null,
    end_date date not null,
    hidden boolean default false,
    invite_only boolean default false,
    course_id int not null,
    creator_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- topics(id, title, creator_id, section_id)

create table luno_topics(
	id int primary key auto_increment,
    title varchar(128) not null,
    creator_id int not null,
    section_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- posts(id, content, creator_id, topic_id)

create table luno_posts(
	id int primary key auto_increment,
    content text not null,
    creator_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- sections(id, title, subtitle, classroom_id, creator_id)

create table luno_sections(
	id int primary key,
    title varchar(124) not null,
    subtitle varchar(124) not null,
    classroom_id int not null,
    creator_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- calendar(id, content, event_date, classroom_id, creator_id)

create table luno_calendar(
	id int primary key auto_increment,
    content text not null,
    event_date date not null,
    classroom_id int not null,
    creator_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- notices(id, content, type, seen, target_id)

create table luno_notices(
	id int primary key auto_increment,
    content text not null,
    notice_type varchar(64) not null,
    seen bool default false,
    target_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- tasks(id, title, description, deadline, weight, creator_id, classroom_id)

create table luno_tasks(
	id int primary key auto_increment,
    title varchar(128) not null,
    description text not null,
    deadline date,
    weight double not null,
    creator_id int not null,
    classroom_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- chapter(id, title, content, creator_id, clasroom_id)

create table luno_chapter(
	id int primary key auto_increment,
    title varchar(64) not null,
    content text not null,
    creator_id int not null,
    classroom_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- attachment(id, post_id, media_id)

create table luno_attachment(
	id int primary key auto_increment,
    post_id int not null,
    media_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- registrations(id, user_id, classroom_id)

create table luno_registrations(
	id int primary key auto_increment,
    user_id int not null,
    classroom_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- grades(id, val, user_id, task_id, avaliator_id, media_id)

create table luno_grades(
	id int primary key auto_increment,
    val double,
    user_id int not null,
    task_id int not null,
    avaliator_id int,
    media_id int,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- media(id, title, media_type, mime, location, size, owner_id, classroom_id)

create table luno_media(
	id int primary key auto_increment,
    title varchar(64),
    media_type varchar(32) not null,
    mime varchar(128) not null,
    location varchar(128) not null,
    size int not null,
    owner_id int,
    classroom_id int,
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- ####################################################################################################
-- # Atualizações: 30/03/2018
-- ####################################################################################################

-- adicionar classroom_id na luno_notices, role na registrations e remember_token na users

alter table luno_users add column remember_token varchar(124);
alter table luno_notices add column classroom_id int;
alter table luno_registrations add column role varchar(32);

-- ####################################################################################################
-- # Atualizações: 31/03/2018
-- ####################################################################################################

-- necessário criar algumas tabelas associativas, vou trocar a tabela registrations por uma associativa também

drop table luno_registrations;

create table luno_user_classroom(
	user_id int,
    classroom_id int,
    role varchar(32),
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

create table luno_user_institution(
	user_id int,
    instituion_id int,
    role varchar(32),
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

create table luno_user_course(
	user_id int,
    course_id int,
    role varchar(32),
    created_at timestamp default current_timestamp,
    updated_at timestamp null
);

-- ####################################################################################################
-- # Atualizações: 06/05/2018
-- ####################################################################################################

alter table luno_courses add column subtitle varchar(124);
alter table luno_courses add column description text;
alter table luno_courses add column image_id int;
alter table luno_courses add column category_id int;
alter table luno_classrooms add column max_students int;
alter table luno_classrooms add column description varchar(124);
alter table luno_classrooms add column welcome_text text;
alter table luno_users add column job varchar(124);
alter table luno_users add column about text;
rename table luno_chapter to luno_chapters;


-- ####################################################################################################
-- # Atualizações: 07/05/2018
-- ####################################################################################################

alter table luno_sections change column id id int auto_increment;
