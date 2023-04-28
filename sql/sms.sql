CREATE TABLE `class_tbl`(
    `class_id` INT(10) NOT NULL AUTO_INCREMENT,
    `class_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`class_id`)
);

CREATE TABLE `student_tbl`(
    `std_id` INT(10) NOT NULL AUTO_INCREMENT,
    `admission_no` VARCHAR(255) NOT NULL,
    `full-name` VARCHAR(255) NOT NULL,
    `name_with_initials` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `phone_no_1` VARCHAR(255) NOT NULL,
    `phone_no_2` VARCHAR(255) NOT NULL,
    `dob` DATE NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `d_o_admission` DATE NOT NULL,
    `date_added` DATE NOT NULL,
    `date_updated` DATE NOT NULL,
    `status` TINYINT NOT NULL,
    PRIMARY KEY(`std_id`)
);

CREATE TABLE `grade_class_tbl`(
    `grade_class_id` INT(10) NOT NULL AUTO_INCREMENT,
    `grade_id` INT(10) NOT NULL,
    `class_id` INT(10) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    `teacher_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`grade_class_id`)
);

CREATE TABLE `teacher_subject_tbl`(
    `teacher_id` INT(10) NOT NULL AUTO_INCREMENT,
    `sub_id` INT(10) NOT NULL,
    PRIMARY KEY(`teacher_id`)
);

CREATE TABLE `1-11_marks_tbl`(
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `std_id` INT(10) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    `term` VARCHAR(255) NOT NULL,
    `sub_id` INT(10) NOT NULL,
    `marks` INT(10) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `grade_subject_tbl`(
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `sec_id` VARCHAR(255) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    `sub_id` INT(10) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `section_tbl`(
    `sec_id` VARCHAR(255) NOT NULL,
    `sec_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`sec_id`)
);

CREATE TABLE `guardian_tbl`(
    `guardian_id` INT(10) NOT NULL,
    `std_id` INT(10) NOT NULL,
    `g_name` VARCHAR(255) NOT NULL,
    `g_phone` VARCHAR(255) NOT NULL,
    `g_address` VARCHAR(255) NOT NULL,
    `g_dob` VARCHAR(255) NOT NULL,
    `g_job` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`guardian_id`)
);

CREATE TABLE `subject_tbl`(
    `sub_id` INT(10) NOT NULL AUTO_INCREMENT,
    `sub_code` VARCHAR(255) NOT NULL,
    `sub_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`sub_id`)
);

CREATE TABLE `student_class_tbl`(
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `std_id` INT(10) NOT NULL,
    `grade_class_id` INT(10) NOT NULL,
    `sec_id` INT(10) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `user_tbl`(
    `user_id` INT(10) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(255) NOT NULL,
    `admission_no` VARCHAR(255) NOT NULL,
    `nic` VARCHAR(255) NOT NULL,
    `status` TINYINT NOT NULL,
    PRIMARY KEY(`user_id`)
);

CREATE TABLE `AL_marks_tbl`(
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `std_id` INT(10) NOT NULL,
    `year` INT(10) NOT NULL,
    `term` VARCHAR(255) NOT NULL,
    `sub_id` INT(10) NOT NULL,
    `marks` INT(10) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `teacher_tbl`(
    `teacher_id` INT(10) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `nic` VARCHAR(255) NOT NULL,
    `teacher_no` VARCHAR(255) NOT NULL,
    `app_date` DATE NOT NULL,
    `rc_app_date` DATE NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`teacher_id`)
);

CREATE TABLE `grade_tbl`(
    `grade_id` INT(10) NOT NULL AUTO_INCREMENT,
    `grade_name` VARCHAR(255) NOT NULL,
    `grade_head` VARCHAR(255) NOT NULL,
    `teacher_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`grade_id`)
);

CREATE TABLE `teacher_class_tbl`(
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `teacher_id` INT(10) NOT NULL,
    `grade_class_id` INT(10) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
);

ALTER TABLE `teacher_class_tbl` ADD FOREIGN KEY(`teacher_id`) REFERENCES `teacher_tbl`(`teacher_id`);
ALTER TABLE `student_class_tbl` ADD FOREIGN KEY(`grade_class_id`) REFERENCES `grade_class_tbl`(`grade_class_id`);
ALTER TABLE `teacher_tbl` ADD FOREIGN KEY(`nic`) REFERENCES `user_tbl`(`nic`);
ALTER TABLE `AL_marks_tbl` ADD FOREIGN KEY(`sub_id`) REFERENCES `subject_tbl`(`sub_id`);
ALTER TABLE `student_tbl` ADD FOREIGN KEY(`admission_no`) REFERENCES `user_tbl`(`admission_no`);
ALTER TABLE `grade_subject_tbl` ADD FOREIGN KEY(`sub_id`) REFERENCES `subject_tbl`(`sub_id`);
ALTER TABLE `grade_class_tbl` ADD FOREIGN KEY(`teacher_id`) REFERENCES `teacher_tbl`(`teacher_id`);
ALTER TABLE `grade_class_tbl` ADD FOREIGN KEY(`grade_id`) REFERENCES `grade_tbl`(`grade_id`);
ALTER TABLE `teacher_subject_tbl` ADD FOREIGN KEY(`sub_id`) REFERENCES `subject_tbl`(`sub_id`);
ALTER TABLE `1-11_marks_tbl` ADD FOREIGN KEY(`sub_id`) REFERENCES `subject_tbl`(`sub_id`);
ALTER TABLE `teacher_class_tbl` ADD FOREIGN KEY(`grade_class_id`) REFERENCES `grade_class_tbl`(`grade_class_id`);
ALTER TABLE `grade_subject_tbl` ADD FOREIGN KEY(`sec_id`) REFERENCES `section_tbl`(`sec_id`);
ALTER TABLE `grade_tbl` ADD FOREIGN KEY(`teacher_id`) REFERENCES `teacher_tbl`(`teacher_id`);
ALTER TABLE `AL_marks_tbl` ADD FOREIGN KEY(`std_id`) REFERENCES `student_tbl`(`std_id`);
ALTER TABLE `guardian_tbl` ADD FOREIGN KEY(`std_id`) REFERENCES `student_tbl`(`std_id`);
ALTER TABLE `1-11_marks_tbl` ADD FOREIGN KEY(`std_id`) REFERENCES `student_tbl`(`std_id`);
ALTER TABLE `teacher_subject_tbl` ADD FOREIGN KEY(`teacher_id`) REFERENCES `teacher_tbl`(`teacher_id`);
ALTER TABLE `student_class_tbl` ADD FOREIGN KEY(`sec_id`) REFERENCES `section_tbl`(`sec_id`);
ALTER TABLE `student_class_tbl` ADD FOREIGN KEY(`std_id`) REFERENCES `student_tbl`(`std_id`);
ALTER TABLE `grade_class_tbl` ADD FOREIGN KEY(`class_id`) REFERENCES `class_tbl`(`class_id`);