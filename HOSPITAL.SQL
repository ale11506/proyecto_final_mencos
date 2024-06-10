CREATE TABLE Clinicas (
    clinica_id SERIAL PRIMARY KEY NOT NULL,
    cli_nombre_clinica VARCHAR(100) NOT NULL,
    cli_ubicacion VARCHAR(100) NOT NULL,
    cli_telefono VARCHAR(15) NOT NULL,
    clinica_situacion SMALLINT DEFAULT 1,
    cli_medico_id INT,
    FOREIGN KEY (cli_med_id) REFERENCES Medicos(medico_id)
);

CREATE TABLE Medicos (
    medico_id SERIAL PRIMARY KEY NOT NULL,
    med_nombre1 VARCHAR(50) NOT NULL,
    med_nombre2 VARCHAR(50) NOT NULL,
    med_apellido1 VARCHAR(50) NOT NULL,
    med_apellido2 VARCHAR(50) NOT NULL,
    med_especialidad VARCHAR(50) NOT NULL,
    medico_situacion SMALLINT DEFAULT 1
   
);

CREATE TABLE Pacientes (
    paciente_id SERIAL PRIMARY KEY NOT NULL,
    pac_nombre1 VARCHAR(50) NOT NULL,
    pac_nombre2 VARCHAR(50) NOT NULL,
    pac_apellido1 VARCHAR(50) NOT NULL,
    pac_apellido2 VARCHAR(50) NOT NULL,
pac_dpi VARCHAR (50) NOT NULL,
    pac_sexo VARCHAR(10) NOT NULL,
    pac_referido VARCHAR (10) NOT NULL,
    paciente_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Citas (
    cita_id SERIAL PRIMARY KEY NOT NULL, 
    cita_fecha DATETIME YEAR TO MINUTE, 
    cita_situacion SMALLINT DEFAULT 1,
    cita_paciente_id INT, 
    cita_clinica_id INT, 
    FOREIGN KEY (cita_paciente_id) REFERENCES Pacientes(paciente_id), 
    FOREIGN KEY (cita_clinica_id) REFERENCES Clinicas(clinica_id) 
);
