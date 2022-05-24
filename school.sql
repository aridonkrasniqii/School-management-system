


create database school;

use school;


drop table if exists student;
	create table student(
	  student_id integer primary key AUTO_INCREMENT,
	  student_name varchar(100) ,
	  student_role varchar(100),
	  student_username varchar(100) not null,
	  student_email varchar(100) not null ,
	  student_password varchar(255) not null,
	  student_salt varchar(20) default null,
	  student_index varchar(100)
	);


drop table if exists teacher;
		create table teacher(
		  teacher_id integer primary key AUTO_INCREMENT,
		  teacher_name varchar(100) ,
		  teacher_role varchar(100),
		  teacher_username varchar(100) not null ,
		  teacher_email varchar(100) not null ,
		  teacher_password varchar(255) not null,
		  teacher_salt varchar(20) default null,
		  teacher_index varchar(100)
		);	
        
        

insert into teacher() values(1, "Aridon", "Teacher","aridonk16","aridonk16@outlook.com","aridon123","123123123","100000");

create table subject(
  id integer primary key AUTO_INCREMENT,
  name varchar(100),
  credits integer,
  created_at datetime default now(),
  created_by integer,
  semester integer,
  foreign key (created_by) references teacher(teacher_id)
);


insert into subject(name,credits,created_at , created_by , semester) 
values("Math" , 5, now() , 1 , 1),
	("Programming" , 5, now() , 1 , 1),
	("Internet Security" , 5, now() , 1 , 1),
	("Data Security" , 5, now() , 1 , 1),
	("Data Mining" , 5, now() , 1 , 1);




create table subject_lectured_by (
	id integer primary key AUTO_INCREMENT,
	subject_id integer,
	teacher_id integer,
	foreign key (teacher_id) references teacher(teacher_id),
	foreign key (subject_id) references subject(id)
);




create table exam(
  id integer primary key AUTO_INCREMENT,
  subject varchar(100),
  created_at datetime default now(),
  date date,
  created_by integer,
  foreign key(created_by) references teacher(teacher_id)
);



create table exam_result(
  id integer primary key AUTO_INCREMENT,
  exam integer,
  student_id integer,
  passed varchar(3) check (passed = "yes" or passed = "no"),
  points decimal(3,2),
  grade integer,
  date datetime default now(),
  foreign key (student_id) references student(student_id),
  foreign key(exam) references exam_result(id) 
);


create table homework(
  id integer primary key AUTO_INCREMENT,
  name varchar(100),
  subject_id integer ,
  description varchar(1000),
  max_points integer,
  created_at datetime default now(),
  deadline date,
  created_by integer,
  semester integer,
  foreign key(created_by) references teacher(teacher_id),
  foreign key(subject_id) references subject(id)
);	



insert into homework(name,subject_id,description , max_points, created_at , deadline, created_by , semester)
values("Math Homework",7,"Algebra Description",100,now(),now(),1,1),
("Programming Homework",6,"Functions",100,now(),now(),1,1),
("Programming",5,"Object Oriented ",100,now(),now(),1,1),
("Math Homework",8,"Algebra Description",100,now(),now(),1,1),
("Programming Homework",8,"Functions",100,now(),now(),1,1),
("Programming",9,"Object Oriented ",100,now(),now(),1,1);
;

create table homework_result(
  id integer primary key AUTO_INCREMENT,
  homework_id integer,
  student_id integer,
  points double,
  delivered_on_time varchar(3) check (delivered_on_time = "yes" or delivered_on_time = "no"),
  date date default null,
  foreign key(student_id) references student(student_id),
  foreign key(homework_id) references homework(id)
);

    
insert into homework_result(homework_id,student_id,points, delivered_on_time, date) 
values( 1, 1,1 ,90,"yes", now()),( 2, 1,1 ,90,"yes", now()), ( 2, 1,1 ,80,"yes", now());

select * from homework_result;

drop table attached_homework;
        
create table attached_homework(
    id integer primary key AUTO_INCREMENT,
    homework_id integer ,
    subject_id integer ,
    student_id integer,
    attached_date datetime default now(),
    description varchar(255),
    foreign key(homework_id) references homework(id),
    foreign key(student_id) references student(student_id),
    foreign key(subject_id) references subject(id)
);


create table faq ( 
	faq_id integer primary key auto_increment, 
    faq_question varchar(255), 
    faq_answer varchar(255) default null
);




use school;

select * from homework;


























