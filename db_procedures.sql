DELIMITER //

-- --- USERS ---
CREATE PROCEDURE sp_CreateUser(IN p_username VARCHAR(50), IN p_password VARCHAR(255), IN p_role ENUM('admin', 'staff'))
BEGIN
    INSERT INTO USERS (username, password, role) VALUES (p_username, p_password, p_role);
END //

CREATE PROCEDURE sp_GetUser(IN p_id INT)
BEGIN
    SELECT * FROM USERS WHERE id = p_id;
END //

CREATE PROCEDURE sp_GetAllUsers()
BEGIN
    SELECT * FROM USERS;
END //

CREATE PROCEDURE sp_UpdateUser(IN p_id INT, IN p_username VARCHAR(50), IN p_password VARCHAR(255), IN p_role ENUM('admin', 'staff'))
BEGIN
    IF p_username IS NOT NULL THEN UPDATE USERS SET username = p_username WHERE id = p_id; END IF;
    IF p_password IS NOT NULL THEN UPDATE USERS SET password = p_password WHERE id = p_id; END IF;
    IF p_role IS NOT NULL THEN UPDATE USERS SET role = p_role WHERE id = p_id; END IF;
END //

CREATE PROCEDURE sp_DeleteUser(IN p_id INT)
BEGIN
    DELETE FROM USERS WHERE id = p_id;
END //

-- --- COURSES ---
CREATE PROCEDURE sp_CreateCourse(IN p_code VARCHAR(20), IN p_title VARCHAR(100), IN p_dept VARCHAR(100))
BEGIN
    INSERT INTO COURSES (course_code, title, department) VALUES (p_code, p_title, p_dept);
END //

CREATE PROCEDURE sp_GetCourse(IN p_id INT)
BEGIN
    SELECT * FROM COURSES WHERE id = p_id;
END //

CREATE PROCEDURE sp_GetAllCourses()
BEGIN
    SELECT * FROM COURSES;
END //

CREATE PROCEDURE sp_UpdateCourse(IN p_id INT, IN p_code VARCHAR(20), IN p_title VARCHAR(100), IN p_dept VARCHAR(100))
BEGIN
    IF p_code IS NOT NULL THEN UPDATE COURSES SET course_code = p_code WHERE id = p_id; END IF;
    IF p_title IS NOT NULL THEN UPDATE COURSES SET title = p_title WHERE id = p_id; END IF;
    IF p_dept IS NOT NULL THEN UPDATE COURSES SET department = p_dept WHERE id = p_id; END IF;
END //

CREATE PROCEDURE sp_DeleteCourse(IN p_id INT)
BEGIN
    DELETE FROM COURSES WHERE id = p_id;
END //

-- --- STUDENTS (With Email Validation) ---
CREATE PROCEDURE sp_CreateStudent(IN p_course_id INT, IN p_admin_no VARCHAR(50), IN p_fn VARCHAR(50), IN p_ln VARCHAR(50), IN p_email VARCHAR(100))
BEGIN
    IF p_email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid email format';
    END IF;
    INSERT INTO STUDENTS (course_id, admission_number, first_name, last_name, email) VALUES (p_course_id, p_admin_no, p_fn, p_ln, p_email);
END //

CREATE PROCEDURE sp_GetStudent(IN p_id INT)
BEGIN
    SELECT * FROM STUDENTS WHERE id = p_id;
END //

CREATE PROCEDURE sp_GetAllStudents()
BEGIN
    SELECT * FROM STUDENTS;
END //

CREATE PROCEDURE sp_UpdateStudent(IN p_id INT, IN p_course_id INT, IN p_email VARCHAR(100), IN p_fn VARCHAR(50), IN p_ln VARCHAR(50))
BEGIN
    IF p_course_id IS NOT NULL THEN UPDATE STUDENTS SET course_id = p_course_id WHERE id = p_id; END IF;
    IF p_email IS NOT NULL THEN
        IF p_email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$' THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid email format';
        END IF;
        UPDATE STUDENTS SET email = p_email WHERE id = p_id;
    END IF;
    IF p_fn IS NOT NULL THEN UPDATE STUDENTS SET first_name = p_fn WHERE id = p_id; END IF;
    IF p_ln IS NOT NULL THEN UPDATE STUDENTS SET last_name = p_ln WHERE id = p_id; END IF;
END //

CREATE PROCEDURE sp_DeleteStudent(IN p_id INT)
BEGIN
    DELETE FROM STUDENTS WHERE id = p_id;
END //

DELIMITER ;
