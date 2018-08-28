CREATE TABLE projects (
  project_id int auto_increment not null PRIMARY KEY,
  title varchar(75) unique not null ,
  category varchar(80) not null
);

CREATE TABLE tasks (
  task_id int auto_increment not null PRIMARY KEY ,
  title varchar(75) unique not null ,
  date DATE not null ,
  time int not null ,
  project_id int not null ,
  foreign key (project_id) references projects (project_id)
);