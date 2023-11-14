-- Crear la base de datos
CREATE DATABASE SistemaInscripcion;

-- Usar la base de datos
USE SistemaInscripcion;

-- Crear la tabla de Alumnos
CREATE TABLE alumnos (
    alumno_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    dni VARCHAR(20),
    f_nacimiento DATE,
    carrera_id INT,
    
    FOREIGN KEY (carrera_id) REFERENCES carreras (carrera_id)
);

-- Crear la tabla de Carreras
CREATE TABLE carreras (
    carrera_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre ENUM("Desarrollo de software", "Analista funcional", "ITI")
);

-- Crear la tabla de Unidades Curriculares (UC)
CREATE TABLE unidadescurriculares (
    uc_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    carrera_id INT,
    correlativa INT,
    formato ENUM("taller", "practica profesionalizante", "materia", "proyecto"),
    
    FOREIGN KEY (carrera_id) REFERENCES carreras (carrera_id),
    FOREIGN KEY (correlativa) REFERENCES correlatividades (correlatividad_id)
);
-- Crear la tabla de Correlatividades
CREATE TABLE correlatividades (
    correlatividad_id INT PRIMARY KEY AUTO_INCREMENT,
    uc_id INT, -- Unidad Curricular relacionada
    correlativa INT -- Unidad Curricular correlativa
);

-- Crear la tabla de Comisiones
CREATE TABLE comisiones (
    id_comision INT PRIMARY KEY AUTO_INCREMENT,
    carrera_id INT, -- Carrera relacionada
    uc_id INT, -- Unidad Curricular relacionada
    CupoMaximo INT,
    profesor_id INT,
    
    FOREIGN KEY (carrera_id) REFERENCES carreras (carrera_id),
    FOREIGN KEY (uc_id) REFERENCES unidadescurriculares (uc_id),
    FOREIGN KEY (profesor_id) REFERENCES profesores (profesor_id)
);

-- Crear la tabla de Inscripciones
CREATE TABLE inscripciones (
    inscripcion_id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT, -- Alumno relacionado
    comision_id INT, -- Comisión relacionada
    
    FOREIGN KEY (alumno_id) REFERENCES alumnos (alumno_id),
    FOREIGN KEY (comision_id) REFERENCES comisiones (id_comision)
);

-- Crear la tabla de Notas
CREATE TABLE notas (
    nota_id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT, -- Alumno relacionado
    uc_id INT, -- Unidad Curricular relacionada
    nota INT,
    
    FOREIGN KEY (alumno_id) REFERENCES alumnos (alumno_id),
    FOREIGN KEY (uc_id) REFERENCES unidadescurriculares (uc_id)
);

CREATE TABLE profesores (
    profesor_id INT PRIMARY KEY AUTO_INCREMENT,
    mail VARCHAR(100), 
    nombre_profesor VARCHAR(100),
    apellido_profesor VARCHAR(100)
);